<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Neat
 */
?>


<footer class="footer">
	<div id="footer">
		<div class="container">
			<div class="row">
				<?php 
					if ( is_active_sidebar( 'contato-footer' ) ) {
						echo '<div class="contato-footer col-md-6 col-sm-12">';
							dynamic_sidebar( 'contato-footer' );
						echo '</div>';
					};
				?>
				<?php 
					if ( is_active_sidebar( 'infos-footer' ) ) {
						echo '<div class="infos-footer col-md-6 col-sm-12">';
							dynamic_sidebar( 'infos-footer' );
						echo '</div>';
					};
				?>
			</div>
		</div>
	</div>
	<div id="rodape">
		<div class="container">
			<div class="row">
				<?php 
					if ( is_active_sidebar( 'menu-footer' ) ) {
						echo '<div class="infos-footer col-md-7 col-sm-12">';
							dynamic_sidebar( 'menu-footer' );
						echo '</div>';
					};
				?>
				<?php 
					if ( is_active_sidebar( 'agencia-footer' ) ) {
						echo '<div class="infos-footer col-md-3 col-sm-12">';
							dynamic_sidebar( 'agencia-footer' );
						echo '</div>';
					};
				?>
				<?php 
					if ( is_active_sidebar( 'social-footer' ) ) {
						echo '<div class="social-footer col-md-2 col-sm-12">';
							dynamic_sidebar( 'social-footer' );
						echo '</div>';
					};
				?>
			</div>
		</div>
	</div>
</footer>


<?php wp_footer(); ?>

</body>
</html>
