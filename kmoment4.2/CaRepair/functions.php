<?php 
// aktivera menu 

add_action("init", "register_my_navigation_menus");

function register_my_navigation_menus() {
    register_nav_menus(array(
        "main_nav" => __("Huvudmeny")
    ));
}
/* Enable post thumbnails */
add_theme_support( 'post-thumbnails' );

/* Enable post comments */
add_theme_support('comments');

function my_widget_sidbar() {
    register_sidebar(array(
        'name'          => __('Sidofält', 'my_theme'),
        'id'            => 'sidebar',
        'description'   => __('Detta är ett widgetområde för sidofältet.', 'my_theme'),
        'before_widget' => '<div class="aside_bar">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'my_widget_sidbar');

