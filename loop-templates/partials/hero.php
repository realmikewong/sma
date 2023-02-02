<?php
	$container = get_theme_mod( 'understrap_container_type' );
	$backgroundImage = get_field('hero_background_image');
	$backgroundVideo = get_field('hero_background_video');
	$backgroundVideoWebM = get_field('background_video_webm');
	$firstTitle = get_field('hero_intro_first_title');
	$secondTitle = get_field('hero_intro_second_title');
	$tagliine = get_field('hero_intro_tagline');
	$email = get_field('email', 'option');
	$twitter = get_field('twitter', 'option');
	$instagram = get_field('instagram', 'option');
?>

<section class="hero p-0 white-out" id="hero">
	<div class="content-block first d-flex justify-content-center align-items-center" id="firstHeroBlock">
		<div class="box">
			<h1 class="title first text-center text-md-left"><?php echo $firstTitle; ?></h1>
			<h1 class="title second text-center text-md-left"><?php echo $secondTitle; ?></h1>
			<h4 class="mt-2 mb-0 d-md-none text-center" data-aos="fade-up" data-aos-delay="1000"><?php echo str_replace(' ', '<br/>', $tagliine); ?></h4>
			<h4 class="mt-2 mb-0 d-none d-md-block text-center" data-aos="fade-up" data-aos-delay="1000"><?php echo $tagliine; ?></h4>
		</div>
	</div>

	
	<?php if(have_rows('hero_scrollable_element_blocks')):
		$total = count(get_field('hero_scrollable_element_blocks'));
		$count = 1;
		while( have_rows('hero_scrollable_element_blocks') ): the_row();  
			$content = get_sub_field('content');
		?>
		<div class="content-block additional-content-blocks d-flex justify-content-center align-items-center <?php if ($total === $count): echo 'last'; endif; ?>">
			<div class="box p-3 max-1000 text-center">
				<?php echo $content; ?>
			</div>
		</div>
		<?php $count++; endwhile;
	endif; ?>

	<?php if ($backgroundVideo): ?>
	<div class="background-video">
		<video autoplay playsinline muted loop>
  		<source src="<?php echo $backgroundVideo['url']; ?>" type="video/mp4">
			<source src="<?php echo $backgroundVideoWebM['url']; ?>" type="video/webm">
		</video>
	</div>
	<?php else: ?>
	<div class="background-image" style="background-image: url(<?php echo esc_url($backgroundImage['sizes']['widescreen']); ?>);" data-aos="fade-in"></div>
	<?php endif; ?>

	<div class="hero-footer d-flex align-items-center justify-content-between">
		<a class="d-none d-md-block" data-aos="fade-right" data-aos-anchor="#hero" data-aos-delay="600" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
		<div class="d-block d-md-none"></div>
		<div class="position-relative">
			<div class="landing-arrow" data-aos="fade-down" data-aos-anchor="#hero" data-aos-delay="600">
				<img src="<?php echo get_stylesheet_directory_uri() . '/images/landing-arrow.svg' ?>" alt="scroll" />
			</div>
			<ul class="d-none d-md-flex align-items-center m-0 social-links" data-aos="fade-left" data-aos-anchor="#hero" data-aos-delay="600">
				<li><a href="<?php echo esc_url($twitter['url']); ?>" target="_blank" rel="noopener" aria-label="Twitter">Twitter</a></li>
				<li>—</li>
				<li><a href="<?php echo esc_url($insta['url']); ?>" target="_blank" rel="noopener" aria-label="Instagram">Instagram</a></li>
			</ul>
		</div>
	</div>
</section>