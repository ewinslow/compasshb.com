<?php

/**
 * Helper functions created specifically for this site
 */

function set_active($path, $active = 'active')
{
	return Request::is($path) ? $active : '';
}