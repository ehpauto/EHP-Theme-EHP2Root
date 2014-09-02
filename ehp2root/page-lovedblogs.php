<?php
/**
 * The Template for displaying my loved blogs
 *
 * @package ehp2
 */

get_header(); ?>
<div id="ehp-body" class="ehp-contentframe">   
    <div class="ehp-postlist">
	<h1 class="page-title">
         <?php  _e( '<span class="icon-524"></span>Liked Blogs:' ); ?>
    </h1>
<?php
    wp_reset_postdata();
    $loved = get_user_option( 'ehp_user_loves', $user_ID );

    if ( is_array($loved) ){
        $args = array( 
            'post__in'              =>  $loved,
            'post_type'             =>  'post',
            'ignore_sticky_posts'   =>  1
        );
        $the_query = new WP_Query( $args );
        if ( $the_query -> have_posts() ) : 
            while ( $the_query->have_posts() ) : $the_query->the_post();
                get_template_part( 'templates/postindex', 'meta' );    
            endwhile;
            get_template_part( 'templates/postindex', 'nav' ); 
        else :
            get_template_part( 'templates/postindex', 'nocontents' );
        endif;
        wp_reset_postdata();
    }
    else echo 'You have not liked a blog.';
?>  
    </div>
</div>
<?php get_footer(); ?>
