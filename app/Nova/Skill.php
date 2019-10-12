<?php

namespace App\Nova;

use App\Elsuterino\ElRating;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Naxon\NovaFieldSortable\Concerns\SortsIndexEntries;
use Naxon\NovaFieldSortable\Sortable;

class Skill extends Resource
{
    use SortsIndexEntries;

    public static $defaultSortField = 'order';

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Skills';

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Skill';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Group', 'group', 'App\Nova\SkillGroup'),
            Text::make('Title'),
            ElRating::make('Stars')->min(0)->max(5)->increment(1),
            Sortable::make('Order', 'id')->onlyOnIndex(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
