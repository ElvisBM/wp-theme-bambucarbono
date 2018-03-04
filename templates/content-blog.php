<div class="row">
	<h3><?php the_title(); ?></h3>
	<?php the_post_thumbnail( 'medium_large' ); ?>
	<?php the_excerpt(); ?>
	<p>
		<a href="<?php echo get_permalink();?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="vejamais">Veja Mais</a>
	</p>
	<?php
		$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		//$facebokUrl = 'caption=]';
		$facebokUrl  = 't='.get_the_title();
		$facebokUrl .= '&u='.get_permalink();
		$facebokUrl .= '&description='. get_the_excerpt();
		$facebokUrl .= '&picture='. $url;
	?>

	<div class="social-blog">
		<a href="https://www.facebook.com/sharer.php?<?php echo $facebokUrl; ?>" title="Facebook compartilhar <?php the_title(); ?>" alt="Facebook compartilhar <?php the_title(); ?>" target="_blank" class="icons"><i class="fa fa-facebook-f"></i></a>
		<a href="https://www.instagram.com/bambucarbonozero/?hl=pt-br" title="Instagram Bambu Carbono Zero" alt="Instagram Bambu Carbono Zero" target="_blank" class="icons"><i class="fa fa-instagram"></i></a>
	</div>


	<hr />
</div>