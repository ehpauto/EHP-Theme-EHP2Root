<div class="ehp-index-meta">
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
    <h2><a href="<?php the_permalink(); ?>">
    <?php 
        the_title();
        if (frontier_can_edit($post->post_date, $post->comment_count) == true){
    ?>
			<a title="edit" href="<?php echo $frontier_permalink; ?><?php echo $concat;?>?task=edit&postid=<?php echo $post->ID;?>" style="margin-left: 10px;"><span class="ehp-blogactionicon icon-11"></span></a>&nbsp;&nbsp;
    <?php
		}
        if (frontier_can_delete($post->post_date, $post->comment_count) == true){
    ?>
            <a href="#" title="delete" onclick="if(confirm('<?php _e('Are you sure you want to delete this post?', 'frontier-post')?>')){location.href='<?php echo $frontier_permalink;?><?php echo $concat;?>?task=delete&postid=<?php echo $post->ID;?>'}" ><span class="ehp-blogactionicon icon-401"></span></a>
    <?php
        }
    ?></a></h2>
    <div class="ehp-index-content ehp-3rdColor"><?php the_excerpt(); ?></div>
    <h6><span class="icon-202" title="Category"></span><?php echo get_the_category_list( ', ', '', $post->ID ); the_tags('<span class="icon-117" title="Tag"></span>',', ','');?></h6>
    <div class="ehp-index-metaarea">
        <span class="icon-900 ehp-metabg" title="12 users love this blog"><p><?php echo ehp_get_love_count($post->ID) ?></p></span>
        <span class="icon-901 ehp-metabg" title="<?php comments_number('No Comments', '1 Comment', '% Comments'); ?>"><p><?php comments_number('0', '1', '%'); ?></p></span>
    </div>
</div>
