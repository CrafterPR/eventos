<?php

namespace App\Enum;

enum VoteStages: string
{
    case INITIAL = "Initial";
    case POSITIONS = "Positions";
    case CONTESTANTS = "Contestants";
    case VOTING = "Voting";
    case CONFIRM = 'Confirm';
    case SAVE_VOTE = 'Save';
}
