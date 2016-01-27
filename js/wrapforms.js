jQuery(function ($) {
        $( "#loginform" ).wrapInner( "<div class='form-group'></div>");
        $( ".wpcf7-form" ).wrapInner( "<div class='form-group'></div>");
        $( ".lost_reset_password" ).wrapInner( "<div class='form-group'></div>");
        $('.input').addClass('form-control');
        $('#user_login').addClass('form-control');
        $('#user_pass').addClass('form-control');
        $('.wpcf7-form-control').addClass('form-control');
        $('.form-group textarea').addClass('form-control');
        $('.sf-input-select').addClass('selectpicker');
        $('.input-text').addClass('form-control');
        $('.button').addClass('btn btn-default btn-md');
        $('.wpcf7-submit').addClass('btn btn-default btn-md');
 });