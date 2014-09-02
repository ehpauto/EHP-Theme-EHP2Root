<?php get_header(); ?>
    <div id="ehp-body" class="ehp-contentframe">
        <div id="ehp-bodycontent">
            <div id="ehp-layeredIndex" class="ehp-bodycontent">
                <h1 id="ehp-index1" onclick="showIndex(1)"><span class="icon-663"></span><?php echo get_option('ehp2_cat1name'); ?></h1>
                <div id="ehp-indexpanel1" class="ehp-indexpanel">
                    <?php
                        $args = array(
                            'category'      =>  get_option('ehp2_cat1id'), //55
                            'orderby'       =>  'date',
                            'order'         =>  'DESC',
                            'post_type'     => 'post',
                            'post_status'   =>  'publish'
                        );

                        $post_array = get_posts($args);
                        $i = 0;
                        foreach ($post_array as $post) : setup_postdata($post); 
                            get_template_part( 'templates/postindex' );
                            $i++;
                            if ($i > 6){ break; }
                        endforeach; 
                        wp_reset_postdata();
                    ?>
                </div>
                <h1 id="ehp-index2" onclick="showIndex(2)" class="ehp-inactiveIndex"><span class="icon-663"></span><?php echo get_option('ehp2_cat2name'); ?></h1>
                <div id="ehp-indexpanel2" class="ehp-indexpanel">
                    <?php
                        $args = array(
                            'category'      =>  get_option('ehp2_cat2id'), //55
                            'orderby'       =>  'date',
                            'order'         =>  'DESC',
                            'post_type'     => 'post',
                            'post_status'   =>  'publish'
                        );

                        $post_array = get_posts($args);
                        $i = 0;
                        foreach ($post_array as $post) : setup_postdata($post); 
                            get_template_part( 'templates/postindex' );
                            $i++;
                            if ($i > 6){ break; }
                        endforeach; 
                        wp_reset_postdata();
                    ?>
                </div>
                <h1 id="ehp-index3" onclick="showIndex(3)" class="ehp-inactiveIndex"><span class="icon-663"></span><?php echo get_option('ehp2_cat3name'); ?></h1>
                <div id="ehp-indexpanel3" class="ehp-indexpanel">
                    <?php
                        $args = array(
                            'category'      =>  get_option('ehp2_cat3id'), //55
                            'orderby'       =>  'date',
                            'order'         =>  'DESC',
                            'post_type'     => 'post',
                            'post_status'   =>  'publish'
                        );

                        $post_array = get_posts($args);
                        $i = 0;
                        foreach ($post_array as $post) : setup_postdata($post); 
                            get_template_part( 'templates/postindex' );
                            $i++;
                            if ($i > 6){ break; }
                        endforeach; 
                        wp_reset_postdata();
                    ?>
                </div>
                <h1 id="ehp-index4" onclick="showIndex(4)" class="ehp-inactiveIndex"><span class="icon-663"></span><?php echo get_option('ehp2_cat4name'); ?></h1>
                <div id="ehp-indexpanel4" class="ehp-indexpanel">
                    <?php
                        $args = array(
                            'category'      =>  get_option('ehp2_cat4id'), //55
                            'orderby'       =>  'date',
                            'order'         =>  'DESC',
                            'post_type'     => 'post',
                            'post_status'   =>  'publish'
                        );

                        $post_array = get_posts($args);
                        $i = 0;
                        foreach ($post_array as $post) : setup_postdata($post); 
                            get_template_part( 'templates/postindex' );
                            $i++;
                            if ($i > 6){ break; }
                        endforeach; 
                        wp_reset_postdata();
                    ?>
                    <div id="ehp-blog-buttons">
                        <div class="ehp-largebutton"><a href="<?php bloginfo('url'); ?>/my-posts/?task=new" target=_blank>Write Blog</a></div>
                    </div>
                </div>
                <?php get_sidebar('bodybottom'); ?>
            </div>
            <div style="clear: both"></div>
        </div>
        <div id="ehp-sidebar">        
            <?php get_sidebar('index'); ?>
        </div>
    </div>
<?php get_footer(); ?>
