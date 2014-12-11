<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dataporto Theme
 */

get_header(); ?>
	<?php if (is_home()); ?>
		<div class="slider-home">
			<?php putRevSlider('home') ?>
		</div>
		<div class="services-home clearfix">
			<div class="services-home-title">
				<h2>O que fazemos</h2>
			</div>
			<?php dynamic_sidebar( 'sidebar-services-home' ); ?>
		</div>
	<?php ?>

	<div id="primary" class="content-area">
		<div class="newsletter-home">
			<?php
				if( function_exists( 'mc4wp_form' ) ) {
					mc4wp_form();
				};
			?>
		</div>
		<main id="main" class="site-main" role="main">
			<div class="reports clearfix">
				<div class="title-category">
					<h4>Relat&oacute;rios</h4>
				</div>
				<?php
					$args = array(
						'post_type' => 'product',
						'meta_query' => array(
							array(
								'key' 	=> '_featured',
								'value' => 'yes'
							)
						),
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
				<div class="featured-item clearfix <?php echo $classes;?>">
					<div class="featured-item-image">
						<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('thumb'); ?></a>
					</div>
					<div class="featured-item-contents">
						<h1 class="featured-item-title">
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</h1>						
						<a class="featured-item-link" href="<?php the_permalink() ?>">Acessar</a>
					</div>
				</div>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>			
			</div>
			<div class="database">
				<div class="title-category">
					<h4>Banco de Dados</h4>
				</div>
				<?php dynamic_sidebar( 'sidebar-database-home' ); ?>
			</div>
		</main>	
		<div id="sidebar" class="site-sidebar">
			<div class="news">
				<div class="title-category">
					<h4>Not&iacute;cias comentadas</h4>
				</div>
				<?php
					$args = array(
						'post__in'=>get_option('sticky_posts'),
						'category_name' => 'noticias-comentadas',
						'posts_per_page' => 3
					);
					$posts_array = get_posts( $args );
				?>							
				<?php
					$i = 1; 
					foreach ( $posts_array as $post ) : setup_postdata( $post );
					$classes = ' ';
					 if ( $i == 1) {
				        $classes .= 'sidebar-featured-item-first';
				    }
					$i++;
				?>
					<div class="sidebar-featured-item clearfix <?php echo $classes;?>">
						<div class="sidebar-featured-item-image">
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('thumb'); ?></a>							
						</div>
						<div class="sidebar-featured-item-contents">							
							<h1 class="sidebar-featured-item-title">
								<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</h1>							
							<a class="sidebar-featured-item-link" href="<?php the_permalink() ?>">Acessar</a>
						</div>
					</div>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>				
			</div>
			<div class="law">
				<div class="title-category">
					<h4>Regula&ccedil;&atilde;o e legisla&ccedil;&atilde;o</h4>
				</div>
				<?php
					$args = array(
						'post__in'=>get_option('sticky_posts'),
						'category_name' => 'regulacao-legislacao',
						'posts_per_page' => 3
					);
					$posts_array = get_posts( $args );
				?>							
				<?php
					$i = 1; 
					foreach ( $posts_array as $post ) : setup_postdata( $post );
					$classes = ' ';
					 if ( $i == 1) {
				        $classes .= 'sidebar-featured-item-first';
				    }
					$i++;
				?>
					<div class="sidebar-featured-item clearfix <?php echo $classes;?>">
						<div class="sidebar-featured-item-image">
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('thumb'); ?></a>							
						</div>
						<div class="sidebar-featured-item-contents">							
							<h1 class="sidebar-featured-item-title">
								<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</h1>							
							<a class="sidebar-featured-item-link" href="<?php the_permalink() ?>">Acessar</a>
						</div>
					</div>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</div><!-- #primary -->
<?php get_footer(); ?>