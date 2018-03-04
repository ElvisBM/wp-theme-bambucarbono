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
			$url = get_term_meta( 2, 'categoryimage', true );
		?>
		<div class="item" style="background: url(<?php echo $url; ?>);">
		 	<div class="container">
		  		<h3><?php single_cat_title(); ?></h3>
		  	</div>
		</div>
	</div>
	<div id="content">
		<div class="container">	
			<?php echo term_description( 2, $taxonomy ) ?>
		</div>
	</div>
	<div  class="container">	
		<div class="row">
			<div id="posts" class="col-md-9 col-xs-12">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'templates/content', 'blog' ); ?>
					<?php //the_post_navigation(); ?>
				<?php endwhile; // end of the loop. ?>
			</div>
			<div id="sidebar" class="col-md-3 hidden-sm">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>

</div>
<?php get_footer(); ?>
