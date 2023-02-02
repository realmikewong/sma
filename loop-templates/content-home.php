<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

$hero_content = get_field('hero_content');
$hero_background_video = get_field('hero_background_video');
$hero_background_image = get_field('hero_background_image');
$hero_cta_link = get_field('hero_cta_link');

$explore_featured_video = get_field('explore_featured_video');
$explore_featured_video_content = get_field('explore_featured_video_content');
$explore_featured_video_post_date = get_field('explore_featured_video_post_date');

$who_we_are_left_image = get_field('who_we_are_left_image');
$who_we_are_content = get_field('who_we_are_content');
$who_we_are_bracket_content = get_field('who_we_are_bracket_content');

$learn_more_title = get_field('learn_more_title');
$learn_more_link_content = get_field('learn_more_link_content');
$learn_more_link = get_field('learn_more_link');
$learn_more_hero_image = get_field('learn_more_hero_image');
$learn_more_content_blocks = get_field('learn_more_content_blocks');

$bottom_block_title = get_field('bottom_block_title');
$bottom_block_link_content = get_field('bottom_block_link_content');
$bottom_block_link = get_field('bottom_block_link');
$bottom_block_content = get_field('bottom_block_content');
$bottom_block_subscription_title = get_field('bottom_block_subscription_title');
$bottom_block_subscription_content = get_field('bottom_block_subscription_content');
$bottom_block_background_image = get_field('bottom_block_background_image');

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<section class="home-hero d-flex align-items-center bg-image" style="background-image: url(<?php echo esc_url($hero_background_image['sizes']['widescreen']); ?>);">
		<div class="<?php echo esc_attr( $container ); ?>">
			<div class="row">
				<div class="col-lg-6 col-md-7 mb-2 mb-md-0 gx-sm-0">
					<div class="video-container d-md-none">
						<video autoplay playsinline muted loop>
							<source src="<?php echo $hero_background_video['url']; ?>" type="video/mp4">
						</video>
					</div>
				</div>

				<div class="col-lg-6 col-md-5">
					<?php echo $hero_content; ?>
					<div class="cta-button blue pb-3 mt-3 text-center"><a href="<?php echo $hero_cta_link['url']; ?>" target="_blank"><?php echo $hero_cta_link['title']; ?></a></div>
				</div>

			</div>
		</div>
		<div class="background-video d-none d-md-block">
			<video autoplay playsinline muted loop>
				<source src="<?php echo $hero_background_video['url']; ?>" type="video/mp4">
			</video>
		</div>
		<div class="overlay"></div>
	</section>
	
	
	

	<section class="home-explore" id="sectionOne">
		<div class="<?php echo esc_attr( $container ); ?>">
			<div class="row main-content">
				<div class="col-12 mb-2 d-flex justify-content-md-end">
					<h3 class="block-title pe-lg-5 me-lg-5">&gt; News</h3>
				</div>
				<div class="col-md-5 ps-lg-4">
					<h4>Latest Video</h4>
					<div class="embed-container mb-2">
    				<?php 
							$iframe = get_field('explore_featured_video');
							preg_match('/src="(.+?)"/', $iframe, $matches);
							$src = $matches[1];
							$params = array(
								'hd'             => 1,
								'modestbranding' => 1
							);
							$new_src = add_query_arg($params, $src);
							$iframe = str_replace($src, $new_src, $iframe);
							$attributes = 'frameborder="0"';
							$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
							echo $iframe;
						?>
					</div>
					<?php echo $explore_featured_video_content; ?>
					<div class="article-footer d-flex align-items-center justify-content-between">
						<h6><?php echo $explore_featured_video_post_date; ?></h6>
					</div>
				</div>
				<div class="col-md-7 col-lg-5 articles mt-1">
					<?php 
						$posts_args = array(
							'posts_per_page'   => 3,
							'post_type'        => 'post',
							'orderby'          => 'date',
							'order'            => 'DESC',
						);
						
						$posts_query = new WP_Query( $posts_args );

						if ($posts_query->have_posts()):
							while ($posts_query->have_posts()): 
								$posts_query->the_post();
								$categoryClassname = strtolower(get_the_category()[0]->name);
					?>
						<article class="<?php echo $categoryClassname; ?>">
							<h6 class="mb-1 category"><?php echo get_the_category()[0]->name; ?></h6>
							<h3><?php echo the_title(); ?></h3>
							<p><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
							<div class="article-footer d-flex align-items-center justify-content-between mt-2">
								<h6><?php echo get_the_date(); ?></h6>
								<a href="<?php echo get_the_permalink(); ?>" class="btn-link">Read More <span>&gt;</span></a>
							</div>
						</article>
					<?php endwhile; wp_reset_postdata(); ?>
					<?php endif; ?>
				</div>
				<div class="col-md-2 d-none d-lg-flex align-items-center justify-content-center">
					<div class="explore-container">
						Explore <div class="arrow-container"><img src="<?php echo get_stylesheet_directory_uri() . '/images/circle-with-arrow.svg' ?>" alt="Explore" /></div>
					</div>
				</div>
			</div>
		</div>
		<div class="overlay d-none d-lg-block"></div>
	</section>

	<section class="who-we-are overflow-visible" id="sectionTwo">
		<div class="<?php echo esc_attr( $container ); ?>">
			<div class="row">
				<div class="col-md-5 d-flex align-items-center ps-md-0 pe-md-0">
					<video class="w-100" autoplay playsinline muted>
						<source src="http://sma-temp.flywheelsites.com/wp-content/uploads/2022/12/sma-fitz-Logo.mp4" type="video/mp4">
					</video>
				</div>
				<div class="col-md-7 d-flex align-items-center">
					<div class="mt-4 mb-4">
						<div class="brackets mb-3 text-uppercase">[<span><?php echo $who_we_are_bracket_content; ?></span>]</div>
						<?php echo $who_we_are_content; ?>
					</div>
				</div>
			</div>
			<?php if( have_rows('who_we_are_stats') ): ?>
			<div class="row overflow-visible">
				<div class="col-lg-5"></div>
				<div class="col-lg-7 stats-container">
					<div class="stats d-lg-flex text-center text-lg-left">
						<?php while( have_rows('who_we_are_stats') ): the_row(); 
							$number = get_sub_field('number');
							$title = get_sub_field('title');
						?>
							<div class="stat mb-2 mb-lg-0">
								<div class="number"><?php echo $number; ?></div>
								<div class="title"><?php echo $title; ?></div>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</section>

	<section class="home-learn-more bg-image cover" style="background-image: url(<?php echo esc_url($learn_more_hero_image['sizes']['widescreen']); ?>);" id="sectionThree">
		<div class="<?php echo esc_attr( $container ); ?>">
			<div class="row">
				<div class="col-12">
					<div class="top-content pt-lg-3 d-md-flex align-items-center justify-content-between ps-lg-3">
						<h2><?php echo $learn_more_title; ?></h2>
						<div class="line d-none d-md-block"></div>
						<div class="right-content d-flex align-items-center">
							<p class="mb-0"><?php echo $learn_more_link_content; ?></p>
							<a class="btn btn-primary teal ms-2" href="<?php echo esc_url($learn_more_link['url']); ?>" class="button"><?php echo $learn_more_link['title'] ;?> <span>&gt;</span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php if( have_rows('learn_more_content_blocks') ): ?>
	<section class="home-learn-more-content-blocks" id="sectionFour">
		<div class="<?php echo esc_attr( $container ); ?>">
			<div class="ps-lg-2 pe-lg-2">
				<div class="row">
					<?php while( have_rows('learn_more_content_blocks') ): the_row(); 
						$content = get_sub_field('content');
					?>
						<div class="col">
							<div class="content">
								<?php echo $content; ?>
							</div>
						</div>
					<?php endwhile; ?>
				<div>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<section class="home-bottom-block" id="sectionFive">
		<div class="<?php echo esc_attr( $container ); ?> max-1300">
			<div class="row">
				<div class="col-12">
					<div class="top-content d-md-flex align-items-center justify-content-between">
						<h2><?php echo $bottom_block_title; ?></h2>
						<div class="right-content d-flex align-items-center">
							<p class="mb-0"><?php echo $bottom_block_link_content; ?></p>
							<a class="btn btn-primary teal" href="<?php echo esc_url($bottom_block_link['url']); ?>" class="button"><?php echo $bottom_block_link['title'] ;?> <span>&gt;</span></a>
						</div>
					</div>
					<div class="content max-400 mt-3">
						<?php echo $bottom_block_content; ?>
					</div>
					<div class="subscribe-container max-600 p-3 mt-3">
						<h6><?php echo $bottom_block_subscription_title; ?></h6>
						<div class="content-wrapper"><?php echo $bottom_block_subscription_content; ?></div>
						<div class="cta-button yellow-green pb-3 mt-3 text-center"><a href="<?php echo $hero_cta_link['url']; ?>" target="_blank"><?php echo $hero_cta_link['title']; ?></a></div>
						<p class="small">We won’t send you spam.  And we will never, ever share your information.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="hero-bg d-none d-xl-block">
			<img src="<?php echo esc_url($bottom_block_background_image['sizes']['widescreen']); ?>" alt="<?php echo esc_url($bottom_block_background_image['alt']); ?>">
		</div>
		<div class="bg-image cover d-xl-none" style="background-image: url(<?php echo esc_url($bottom_block_background_image['sizes']['widescreen']); ?>);"></div>
	</section>

</article>
