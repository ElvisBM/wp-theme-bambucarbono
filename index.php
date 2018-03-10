<?php
/**
 * Template Name: Home
 *
 * @package base-wp-theme
 */

get_header(); ?>
	<div id="banner-home">
		<?php
			//Galeria
			$gallery = get_post_meta( $post->ID, 'repeatable_images', true );
			if(! empty($gallery) ){
				$count = count($gallery);
		?>
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
				<?php 
					for ($i = 0; $i < $count; $i++) {		
		  				$url_image = wp_get_attachment_url( $gallery[$i]['images'] ); 
		  				$text_image = $gallery[$i]['text'];
		  				$active = ( $i==0 ? ' active' : '' );
		  				echo '<div class="carousel-item '.$active.'">';
		  				echo '<div class="item" style="background: url('.$url_image.');">';
		  				echo '<div class="container">';
		  				echo '<h3>'.$text_image.'</h3>';
						echo '</div>';
			  			echo '</div>';
			  			echo '</div>';
				  	}
				?>
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	    	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    	<span class="sr-only">Previous</span>
	  	</a>
	  	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	    	<span class="carousel-control-next-icon" aria-hidden="true"></span>
	    	<span class="sr-only">Next</span>
	  	</a>
	  	<?php }//end if repeatable ?>			
	</div>
	<div id="metas-home" class="container">
		<div class="row">			
			<?php 
				$metas = get_post_meta( $post->ID );
				//Remove Metas WP
				array_splice($metas, 0, 4);

				$countMetas = count($metas) / 3;

				for ($i=1; $i <= $countMetas; $i++) { 
			?>
				<div class="col-md-4 com-sm-12">
					<?php
						$titulo = get_post_meta($post->ID, "titulo_".$i , $single );
						$texto  = get_post_meta($post->ID, "texto_".$i , $single );
						$icon   = get_post_meta($post->ID, "icon_".$i , $single );
					?>
					<img src="<?php echo $icon; ?>" title="<?php echo $titulo; ?>" alt="<?php echo $titulo; ?>">
					<div class="content">
						<h3><?php echo $titulo; ?></h3>
						<p><?php echo $texto; ?></p>
					</div>
				</div>
			<?
				}//End For $metas
			?>
		</div>
	</div>
	<div id="pages-home" class="container">
		<div class="row">
		<?php 
			$args = array(
				'exclude' => '76',
				'post_type' => 'page',
				'post_status' => 'publish',
				'sort_order' => 'asc',
				'sort_column' => 'menu_order',
			); 
			$pages = get_pages($args); 
			foreach ( $pages as $page ) {
				$thumbnailId = get_post_meta( $page->ID, '_thumbnail_image_id', true );
				$src = wp_get_attachment_image( $thumbnailId, 'medium_large' );
				$url = $src[0];
		?>
				<div class="col-md-4 co-sm-12 item-page">
					<a href="<?php echo  get_page_link( $page->ID ); ?>" alt="<?php echo $page->post_title; ?>" title="<?php echo $page->post_title; ?>">
						<?php echo $src; ?>
						<div class="bg-h3">
							<h3><?php echo $page->post_title; ?></h3>
						</div>
					</a>
				</div>
		
		<?php }//EndForeach Pages ?>
		</div>
	</div>

<?php get_footer(); ?>
