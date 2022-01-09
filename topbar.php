<?php
/**
* Plugin Name: Welcome Top Bar
* Plugin URI: https://skatetownguide.com
* Description: This will add a welcome bar at  the top of your page.
* Version: 1.0.1
* Author: skatetownguide
* Author URI: https://skatetownguide.com
**/

//Add bar after the opening body
add_action('wp_body_open', 'tb_head');

function get_user_or_websitename()
{
    if( !is_user_logged_in() )
    {
        return 'to ' . get_bloginfo('name');
    }
    else
    {
        $current_user = wp_get_current_user();
        return $current_user -> user_login;
    }
}

function tb_head()
{
    echo '<h3 class="tb">Welcome ' . get_user_or_websitename() .  '</h3>';
}

//Add CSS to the top bar
add_action('wp_print_styles', 'tb_css');

function tb_css()
{
    echo '
        <style>
        h3.tb {color: #fff; margin: 0; padding: 30px; text-align: center; background: orange}
        </style>
    ';
}