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
                    echo '<div class="pull-left">', bp_loggedin_user_avatar( 'type=thumb&width=50&height=50' ), '</div> <div class="bp-user-link pull-left">' ,bp_core_get_userlink( bp_loggedin_user_id() ), '</div> <span class="notif"><i class="fa fa-bell fa-lg" aria-hidden="true"></i><a data-rel="tooltip" data-placement="right" rel="tooltip" data-original-title="Notifications" class="notif-count" href="', bp_core_get_user_domain(bp_loggedin_user_id()) ,'notifications"><span class="badge">', cg_current_user_notification_count() ,'</span></a></span>';
                ?><div class="pull-right"><?php dynamic_sidebar('navbar-right'); ?></div><div class="cleared"></div><?php
            } else { ?>

                <div class="pull-right">

                    <?php dynamic_sidebar('navbar-right'); ?>

                </div>
                <div class="cleared"></div>



<!-- Modal -->



                      <?php


            }
        ?>
</div>