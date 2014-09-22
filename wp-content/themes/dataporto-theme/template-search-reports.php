<?php
 
/* Template Name: Reports Search Template */
 
global $post;
 
// retrieve our search query if applicable
$query = isset( $_REQUEST['swpquery'] ) ? sanitize_text_field( $_REQUEST['swpquery'] ) : '';
 
// retrieve our pagination if applicable
$swppg = isset( $_REQUEST['swppg'] ) ? absint( $_REQUEST['swppg'] ) : 1;
 
// begin SearchWP Supplemental Search Engine results retrieval
if( class_exists( 'SearchWP' ) ) {
	// instantiate SearchWP
	$engine = SearchWP::instance();
	$supplementalSearchEngineName = 'search_reports'; // taken from the SearchWP settings screen
 
	// set up custom posts per page
	function mySearchEnginePostsPerPage() {
		return 10; // 10 posts per page
	}
	add_filter( 'searchwp_posts_per_page', 'mySearchEnginePostsPerPage' );
 
	// perform the search
	$posts = $engine->search( $supplementalSearchEngineName, $query, $swppg );
 
	// set up pagination
	$prevPage = $swppg > 1 ? $swppg - 1 : false;
	$nextPage = $swppg < $engine->maxNumPages ? $swppg + 1 : false;
}
// end SearchWP Supplemental Search Engine results retrieval
 
get_header(); ?>
	<?php $thumbnail = esc_url( home_url( 'wp-content/themes/dataporto-theme/images/bkg-section-default.jpg' ) ); ?>
	<div class="section-banner"	style="background:url('<?php echo $thumbnail; ?>') no-repeat center center;">
		<header class="entry-header">
			<h1 class="entry-title">Relat&oacute;rios</h1>
		</header><!-- .entry-header -->
	</div>
	<div class="breadcrumb">
		<?php if(function_exists('bcn_display')) {
			bcn_display();
		}?>
	</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="search clearfix">
				<div class="title-category">
					<h4>Resultados da busca</h4>
				</div>
				<div class="facetwp-template">
					<?php if( !empty( $query ) ) : ?>
						<?php if( !empty( $posts ) ) : ?>
							<?php foreach ( $posts as $post ): setup_postdata( $post ); ?>
								<?php get_template_part( 'content', 'search' ); ?>
							<?php endforeach; ?>
							<!-- begin pagination -->
							 <?php if( $engine->maxNumPages > 1 ) : 
							  echo '<nav class="site-navigation wp-pagenavi">';
							  $max = intval( $engine->maxNumPages );
							 
							  /**ID of your custom search results page here**/
							  $permalink = get_permalink(208); 
							  $prevPage = $swppg > 1 ? $swppg - 1 : false;
							  $nextPage = $swppg < $engine->maxNumPages ? $swppg + 1 : false;
							 
							  /** Add current page to the array */
							  if ( $swppg >= 1 )
							    $links[] = $swppg;
							 
							  /** Add the pages around the current page to the array */
							  if ( $swppg >= 3 ) {
							    $links[] = $swppg - 1;
							    $links[] = $swppg - 2;
							  }
							 
							  if ( ( $swppg + 2 ) <= $max ) {
							    $links[] = $swppg + 2;
							    $links[] = $swppg + 1;
							  } 
							 
							  /** Previous Post Link */
							  if ( $prevPage )
							    printf( '<a href="%s?swpquery=%s&swppg=%s">%s</a>',$permalink, $query, $prevPage,'&laquo;' );
							 
							  /** Link to first page, plus ellipses if necessary */
							  if ( ! in_array( 1, $links ) ) {
							    $class = 1 == $swppg ? ' class="current"' : '';
							 
							    printf( '<a%s href="%s?swpquery=%s&swppg=%s">%s</a>', $class, $permalink, $query, 1,1 );
							 
							    if ( ! in_array( 2, $links ) )
							      echo '<span>&hellip;</span>';
							  }
							 
							  /** Link to current page, plus 2 pages in either direction if necessary */
							  sort( $links );
							  foreach ( (array) $links as $link ) {
							    $class = $swppg == $link ? ' class="current"' : '';
							    printf( '<a%s href="%s?swpquery=%s&swppg=%s">%s</a>', $class, $permalink, $query, $link, $link );
							  }
							 
							  /** Link to last page, plus ellipses if necessary */
							  if ( ! in_array( $max, $links ) ) {
							    if ( ! in_array( $max - 1, $links ) )
							      echo '<span>…</span>' . "\n";
							 
							      $class = $swppg == $max ? ' class="current"' : '';
							      printf( '<a%s href="%s?swpquery=%s&swppg=%s">%s</a>', $class, $permalink, $query, $max, $max );
							    }
							 
							    /** Next Post Link */
							    if ( $nextPage )
							      printf( '<a href="%s?swpquery=%s&swppg=%s">&raquo;</a>',$permalink, $query, $nextPage );
							 
							  echo "</nav>";
							endif; ?>
							<!--end pagination-->
						<?php else: ?>
							<?php get_template_part( 'content', 'none' ); ?>
						<?php endif; ?>
					<?php else: ?>
						
					<?php endif; ?>
				</div>					
			</div>
		</main><!-- #main -->
		<div class="site-sidebar" role="complementary">
			<?php dynamic_sidebar( 'sidebar-reports' ); ?>
		</div>
	</div><!-- #primary -->
<?php get_footer(); ?>