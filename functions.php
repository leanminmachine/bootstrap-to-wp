<?php 


function theme_styles() {
	wp_enqueue_style('bootstrap_css', get_template_directory_uri().'/css/bootstrap.min.css');
	wp_enqueue_style('main_css', get_template_directory_uri().'/style.css');
}

/* wp_enqueue_style('what you want to name the style', get template directory uri.'/name of path here.css')
Now let's hook the style sheet! Add_action('wp_enqueue_scripts', 'name of function') */

add_action('wp_enqueue_scripts', 'theme_styles');


function theme_js() {

	global $wp_scripts;

	wp_register_script('html5_shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', false);
	wp_register_script('respond_js', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', false);


	$wp_scripts->add_data('html5_shiv','conditional','lt IE 9');
	$wp_scripts->add_data('respond_js','conditional','lt IE 9');

	wp_enqueue_script('jQuery_js', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js', '', '', false);
	wp_enqueue_script('bootstrap_js', get_template_directory_uri.'/js/bootstrap.min.js', array('jQuery'), '', true);

}

add_action('wp_enqueue_scripts', 'theme_js');

// Hide WP Admin Bar 
add_filter('show_admin_bar', '__return_false');

// Enable Custom Menu
add_theme_support('menus');

// Register new menus using register_nav_menu function in WP codex
// identifier for menu => header menu
// let the info appear at the backend of our site
function register_theme_menus() {
	register_nav_menus(
		array(
			'header-menu'=>__('Header Menu')
			)
		);
}

//hook into init hook, pass the parameter of our function. 
add_action('init', 'register_theme_menus');

?>