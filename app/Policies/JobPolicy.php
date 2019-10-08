<?php

namespace App\Policies;

use App\Job;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
{
    use HandlesAuthorization;


    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, Job $job)
    {
        return false;
    }

    public function delete(User $user, Job $job)
    {
        return false;
    }
}
