<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package ZincyLite
 */
?>

<?php 
$event_category = get_theme_mod('zincy_lite_event');
$show_events = get_theme_mod('right_sidebar_event');
$portfolio_category = get_theme_mod('zincy_lite_portfolio');
$show_portfolio = get_theme_mod('right_sidebar_portfolio');
$post_class = "";

if(!empty($post)){
	if(is_front_page()){
		$post_id = get_option('page_on_front');
	}else{
		$post_id = $post->ID;
	}
	$post_class = get_post_meta( $post_id, 'zincy_lite_sidebar_layout', true );
}elseif (is_home()) {
	$post_class = "right-sidebar";
}

if($post_class=='right-sidebar' || $post_class=='both-sidebar' || empty($post_class) || is_archive()){
	?>
	<div id="secondary-right" class="widget-area right-sidebar sidebar">
		<?php
		if($show_events==1) {
			if(!empty($event_category)){
				$loop = new WP_Query( array(
					'cat' => $event_category,
					'posts_per_page' => 3,
					)); ?>
					<aside id="latest-events" class="clearfix">
						<h3 class="widget-title"><?php echo get_cat_name($event_category); ?></h3>

						<?php while ($loop->have_posts()) : $loop->the_post(); ?>

							<div class="event-list clearfix">
								
								<figure class="event-thumbnail">
									<a href="<?php the_permalink(); ?>">
										<?php 
										if( has_post_thumbnail() ){
											$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'event-thumbnail', false ); 
											?>
											<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>"/>
											<?php } ?>
											
										</a>
									</figure>	

									<div class="event-detail">
										<h4 class="event-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h4>

										<div class="event-date">
											<span><?php echo get_the_date(); ?></span>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						</aside>
						<?php
					} 
				}?>

				<?php wp_reset_query(); ?>

				<?php if($show_portfolio == 1){ ?>
				<aside class="widget portfolio-sidebar clearfix">
					<?php
					
					if(!empty($portfolio_category)) { ?>
					<h3 class="widget-title"><?php echo get_cat_name(esc_attr($portfolio_category)); ?></h3>
					
					<?php    
					$loop = new WP_Query( array(
						'cat' => $portfolio_category,
						'posts_per_page' => 6,
						)); ?>
						<div class="portfolio-wrap">
							<?php while ($loop->have_posts()) : $loop->the_post(); ?>

								<div class="portfolio-list">
									<div class="portfolio-thumbnail">
										<a href="<?php the_permalink();?>">
											<?php 
											if(has_post_thumbnail()){
												the_post_thumbnail('portfolio-side-thumbnail'); 
											}?>
										</a>
									</div>
								</div>
							<?php endwhile; ?>
						</div>            
						<?php wp_reset_postdata(); 
					} ?>
				</aside>
				<?php } ?>
				
				<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
					<?php dynamic_sidebar( 'right-sidebar' ); ?>
				<?php endif; ?>
			</div><!-- #secondary -->
			<?php } ?>
