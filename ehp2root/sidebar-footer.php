<?php
/**
 * The Footer Sidebar
 *
 * @package WordPress
 * @subpackage ehp2
 */

if ( ! is_active_sidebar( 'sidebar-3' ) ) {
	return;
}
?>

<div id="ehp-footerwidget">
    <?php dynamic_sidebar( 'sidebar-3' ); ?>
</div>
