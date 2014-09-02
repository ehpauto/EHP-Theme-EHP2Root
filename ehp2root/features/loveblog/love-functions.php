<?php
/******************************************************************************************
 *
 * Love Blog Functions
 *
 * Created:         Gary Sun - 08/27/2014
 * Last Updated:    Gary Sun - 08/28/2014
 *
 * Technical Reference: 
 *      https://pippinsplugins.com/write-a-love-it-plugin-with-ajax/ 
 *      https://pippinsplugins.com/process-ajax-requests-correctly-in-wordpress-plugins/
 *
 * UI Reference: 
 *      http://themeforest.net/item/dobiz-business-and-portfolio-theme/6378344
 *
 *******************************************************************************************/
if(!defined('EHP_LOVE_FEATURE_URL')) {
	define('EHP_LOVE_FEATURE_URL', get_template_directory_uri() . '/features/loveblog');
}

function ehp_has_user_loved_blog($user_id, $post_id){
	$loved = get_user_option('ehp_user_loves', $user_id);
	if(is_array($loved) && in_array($post_id, $loved)) {
		return true;
	}
	return false;
}

function ehp_store_loved_id_for_user($user_id, $post_id) {
	$loved = get_user_option('ehp_user_loves', $user_id);
	if(is_array($loved)) {
		$loved[] = $post_id;
	} else {
		$loved = array($post_id);
	}
	update_user_option($user_id, 'ehp_user_loves', $loved);
}

function ehp_mark_post_as_loved($post_id, $user_id) {
	$love_count = get_post_meta($post_id, '_ehp_love_count', true);
	if($love_count)
		$love_count = $love_count + 1;
	else
		$love_count = 1;
 
	if(update_post_meta($post_id, '_ehp_love_count', $love_count)) {		
		ehp_store_loved_id_for_user($user_id, $post_id);
		return true;
	}
	return false;
}

function ehp_get_love_count($post_id) {
	$love_count = get_post_meta($post_id, '_ehp_love_count', true);
	if($love_count)
		return $love_count;
	return 0;
}

function ehp_process_love() {
	if ( isset( $_POST['item_id'] ) && wp_verify_nonce($_POST['love_it_nonce'], 'love-it-nonce') ) {
		if(ehp_mark_post_as_loved($_POST['item_id'], $_POST['user_id'])) {
			echo 'loved';
		} else {
			echo 'failed';
		}
	}
	die();
}
add_action('wp_ajax_love_it', 'ehp_process_love');

function ehp_love_front_end_js() {
	if(is_user_logged_in() && is_singular()) {
		wp_enqueue_script('love-it', EHP_LOVE_FEATURE_URL . '/love-it.js', array( 'jquery' ) );
		wp_localize_script( 'love-it', 'love_it_vars', 
			array( 
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'nonce' => wp_create_nonce('love-it-nonce'),
				'already_loved_message' => __('You have already liked this item.', 'love_it'),
				'error_message' => __('Sorry, there was a problem processing your request.', 'love_it')
			) 
		);	
	}
}
add_action('wp_enqueue_scripts', 'ehp_love_front_end_js');
?>