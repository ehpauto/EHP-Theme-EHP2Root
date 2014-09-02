<?php
/**
 * Search form template
 *
 * @package ehp2
 */
?>
<h1 class="ehp-widget-title">Search</h1>
<div id="ehp-sidebarsearch">
<form role="search" method="get" class="searchform clearfix" action="<?php echo home_url( '/' ); ?>">
	<div id="ehp-sidebarsearch-text-div"><input id="ehp-sidebarsearch-text" type="text" value="" name="s" placeholder="<?php _e('Search...')?>" required="required" /></div><input id="ehp-sidebarsearch-button" type="submit" value="Go" />
</form>
</div>