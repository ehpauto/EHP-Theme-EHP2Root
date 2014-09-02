<?php
/**
 * The template for displaying Author archive pages
 * @package WordPress
 * @subpackage ehp2
 */

get_header(); ?>
<div id="ehp-body" class="ehp-contentframe">
    <div class="ehp-postlist">
	<?php if ( have_posts() ) : ?>
        <h1>
            <?php
                the_post();
                printf( __( '<span class="icon-14"></span>EHP Author: <b>%s</b>'), get_the_author() );
            ?>
        </h1>
        <?php if ( get_the_author_meta( 'description' ) ) : ?>
            <div class="ehp-author-description">
                <span class="icon-667"></span><?php the_author_meta( 'description' ); ?><br>
                <span class="icon-667"></span>Email: <a href="mailto: <?php the_author_meta( 'user_email' ); ?>"><?php the_author_meta( 'user_email' ); ?></a><br>
                <p class="ehp-highlightColor"><span class="icon-90"></span>&nbsp;&nbsp;ARTICLES:</p>
            </div>
		<?php endif; ?>
    <?php
            rewind_posts();
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