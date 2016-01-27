<?php
/**
 * Template for displaying login panel
 * 
 * @package bootstrap-basic
 */
?>
<div class="login-wrap row">

<?php global $user_login;

        if(isset($_GET['login']) && $_GET['login'] == 'failed')
        {
            ?>
	            <div class="aa_error">
	            </div>
            <?php
        }
            if (is_user_logged_in()) {
                echo '<div class="pull-left">', bp_loggedin_user_avatar( 'type=thumb&width=50&height=50' ), '</div> <div class="bp-user-link pull-left">' ,bp_core_get_userlink( bp_loggedin_user_id() ), '</div><a id="wp-submit" class="btn btn-primary btn-lg pull-right" href="', wp_logout_url(), '" title="Logout">Logout</a>';
            } else { ?>

          <div class="pull-right">
            <button type="button" class="btn btn-default btn-lg " data-toggle="modal" data-target="#myModal">Login</button>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>register" type="button" class="btn btn-primary btn-lg ">Register</a>
          </div>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Login</h4>
      </div>
      <div class="modal-body">

  <div class="row">
    <div class="col-md-6 col-md-offset-3">
<?php
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

    </div>
  </div>
</div>
    </div>
  </div>
</div>


                      <?php


            }

        ?> 

</div>