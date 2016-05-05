<?php /* Template Name: Custom WordPress Password Reset */  ?>
<?php get_header(); ?>
<section class="container">
    <div class="row">
				<div class="col-md-4 col-md-offset-4 content-area" id="main-column">
					<main id="main" class="site-main" role="main">
                        <?php global $user_ID, $user_identity; get_currentuserinfo(); if (!$user_ID) { ?>

                        <p>Enter your username or email to reset your password.</p>
            <form method="post" action="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post') ?>" class="wp-user-form">
                <div class="form-group">
                    <div class="username">
                        <label for="user_login" class="hide"><?php _e('Username or Email'); ?>: </label>
                        <p>
                        <input class="form-control" type="text" name="user_login" value="" size="20" id="user_login" tabindex="1001" />
                        </p>
                    </div>
                    <div class="login_fields">
                        <?php do_action('login_form', 'resetpass'); ?>
                        <input type="submit" name="user-submit" value="<?php _e('Reset my password'); ?>" class="user-submit btn btn-default" tabindex="1002" />
                        <?php $reset = $_GET['reset']; if($reset == true) { echo '<p>A message will be sent to your email address.</p>'; } ?>
                        <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?reset=true" />
                        <input type="hidden" name="user-cookie" value="1" />
                    </div>
                </div>
            </form>


            <?php } else { // is logged in ?>

    <div class="sidebox">
        <h3>Welcome, <?php echo $user_identity; ?></h3>
        <div class="usericon">
            <?php global $userdata; get_currentuserinfo(); echo get_avatar($userdata->ID, 60); ?>

        </div>
        <div class="userinfo">
            <p>You&rsquo;re logged in as <strong><?php echo $user_identity; ?></strong></p>
            <p>
                <a href="<?php echo wp_logout_url('index.php'); ?>">Log out</a> | 
                <?php if (current_user_can('manage_options')) { 
                    echo '<a href="' . admin_url() . '">' . __('Admin') . '</a>'; } else { 
                    echo '<a href="' . admin_url() . 'profile.php">' . __('Profile') . '</a>'; } ?>

            </p>
        </div>
    </div>

    <?php } ?>



					</main>
				</div>
            </div>
</section>
<?php get_footer(); ?>
