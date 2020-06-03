<?php
include __DIR__.'/classes/WpBootstrapNavbar.php';
require_once __DIR__.'/classes/wp_bootstrap_pagiination.php';


// Single Post Pagination
function single_pagination(){
    echo '<div class="clearfix"></div><div class="single-pagination">';
    if (get_preview_post_link()):
        echo '<div class="prev">';
        previous_post_link();
        echo '</div>';
    endif;
    if (get_next_post_link()):
        echo '<div class="next">';
        next_post_link();
        echo '</div>';
    endif;

}

// Add the Style Files
function theme_style_files()
{
    $template_uri = get_template_directory_uri();
    wp_enqueue_style('bs', $template_uri . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('fontIcon', $template_uri . '/assets/css/all.min.css');
    wp_enqueue_style('mdb', $template_uri . '/assets/css/mdb.min.css');
    wp_enqueue_style('main-css', $template_uri . '/assets/css/main.css');
    if (get_bloginfo('language')=="ar"):
        wp_enqueue_style('rtl-css', $template_uri . '/style-rtl.css');
    endif;
}


// Add the Script Files
function theme_script_files()
{
    $template_uri = get_template_directory_uri();
    // remove jquery
    // register jquery to be in footer
    wp_register_script('jquery', $template_uri.'/js/jquery.min.js', [], '', true);

    // include jquery , bootstrap and the main.js file
    wp_enqueue_script('popper', $template_uri . '/assets/js/popper.min.js', [], false, true);

    wp_enqueue_script('bs', $template_uri . '/assets/js/bootstrap.min.js', ['jquery'], false, true);
    wp_enqueue_script('mdb', $template_uri . '/assets/js/mdb.min.js', ['jquery'], false, true);
    wp_enqueue_script('main-js', $template_uri . '/assets/js/main.js', [], false, true);

}


/*
 * Adding Custom Menu Support
 * @Youssef
 */
function nav_menu()
{
    register_nav_menu('top-nav', __('Top Bar Navigation Bar'));
}
function menu_html()
{
    wp_nav_menu([
        "theme_location" => "top-nav",
        "menu_class"     => (get_bloginfo('language')=='ar') ? "navbar-nav mr-auto":"navbar-nav ml-auto",
        "container"      => false,
        "depth"          => 2,
        "walker"         => new WP_Bootstrap_Navwalker()
    ]);
}


// extend excerpt function
function extend_excerpt_length($len){
    return 15;
}
function excerpt_change_dots($more){
    return '...';
}

function my_sidebar(){
    // main sidebar
    register_sidebar([
        "name"=>"sidebar",
        "id"=>"sidebar",
        "class"=>"sidebar-class",
        "before_widget"=>"<div class='widget-cont'>",
        "after_widget"=>"</div><hr>",
        "before_title"=>"<div class='widget-title'>",
        "after_title"=>"</div>",
    ]);
}


add_filter("excerpt_length",'extend_excerpt_length');
add_filter("excerpt_more",'excerpt_change_dots');
add_action("widgets_init","my_sidebar");
add_action('wp_enqueue_scripts', 'theme_script_files');
add_action('wp_enqueue_scripts', 'theme_style_files');
add_action('init', 'nav_menu');
add_theme_support("post-thumbnails");

