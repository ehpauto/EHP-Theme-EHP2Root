    <div id="ehp-footer-widgetarea">
        <div class="ehp-footer-subarea" id="ehp-siteabout">
            <h1><?php echo get_option('ehp2_siteabouttitle'); ?></h1><?php echo get_option('ehp2_siteaboutcontent'); ?>
        </div><div class="ehp-footer-subarea">
            <h1><span class="icon-111"></span>Archives</h1>
            <ul id="ehp-footer-archives"><?php wp_get_archives('type=monthly&show_post_count=1&limit=7'); ?></ul>
        </div><div class="ehp-footer-subarea">
            <!--
            <h1><span class="icon-120"></span>Tag Cloud</h1>
            <span class="ehp-tag">Cloud</span><span class="ehp-tag">CAD</span><span class="ehp-tag">GPU</span><span class="ehp-tag">Video</span>
            -->
            <?php get_sidebar('footer'); ?>
        </div><div class="ehp-footer-subarea" id="ehp-contactus">
            <h1><span class="icon-154"></span>Contact Us</h1>             
            <span class="ehp-widget-linkitem"><span class="icon-<?php echo get_option('ehp2_con1icon'); ?>"></span><a href="<?php echo get_option('ehp2_con1link'); ?>" target=_blank><?php echo get_option('ehp2_con1name'); ?></a></span>         
            <br /><span class="ehp-widget-linkitem"><span class="icon-<?php echo get_option('ehp2_con3icon'); ?>"></span><a href="<?php echo get_option('ehp2_con3link'); ?>" target=_blank><?php echo get_option('ehp2_con3name'); ?></a></span>
            <div id="ehp-teammemberdiv"><span class="ehp-widget-linkitem"><span class="icon-267"></span><a href="mailto: ehp.dev.team">EHP Team</a></span>
                <ul><li><a href="mailto:gary.sun@autodesk.com">Gary Sun</a> - Software Developer</li>
                <li><a href="mailto:zhenghua.chen@autodesk.com">Sean Chen</a> - Sr. SW Engineer</li>
                <li><a href="mailto:danny.l.chen@autodesk.com">Danny L Chen</a> - Software Engineer</li>
                <li><a href="mailto:anuj.chaudhary@autodesk.com">Anuj Chaudhary</a> - Program Manager</li>
                <li><a href="mailto:ashok.gadangi@autodesk.com">Ashok Gadangi</a> - Sr. Director, Engineering</li>
                </ul>
            </div>
        </div>
    </div>
    <div id="ehp-subfooter" class="ehp-contentframe">
        <?php echo get_option('ehp2_cp1'); ?><br><?php echo get_option('ehp2_cp2'); ?>
    </div>
    <div style="clear: both"></div>
</div>
<?php wp_footer(); ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/resources/plugins/slimmenu/jquery.slimmenu.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/resources/scripts/objects.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/resources/scripts/layout.js"></script>
</body>
</html>

