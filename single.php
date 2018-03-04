<?php
/**
 * The template for displaying all single posts.
 *
 * @package Neat
 */

get_header(); ?>
<div id="blog">
	<div id="banner">
		<?php
			$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
			// Get the URL of this category
   			 $cat_url = get_category_link( 2 );
		?>
		<div class="item" style="background: url(<?php echo $url; ?>);">
		 	<div class="container">
		  		<h3><a href="<?php echo esc_url( $cat_url ); ?>" title="Blog Bambu Carbono Zero" class="bloglink">Blog</a> >> <?php echo $post->post_title;?></h3>
		  	</div>
		</div>
	</div>
	<div  class="container">	
		<div class="row">
			<div id="posts" class="col-md-9 col-xs-12">
				<?php while ( have_posts() ) : the_post(); ?>
					<h3><?php the_title(); ?></h3>
					<?php the_content(); ?>
					<?php the_post_thumbnail( 'medium_large' ); ?>
				<?php endwhile; // end of the loop. ?>
			</div>
			<div id="sidebar" class="col-md-3 hidden-sm">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>

</div>
<?php get_footer(); ?>
