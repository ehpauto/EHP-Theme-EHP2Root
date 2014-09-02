<?php get_header(); ?>
    <div id="ehp-banner" class="ehp-contentframe">
        <div id="ehp-linkhub">
            <ul id="ehp-linkhub-tabs">
            <?php 
                for ($l = 1; $l < 5; $l++){
                    if ($l == 1){
            ?>
                        <li id="ehp-linkhub-tab<?php echo $l ?>" onclick="showLinkArea(<?php echo $l ?>)" class="ehp-linkhub-tab-active"><span class="icon-<?php echo get_option('ehp2_hub'.$l.'icon'); ?>"></span><?php echo get_option('ehp2_hub'.$l.'name'); ?><span class="icon-715 ehp-linkhub-tabarrow"></span></li>
            <?php        
                    }
                    else {
                        if (get_option('ehp2_hub'.$l.'name')){
            ?>
                            <li id="ehp-linkhub-tab<?php echo $l ?>" onclick="showLinkArea(<?php echo $l ?>)" class=""><span class="icon-<?php echo get_option('ehp2_hub'.$l.'icon'); ?>"></span><?php echo get_option('ehp2_hub'.$l.'name'); ?><span class="icon-715 ehp-linkhub-tabarrow"></span></li>
            <?php
                        }
                    }
                }
            ?>
            </ul>
            <?php 
                for ($l = 1; $l < 5; $l++){
                    if ($l == 1){
            ?>
                        <div id="ehp-linkhub-area<?php echo $l ?>" class="ehp-linkhub-area ehp-linkhub-area-active" style="display: inline-block;">
            <?php
                    }
                    else {
            ?>
                        <div id="ehp-linkhub-area<?php echo $l ?>" class="ehp-linkhub-area" style="display: none;">
            <?php
                    }
                    for ($i = 1; $i < 11; $i++){
                        if ( get_option('ehp2_h'.$l.'l'.$i.'name') ){
            ?>
                            <span class="ehp-linkhub-link"><a href="<?php echo get_option('ehp2_h'.$l.'l'.$i.'link'); ?>"><span class="ehp-icon icon-<?php echo get_option('ehp2_h'.$l.'l'.$i.'icon'); ?>"></span><div><p><?php echo get_option('ehp2_h'.$l.'l'.$i.'name'); ?></p><?php echo get_option('ehp2_h'.$l.'l'.$i.'disp'); ?></div></a></span>
            <?php
                        }
                    }
            ?>
                        </div>
            <?php
                }
            ?>
        </div><div id="ehp-banner-widget" >
            <div id="ehp-topannounce-area">
                <h1><span class="icon-14"></span>Blog @ Engineer's Home Page</h1>
                <div>
                    How might we become more innovative? Think in terms of information blogs, code reusability, engineering transformation, and so on.<p>We welcome you to start blogging on the Engineer's Home Page!</p>
                    <a class="ehp-button" href="/my-posts/?task=new">Write A Blog</a>
                </div>
            </div>
        </div>
    </div>
    <div id="ehp-body" >
        <div class="ehp-contentframe" style="padding-bottom: 15px">
            <div>
                <div id="ehp-topvideos" class="ehp-bodycontent">
                    <h1><span class="icon-737"></span><?php echo get_option('ehp2_up_title'); ?></h1>
                    <div class="ehp-videopanel-left">
                        <div id="ehp-engupdate">
                            <ul>
                                <li><a href="<?php echo get_option('ehp2_up1id'); ?>" target=_blank><?php echo get_option('ehp2_up1name'); ?></a></li>
                                <li><a href="<?php echo get_option('ehp2_up2id'); ?>" target=_blank><?php echo get_option('ehp2_up2name'); ?></a></li>
                                <li><a href="<?php echo get_option('ehp2_up3id'); ?>" target=_blank><?php echo get_option('ehp2_up3name'); ?></a></li>
                                <li><a href="<?php echo get_option('ehp2_up4id'); ?>" target=_blank><?php echo get_option('ehp2_up4name'); ?></a></li>
                                <li><a href="<?php echo get_option('ehp2_up5id'); ?>" target=_blank><?php echo get_option('ehp2_up5name'); ?></a></li>
                            </ul>
                        </div>
                        <div style="clear: both"></div>
                    </div><div class="ehp-videopanel-right">
                        <h2 class="ehp-hightlightColor" style="display: none">VIDEOS:</h2>
                        <div id="ehp-topvideo-pre" class="ehp-topvideo-inactivenav" onclick="scrollVideo('up')"><span class="icon-665"></span></div>
                        <div class="ehp-topwatchvideos">
                            <div id="ehp-topvideopanel">
                                <ul>
                                <?php
                                    for ($i = 1; $i < 7; $i++){
                                ?><li id="ehp-topvideoli<?php echo $i ?>"><iframe frameborder="0" seamless="seamless" src="<?php echo get_option('ehp2_video'.$i.'link'); ?>"></iframe><div class=""><?php echo get_option('ehp2_video'.$i.'name'); ?></div></li><?php
                                    }
                                ?>
                                </ul>
                                <div style="clear: both"></div>
                            </div>
                            <div style="clear: both"></div>
                        </div>
                        <div id="ehp-topvideo-next" onclick="scrollVideo('down')"><span class="icon-663"></span></div>
                        <div style="clear: both"></div>
                    </div>
                    <div class="ehp-largebutton" style="display: none"><a href="<?php echo get_option('ehp2_videosite'); ?>" target=_blank>View More</a></div>
                </div>
            </div>
            <div style="clear: both"></div>
        </div>
        
        <div class="ehp-contentframe" style="display: none;">
            <div class="ehp-bodycontent">
                <h1><span class="icon-14"></span>Blog @ Engineer Home Page</h1>
                <div style="font-weight: 400">The Engineer's Home Page is a knowledge shareing hub with collective intelligence, we welcome you to start blog on Engineer's Home Page!</div>
                <div style="text-align: right"><a class="ehp-button" href="/my-posts">ALL MY BLOGS</a>&nbsp;&nbsp;<a class="ehp-button" href="/my-posts/?task=new">WRITE BLOG</a></div>
                <div style="clear: both"></div>
            </div>
            <div style="clear: both"></div>
        </div>
        
        <div class="ehp-contentframe" id="ehp-highlightnews" style="">
            <div class="ehp-bodyleftframe">
                <div class="ehp-bodycontent">
                    <h1><span class="icon-115"></span><?php echo get_option('ehp2_cat1name'); ?></h1>
                    <div class="ehp-indexpanel" style="display: block;">
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
                                get_template_part( 'templates/postindex', 'highlights' );
                                $i++;
                                if ($i > 2){ break; }
                            endforeach; 
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <div style="clear: both"></div>
            </div>
            <div id="ehp-highlightextnews">        
                <div class="ehp-bodycontent">
                <?php
                    if (get_option('ehp2_extname')){
                ?>
                        <h1><span class="icon-60"></span><?php echo get_option('ehp2_extname'); ?></h1>
                <?php
                        if (get_option('ehp2_extimg')){
                ?>
                            <img src="<?php echo get_option('ehp2_extimg'); ?>" />
                <?php
                        }
                ?>
                        <p><?php echo get_option('ehp2_extdisp'); ?></p>
                        <a class="ehp-button" href="<?php echo get_option('ehp2_extlink'); ?>" target=_blank>DETAILS</a>
                <?php
                    }
                ?>
                    
                </div>
            </div>
            <div style="clear: both"></div>
        </div>
        
        <div class="ehp-contentframe">
            <div class="ehp-bodyleftframe">
                <div class="ehp-bodycontent" style="display: none;">
                    <?php get_sidebar('bodymiddle'); ?>
                </div>
                <div id="ehp-layeredIndex" class="ehp-bodycontent">
                    <h1 id="ehp-index2" onclick="showIndex(2)"><span class="icon-663"></span><?php echo get_option('ehp2_cat2name'); ?></h1>
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
                                get_template_part( 'templates/postindex', 'meta' );
                                $i++;
                                if ($i > 6){ break; }
                            endforeach; 
                            wp_reset_postdata();
                        ?>
                        <div id="ehp-blog-buttons">
                            <div class="ehp-largebutton"><a href="<?php bloginfo('url'); ?>/my-posts/?task=new" target=_blank>Write A Blog</a></div>
                        </div>
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
                                get_template_part( 'templates/postindex', 'meta' );
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
                                get_template_part( 'templates/postindex', 'meta' );
                                $i++;
                                if ($i > 6){ break; }
                            endforeach; 
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <div class="ehp-bodycontent">
                    <?php get_sidebar('bodybottom'); ?>
                </div>
                <div style="clear: both"></div>
            </div>
            <div id="ehp-sidebar" class="ehp-bodycontent">        
                <?php get_sidebar('index');  ?>
            </div>
            <div style="clear: both"></div>
        </div>
    </div>
<?php get_footer(); ?>
