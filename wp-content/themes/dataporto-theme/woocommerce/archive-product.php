
<div class="featured clearfix">
	<div class="title-category">
		<h4 class="page-title"><?php woocommerce_page_title(); ?></h4>
	</div>		
	<?php do_action( 'woocommerce_archive_description' ); ?>
</div>
<div class="archive-container clearfix">
	<div class="title-category">
		<h4>Arquivo</h4>
	</div>	
	<?php if ( have_posts() ) : ?>	

		<?php woocommerce_product_loop_start(); ?>			

			<?php while ( have_posts() ) : the_post(); ?>

				<?php wc_get_template_part( 'content', 'product' ); ?>

			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>		

	<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

		<?php wc_get_template( 'loop/no-products-found.php' ); ?>

	<?php endif; ?>
</div>