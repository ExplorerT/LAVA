<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LAVA
 */

?>

	</div><!-- #content -->
	<div class="back-to-top">
	<a class="ps2id" href="#top"><img src="/images/up-arrow.jpg"> Back to top</a>
	</div>

	<?php get_sidebar( 'footer' ); ?>


	<footer id="colophon" class="site-footer" role="contentinfo">
	<nav class="footer-menu">
		<?php wp_nav_menu( array( 'theme_location' => 'menu-2' ) ); ?>
	</nav>
		<div class="site-info">
			<a href="<?php echo esc_url( __( '#', 'lava' ) ); ?>"><?php printf( esc_html__( 'Copyright © 2017 %s', 'lava' ), 'rivonline.org' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'lava' ), 'lava', '<a href="#" rel="designer">Tolu Agbaje</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
