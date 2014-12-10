<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dataporto Theme
 */
?>

<section class="no-results not-found">
	<header class="post-header">
		<h2 class="post-title">Nenhum resultado encontrado</h2>
	</header><!-- .page-header -->

	<div class="post-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'dataporto-theme' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Desculpe-nos, mas n&atilde;o encontramos nenhum resultado para a sua pesquisa. Por favor, tente novamente com outras palavras-chave.', 'dataporto-theme' ); ?></p>			

		<?php else : ?>

			<p><?php _e( 'Desculpe-nos, mas n&atilde;o encontramos o conte&uacute;do. Utilize o campo de pesquisa para encontrar a p&aacute;gina desejada', 'dataporto-theme' ); ?></p>
			

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->