<?php

//Set theme up
if ( ! function_exists( 'bplate_setup' ) ) :

    function bplate_setup() {
        //RSS feed links to head
        add_theme_support( 'automatic-feed-links' );

        //Let WordPress handle the title tag
        add_theme_support( 'title-tag' );

        //Add post thumbnail support
        add_theme_support( 'post-thumbnails' );

        //Add a navigation menu
        register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'bplate' ),
		) );

        //Change core markup so it's valid HTML5
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        //Add support for selective refresh widgets
        add_theme_support( 'customize-selective-refresh-widgets' );
    }

endif;
add_action( 'after_setup_theme', 'bplate_setup' );

//Add a widget area
function bplate_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bplate' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bplate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'bplate_widgets_init' );

//Enqueue scripts and styles
function bplate_scripts() {
    //Enqueue style.css
	wp_enqueue_style( 'bplate-style', get_template_directory_uri().'/public/css/style.min.css' );

	//Enqueue Fonts
	wp_enqueue_style( 'bplate-font', "https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,700,700i,800|Roboto+Slab:100,300,400,700" );

	//DEPRECATED: Enqueue Font Awesome
	// - Font Awesome 5 JS Enqueued Below
	//wp_enqueue_style( 'bplate-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" );

    //Enqueue JQuery
    wp_deregister_script('jquery');
    wp_register_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js", false, null, true);
	wp_enqueue_script('jquery');
	
	//Enqueue Font Awesome 5 JS - Using CSS instead due to limited support for pseudo elements
	//wp_register_script('fa-icons', "https://use.fontawesome.com/releases/v5.0.8/js/all.js", false, null, true);
	//wp_enqueue_script('fa-icons');

	//Enqueue Font Awesome 5 CSS
	wp_enqueue_style( 'bplate-icons', "https://use.fontawesome.com/releases/v5.0.10/css/all.css" );

    //Enqueue Comment Reply script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply');
	}

	// DEPRECATED: Remove "ignore." from "ignore.slick.min.js" in ./src/js/ to use Slick Slider.
	// - Enqueue Slick Slider - CSS is merged with main CSS file using SCSS. Be sure to uncomment the import in style-style-main.scss.
	// - Example initialization inside of custom.js. Be sure to uncomment that as well if you want to use it.
	//wp_register_script( 'slickSlider', get_template_directory_uri().'/public/js/slick.min.js', false, null, true);
	//wp_enqueue_script( 'slickSlider');

	//Enqueue Bundled and Minified JS file.
	wp_register_script( 'bundleJS', get_template_directory_uri().'/public/js/bundle.min.js', false, null, true);
	$template_directory = get_template_directory_uri();
	wp_localize_script('bundleJS', 'globalVars', array(
		'templateDirectory' => $template_directory,
		'visitorIP' => $_SERVER['REMOTE_ADDR']
	));
	wp_enqueue_script( 'bundleJS');
}
add_action( 'wp_enqueue_scripts', 'bplate_scripts' );

//Added posted on function (Meta information)
if ( ! function_exists( 'bplate_posted_on' ) ) :
function bplate_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		//$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';

		//Published Date Only
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		/* translators: %s: post date. */
		esc_html_x( 'Posted on %s', 'post date', 'bplate' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( 'by %s', 'post author', 'bplate' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

//Disable WordPress Emojis. The reasoning behind this is that the WP Emoji script is called in the head and this is render blocking.
remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); 
remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
remove_action( 'admin_print_styles', 'print_emoji_styles' );

//Asset directory function for ease of use - DEPRECATED
// function the_asset_dir(){
// 	echo get_template_directory_uri().'/assets';
// }

function the_asset_dir(){
	$num_args = func_num_args();

	if($num_args == 0){
		echo get_template_directory_uri() . '/assets';
	}

	if($num_args == 1){
		echo get_template_directory_uri() . '/assets/' . func_get_arg(0);
	}
}

//Email Submission Component
require_once('email-component/main.php');

//Volunteer Submission Component - DEPRECATED - Use gravity forms for volunteer submissions
//require_once('volunteer-component/main.php');

//Deregister Email and Volunteer AJAX script. Email AJAX script is bundled. Comment lines out if not using bundled JS file.
wp_deregister_script('email_ajax_js');
//wp_deregister_script('volunteer_ajax_js');

//Add premade functions for various items such as social icons
require_once('prefab/main.php');

//Custom Post Type registration

function create_posttype() {
 
    register_post_type( 'Bukidnon News',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Bukidnon News' ),
                'singular_name' => __( 'Bukidnon News' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'news'),
        )
	);
	register_post_type( 'Client Testimonial',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Testimonial' ),
                'singular_name' => __( 'Testimonials' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'testimonial'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );
?>