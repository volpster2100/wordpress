<?php
function theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function banner_meta_box_markup(){	
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
    ?>

    <tr valign="top">
	<th scope="row">Upload Image</th>
	<td><label for="upload_image">
	<input id="upload_image" type="text" size="36" name="upload_image" value="" />
	<input id="upload_image_button" type="button" value="Upload Image" />
	<br />Enter an URL or upload an image for the banner.
	</label></td>
	</tr>

    <?php
}

function add_banner_meta_box(){
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-upload', get_stylesheet_directory_uri().'/image.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('my-upload');
	add_meta_box( 'banner-meta-box', 'Banner Image', 'banner_meta_box_markup', 'page', 'side', 'high', null );
}
add_action( 'add_meta_boxes', 'add_banner_meta_box');
?>