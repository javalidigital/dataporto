<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dataporto Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="archive-item">
		<span class="archive-item-date">
			<?php the_time('l\, j \d\e F \d\e Y'); ?>
		</span>
		<h2 class="archive-item-title">
			<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h2>
		<div class="archive-item-content">
				<?php global $more;
				$more = 0;
				the_content('');
				?>
				
		</div>						
	</div>
</article><!-- #post-## -->