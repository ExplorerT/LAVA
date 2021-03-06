<?php
/**
 * LAVA functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package LAVA
 */

if ( ! function_exists( 'lava_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lava_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on LAVA, use a find and replace
	 * to change 'lava' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'lava', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'lava-full-bleed', 2000, 1200, true);
	add_image_size( 'lava-index-img', 800, 450, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Lava Header Menu', 'lava' ),
	) );

	//Register footer menu

	register_nav_menus( array(
		'menu-2' => esc_html__( 'Lava Footer Menu', 'lava' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'lava_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add theme support for Custom Logo
	add_theme_support ('custom-logo', array(
		'width' => 90,
		'height' => 90,
		'flex-width' => true,
		));

	/* Editor Style */
	add_editor_style( array( 'inc/editor-styles.css', lava_fonts_url() ) );
}
endif;
add_action( 'after_setup_theme', 'lava_setup' );

/**
 * Register google custom fonts.
 */
function lava_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Roboto and Montserrat, translate this to 'off'. Do not translate
	 * into your own language.
	 */

	$rubik = _x( 'on', 'Rubik font: on or off', 'lava' );

	$roboto = _x( 'on', 'Roboto font: on or off', 'lava' );

	$montserrat = _x( 'on', 'Montserrat font: on or off', 'lava' );

	$font_families = array();

	if ( 'off' !== $rubik ) {
		$font_families[] = 'Rubik:300i,400,400i,500,700';
	}

	if ( 'off' !== $roboto ) {
		$font_families[] = 'Roboto:300,400,700,900';
	}

	if ( 'off' !== $montserrat ) {
		$font_families[] = 'Montserrat:300,400,400i,700';
	}

	if ( in_array('on', array($rubik, $roboto, $montserrat)) ) {

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function lava_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'lava-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'lava_resource_hints', 10, 2 );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lava_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lava_content_width', 640 );
}
add_action( 'after_setup_theme', 'lava_content_width', 0 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @origin Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function lava_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 900 <= $width ) {
		$sizes = '(min-width: 900px) 700px, 900px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_active_sidebar( 'sidebar-2' ) ) {
		$sizes = '(min-width: 900px) 600px, 900px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'lava_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @origin Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function lava_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'lava_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @origin Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function lava_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {

	if ( !is_singular() ) {
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			$attr['sizes'] = '(max-width: 900px) 90vw, 800px';
		} else {
			$attr['sizes'] = '(max-width: 1000px) 90vw, 1000px';
		}
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'lava_post_thumbnail_sizes_attr', 10, 3 );



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lava_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'LAVA Sidebar', 'lava' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add LAVA widgets here.', 'lava' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'LAVA Footer Widgets', 'lava' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add LAVA footer widgets here.', 'lava' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'LAVA Page Sidebar', 'lava' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add LAVA page widgets here.', 'lava' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'lava_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lava_scripts() {
	//Enqueue Google Fonts: Roboto and Montserrat
	wp_enqueue_style ('lava-fonts', lava_fonts_url());



	wp_enqueue_style( 'lava-style', get_stylesheet_uri() );

	wp_enqueue_script( 'lava-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20151215', true );
	wp_localize_script( 'lava-navigation', 'lavaScreenReaderText', array(
		'expand' => __( 'Expand child menu', 'lava'),
		'collapse' => __( 'Collapse child menu', 'lava'),
	));


	wp_enqueue_script( 'lava-functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20170705', true );
	wp_enqueue_script( 'lava-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lava_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load SVG icon funcions.
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Search by category functions.
 */
add_action( 'pre_get_posts', 'search_by_cat' );

function search_by_cat()
{
    if ( is_search() )
    {
        $cat = empty( $_GET['cat'] ) ? '' : (int) $_GET['cat'];
        add_query_arg( 'cat', $cat );
    }
}


/**
 * Register Font Awesome.
 */
add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
function enqueue_load_fa() {

  wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );

}


/**
 * Register Searched For in Category.
 */

function getCatSearchFilter($pre,$post){
  $category = "";
  $catId = htmlspecialchars($_GET["cat"]);

  if ($catId != null && $catId != '' && $catId != '0'){
    $category = $pre.get_cat_name($catId).$post;
  }

  return $category;

}

/**
 * Register google map
 */
/*
function add_wp_scripts() {
		wp_register_script('googlemaps', 'https://maps.googleapis.com/maps/api/js?&key=AIzaSyDJZ_5uSYCJOzoIn0HfEZTrJqTWttaEBJA&callback', array(), '', true);
		wp_register_script('script', get_template_directory_uri() . '/js/map.js', array('jquery'), '1.0.0', true);


		wp_enqueue_script('googlemaps');
		wp_enqueue_script('jquery');
    wp_enqueue_script('script');
}
add_action( 'wp_enqueue_scripts', 'add_wp_scripts' );

*/
