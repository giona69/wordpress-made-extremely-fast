<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

// if the page is already in memcache, just output it
$memcache = new Memcache;
$mypage = $memcache->get($_SERVER['REQUEST_URI']);
if ($mypage) {
    echo $mypage;
}
else {

    // turn on buffering, to get page output before it actually outputs it
    ob_start();

    /** Loads the WordPress Environment and Template */
    require(dirname(__FILE__) . '/wp-blog-header.php');

    // save the page in the memcache, key = URI
    $mypage = ob_get_contents();
    $memcache->set($_SERVER['REQUEST_URI'], $mypage);
}
