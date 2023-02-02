<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
$twitter = get_field('twitter','option');
$fb = get_field('facebook','option');
$youtube = get_field('youtube','option');
$insta = get_field('instagram', 'option');
$linkedin = get_field('linkedin', 'option');

?>

<nav id="main-nav" class="navbar navbar-expand-xl navbar-dark bg-primary" aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</h2>

	<div class="<?php echo esc_attr( $container ); ?>">

		<!-- Your site title as branding in the menu -->
		<a class="navbar-brand d-flex align-items-center" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
			<div class="logo-contianer">
				<img class="star" src="<?php echo get_stylesheet_directory_uri() . '/images/sma-logo-white.svg' ?>" alt="Social Mission Alliance" />
				<img class="diamond" src="<?php echo get_stylesheet_directory_uri() . '/images/sma-logo-diamond-white.svg' ?>" alt="Social Mission Alliance" />
			</div>
			<?php bloginfo( 'name' ); ?>
		</a>
		<!-- end custom logo -->

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
			<span class="burger-icon"></span>
		</button>

		<div class="navbar-container d-none d-xl-flex align-items-center" id="navbarNavContainer">
			<!-- The WordPress Menu goes here -->
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'container_class' => 'collapse navbar-collapse',
					'container_id'    => 'navbarNavDropdown',
					'menu_class'      => 'navbar-nav ms-md-auto',
					'fallback_cb'     => '',
					'menu_id'         => 'main-menu',
					'depth'           => 2,
					'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
				)
			);
			?>

			<div class="search-icon d-none d-xl-block"><a href="<?php echo get_the_permalink(1081); ?>"><i class="bi bi-search"></i></a></div>
		</div>

	</div><!-- .container(-fluid) -->

	<div class="submenu-bar"></div>

	<div class="mobile-full-menu d-flex d-xl-none align-items-center">
		<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'container_class' => 'collapse navbar-collapse',
					'container_id'    => 'navbarNavDropdown',
					'menu_class'      => 'navbar-nav ms-md-auto',
					'fallback_cb'     => '',
					'menu_id'         => 'main-menu',
					'depth'           => 2,
					'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
				)
			);
		?>
	</div>

</nav><!-- .site-navigation -->
