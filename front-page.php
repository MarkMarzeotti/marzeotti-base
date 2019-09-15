<?php
/**
 * The template for displaying the homepage.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Marzeotti_Base
 */

get_header();
?>

	<div class="container">
		<main id="main" class="content__blocks">

			<?php
			while ( have_posts() ) :
				the_post();

				the_content();

			endwhile;
			?>

		</main>
	</div>

<?php
get_footer();
