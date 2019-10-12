<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Project extends Model implements Sortable, HasMedia
{
    use SortableTrait;
    use HasMediaTrait;

    protected $guarded = [];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('conversion')->withResponsiveImages();
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('main')->singleFile();
    }
}
