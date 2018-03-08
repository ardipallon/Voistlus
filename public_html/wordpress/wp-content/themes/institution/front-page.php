<?php
/**
 *
 * @package Institution
 */

get_header(); 
?>

            
<?php if ( is_front_page() && !is_home() ) { ?>
	<?php $hideslide = get_theme_mod('hide_slider', '1'); ?>
		<?php if($hideslide == ''){ ?>
                <!-- Slider Section -->
                <?php for($sld=7; $sld<10; $sld++) { ?>
                	<?php if( get_theme_mod('page-setting'.$sld)) { ?>
                	<?php $slidequery = new WP_query(array('page_id' => get_theme_mod('page-setting'.$sld,true))); ?>
                	<?php while( $slidequery->have_posts() ) : $slidequery->the_post();
                			$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
                			$img_arr[] = $image;
               				$id_arr[] = $post->ID;
                		endwhile;
						wp_reset_postdata();
                	}
                }
                ?>
<?php if(!empty($id_arr)){ ?>
        <div id="slider" class="nivoSlider">
            <?php 
            $i=1;
            foreach($img_arr as $url){ ?>
            <?php if(!empty($url)){ ?>
            <img src="<?php echo esc_url($url); ?>" title="#slidecaption<?php echo esc_attr($i); ?>" />
            <?php } ?>
            <?php $i++; }  ?>
        </div>   
<?php 
	$i=1;
		foreach($id_arr as $id){ 
		$title = get_the_title( $id ); 
		$post = get_post($id); 
?>                 
<div id="slidecaption<?php echo esc_attr($i); ?>" class="nivo-html-caption">
    <div class="top-bar">
    	<h2><?php echo esc_html($title); ?></h2>
    	<?php the_excerpt(); ?>
        <a class="button" href="<?php the_permalink(); ?>"><?php echo esc_attr(get_theme_mod('slide_text',__('Start a Course','institution')));?></a>
    </div>
</div>      
    <?php $i++; } ?>       
     </div>
<div class="clear"></div>        
</section>
<?php } ?>
<div class="clear"></div>
<!-- Slider Section -->
<?php } } ?>

  <div class="main-container">
                       <?php $hidebox = get_theme_mod('hide_boxes', '1'); ?>  
             <?php if($hidebox == '') { ?>  
             <section>
            	<div class="container">
         <?php if(get_theme_mod('page-setting1') != '') { ?>
         	<?php $page_query = new WP_Query(array('page_id' => get_theme_mod('page-setting1'))); ?>
         		<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                          <div class="home-section">
                          		<div class="home-left">
                                	<h3><?php the_title(); ?></h3>				
										<?php the_excerpt(); ?>
									<a class="ReadMore" href="<?php the_permalink(); ?>"><?php _e('Read More','institution'); ?></a>	
                                </div><!-- home-left -->
                                <div class="home-right">
                                	<?php if(has_post_thumbnail()) { ?>
                                		<div class="whatwe-thumb"><?php the_post_thumbnail('full'); ?></div>
                                <?php } ?>
                                </div><!-- home-right --><div class="clear"></div>
                </div><!-- home-section -->
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php } ?>
                    <div class="clear"></div>
                    </div><!-- container -->
            </section>
                       <?php }  ?>
                      
            
    <div class="content-area">
        <div class="middle-align content_sidebar">
            <div class="site-main" id="sitemain">
				<?php
                if ( have_posts() ) :
                    // Start the Loop.
                    while ( have_posts() ) : the_post();
                        /*
                         * Include the post format-specific template for the content. If you want to
                         * use this in a child theme, then include a file called called content-___.php
                         * (where ___ is the post format) and that will be used instead.
                         */
                        get_template_part( 'content-page', get_post_format() );
						
                    endwhile;
                    // Previous/next post navigation.
                    the_posts_pagination();
					wp_reset_postdata();
                
                else :
                    // If no content, include the "No posts found" template.
                     get_template_part( 'no-results' );
                
                endif;
                ?>
            </div>
            <?php get_sidebar();?>
            <div class="clear"></div>
        </div>
    </div><div class="clear"></div>
<?php get_footer(); ?>