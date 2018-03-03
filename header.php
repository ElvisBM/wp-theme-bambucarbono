<?php
/**
 * The header for our theme.
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="container">
		<header class="navigation row">
			<div id="logo" class="col-md-3 col-sm-12 remove-padding">
				<?php 
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					if ( has_custom_logo() ) {
					        echo '<h1><a href="'.get_home_url().'" title="'.get_bloginfo( 'name' ).'" alt="'.get_bloginfo( 'name' ).'"><img src="'. esc_url( $logo[0] ) .'" title="'.get_bloginfo( 'name' ).'" alt="'.get_bloginfo( 'name' ).'"></a> </h1>';
					} else {
					        echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
					}
				?>
			</div>
			<div class="col-md-6 col-sm-12 remove-padding">
				<nav class="navbar navbar-expand-lg navbar-light">
					<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				    	<span class="navbar-toggler-icon"></span>
				 	 </button>
					<div class="collapse navbar-collapse" aria-expanded="false" id="navbarNav">
						<?php
						    echo str_replace( 'class="menu-item', 'class="nav-item menu-item',
						        wp_nav_menu(
						            array(
						                'theme_location'    => 'primary',
						                'menu_id' 			=> 'primary-menu',
						                'container'         => false,
						                'items_wrap'        => '<ul class="navbar-nav">%3$s</ul>',
						                'depth'             => 1,
						                'echo'              => false
						            )
						        )
						    );
						?>
					</div>
				</nav>
			</div>
			<div class="widget-top col-md-3 col-sm-12 remove-padding">
				<?php 
					if ( is_active_sidebar( 'header-top' ) ) {
						dynamic_sidebar( 'header-top' );
					};
				?>
			</div>
		</header>
	</div>

