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

	<div class="modals">
		<div id="modal-1">
			<button class="modal-close" aria-controls="modal-1" aria-expanded="false"><?php esc_html_e( 'Close', 'marzeotti-base' ); ?></button>
		</div>
	</div>

	<footer id="footer" class="footer">
		<div class="container">
			<div class="footer__copyright">
				<?php $marzeotti_base_date = gmdate( 'Y' ); ?>
				<p>&copy; <?php echo esc_html( $marzeotti_base_date ); ?> <?php bloginfo( 'name' ); ?>. All Rights Reserved.</p>
			</div>

			<nav class="footer__nav">
				<?php
				wp_nav_menu(
					array(
						'container'      => false,
						'menu_class'     => false,
						'theme_location' => 'footer-menu',
					)
				);
				?>
			</nav>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
