<?php

$container = get_theme_mod( 'understrap_container_type' );
$cta_title = get_field('cta_title');

?>

<section class="footer-cta-links type-2">
  <div class="<?php echo esc_attr( $container ); ?> max-1400">
    <div class="row">
      <div class="col-md-6 ps-3"><h3><?php echo $cta_title; ?></h3></div>
      <div class="col-md-6 cta-links">
        <?php if( have_rows('cta_links') ): 
          while( have_rows('cta_links') ): the_row(); 
          $context = get_sub_field('context');
          $link = get_sub_field('link');
        ?>
          <div class="mb-3 cta-button d-flex align-items-center">
            <p class="mb-0 context"><?php echo $context; ?></p>
            <div class="line"></div>
            <a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
          </div>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </div>
</section>