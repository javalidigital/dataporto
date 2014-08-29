<?php
/*
Template Name: Law Template
*/
?>
<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Dataporto Theme
 */

get_header(); ?>
	<?php
		if (function_exists('has_post_thumbnail')) {
	    if ( has_post_thumbnail() ) {
	    	$post_image_id = get_post_thumbnail_id($post_to_use->ID);
	    	if ($post_image_id) {
	    		$thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
	    		if ($thumbnail) (string)$thumbnail = $thumbnail[0];
			}
		} else {
			$thumbnail = esc_url( home_url( 'wp-content/themes/dataporto-theme/images/bkg-section-default.jpg' ) );
		}
	}
	?>
	<div class="section-banner"	style="background:url('<?php echo $thumbnail; ?>') no-repeat center center;">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	</div>
	<div class="breadcrumb">
		<?php if(function_exists('bcn_display')) {
			bcn_display();
		}?>
	</div>
	<div id="primary" class="content-area law">
		<main id="main" class="site-main" role="main">
			<div class="featured clearfix">
				<div class="title-category">
					<h4>Destaques</h4>
				</div>
				<?php
					$args = array(
						'post__in'=>get_option('sticky_posts'),
						'category_name' => 'regulacao-legislacao',
						'posts_per_page' => 4
					);
					$posts_array = get_posts( $args );
				?>							
				<?php
					$i = 1; 
					foreach ( $posts_array as $post ) : setup_postdata( $post );
					$classes = ' ';
					 if ( $i == 1) {
				        $classes .= 'featured-item-first';
				    }
					$i++;
				?>
					<div class="featured-item <?php echo $classes;?>">
						<div class="featured-item-image">
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('thumb'); ?></a>							
						</div>
						<div class="featured-item-contents">
							<span class="featured-item-date">
								<?php the_time('l\, j \d\e F \d\e Y'); ?>
							</span>
							<h1 class="featured-item-title">
								<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</h1>							
							<a class="featured-item-link" href="<?php the_permalink() ?>">Acessar</a>
						</div>
					</div>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>				
			</div>
			<div class="archive clearfix">
				<div class="title-category">
					<h4>Arquivo</h4>
				</div>
				<?php
					$args = array(
						'post__not_in'=>get_option('sticky_posts'),
						'category_name' => 'regulacao-legislacao',
						'posts_per_page' => -1
					);
					$posts_array = get_posts( $args );
				?>							
				<?php foreach ( $posts_array as $post ) : setup_postdata( $post );?>
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
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</main><!-- #main -->
		<div class="site-sidebar" role="complementary">
			<?php dynamic_sidebar( 'sidebar-law' ); ?>
		</div>
	</div><!-- #primary -->
<?php get_footer(); ?>