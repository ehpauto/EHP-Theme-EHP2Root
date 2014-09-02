<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage ehp2
 */

get_header(); ?>

<div id="ehp-body" class="ehp-contentframe">
    <form role="search" method="get" class="searchform clearfix" action="<?php echo home_url( '/' ); ?>" style="margin: 20px 0;">
        <input id="ehp-sidebarsearch-text" style="width: 50%" type="text" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php _e('Search...')?>" required="required" /><input type="submit" value="Search" />
    </form>
    <div class="ehp-postlist">
	<?php if ( have_posts() ) : ?>
        <h1 class="page-title"><?php printf( __( 'Search Results for: %s' ), get_search_query() ); ?></h1>
        <?php
            while ( have_posts() ) : the_post();
                get_template_part( 'templates/postindex' ); 
            endwhile;
            get_template_part( 'templates/postindex', 'nav' ); 

        else :
            get_template_part( 'templates/postindex', 'nocontents' );
        endif;
    ?>
	</div>
</div>
<?php
get_footer();
