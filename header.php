<?php
/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Marzeotti_Base
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'marzeotti-base' ); ?></a>

	<header id="masthead" class="header">
		<div class="container">
			<div class="header__logo">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php endif; ?>
			</div>

			<nav id="site-navigation" class="header__nav nav">
				<button class="nav__button" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'marzeotti-base' ); ?></button>
				<?php
				wp_nav_menu(
					array(
						'container'      => false,
						'menu_class'     => 'nav__level',
						'theme_location' => 'primary-menu',
						'walker'         => new Marzeotti_Base_Walker_Nav_Menu(),
					)
				);
				?>
			</nav>
		</div>
	</header>

	<div id="content" class="content">
