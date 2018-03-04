<div class="row">
	<h3><?php the_title(); ?></h3>
	<?php the_post_thumbnail( 'medium_large' ); ?>
	<?php the_excerpt(); ?>
	<a href="<?php echo get_permalink();?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="vejamais">Veja Mais</a>
	<hr />
</div>