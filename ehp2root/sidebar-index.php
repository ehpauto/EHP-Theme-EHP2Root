<?php
/**
 * The Main Sidebar
 *
 * @package WordPress
 * @subpackage ehp2
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
}
?>  

<h1 class="ehp-widget-title"><span class="icon-3"></span>Welcome to EHP</h1>
<?php
    if( ! is_user_logged_in() ) {
?>
        <form action="<?php bloginfo('url'); ?>/wp-login.php" id="ehp-sidebarlogin" method="post">
            <label>Username:</label><br><input type="text" name="log" id="user_login" />
            <br><label>Password:</label><br><input type="password" name="pwd" id="user_pass" />
            <br><input type="checkbox" name="rememberme" value="forever" id="rememberme" /><label>&nbsp;Remember Me</label>
            <br><input type="submit" name="wp-submit" id="wp-submit" class="" value="Log In" />
        </form>
<?php
    }
    else {
        global $current_user;
        get_currentuserinfo();
?>
        <div id="ehp-sidebarlogin-info">
        <?php echo get_avatar( $user_ID, '36'); ?><p>
        Hi, <span class="ehp-highlightColor"><?php echo $current_user->display_name ?></span>
        <br><span style="font-weight: 300;"><?php echo $current_user->job_title ?></span></p>
        
        <aside>
        <div class="ehp-2ndColor" style="text-transform: uppercase; font-size: 12px; font-weight: 400; margin: 10px 0 3px 0">Your Blogs:</div>
<?php
        $args = array(
            'author'            =>  $user_ID,
            'orderby'           =>  'date',
            'order'             =>  'DESC',
            'post_type'         =>  'post',
            'post_status'       =>  array('draft', 'publish'),
            'posts_per_page'    =>  3
        );
        $the_query = new WP_Query( $args ); 

        if ( $the_query->have_posts() ) : 
?>
            <ul>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>
                <li id="ehp-sidebarallbloglink"><a href="/my-posts/">View all your blogs...</a></li>
            </ul>
<?php 
        wp_reset_postdata();
        else : 
?>
            <ul><li><i style="color: #889;"><?php _e( 'You have no blogs in EHP, write one now?' ); ?></i></li></ul>
<?php   
        endif; 
?>     
            <div style="text-align: center; margin: 8px 0 12px 0;"><a class="ehp-button" href="/my-posts/?task=new" target="_blank">Write A Blog</a></div>
        </aside>
        <aside>
        <div class="ehp-2ndColor" style="text-transform: uppercase; font-size: 12px; font-weight: 400; margin: 10px 0 3px 0">Your Liked Blogs:</div>
<?php
        $loved = get_user_option( 'ehp_user_loves', $user_ID );
        if ( is_array($loved) ){
            $args = array( 
                'post__in'              =>  $loved,
                'post_type'             =>  'post',
                'ignore_sticky_posts'   =>  1,
                'posts_per_page'        =>  3
            );
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) : 
?>
                <ul>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; ?>
                    <li id="ehp-sidebarallbloglink"><a href="/lovedblogs/">View all your liked blogs...</a></li>
                </ul>
<?php 
            wp_reset_postdata();
            else : 
?>
                <ul><li><i style="color: #889;"><?php _e( 'You have not liked a blog.' ); ?></i></li></ul>
<?php  
            endif;
        }
        else{
?>
            <ul><li><i style="color: #889;"><?php _e( 'You have not liked a blog.' ); ?></i></li></ul>
<?php
        }
        //
?>
        </aside>
        
        <div style="margin: 5px 0 0 50px; font-size: 12px; text-transform: uppercase; font-style: italic; text-align: right"><a href="/wp-login.php?action=logout&redirect_to=<?php bloginfo('url'); ?>">Log Out ?</a></div>
<?php 
        if (in_array( 'administrator', (array) wp_get_current_user()->roles ) ){
            echo '<div id="ehp-admintool">* You are site admin, manage the site via <a href="'.site_url().'/wp-admin/" style="">Dashboard <span class="icon-575"></span></a></div>';  
        } 
?>
        </div>
<?php       
    }
    dynamic_sidebar( 'sidebar-1' ); 
?>