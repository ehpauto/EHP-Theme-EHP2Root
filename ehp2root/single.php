<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage ehp2
 */
get_header(); ?>
    <div id="ehp-body" class="ehp-contentframe">
    <div class="ehp-singlepost">
	<?php
        while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <h3><div class="ehp-postinfocell"><span class="icon-16"></span><?php the_author_posts_link(); ?>&nbsp;&nbsp;<?php echo $post->post_date; ?></div><div class="ehp-postinfocell"><span class="icon-202" title="Category"></span><?php echo get_the_category_list( ', ', '', $post->ID ); ?></div><div class="ehp-postinfocell"><?php   
                the_tags('<span class="icon-117" title="Tag"></span>',', ',''); 
            ?></div><div class="ehp-postinfocell"><span class="icon-233"></span><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></div><div class="ehp-postinfocell"><span class="icon-524"></span><span class="ehp-love-count"><?php echo ehp_get_love_count($post->ID) ?></span> Liked <span class="ehp-love-ops">
            <?php 
                if (ehp_has_user_loved_blog($user_ID, $post->ID)){
                    echo '&bull;&nbsp;You have liked this blog';// . '<a href="#unloveblog" class="ehp-unlovelink" data-post-id="' . $post->ID . '" data-user-id="' . $user_ID .'">unlike it?</a>';
                }
                else {
                    echo '<a href="#loveblog" class="ehp-lovelink" data-post-id="' . $post->ID . '" data-user-id="' . $user_ID .'">like it?</a>';
                }
            
            ?></span></div></h3>
            <div></div>
            
            <div class="ehp-postcontent">
    <?php    
            the_content();
			link_pages('<p>PAGES: ', '</p>', 'number');		  
            edit_post_link('Edit', '<div class="ehp-post-edit-link ehp-highlightColor"><span class="icon-11"></span>&nbsp;&nbsp;', '</div>');
    ?>
            </div>    
    <?php 
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }            
        endwhile; ?>
            <div class="ehp-postnav">
                <?php previous_post_link('Previous article:&nbsp;&nbsp;%link') ?><br><?php next_post_link('Next article:&nbsp;&nbsp;%link') ?>
            </div>
    </div>
    </div>
<?php get_footer(); ?>