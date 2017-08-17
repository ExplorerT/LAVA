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

	<?php get_sidebar( 'footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
	<nav class="footer-menu">

	<a class="ps2id" href="#top"><i class="fa fa-angle-up fa-5x" aria-hidden="true"></i><br>Back to Top</a>

	<ul>
	<li><a href="#"><i class="fa fa-facebook fa-4x"></i></a></li>
	<li><a href="#"><i class="fa fa-instagram fa-4x"></i></a></li>
	<li><a href="#"><i class="fa fa-twitter fa-4x"></i></a></li>
	</ul>
	</nav>
		<div class="site-info">
			<a href="<?php echo esc_url( __( '#', 'lava' ) ); ?>"><?php printf( esc_html__( '© 2017 %s', 'lava' ), 'rivonline.org' ); ?></a>
			<span class="sep"> | </span>
			<a href="#" rel="designer">Privacy Policy</a>
			<span class="sep"> | </span>
			<a href="#" rel="designer">Credits</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
