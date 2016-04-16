<?php

/* enter the full email address you want displayed */
/* from https://rainbomekids.com/ */
function xyz_filter_wp_mail_from($email){
    return "hello@rainbowmekids.com";
}
add_filter("wp_mail_from", "xyz_filter_wp_mail_from");