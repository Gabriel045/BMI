<?php 
define('theme_version', time());
function dd($data = '')
{
    if ($data != '') {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    } else {
        echo "No Text";
    }
}


// Adding theme styles and scripts
add_action('wp_enqueue_scripts', 'af_add_theme_scripts');

function af_add_theme_scripts() {

    wp_enqueue_style(
        'theme-styles',
        get_template_directory_uri() . '/assets/styles/styles.css',
    );

    wp_enqueue_script(
        'theme-main-script',
        get_template_directory_uri() . '/assets/js/main.js',
        ['jquery'],
        theme_version,
        true
    );

    // Tailwind
    wp_enqueue_style(
        'tailwind',
        get_template_directory_uri() . '/dist/output.css',
    );


    // slick
    wp_enqueue_style(
        'slick-css',
        get_template_directory_uri() . '/assets/slick/slick.css',
    );
    wp_enqueue_style(
        'slick-theme',
        get_template_directory_uri() . '/assets/slick/slick-theme.css',
    );
    wp_enqueue_script(
        'slick-js',
        get_template_directory_uri() . '/assets/slick/slick.min.js',
        ['jquery'],
        theme_version,
        true
    );
}


//Register ACF blocks
include_once('acf-blocks.php');

add_theme_support('post-thumbnails');


//Add Menu 
function menu()
{
    register_nav_menus(array(
        'primary' => 'Primary Navigation',
        'an-extra-menu' => 'An Extra Menu',
    ));
}

add_action('after_setup_theme', 'menu');


//Register general settings page
if (function_exists('acf_add_options_page')) {

    if (function_exists('acf_add_options_page')) {

        acf_add_options_page(array(
            'page_title'    => 'Theme General Settings',
            'menu_title'    => 'Theme Settings',
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'position' => '3.5',
            'redirect'      => false
        ));
    }
}


/**
 * @snippet WooCommerce User Login Shortcode
 * @how-to Get CustomizeWoo.com FREE
 * @author Rodolfo Melogli
 * @compatible WooCommerce 7
 * @community https://businessbloomer.com/club/
 */

add_shortcode('wc_login_form_bbloomer', 'bbloomer_separate_login_form');

function bbloomer_separate_login_form()
{
    if (is_user_logged_in()) return '<p>You are already logged in</p>';
    ob_start();
    do_action('woocommerce_before_customer_login_form');
    woocommerce_login_form(array('redirect' => wc_get_page_permalink('home')));
    return ob_get_clean();
}



//Enable Gutemberg block on products pages
function wplook_activate_gutenberg_products($can_edit, $post_type)
{
    if ($post_type == 'product') {
        $can_edit = true;
    }

    return $can_edit;
}
add_filter('use_block_editor_for_post_type', 'wplook_activate_gutenberg_products', 10, 2);