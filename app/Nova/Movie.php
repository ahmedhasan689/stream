<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\URL;
use Oneduo\NovaTimeField\Time;

class Movie extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Movie>
     */
    public static $model = \App\Models\Movie::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','name'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('name')->rules('required'),
            Textarea::make('describe')->rules('required'),
            Number::make('hour')->rules('max:2'),
            Number::make('minute')->rules('required','max:2'),
            Date::make('release_year')->rules('required'),
            Text::make('quality')->rules('required')->default('1080p'),
            Number::make('evaluation')->rules('required'),
            Number::make('viewer')->default(0)->nullable(),
            Number::make('age_group')->rules('required'),
            Image::make('image')->updateRules('nullable')->creationRules('required')->path('movieImage'),
            File::make('video')->updateRules('nullable')->creationRules('required')->path('movieVideo'),
            File::make('trailer')->updateRules('nullable')->creationRules('required')->path('movieTrailer'),
            Text::make('link')->rules('required'),
            Boolean::make('status')->rules('required'),
            BelongsToMany::make('Actors','actors',Actor::class),
            BelongsToMany::make('Users','users',User::class),
            MorphToMany::make('Tags','tags',Tag::class),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
