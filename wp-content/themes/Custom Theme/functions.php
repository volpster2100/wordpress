<?php

function theme_setup(){
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
	add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
	add_theme_support('title-tag');
}
add_action( 'after_setup_theme', 'theme_setup' );

function enqueue_theme_styles(){
	wp_enqueue_style('reset-styles', get_stylesheet_directory_uri()."/css/reset.css");
	wp_enqueue_style('basic-styles', get_stylesheet_directory_uri()."/css/basic.css");
	wp_enqueue_style('style', get_stylesheet_uri(), array('reset-styles', 'basic-styles'));
}
add_action('wp_enqueue_scripts', 'enqueue_theme_styles');

function enqueue_theme_scripts(){
	//wp_enqueue_script();
}
add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');

?>