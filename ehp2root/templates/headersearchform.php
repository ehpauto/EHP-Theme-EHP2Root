<?php
/**
 * Page header search form template
 *
 * @package ehp2
 */
?>
<div id="ehp-headersearch">
<form role="search" method="get" class="searchform clearfix" action="<?php echo home_url( '/' ); ?>">
	<div id="ehp-headersearch-text-div"><input id="ehp-headersearch-text" type="text" value="" name="s" placeholder="<?php _e('Search...')?>" required="required" /></div><input id="ehp-headersearch-button" type="submit" value="SEARCH" />
</form>
</div>