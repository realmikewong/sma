<ul class="social-links white-out list-unstyled d-flex align-items-center">
	<?php
	$twitter = get_field('twitter','option');
	$fb = get_field('facebook','option');
	$youtube = get_field('youtube','option');
	$insta = get_field('instagram', 'option');
	$linkedin = get_field('linkedin', 'option');
	?>
	<?php if ($fb) : ?><li class=""><a href="<?php echo esc_url($fb['url']); ?>" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa fa-facebook"></i><?php echo $fb['title']; ?></a></li><?php endif;?>
	<?php if ($insta) : ?><li class=""><a href="<?php echo esc_url($insta['url']); ?>" target="_blank" rel="noopener" aria-label="Instagram"><i class="fa fa-instagram"></i><?php echo $insta['title']; ?></a></li><?php endif;?>
	<?php if ($twitter) : ?><li class=""><a href="<?php echo esc_url($twitter['url']); ?>" target="_blank" rel="noopener" aria-label="Twitter"><i class="fa fa-twitter"></i><?php echo $twitter['title']; ?></a></li><?php endif;?>
	<?php if ($linkedin) : ?><li class=""><a href="<?php echo esc_url($linkedin['url']); ?>" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fa fa-linkedin"></i><?php echo $linkedin['title']; ?></a></li><?php endif;?>
	<?php if ($youtube) : ?><li class=""><a href="<?php echo esc_url($youtube['url']); ?>" target="_blank" rel="noopener" aria-label="YouTube"><i class="fa fa-youtube"></i><?php echo $youtube['title']; ?></a></li><?php endif;?>
</ul>