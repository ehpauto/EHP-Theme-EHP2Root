<?php
/**
 * The Body-Bottom Sidebar
 *
 * @package WordPress
 * @subpackage ehp2
 */

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>

<div id="ehp-bodywidget">
    <?php dynamic_sidebar( 'sidebar-2' ); ?>
</div>
