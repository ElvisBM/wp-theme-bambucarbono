<?php
/*
 * Documentation
 * Replace "_thumbnail_home" for name the metabox_box_name
 *
 * Add Metabox_example.php on the function
 * require get_template_directory() . '/metabox_example3.php';
 *
 * Add metabox-imageUpload.js on the function
 * wp_enqueue_script('metabox-imageUpload', get_template_directory_uri().'/js/metabox-imageUpload.js');
 */
add_action( 'add_meta_boxes', 'add_metabox_image' );
function add_metabox_image () {
	add_meta_box( 
		'thumbnailimagediv', // $id  
		 __( 'Thumbnail Lista Blog', 'text-domain' ),  // $title   
		'image_metabox', // $callback
		'post', // $page  
		'side', // $context
		'low' // $priority  
	);
}
function image_metabox ( $post ) {
	global $content_width, $_wp_additional_image_sizes;
	$image_id = get_post_meta( $post->ID, '_thumbnail_image_id', true );
	$old_content_width = $content_width;
	$content_width = 254;
	if ( $image_id && get_post( $image_id ) ) {
		if ( ! isset( $_wp_additional_image_sizes['post-thumbnail'] ) ) {
			$thumbnail_html = wp_get_attachment_image( $image_id, array( $content_width, $content_width ) );
		} else {
			$thumbnail_html = wp_get_attachment_image( $image_id, 'post-thumbnail' );
		}
		if ( ! empty( $thumbnail_html ) ) {
			$content = $thumbnail_html;
			$content .= '<p class="hide-if-no-js"><a href="javascript:;" id="remove_listing_image_button" >' . esc_html__( 'Remove listing image', 'text-domain' ) . '</a></p>';
			$content .= '<input type="hidden" id="upload_listing_image" name="_thumbnail_home" value="' . esc_attr( $image_id ) . '" />';
		}
		$content_width = $old_content_width;
	} else {
		$content = '<img src="" style="width:' . esc_attr( $content_width ) . 'px;height:auto;border:0;display:none;" />';
		$content .= '<p class="hide-if-no-js"><a title="' . esc_attr__( 'Escolher thumbanil ', 'text-domain' ) . '" href="javascript:;" id="upload_thumbnail_image_button" id="set-listing-image" data-uploader_title="' . esc_attr__( 'Choose an image', 'text-domain' ) . '" data-uploader_button_text="' . esc_attr__( 'Escolher thumbanil ', 'text-domain' ) . '">' . esc_html__( 'Escolher thumbanil', 'text-domain' ) . '</a></p>';
		$content .= '<input type="hidden" id="upload_listing_image" name="_thumbnail_home" value="" />';
	}
	echo $content;
}
add_action( 'save_post', 'image_save', 10, 1 );
function image_save ( $post_id ) {
	if( isset( $_POST['_thumbnail_home'] ) ) {
		$image_id = (int) $_POST['_thumbnail_home'];
		update_post_meta( $post_id, '_thumbnail_image_id', $image_id );
	}
}