<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package LAVA
 */

get_header(); ?>

<?php
if ( have_posts() ) : ?>

	<div class="search-result">
		<div class="search-category">
			<h2> Search Facility by Feature</h2>
			<form id="searchform" method="get" action="<?php echo home_url(); ?>">
				<input type="text" name="s" id="s" size="15" />
				    <?php wp_dropdown_categories( 'show_option_none=Select' ); ?>
					<button type="submit" id="search-submit" value="">
			            <span class="search-btn">
			                <i class="fa fa-search" aria-hidden="true"></i>Search
	              		</span>
	            	</button>
			</form>
		</div>

	</div>


	<header class="page-header">
		
		
		<h1 class="page-title">Search Results for <?php echo(get_search_query());?><?php echo(getCatSearchFilter(' Facilities with ',''));?></h1>
	</header><!-- .page-header -->

<?php endif; ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content' );

			endwhile;

			the_posts_pagination( array(
 				'prev_text' => __( 'Newer', 'lava' ),
 				'next_text' => __( 'Older', 'lava' ),
 				'before_page_number' => '<span class="screen-reader-text">' . __( 'Page ', 'lava' ) . '</span>',
 			));

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
