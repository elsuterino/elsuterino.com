<?php

namespace Elsuterino\Nova\Fields;

use Illuminate\Support\Arr;
use Nikaia\Rating\Rating as NikaiasRating;

/**
 * Class Rating
 *
 * Extending to fix old function usage
 *
 * @package Elsuterino\Nova\Fields
 */
class Rating extends NikaiasRating
{
    /**
     * Style the component.
     *
     * @param array $styles
     * @return Rating
     */
    public function withStyles(array $styles)
    {
        $build = [];

        foreach (static::$defaultStyles as $key => $defaultValue) {
            $build[$key] = Arr::get($styles, $key, $defaultValue);
        }

        return $this->withMeta($build);
    }
}
