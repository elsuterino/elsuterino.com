<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Skill extends Model implements Sortable
{
    use SortableTrait;

    protected $guarded = [];

    protected $casts = [
        'icon' => 'array'
    ];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    public function group()
    {
        return $this->belongsTo(SkillGroup::class, 'skill_group_id');
    }
}
