<?php
declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Enum\VoterStatus;
use App\Enum\VoteStages;
use App\Enum\VotingPeriodStatus;
use App\Http\Controllers\API\Traits\DataTrait;
use App\Http\Controllers\API\Traits\StagesTrait;
use App\Http\Controllers\API\Traits\StringResponseTrait;
use App\Http\Controllers\Controller;
use App\Models\Voter;
use App\Models\VotingPeriod;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class UssdController extends Controller
{
    use StringResponseTrait, StagesTrait, DataTrait;

    const TTL = 180;
    public mixed $msisdn;
    public ?string $message;
    public string $session_id;
    public mixed $service_code;
    public string $response;
    public string $channel = '22';
    public  $voter;
    const SPLITTER_CHAR = '*';
    const CPY_NAME = "Vote Sacco";
    const USSD_CODE = "*384*54400#";
    const voter_CARE = '0111857174';

    private mixed $activeVotePeriod;
    /**
     * @var Builder[]|Collection
     */
    protected mixed $contestants;

    protected mixed $position;
    protected string $input;



    public function index(Request $request): void
    {

        $this->msisdn = $request->get('phoneNumber');
        $this->message = $request->get('text');
        $this->session_id = $request->get('sessionId');
        $this->service_code = $request->get('serviceCode');

        $this->voter = Cache::remember( $this->session_id. '_customer',self::TTL, function() {
                        return Voter::query()
                            ->where(DB::raw('RIGHT(mobile, 9)'), 'LIKE', substr($this->msisdn, -9))
                        ->where('status', VoterStatus::ACTIVE)
                        ->first();
        });

        $this->activeVotePeriod = $this->getActiveVotingPeriod();

        if ($this->voter === null) {
            $this->response .= "END You are not registered to vote for " . self::CPY_NAME . " \n Call " . self::voter_CARE . " for help.";
            Cache::flush();
        } elseif($this->activeVotePeriod === null) {
            $this->initString(true);
            $this->response .= " Currently, there is no Open period to Vote .Check back later!";
            Cache::flush();
        } else {
            $this->response = "";

            $this->defaults();

            if ($this->message == "" || $this->message == $this->channel):
                $this->getPositionsString();

            else: //Message has something, DO the magics here!
                if ($this->getNextStage() == VoteStages::POSITIONS->value && preg_match('/^[0-9]+$/', $this->input)) {

                    $this->getContestantsString();

                } elseif ($this->getNextStage() == VoteStages::VOTING->value && preg_match('/^[0-9]+$/', $this->input)) {

                    $this->confirmationVotingString();

                } elseif ($this->getNextStage() == VoteStages::CONFIRM->value && preg_match('/^[0-9]+$/', $this->input)) {
                    // Voter accepts the voting option
                    if ($this->input == 1) {

                        $this->saveVoteAndRedirectToNext();

                    } elseif ($this->input == 2) {

                        $this->setNextStage(VoteStages::VOTING);
                        $this->getContestantsString();

                    } else {

                        $this->response =$this->tryAgain();
                    }
                }

            endif;
        }

        if ($this->response === '' || (!str_starts_with($this->response, 'CON') && !str_starts_with($this->response, 'END'))) {
            $this->response = $this->getDefaultError();
        }

        echo $this->response;

    }



}
