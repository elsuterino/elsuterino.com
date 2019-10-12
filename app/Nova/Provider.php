<?php

namespace App\Nova;

use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Illuminate\Http\Request;
use Inspheric\Fields\Url;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\KeyValue;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use NovaItemsField\Items;
use Timothyasp\Color\Color;

class Provider extends Resource
{
    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Jobs';

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Provider';

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
            Text::make('Title'),
            Url::make('Url'),
            Images::make('Logo', 'logo')
                ->conversionOnIndexView('logo')
                ->croppingConfigs(['ratio' => 1])
                ->rules('required'),
            Color::make("Color"),
            Items::make('Query Urls'),
            KeyValue::make('Query Params'),
            Code::make('Other')->json()
        ];
    }
//            $table->string('color');//hex
//            $table->string('title');
//            $table->string('url');
//            $table->json('query_urls');
//            $table->json('query_params')->nullable();
//            $table->json('other')->nullable();
//            'color' => 111954, // green
//            'name' => 'glassdoor.com',
//            'displayUrl' => 'https://glassdoor.com',
//            'iconUrl' => 'https://www.glassdoor.com/app/static/img/partners/fb/logo-1200x630.png',
//            // query
//            'url' => 'https://www.glassdoor.com/Job/jobs.htm',
//            'params' => [
//                'sc.keyword' => 'php',
//                'locT' => 'S',
//                'locId' => '11047',
//                'locKeyword' => 'Remote',
//                'jobType' => 'all',
//                'fromAge' => '3',//'-1',
//                'minSalary' => '50000',
//                'includeNoSalaryJobs' => 'true',
//                'radius' => '25',
//                'cityId' => '-1',
//                'minRating' => '0',
//                'industryId' => '-1',
//                'sgocId' => '-1',
//                'seniorityType' => 'all',
//                'companyId' => '-1',
//                'employerSizes' => '0',
//                'applicationType' => '0',
//                'remoteWorkType' => '0',
//            ],

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
