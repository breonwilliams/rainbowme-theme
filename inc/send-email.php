<?php

/* auto-detect the server so you only have to enter the front/from half of the email address, including the @ sign */
function xyz_filter_wp_mail_from($email){
    /* start of code lifted from wordpress core, at http://svn.automattic.com/wordpress/tags/3.4/wp-includes/pluggable.php */
    $sitename = strtolower( $_SERVER['SERVER_NAME'] );
    if ( substr( $sitename, 0, 4 ) == 'www.' ) {
        $sitename = substr( $sitename, 4 );
    }
    /* end of code lifted from wordpress core */
    $myfront = "hello@";
    $myback = $sitename;
    $myfrom = $myfront . $myback;
    return $myfrom;
}
add_filter("wp_mail_from", "xyz_filter_wp_mail_from");