<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = [];

    protected $casts = [
        'tags' => 'array',
    ];

    public function config($field = null)
    {
        if (!$field) {
            return config("job.providers.{$this->provider}", null);
        }

        return config("job.providers.{$this->provider}.{$field}", null);
    }
}
