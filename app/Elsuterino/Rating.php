<?php

namespace App\Elsuterino;

use Illuminate\Support\Arr;
use Nikaia\Rating\Rating;

class ElRating extends Rating
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
