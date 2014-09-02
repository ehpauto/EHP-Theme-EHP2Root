<?php
/**
 * The Template for displaying all single pages
 *
 * @package WordPress
 * @subpackage ehp2
 */

get_header(); ?>
<div id="ehp-body" class="ehp-contentframe">   
    <?php
        if ( have_posts() ) : the_post(); 
            if ( ($post -> post_name) == 'my-posts' ) {
    ?>          
                <div id="ehp-page-<?php the_ID(); ?>" class="ehp-bodycontent">                   
    <?php               
                    if( ! is_user_logged_in() ) {
    ?>                  
                        <div style="width: 400px">
                            <h1>Please login:</h1>
                            <form action="<?php bloginfo('url'); ?>/wp-login.php?redirect_to=<?php bloginfo('url'); ?>/my-posts/?task=new" id="ehp-sidebarlogin" method="post">
                                <label>Username:</label><br><input type="text" name="log" id="user_login" />
                                <br><label>Password:</label><br><input type="password" name="pwd" id="user_pass" />
                                <br><input type="checkbox" name="rememberme" value="forever" id="rememberme" /><label>&nbsp;Remember Me</label>
                                <br><input type="submit" name="wp-submit" id="wp-submit" class="" value="Log In" />
                            </form>
                        </div>
    <?php
                    }
                    else {
                        the_content();
                        link_pages('<p>Pages: ', '</p>', 'number');
                    }
    ?>
                </div>
    <?php   
            }
            else {
    ?>
                <div class="ehp-bodyleftframe">
                    <div id="ehp-page-<?php the_ID(); ?>" class="ehp-bodycontent">
                        <h1><span class="icon-500"></span><?php the_title(); ?></h1>
                        <div class="ehp-pagecontent">
        <?php    
                            the_content();
                            link_pages('<p>Pages: ', '</p>', 'number');
        ?>        
                        </div>
                    </div>
                </div>
                <div id="ehp-sidebar" class="ehp-bodycontent" style="margin-top: -7px;">        
                    <?php get_sidebar('index'); ?>
                </div>
    <?php        
                //edit_post_link('Edit', '<div class="ehp-post-edit-link ehp-highlightColor"><span class="icon-11"></span>&nbsp;&nbsp;', '</div>');
            }
        endif;
    ?>  
</div>
<?php get_footer(); ?>
