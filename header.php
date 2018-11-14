<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bplate
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="icon" type="image/png" href="<?php the_asset_dir() ?>/favicon.png">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div class="site-branding">
			<img src="<?php the_asset_dir() ?>/logo.png" alt="" srcset="">

		</div><!-- .site-branding -->

		<div class="mobile-nav-button">
			<span></span>
			<span></span>
			<span></span>
		</div>

		<nav id="site-navigation" class="main-navigation">
			<?php /*
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) ); */
			?>

			<ul>
				<li><a href="">Services</a></li>
				<li><a href="">Products</a></li>
				<li><a href="">Clients</a></li>
				<li><a href="">Bukidnon Development</a></li>
				<li><a href="">About Us</a></li>
			</ul>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
