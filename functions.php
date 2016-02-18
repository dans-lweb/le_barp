<?php
/*
Author: Eddie Machado
URL: http://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, etc.
*/

// LOAD BONES CORE (if you remove this, the theme will break)
require_once( 'library/bones.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH BONES
Let's get everything up and running.
*********************/

function bones_ahoy() {

  //Allow editor style.
  add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

  // let's get language support going, if you need it
  load_theme_textdomain( 'bonestheme', get_template_directory() . '/library/translation' );

  // USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
  require_once( 'library/custom-post-type.php' );

  // launching operation cleanup
  add_action( 'init', 'bones_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'bones_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'bones_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  bones_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'bones_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'bones_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'bones_excerpt_more' );

} /* end bones ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'bones_ahoy' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 680;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 100 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 150 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'bones-thumb-600' => __('600px by 150px'),
        'bones-thumb-300' => __('300px by 100px'),
    ) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* THEME CUSTOMIZE *********************/

/* 
  A good tutorial for creating your own Sections, Controls and Settings:
  http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722
  
  Good articles on modifying the default options:
  http://natko.com/changing-default-wordpress-theme-customization-api-sections/
  http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162
  
  To do:
  - Create a js for the postmessage transport method
  - Create some sanitize functions to sanitize inputs
  - Create some boilerplate Sections, Controls and Settings
*/

function bones_theme_customizer($wp_customize) {
  // $wp_customize calls go here.
  //
  // Uncomment the below lines to remove the default customize sections 

  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  // $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');
  
  // Uncomment the following to change the default section titles
  // $wp_customize->get_section('colors')->title = __( 'Theme Colors' );
  // $wp_customize->get_section('background_image')->title = __( 'Images' );
}

add_action( 'customize_register', 'bones_theme_customizer' );

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

function new_excerpt_length($length) {
 return 35;
}
add_filter('excerpt_length', 'new_excerpt_length');


/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article  class="cf">
      <header class="comment-author vcard">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
          echo get_avatar($comment,$size='32',$default='<path_to_url>' );
        */
        ?>
        <?php // custom gravatar call ?>
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
        <?php // end custom gravatar call ?>
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'bonestheme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!


/*
This is a modification of a function found in the
twentythirteen theme where we can declare some
external fonts. If you're using Google Fonts, you
can replace these fonts, change it in your scss files
and be up and running in seconds.
*/
function bones_fonts() {
  wp_enqueue_style('googleFonts', 'http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
}

add_action('wp_enqueue_scripts', 'bones_fonts');

/* DON'T DELETE THIS CLOSING TAG */ ?>


<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'le_barp_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category le_barp
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
  require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
  require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 object $cmb CMB2 object
 *
 * @return bool             True if metabox should show
 */
function le_barp_show_if_front_page( $cmb ) {
  // Don't show this metabox if it's not the front page template
  if ( $cmb->object_id !== get_option( 'page_on_front' ) ) {
    return false;
  }
  return true;
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function le_barp_hide_if_no_cats( $field ) {
  // Don't show this field if not in the cats category
  if ( ! has_tag( 'cats', $field->object_id ) ) {
    return false;
  }
  return true;
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array             $field_args Array of field parameters
 * @param  CMB2_Field object $field      Field object
 */
function le_barp_before_row_if_2( $field_args, $field ) {
  if ( 2 == $field->object_id ) {
    echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
  } else {
    echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
  }
}


add_action( 'cmb2_admin_init', 'le_barp_register_repeatable_group_field_metabox' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function le_barp_register_repeatable_group_field_metabox() {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_le_barp_group_';

  /**
   * Repeatable Field Groups
   */
  $cmb_group = new_cmb2_box( array(
    'id'           => $prefix . 'metabox',
    'title'        => __( 'Repeating Field Group', 'cmb2' ),
    'object_types' => array( 'custom_type', ),
  ) );

  // $group_field_id is the field id string, so in this case: $prefix . 'demo'
  $group_field_id = $cmb_group->add_field( array(
    'id'          => $prefix . 'demo',
    'type'        => 'group',
    'description' => __( 'Generates reusable form entries', 'cmb2' ),
    'options'     => array(
      'group_title'   => __( 'Entry {#}', 'cmb2' ), // {#} gets replaced by row number
      'add_button'    => __( 'Add Another Entry', 'cmb2' ),
      'remove_button' => __( 'Remove Entry', 'cmb2' ),
      'sortable'      => true, // beta
      // 'closed'     => true, // true to have the groups closed by default
    ),
    'fields'      => array(
                        array(
          'name' => __( 'Title', 'cmb2' ),
              'id'   => 'title',
              'type' => 'text'
          ),
        array(
          'name' => __( 'Description', 'cmb2' ),
              'id'   => 'description',
              'type' => 'textarea_small'
        ),
        array(
          'name' => __( 'Fichier à télécharger', 'cmb2' ),
          'id'   => 'file_link',
          'type' => 'file',
          
            ),
      ),
  ) );
  
  

}

add_action( 'cmb2_admin_init', 'le_barp_register_user_profile_metabox' );
/**
 * Hook in and add a metabox to add fields to the user profile pages
 */
function le_barp_register_user_profile_metabox() {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_le_barp_user_';

  /**
   * Metabox for the user profile screen
   */
  $cmb_user = new_cmb2_box( array(
    'id'               => $prefix . 'edit',
    'title'            => __( 'User Profile Metabox', 'cmb2' ),
    'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta vs post_meta
    'show_names'       => true,
    'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
  ) );

  $cmb_user->add_field( array(
    'name'     => __( 'Extra Info', 'cmb2' ),
    'desc'     => __( 'field description (optional)', 'cmb2' ),
    'id'       => $prefix . 'extra_info',
    'type'     => 'title',
    'on_front' => false,
  ) );

  $cmb_user->add_field( array(
    'name'    => __( 'Avatar', 'cmb2' ),
    'desc'    => __( 'field description (optional)', 'cmb2' ),
    'id'      => $prefix . 'avatar',
    'type'    => 'file',
  ) );

  $cmb_user->add_field( array(
    'name' => __( 'Facebook URL', 'cmb2' ),
    'desc' => __( 'field description (optional)', 'cmb2' ),
    'id'   => $prefix . 'facebookurl',
    'type' => 'text_url',
  ) );

  $cmb_user->add_field( array(
    'name' => __( 'Twitter URL', 'cmb2' ),
    'desc' => __( 'field description (optional)', 'cmb2' ),
    'id'   => $prefix . 'twitterurl',
    'type' => 'text_url',
  ) );

  $cmb_user->add_field( array(
    'name' => __( 'Google+ URL', 'cmb2' ),
    'desc' => __( 'field description (optional)', 'cmb2' ),
    'id'   => $prefix . 'googleplusurl',
    'type' => 'text_url',
  ) );

  $cmb_user->add_field( array(
    'name' => __( 'Linkedin URL', 'cmb2' ),
    'desc' => __( 'field description (optional)', 'cmb2' ),
    'id'   => $prefix . 'linkedinurl',
    'type' => 'text_url',
  ) );

  $cmb_user->add_field( array(
    'name' => __( 'User Field', 'cmb2' ),
    'desc' => __( 'field description (optional)', 'cmb2' ),
    'id'   => $prefix . 'user_text_field',
    'type' => 'text',
  ) );

}

add_action( 'cmb2_admin_init', 'le_barp_register_theme_options_metabox' );
/**
 * Hook in and register a metabox to handle a theme options page
 */
function le_barp_register_theme_options_metabox() {

  // Start with an underscore to hide fields from custom fields list
  $option_key = '_le_barp_theme_options';

  /**
   * Metabox for an options page. Will not be added automatically, but needs to be called with
   * the `cmb2_metabox_form` helper function. See wiki for more info.
   */
  $cmb_options = new_cmb2_box( array(
    'id'      => $option_key . 'page',
    'title'   => __( 'Theme Options Metabox', 'cmb2' ),
    'hookup'  => false, // Do not need the normal user/post hookup
    'show_on' => array(
      // These are important, don't remove
      'key'   => 'options-page',
      'value' => array( $option_key )
    ),
  ) );

  /**
   * Options fields ids only need
   * to be unique within this option group.
   * Prefix is not needed.
   */
  $cmb_options->add_field( array(
    'name'    => __( 'Site Background Color', 'cmb2' ),
    'desc'    => __( 'field description (optional)', 'cmb2' ),
    'id'      => 'bg_color',
    'type'    => 'colorpicker',
    'default' => '#ffffff',
  ) );

}

