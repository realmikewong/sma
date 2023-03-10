<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="error-404-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main">

						<section id="internal-header" class="bg-primary text-white bg-mark">
							<div class="container">
								<div class="row">
									<div class="col-md-11 col-lg-10 col-xl-8">
										<header class="page-header">
											<h1 style=margin-top:80px; class="page-title"><?php esc_html_e( 'Page not found', 'understrap' ); ?></h1>
										</header>
									</div>
								</div>
							</div>
						</section>

						
						<section id="" class="">
							<div class="container">
								<div class="row">
									<div class="col-md-10 col-lg-8 col-xl-7">
										<p><?php esc_html_e( 'The page you are looking for no longer exists. Try a search below.', 'understrap' ); ?></p>
										<?php get_search_form(); ?>
									</div>
								</div>
							</div>
						</section>

					

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #error-404-wrapper -->

<?php
get_footer();
