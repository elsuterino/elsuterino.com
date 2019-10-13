<?php

namespace App\Observers;

use App\SkillGroup;
use Elsuterino\CV;

class SkillGroupObserver
{
    /**
     * @param  SkillGroup  $skillGroup
     */
    public function saved(SkillGroup $skillGroup)
    {
        (new CV)->save();
    }
}
