<?php
/**
 * Template Name: Homepage
 *
 * This is the template that displays home pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package ZincyLite
 * 
 */
get_header(); 
$welcome_post_char = get_theme_mod('character_number' , '650');
$welcome_post_read_more = get_theme_mod('read_more');
$welcome_post_id = get_theme_mod('welcome_post');
$event_category = get_theme_mod('zincy_lite_event');
$event_number =  (get_theme_mod('show_event_number') != '') ? get_theme_mod('show_event_number') : '3';
$show_event_date = get_theme_mod('show_event_date' , '1');  
$welcome_post_width = get_theme_mod('welcome_post_width' , '0');

$feature_post_samll_icon = get_theme_mod('feature_post_icon');
$feature_post_big_icon = get_theme_mod('feature_post_icon_big','0');
$feature_post_one = get_theme_mod('feature_post_one');
$feature_post_two = get_theme_mod('feature_post_two');
$feature_post_three = get_theme_mod('feature_post_three');

$feature_post_readmore = get_theme_mod('feature_read_more');
$feature_bar_option = get_theme_mod('block_above_footer');

$testimonial_category = get_theme_mod('zincy_lite_testimonials');
$view_all_text = get_theme_mod('view_all_text' , 'View All');

if($welcome_post_width == 1){
 $welcome_class = "full-width";
}else{
 $welcome_class = "";
}
?>			
<?php if($welcome_post_id != ''){?>
<section id="top-section" class="<?php echo esc_attr($welcome_class); ?>">
 <div class="zl-wrapper welcome-wrapper clearfix">
  <div id="welcome-text">
   <?php
   if($welcome_post_id != ''){
     $posttype = get_post_type($welcome_post_id);
     $postparam = ($posttype == 'page') ? 'page_id': 'p';
     $args = array(
      'post_type' => $posttype,
      $postparam => $welcome_post_id,
      );
     $query1 = new WP_Query( $args );
     while ($query1->have_posts()) : $query1->the_post(); ?>

     <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

     <?php 
     if( has_post_thumbnail() ){
       $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false ); 
       ?>

       <figure class="welcome-text-image">
        <a href="<?php the_permalink(); ?>">
          <img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>"/>
        </a>
      </figure>	
      <?php } ?>

      <div  class="welcome-detail<?php if( !has_post_thumbnail() ){ echo " welcome-detail-full-width"; } ?>">

       <?php if(get_theme_mod('full_content') != 1){ ?>
       <div><?php echo zincy_lite_excerpt( get_the_content() , $welcome_post_char ) ?></div>
       <?php if($welcome_post_read_more != ''){?>
       <a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_attr($welcome_post_read_more); ?></a>
       <?php } 
     }else{ 
      the_content();
    } ?>

  </div>
  
<?php endwhile;	
wp_reset_postdata(); 
}
?>
</div>


<?php if($welcome_post_width != 1): ?>
  <div id="latest-events">
    <?php
    if($feature_post_one != '' || $feature_post_two != '' || $feature_post_three != ''){
      if(!empty($feature_post_one)) { ?>
      <div id="service-block-one" class="service-block clearfix <?php if($feature_post_big_icon == 1){ echo ' big-icon'; } ?>">

       <?php
       $posttype = get_post_type($feature_post_one);
       $postparam = ($posttype == 'page') ? 'page_id': 'p';
       $args = array(
         'post_type' => $posttype,
         $postparam => $feature_post_one
         );
       $query2 = new WP_Query( $args );
				// the Loop
       while ($query2->have_posts()) : $query2->the_post(); 
       ?>	
       
       <figure class="service-img <?php if($feature_post_samll_icon == 1 || $feature_post_big_icon == 1){ echo 'has-icon'; }?>">
         <?php 
         if($feature_post_samll_icon == 1 || $feature_post_big_icon == 1){ ?>

         <i class="fa <?php echo esc_attr(get_theme_mod('feature_post_one_icon')) ?>"></i>

         <?php } ?>
       </a>
     </figure>
     
     <div class="service-content">
      <h3 class="service-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      <p><?php echo zincy_lite_excerpt( get_the_content() , 65 ) ?></p>
    </div>
  <?php endwhile;
  wp_reset_postdata(); ?>
  
</div>
<?php }

if(!empty($feature_post_two)) {?>
<div id="service-block-two" class="service-block clearfix<?php if($feature_post_big_icon == 1){ echo ' big-icon'; } ?>">

 <?php
 $posttype = get_post_type($feature_post_two);
 $postparam = ($posttype == 'page') ? 'page_id': 'p';
 $args = array(
   'post_type' => $posttype,
   $postparam => $feature_post_two,
   );
 $query3 = new WP_Query( $args );

 while ($query3->have_posts()) : $query3->the_post();
 ?>	

 <figure class="service-img <?php if($feature_post_samll_icon == 1 || $feature_post_big_icon == 1){ echo 'has-icon'; }?>">
   <?php 
   if($feature_post_samll_icon == 1 || $feature_post_big_icon == 1){ ?>

   <i class="fa <?php echo esc_attr(get_theme_mod('feature_post_two_icon')) ?>"></i>

   <?php } ?>
 </figure>

 <div class="service-content">
  <h3 class="service-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
  <p><?php echo zincy_lite_excerpt( get_the_content() , 65 ) ?></p>
</div>
<?php endwhile;
wp_reset_postdata(); ?>

</div>
<?php } 

if(!empty($feature_post_three)) { ?>
<div id="service-block-three" class="service-block clearfix<?php if($feature_post_big_icon == 1){ echo ' big-icon'; } ?>">
 <?php
 $posttype = get_post_type($feature_post_three);
 $postparam = ($posttype == 'page') ? 'page_id': 'p';
 $args = array(
   'post_type' => $posttype,
   $postparam => $feature_post_three,
   );
 $query4 = new WP_Query( $args );
    				
 while ($query4->have_posts()) : $query4->the_post(); 
 ?>	

 <figure class="service-img <?php if($feature_post_samll_icon == 1 || $feature_post_big_icon == 1){ echo 'has-icon'; }?>">

   <?php 
   if($feature_post_samll_icon == 1 || $feature_post_big_icon == 1){ ?>

   <i class="fa <?php echo esc_attr(get_theme_mod('feature_post_three_icon')) ?>"></i>

   <?php } ?>
 </figure>

 <div class="service-content">
  <h3 class="service-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
  <p><?php echo zincy_lite_excerpt( get_the_content() , 65 ) ?></p>
</div>
<?php endwhile;
wp_reset_postdata(); ?>

</div>
<?php } 
}
?>
</div>



<?php endif; ?>
</div>
</section>
<?php } ?>

<?php
if ( is_active_sidebar( 'newsletter-sidebar' ) ) { ?>
<section id="newletter">
  <div class="zl-wrapper">
    <div class="newsletter-subscriber">
      <?php dynamic_sidebar( 'newsletter-sidebar' ); ?>
    </div>
  </div>
</section>
<?php } ?>
<?php
$block_title = get_theme_mod('blog_above_callaction_title');
$block_desc = get_theme_mod('blog_above_callaction_desc');
$block_cat = get_theme_mod('blog_above_callaction_cat');
$category = get_category($block_cat);
$post_count = 0;
if($block_cat != ''){
  $post_count = $category->category_count;
}
?>
<?php if(get_theme_mod('blog_above_callaction_option','1')==1 && $post_count>=1): ?>
  <section id="zl-blog">
   <section class="zl-wrapper" id="zl-blog-post">
     <div class="content-area latest-blogs clearfix">
       <?php
       if($block_cat != ''){

        $loop = new WP_Query( array(
          'cat' => $block_cat,
          'posts_per_page' => 4,
          )); ?>
          <?php $count = 0; ?>
          <?php while ($loop->have_posts()) : $loop->the_post(); ?>
            <?php $count++; ?>
            <?php if($count == 1):?>
             <div class="latest-blog-left">

               <figure class="blog-thumbnail">
                <?php 
                if( has_post_thumbnail() ){
                  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-image-big', false ); 
                  ?>
                  <img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>"/>
                  <?php } ?>
                  <div class="blog-detail">
                    <div class="latest-blog-border">
                      <h4 class="blog-title">
                       <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                     </h4>
                     <?php 
                     if($show_event_date == 1){ ?>
                     <div class="blog-date">
                      <span><?php echo get_the_date(); ?></span>
                    </div>
                    <?php
                  }
                  ?>
                  <div class="event-excerpt">
                   <?php echo zincy_lite_excerpt( get_the_content() , 100 ) ?>
                   <a href="<?php the_permalink(); ?>"><span><?php echo __( 'Learn More' , 'zincy-lite' );?></span></a>
                 </div>
               </div>
             </div>
           </figure>

         </div>
       <?php else: ?>
        <?php if($count==2 && $post_count >= 2): ?>
          <div class="latest-blog-right">
          <?php endif; ?>
          <?php
          if($count == 2){
            ?>
            <div class="blog-title-wrapper">
              <h2><?php echo $block_title; ?></h2>
              <p><?php echo $block_desc; ?></p>                           
            </div>
            <?php
          }
          ?>
          <figure class="blog-thumbnail <?php if($post_count==3){echo 'blog-fullwidth';}?>">
            <?php 
            if( has_post_thumbnail() ){
              $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-image-small', false ); 
              ?>
              <img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>"/>
              <?php } ?>
              <div class="blog-detail">
               <div class="latest-blog-border">
                <h4 class="blog-title">
                 <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
               </h4>
               <?php 
               if($show_event_date == 1){ ?>
               <div class="blog-date">
                <span><?php echo get_the_date(); ?></span>
              </div>
              <?php
            }
            ?>
            <div class="event-excerpt learn-more">
             <?php //echo zincy_lite_excerpt( get_the_content() , 100 ) ?>
             <a href="<?php the_permalink(); ?>"><span><?php echo __( 'Learn More' , 'zincy-lite' );?></span></a>
           </div>
         </div>
       </div> 
     </figure>  
     <?php if($post_count > 4 && $count == 4 || $post_count< 4 && $post_count==$count): ?>
     </div> 
   <?php endif; ?>
 <?php endif; ?>
 <?php
 if($post_count <= 1 ){
  ?>
  <div class="latest-blog-right">
    <div class="blog-title-wrapper fullheight">
      <h2><?php echo $block_title; ?></h2>
      <p><?php echo $block_desc; ?></p>                           
    </div>
  </div>
  <?php
}
?>
<?php endwhile; ?>
<?php wp_reset_postdata(); 
} ?>
</div><!-- #primary -->
<div class="detail-button">
  <a class="viewall-blogs" href="<?php echo get_category_link( $block_cat ) ?>"><?php echo esc_html('View All' , 'zincy-lite'); ?></a>
</div>
</section>
<?php if(get_theme_mod('call_to_action_option','1') == '1'){ ?>
<div class="call-to-action">
  <?php do_action('zincy_lite_call_to_action');?>
</div>
<?php } ?>
</section>
<?php endif; ?>
<?php
wp_reset_query(); 
?>

<?php if($feature_bar_option == 1) :?>
  <section id="bottom-section">
   <div class="zl-wrapper">
    <div class="text-box">
      <?php 
      if ( is_active_sidebar( 'textblock-1' ) ){
        dynamic_sidebar( 'textblock-1' );
      } 
      ?>	
    </div>

    <div class="thumbnail-gallery">
      <?php 
      $gallery_code = get_theme_mod('gallery_image_code');
      if ( is_active_sidebar( 'textblock-2' ) ){
        dynamic_sidebar( 'textblock-2' );
      }elseif(!empty($gallery_code)){
        ?>
        <h3><?php _e('Gallery','zincy-lite')?></h3>
        <?php 
        echo do_shortcode($gallery_code );
      } ?>	
    </div>        

    <div class="testimonial-slider-wrap">
      <?php 
      if ( is_active_sidebar( 'textblock-3' ) ) {
        dynamic_sidebar( 'textblock-3' );
      }else{        
        if(!empty($testimonial_category)) {	
          ?>
          <h3><?php echo get_cat_name($testimonial_category); ?></h3>
          <?php
          $loop2 = new WP_Query( array(
           'cat' => $testimonial_category,
           'posts_per_page' => 5,
           )); ?>
           <div class="testimonial-wrap">
            <div class="testimonial-slider">
              <?php while ($loop2->have_posts()) : $loop2->the_post(); ?>
               <div class="testimonial-slide">
                <div class="testimonial-list clearfix">
                 <div class="testimonial-excerpt">
                  <?php echo zincy_lite_excerpt( get_the_content() , 100 ) ?>
                </div>
                <div class="testimonial-inner">
                  <div class="testimonial-thumbnail">
                   <?php 
                   if(has_post_thumbnail()){
                    the_post_thumbnail('testimonials-home'); 
                  }else{ ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial-dummy.jpg" alt="no-image"/>
                  <?php } ?>
                </div>
                <div class="testimoinal-client-name"><?php the_title(); ?></div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
    <a class="all-testimonial" href="<?php echo get_category_link( $testimonial_category ) ?>"><?php echo esc_html($view_all_text); ?>&nbsp;<i class="fa fa-long-arrow-right"></i></a>
    <?php wp_reset_postdata(); 
  }
}?>
</div>
<?php
if ( is_active_sidebar( 'textblock-4' ) ) { ?>
<div class="twitter-block-wrap">
  <div class="twitter-block">
    <?php
    dynamic_sidebar( 'textblock-4' );
    ?>  
  </div>
</div>
<?php } ?>
</div>
</section>
<?php endif; ?>

<?php
if(is_active_sidebar('zincy-above-google-map')){
  ?>
  <section id="above-google-map">
    <div class="zl-wrapper">
      <?php dynamic_sidebar('zincy-above-google-map'); ?>
    </div>
  </section>
  <?php
}
?>

<?php
if(is_active_sidebar('zincy-google-map')){
  ?>
  <section id="google-map">
    <div class="footer-google-map">
      <?php dynamic_sidebar('zincy-google-map'); ?>
    </div>
  </section>
  <?php
}
?>

<?php get_footer(); ?>