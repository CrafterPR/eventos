<?php

namespace App\Http\Controllers\API\Traits;

use App\Enum\VoteStages;
use Illuminate\Support\Facades\Cache;

trait StagesTrait
{
    protected function setNextStage(VoteStages $stage = VoteStages::INITIAL)
    {
        if ($stage->value !== Cache::get($this->session_id  .'_voting_stage')) {
            Cache::forget($this->session_id . '_voting_stage');
        }

        return Cache::remember($this->session_id  .'_voting_stage', 180, function () use ($stage) {
            return $stage->value;
        });
    }

    protected function getNextStage()
    {
        return Cache::get($this->session_id . '_voting_stage', );
    }
}
