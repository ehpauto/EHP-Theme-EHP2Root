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
    
</div>
