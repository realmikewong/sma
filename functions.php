<?php

/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;



/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts()
{
    wp_dequeue_style('understrap-styles');
    wp_deregister_style('understrap-styles');

    wp_dequeue_script('understrap-scripts');
    wp_deregister_script('understrap-scripts');
}
add_action('wp_enqueue_scripts', 'understrap_remove_scripts', 20);



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles()
{

    // Get the theme data.
    $the_theme = wp_get_theme();

    $suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
    // Grab asset urls.
    $theme_styles  = "/css/child-theme{$suffix}.css";
    $theme_scripts = "/js/child-theme{$suffix}.js";

    wp_enqueue_style('child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get('Version'));
    wp_enqueue_script('jquery');
    wp_enqueue_script('aos', get_stylesheet_directory_uri() . '/js/aos.js', array('jquery'), 1.0, true);
    // wp_enqueue_script('splide', get_stylesheet_directory_uri() . '/js/splide.min.js', array('jquery'), 3.0, true);
    // wp_enqueue_script('rellax', get_stylesheet_directory_uri() . '/js/rellax.min.js', null, 1.0, true );
    // wp_enqueue_script('gsap', get_stylesheet_directory_uri() . '/js/gsap.min.js', null, 1.0, true );
    // wp_enqueue_script('scroll-trigger', get_stylesheet_directory_uri() . '/js/scroll-trigger.min.js', null, 1.0, true );
    wp_enqueue_script('slick', get_stylesheet_directory_uri() . '/js/slick.min.js', null, 1.0, true );


    if (is_singular('projects')) {
        //wp_enqueue_script( 'splide', get_stylesheet_directory_uri() . '/js/splide.min.js', array('jquery'), 3.0, true );
    }

    $gm_api = get_field('google_maps_api_key', 'option');
    if ($gm_api) {
        wp_enqueue_script('googlemaps', 'https://maps.googleapis.com/maps/api/js?key=' . $gm_api, null, null, true);
        wp_enqueue_script('googlemaps_config', get_stylesheet_directory_uri() . '/js/google-maps.js', array('child-understrap-scripts', 'googlemaps'), 1.0, true);
        wp_localize_script('googlemaps_config', 'script_vars', array('mapstyles' => get_field('google_map_style', 'option')));
    }

    wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/src/js/app.js', array(), null, true);

    wp_enqueue_script('child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get('Version'), true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain()
{
    load_child_theme_textdomain('understrap-child', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'add_child_theme_textdomain');



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @param string $current_mod The current value of the theme_mod.
 * @return string
 */
function understrap_default_bootstrap_version($current_mod)
{
    return 'bootstrap5';
}
add_filter('theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20);



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js()
{
    wp_enqueue_script(
        'understrap_child_customizer',
        get_stylesheet_directory_uri() . '/js/customizer-controls.js',
        array('customize-preview'),
        '20130508',
        true
    );
}
add_action('customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js');


/*********************************
 Add Page Slug Body Class
 *********************************/
function add_slug_body_class($classes)
{
    global $post;
    if (isset($post)) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter('body_class', 'add_slug_body_class');


/*********************************
 Copyright year as a shortcode
 *********************************/

function dynamic_copyright()
{
    global $wpdb;

    $copyright_dates = $wpdb->get_results("SELECT YEAR(min(post_date_gmt)) AS firstdate, YEAR(max(post_date_gmt)) AS lastdate FROM $wpdb->posts WHERE post_status = 'publish'");
    $output = '';

    if ($copyright_dates) {
        $copyright = "&copy; " . $copyright_dates[0]->firstdate;

        if ($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
            $copyright .= '-' . $copyright_dates[0]->lastdate;
        }

        $output = $copyright;
    }

    return $output;
}

/*******************************************
 Add a new thumbnail sizes
 *******************************************/

add_theme_support('post-thumbnails');
add_action('after_setup_theme', 'wpdocs_theme_setup');
function wpdocs_theme_setup()
{
    add_image_size('widescreen', 2400, 1350, true);
    add_image_size('fullscreen', 2400, 1600, true);
    add_image_size('portrait', 720, 1080, true);
    add_image_size('square', 1000);
    add_image_size('fullpage', 2400);
}

/*********************************
 Google Maps API
 **********************************/

function my_acf_init()
{
    $API = get_field('google_maps_api_key', 'option');

    if (!empty($API)) {
        acf_update_setting('google_api_key', $API);
    }
}

add_action('acf/init', 'my_acf_init');

/*********************************
 Enqueue Google Fonts
 *********************************/

function load_google_fonts()
{
    $GoogleFonts = get_field('google_fonts', 'option');

    if ($GoogleFonts) :
        function wpb_add_google_fonts()
        {
            $GoogleFonts = get_field('google_fonts', 'option');
            wp_enqueue_style('wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=' . $GoogleFonts, false, null, 'all');
        }
        add_action('wp_enqueue_scripts', 'wpb_add_google_fonts');
    endif;
}
add_action('acf/init', 'load_google_fonts');

/*********************************
 Redirect CPT posts to homepage
 *********************************/

function fq_disable_single_cpt_views()
{
    $queried_post_type = get_query_var('post_type');
    $cpts_without_single_views = array('testimonials');
    if (is_single() && in_array($queried_post_type, $cpts_without_single_views)) {
        wp_redirect("/", 301);
        exit;
    }
}
add_action('template_redirect', 'fq_disable_single_cpt_views');


/*********************************************
 *  Filter custom logo with correct classes.
 * ******************************************/

add_filter('get_custom_logo', 'understrap_change_logo_class');

if (!function_exists('understrap_change_logo_class')) {
    /**
     * Replaces logo CSS class.
     *
     * @param string $html Markup.
     *
     * @return string
     */
    function understrap_change_logo_class($html)
    {

        $html = str_replace('class="custom-logo"', 'class="img-fluid"', $html);
        $html = str_replace('class="custom-logo-link"', 'class="navbar-brand custom-logo-link" ', $html);
        $html = str_replace('alt=""', 'title="Home" alt="logo"', $html);

        return $html;
    }
}

/**************************************
 * CUSTOM PREV AND NEXT POST NAVIGATION
 * ***********************************/

if (!function_exists('understrap_post_nav')) {
    /**
     * Display navigation to next/previous post when applicable.
     */
    function understrap_post_nav() {
        // Don't print empty markup if there's nowhere to navigate.
        $previous = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
        $next     = get_adjacent_post(false, '', false);
        
        if (!$next && !$previous) {
            return;
        }
    ?>
        <nav class="container navigation post-navigation">
            <h2 class="screen-reader-text"><?php esc_html_e('Post navigation', 'understrap'); ?></h2>
            <div class="d-flex nav-links justify-content-between">
                <?php if (get_previous_post_link()) {
                    previous_post_link('<div class="nav-previous">%link</div>', _x('<span class="previous-arrow"></span>%title', 'Previous post link', 'understrap'));
                } else {
                    $last = new WP_Query('post_type=' . get_post_type() . '&posts_per_page=1&order=DESC'); $last->the_post();
                    echo '<div class="nav-previous"><a href="' . get_permalink() . '"><span class="previous-arrow"></span>' . get_the_title() . '</a></div>';
                    wp_reset_postdata();
                }
                
                if (get_next_post_link()) {
                    next_post_link('<div class="nav-next">%link</div>', _x('%title<span class="next-arrow"></span>', 'Next post link', 'understrap'));
                } else {
                    $first = new WP_Query('post_type=' . get_post_type() . '&posts_per_page=1&order=ASC'); $first->the_post();
                    echo '<div class="nav-next"><a href="' . get_permalink() . '">' . get_the_title() .'<span class="next-arrow"></span></a></div>';
                    wp_reset_postdata();
                }
                ?>
            </div><!-- .nav-links -->
        </nav><!-- .navigation -->
    <?php
    }
}

/**************************************
 * CUSTOM PREV AND NEXT POST NAVIGATION
 * ***********************************/

if (!function_exists('understrap_post_nav_mobile')) {
    /**
     * Display navigation to next/previous post when applicable.
     */
    function understrap_post_nav_mobile() {
        // Don't print empty markup if there's nowhere to navigate.
        $previous = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
        $next     = get_adjacent_post(false, '', false);
        
        if (!$next && !$previous) {
            return;
        }
    ?>
        <nav class="container navigation post-navigation">
            <h2 class="screen-reader-text"><?php esc_html_e('Post navigation', 'understrap'); ?></h2>
            <div class="d-flex nav-links justify-content-between">
                <?php if (get_previous_post_link()) {
                    previous_post_link('<div class="nav-previous">%link</div>', _x('<span class="previous-arrow"></span>Previous', 'Previous post link', 'understrap'));
                } else {
                    $last = new WP_Query('post_type=' . get_post_type() . '&posts_per_page=1&order=DESC'); $last->the_post();
                    echo '<div class="nav-previous"><a href="' . get_permalink() . '"><span class="previous-arrow"></span>Previous</a></div>';
                    wp_reset_postdata();
                }
                
                if (get_next_post_link()) {
                    next_post_link('<div class="nav-next">%link</div>', _x('Next<span class="next-arrow"></span>', 'Next post link', 'understrap'));
                } else {
                    $first = new WP_Query('post_type=' . get_post_type() . '&posts_per_page=1&order=ASC'); $first->the_post();
                    echo '<div class="nav-next"><a href="' . get_permalink() . '">Next<span class="next-arrow"></span></a></div>';
                    wp_reset_postdata();
                }
                ?>
            </div><!-- .nav-links -->
        </nav><!-- .navigation -->
    <?php
    }
}


add_filter( 'theme_page_templates', 'child_theme_remove_page_template' );

// Only return 30 words in the excerpt
function wpdocs_excerpt_length($length) {
    return 60;
}

add_filter('excerpt_length', 'wpdocs_excerpt_length', 999);

// Remove the excerpt brackets and read more button
function change_excerpt( $text ) {
    $pos = strrpos( $text, '[');
    if ($pos === false) {
        return $text;
    }

    return rtrim (substr($text, 0, $pos) ) . '...';
}

add_filter('get_the_excerpt', 'change_excerpt');

// Remove the links for the categories and tags
function no_links($thelist) {
    return preg_replace('#<a.*?>([^<]*)</a>#i', '$1', $thelist);
}

add_filter( 'the_category', 'no_links' );

/**
* Remove page templates inherited from the parent theme.
*
* @param array $page_templates List of currently active page templates.
*
* @return array Modified list of page templates.
*/
function child_theme_remove_page_template( $page_templates ) {
    unset( $page_templates['page-templates/blank.php'] ); 
    unset( $page_templates['page-templates/empty.php'] ); 
    // unset( $page_templates['page-templates/fullwidthpage.php'] ); 
    unset( $page_templates['page-templates/left-sidebarpage.php'] ); 
    unset( $page_templates['page-templates/right-sidebarpage.php'] ); 
    unset( $page_templates['page-templates/both-sidebarspage.php'] ); 
return $page_templates;
}

/****************************
 * NAVIGATION MENU LOCATIONS
 * *************************/

// function sma_menu_option() {
//     register_nav_menu('primary', 'Primary Menu');
//     register_nav_menu('secondary','Secondary Menu');
// }

// add_action( 'after_setup_theme', 'sma_menu_option');

/**************************************
 * CUSTOM FREEHAND LOAD MORE
 * ***********************************/

function freehand_load_more() {
    // $categories = $_POST['categories'];
    // $queryList = ['relation' => 'OR'];

    // foreach ($categories as $category) {
    //     $queryList[] = array(
    //         'taxonomy' => 'category',
    //         'field'    => 'slug',
    //         'terms'    => array( $category ),
    //     );
    // }

    $activeCategory = $_POST['category'];

    $firstArgs = [
        'post_type' => 'post',
        'posts_per_page' => 8,
        'orderby' => 'date',
        'order' => 'DESC',
        'fields' => 'ids',
        // 'tax_query' => $queryList,
    ];

    if ($activeCategory !== 'all') {
        $firstArgs['category_name'] = $activeCategory;
    }

    $recentBlogs = new WP_Query($firstArgs);

    $secondArgs = [
        'post_type' => 'post',
        'posts_per_page' => 8,
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => $_POST['paged'],
        'tax_query' => $queryList,
        'post__not_in' => $recentBlogs->posts
    ];

    if ($activeCategory !== 'all') {
        $secondArgs['category_name'] = $activeCategory;
    }

    $ajaxposts = new WP_Query($secondArgs);

    $response = '';
    $max_pages = $ajaxposts->max_num_pages;

    if ($ajaxposts->have_posts()) {
        ob_start();
        while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
            $response .= get_template_part('loop-templates/partials/card', 'blog');
        endwhile;
        $output = ob_get_contents();
        ob_end_clean();
    } else {
        $response = '';
    }

    $result = [
        'max' => $max_pages,
        'html' => $output,
    ];

    echo json_encode($result);
    exit;
}

add_action('wp_ajax_freehand_load_more', 'freehand_load_more');
add_action('wp_ajax_nopriv_freehand_load_more', 'freehand_load_more');

/**************************************
 * CUSTOM FREEHAND FEATURED POSTS
 * ***********************************/

function get_posts_based_on_category() {
    $recentBlogs = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 8,
        'orderby' => 'date',
        'order' => 'DESC',
        'fields' => 'ids',
        'category_name' => $_POST['category'],
    ]);

    $response = '';
    $max_pages = $recentBlogs->max_num_pages;

    if ($recentBlogs->have_posts()) {
        ob_start();
        while ($recentBlogs->have_posts()) : $recentBlogs->the_post();
            $response .= get_template_part('loop-templates/partials/card', 'blog');
        endwhile;
        $output = ob_get_contents();
        ob_end_clean();
    } else {
        $response = '';
    }

    $result = [
        'max' => $max_pages,
        'html' => $output,
    ];

    echo json_encode($result);
    exit;
}

add_action('wp_ajax_get_posts_based_on_category', 'get_posts_based_on_category');
add_action('wp_ajax_nopriv_get_posts_based_on_category', 'get_posts_based_on_category');


/*********************************
 * INCLUDE PAGES IN SEARCH RESULTS
 ********************************/

function wpshock_search_filter( $query ) {
    if ( $query->is_search ) {
        $query->set( 'post_type', array('post','page') );
    }
    return $query;
}
add_filter('pre_get_posts','wpshock_search_filter');

if ( ! function_exists( 'understrap_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function understrap_posted_on() {
		$post = get_post();
		if ( ! $post ) {
			return;
		}

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ), // @phpstan-ignore-line -- post exists
			esc_html( get_the_date() ), // @phpstan-ignore-line -- post exists
			esc_attr( get_the_modified_date( 'c' ) ), // @phpstan-ignore-line -- post exists
			esc_html( get_the_modified_date() ) // @phpstan-ignore-line -- post exists
		);

		$posted_on = apply_filters(
			'understrap_posted_on',
			sprintf(
				'<span class="posted-on">%1$s <a href="%2$s" rel="bookmark">%3$s</a></span>',
				esc_html_x( 'Posted on', 'post date', 'understrap' ),
				esc_url( get_permalink() ), // @phpstan-ignore-line -- post exists
				apply_filters( 'understrap_posted_on_time', $time_string )
			)
		);

		echo $posted_on; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
if ( ! function_exists( 'understrap_entry_footer' ) ) {
	function understrap_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'understrap' ) );
			if ( $categories_list && understrap_categorized_blog() ) {
				/* translators: %s: Categories of current post */
				printf( '<span class="cat-links me-3">' . esc_html__( 'Posted in: %s', 'understrap' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'understrap' ) );
			if ( $tags_list ) {
				/* translators: %s: Tags of current post */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged in: %s', 'understrap' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}
	}
}

add_filter('term_links-post_tag', function($links) {
    return array_map('wp_strip_all_tags', $links);
});