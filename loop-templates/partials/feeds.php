<?php
$twitter = get_field('twitter','option');
$insta = get_field('instagram', 'option');
?>

<section class="feeds">
  <div class="container max-1200">
    <div class="row">
      <div class="col-md-7">
        <h1 data-aos="fade-left"><img src="<?php echo get_stylesheet_directory_uri() . '/images/instagram-logo.svg' ?>" alt="Instagram" /> Posts</h1>
        <div class="instagram-feed" data-aos="fade-in"><?php echo do_shortcode('[instagram-feed feed=1]'); ?></div>
        <div class="d-flex justify-content-end" data-aos="fade-up">
          <a class="link d-flex align-items-center" href="<?php echo esc_url($insta['url']); ?>" target="_blank" rel="noopener" aria-label="Instagram" title="Tony Fay PR Instagram">More <span class="next-arrow"></span></a>
        </div>
      </div>
      <div class="col-md-5">
        <div class="mt-3 mt-md-0 ms-md-3">
          <h1 data-aos="fade-right"><img src="<?php echo get_stylesheet_directory_uri() . '/images/twitter-logo.svg' ?>" alt="Twitter" /> Notes</h1>
          <div data-aos="fade-in"><?php echo do_shortcode('[custom-twitter-feeds feed=2]'); ?></div>
          <div class="d-flex justify-content-end" data-aos="fade-up">
            <a class="link d-flex align-items-center" href="<?php echo esc_url($twitter['url']); ?>" target="_blank" rel="noopener" aria-label="Twitter" title="Tony Fay PR Twitter">More <span class="next-arrow"></span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>