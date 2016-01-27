<?php
/**
 * Bootstrap Basic theme redirect to home page
 * 
 * @package bootstrap-basic
 */


if ( current_user_can( 'publish_posts' ) ) {
} else {
   add_filter( 'show_admin_bar', '__return_false', 99 );
}