<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CT_Custom
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.typekit.net/sgm4xem.css">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ct-custom' ); ?></a>
<div class="top-bar bg-accent">
<div class="container">
	<nav class="top-bar-nav">

		<div>
			<span class="text-dark">  Call us now! </span>  <a href=""> 385.154.11.28.35	</a>
		</div>
		<div>
			<?php if (is_user_logged_in()):
    $user = wp_get_current_user();
	?>
			<span class="text-accent-dark me-3">  ACCOUNT </span> <span class="text-light">LOGOUT   </span> 	
			<?php
else: ?>	
         <span class="text-accent-dark">  LOGIN </span> SIGNUP
		 <?php
endif; ?>
              </div>
</nav>
</div>
</div>
	<header id="masthead" class="site-header">
		<div class="container">
	<div class="content-header">

		<div class="site-branding">
			<?php
			$site_logo = get_option('site_logo');
			$options = get_option('ct_settings');
			echo intval($site_logo) > 0 ? the_custom_logo() : '<img alt='.get_bloginfo('name').' src=' . $options['ct_settings_company_logo'] . '>';
			
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$ct_custom_description = get_bloginfo( 'description', 'display' );
			if ( $ct_custom_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $ct_custom_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'ct-custom' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				'depth' => 3,
			) );
			?>
		</nav><!-- #site-navigation -->
				</div>				</div>



	</header><!-- #masthead -->
	<div id="content" class="site-content">
		<div class="container">
			<?php the_breadcrumb(); ?>
		</div>