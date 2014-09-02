<!DOCTYPE html>
<html>
<head>
    <title>Search - <?php bloginfo('name'); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/resources/styles/ehp-slimmenu.css" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/resources/styles/icons.css" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/resources/styles/elasticsearch.css" type="text/css" />
    <link rel="shortcut icon" href=" <?php bloginfo('template_url'); ?>/resources/images/favicon.png" />
    <?php wp_head(); ?>
</head>
<body style="position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
<div id="ehp-frame" style="position: relative; height: 100%; width: 100%; max-width: 100%">
    <div id="ehp-header">
        <nav id="ehp-mainmenu" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'slimmenu') ); ?>
        </nav>
        <div class="ehp-contentframe" id="ehp-elsticsearch">
            <div id="ehp-sitetitle" style="text-align: center; min-height: 200px;">
                <a href="<?php bloginfo('url'); ?>"><div id="ehp-maintitle" style="width: auto; text-align: left; margin-top: 120px;"><?php bloginfo('name'); ?> &bull; <span class="ehp-highlightColor">Search</span>
                    <div id="ehp-description" class="ehp-2ndColor">SEARCH EVERYTHING OVER AUTODESK NETWORK</div>
                </div></a>
                <form style="margin-top: 40px;">
                    <input type="text" style="width: 40%;" placeholder="Search..."/><input type="submit" value="SEARCH" />
                </form>
            </div>
        </div>
    </div>
    <div id="ehp-body" class="ehp-contentframe" style="min-height: 200px;">   
        <?php
            
        ?>
    </div>
    <div id="ehp-subfooter" class="ehp-contentframe" style="position: absolute; bottom: 0; left: 0; right: 0; border-top: 0px solid #ccd">
        <?php echo get_option('ehp2_cp1'); ?><br><?php echo get_option('ehp2_cp2'); ?>
    </div>
</div>
<?php wp_footer(); ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/resources/plugins/slimmenu/jquery.slimmenu.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/resources/scripts/objects.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/settings/linkhub.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/settings/topvideos.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/resources/scripts/elasticsearch.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/resources/scripts/layout.js"></script>
</body>
</html>
