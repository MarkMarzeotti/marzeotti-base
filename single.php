<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Marzeotti_Base
 */

get_header();
?>

	<div class="container">
		<main id="main" class="content__main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				the_post_navigation();

			endwhile;
			?>

		</main>
		<?php get_sidebar(); ?>
	</div>

<?php
get_footer();
