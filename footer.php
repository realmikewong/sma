<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
$blog_title = get_bloginfo( 'name' );

$twitter = get_field('twitter','option');
$facebook = get_field('facebook','option');
$youtube = get_field('youtube','option');
$instagram = get_field('instagram', 'option');
$linkedin = get_field('linkedin', 'option');

$sitemap = get_field('sitemap', 'option');
$privacy_policy = get_field('privacy_policy', 'option');
$terms_of_use = get_field('terms_of_use', 'option');

?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<!-- footer starts here -->

		<div class="wrapper bg-secondary" id="wrapper-footer">
			<footer id="footer-main" class="site-footer">
				<div class="<?php echo esc_attr( $container ); ?>">
					<div class="row">
						<div class="col-md-5 col-lg-2 logo-container">
							<a class="ps-md-0 mb-4 mb-md-0 d-block" href="<?php echo get_site_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri() . '/images/sma-primary-logo-with-tag-white.svg' ?>" alt="Social Mission Alliance" /></a>
						</div>
						<div class="col-12 col-lg-10">
							<?php
								wp_nav_menu(
									array(
										'theme_location'  => 'primary',
										'container_class' => '',
										'container_id'    => '',
										'menu_class'      => 'd-md-flex',
										'fallback_cb'     => '',
										'menu_id'         => 'footer-menu',
										'depth'           => 2,
										'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
									)
								);
							?>
							<ul class="social-links white-out list-unstyled d-flex align-items-center">
								<!-- <?php if ($facebook) : ?><li><a href="<?php echo esc_url($facebook); ?>" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa fa-facebook"></i></a></li><?php endif;?> -->
								<?php if ($twitter) : ?><li><a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener" aria-label="Twitter"><i class="fa fa-twitter"></i></a></li><?php endif;?>
								<?php if ($instagram) : ?><li><a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener" aria-label="Instagram"><i class="fa fa-instagram"></i></a></li><?php endif;?>
								<?php if ($linkedin) : ?><li><a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fa fa-linkedin"></i></a></li><?php endif;?>
								<?php if ($youtube) : ?><li><a href="<?php echo esc_url($youtube); ?>" target="_blank" rel="noopener" aria-label="YouTube"><i class="fa fa-youtube"></i></a></li><?php endif;?>
							</ul>
						</div>
					</div>
					<div class="row mt-4 bottom-footer">
						<div class="col-md-6 text-md-start">
							<p class="mb-0"><span class="text-nowrap"><?php echo dynamic_copyright() . ' ' . $blog_title ; ?>.</span> <span class="text-nowrap">All rights reserved.</span></p>
							<p>&nbsp;</p>
						</div>
						<div class="col-md-6 mt-2 mt-md-0">
							<div class="d-none justify-content-md-end links">
								<?php if ($sitemap) : ?><a href="<?php echo esc_url($sitemap['url']); ?>" target="_blank" rel="noopener" aria-label="<?php echo $sitemap['title']; ?>"><?php echo $sitemap['title']; ?></a><?php endif;?>
								<?php if ($privacy_policy) : ?><a href="<?php echo esc_url($privacy_policy['url']); ?>" target="_blank" rel="noopener" aria-label="<?php echo $privacy_policy['title']; ?>"><?php echo $privacy_policy['title']; ?></a><?php endif;?>
								<?php if ($terms_of_use) : ?><a href="<?php echo esc_url($terms_of_use['url']); ?>" target="_blank" rel="noopener" aria-label="<?php echo $terms_of_use['title']; ?>"><?php echo $terms_of_use['title']; ?></a><?php endif;?>	
							</div>
						</div>
					</div>					
				</div>
			</footer>
		</div>

		<div class="container pt-4" id="gw-footer">
					<div class="row">
						<div class="col-md-4 col-1"></div>
						<div class="col-md-4 col-11 gw-text">
							<p class="gw-text">Social Mission Alliance is a joint activity with the Mullan Institute and George Washington University. <a href="https://www.gwhwi.org">Learn more about the Mullan Institute here.</a></p>
						</div>
						<div class="col-md-2 col-6 gw-logo" style="border-left: solid 1px #D6D6D6;">
							<a href="https://www.gwhwi.org"><img src="<?php echo get_stylesheet_directory_uri() . '/images/gw_ci_fmihwe_2c.png' ?>" alt="Fitzhugh Mullan Institute for Health and Workforce Equity" /></a>
						</div>
						<div class="col-md-2 col-6 gwu-logo">
							<a href="https://www.gwu.edu/"><img src="http://socialmission.org/wp-content/uploads/2023/02/GW-logo-350px.png" alt="George Washington University" /></a>
						</div>
					</div>
				</div>

<?php wp_footer(); ?>

<div><!--end page wrapper-->

</body>

</html>