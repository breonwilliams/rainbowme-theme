<?php

function my_custom_giving_levels( $levels ) {
    return array( 2000, 3000, 4000 );
}
 
add_filter( 'dgx_donate_giving_levels', 'my_custom_giving_levels' );