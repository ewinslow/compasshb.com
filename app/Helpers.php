<?php

use Illuminate\Support\Str;

/**
 * Helper functions created specifically for this site are stored
 * in this file when it does not make sense to create a class.
 */

/**
 * Set active link on side navigation.
 *
 * @param string
 * @param string
 *
 * @return string
 */
function setActive($path, $active = 'active')
{
    return Request::is($path.'*') ? $active : '';
}

/**
 * Create a model's slug.
 *
 * @param  string $title
 *
 * @return string
 */
function makeSlugFromTitle($model, $title)
{
    $slug = Str::slug($title);

    $count = $model::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

    return $count ? "{$slug}-{$count}" : $slug;
}
