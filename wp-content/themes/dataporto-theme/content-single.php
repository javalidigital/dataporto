<?php
/**
 * @package Dataporto Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-header">
		<div class="post-date">
			<?php the_time('l\, j \d\e F \d\e Y'); ?>
		</div>
		<?php the_title( '<h2 class="post-title">', '</h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="post-content">
		<?php if( strpos(get_the_content(), '<span id="more-') ) : ?>
		  <div class="post-excerpt">
			<?php global $more; $more=0; the_content(''); $more=1; ?>
		  </div>
		<?php endif; ?>		     
		<?php the_content('', true); ?>	
	</div><!-- .entry-content -->

	<footer class="post-footer">
		<div class="post-tags">
			 <?php the_tags('Tags: ', ', ', ''); ?> 
		</div>
		<div class="post-social">
			<?php if(function_exists('kc_add_social_share')) kc_add_social_share(); ?>
		</div>
		<?php edit_post_link( __( 'Edit', 'dataporto-theme' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
