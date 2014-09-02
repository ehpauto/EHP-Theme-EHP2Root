<!DOCTYPE html>
<html>
<head>
    <title><?php bloginfo('name'); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/resources/styles/ehp-slimmenu.css" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/resources/styles/icons.css" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
    <link rel="shortcut icon" href=" <?php bloginfo('template_url'); ?>/resources/images/favicon.png" />
    <?php wp_head(); ?>
</head>
<body>
<?php include_once("templates/googleanalytic.php") ?>
<?php 
    if( ! is_user_logged_in() ) {
        echo "<script>location.href='/wp-login.php?redirect_to=".add_query_arg(array())."';</script></body></html>";
    }
?>
<div id="ehp-frame">
    <div id="ehp-header">
        <div id="ehp-topbar">
            <div id="ehp-topbar-content" class="ehp-contentframe" ><a href="mailto:ehp.dev.team@autodesk.com"><span class="icon-611" style="font-size: 14px;"></span>&nbsp;&nbsp;GIVE FEEDBACK</a><span id="ehp-topAD">Try Engineer's Home Page on mobile devices!</span></div>
            <div id="ehp-topbar-meta" style="display: none;"><?php //wp_loginout(); wp_meta(); ?><a href="<?php bloginfo('url'); ?>/wp-admin/index.php">Dashboard&nbsp;&nbsp;&nbsp;<span class="icon-324"></span></a></div>
            <nav id="ehp-2ndmenunav" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_class' => 'ehp-2ndmenu') ); ?>
            </nav>
        </div>
        <div class="ehp-contentframe">
            <div id="ehp-sitetitle" >
                <a href="<?php bloginfo('url'); ?>"><div id="ehp-maintitle"><?php bloginfo('name'); ?>
                    <div id="ehp-description" class="ehp-highlightColor"><?php //bloginfo('description'); ?><span style="color: #606080; display: none;" >&nbsp;&bull;&nbsp;</span><span id="ehp-subtitle" class="ehp-2ndColor"><?php echo get_option('ehp2_subtitle'); ?></span></div>
                </div></a>
                <div id="ehp-headersearchframe">
                    <?php include(TEMPLATEPATH . '/templates/headersearchform.php'); ?>
                </div>
            </div>
        </div>
        <nav id="ehp-mainmenu" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'slimmenu') ); ?>
        </nav>
    </div>

