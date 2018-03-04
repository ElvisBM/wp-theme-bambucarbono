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
					foreach ( $gallery as $ga ) {
						$url_image = wp_get_attachment_url( $ga['images']); 
		  				$text_image = $ga['text'];
		  				echo '<div class="col-md-4 com-sm-12 item-page">';
		  				echo '<a href="#" data-toggle="modal" data-target="#img'.$ga['images'].'">';
		  				echo '<img src="'.$url_image.'" />';
		  				echo '<div class="bg-h3"><h3>'.$text_image.'</h3></div>';
		  				echo '</a>';
		  				echo '</div>';
					}
				?>
			</div>
		</div>
	</div>
	<div id="modalgaleria">
		<?php
			foreach ( $gallery as $ga ) {
				$url_image = wp_get_attachment_url( $ga['images']); 
  				$text_image = $ga['text'];
  		?>
  		<div class="modal fade" id="img<?php echo $ga['images']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
			    <div class="modal-content">
				    <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel"><?php echo $text_image; ?></h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				    </div>
				    <div class="modal-body">
				       <img src="<?php echo $url_image; ?>" />
				    </div>
			    </div>
			</div>
		</div>
  		<?php
			}//EndForeach Gallery for Modal
		?>
	</div>
	<?php
		}//EndIf empty gallery
	?>
</div>

<?php get_footer(); ?>


