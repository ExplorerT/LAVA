<?php
/*
Template Name: Search Page
*/
?>
<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package LAVA
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="search-category">
				<h2> Search Facility by Feature</h2>
				<form id="searchform" method="get" action="<?php echo home_url(); ?>">
				    <input type="text" name="s" id="s" size="15" />
				    <?php wp_dropdown_categories( 'show_option_none=Select' ); ?>
				    <input type="submit" value="Search" />
				</form>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
