<?php
add_action('wp_head' , 'dynamic_style');
function dynamic_style(){

    //font-family for header h1 to h6.
    $heading_fonts = get_theme_mod('heading_typography' , 'open sans' );
    
    //font-family for body text.
    $body_fonts = get_theme_mod('body_typography' , 'open sans' );
    
    //typography format body
    $body_fonts_size = get_theme_mod('typography_size_body' , '14' );
    $body_color = get_theme_mod('typography_color_body' , '#000' );
    
    //typography format for h1 to h6
    
    $font_size_h1 = get_theme_mod('typography_format_h1' , '30');
    $color_h1 = get_theme_mod('typography_color_h1' , '#000');
    
    $font_size_h2 = get_theme_mod('typography_format_h2' , '26' );
    $color_h2 = get_theme_mod('typography_color_h2' , '#000');
    
    $font_size_h3 = get_theme_mod('typography_format_h3' , '22' );
    $color_h3 = get_theme_mod('typography_color_h3' , '#000' );
    
    $font_size_h4 = get_theme_mod('typography_format_h4' , '20' );
    $color_h4 = get_theme_mod('typography_color_h4' , '#000' );
    
    $font_size_h5 = get_theme_mod('typography_format_h5' , '18' );
    $color_h5 = get_theme_mod('typography_color_h5');
    
    $font_size_h6 = get_theme_mod('typography_format_h6' , '16' );
    $color_h6 = get_theme_mod('typography_color_h6' , '#000' );
    
    //top header bg_color
    $top_header_bgcolor = get_theme_mod( 'top_header_bgcolor' , '#3c90be' );
    $top_header_color = get_theme_mod( 'top_header_color' , '#fff' );
    
    //menu color
    $menu_bgpattern = get_theme_mod( 'menu_bgimage' , '#333');
    $menu_bgcolor = get_theme_mod( 'menu_bgcolor' , '#fff');
    $menu_color = get_theme_mod( 'menu_color' , '#222' );

    ?>
    <style>
        body,
        button,
        input,
        select,
        textarea, .bttn,
        button,
        input[type="button"],
        input[type="reset"],
        input[type="submit"], span, p {
         font-family:<?php echo $body_fonts.';';?>
     }

     .posted-on a, .cat-links a{
         color:<?php echo $body_color.';';?>
     }

     h1, h2, h3, h4, h5, h6 {
         font-family:<?php echo $heading_fonts.' ;';?>
     }

     p{
         font-size:<?php echo $body_fonts_size.';';?>
         color:<?php echo $body_color.'px;';?>
     }

     #top-section h1, .entry-header h1, article.hentry h1.entry-title{
         color:<?php echo $color_h1.';';?>
         font-size:<?php echo $font_size_h1.'px;';?>
     }
     .featured-post h2{
         color:<?php echo $color_h2.' !important;';?>
         font-size:<?php echo $font_size_h2.'px;';?>
     }

     #bottom-section h3, #bottom-section h3.widget-title, 
     #top-footer h3.widget-title{
         color:<?php echo $color_h3.';';?>
         font-size:<?php echo $font_size_h3.'px;';?>
     }

     .event-detail h4{
         color:<?php echo $color_h4.';';?>
         font-size:<?php echo $font_size_h4.'px;';?>
     }

     #top-header{
        <?php if(!empty($menu_bgpattern)){ ?>
            background: rgba(0, 0, 0, 0) url("<?php echo $menu_bgpattern; ?>") repeat scroll 0 0 ;
            <?php }else{ ?>
                background-color: <?php echo $menu_bgcolor;?>;
                <?php } ?>

            }

            .top-right{
                background-color: <?php echo $top_header_bgcolor; ?>;    
            }

            .header-text span, .socials a, .search-box i.fa, .header-text{
                color: <?php echo $top_header_color; ?>;
            }

            .main-navigation li a{
                color: <?php echo $menu_color; ?>;
            }
            
        </style>
        <?php
    }
    ?>