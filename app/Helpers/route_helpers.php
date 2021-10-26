<?php

/**
 * Determine if you're within a view in the admin section.
 */
if (!function_exists('isAdminSection')) {
    function isAdminSection(): bool
    {
        return request()->routeIs('fos.*');
    }
}
