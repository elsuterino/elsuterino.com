<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = [];

    protected $casts = [
        'tags' => 'array',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function getAvatarAttribute()
    {
        return $this->logo;
    }

    public function getProviderAvatarAttribute()
    {
        return config("job.providers.{$this->provider}.iconUrl");
    }
}
