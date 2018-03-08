 <?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Institution
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php $hidetopbar = get_theme_mod('hide_topbar', '1'); ?>
<?php if($hidetopbar == ''){ ?>
<div class="header-top">
  <div class="head-top-inner">
     		<div class="top-left">
            	<span> <?php echo esc_attr(get_theme_mod('phone')); ?></span> | <span><a href="<?php echo esc_url('mailto:'.get_theme_mod('email')); ?>"><?php echo esc_url(get_theme_mod('email')); ?></a></span>
            </div><!-- top-left -->
            <div class="top-right">
            	<a class="morebutton" href="<?php echo esc_url(get_theme_mod('apply_link')); ?>"><?php _e('Apply Now','institution'); ?></a>
            </div><!-- top-right --><div class="clear"></div>
  </div><!-- head-top-inner -->
</div><!--end header-top--> 
<?php } ?>


<div id="header">
	<div class="header-inner">
      <div class="logo">
           <?php institution_the_custom_logo(); ?>
			    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr(bloginfo( 'name' )); ?></a></h1>
					<?php $description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
						<p><?php echo $description; ?></p>
					<?php endif; ?>
      </div><!-- logo -->                    
    <div class="header_right"> 
        		 <div class="toggle">
            <a class="toggleMenu" href="#">
                <?php _e('Menu','institution'); ?>                
            </a>
    	</div><!-- toggle -->    
    <div class="sitenav">                   
   	 	<?php wp_nav_menu( array('theme_location' => 'primary') ); ?> 
    </div><!--.sitenav -->
        <div class="clear"></div>
    </div><!--header_right-->    
 <div class="clear"></div>
</div><!-- .header-inner-->
</div><!-- .header -->