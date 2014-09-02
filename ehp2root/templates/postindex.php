<div class="ehp-index">
    <div class="ehp-index-date">
        <?php
            $dateString = $post->post_date;
            $postyear = substr($dateString, 0, 4);
            $postmonth = substr($dateString, 5, 2);
            $postday = substr($dateString, 8, 2);
        ?>
        <h2><?php echo $postday ?></h2>
        <?php echo $postyear ?>-<?php echo $postmonth ?>
    </div>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="ehp-index-content"><?php the_excerpt(); ?></div>
    <h6><span class="icon-16"></span><?php 
        if (get_the_author() != ''){
            the_author_posts_link(); 
        }
        else {
            echo "ehp_admin";
        }
    ?><span class="icon-202" title="Category"></span><?php echo get_the_category_list( ', ', '', $post->ID ); the_tags('<span class="icon-117" title="Tag"></span>',', ','');?><span class="icon-233"></span><?php comments_number('No Comments', '1 Comment', '% Comments'); ?></h6>
</div>
