<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Provider extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $guarded = [];

    protected $casts = [
        'query_urls' => 'array',
        'query_params' => 'array',
        'other' => 'array',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    /**
     * @param  Media|null  $media
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('logo')->width(128)->height(128);
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('logo')->singleFile();
    }
}
