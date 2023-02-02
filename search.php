<?php
/**
 * The template for displaying search results pages
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="search-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">
				<section id="internal-header" class="serp-header text-white bg-mark">
					<div class="container max-1400">
						<div class="row">
							<div class="col-md-11 col-lg-10 col-xl-8">
								<header class="serp page-header">
									<h1 class="page-title">
										<?php
										printf(
											/* translators: %s: query term */
											esc_html__( 'Search Results for: %s', 'understrap' ),
											'<span class="special">&ldquo;' . get_search_query() . '&rdquo;</span>'
										);
										?>
									</h1>
								</header>
							</div>
						</div>
					</div>
				</section>

				<section class="search-field-container">
					<div class="container max-1400">
						<div class="row">
							<div class="col-12">
								<?php echo do_shortcode('[ivory-search id="1020" title="Default Search Form"]'); ?>
							</div>
						</div>
					</div>
				</section>

				<?php if ( have_posts() ) : ?>

					<section id="" class="search-results-page">
						<div class="container max-1400">
							<div class="row articles pt-3">
								<div class="col-md-12">

								<?php /* Start the Loop */ ?>
								<?php
								while ( have_posts() ) :
									the_post();

									/*
									 * Run the loop for the search to output the results.
									 * If you want to overload this in a child theme then include a file
									 * called content-search.php and that will be used instead.
									 */
									get_template_part( 'loop-templates/content', 'search' );
								endwhile;
								?>
								</div>
							</div>
						</div>
					</section>

				<?php else : ?>
					<section id="" class="search-results-page">
						<div class="container max-1400">
							<div class="row">
								<div class="col-md-12">
									<?php get_template_part( 'loop-templates/content', 'none' ); ?>
								</div>
							</div>
						</div>
					</section>
				<?php endif; ?>


			</main><!-- #main -->

			<!-- The pagination component -->
			
			<div class="container max-1400 mb-5">
				<div class="row">
					<div class="col-12 serp-pagination">
						<?php understrap_pagination(); ?>
					</div>
				</div>
			</div>

			<section class="search-cta">
				<div class="container max-1400">
					<div class="row">
						<div class="col-12 text-center">
								Have Search Feedback?<br />
								<a href="mailto:info@socialmission.org">Let us know what you think.</a>
						</div>
					</div>
				</div>
			</section>

			<!-- Do the right sidebar check -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #search-wrapper -->

<?php
get_footer();
