<?php

function rm_fb_connect() {

		?>
			<p class="rm-fb-connect"><?php jfb_output_facebook_btn(); ?></p>
        <?php

}

add_action('rm_fb_connect','rm_fb_connect');