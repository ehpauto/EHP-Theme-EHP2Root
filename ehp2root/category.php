<?php
/**
 * The template for displaying Category pages
 *
 * @package WordPress
 * @subpackage ehp2
 */

get_header(); ?>
<div id="ehp-body" class="ehp-contentframe">
    <div class="ehp-postlist">
	<h1 class="page-title">
         <?php printf( __( '<span class="icon-202"></span>Category Archives: <b>%s</b>' ), single_cat_title( '', false ) ); ?>
    </h1>
    <?php if ( have_posts() ) : 
            while ( have_posts() ) : the_post();
                get_template_part( 'templates/postindex', 'meta' );    
            endwhile;
            get_template_part( 'templates/postindex', 'nav' ); 
        else :
            get_template_part( 'templates/postindex', 'nocontents' );
        endif;
    ?>
    </div>
    </div>
<?php get_footer(); ?>