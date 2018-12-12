<?php
  function loadfiles() {
    wp_enqueue_style( 'bootstrap-rtl', get_template_directory_uri().'/css/bootstrap-rtl.min.css', false );
    wp_enqueue_style( 'Font-awesome', get_template_directory_uri().'/css/all.css', false );
    wp_enqueue_style( 'owl.carousel', get_template_directory_uri().'/css/owl.carousel.min.css', false );
    wp_enqueue_style( 'owl.theme.default', get_template_directory_uri().'/css/owl.theme.default.min.css', false );
    wp_enqueue_style( 'jquery.sidr.bare', get_template_directory_uri().'/css/jquery.sidr.bare.css', false );
    wp_enqueue_style( 'style', get_template_directory_uri().'/css/style.css', false );
    wp_enqueue_style( 'responsive', get_template_directory_uri().'/css/responsive.css', false );

    wp_enqueue_script( 'popper.min', get_template_directory_uri().'/js/popper.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'bootstrap.min', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'owl.carousel', get_template_directory_uri().'/js/owl.carousel.min.js', array(), '1.0', true );
    wp_enqueue_script( 'jquery.sidr', get_template_directory_uri().'/js/jquery.sidr.min.js', array(), '1.0', true );
}
  add_action( 'wp_enqueue_scripts', 'loadfiles' );
  function register_my_menus() {
    register_nav_menus(
      array(
        'topsearch-menu' => __( 'منوی بالای جستوجوگر' ),
        'main-menu' => __( 'منوی اصلی' ),
        'side-menu' => __( 'منوی موبایل' ),
        'footer-menu' => __( 'منوی فوتر' )
      )
    );
  }
  add_action( 'init', 'register_my_menus' );
  function configuration_widgets() {
  	register_sidebar( array(
  		'name'          => 'سایدبار سمت چپ',
  		'id'            => 'leftsidebar',
  		'before_widget' => '<div class="sidebox">',
  		'after_widget'  => '</section></aside></div>',
  		'before_title'  => '<aside><header><h4>',
  		'after_title'   => '</h4></header><section>',
  	) );
  	register_sidebar( array(
  		'name'          => 'ستون اول فوتر',
  		'id'            => 'firstcolfooter',
  		'before_widget' => '<div class="footer">',
  		'after_widget'  => '</section></div>',
  		'before_title'  => '<header><h4>',
  		'after_title'   => '</h4></header><section>',
  	) );
  	register_sidebar( array(
  		'name'          => 'ستون دوم فوتر',
  		'id'            => 'secondcolfooter',
  		'before_widget' => '<div class="footer">',
  		'after_widget'  => '</section></div>',
  		'before_title'  => '<header><h4>',
  		'after_title'   => '</h4></header><section>',
  	) );
  	register_sidebar( array(
  		'name'          => 'ستون سوم فوتر',
  		'id'            => 'thirdcolfooter',
  		'before_widget' => '<div class="footer">',
  		'after_widget'  => '</section></div>',
  		'before_title'  => '<header><h4>',
  		'after_title'   => '</h4></header><section>',
  	) );
  }
  add_action( 'widgets_init', 'configuration_widgets' );
  add_theme_support( 'post-thumbnails' );
  add_image_size( 'Articlethumbnail', 215, 215, true );
  function the_breadcrumb() {
    $sep = ' > ';
    if (!is_front_page()) {
	// Start the breadcrumb with a link to your homepage
        echo '<div class="breadcrumbs">';
        echo '<a href="';
        echo get_option('home');
        echo '">';
        bloginfo('name');
        echo '</a>' . $sep;
	// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category() || is_single() ){
            the_category(' > ');
        } elseif (is_archive() || is_single()){
            if ( is_day() ) {
                printf( __( '%s', 'text_domain' ), get_the_date() );
            } elseif ( is_month() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
            } elseif ( is_year() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
            } else {
                _e( 'Blog Archives', 'text_domain' );
            }
        }
	// If the current page is a single post, show its title with the separator
        if (is_single()) {
            echo $sep;
            the_title();
        }
	// If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title();
        }
	// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) {
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }
        echo '</div>';
    }
}
    // Woocommerce Theme Support
    function mytheme_add_woocommerce_support() {
    	add_theme_support( 'woocommerce' );
    }
    add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
    /*
    * Theme Support gallery-zoom
    * Theme Support gallery-lightbox
    * Theme Support gallery-slide
    */
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    //add_theme_support( 'wc-product-gallery-slider' );
    // for Comment
    function advanced_comment($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment; ?>
           <div class="comment-box">
                      <?php echo get_avatar( $comment, 75 ); ?>
                      <strong><?php echo get_comment_author_link(); ?> در <?php printf(__('%1$s'), get_comment_date('j F Y در g:i a'), get_comment_time()) ?> گفته: </strong>
                        <br>
                           <p><?php comment_text(); ?></p>
                    <?php if ($comment->comment_approved == '0') : ?>
                      <p>
                                <em>دیدگاه شما منتظر تایید مدیریت است.</em><br />
                              </p>
                            <?php endif; ?>
                                <?php comment_reply_link( array_merge($args, array(
                                          'reply_text' => __('<i class="fas fa-reply"></i> <span>پاسخ</span>', 'textdomain'),
                                          'depth'      => $depth,
                                          'max_depth'  => $args['max_depth']
                                          )
                                  )); ?>
          </div>
<?php }

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Mytheme
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'Mytheme_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function Mytheme_register_required_plugins() {
  /*
   * Array of plugin arrays. Required keys are name and slug.
   * If the source is NOT from the .org repo, then source is also required.
   */
  $plugins = array(
      // This is an example of how to include a plugin from the WordPress Plugin Repository.
    array(
      'name'      => 'Menu Icons by ThemeIsle',
      'slug'      => 'menu-icons',
      'required'  => false,
    ),

    // This is an example of the use of 'is_callable' functionality. A user could - for instance -
    // have WPSEO installed *or* WPSEO Premium. The slug would in that last case be different, i.e.
    // 'wordpress-seo-premium'.
    // By setting 'is_callable' to either a function from that plugin or a class method
    // `array( 'class', 'method' )` similar to how you hook in to actions and filters, TGMPA can still
    // recognize the plugin as being installed.
    array(
      'name'        => 'WordPress SEO by Yoast',
      'slug'        => 'wordpress-seo',
      'is_callable' => 'wpseo_init',
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
    'id'           => 'Mytheme',                 // Unique ID for hashing notices for multiple instances of TGMPA.
    'default_path' => '',                      // Default absolute path to bundled plugins.
    'menu'         => 'tgmpa-install-plugins', // Menu slug.
    'parent_slug'  => 'themes.php',            // Parent menu slug.
    'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
    'has_notices'  => true,                    // Show admin notices or not.
    'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
    'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
    'is_automatic' => false,                   // Automatically activate plugins after installation or not.
    'message'      => '',                      // Message to output right before the plugins table.

    /*
    'strings'      => array(
      'page_title'                      => __( 'Install Required Plugins', 'Mytheme' ),
      'menu_title'                      => __( 'Install Plugins', 'Mytheme' ),
      /* translators: %s: plugin name. * /
      'installing'                      => __( 'Installing Plugin: %s', 'Mytheme' ),
      /* translators: %s: plugin name. * /
      'updating'                        => __( 'Updating Plugin: %s', 'Mytheme' ),
      'oops'                            => __( 'Something went wrong with the plugin API.', 'Mytheme' ),
      'notice_can_install_required'     => _n_noop(
        /* translators: 1: plugin name(s). * /
        'This theme requires the following plugin: %1$s.',
        'This theme requires the following plugins: %1$s.',
        'Mytheme'
      ),
      'notice_can_install_recommended'  => _n_noop(
        /* translators: 1: plugin name(s). * /
        'This theme recommends the following plugin: %1$s.',
        'This theme recommends the following plugins: %1$s.',
        'Mytheme'
      ),
      'notice_ask_to_update'            => _n_noop(
        /* translators: 1: plugin name(s). * /
        'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
        'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
        'Mytheme'
      ),
      'notice_ask_to_update_maybe'      => _n_noop(
        /* translators: 1: plugin name(s). * /
        'There is an update available for: %1$s.',
        'There are updates available for the following plugins: %1$s.',
        'Mytheme'
      ),
      'notice_can_activate_required'    => _n_noop(
        /* translators: 1: plugin name(s). * /
        'The following required plugin is currently inactive: %1$s.',
        'The following required plugins are currently inactive: %1$s.',
        'Mytheme'
      ),
      'notice_can_activate_recommended' => _n_noop(
        /* translators: 1: plugin name(s). * /
        'The following recommended plugin is currently inactive: %1$s.',
        'The following recommended plugins are currently inactive: %1$s.',
        'Mytheme'
      ),
      'install_link'                    => _n_noop(
        'Begin installing plugin',
        'Begin installing plugins',
        'Mytheme'
      ),
      'update_link' 					  => _n_noop(
        'Begin updating plugin',
        'Begin updating plugins',
        'Mytheme'
      ),
      'activate_link'                   => _n_noop(
        'Begin activating plugin',
        'Begin activating plugins',
        'Mytheme'
      ),
      'return'                          => __( 'Return to Required Plugins Installer', 'Mytheme' ),
      'plugin_activated'                => __( 'Plugin activated successfully.', 'Mytheme' ),
      'activated_successfully'          => __( 'The following plugin was activated successfully:', 'Mytheme' ),
      /* translators: 1: plugin name. * /
      'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'Mytheme' ),
      /* translators: 1: plugin name. * /
      'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'Mytheme' ),
      /* translators: 1: dashboard link. * /
      'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'Mytheme' ),
      'dismiss'                         => __( 'Dismiss this notice', 'Mytheme' ),
      'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'Mytheme' ),
      'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'Mytheme' ),

      'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
    ),
    */
  );

  tgmpa( $plugins, $config );
}
// Add Shortcode
function read_more( $atts , $content = null ) {
  return '<div class="read-more"> بیشتر بخوانید: ' . '<a href="http://localhost/1397/08/09/%d8%b3%d9%84%d8%a7%d9%85-%d8%af%d9%86%db%8c%d8%a7/">' . $content . '</a></div>';
}
add_shortcode( 'readmore', 'read_more' );
// Custom widgets
// Register and load the widget
function wpb_load_widget() {
    register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

// Creating the widget
class wpb_widget extends WP_Widget {

function __construct() {
parent::__construct(

// Base ID of your widget
'wpb_widget',

// Widget name will appear in UI
__('ابزارک اختصاصی', 'wpb_widget_domain'),

// Widget description
array( 'description' => __( 'ابزارک اختصاسی برای تین قالب', 'wpb_widget_domain' ), )
);
}

// Creating widget front-end

public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
echo __( 'متن تستی داخل ابزارک', 'wpb_widget_domain' );
echo $args['after_widget'];
}

// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'عنوان جدید', 'wpb_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpb_widget ends here
