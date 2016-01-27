<?php

add_action( 'bp_setup_nav', 'add_videos_subnav_tab', 100 );

function add_videos_subnav_tab() {
	global $bp;

	bp_core_new_subnav_item( array(
		'name' => 'Find Friends',
		'slug' => 'members',
		'parent_url' => trailingslashit( bp_loggedin_user_domain() . 'friends' ),
		'parent_slug' => 'friends',
		'screen_function' => 'profile_screen_members',
		'position' => 50
		)
	);
}

// redirect to videos page when 'Videos' tab is clicked
// assumes that the slug for your Videos page is 'videos' 
function profile_screen_members() {
	bp_core_redirect( get_option('siteurl') . "/members/" );
}