<?php

function theme_setup(){
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
	add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
	add_theme_support('title-tag');
}
add_action( 'after_setup_theme', 'theme_setup' );

function enqueue_theme_styles_and_scripts(){
	//Styles
	wp_enqueue_style('reset-styles', get_stylesheet_directory_uri()."/css/reset.css");
	wp_enqueue_style('bootstrap.css', get_stylesheet_directory_uri()."/css/bootstrap/css/bootstrap.min.css", array('reset-styles'));
	wp_enqueue_style('style', get_stylesheet_uri(), array('reset-styles', 'bootstrap.css'));

	//Scripts
	wp_enqueue_script('boostrap.js', get_stylesheet_directory_uri()."/css/bootstrap/js/bootstrap.min.js");
}
add_action('wp_enqueue_scripts', 'enqueue_theme_styles_and_scripts');

?>