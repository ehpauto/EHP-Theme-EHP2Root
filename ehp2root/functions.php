<?php
if ( ! function_exists( 'ehp2theme_setup' ) ) :
/**
 * Theme setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 */
function ehp2theme_setup() {
	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes. 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 1350, 1038, 576, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Main Menu', 'ehp2' ),
		'secondary' => __( 'Sub Menu', 'ehp2' ),
	) );
    
    show_admin_bar(false);
    add_filter('show_admin_bar', '__return_false');
    
    // Default values for EHP2 Settings page
    if (!get_option('ehp2_subtitle')){
        update_option('ehp2_subtitle', 'EHP2ROOT THEME MADE BY GARY SUN');
    }
    if (!get_option('ehp2_cat1name')){
        update_option('ehp2_cat1name', 'All POSTS');
        update_option('ehp2_cat1id', '');
    }
    if (!get_option('ehp2_up_title')){
        update_option('ehp2_up_title', 'NEW FLASH FROM EHP');
    } 
    if (!get_option('ehp2_up1name')){
        update_option('ehp2_up1name', 'No items configured.');
    } 
    if (!get_option('ehp2_up1id')){
        update_option('ehp2_up1id', '#');
    } 
    
}
endif;
add_action( 'after_setup_theme', 'ehp2theme_setup' );

/**
 * Register widgets areas.
 */
function ehp2_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Body Right Sidebar', 'ehp2' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main widget area that appears on the right sidebar.', 'ehp2' ),
		'before_widget' => '<aside id="%1$s" class="ehp-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="ehp-widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Body Middle Widget Area', 'ehp2' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Additional widget area that appears on the middle of the body.', 'ehp2' ),
		'before_widget' => '<aside id="%1$s" class="ehp-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="ehp-widget-title">',
		'after_title'   => '</h1>',
	) );
    register_sidebar( array(
		'name'          => __( 'Body Bottom Widget Area', 'ehp2' ),
		'id'            => 'sidebar-4',
		'description'   => __( 'Additional widget area that appears on the body bottom.', 'ehp2' ),
		'before_widget' => '<aside id="%1$s" class="ehp-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="ehp-widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'tehp2' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears in the footer of the site.', 'ehp2' ),
		'before_widget' => '<aside id="%1$s" class="ehp-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="ehp-widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'ehp2_widgets_init' );

/**
 * Theme settings page in dashboard
 */
function ehp2_themeoptions_admin_menu(){
    add_theme_page('EHP2 Settings', 'EHP2 Settings', 'edit_themes', basename(__FILE__), 'ehp2_themeoptions_page');
    add_theme_page('EHP2 Link Hub', 'EHP2 Link Hub', 'edit_themes', 'LinkHub', 'ehp2_linkhuboptions_page');
}

function ehp2_themeoptions_page(){
    if ( $_POST['update_themeoptions'] == 'true' ) { ehp2_themeoptions_update(); }
?>
    <h2>EHP2 Settings</h2>
    <form method="POST" action="">
    <input type="hidden" name="update_themeoptions" value="true" />
    <p>Site Subtitle: <input type="text" name="subtitle" id="subtitle" size="60" value="<?php echo get_option('ehp2_subtitle'); ?>"/></p>
    
    <h4 style="font-weight: bold; text-transform: uppercase; font-size: 16px">Engineering Updates:</h4>
    <p>Display Title: <input type="text" name="uptitle" id="uptitle" size="40" value="<?php echo get_option('ehp2_up_title'); ?>"/></p>
    <p>Update 1 Name: <input type="text" name="up1name" id="up1name" size="50" value="<?php echo get_option('ehp2_up1name'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;
    Link: <input type="text" name="up1id" id="up1id" size="60" value="<?php echo get_option('ehp2_up1id'); ?>"/>
    <br>Update 2 Name: <input type="text" name="up2name" id="up2name" size="50" value="<?php echo get_option('ehp2_up2name'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;
    Link: <input type="text" name="up2id" id="up2id" size="60" value="<?php echo get_option('ehp2_up2id'); ?>"/>
    <br>Update 3 Name: <input type="text" name="up3name" id="up3name" size="50" value="<?php echo get_option('ehp2_up3name'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;
    Link: <input type="text" name="up3id" id="up3id" size="60" value="<?php echo get_option('ehp2_up3id'); ?>"/>
    <br>Update 4 Name: <input type="text" name="up4name" id="up4name" size="50" value="<?php echo get_option('ehp2_up4name'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;
    Link: <input type="text" name="up4id" id="up4id" size="60" value="<?php echo get_option('ehp2_up4id'); ?>"/><br>Update 5 Name: <input type="text" name="up5name" id="up5name" size="50" value="<?php echo get_option('ehp2_up5name'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;
    Link: <input type="text" name="up5id" id="up5id" size="60" value="<?php echo get_option('ehp2_up5id'); ?>"/></p>
    
    <h4 style="font-weight: bold; text-transform: uppercase; font-size: 16px">Videos:</h4>
    <p>Video 1 Name: <input type="text" name="video1name" id="video1name" size="40" value="<?php echo get_option('ehp2_video1name'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;Meta: <input type="text" name="video1meta" id="video1meta" size="40" value="<?php echo get_option('ehp2_video1meta'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;Embed Player Src: <input type="text" name="video1link" id="video1link" size="60" value="<?php echo get_option('ehp2_video1link'); ?>"/>
    <br>Video 2 Name: <input type="text" name="video2name" id="video2name" size="40" value="<?php echo get_option('ehp2_video2name'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;Meta: <input type="text" name="video2meta" id="video2meta" size="40" value="<?php echo get_option('ehp2_video2meta'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;Embed Player Src:: <input type="text" name="video2link" id="video2link" size="60" value="<?php echo get_option('ehp2_video2link'); ?>"/>
    <br>Video 3 Name: <input type="text" name="video3name" id="video3name" size="40" value="<?php echo get_option('ehp2_video3name'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;Meta: <input type="text" name="video3meta" id="video3meta" size="40" value="<?php echo get_option('ehp2_video3meta'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;Embed Player Src:: <input type="text" name="video3link" id="video3link" size="60" value="<?php echo get_option('ehp2_video3link'); ?>"/>
    <br>Video 4 Name: <input type="text" name="video4name" id="video4name" size="40" value="<?php echo get_option('ehp2_video4name'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;Meta: <input type="text" name="video4meta" id="video4meta" size="40" value="<?php echo get_option('ehp2_video4meta'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;Embed Player Src:: <input type="text" name="video4link" id="video4link" size="60" value="<?php echo get_option('ehp2_video4link'); ?>"/>
    <br>Video 5 Name: <input type="text" name="video5name" id="video5name" size="40" value="<?php echo get_option('ehp2_video5name'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;Meta: <input type="text" name="video5meta" id="video5meta" size="40" value="<?php echo get_option('ehp2_video5meta'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;Embed Player Src:: <input type="text" name="video5link" id="video5link" size="60" value="<?php echo get_option('ehp2_video5link'); ?>"/>
    <br>Video 6 Name: <input type="text" name="video6name" id="video6name" size="40" value="<?php echo get_option('ehp2_video6name'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;Meta: <input type="text" name="video6meta" id="video6meta" size="40" value="<?php echo get_option('ehp2_video6meta'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;Embed Player Src:: <input type="text" name="video6link" id="video6link" size="60" value="<?php echo get_option('ehp2_video6link'); ?>"/></p>
    <p>Video Provider Website Address: <input type="text" name="videosite" id="videosite" size="40" value="<?php echo get_option('ehp2_videosite'); ?>"/></p>
    
    <h4 style="font-weight: bold; text-transform: uppercase; font-size: 16px">Highlights:</h4>
    <p><b style="font-weight: bold">Highlight News (content from WordPress)</b><br>Title: <input type="text" name="cat1name" id="cat1name" size="40" value="<?php echo get_option('ehp2_cat1name'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;
    ID: <input type="text" name="cat1id" id="cat1id" size="10" value="<?php echo get_option('ehp2_cat1id'); ?>"/></p>
    <p><b style="font-weight: bold">Highlight Event (content from other website)</b><br>Title: <input type="text" name="extname" id="extname" size="40" value="<?php echo get_option('ehp2_extname'); ?>"/>
    <br>Image Url: <input type="text" name="extimg" id="extimg" size="80" value="<?php echo get_option('ehp2_extimg'); ?>"/>
    <br>Description: <input type="text" name="extdisp" id="extdisp" size="120" value="<?php echo get_option('ehp2_extdisp'); ?>"/>
    <br>Link: <input type="text" name="extlink" id="extlink" size="80" value="<?php echo get_option('ehp2_extlink'); ?>"/></p>
    
    <h4 style="font-weight: bold; text-transform: uppercase; font-size: 16px">Categorized Article Index:</h4>
    <p>Category 1 Name: <input type="text" name="cat2name" id="cat2name" size="40" value="<?php echo get_option('ehp2_cat2name'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;
    ID: <input type="text" name="cat2id" id="cat2id" size="10" value="<?php echo get_option('ehp2_cat2id'); ?>"/>
    <br>Category 2 Name: <input type="text" name="cat3name" id="cat3name" size="40" value="<?php echo get_option('ehp2_cat3name'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;
    ID: <input type="text" name="cat3id" id="cat3id" size="10" value="<?php echo get_option('ehp2_cat3id'); ?>"/>
    <br>Category 3 Name: <input type="text" name="cat4name" id="cat4name" size="40" value="<?php echo get_option('ehp2_cat4name'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;
    ID: <input type="text" name="cat4id" id="cat4id" size="10" value="<?php echo get_option('ehp2_cat4id'); ?>"/></p>
    
    <h4 style="font-weight: bold; text-transform: uppercase; font-size: 16px">Site About:</h4>
    <p>Title: <input type="text" name="siteabouttitle" id="siteabouttitle" size="40" value="<?php echo get_option('ehp2_siteabouttitle'); ?>"/>
    <br>Content: <br><textarea type="text" name="siteaboutcontent" id="siteaboutcontent" cols="80" rows="3"><?php echo get_option('ehp2_siteaboutcontent'); ?></textarea></p>
    
    <h4 style="font-weight: bold; text-transform: uppercase; font-size: 16px">Contact Us Panel:</h4>
    <p>Contact Way 1: <input type="text" name="con1name" id="con1name" size="40" value="<?php echo get_option('ehp2_con1name'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;Icon: <input type="text" name="con1icon" id="con1icon" size="10" value="<?php echo get_option('ehp2_con1icon'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;Link: <input type="text" name="con1link" id="con1link" size="60" value="<?php echo get_option('ehp2_con1link'); ?>"/>
    <br>Contact Way 2: <input type="text" name="con2name" id="con2name" size="40" value="<?php echo get_option('ehp2_con2name'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;Icon: <input type="text" name="con2icon" id="con2icon" size="10" value="<?php echo get_option('ehp2_con2icon'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;Link: <input type="text" name="con2link" id="con2link" size="60" value="<?php echo get_option('ehp2_con2link'); ?>"/>
    <br>Contact Way 3: <input type="text" name="con3name" id="con3name" size="40" value="<?php echo get_option('ehp2_con3name'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;Icon: <input type="text" name="con3icon" id="con3icon" size="10" value="<?php echo get_option('ehp2_con3icon'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;Link: <input type="text" name="con3link" id="con3link" size="60" value="<?php echo get_option('ehp2_con3link'); ?>"/></p>
    
    <h4 style="font-weight: bold; text-transform: uppercase; font-size: 16px">Copyright:</h4>
    <p>Line 1: <input type="text" name="cp1" id="cp1" size="50" value="<?php echo get_option('ehp2_cp1'); ?>"/>
    <br>Line 2: <input type="text" name="cp2" id="cp2" size="50" value="<?php echo get_option('ehp2_cp2'); ?>"/></p>
    
    <p><input type="submit" class="button-primary" name="bcn_admin_options" value="Update"/></p>
    </form>
<?php
}

function ehp2_themeoptions_update(){
    update_option('ehp2_subtitle', $_POST['subtitle']);
    
    update_option('ehp2_up_title', $_POST['uptitle']);
    update_option('ehp2_up1name', $_POST['up1name']);
    update_option('ehp2_up1id', $_POST['up1id']);
    update_option('ehp2_up2name', $_POST['up2name']);
    update_option('ehp2_up2id', $_POST['up2id']);
    update_option('ehp2_up3name', $_POST['up3name']);
    update_option('ehp2_up3id', $_POST['up3id']);
    update_option('ehp2_up4name', $_POST['up4name']);
    update_option('ehp2_up4id', $_POST['up4id']);
    update_option('ehp2_up5name', $_POST['up5name']);
    update_option('ehp2_up5id', $_POST['up5id']);
    
    update_option('ehp2_video1name', $_POST['video1name']);
    update_option('ehp2_video1meta', $_POST['video1meta']);
    update_option('ehp2_video1link', $_POST['video1link']);
    update_option('ehp2_video1disp', $_POST['video1disp']);
    update_option('ehp2_video2name', $_POST['video2name']);
    update_option('ehp2_video2meta', $_POST['video2meta']);
    update_option('ehp2_video2link', $_POST['video2link']);
    update_option('ehp2_video3name', $_POST['video3name']);
    update_option('ehp2_video3meta', $_POST['video3meta']);
    update_option('ehp2_video3link', $_POST['video3link']);
    update_option('ehp2_video4name', $_POST['video4name']);
    update_option('ehp2_video4meta', $_POST['video4meta']);
    update_option('ehp2_video4link', $_POST['video4link']);
    update_option('ehp2_video5name', $_POST['video5name']);
    update_option('ehp2_video5meta', $_POST['video5meta']);
    update_option('ehp2_video5link', $_POST['video5link']);
    update_option('ehp2_video6name', $_POST['video6name']);
    update_option('ehp2_video6meta', $_POST['video6meta']);
    update_option('ehp2_video6link', $_POST['video6link']);
    update_option('ehp2_videosite', $_POST['videosite']);
    
    update_option('ehp2_extname', $_POST['extname']);
    update_option('ehp2_extimg', $_POST['extimg']);
    update_option('ehp2_extdisp', $_POST['extdisp']);
    update_option('ehp2_extlink', $_POST['extlink']);
    
    update_option('ehp2_cat1name', $_POST['cat1name']);
    update_option('ehp2_cat1id', $_POST['cat1id']);
    update_option('ehp2_cat2name', $_POST['cat2name']);
    update_option('ehp2_cat2id', $_POST['cat2id']);
    update_option('ehp2_cat3name', $_POST['cat3name']);
    update_option('ehp2_cat3id', $_POST['cat3id']);
    update_option('ehp2_cat4name', $_POST['cat4name']);
    update_option('ehp2_cat4id', $_POST['cat4id']);
    
    update_option('ehp2_siteabouttitle', $_POST['siteabouttitle']);
    update_option('ehp2_siteaboutcontent', $_POST['siteaboutcontent']);
    
    update_option('ehp2_con1name', $_POST['con1name']);
    update_option('ehp2_con1icon', $_POST['con1icon']);
    update_option('ehp2_con1link', $_POST['con1link']);
    update_option('ehp2_con2name', $_POST['con2name']);
    update_option('ehp2_con2icon', $_POST['con2icon']);
    update_option('ehp2_con2link', $_POST['con2link']);
    update_option('ehp2_con3name', $_POST['con3name']);
    update_option('ehp2_con3icon', $_POST['con3icon']);
    update_option('ehp2_con3link', $_POST['con3link']);
    
    update_option('ehp2_cp1', $_POST['cp1']);
    update_option('ehp2_cp2', $_POST['cp2']);
}

function ehp2_linkhuboptions_page(){
    if ( $_POST['update_linkhuboptions'] == 'true' ) { ehp2_linkhuboptions_update(); }
?>
    <h2>Link Hub Congfiguration</h2>
    <form method="POST" action="">
    <br>
    <input type="hidden" name="update_linkhuboptions" value="true" />
<?php
    for ( $l = 1; $l < 5; $l++ ){
?>
        <p><b style="font-weight: bold">Link Hub <?php echo $l ?>: </b></p>
        <p>Title: <input type="text" name="hub<?php echo $l ?>name" id="hub<?php echo $l ?>name" size="60" value="<?php echo get_option('ehp2_hub'.$l.'name'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;Icon: <input type="text" name="hub<?php echo $l ?>icon" id="hub<?php echo $l ?>icon" size="5" value="<?php echo get_option('ehp2_hub'.$l.'icon'); ?>"/></p>
        <p>
<?php
        for ( $i = 1; $i < 11; $i++){
?>
            Name: <input type="text" name="h<?php echo $l ?>l<?php echo $i ?>name" id="h<?php echo $l ?>l<?php echo $i ?>name" size="30" value="<?php echo get_option('ehp2_h'.$l.'l'.$i.'name'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;Discription: <input type="text" name="h<?php echo $l ?>l<?php echo $i ?>disp" id="h<?php echo $l ?>l<?php echo $i ?>disp" size="40" value="<?php echo get_option('ehp2_h'.$l.'l'.$i.'disp'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;Link: <input type="text" name="h<?php echo $l ?>l<?php echo $i ?>link" id="h<?php echo $l ?>l<?php echo $i ?>link" size="40" value="<?php echo get_option('ehp2_h'.$l.'l'.$i.'link'); ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;Icon: <input type="text" name="h<?php echo $l ?>l<?php echo $i ?>icon" id="h<?php echo $l ?>l<?php echo $i ?>icon" size="5" value="<?php echo get_option('ehp2_h'.$l.'l'.$i.'icon'); ?>"/><br>
<?php
        }
?>
        </p>
<?php
    }
?>
    <p><input type="submit" class="button-primary" name="bcn_admin_options" value="Update"/></p>
    </form>
<?php
}

function ehp2_linkhuboptions_update(){
    for ( $l = 1; $l < 5; $l++ ){
        update_option('ehp2_hub'.$l.'name', $_POST['hub'.$l.'name']);
        update_option('ehp2_hub'.$l.'icon', $_POST['hub'.$l.'icon']);
        for ( $i = 1; $i < 11; $i++ ){
            update_option('ehp2_h'.$l.'l'.$i.'name', $_POST['h'.$l.'l'.$i.'name']);
            update_option('ehp2_h'.$l.'l'.$i.'disp', $_POST['h'.$l.'l'.$i.'disp']);
            update_option('ehp2_h'.$l.'l'.$i.'link', $_POST['h'.$l.'l'.$i.'link']);
            update_option('ehp2_h'.$l.'l'.$i.'icon', $_POST['h'.$l.'l'.$i.'icon']);
        }
    }
}

add_action('admin_menu', 'ehp2_themeoptions_admin_menu');



/**
 * Remove Open Sans from Google fonts
 */
if (!function_exists('remove_wp_open_sans')) :
    function remove_wp_open_sans() {
        wp_deregister_style( 'open-sans' );
        wp_register_style( 'open-sans', false );
    }
    add_action('wp_enqueue_scripts', 'remove_wp_open_sans');
    add_action('admin_enqueue_scripts', 'remove_wp_open_sans');
endif;

/**
 * Style the dashboard
 */
function ehp_admin_page(){
	//echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_url').'admin.css" />';
}
add_action('admin_head', 'ehp_admin_page');

/**
 * Modify dashboard footer
 */
function remove_footer_admin () {
    echo 'Powered by WordPress&nbsp;&nbsp;|&nbsp;&nbsp;Designed by <a href="mailto:gary.sun@autodesk.com">Gary Sun</a>&nbsp;&nbsp;|&nbsp;&nbsp;Copyright&copy 2014 Autodesk,Inc.';
}
add_filter('admin_footer_text', 'remove_footer_admin');

/**
 * Limit Dashboard's Access
*/
function limit_admin_access() {
    if( !current_user_can( 'administrator' ) && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
        //wp_die('<script>location.href="'.home_url().'"</script>');
        wp_die('You are not allowed to access this page. You can go back to the <a href="'.home_url().'">Home Page</a>.');
        exit;
    }
}
add_action( 'admin_init', 'limit_admin_access', 1 );

/**
 * Enqueue scripts and styles for the front end.
 */
/*
function ehp2theme_scripts(){
	// Load our main stylesheet.
	//wp_enqueue_style( 'ehp2theme-style', get_stylesheet_uri(), array() );
    wp_enqueue_script('jquery');
	wp_enqueue_script('ehp2-script', get_template_directory_uri() . '/resources/scripts/layout.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'ehp2theme_scripts');
*/

/**
 * Format the_excerpt()
 */
function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return ' ...';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Callback function for showing comments
 */
function ehp2_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	<cite class="fn">
    <?php echo get_comment_author()//the_author_posts_link(); ?>
    </cite>
    <span class="says">replied on </span>
    <span class="comment-meta commentmetadata">
		<?php
			/* translators: 1: date, 2: time */
			printf( __('%1$s  %2$s'), get_comment_date(),  get_comment_time() ); ?><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
		?>
	</span>
	</div>
	<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
		<br />
	<?php endif; ?>

	<?php comment_text(); ?>

	<div class="reply">
	<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}

/**
 * Customeize Login Page
 */
function custom_login() {
	echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('stylesheet_url').'" />';
}
add_action('login_head', 'custom_login');

function ehp_login_message($message){
    if( empty($message) ){
        return '<p class="message">Username is your domain account, no "ads\" needed.</p>';
    }
    else {
        return $message;
    }
}
add_filter('login_message', 'ehp_login_message');

function failed_login() {
    return '<strong>Error:</strong> Wrong password or your login session has expired, please try again.';
}
add_filter('login_errors', 'failed_login');

function ehp_login_footer() {
    echo '<p style="text-align:center">Copyright &copy; 2014 Autodesk, Inc.<br>All rights reserved.</p>';
}
//add_action('login_footer', 'ehp_login_footer');

/**
 * Get Features' Files
 */
if(!defined('EHP_BASE_DIR')) {
	define('EHP_BASE_DIR', dirname(__FILE__));
}
include( EHP_BASE_DIR . '/features/loveblog/love-functions.php' );
?>