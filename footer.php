<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Marzeotti_Base
 */

?>

	</div>

	<footer id="footer" class="footer">
		<div class="container">
			<div class="footer__copyright">
				<p>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All Rights Reserved.</p>
			</div>

			<nav class="footer__nav">
				<?php
				wp_nav_menu( array(
					'container'      => false,
					'menu_class'     => false,
					'theme_location' => 'footer-menu',
				) );
				?>
			</nav>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
