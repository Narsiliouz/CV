<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package ZincyLite
 */

get_header(); ?>
<header class="page-header">
	<div class="zl-wrapper">
		<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'zincy-lite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	</div>
</header><!-- .page-header -->
<div class="zl-wrapper">
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'search' ); ?>

				<?php endwhile; ?>

				<?php zincy_lite_paging_nav(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<?php get_sidebar('right'); ?>
</div>
<?php get_footer(); ?>
