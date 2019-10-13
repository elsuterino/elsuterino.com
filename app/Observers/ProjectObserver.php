<?php

namespace App\Observers;

use App\Project;
use Elsuterino\CV;

class ProjectObserver
{
    /**
     * @param  Project  $project
     */
    public function saved(Project $project)
    {
        (new CV)->save();
    }
}
