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

function banner_meta_box_markup($object){	
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
    ?>

    <tr valign="top">
	<th scope="row">Image Url</th>
	<td><label for="upload_image">
	<input id="upload_image" type="text" size="36" name="upload_image" value="<?php echo get_post_meta($object->ID, 'meta-box-banner', true) ?>" />
	<br />Enter a url for an image in your media library.
	</label></td>
	</tr>

    <?php
}

function add_banner_meta_box(){
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-upload', get_stylesheet_directory_uri().'/image.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('my-upload');
	add_meta_box( 'banner-meta-box', 'Banner Image', 'banner_meta_box_markup', 'page', 'normal', 'high', null );
}
add_action( 'add_meta_boxes', 'add_banner_meta_box');

function save_banner_meta_box($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "page";
    if($slug != $post->post_type)
        return $post_id;

    $meta_box_banner = "";

    if(isset($_POST["upload_image"]))
    {
        $meta_box_banner = $_POST["upload_image"];
    }   
    update_post_meta($post_id, "meta-box-banner", $meta_box_banner);
}
add_action("save_post", "save_banner_meta_box", 10, 3);

function get_banner(){
	$pageId = get_the_ID();
	$banner = get_post_meta($pageId, 'meta-box-banner', true);

	if(!empty($banner)){
		?>
		<header>
			<img id="banner" src="<?php echo get_post_meta(get_the_ID(), 'meta-box-banner', true); ?>" />
		</header>
		<?php
	}
}
?>