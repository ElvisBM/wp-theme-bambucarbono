<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Neat
 */

get_header(); ?>

<div id="page">
	<div id="banner">
		<?php
			$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		?>
		<div class="item" style="background: url(<?php echo $url; ?>);">
		 	<div class="container">
		  		<h3><?php echo $post->post_title;?></h3>
		  	</div>
		</div>
	</div>
	<div id="content" >
		<div class="container">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; // end of the loop. ?>
		</div>
	</div>
	<?php
		//Galeria
		$gallery = get_post_meta( $post->ID, 'repeatable_images', true );
		if(! empty($gallery) ){
				$count = count($gallery);
	?>
	<div id="galeria">
		<div class="container">
			<div class="row">
				<?php
					$cont = 1;
					foreach ( $gallery as $ga ) {
						$url_image = wp_get_attachment_url( $ga['images']); 
		  				$text_image = $ga['text'];
		  				echo '<div class="col-md-4 com-sm-12 item-page">';
		  				echo '<a href="#" data-url="'.$url_image.'" data-modal="'.$cont.'"  title="'.$text_image.'" class="thumbA">';
		  				echo '<img src="'.$url_image.'" class="thumbnail"/>';
		  				echo '<div class="bg-h3"><h3>'.$text_image.'</h3></div>';
		  				echo '</a>';
		  				echo '</div>';
		  				$cont++;
					}
				?>
			</div>
		</div>
	</div>
	<div id="myModal" class="modal fade" tabindex="-1" role="dialog" data-modal="" >
  		<div id="modalgaleria" class="modal-dialog modal-lg">
  			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h3 class="modal-title">Heading</h3>
				</div>
				<div class="modal-body">
					<img src="" class="img-modal" />
				</div>
				<div class="modal-footer">
					<button id="prev-btn" class="btn btn-warning">Anterior</button>
			        <button id="next-btn" class="btn btn-primary">Próximo</button>
					<button class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div>
   			</div>
  		</div>
	</div>
	<?php
		}//EndIf empty gallery
	?>
</div>

<?php get_footer(); ?>


