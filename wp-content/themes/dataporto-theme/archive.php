<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dataporto Theme
 */

get_header(); ?>
	<?php $thumbnail = esc_url( home_url( 'wp-content/themes/dataporto-theme/images/bkg-section-default.jpg' ) ); ?>
	<div class="section-banner"	style="background:url('<?php echo $thumbnail; ?>') no-repeat center center;">
		<header class="entry-header">
			<h1 class="entry-title">
				<?php if ( is_category() ) { ?>
					<?php
						$parentCatList = get_category_parents($cat,false,',');
						$parentCatListArray = split(",",$parentCatList);
						$topParentName = $parentCatListArray[0];
						$sdacReplace = array(" " => "-", "(" => "", ")" => "");
						$topParent = strtolower(strtr($topParentName,$sdacReplace));
						$topParentAccents = iconv( 'UTF-8', 'ASCII//TRANSLIT', $topParent );
					?>
					<?php $category = get_the_category(); ?>
					<?php echo $topParentName; ?></h2>									
				<?php } else { ?>
					   <?php _e( 'Archives', 'dataporto-theme' ); ?>      
				<?php } ?>
			</h1>
		</header><!-- .entry-header -->
	</div>
	<div class="breadcrumb">
		<?php if(function_exists('bcn_display')) {
			bcn_display();
		}?>
	</div>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="title-category">
				<h4>
					<?php
					if ( is_category() ) :
						single_cat_title();

					elseif ( is_tag() ) :
						single_tag_title();

					elseif ( is_author() ) :
						printf( __( 'Author: %s', 'dataporto-theme' ), '<span class="vcard">' . get_the_author() . '</span>' );

					elseif ( is_day() ) :
						printf( __( 'Day: %s', 'dataporto-theme' ), '<span>' . get_the_date() . '</span>' );

					elseif ( is_month() ) :
						printf( __( 'Month: %s', 'dataporto-theme' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'dataporto-theme' ) ) . '</span>' );

					elseif ( is_year() ) :
						printf( __( 'Year: %s', 'dataporto-theme' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'dataporto-theme' ) ) . '</span>' );

					elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
						_e( 'Asides', 'dataporto-theme' );

					elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
						_e( 'Galleries', 'dataporto-theme' );

					elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
						_e( 'Images', 'dataporto-theme' );

					elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
						_e( 'Videos', 'dataporto-theme' );

					elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
						_e( 'Quotes', 'dataporto-theme' );

					elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
						_e( 'Links', 'dataporto-theme' );

					elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
						_e( 'Statuses', 'dataporto-theme' );

					elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
						_e( 'Audios', 'dataporto-theme' );

					elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
						_e( 'Chats', 'dataporto-theme' );

					else :
						_e( 'Archives', 'dataporto-theme' );

					endif;
				?>
				</h4>
			</div>
		<?php if ( have_posts() ) : ?>			

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php if(function_exists('wp_paginate')) {
			    wp_paginate();
			   }
			?> 

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
		<div class="site-sidebar" role="complementary">
			<?php dynamic_sidebar( 'sidebar' ); ?>
		</div>
	</section><!-- #primary -->
<?php get_footer(); ?>
