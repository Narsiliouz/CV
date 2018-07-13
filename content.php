<?php
/**
 * @package ZincyLite
 */
?>
<?php
$cat_event = get_theme_mod('zincy_lite_event');
$cat_testimonial = get_theme_mod('zincy_lite_testimonials');
$cat_portfolio = get_theme_mod('zincy_lite_portfolio');
$author_date_settings = get_theme_mod('zincy_lite_details_date_author');
$cat_blog = get_theme_mod('blog_category_settings');
?>

<?php 
if(!empty($cat_event) && is_category() && is_category($cat_event)){ 
	?>
	<article id="post-<?php the_ID(); ?>" class="cat-event-list">
		<header class="entry-header search-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php 
			if( has_post_thumbnail() ){
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured-thumbnail', false ); 
				?>
				<div class="cat-event-image">
					<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>"/>
				</div>
				<?php 
			} ?>
			<div class="cat-event-excerpt <?php if(! has_post_thumbnail() ) { echo "full-width"; }?>">
				<?php if($author_date_settings == '1'): ?>
				<div class="event-date-archive">
					<?php zincy_lite_posted_on(); ?>
				</div>
			<?php endif; ?>

			<div><?php 
				if(is_home()){
					the_content();
				}
				else{
					echo zincy_lite_excerpt( get_the_content() , 400 );
				}
				?></div>
			</div>
			<a href="<?php the_permalink(); ?>" class="cat-event-more bttn"><?php _e('More','zincy-lite');?></a>
		</div><!-- .entry-content -->
	</article>

	<?php 
}
elseif(!empty($cat_testimonial) && is_category() && is_category($cat_testimonial)){ 
	?>
	<article id="post-<?php the_ID();?>" class="cat-testimonial-list">
		<header class="entry-header search-header">
			<div class="cat-testimonial-image">
				<?php 
				if( has_post_thumbnail() ){
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'testimonials-thumbnails', false ); 
					?>
					<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>"/>
					<?php }else {?>	
						<img src="<?php echo get_template_directory_uri(); ?>/images/testimonial-fallback.jpg" alt="<?php the_title(); ?>">
						<?php 
					}?>
				</div>

				<h1 class="entry-title"><?php the_title(); ?></h1>

			</header><!-- .entry-header -->
			<div class="testimonials-read-more"><a href="<?php the_permalink(); ?>"><?php echo __('Read More' , 'zincy-lite') ?></a></div>

			<div class="cat-testimonial-excerpt">
				<?php if(is_home()){
					the_content();
				}
				else{
					echo zincy_lite_excerpt( get_the_content() , 110 );
				} ?>
			</div>
		</article>

		<?php 
	}
	elseif(!empty($cat_blog) && is_category() && is_category($cat_blog)){ 
		?>
		<?php
		$cat_blog_layout = get_theme_mod('blog_category_layout');
		$blog_class = '';
		switch($cat_blog_layout){
			case 'layout1':
			$blog_class = 'layout-one';
			break;
			case 'layout2':
			$blog_class = 'layout-two';
			break;
			case 'layout3':
			$blog_class = 'layout-three';
			break;
			case 'layout4':
			$blog_class = 'layout-four';
			break;
			default:
			$blog_class = 'layout-four';
			break;

		}
		?>
		<article id="post-<?php the_ID(); ?>" class="blog-<?php echo $blog_class; ?> clearfix">
			<!--layout one -->
			<?php if($cat_blog_layout == 'layout1'){ 
				?>
				<div class="entry-header">
					<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					<?php if($author_date_settings == '1'): ?>
					<div class="blog-date-archive">
						<?php zincy_lite_posted_on(); ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="entry-content">
				<?php 
				if( has_post_thumbnail() ){
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured-thumbnail', false ); 
					?>
					<div class="cat-blog-image">
						<img src="<?php echo esc_url($image[0]); ?> alt="<?php the_title(); ?>" />
					</div>
					<?php 
				}
				?>               		
				<div>
					<?php if(is_home()){
						the_content();
					}
					else{
						echo zincy_lite_excerpt( get_the_content() , 500 );
					} ?>
				</div>
				<a href="<?php the_permalink(); ?>" class="cat-blog-more bttn"><?php _e('More','zincy-lite');?></a>
			</div>
			<!--layout two , layout-three -->
			<?php 
		}
		elseif($cat_blog_layout == 'layout2' || $cat_blog_layout == 'layout3' ){
			?>
			<div class="entry-content">
				<?php 
				if( has_post_thumbnail() ){
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured-thumbnail', false ); 
					?>
					<div class="cat-blog-image">
						<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>"/>
					</div>
					<?php 
				}
				?>
			</div>
			<div class="blog-content">
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				<div class="cat-blog-excerpt <?php if(! has_post_thumbnail() ) { echo "full-width"; }?>">
					<?php if($author_date_settings == '1'): ?>
					<div class="blog-date-archive">
						<?php zincy_lite_posted_on(); ?>
					</div>
				<?php endif; ?>

				<div>
					<?php if(is_home()){
						the_content();
					}
					else{
						echo zincy_lite_excerpt( get_the_content() , 400 );
					} ?>
				</div>
			</div>
		</div>
		<a href="<?php the_permalink(); ?>" class="cat-blog-more bttn"><?php _e('More','zincy-lite');?></a>

		<!--layout four-->
		<?php 
	}
	else 
	{ 
		?>
		<div class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php if($author_date_settings == '1'): ?>
			<div class="blog-date-archive">
				<?php zincy_lite_posted_on(); ?>
			</div>
		<?php endif; ?>
	</div>
	<div class="entry-content">
		<?php 
		if( has_post_thumbnail() ){
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-layout-four-image', false ); 
			?>
			<div class="cat-blog-image">
				<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>"/>
			</div>
			<?php 
		}
		?>
		<div class="blog-content">	
			<?php if(is_home()){
				the_content();
			}
			else{
				echo zincy_lite_excerpt( get_the_content() , 400 );
			} ?>
		</div>
	</div>
	<a href="<?php the_permalink(); ?>" class="cat-blog-more bttn"><?php _e('More','zincy-lite');?></a>
	<div class="blog-border"></div>
	<?php 
}
?>  
</article>

<?php 
}
elseif(!empty($cat_portfolio) && is_category() && is_category($cat_portfolio)){ 
	?>

	<article id="post-<?php the_ID(); ?>" class="cat-portfolio-list">
		<?php 
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portfolio-thumbnail', false ); 
		$full_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false ); 
		?>
		<a class="fancybox-gallery" href="<?php echo esc_url($full_image[0]); ?>" data-lightbox-gallery="gallery">
			<div class="cat-portfolio-image">
				<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>"/>
			</div>
			<div class="portofolio-layout">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="cat-portfolio-excerpt">
					<?php the_content(); ?>
				</div>
			</div>
		</a>
	</article>

	<?php
}
else{ 
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header search-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

			<?php if ( 'post' == get_post_type() ) : ?>
			<?php if($author_date_settings == '1'): ?>
			<div class="entry-meta">
				<?php zincy_lite_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	<?php endif; ?>
</header><!-- .entry-header -->

<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
<?php else : ?>
	<div class="entry-content">
		<?php if(has_post_thumbnail()){?>
			<div class="entry-thumbnail">
				<?php  the_post_thumbnail('featured-thumbnail'); ?>
			</div>
			<?php } ?>
			<div class="short-content">
				<?php if(is_home()){
					the_content();
				}
				else{
					echo zincy_lite_excerpt( get_the_content() , 500 );
				} ?>
			</div>
			<a href="<?php the_permalink(); ?>" class="bttn"><?php _e('More','zincy-lite')?></a>
			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'zincy-lite' ),
				'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
		<?php
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'zincy-lite' ) );
		if ( $categories_list && zincy_lite_categorized_blog() ) :
			?>
		<span class="cat-links">
			<?php printf( __( 'Posted in %1$s', 'zincy-lite' ), $categories_list ); ?>
		</span>
	<?php endif; // End if categories ?>

	<?php
	/* translators: used between list items, there is a space after the comma */
	$tags_list = get_the_tag_list( '', __( ', ', 'zincy-lite' ) );
	if ( $tags_list ) :
		?>
	<span class="tags-links">
		<?php printf( __( 'Tagged %1$s', 'zincy-lite' ), $tags_list ); ?>
	</span>
<?php endif; // End if $tags_list ?>
<?php endif; // End if 'post' == get_post_type() ?>

</footer><!-- .entry-footer -->
</article><!-- #post-## -->
<?php 
}
?>