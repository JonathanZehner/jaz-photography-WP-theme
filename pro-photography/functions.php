<?php

remove_action('shutdown', 'wp_ob_end_flush_all', 1);

/*======================================
    Add stylesheets and javascript files
========================================*/

// Create function to load stylesheets
// Create function to load javascript
// Create function to call files and load them
function custom_theme_scripts(){
    // Bootstrap CSS
    wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css');

    // Main CSS
    wp_enqueue_style('main-styles', get_stylesheet_uri());

    // Bootstrap Javascript files
    wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js');

    // Custom Javascript file
    wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/scripts.js');
}

add_action('wp_enqueue_scripts', 'custom_theme_scripts');

/*======================================
    Add Featured Images
========================================*/
add_theme_support('post-thumbnails');

/*======================================
    Custom Header Image
========================================*/
$custom_image_header = array(
    'width'     => 520,
    'height'    => 150,
    'uploads'   => true
);

add_theme_support('custom-header', $custom_image_header);

/*======================================
    Featured Images
========================================*/
add_theme_support('post-thumbnails');

/*======================================
    Post Data Information
========================================*/
function post_data() {
    $archive_year   = get_the_time('Y'); // Retrieve the year the article was written
    $archive_month  = get_the_time('m');// Retrieve the month the article was written
    $archive_day    = get_the_time('d');// Retrieve the day the article was written
?>
<!-- Dynamically create a link to the page of the author of the post -->
    <p>Written by: <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a> | Published on: <a href="<?php echo get_day_link($archive_year,$archive_month,$archive_day); ?>"><?php echo "$archive_month/$archive_day/$archive_year"; ?></a></p>
<?php
}

/*======================================
    Add Menus to Theme
========================================*/
function register_my_menus(){
    register_nav_menus(array( // Create menu array
        'main-menu'     =>  __('Main Menu'),
        'footer-left'   =>  __('Left Footer Menu'),
        'footer-middle' =>  __('Middle Footer Menu'),
        'footer-right'  =>  __('Right Footer Menu')
    ));
}

add_action('init','register_my_menus');

/*======================================
    Pagination Links
========================================*/
function proPhotographyPagination(){
    global $wp_query;

    $big = 999999999; // need an unlikely integer
    $translated = __( 'Page', 'mytextdomain' ); // Supply translatable string

    echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
  ) );
}

/*======================================
    Creating Widget Areas
========================================*/
function blank_widgets_init(){
    // Create Right Header Widget
    register_sidebar(array(
        'name'          =>  ('Right Header Widget'),
        'id'            =>  'right-header-widget',
        'description'   =>  'Area in right header for content',
        'before_widget' =>  '<div class="right-header-widget-container">',
        'after_widget'  =>  '</div>',
        'before_title'  =>  '<h2>',
        'after_title'   =>  '</h2>'
    ));
    // Create Sidebar Widget
    register_sidebar(array(
        'name'          =>  ('Sidebar Widget'),
        'id'            =>  'sidebar-widget',
        'description'   =>  'Area in the sidebar for content',
        'before_widget' =>  '<div class="sidebar-widget-container">',
        'after_widget'  =>  '</div>',
        'before_title'  =>  '<h2>',
        'after_title'   =>  '</h2>'
    ));
    // Create Left Footer Widget
    register_sidebar(array(
        'name'          =>  ('Left Footer Widget'),
        'id'            =>  'left-footer-widget',
        'description'   =>  'Area in left footer for content',
        'before_widget' =>  '<div class="left-footer-widget-container">',
        'after_widget'  =>  '</div>',
        'before_title'  =>  '<h2>',
        'after_title'   =>  '</h2>'
    ));
    // Create Middle Footer Widget
    register_sidebar(array(
        'name'          =>  ('Middle Footer Widget'),
        'id'            =>  'middle-footer-widget',
        'description'   =>  'Area in middle footer for content',
        'before_widget' =>  '<div class="middle-footer-widget-container">',
        'after_widget'  =>  '</div>',
        'before_title'  =>  '<h2>',
        'after_title'   =>  '</h2>'
    ));
    // Create Right Footer Widget
    register_sidebar(array(
        'name'          =>  ('Right Footer Widget'),
        'id'            =>  'right-footer-widget',
        'description'   =>  'Area in right footer for content',
        'before_widget' =>  '<div class="right-footer-widget-container">',
        'after_widget'  =>  '</div>',
        'before_title'  =>  '<h2>',
        'after_title'   =>  '</h2>'
    ));
}

// Load Widgets onto Theme:
add_action('widgets_init','blank_widgets_init');

/*====================================
    Create Custom Post Type
====================================*/
// Custom post type: Employee
    /* 
    
    This function was created using the Post Type Generator 
    from GenerateWP to create a custom post type specific to 
    employees of a company.  
    
    Visit www.generatewp.com/post-type/ and modify the desired 
    fields under General, Post Type, Labels, Options, Visibility, 
    Query, etc...
    
    */

// Register Custom Post Type
function employeeDirectory() {

	$labels = array(
		'name'                  => _x( 'Employees', 'Post Type General Name', 'pro-photography' ),
		'singular_name'         => _x( 'Employee', 'Post Type Singular Name', 'pro-photography' ),
		'menu_name'             => __( 'Employees', 'pro-photography' ),
		'name_admin_bar'        => __( 'Employee', 'pro-photography' ),
		'archives'              => __( 'Employee', 'pro-photography' ),
		'attributes'            => __( 'Employee Attributes', 'pro-photography' ),
		'parent_item_colon'     => __( 'Parent Employee:', 'pro-photography' ),
		'all_items'             => __( 'All Employees', 'pro-photography' ),
		'add_new_item'          => __( 'Add New Employee', 'pro-photography' ),
		'add_new'               => __( 'Add New', 'pro-photography' ),
		'new_item'              => __( 'New Employee', 'pro-photography' ),
		'edit_item'             => __( 'Edit Employee', 'pro-photography' ),
		'update_item'           => __( 'Update Employee', 'pro-photography' ),
		'view_item'             => __( 'View Employee', 'pro-photography' ),
		'view_items'            => __( 'View Employees', 'pro-photography' ),
		'search_items'          => __( 'Search Employee', 'pro-photography' ),
		'not_found'             => __( 'Not found', 'pro-photography' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'pro-photography' ),
		'featured_image'        => __( 'Headshot', 'pro-photography' ),
		'set_featured_image'    => __( 'Set Headshot', 'pro-photography' ),
		'remove_featured_image' => __( 'Remove Headshot', 'pro-photography' ),
		'use_featured_image'    => __( 'Use as Headshot', 'pro-photography' ),
		'insert_into_item'      => __( 'Insert into Employee', 'pro-photography' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Employee', 'pro-photography' ),
		'items_list'            => __( 'Employees list', 'pro-photography' ),
		'items_list_navigation' => __( 'Employees list navigation', 'pro-photography' ),
		'filter_items_list'     => __( 'Filter Employees list', 'pro-photography' ),
	);
	$rewrite = array(
		'slug'                  => 'employees',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Employee', 'pro-photography' ),
		'description'           => __( 'Directory of employees for the company', 'pro-photography' ),
		'labels'                => $labels,
        'show_in_rest'          => true, // Manually type this in to enable block editor
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'employeeDirectory', $args );

}
add_action( 'init', 'employeeDirectory', 0 );

?>