<?php
declare(strict_types=1);

namespace App\Http\Controllers\API\Traits;

use App\Enum\ContestantStatus;
use App\Enum\VoteStages;
use App\Enum\VotingPeriodStatus;
use App\Enum\VotingPositionStatus;
use App\Models\ActiveVote;
use App\Models\Contestant;
use App\Models\VotingPeriod;
use App\Models\VotingPosition;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

trait DataTrait
{


    protected function getDashboardData(): array
    {
        $data['activePositions'] = $this->getActivePeriodPositions();

        return $data;
    }
    protected function defaults(): void
    {

        // Remove the USSD CODE and Channel

        if($this->message != $this->channel)
            $this->message = $this->str_replace_first($this->channel . '*', '', $this->message);

        /*
         * Split the text var by the *
         */
        // if (strpos($this->message, self::SPLITTER_CHAR) !== false) {
        $this->split_text = explode(self::SPLITTER_CHAR ,  $this->message);

        $this->input = end($this->split_text);
        /*
         * After registration, Initialize the inputs replacing the registration parts
         */

        if(preg_match('/^[a-zA-Z]+\*[a-zA-Z]+\*[0-9]+\*[1-4]\*[1-4]\*?.+$/', $this->message)){
            $this->message = preg_replace('/^[a-zA-Z]+\*[a-zA-Z]+\*[0-9]+\*[1-4]\*[1-4]\*/', '', $this->message);

        }
        /*
         * for every back | Home enrty pick all the inputs after the 0 entry
         */
        if(preg_match('/^.+\*(0)\*?.+$/', $this->message)){
            $this->message = preg_replace('/^.+\*(0)\*/', '', $this->message);

        }
        /*
         * Go back one step by removing *lastinput from the user input
         */
        if(preg_match('/^(0)$/', $this->input)) {
            // $this->message = str_replace( '*'. $this->input , '', $this->message);
            $this->message = '';
        }
        /*
         * Logout by enterring 00
         */

        if(preg_match('/^(00)$/', $this->input)) {
            $this->response = "END Thank you for using our USSD service. Welcome back  by dialing " . self::USSD_CODE .' ' . self::CPY_NAME;
        }
    }

    protected function getActiveVotingPeriod()
    {
        return Cache::remember( $this->session_id.'_voting_period', self::TTL,  function() {
            return  VotingPeriod::query()
                ->whereTime('starts_at', '<=' , Carbon::now()->format('H:i:s'))
                ->whereTime('ends_at', '>=', Carbon::now()->format('H:i:s'))
                ->whereDate('election_date', Carbon::now()->toDateString())
                ->where('status', VotingPeriodStatus::OPEN->value)
                ->first();
        });
    }

    protected function getActivePeriodPositions()
    {
        //return Cache::remember($this->session_id . '_voting_positions', self::TTL , function() {
        return VotingPosition::query()
            ->with(['contestants' => function($query) {
                return $query->withCount('votes')->orderBy('votes_count', 'desc');
            }])
            ->withCount('votes')
            ->where('status', VotingPositionStatus::ENABLED->value)
            ->when($this->activeVotePeriod, function($query) {
                $query->where('voting_period_uuid', $this->activeVotePeriod->uuid);
                 })
                    ->orderBy('code')
                    ->get();
    }



    protected function getVotingPosition()
    {
        //Cache::forget($this->session_id . '_vote_position');

        return  Cache::remember($this->session_id . '_vote_position', self::TTL , function() {
            return $this->getVotePositions()
                ->firstWhere('code', end($this->split_text));
        });
    }

    protected function getVotePositions()
    {
            return VotingPosition::query()
                ->with('votes')
                ->where('status', VotingPositionStatus::ENABLED->value)
                ->where('voting_period_uuid', $this->activeVotePeriod->uuid)
                ->whereDoesntHave('votes', function ($query) {
                    $query->where('voter_uuid', $this->voter->uuid); // Assuming the user id is stored in the `user_id` column
                })
                ->select('uuid', 'code', 'title')
                ->orderBy('code')
                ->get();
        //});
    }

    protected function getContestants()
    {
        $position = $this->getVotingPosition();

        if ($position) {
            Cache::forget($this->session_id . $position->uuid . '_contestants');

            return Cache::remember($this->session_id . $position?->uuid . '_contestants', self::TTL, function () use ($position) {
                return Contestant::query()
                    ->where('status', ContestantStatus::ENABLED->value)
                    ->where('voting_position_uuid', $position->uuid)
                    ->select('uuid', 'full_name', 'unique_code')
                    ->orderBy('unique_code')
                    ->get();
            });
        }
        return collect();
    }

    protected function getVotedCandidate($isUserInput = true)
    {
      if ($isUserInput) {
          Cache::forget($this->session_id . '_voted_person');
      }

      return Cache::remember($this->session_id .'_voted_person', self::TTL, function() {
          $position = Cache::get($this->session_id . '_vote_position');
           return  Contestant::query()
               ->where('voting_position_uuid' , $position->uuid)
               ->where('unique_code', end($this->split_text))
               ->where('status', ContestantStatus::ENABLED)
               ->first();
      });
    }

    public function saveVoteAndRedirectToNext(): ?string
    {
        try {
            $position = $this->getVotingPosition();
             $voted = $this->getVotedCandidate(false);
            ActiveVote::create(
                [
                    'voting_position_uuid' => $position?->uuid,
                    'voter_uuid' => $this->voter->uuid,
                    'contestant_uuid' => $voted->uuid,
                    'vote_status' => 'Valid'
                ]
            );
            Cache::forget($this->session_id .'_voted_person');

            Cache::forget($this->session_id . '_voting_positions');

            Cache::forget($this->session_id . $position->uuid . '_contestants');

            $this->showVoteResponse($position->title, $voted->full_name );



        } catch (\Throwable $e) {
             return $this->getDefaultError();
        } finally {
            return $this->goHomeLogOffResponse();
        }

    }



    protected function str_replace_first(mixed $from, mixed $to, mixed $content): array|string|null
    {
        $from = '/'.preg_quote($from , '/').'/';
        if( ! $content) {
            return $to;
        }
            return preg_replace($from, $to, $content, 1);

    }


}
