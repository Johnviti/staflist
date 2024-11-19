<?php

/**
 * Plugin Name: Staff Listing
 */
defined('ABSPATH') or die('Access Denied');

add_action('admin_menu', 'wpt_add_admin_menu');

function wpt_add_admin_menu()
{

    $page_title = 'Staff List';
    $menu_title = 'Staff Listing';
    $capability = 'manage_options';
    $menu_slug  = 'top_slug';
    $function   = 'displayStaffListing';

    add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function);

    add_submenu_page('top_slug', 'Add category', 'Add category', $capability, 'category_slug', 'displayCategory');
    add_submenu_page('top_slug', 'Add Section', 'Add section', $capability, 'section_slug', 'displaySection');
}

add_action( 'admin_enqueue_scripts', 'load_wp_media_files' );
function load_wp_media_files( $page ) {
  if( $page == 'toplevel_page_top_slug' ) {
    // Enqueue WordPress media scripts
    wp_enqueue_media();
    // Enqueue custom script that will interact with wp.media
    wp_enqueue_script( 'top_slug', plugins_url( 'assets/js/media_upload.js' , __FILE__ ), array('jquery'), '0.1' );
  }
}

// Ajax action to refresh the user image
add_action( 'wp_ajax_stafflist_get_image', 'stafflist_get_image');
function stafflist_get_image() {
    if (isset($_GET['id']) ){
        $image = wp_get_attachment_image_src( filter_input( INPUT_GET, 'id', FILTER_VALIDATE_INT ), 'medium' );
        $data = array(
            'image' => $image[0],
        );
        wp_send_json_success( $data );
    } else {
        wp_send_json_error();
    }
}

function displayStaffListing()
{
    include('page_stafflist.php');
}
function displayCategory()
{
    require('page_category.php');
}
function displaySection()
{
    require('page_section.php');
}

function create_plugin_database_table()
{
    global $wpdb;
    $table_prefix = 'wp_';
    $tblname = 'stafflist';
    $wp_track_table = $table_prefix . $tblname;
    $charset_collate = $wpdb->get_charset_collate();
    #Check to see if the table exists already, if not, then create it
    if ($wpdb->get_var("SHOW TABLES LIKE '$wp_track_table'") != $wp_track_table) {

        $sql = "CREATE TABLE " . $wp_track_table . " ( ";
        $sql .= "  staff_id  int(8)   NOT NULL auto_increment, ";
        $sql .= "  category  varchar(100)   NOT NULL, ";
        $sql .= "  name  varchar(100)   NOT NULL, ";
        $sql .= "  address  varchar(200)   , ";
        $sql .= "  phone  varchar(100)   , ";
        $sql .= "  phone2  varchar(100)   , ";
        $sql .= "  fax  varchar(100)   , ";
        $sql .= "  email  varchar(100)   , ";
        $sql .= "  nationality  varchar(100)   , ";
        $sql .= "  languages  varchar(100)   , ";
        $sql .= "  countries_licensed  varchar(100)  , ";
        $sql .= "  instagram_link  varchar(100)   , ";
        $sql .= "  facebook_link  varchar(100)   , ";
        $sql .= "  linkedin_link  varchar(100)   , ";
        $sql .= "  description  text   , ";
        $sql .= "  personType  varchar(100)   , ";
        $sql .= "  section int, ";
        $sql .= "  image varchar(250)   , ";
        $sql .= "  site varchar(250)   , ";
        $sql .= "  PRIMARY KEY staff_id (staff_id) ";
        $sql .= ") $charset_collate ; ";
        require_once(ABSPATH . '/wp-admin/includes/upgrade.php');
        dbDelta($sql);

        $sql = "CREATE TABLE " . $table_prefix . "vitae" . " ( ";
        $sql .= "  vitae_id  int(8)   NOT NULL auto_increment, ";
        $sql .= "  staff_id  int(8)   NOT NULL , ";
        $sql .= "  language  varchar(100)   NOT NULL, ";
        $sql .= "  url  varchar(200)   NOT NULL, ";
        $sql .= "  PRIMARY KEY vitae_id (vitae_id) ";
        $sql .= ") $charset_collate ; ";
        dbDelta($sql);

        $sql = "CREATE TABLE " . $table_prefix . "staffcategory" . " ( ";
        $sql .= "  category_id  int(8)   NOT NULL auto_increment, ";
        $sql .= "  name  varchar(100)   NOT NULL , ";
        $sql .= "  PRIMARY KEY category_id (category_id) ";
        $sql .= ") $charset_collate ; ";
        dbDelta($sql);

        $sql = "CREATE TABLE " . $table_prefix . "staffsection" . " ( ";
        $sql .= "  section_id int(10) UNSIGNED NOT NULL auto_increment, ";
        $sql .= "  name_en  varchar(100) NOT NULL, ";
        $sql .= "  name_pt  varchar(100), ";
        $sql .= "  name_es  varchar(100), ";
        $sql .= "  name_fr  varchar(100), ";
        $sql .= "  PRIMARY KEY section_id (section_id) ";
        $sql .= ") $charset_collate ; ";
        dbDelta($sql);


        $wpdb->insert(
            $table_prefix . "staffcategory",
            array(
                'name' => 'Arbitrators'
            )
        );
        $wpdb->insert(
            $table_prefix . "staffcategory",
            array(
                'name' => 'Mediators'
            )
        );
        $wpdb->insert(
            $table_prefix . "staffcategory",
            array(
                'name' => 'Associates'
            )
        );
    }
}

register_activation_hook(__FILE__, 'create_plugin_database_table');

function get_stafflist($atts)
{
    $arguments = shortcode_atts(array('description' => null, 'category' => null), $atts);

    $default_pagedescription = 'Page Description Here. This is default. You can change it easily with shortcode parameter';
    if ($arguments['description'] != null)
        $default_pagedescription = $arguments['description'];
    $category = $arguments['category'] == null ? '' : $arguments['category'];

    $html = '
            <script type="text/javascript" src="' . plugin_dir_url(__FILE__) . 'lib/jqwidget/scripts/jquery-1.12.4.min.js"></script>
            
            <link rel="stylesheet" href="' . plugin_dir_url(__FILE__) . 'assets/css/font-awesome.min.css">
            
            <link rel="stylesheet" href="' . plugin_dir_url(__FILE__) . 'lib/toastr/toastr.min.css">
            <script src="' . plugin_dir_url(__FILE__) . 'lib/toastr/toastr.min.js"></script>

            <script src="' . plugin_dir_url(__FILE__) . 'assets/js/jquery-ui.min.js"></script>
            <link rel="stylesheet" href="' . plugin_dir_url(__FILE__) . 'assets/css/jquery-ui.css">
            <link rel="stylesheet" href="' . plugin_dir_url(__FILE__) . 'lib/pagination/pagination.css">
            <script src="' . plugin_dir_url(__FILE__) . 'lib/pagination/pagination.js"></script>

            <script src="' . plugin_dir_url(__FILE__) . 'shortcode/shortcode.js?ver=1.8"></script>
            <link rel="stylesheet" type="text/css" media="screen" href="' . plugin_dir_url(__FILE__) . 'shortcode/shortcode.css" />
            <script type="text/javascript">
                var plugin_dir_url = "' . plugin_dir_url(__FILE__) . '";
                var pdf_url = "' . plugin_dir_url(__FILE__) . 'uploads/";
            </script>
            <div id="sl-wrapper">
                <div id="sl-description">
                    ' . str_replace('&quot;','',$default_pagedescription) . '
                </div>
                <div id="sl-sort-part">
                    <div id="sl-sort-alphabet">

                    </div>
                    <div id="sl-sort-search">
                        <input type="text" placeholder="Search by name here..." id="sl-search-text" />
                    </div> '
                    . ( $category == 'Associates' ? '
                    <div id="sl-sort-section">
                        <select id="sl-select-section">
                            <option value="" id="sl-section-text">Department</option>
                        </select>
                    </div>' : '')
                    . '
                </div>
                <div id="sl-pagination-top"></div>
                <div id="sl-stafflist-body" category="' . str_replace('&quot;','',$category) . '">
                
                </div>
                <div id="sl-pagination"></div>
            </div>
            ';
    return $html;
}
function stafflist_register_shortcode()
{
    add_shortcode('stafflist', 'get_stafflist');
}
add_action('init', 'stafflist_register_shortcode');
