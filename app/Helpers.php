<?php

/**
 * Helper functions created specifically for this site
 */

function set_active($path, $active = 'active')
{
	return Request::is($path) ? $active : '';
}

function in_tax($post, $taxslug = 'Format', $term = 'Blog')
{
	$taxonomies = $post->first()->taxonomies;

	foreach ($taxonomies as $taxonomy) 
	{
		if ($taxonomy->term->name == $term) 
		{
			return true;
		}

	}
	//$category = $single->first()->taxonomies;
	//$category = $category[1]->term->name;

	return false;
}