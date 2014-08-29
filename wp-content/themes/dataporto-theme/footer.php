<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Dataporto Theme
 */
?>

</div><!-- #content -->
<div class="banner-leaderboard-footer">
	<?php echo adrotate_group('1'); ?>
</div>
<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="top-footer">
		<div class="footer-container">
			<?php dynamic_sidebar( 'sidebar-footer-vasconsult' ); ?>
		</div>
	</div>
	<div class="main-footer">
		<div class="footer-container">
			<?php dynamic_sidebar( 'sidebar-footer-boxes' ); ?>
		</div>
	</div>
	<div class="bottom-footer">
		<div class="footer-container">
			<div class="copyright">
				<span class="copyright-text">&copy; 2014 Dataporto. Todos os direitos reservados.</span>
			</div>
			<nav class="menu-footer-links">
				<?php dynamic_sidebar( 'sidebar-footer-links' ); ?>
			</nav>
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>