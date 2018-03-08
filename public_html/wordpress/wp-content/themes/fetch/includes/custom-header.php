<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>

 *
 * @package Fetch
 */
 
/**
 * Setup the WordPress core custom header feature.
 *
 * @uses fetch_header_style()  
 * @uses fetch_admin_header_style() 
 * @uses fetch_admin_header_image()   
 *
 * @package Fetch
 */
function fetch_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'fetch_custom_header_args', array(
		'default-image'          => '',
		'header_text'            => true,
		'width'                  => 1920,
		'height'                 => 400,
		'flex-height'            => true, 
		'video'                  => true,
		'wp-head-callback'       => 'fetch_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'fetch_custom_header_setup' );



if ( ! function_exists( 'fetch_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see fetch_custom_header_setup().  
 */
function fetch_header_style() {
	$header_text_color = get_header_textcolor();
	if ( get_header_image() ) {
	?>
	<style type="text/css">    
        .header-inner {
        	
        }
        .custom-header-media img {
		    display: block;
		}
      
	</style>
	<?php
	}
	if ( 'blank' === $header_text_color ) {
	?>
		<style type="text/css">
			.site-title,
			.branding .site-branding .site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		</style> 
	<?php }
   /* Header Video Settings */
    if(function_exists('is_header_video_active') ) {
		if ( is_header_video_active() ) { ?>
			<style type="text/css">    
				#wp-custom-header-video-button {
				    position: absolute;
				    z-index:1;
				    top:20px;
				    right: 20px;
				    background:rgba(34, 34, 34, 0.5);
				    border: 1px solid rgba(255,255,255,0.5);
				}
				.wp-custom-header iframe,
				.wp-custom-header video {
				      display: block;
				      max-width: 100%;
				      height: auto;
				      width: 100vw;
				      overflow: hidden;
				      object-fit: cover;
				}

		    </style><?php
		}
    }
}
endif; // fetch_header_style


/**
 * Customize video play/pause button in the custom header.
 */
if(!function_exists('fetch_video_controls') ) {
	function fetch_video_controls( $settings ) {
		$settings['l10n']['play'] = '<span class="screen-reader-text">' . __( 'Play background video', 'fetch' ) . '</span><i class="fa fa-play"></i>';
		$settings['l10n']['pause'] = '<span class="screen-reader-text">' . __( 'Pause background video', 'fetch' ) . '</span><i class="fa fa-pause"></i>';
		return $settings;
	}
}
add_filter( 'header_video_settings', 'fetch_video_controls' );
