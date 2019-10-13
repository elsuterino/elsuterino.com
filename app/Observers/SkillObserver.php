<?php

namespace App\Observers;

use App\Skill;
use Elsuterino\CV;

class SkillObserver
{
    /**
     * @param  Skill  $skill
     */
    public function saved(Skill $skill)
    {
        (new CV)->save();
    }
}
