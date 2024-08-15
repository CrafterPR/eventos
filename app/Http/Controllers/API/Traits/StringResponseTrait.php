<?php

namespace App\Http\Controllers\API\Traits;

use App\Enum\VoteStages;
use Illuminate\Support\Facades\Cache;

trait StringResponseTrait
{

    protected function initString($end = false): void
    {
        $this->response = $end ? 'END' : 'CON';
        $this->response .= ' Welcome ' . $this->voter->first_name . ' to ' . self::CPY_NAME . ". \n";
    }

    protected function getPositionsString(): void
    {
        $this->initString();
        try {
            $this->response .= $this->getVotingString();
            $this->setNextStage(VoteStages::POSITIONS);

        } catch (\Throwable $e) {
            $this->response =  $this->getDefaultError();
            return;
        } finally {
            $this->response .= $this->goHomeLogOffResponse();
        }
    }

    protected function getContestantsString($return = false)
    {
        $this->position = $this->getVotingPosition();

        try {
            $this->contestants = $this->getContestants();
            if ( $this->contestants->count() > 0) {
                $response = sprintf("CON Enter number for your preferred candidate for %s\n" ,  $this->position->title);
                if($return) {
                    $response = str_replace('CON', '', $response);
                }
                foreach( $this->contestants as $contestant) {
                    $response .= "$contestant->unique_code. $contestant->full_name \n";
                }
                if ($return) {
                  return $response;
                }
                $this->response = $response;
                $this->setNextStage(VoteStages::VOTING);
                return $this->response .= $this->goHomeLogOffResponse();
            }
            $this->setNextStage(VoteStages::POSITIONS);
            $this->response = sprintf("END Currently, there are no contestants to vote for %s \n %s",
                $this->position->title,
                $this->endSessionAndPromptToContinueVoting());

        } catch (\Throwable $e) {
            $this->response = $this->getDefaultError();
        }
    }

    private function getVotingString($continuation = true, $response = ''): string
    {
           !$continuation && $response = 'CON ';
        try {
            $votePositions = $this->getVotePositions();
            if ($votePositions->count() > 0) {
                $response .= sprintf("Choose a position to vote in the %s\n", $this->activeVotePeriod->name);
                foreach ($votePositions as $position) {
                    $response .= "$position->code. $position->title \n";
                }
                return $response;
            }
            return  "END There are no open positions to vote for \n";
        } catch (\Throwable $e) {
              return $this->getDefaultError();
        }
    }
    protected function confirmationVotingString(): void
    {
        try {
            $person = $this->getVotedCandidate();
             if(!$person ) {
                 $this->response = "CON Your selection is invalid!\n";
                 $this->response .= $this->getContestantsString(true);
                 $this->setNextStage(VoteStages::VOTING);
                 //$this->response .= $this->goHomeLogOffResponse();
                 return;
             }

             $position = $this->getVotingPosition();

            $response = sprintf("CON Confirm you vote %s as the %s?\n" ,$person->full_name,  $position->title) ;

            $this->response = $response . "\n 1. Accept \n 2. Cancel and go back \n";

            $this->setNextStage(VoteStages::CONFIRM);

            return;
        } catch (\Throwable $e) {
            $this->response = $this->getDefaultError();
            return;
        } finally {
           $this->response .= $this->goHomeLogOffResponse();
        }
    }

    private function showVoteResponse($position, $votedName): void
    {
        $this->response = sprintf("END Thank you! You voted for %s as the %s. \n %s"
            ,
            $votedName,
            $position,
            $this->endSessionAndPromptToContinueVoting()) ;
    }

    private function getDefaultError(): string
    {
        return  sprintf("END We could not process your voting request at the moment.
                                 Kindly try again by dialling %s", self::USSD_CODE);
    }

    private function goHomeLogOffResponse($response = false): null| string
    {
       if ( $response ) {
           return $this->response = "0. Go Home\n 00. Logout";
       } else {
           return "0. Go Home\n 00. Logout";
       }

    }

    protected function endSessionAndPromptToContinueVoting(): string
    {
        Cache::flush();
        return "To Continue voting for other positions, Dial ". self::USSD_CODE;
    }
}
