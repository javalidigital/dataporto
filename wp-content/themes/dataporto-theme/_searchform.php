<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php _e( 'Search for:', 'dataporto_theme' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo get_search_query(); ?>" value="" name="s" title="Search for:" />
	</label>
	<input type="submit" class="search-submit" value="&nbsp;" />
</form>