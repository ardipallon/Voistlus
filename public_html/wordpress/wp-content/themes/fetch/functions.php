<?php
/**
 * fetch functions and definitions
 *
 * @package Fetch
 */


if ( ! function_exists( 'fetch_setup' ) ) :  
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fetch_setup() { 

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on fetch, use a find and replace
	 * to change 'fetch' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'fetch', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'fetch' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-list', 'gallery', 'caption',
	) );


	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'fetch_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 */
	$GLOBALS['content_width'] = apply_filters( 'fetch_content_width', 780 );


    /* 
    * Custom Logo 
    */
    add_theme_support( 'custom-logo' );

    
	/* Woocommerce support */

	add_theme_support('woocommerce');
	add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

	/*
	 * Add Additional image sizes
	 *
	 */
	add_image_size( 'fetch-recent-work', 220, 220, true );
	add_image_size( 'fetch-recent-posts-img', 370, 220, true );
	add_image_size( 'fetch-service-img', 280, 380, true );
	add_image_size( 'fetch-blog-full-width', 380,350, true );
	add_image_size( 'fetch-small-featured-image-width', 450,300, true );
	add_image_size( 'fetch-blog-large-width', 800,300, true );     

    // Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
		
			'top-left' => array(
				// Widget ID
			    'my_text' => array(
					// Widget $id -> set when creating a Widget Class
		        	'custom_html' , 
		        	// Widget $instance -> settings 
					array(
					  'content'  => sprintf('<ul><li><i class="fa fa-phone"></i>(012)1234 5678</li><li><i class="fa fa-clock-o"></i>%1$s</li><li><i class="fa fa-envelope"></i>%2$s</li</ul>',__('Mon - Sat:09.00-18.00','fetch'),__('example.com','fetch') )
					) 
				)
			),

			// Put two core-defined widgets in the footer 2 area.
			'top-right' => array(
				// Widget ID
			    'my_text' => array(
					// Widget $id -> set when creating a Widget Class
		        	'custom_html' , 
		        	// Widget $instance -> settings 
					array (
					  'content'  => '<ul><li><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-skype"></i></a><a href="#"><i class="fa fa-envelope"></i></a><a href="#"><i class="fa fa-google"></i></a></li></ul>'
					)
				),
			),

			'header-right' => array(  
				// Widget ID
			    'my_text' => array(
					// Widget $id -> set when creating a Widget Class
		        	'custom_html' , 
		        	// Widget $instance -> settings 
					array (
					  'content'  => sprintf('<div class="five columns"><i class="fa fa-phone"></i><span>%1$s</span><br>1254-256-212-54</div><div class="five columns right"><i class="fa fa-envelope"></i><span>%2$s</span><br> %3$s</div><div class="six columns"><i class="fa fa-clock-o"></i><span>%4$s</span><br>%5$s</div>',__('Call Us:','fetch'),__('Email Us:','fetch'),__('example.com','fetch'),__('Opening Time:','fetch'),__('Mon-Sat: 8.00am-6.00pm','fetch') ),
					)
				),
			),

			'footer' => array(
				// Widget ID
			    'my_text' => array(
					// Widget $id -> set when creating a Widget Class
		        	'custom_html' , 
		        	// Widget $instance -> settings 
					array(
					  'content'  => __('<h4 class="widget-title">Fetch</h4>Structure personal participate in ethics training as part of our best practices program and each employee is provided with a skillset that help them makes the best decisions.','fetch'),
					)
				)
			),
			'footer-2' => array(
				// Widget ID
			    'recent-posts'
			),
			'footer-3' => array(
				// Widget ID
			    'my_text' => array(
					// Widget $id -> set when creating a Widget Class
		        	'custom_html' , 
		        	// Widget $instance -> settings 
					array(
					  'content' => sprintf('<h4 class="widget-title">%1$s</h4><ul><li>%2$s</li><li>(102) 6666 8888</li><li>%3$s</li><li>(102) 8888 9999</li><li>%4$s</li></ul>',__('Contact Details','fetch'),__('14 Tottenham Court Road, London, English','fetch'),__('example.com','fetch'),__('Mon - Sat: 9:00 - 18:00','fetch'))	
					)
				)
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home' => array(
				'post_type' => 'page',
			),
			'blog' => array(
				'post_type' => 'page',
			),
			'slider-one' => array( 
	            'post_type' => 'post',
	            'post_title' => __( 'Post One', 'fetch'),
	            'post_content' => __( '<h1>Construction Services</h1>Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod.<p><a href="#">Buy Theme for $39</a></p>', 'fetch'),
	            'thumbnail' => '{{post-featured-image}}',
	        ),
	        'slider-two' => array(
	            'post_type' => 'post',
	            'post_title' => __( 'Post Two', 'fetch'),
	            'post_content' => __( '<h1>Construction Services</h1> Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod.<p><a href="#">Buy Theme for $39</a></p>', 'fetch'),
	            'thumbnail' => '{{post-featured-image}}',
	        ), 
	        'service-section-title' => array(  
				'post_type' => 'page',
				'post_title' => __( 'Our Services', 'fetch'),
	            'post_content' => __( 'We are leading project management and building contractor based in world', 'fetch'),
	        ),
			'service-one' => array(  
				'post_type' => 'page',
				'post_title' => __( 'Ocean Fetch', 'fetch'),
	            'post_content' => __( 'Structure has the resources and Knowledge to undertake just about any job.<p><a href="#">Read More</a></p>', 'fetch'),
				'thumbnail' => '{{page-images1}}',
			),
			'service-two' => array(
				'post_type' => 'page',
				'post_title' => __( 'Professional Delivery', 'fetch'),
	            'post_content' => __( 'We rely on advanced technology to deliver Constrcution Projects and Engineering.<p><a href="#">Read More</a></p>', 'fetch'),
				'thumbnail' => '{{page-images2}}',
			),
			'service-three' => array(
				'post_type' => 'page',
				'post_title' => __( 'Fly Services', 'fetch'),
	            'post_content' => __( 'Our supply chain Organization provides our customers with global procurement
					<p><a href="#">Read More</a></p>', 'fetch'),
				'thumbnail' => '{{page-images3}}',
			),
			'service-four' => array(
				'post_type' => 'page',
				'post_title' => __( 'Storage Servcies', 'fetch'),
	            'post_content' => __( 'Our supply chain Organization provides our customers with global procurement
					<p><a href="#">Read More</a></p>', 'fetch'),
				'thumbnail' => '{{page-images1}}',
			),
			'aboutus_section_title' => array(  
				'post_type' => 'page',
				'post_title' => __( 'About Us', 'fetch'),
	            'post_content' => __( 'We are leading project management and building contractor based in world', 'fetch'),
	        ),
			'aboutus_section_img' => array(
				'post_type' => 'page',
				'post_title' => __( 'Fetch Image', 'fetch'),
				'thumbnail' => '{{page-images}}',
			),
			'recent-post-section-title' => array(  
				'post_type' => 'page',
				'post_title' => __( 'Blog & Latest News', 'fetch'),
	            'post_content' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', 'fetch'),
	        ),
			
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'post-featured-image' => array( 
				'post_title' => __( 'slider one', 'fetch' ),
				'file' => 'images/slider.png', // URL relative to the template directory.
			),
			'page-images' => array(
				'post_title' => __( 'Page Images', 'fetch' ),
				'file' => 'images/aboutus-img.png', // URL relative to the template directory.
			),
			'page-images1' => array(
				'post_title' => __( 'Page Images', 'fetch' ),
				'file' => 'images/b-1.png', // URL relative to the template directory.
			),
			'page-images2' => array(
				'post_title' => __( 'Page Images', 'fetch' ),
				'file' => 'images/b-2.png', // URL relative to the template directory.
			),
			'page-images3' => array(
				'post_title' => __( 'Page Images', 'fetch' ),
				'file' => 'images/b-3.png', // URL relative to the template directory.
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),  

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array( 
			'slider_cat' => '1',
			'service_section_1' => '{{service-one}}',
			'service_section_2' => '{{service-two}}',
			'service_section_3' => '{{service-three}}',
			'service_section_4' => '{{service-four}}',
			'service_section_icon_1' => 'fa-user',
			'service_section_icon_2' => 'fa-heart',
			'service_section_icon_3' => 'fa-apple',
			'service_section_icon_4' => 'fa-anchor',
			'aboutus_section_title' => '{{aboutus_section_title}}',
			'aboutus_section_img' => '{{aboutus_section_img}}',
			'service_section_title' => '{{service-section-title}}',
			'recent_post_section_title' => '{{recent-post-section-title}}'
			
		),

	);

	$starter_content = apply_filters( 'fetch_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );

	     
}
endif; // fetch_setup
add_action( 'after_setup_theme', 'fetch_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function fetch_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'fetch' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );  
	register_sidebar( array(
		'name'          => __( 'Top Left', 'fetch' ),
		'id'            => 'top-left',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Top Right', 'fetch' ),
		'id'            => 'top-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Header Right', 'fetch' ),
		'id'            => 'header-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebars( 3, array(
		'name'          => __( 'Footer %d', 'fetch' ),
		'id'            => 'footer',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Nav', 'fetch' ),
		'id'            => 'footer-nav',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'fetch_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/includes/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';
/**
 * Implement the Custom Header feature.
 */
require  get_template_directory()  . '/includes/custom-header.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

/**
 * Load Theme Options Panel
 */
require get_template_directory() . '/includes/theme-options.php';

/**
 * Load TGM plugin 
 */
require get_template_directory() . '/admin/class-tgm-plugin-activation.php';

/* Woocommerce support */

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper');
add_action('woocommerce_before_main_content', 'fetch_output_content_wrapper');

function fetch_output_content_wrapper() {
	echo '<div class="container"><div class="row"><div id="primary" class="content-area eleven columns">';
}

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end' );
add_action( 'woocommerce_after_main_content', 'fetch_output_content_wrapper_end' );

function fetch_output_content_wrapper_end () {
	echo "</div>";
}

add_action( 'init', 'fetch_remove_wc_breadcrumbs' );
function fetch_remove_wc_breadcrumbs() {
   	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}
/* Demo importer */
add_filter( 'pt-ocdi/import_files', 'fetch_import_demo_data' );
if ( ! function_exists( 'fetch_import_demo_data' ) ) {
	function fetch_import_demo_data() {
	  return array(
	    array(   
	      'import_file_name'             => __('Demo Import','fetch'),
	      'categories'                   => array( 'Category 1', 'Category 2' ),
	      'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo/demo-content.xml',
	      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo/widgets.json',
	      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo/customizer.dat',
	    ),
	  ); 
	}
}

add_action( 'pt-ocdi/after_import', 'fetch_after_import' );
if ( ! function_exists( 'fetch_after_import' ) ) {
	function fetch_after_import( $selected_import ) { 
		$importer_name  = __('Demo Import','fetch'); 
	 
	    if ( $importer_name === $selected_import['import_file_name'] ) {
	        //Set Menu
	        $top_menu = get_term_by('name', 'Primary Menu', 'nav_menu'); 
	        set_theme_mod( 'nav_menu_locations' , array( 
	              'primary' => $top_menu->term_id,
	             ) 
	        );

		    //Set Front page
		    if( get_option('page_on_front') === '0' && get_option('page_for_posts') === '0' ) {
			   $page = get_page_by_title( 'Home');
			   $blog = get_page_by_title( 'Blog');
			   if ( isset( $page->ID ) ) {
			   	    update_option( 'show_on_front', 'page' );
				    update_option( 'page_on_front', $page->ID );
				    update_option('page_for_posts', $blog->ID);
			   }
		    }
	    }
	     
	}
}

/* Check whether the One Click Import Plugin is installed or not */

function fetch_is_plugin_installed($plugin_title)
{
    // get all the plugins
    $installed_plugins = get_plugins();

    foreach ($installed_plugins as $installed_plugin => $data) {

        // check for the plugin title
        if ($data['Title'] == $plugin_title) {

            // return the plugin folder/file
            return true;
        }
    }

    return false;
}

/* Recommended plugin using TGM */
add_action( 'tgmpa_register', 'fetch_register_plugins');
if( !function_exists('fetch_register_plugins') ) {
	function fetch_register_plugins() {
       /**
		 * Array of plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 */
		$plugins = array(

			array(
				'name'     => 'Contact Form 7', // The plugin name.
				'slug'     => 'contact-form-7', // The plugin slug (typically the folder name).
				'required' => false, // If false, the plugin is only 'recommended' instead of required.
			),
			array(
				'name'     => 'One Click Demo Import', // The plugin name.
				'slug'     => 'one-click-demo-import', // The plugin slug (typically the folder name).
				'required' => false, // If false, the plugin is only 'recommended' instead of required.
			),
		);
		/*
		 * Array of configuration settings. Amend each line as needed.
		 *
		 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
		 * strings available, please help us make TGMPA even better by giving us access to these translations or by
		 * sending in a pull-request with .po file(s) with the translations.
		 *
		 * Only uncomment the strings in the config array if you want to customize the strings.
		 */
		$config = array(
			'id'           => 'tgmpa',
			// Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',
			// Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins',
			// Menu slug.
			'parent_slug'  => 'themes.php',
			// Parent menu slug.
			'capability'   => 'edit_theme_options',
			// Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices'  => true,
			// Show admin notices or not.
			'dismissable'  => true,
			// If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',
			// If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,
			// Automatically activate plugins after installation or not.
			'message'      => '',
			// Message to output right before the plugins table.
		);

		tgmpa( $plugins, $config );
	}
}

/* To Hide Branding message in One Click demo import*/

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );