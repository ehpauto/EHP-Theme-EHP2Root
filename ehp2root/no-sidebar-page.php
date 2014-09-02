<?php
/*
 * Template Name: No Sidebar Page
 */

get_header(); ?>
<div id="ehp-body" class="ehp-contentframe">   
    <?php
        if ( have_posts() ) : the_post(); 
            if ( ($post -> post_name) == 'my-posts' ) {
    ?>   
                <div id="ehp-page-<?php the_ID(); ?>" class="">                   
    <?php                   
                        the_content();
                        link_pages('<p>Pages: ', '</p>', 'number');
    ?>
                </div>
    <?php   
            }
            else {
    ?>
                <div id="ehp-page-<?php the_ID(); ?>" class="ehp-bodycontent">
                    <h1><span class="icon-500"></span><?php the_title(); ?></h1>
                    <div class="ehp-pagecontent">
    <?php    
                        the_content();
                        link_pages('<p>Pages: ', '</p>', 'number');
    ?>        
                    </div>
                </div>
    <?php        
                //edit_post_link('Edit', '<div class="ehp-post-edit-link ehp-highlightColor"><span class="icon-11"></span>&nbsp;&nbsp;', '</div>');
            }
        endif;
    ?>  
</div>
<?php get_footer(); ?>