<?php

$container = get_theme_mod( 'understrap_container_type' );
$cta_title = get_field('cta_title');

?>

<section class="footer-cta-links">
  <div class="<?php echo esc_attr( $container ); ?>">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4 ps-4"><h3><?php echo $cta_title; ?></h3></div>
      <?php if( have_rows('cta_links') ): 
        $count = 0;
        while( have_rows('cta_links') ): the_row(); 
        $context = get_sub_field('context');
        $link = get_sub_field('link');
      ?>
        <div class="col-12 d-none d-lg-block col-lg-4 d-lg-flex align-items-center justify-content-end">
          <div class="d-flex align-items-center link">
            <p class="mb-0 mt-3 mt-lg-0"><?php echo $context; ?></p>
            <a class="btn btn-primary <?php if ($count === 0): echo 'purple-gradient'; else: echo 'orange-gradient'; endif; ?>" href="<?php echo esc_url($link['url']); ?>" class="button"><?php echo $link['title'] ;?> <span>&gt;</span></a>
          </div>
        </div>
      <?php $count++; endwhile; endif; ?>
      <div class="col-12 col-md-6 d-lg-none">
        <?php if( have_rows('cta_links') ): 
          $count = 0;
          while( have_rows('cta_links') ): the_row(); 
          $context = get_sub_field('context');
          $link = get_sub_field('link');
        ?>
          <div class="d-flex align-items-center link mb-2">
            <p class="mb-0"><?php echo $context; ?></p>
            <a class="btn btn-primary <?php if ($count === 0): echo 'purple-gradient'; else: echo 'orange-gradient'; endif; ?>" href="<?php echo esc_url($link['url']); ?>" class="button"><?php echo $link['title'] ;?> <span>&gt;</span></a>
          </div>
        <?php $count++; endwhile; endif; ?>
      </div>
    </div>
  </div>
</section>