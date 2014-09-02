<?php
/**
 * The template for displaying Archive pages
 *
 * @package WordPress
 * @subpackage ehp2
 */

get_header(); ?>
<div id="ehp-body" class="ehp-contentframe">
    <div class="ehp-postlist">
	<?php if ( have_posts() ) : ?>
        <h1>
            <?php
                if ( is_day() ) :
                    printf( __( '<span class="icon-789"></span>Daily Archives: <b>%s</b>' ), get_the_date() );

                elseif ( is_month() ) :
                    printf( __( '<span class="icon-457"></span>Monthly Archives: <b>%s</b>' ), get_the_date( _x( 'F Y', 'monthly archives date format' ) ) );

                elseif ( is_year() ) :
                    printf( __( '<span class="icon-789"></span>Yearly Archives: <b>%s</b>' ), get_the_date( _x( 'Y', 'yearly archives date format' ) ) );
                elseif ( is_tag() ) :
                    printf( __( '<span class="icon-117"></span>Tag Archives: <b>%s</b>' ), single_tag_title( '', false ) );    
                else :
                    _e( 'Archives' );
                endif;
            ?>
        </h1>
    <?php
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