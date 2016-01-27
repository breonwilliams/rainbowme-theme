<?php /* Template Name: RM Login Page */  ?>

<?php get_header(); ?>
<section class="container">
    <div class="row">
				<div class="col-md-4 col-md-offset-4 content-area" id="main-column">
					<main id="main" class="site-main" role="main">
                        <?php $login  = (isset($_GET['login']) ) ? $_GET['login'] : 0; ?>

        <?php global $user_login;

        if(isset($_GET['login']) && $_GET['login'] == 'failed')
        {
            ?>
	            <div class="aa_error">

                    <div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong> FAILED: Try again!
</div>
	            </div>
            <?php
        }
            if (is_user_logged_in()) {
                echo '<a id="wp-submit" class="btn btn-primary btn-md" href="', wp_logout_url(), '" title="Logout">Logout</a>';
            } else {
                 wp_login_form($args);

                      $args = array(
                                'echo'           => true,
                                'redirect'       => home_url('/wp-admin/'), 
                                'form_id'        => 'loginform',
                                'label_username' => __( 'Username' ),
                                'label_password' => __( 'Password' ),
                                'label_remember' => __( 'Remember Me' ),
                                'label_log_in'   => __( 'Log In' ),
                                'id_username'    => 'user_login',
                                'id_password'    => 'user_pass',
                                'id_remember'    => 'rememberme',
                                'id_submit'      => 'wp-submit',
                                'remember'       => true,
                                'value_username' => NULL,
                                'value_remember' => true
                                ); ?>

<?php do_action('rm_fb_connect'); ?>

                                <a href="<?php echo esc_url(home_url('/forgot-your-password')); ?>" title="Lost Password">Lost your password?</a>

<?php
            }

        ?> 



					</main>
				</div>
            </div>
</section>
<?php get_footer(); ?>
