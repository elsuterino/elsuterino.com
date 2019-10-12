<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class SkillGroup extends Model implements Sortable
{
    use SortableTrait;

    protected $guarded = [];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
}
