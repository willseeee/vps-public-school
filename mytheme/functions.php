<?php
/**
 * mytheme functions and definitions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function mytheme_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // Register Navigation Menus
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'mytheme' ),
    ) );

    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
}
add_action( 'after_setup_theme', 'mytheme_setup' );

/**
 * Enqueue scripts and styles.
 */
function mytheme_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style( 'mytheme-fonts', 'https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Manrope:wght@400;500;600;700;800&family=Outfit:wght@300;400;500;600;700;800&display=swap', array(), null );

    // Enqueue Main Style
    wp_enqueue_style( 'mytheme-style', get_stylesheet_uri(), array(), '1.0.0' );

    // Enqueue Main Script
    wp_enqueue_script( 'mytheme-script', get_template_directory_uri() . '/script.js', array(), '1.0.0', true );

    // Localize Script for AJAX
    wp_localize_script( 'mytheme-script', 'vps_ajax', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'nonce'    => wp_create_nonce( 'vps_enquiry_nonce' )
    ) );
}
add_action( 'wp_enqueue_scripts', 'mytheme_scripts' );

/**
 * Register TC Custom Post Type
 */
function mytheme_register_tc_cpt() {
    $labels = array(
        'name'                  => _x( 'TCs', 'Post Type General Name', 'mytheme' ),
        'singular_name'         => _x( 'TC', 'Post Type Singular Name', 'mytheme' ),
        'menu_name'             => __( 'TCs', 'mytheme' ),
        'name_admin_bar'        => __( 'TC', 'mytheme' ),
        'archives'              => __( 'TC Archives', 'mytheme' ),
        'attributes'            => __( 'TC Attributes', 'mytheme' ),
        'parent_item_colon'     => __( 'Parent TC:', 'mytheme' ),
        'all_items'             => __( 'All TCs', 'mytheme' ),
        'add_new_item'          => __( 'Add New TC', 'mytheme' ),
        'add_new'               => __( 'Add New', 'mytheme' ),
        'new_item'              => __( 'New TC', 'mytheme' ),
        'edit_item'             => __( 'Edit TC', 'mytheme' ),
        'update_item'           => __( 'Update TC', 'mytheme' ),
        'view_item'             => __( 'View TC', 'mytheme' ),
        'view_items'            => __( 'View TCs', 'mytheme' ),
        'search_items'          => __( 'Search TC', 'mytheme' ),
        'not_found'             => __( 'Not found', 'mytheme' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'mytheme' ),
        'featured_image'        => __( 'Featured Image', 'mytheme' ),
        'set_featured_image'    => __( 'Set featured image', 'mytheme' ),
        'remove_featured_image' => __( 'Remove featured image', 'mytheme' ),
        'use_featured_image'    => __( 'Use as featured image', 'mytheme' ),
        'insert_into_item'      => __( 'Insert into TC', 'mytheme' ),
        'uploaded_to_this_item' => __( 'Uploaded to this TC', 'mytheme' ),
        'items_list'            => __( 'TCs list', 'mytheme' ),
        'items_list_navigation' => __( 'TCs list navigation', 'mytheme' ),
        'filter_items_list'     => __( 'Filter TCs list', 'mytheme' ),
    );
    $args = array(
        'label'                 => __( 'TC', 'mytheme' ),
        'description'           => __( 'Transfer Certificates', 'mytheme' ),
        'labels'                => $labels,
        'supports'              => array( 'title' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-media-document',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'tc', $args );
}
add_action( 'init', 'mytheme_register_tc_cpt', 0 );

/**
 * Add Meta Boxes for TC Data
 */
function mytheme_add_tc_metaboxes() {
    add_meta_box(
        'tc_details',
        __( 'TC Details', 'mytheme' ),
        'mytheme_tc_details_callback',
        'tc',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'mytheme_add_tc_metaboxes' );

function mytheme_tc_details_callback( $post ) {
    wp_nonce_field( 'mytheme_tc_details_save', 'mytheme_tc_details_nonce' );

    $admission_no = get_post_meta( $post->ID, '_tc_admission_no', true );
    $pdf_file = get_post_meta( $post->ID, '_tc_pdf_file', true );

    echo '<table class="form-table">';
    echo '<tr><th><label for="tc_admission_no">Admission Number</label></th><td><input type="text" name="tc_admission_no" id="tc_admission_no" value="' . esc_attr( $admission_no ) . '" class="regular-text"></td></tr>';
    echo '<tr><th><label for="tc_pdf_file">TC PDF File</label></th><td>';
    echo '<input type="text" name="tc_pdf_file" id="tc_pdf_file" value="' . esc_attr( $pdf_file ) . '" class="regular-text">';
    echo '<input type="button" class="button tc-upload-button" value="Select/Upload PDF">';
    echo '<p class="description">Select or upload the TC PDF from Media Library.</p></td></tr>';
    echo '</table>';

    // Script for Media Uploader
    ?>
    <script>
    jQuery(document).ready(function($){
        var mediaUploader;
        $('.tc-upload-button').click(function(e) {
            e.preventDefault();
            if (mediaUploader) {
                mediaUploader.open();
                return;
            }
            mediaUploader = wp.media({
                title: 'Select TC PDF',
                button: { text: 'Use this PDF' },
                multiple: false,
                library: { type: 'application/pdf' }
            });
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                $('#tc_pdf_file').val(attachment.url);
            });
            mediaUploader.open();
        });
    });
    </script>
    <?php
}

function mytheme_save_tc_details( $post_id ) {
    if ( ! isset( $_POST['mytheme_tc_details_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['mytheme_tc_details_nonce'], 'mytheme_tc_details_save' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['tc_admission_no'] ) ) update_post_meta( $post_id, '_tc_admission_no', sanitize_text_field( $_POST['tc_admission_no'] ) );
    if ( isset( $_POST['tc_pdf_file'] ) ) update_post_meta( $post_id, '_tc_pdf_file', esc_url_raw( $_POST['tc_pdf_file'] ) );
}
add_action( 'save_post', 'mytheme_save_tc_details' );

/**
 * Enqueue Media Scripts for TC Admin
 */
function mytheme_admin_scripts( $hook ) {
    global $post_type;
    if ( 'tc' === $post_type ) {
        wp_enqueue_media();
    }
}
add_action( 'admin_enqueue_scripts', 'mytheme_admin_scripts' );

/**
 * Add custom body classes for specific templates
 */
function mytheme_body_classes($classes) {
    if (is_page_template('template-registration.php')) {
        $classes[] = 'registration-page';
    }
    if (is_page_template('template-fees-portal.php')) {
        $classes[] = 'fees-portal-page';
    }
    return $classes;
}
add_filter('body_class', 'mytheme_body_classes');

/**
 * Custom Walker to Output Div-based Navigation
 */
class MyTheme_Nav_Walker extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = null ) {
        if ( $depth === 0 ) {
            $output .= '<div class="dropdown">';
        }
    }
    
    function end_lvl( &$output, $depth = 0, $args = null ) {
        if ( $depth === 0 ) {
            $output .= '</div>';
        }
    }
    
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $has_children = in_array( 'menu-item-has-children', $classes );
        
        $class_names = '';
        if ( $depth === 0 ) {
            $class_names = 'nav-item';
            if ( $has_children ) {
                $class_names .= ' nav-item--has-dropdown';
            }
        }
        
        $output .= $depth === 0 ? '<div class="' . esc_attr( $class_names ) . '">' : '';
        
        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
        
        if ( $depth === 0 ) {
            $atts['class'] = 'nav-link';
        }
        
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        
        $title = apply_filters( 'the_title', $item->title, $item->ID );
        
        $item_output = isset( $args->before ) ? $args->before : '';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= ( isset( $args->link_before ) ? $args->link_before : '' ) . $title . ( isset( $args->link_after ) ? $args->link_after : '' );
        if ( $depth === 0 && $has_children ) {
            $item_output .= ' <span class="dropdown-arrow">&#9660;</span>';
        }
        $item_output .= '</a>';
        $item_output .= isset( $args->after ) ? $args->after : '';
        
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
    
    function end_el( &$output, $item, $depth = 0, $args = null ) {
        if ( $depth === 0 ) {
            $output .= '</div>';
        }
    }
}

// Register Banner Custom Post Type
function mytheme_register_banner_cpt() {
    $args = array(
        'labels' => array(
            'name' => 'Banners',
            'singular_name' => 'Banner',
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-images-alt2',
    );
    register_post_type('banner', $args);
}
add_action('init', 'mytheme_register_banner_cpt');

// Add Meta Boxes for Banner
function mytheme_banner_metaboxes() {
    add_meta_box('banner_details', 'Banner Details', 'mytheme_banner_details_callback', 'banner', 'normal', 'high');
}
add_action('add_meta_boxes', 'mytheme_banner_metaboxes');

function mytheme_banner_details_callback($post) {
    wp_nonce_field('mytheme_banner_save', 'mytheme_banner_nonce');
    $description = get_post_meta($post->ID, '_banner_description', true);
    $subtitle = get_post_meta($post->ID, '_banner_subtitle', true);
    $btn1_text = get_post_meta($post->ID, '_banner_btn1_text', true);
    $btn1_link = get_post_meta($post->ID, '_banner_btn1_link', true);
    $btn2_text = get_post_meta($post->ID, '_banner_btn2_text', true);
    $btn2_link = get_post_meta($post->ID, '_banner_btn2_link', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label>Description</label></th><td><textarea name="banner_description" class="regular-text" rows="4" style="width:100%;">' . esc_textarea($description) . '</textarea></td></tr>';
    echo '<tr><th><label>Subtitle</label></th><td><input type="text" name="banner_subtitle" value="' . esc_attr($subtitle) . '" class="regular-text"></td></tr>';
    echo '<tr><th><label>Button 1 Text</label></th><td><input type="text" name="banner_btn1_text" value="' . esc_attr($btn1_text) . '" class="regular-text"></td></tr>';
    echo '<tr><th><label>Button 1 Link</label></th><td><input type="text" name="banner_btn1_link" value="' . esc_attr($btn1_link) . '" class="regular-text"></td></tr>';
    echo '<tr><th><label>Button 2 Text</label></th><td><input type="text" name="banner_btn2_text" value="' . esc_attr($btn2_text) . '" class="regular-text"></td></tr>';
    echo '<tr><th><label>Button 2 Link</label></th><td><input type="text" name="banner_btn2_link" value="' . esc_attr($btn2_link) . '" class="regular-text"></td></tr>';
    echo '</table>';
}

function mytheme_save_banner_details($post_id) {
    if (!isset($_POST['mytheme_banner_nonce']) || !wp_verify_nonce($_POST['mytheme_banner_nonce'], 'mytheme_banner_save')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    
    if (isset($_POST['banner_description'])) update_post_meta($post_id, '_banner_description', sanitize_textarea_field($_POST['banner_description']));
    if (isset($_POST['banner_subtitle'])) update_post_meta($post_id, '_banner_subtitle', sanitize_text_field($_POST['banner_subtitle']));
    if (isset($_POST['banner_btn1_text'])) update_post_meta($post_id, '_banner_btn1_text', sanitize_text_field($_POST['banner_btn1_text']));
    if (isset($_POST['banner_btn1_link'])) update_post_meta($post_id, '_banner_btn1_link', esc_url_raw($_POST['banner_btn1_link']));
    if (isset($_POST['banner_btn2_text'])) update_post_meta($post_id, '_banner_btn2_text', sanitize_text_field($_POST['banner_btn2_text']));
    if (isset($_POST['banner_btn2_link'])) update_post_meta($post_id, '_banner_btn2_link', esc_url_raw($_POST['banner_btn2_link']));
}
add_action('save_post', 'mytheme_save_banner_details');

/**
 * Cleanup duplicate TCs
 */
add_action('admin_init', 'mytheme_cleanup_duplicate_tcs_once');
function mytheme_cleanup_duplicate_tcs_once() {
    if (get_transient('mytheme_tcs_deduplicated_v1')) {
        return;
    }

    $all_tcs = get_posts([
        'post_type' => 'tc',
        'posts_per_page' => -1,
        'post_status' => 'any',
        'orderby' => 'ID',
        'order' => 'ASC' // Keep the oldest ones
    ]);

    $seen = [];
    foreach ($all_tcs as $tc) {
        $admission_no = get_post_meta($tc->ID, '_tc_admission_no', true);
        $title = $tc->post_title;
        
        // Use admission number if exists, otherwise title
        $key = !empty($admission_no) ? $admission_no : $title;
        
        if (isset($seen[$key])) {
            // Duplicate found, delete its attached media first
            $pdf_url = get_post_meta($tc->ID, '_tc_pdf_file', true);
            if ($pdf_url) {
                $attachment_id = attachment_url_to_postid($pdf_url);
                if ($attachment_id) {
                    wp_delete_attachment($attachment_id, true);
                }
            }
            // Delete the duplicate post
            wp_delete_post($tc->ID, true);
        } else {
            $seen[$key] = true;
        }
    }

    set_transient('mytheme_tcs_deduplicated_v1', true, YEAR_IN_SECONDS);
}

/**
 * Register Enquiry Custom Post Type
 */
function mytheme_register_enquiry_cpt() {
    $labels = array(
        'name'                  => _x( 'Enquiries', 'Post Type General Name', 'mytheme' ),
        'singular_name'         => _x( 'Enquiry', 'Post Type Singular Name', 'mytheme' ),
        'menu_name'             => __( 'Enquiries', 'mytheme' ),
        'name_admin_bar'        => __( 'Enquiry', 'mytheme' ),
        'all_items'             => __( 'All Enquiries', 'mytheme' ),
        'add_new_item'          => __( 'Add New Enquiry', 'mytheme' ),
        'add_new'               => __( 'Add New', 'mytheme' ),
        'new_item'              => __( 'New Enquiry', 'mytheme' ),
        'edit_item'             => __( 'Edit Enquiry', 'mytheme' ),
        'update_item'           => __( 'Update Enquiry', 'mytheme' ),
        'view_item'             => __( 'View Enquiry', 'mytheme' ),
        'view_items'            => __( 'View Enquiries', 'mytheme' ),
        'search_items'          => __( 'Search Enquiry', 'mytheme' ),
        'not_found'             => __( 'Not found', 'mytheme' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'mytheme' ),
    );
    $args = array(
        'label'                 => __( 'Enquiry', 'mytheme' ),
        'description'           => __( 'Admission and General Enquiries', 'mytheme' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor' ),
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-email-alt',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'capability_type'       => 'post',
    );
    register_post_type( 'enquiry', $args );
}
add_action( 'init', 'mytheme_register_enquiry_cpt', 0 );

/**
 * Add Meta Boxes for Enquiry Details
 */
function mytheme_add_enquiry_metaboxes() {
    add_meta_box(
        'enquiry_details',
        __( 'Enquiry Details', 'mytheme' ),
        'mytheme_enquiry_details_callback',
        'enquiry',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'mytheme_add_enquiry_metaboxes' );

function mytheme_enquiry_details_callback( $post ) {
    $parent_name = get_post_meta( $post->ID, '_enquiry_parent_name', true );
    $mobile_no = get_post_meta( $post->ID, '_enquiry_mobile_no', true );
    $child_name = get_post_meta( $post->ID, '_enquiry_child_name', true );
    $selected_class = get_post_meta( $post->ID, '_enquiry_selected_class', true );
    $message = $post->post_content;

    echo '<table class="form-table">';
    echo '<tr><th style="width: 150px;"><strong>Parent Name:</strong></th><td>' . esc_html( $parent_name ) . '</td></tr>';
    echo '<tr><th><strong>Mobile Number:</strong></th><td>' . esc_html( $mobile_no ) . '</td></tr>';
    echo '<tr><th><strong>Child Name:</strong></th><td>' . esc_html( $child_name ) . '</td></tr>';
    echo '<tr><th><strong>Selected Class:</strong></th><td>' . esc_html( $selected_class ) . '</td></tr>';
    echo '<tr><th><strong>Message:</strong></th><td>' . nl2br( esc_html( $message ) ) . '</td></tr>';
    echo '</table>';
}

/**
 * Customize Enquiry Columns
 */
function mytheme_set_enquiry_columns($columns) {
    $new_columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => __( 'Title', 'mytheme' ),
        'parent_name' => __( 'Parent Name', 'mytheme' ),
        'mobile_no' => __( 'Mobile No.', 'mytheme' ),
        'child_name' => __( 'Child Name', 'mytheme' ),
        'selected_class' => __( 'Class', 'mytheme' ),
        'date' => __( 'Date', 'mytheme' )
    );
    return $new_columns;
}
add_filter( 'manage_enquiry_posts_columns', 'mytheme_set_enquiry_columns' );

function mytheme_custom_enquiry_column( $column, $post_id ) {
    switch ( $column ) {
        case 'parent_name' :
            echo esc_html( get_post_meta( $post_id, '_enquiry_parent_name', true ) );
            break;
        case 'mobile_no' :
            echo esc_html( get_post_meta( $post_id, '_enquiry_mobile_no', true ) );
            break;
        case 'child_name' :
            echo esc_html( get_post_meta( $post_id, '_enquiry_child_name', true ) );
            break;
        case 'selected_class' :
            echo esc_html( get_post_meta( $post_id, '_enquiry_selected_class', true ) );
            break;
    }
}
add_action( 'manage_enquiry_posts_custom_column' , 'mytheme_custom_enquiry_column', 10, 2 );

/**
 * Handle Enquiry Form AJAX Submission
 */
function mytheme_handle_enquiry_submission() {
    // Verify nonce
    if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'vps_enquiry_nonce' ) ) {
        wp_send_json_error( array( 'message' => __( 'Security check failed. Please refresh the page and try again.', 'mytheme' ) ) );
    }

    // Retrieve and sanitize fields
    $your_name      = isset( $_POST['your_name'] ) ? sanitize_text_field( $_POST['your_name'] ) : '';
    $mobile_no      = isset( $_POST['mobile_no'] ) ? sanitize_text_field( $_POST['mobile_no'] ) : '';
    $child_name     = isset( $_POST['child_name'] ) ? sanitize_text_field( $_POST['child_name'] ) : '';
    $selected_class = isset( $_POST['selected_class'] ) ? sanitize_text_field( $_POST['selected_class'] ) : '';
    $message        = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : '';

    // Validate required fields
    if ( empty( $your_name ) || empty( $mobile_no ) || empty( $child_name ) || empty( $selected_class ) ) {
        wp_send_json_error( array( 'message' => __( 'Please fill in all required fields.', 'mytheme' ) ) );
    }

    // Create a new enquiry CPT post
    $enquiry_post = array(
        'post_title'   => sprintf( 'Enquiry from %s (%s)', $your_name, $selected_class ),
        'post_content' => $message,
        'post_status'  => 'publish',
        'post_type'    => 'enquiry'
    );

    $post_id = wp_insert_post( $enquiry_post );

    if ( is_wp_error( $post_id ) ) {
        wp_send_json_error( array( 'message' => __( 'Failed to save enquiry. Please try again.', 'mytheme' ) ) );
    }

    // Save metadata
    update_post_meta( $post_id, '_enquiry_parent_name', $your_name );
    update_post_meta( $post_id, '_enquiry_mobile_no', $mobile_no );
    update_post_meta( $post_id, '_enquiry_child_name', $child_name );
    update_post_meta( $post_id, '_enquiry_selected_class', $selected_class );

    // Optional: Send email to Admin
    $admin_email = get_option( 'admin_email' );
    $subject = sprintf( '[VPS School] New Admission Enquiry from %s', $your_name );
    $email_body = sprintf(
        "Hello Admin,\n\nYou have received a new admission enquiry from the school website.\n\n" .
        "Parent Name: %s\n" .
        "Mobile Number: %s\n" .
        "Child Name: %s\n" .
        "Class: %s\n" .
        "Message: %s\n\n" .
        "View in WP Dashboard: %s\n",
        $your_name,
        $mobile_no,
        $child_name,
        $selected_class,
        $message,
        admin_url( 'post.php?post=' . $post_id . '&action=edit' )
    );

    @wp_mail( $admin_email, $subject, $email_body );

    wp_send_json_success( array( 'message' => __( 'Thank you! Your enquiry has been sent successfully.', 'mytheme' ) ) );
}
add_action( 'wp_ajax_submit_enquiry', 'mytheme_handle_enquiry_submission' );
add_action( 'wp_ajax_nopriv_submit_enquiry', 'mytheme_handle_enquiry_submission' );

/**
 * Register Custom Post Type for Online Registrations
 */
function mytheme_register_registration_cpt() {
    $labels = array(
        'name'               => _x( 'Registrations', 'post type general name', 'mytheme' ),
        'singular_name'      => _x( 'Registration', 'post type singular name', 'mytheme' ),
        'menu_name'          => _x( 'Registrations', 'admin menu', 'mytheme' ),
        'name_admin_bar'     => _x( 'Registration', 'add new on admin bar', 'mytheme' ),
        'add_new'            => _x( 'Add New', 'registration', 'mytheme' ),
        'add_new_item'       => __( 'Add New Registration', 'mytheme' ),
        'new_item'           => __( 'New Registration', 'mytheme' ),
        'edit_item'          => __( 'Edit Registration', 'mytheme' ),
        'view_item'          => __( 'View Registration', 'mytheme' ),
        'all_items'          => __( 'All Registrations', 'mytheme' ),
        'search_items'       => __( 'Search Registrations', 'mytheme' ),
        'parent_item_colon'  => __( 'Parent Registrations:', 'mytheme' ),
        'not_found'          => __( 'No registrations found.', 'mytheme' ),
        'not_found_in_trash' => __( 'No registrations found in Trash.', 'mytheme' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'registration' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-id-alt',
        'supports'           => array( 'title' )
    );

    register_post_type( 'registration', $args );
}
add_action( 'init', 'mytheme_register_registration_cpt' );

/**
 * Register Registration Meta Box
 */
function mytheme_add_registration_metabox() {
    add_meta_box(
        'registration_details',
        __( 'Registration Details', 'mytheme' ),
        'mytheme_registration_details_callback',
        'registration',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'mytheme_add_registration_metabox' );

function mytheme_registration_details_callback( $post ) {
    $meta = get_post_custom( $post->ID );
    
    // Helper to output rows
    $fields = array(
        'Registration No.' => '_reg_number',
        'Academic Year' => '_reg_academic_year',
        'Selected Class' => '_reg_selected_class',
        'Sibling in VPS?' => '_reg_sibling_status',
        'Student First Name' => '_reg_first_name',
        'Student Middle Name' => '_reg_middle_name',
        'Student Last Name' => '_reg_last_name',
        'Date of Birth' => '_reg_dob',
        'Aadhaar No.' => '_reg_aadhaar_no',
        'Gender' => '_reg_gender',
        'Primary Mobile' => '_reg_primary_mobile',
        'Email Id' => '_reg_email',
        'Category' => '_reg_category',
        'Religion' => '_reg_religion',
        'Blood Group' => '_reg_blood_group',
        'Nationality' => '_reg_nationality',
        'Birth Place' => '_reg_birth_place',
        'Mother Tongue' => '_reg_mother_tongue',
        'Previous School' => '_reg_previous_school',
        
        // Father details
        'Father First Name' => '_reg_father_first_name',
        'Father Middle Name' => '_reg_father_middle_name',
        'Father Last Name' => '_reg_father_last_name',
        'Father Mobile' => '_reg_father_mobile',
        'Father Email' => '_reg_father_email',
        'Father Qualification' => '_reg_father_qualification',
        'Father Occupation' => '_reg_father_occupation',
        'Father Designation' => '_reg_father_designation',
        'Father Org Name' => '_reg_father_org_name',
        'Father Org Address' => '_reg_father_org_address',
        'Father Annual Income' => '_reg_father_annual_income',
        
        // Mother details
        'Mother First Name' => '_reg_mother_first_name',
        'Mother Middle Name' => '_reg_mother_middle_name',
        'Mother Last Name' => '_reg_mother_last_name',
        'Mother Mobile' => '_reg_mother_mobile',
        'Mother Email' => '_reg_mother_email',
        'Mother Qualification' => '_reg_mother_qualification',
        'Mother Occupation' => '_reg_mother_occupation',
        'Mother Designation' => '_reg_mother_designation',
        'Mother Org Name' => '_reg_mother_org_name',
        'Mother Org Address' => '_reg_mother_org_address',
        'Mother Annual Income' => '_reg_mother_annual_income',
        
        // Guardian details
        'Guardian First Name' => '_reg_guardian_first_name',
        'Guardian Middle Name' => '_reg_guardian_middle_name',
        'Guardian Last Name' => '_reg_guardian_last_name',
        'Guardian Relation' => '_reg_guardian_relation',
        'Guardian Mobile' => '_reg_guardian_mobile',
        'Guardian Email' => '_reg_guardian_email',
        
        // Addresses
        'Corresponding Address' => '_reg_corresponding_address',
        'Corresponding Country' => '_reg_corresponding_country',
        'Corresponding State' => '_reg_corresponding_state',
        'Corresponding City' => '_reg_corresponding_city',
        'Corresponding Pin Code' => '_reg_corresponding_pin_code',
        'Permanent Address' => '_reg_permanent_address',
        'Permanent Country' => '_reg_permanent_country',
        'Permanent State' => '_reg_permanent_state',
        'Permanent City' => '_reg_permanent_city',
        'Permanent Pin Code' => '_reg_permanent_pin_code',
    );

    echo '<table class="form-table" style="width: 100%; border-collapse: collapse;">';
    foreach ( $fields as $label => $meta_key ) {
        $val = isset( $meta[$meta_key] ) ? esc_html( $meta[$meta_key][0] ) : '';
        echo '<tr style="border-bottom: 1px solid #eee;">';
        echo '<th style="padding: 10px; text-align: left; width: 30%; font-weight: bold;">' . esc_html( $label ) . '</th>';
        echo '<td style="padding: 10px;">' . ( $val ? $val : '—' ) . '</td>';
        echo '</tr>';
    }

    // Output files section
    $files = array(
        'Student Photo' => '_reg_file_student_photo',
        'Birth Certificate' => '_reg_file_birth_certificate',
        'Father Photo' => '_reg_file_father_photo',
        'Mother Photo' => '_reg_file_mother_photo',
        'Guardian Photo' => '_reg_file_guardian_photo',
    );

    echo '<tr><th colspan="2" style="padding: 15px 10px; text-align: left; background: #f9f9f9; font-weight: bold; border-bottom: 2px solid #ddd;">Uploaded Documents</th></tr>';

    foreach ( $files as $label => $meta_key ) {
        $file_url = isset( $meta[$meta_key] ) ? esc_url( $meta[$meta_key][0] ) : '';
        echo '<tr style="border-bottom: 1px solid #eee;">';
        echo '<th style="padding: 10px; text-align: left; font-weight: bold;">' . esc_html( $label ) . '</th>';
        echo '<td style="padding: 10px;">';
        if ( $file_url ) {
            $ext = pathinfo( $file_url, PATHINFO_EXTENSION );
            if ( in_array( strtolower($ext), array( 'jpg', 'jpeg', 'png', 'gif' ) ) ) {
                echo '<a href="' . $file_url . '" target="_blank"><img src="' . $file_url . '" style="max-width: 150px; height: auto; border: 1px solid #ddd; padding: 4px; border-radius: 4px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);" /></a><br/>';
            }
            echo '<a class="button button-small" style="margin-top: 5px;" href="' . $file_url . '" target="_blank">' . __( 'View / Download Original', 'mytheme' ) . '</a>';
        } else {
            echo '<span style="color: #999; font-style: italic;">' . __( 'Not Uploaded', 'mytheme' ) . '</span>';
        }
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
}

/**
 * Customize Registration Columns in WP Admin
 */
function mytheme_set_registration_columns($columns) {
    $new_columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => __( 'Title', 'mytheme' ),
        'reg_number' => __( 'Reg No.', 'mytheme' ),
        'student_name' => __( 'Student Name', 'mytheme' ),
        'selected_class' => __( 'Class', 'mytheme' ),
        'contact' => __( 'Contact No.', 'mytheme' ),
        'sibling' => __( 'Sibling?', 'mytheme' ),
        'date' => __( 'Date', 'mytheme' )
    );
    return $new_columns;
}
add_filter( 'manage_registration_posts_columns', 'mytheme_set_registration_columns' );

function mytheme_custom_registration_column( $column, $post_id ) {
    switch ( $column ) {
        case 'reg_number' :
            echo '<strong>' . esc_html( get_post_meta( $post_id, '_reg_number', true ) ) . '</strong>';
            break;
        case 'student_name' :
            $first = get_post_meta( $post_id, '_reg_first_name', true );
            $last = get_post_meta( $post_id, '_reg_last_name', true );
            echo esc_html( trim( $first . ' ' . $last ) );
            break;
        case 'selected_class' :
            echo esc_html( strtoupper( get_post_meta( $post_id, '_reg_selected_class', true ) ) );
            break;
        case 'contact' :
            echo esc_html( get_post_meta( $post_id, '_reg_primary_mobile', true ) );
            break;
        case 'sibling' :
            $sib = get_post_meta( $post_id, '_reg_sibling_status', true );
            echo $sib === 'yes' ? '<span style="color: #27ae60; font-weight: bold;">Yes</span>' : 'No';
            break;
    }
}
add_action( 'manage_registration_posts_custom_column' , 'mytheme_custom_registration_column', 10, 2 );

/**
 * Handle Online Registration Form AJAX Submission (with File Uploads)
 */
function mytheme_handle_registration_submission() {
    // Verify nonce
    if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'vps_enquiry_nonce' ) ) {
        wp_send_json_error( array( 'message' => __( 'Security verification failed. Please refresh the page and try again.', 'mytheme' ) ) );
    }

    // Retrieve standard student details
    $academic_year  = isset( $_POST['academic_year'] ) ? sanitize_text_field( $_POST['academic_year'] ) : '2026-27';
    $selected_class = isset( $_POST['selected_class'] ) ? sanitize_text_field( $_POST['selected_class'] ) : '';
    $first_name     = isset( $_POST['first_name'] ) ? sanitize_text_field( $_POST['first_name'] ) : '';
    $middle_name    = isset( $_POST['middle_name'] ) ? sanitize_text_field( $_POST['middle_name'] ) : '';
    $last_name      = isset( $_POST['last_name'] ) ? sanitize_text_field( $_POST['last_name'] ) : '';
    $dob            = isset( $_POST['dob'] ) ? sanitize_text_field( $_POST['dob'] ) : '';
    $aadhaar_no     = isset( $_POST['aadhaar_no'] ) ? sanitize_text_field( $_POST['aadhaar_no'] ) : '';
    $gender         = isset( $_POST['gender'] ) ? sanitize_text_field( $_POST['gender'] ) : '';
    $primary_mobile = isset( $_POST['primary_mobile'] ) ? sanitize_text_field( $_POST['primary_mobile'] ) : '';
    $email          = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
    $category       = isset( $_POST['category'] ) ? sanitize_text_field( $_POST['category'] ) : '';
    $religion       = isset( $_POST['religion'] ) ? sanitize_text_field( $_POST['religion'] ) : '';
    $blood_group    = isset( $_POST['blood_group'] ) ? sanitize_text_field( $_POST['blood_group'] ) : '';
    $nationality    = isset( $_POST['nationality'] ) ? sanitize_text_field( $_POST['nationality'] ) : 'Indian';
    $birth_place    = isset( $_POST['birth_place'] ) ? sanitize_text_field( $_POST['birth_place'] ) : '';
    $mother_tongue  = isset( $_POST['mother_tongue'] ) ? sanitize_text_field( $_POST['mother_tongue'] ) : '';
    $previous_school= isset( $_POST['previous_school'] ) ? sanitize_text_field( $_POST['previous_school'] ) : '';
    $sibling_status = ( isset( $_POST['sibling_status'] ) && $_POST['sibling_status'] === 'on' ) ? 'yes' : 'no';

    // Father Details
    $father_first_name    = isset( $_POST['father_first_name'] ) ? sanitize_text_field( $_POST['father_first_name'] ) : '';
    $father_middle_name   = isset( $_POST['father_middle_name'] ) ? sanitize_text_field( $_POST['father_middle_name'] ) : '';
    $father_last_name     = isset( $_POST['father_last_name'] ) ? sanitize_text_field( $_POST['father_last_name'] ) : '';
    $father_mobile        = isset( $_POST['father_mobile'] ) ? sanitize_text_field( $_POST['father_mobile'] ) : '';
    $father_email         = isset( $_POST['father_email'] ) ? sanitize_email( $_POST['father_email'] ) : '';
    $father_qualification = isset( $_POST['father_qualification'] ) ? sanitize_text_field( $_POST['father_qualification'] ) : '';
    $father_occupation    = isset( $_POST['father_occupation'] ) ? sanitize_text_field( $_POST['father_occupation'] ) : '';
    $father_designation   = isset( $_POST['father_designation'] ) ? sanitize_text_field( $_POST['father_designation'] ) : '';
    $father_org_name      = isset( $_POST['father_org_name'] ) ? sanitize_text_field( $_POST['father_org_name'] ) : '';
    $father_org_address   = isset( $_POST['father_org_address'] ) ? sanitize_text_field( $_POST['father_org_address'] ) : '';
    $father_annual_income = isset( $_POST['father_annual_income'] ) ? sanitize_text_field( $_POST['father_annual_income'] ) : '';

    // Mother Details
    $mother_first_name    = isset( $_POST['mother_first_name'] ) ? sanitize_text_field( $_POST['mother_first_name'] ) : '';
    $mother_middle_name   = isset( $_POST['mother_middle_name'] ) ? sanitize_text_field( $_POST['mother_middle_name'] ) : '';
    $mother_last_name     = isset( $_POST['mother_last_name'] ) ? sanitize_text_field( $_POST['mother_last_name'] ) : '';
    $mother_mobile        = isset( $_POST['mother_mobile'] ) ? sanitize_text_field( $_POST['mother_mobile'] ) : '';
    $mother_email         = isset( $_POST['mother_email'] ) ? sanitize_email( $_POST['mother_email'] ) : '';
    $mother_qualification = isset( $_POST['mother_qualification'] ) ? sanitize_text_field( $_POST['mother_qualification'] ) : '';
    $mother_occupation    = isset( $_POST['mother_occupation'] ) ? sanitize_text_field( $_POST['mother_occupation'] ) : '';
    $mother_designation   = isset( $_POST['mother_designation'] ) ? sanitize_text_field( $_POST['mother_designation'] ) : '';
    $mother_org_name      = isset( $_POST['mother_org_name'] ) ? sanitize_text_field( $_POST['mother_org_name'] ) : '';
    $mother_org_address   = isset( $_POST['mother_org_address'] ) ? sanitize_text_field( $_POST['mother_org_address'] ) : '';
    $mother_annual_income = isset( $_POST['mother_annual_income'] ) ? sanitize_text_field( $_POST['mother_annual_income'] ) : '';

    // Guardian Details
    $guardian_first_name    = isset( $_POST['guardian_first_name'] ) ? sanitize_text_field( $_POST['guardian_first_name'] ) : '';
    $guardian_middle_name   = isset( $_POST['guardian_middle_name'] ) ? sanitize_text_field( $_POST['guardian_middle_name'] ) : '';
    $guardian_last_name     = isset( $_POST['guardian_last_name'] ) ? sanitize_text_field( $_POST['guardian_last_name'] ) : '';
    $guardian_relation      = isset( $_POST['guardian_relation'] ) ? sanitize_text_field( $_POST['guardian_relation'] ) : '';
    $guardian_mobile        = isset( $_POST['guardian_mobile'] ) ? sanitize_text_field( $_POST['guardian_mobile'] ) : '';
    $guardian_email         = isset( $_POST['guardian_email'] ) ? sanitize_email( $_POST['guardian_email'] ) : '';

    // Addresses
    $address_corresponding  = isset( $_POST['address_corresponding'] ) ? sanitize_text_field( $_POST['address_corresponding'] ) : '';
    $country_corresponding  = isset( $_POST['country_corresponding'] ) ? sanitize_text_field( $_POST['country_corresponding'] ) : '';
    $state_corresponding    = isset( $_POST['state_corresponding'] ) ? sanitize_text_field( $_POST['state_corresponding'] ) : '';
    $city_corresponding     = isset( $_POST['city_corresponding'] ) ? sanitize_text_field( $_POST['city_corresponding'] ) : '';
    $pin_corresponding      = isset( $_POST['pin_corresponding'] ) ? sanitize_text_field( $_POST['pin_corresponding'] ) : '';

    $address_permanent      = isset( $_POST['address_permanent'] ) ? sanitize_text_field( $_POST['address_permanent'] ) : '';
    $country_permanent      = isset( $_POST['country_permanent'] ) ? sanitize_text_field( $_POST['country_permanent'] ) : '';
    $state_permanent        = isset( $_POST['state_permanent'] ) ? sanitize_text_field( $_POST['state_permanent'] ) : '';
    $city_permanent         = isset( $_POST['city_permanent'] ) ? sanitize_text_field( $_POST['city_permanent'] ) : '';
    $pin_permanent          = isset( $_POST['pin_permanent'] ) ? sanitize_text_field( $_POST['pin_permanent'] ) : '';

    // Validate compulsory fields
    if ( empty( $first_name ) || empty( $last_name ) || empty( $selected_class ) || empty( $dob ) || empty( $email ) || empty( $address_corresponding ) ) {
        wp_send_json_error( array( 'message' => __( 'Please fill in all mandatory fields.', 'mytheme' ) ) );
    }

    // Generate unique Registration Number: REG-YEAR-RANDOM(4)
    $year = date( 'Y' );
    $rand = str_pad( rand( 1000, 9999 ), 4, '0', STR_PAD_LEFT );
    $reg_number = "REG-{$year}-{$rand}";

    // Insert Registration CPT Post
    $registration_post = array(
        'post_title'   => sprintf( '%s - %s %s (%s)', $reg_number, $first_name, $last_name, strtoupper( $selected_class ) ),
        'post_status'  => 'publish',
        'post_type'    => 'registration'
    );

    $post_id = wp_insert_post( $registration_post );

    if ( is_wp_error( $post_id ) ) {
        wp_send_json_error( array( 'message' => __( 'Failed to submit registration. Please try again.', 'mytheme' ) ) );
    }

    // Save Text Meta Details
    update_post_meta( $post_id, '_reg_number', $reg_number );
    update_post_meta( $post_id, '_reg_academic_year', $academic_year );
    update_post_meta( $post_id, '_reg_selected_class', $selected_class );
    update_post_meta( $post_id, '_reg_sibling_status', $sibling_status );
    update_post_meta( $post_id, '_reg_first_name', $first_name );
    update_post_meta( $post_id, '_reg_middle_name', $middle_name );
    update_post_meta( $post_id, '_reg_last_name', $last_name );
    update_post_meta( $post_id, '_reg_dob', $dob );
    update_post_meta( $post_id, '_reg_aadhaar_no', $aadhaar_no );
    update_post_meta( $post_id, '_reg_gender', $gender );
    update_post_meta( $post_id, '_reg_primary_mobile', $primary_mobile );
    update_post_meta( $post_id, '_reg_email', $email );
    update_post_meta( $post_id, '_reg_category', $category );
    update_post_meta( $post_id, '_reg_religion', $religion );
    update_post_meta( $post_id, '_reg_blood_group', $blood_group );
    update_post_meta( $post_id, '_reg_nationality', $nationality );
    update_post_meta( $post_id, '_reg_birth_place', $birth_place );
    update_post_meta( $post_id, '_reg_mother_tongue', $mother_tongue );
    update_post_meta( $post_id, '_reg_previous_school', $previous_school );

    // Save Father Details
    update_post_meta( $post_id, '_reg_father_first_name', $father_first_name );
    update_post_meta( $post_id, '_reg_father_middle_name', $father_middle_name );
    update_post_meta( $post_id, '_reg_father_last_name', $father_last_name );
    update_post_meta( $post_id, '_reg_father_mobile', $father_mobile );
    update_post_meta( $post_id, '_reg_father_email', $father_email );
    update_post_meta( $post_id, '_reg_father_qualification', $father_qualification );
    update_post_meta( $post_id, '_reg_father_occupation', $father_occupation );
    update_post_meta( $post_id, '_reg_father_designation', $father_designation );
    update_post_meta( $post_id, '_reg_father_org_name', $father_org_name );
    update_post_meta( $post_id, '_reg_father_org_address', $father_org_address );
    update_post_meta( $post_id, '_reg_father_annual_income', $father_annual_income );

    // Save Mother Details
    update_post_meta( $post_id, '_reg_mother_first_name', $mother_first_name );
    update_post_meta( $post_id, '_reg_mother_middle_name', $mother_middle_name );
    update_post_meta( $post_id, '_reg_mother_last_name', $mother_last_name );
    update_post_meta( $post_id, '_reg_mother_mobile', $mother_mobile );
    update_post_meta( $post_id, '_reg_mother_email', $mother_email );
    update_post_meta( $post_id, '_reg_mother_qualification', $mother_qualification );
    update_post_meta( $post_id, '_reg_mother_occupation', $mother_occupation );
    update_post_meta( $post_id, '_reg_mother_designation', $mother_designation );
    update_post_meta( $post_id, '_reg_mother_org_name', $mother_org_name );
    update_post_meta( $post_id, '_reg_mother_org_address', $mother_org_address );
    update_post_meta( $post_id, '_reg_mother_annual_income', $mother_annual_income );

    // Save Guardian Details
    update_post_meta( $post_id, '_reg_guardian_first_name', $guardian_first_name );
    update_post_meta( $post_id, '_reg_guardian_middle_name', $guardian_middle_name );
    update_post_meta( $post_id, '_reg_guardian_last_name', $guardian_last_name );
    update_post_meta( $post_id, '_reg_guardian_relation', $guardian_relation );
    update_post_meta( $post_id, '_reg_guardian_mobile', $guardian_mobile );
    update_post_meta( $post_id, '_reg_guardian_email', $guardian_email );

    // Save Addresses
    update_post_meta( $post_id, '_reg_corresponding_address', $address_corresponding );
    update_post_meta( $post_id, '_reg_corresponding_country', $country_corresponding );
    update_post_meta( $post_id, '_reg_corresponding_state', $state_corresponding );
    update_post_meta( $post_id, '_reg_corresponding_city', $city_corresponding );
    update_post_meta( $post_id, '_reg_corresponding_pin_code', $pin_corresponding );

    update_post_meta( $post_id, '_reg_permanent_address', $address_permanent );
    update_post_meta( $post_id, '_reg_permanent_country', $country_permanent );
    update_post_meta( $post_id, '_reg_permanent_state', $state_permanent );
    update_post_meta( $post_id, '_reg_permanent_city', $city_permanent );
    update_post_meta( $post_id, '_reg_permanent_pin_code', $pin_permanent );

    // Handle File Uploads
    if ( ! function_exists( 'wp_handle_upload' ) ) {
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
    }

    $upload_fields = array(
        'student_photo'            => '_reg_file_student_photo',
        'student_birth_certificate' => '_reg_file_birth_certificate',
        'father_photo'             => '_reg_file_father_photo',
        'mother_photo'             => '_reg_file_mother_photo',
        'guardian_photo'           => '_reg_file_guardian_photo'
    );

    $overrides = array( 'test_form' => false );

    foreach ( $upload_fields as $file_input_name => $meta_key ) {
        if ( isset( $_FILES[$file_input_name] ) && ! empty( $_FILES[$file_input_name]['name'] ) ) {
            $file = $_FILES[$file_input_name];

            // Verify file size (< 1MB)
            if ( $file['size'] > 1048576 ) {
                wp_send_json_error( array( 'message' => sprintf( __( 'File %s exceeds the 1 MB file size limit.', 'mytheme' ), $file['name'] ) ) );
            }

            // Verify file extension/type (images and PDFs)
            $allowed_types = array( 'image/jpeg', 'image/jpg', 'image/png', 'application/pdf' );
            if ( ! in_array( $file['type'], $allowed_types ) ) {
                wp_send_json_error( array( 'message' => sprintf( __( 'File %s is not an allowed type (Only JPG, JPEG, PNG, or PDF files are accepted).', 'mytheme' ), $file['name'] ) ) );
            }

            // Handle the secure upload
            $movefile = wp_handle_upload( $file, $overrides );

            if ( $movefile && ! isset( $movefile['error'] ) ) {
                // Save URL in post meta
                update_post_meta( $post_id, $meta_key, $movefile['url'] );
            } else {
                wp_send_json_error( array( 'message' => sprintf( __( 'Error uploading file %s: %s', 'mytheme' ), $file['name'], $movefile['error'] ) ) );
            }
        }
    }

    // Optional: Send email notification to Admin
    $admin_email = get_option( 'admin_email' );
    $subject = sprintf( '[VPS School] New Online Registration: %s', $reg_number );
    $email_body = sprintf(
        "Hello Admin,\n\nA new Online Registration has been successfully received.\n\n" .
        "Registration Number: %s\n" .
        "Student Name: %s %s\n" .
        "Class: %s\n" .
        "DOB: %s\n" .
        "Primary Mobile: %s\n" .
        "Email Id: %s\n\n" .
        "View full registration details in the WP Admin Dashboard:\n%s\n",
        $reg_number,
        $first_name,
        $last_name,
        strtoupper( $selected_class ),
        $dob,
        $primary_mobile,
        $email,
        admin_url( 'post.php?post=' . $post_id . '&action=edit' )
    );

    @wp_mail( $admin_email, $subject, $email_body );

    // Return the generated registration number and success state
    wp_send_json_success( array(
        'message' => __( 'Your registration has been submitted successfully!', 'mytheme' ),
        'reg_number' => $reg_number
    ) );
}
add_action( 'wp_ajax_submit_registration', 'mytheme_handle_registration_submission' );
add_action( 'wp_ajax_nopriv_submit_registration', 'mytheme_handle_registration_submission' );

/**
 * Register Contact Messages Custom Post Type
 */
function mytheme_register_contact_cpt() {
    $labels = array(
        'name'                  => _x( 'Contact Messages', 'Post Type General Name', 'mytheme' ),
        'singular_name'         => _x( 'Contact Message', 'Post Type Singular Name', 'mytheme' ),
        'menu_name'             => __( 'Contact Messages', 'mytheme' ),
        'name_admin_bar'        => __( 'Contact Message', 'mytheme' ),
        'all_items'             => __( 'All Messages', 'mytheme' ),
        'add_new_item'          => __( 'Add New Message', 'mytheme' ),
        'add_new'               => __( 'Add New', 'mytheme' ),
        'new_item'              => __( 'New Message', 'mytheme' ),
        'edit_item'             => __( 'Edit Message', 'mytheme' ),
        'update_item'           => __( 'Update Message', 'mytheme' ),
        'view_item'             => __( 'View Message', 'mytheme' ),
        'view_items'            => __( 'View Messages', 'mytheme' ),
        'search_items'          => __( 'Search Message', 'mytheme' ),
        'not_found'             => __( 'No messages found', 'mytheme' ),
        'not_found_in_trash'    => __( 'No messages found in Trash', 'mytheme' ),
    );
    $args = array(
        'label'                 => __( 'Contact Message', 'mytheme' ),
        'description'           => __( 'Messages received through the Contact Get in Touch form', 'mytheme' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor' ),
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 8,
        'menu_icon'             => 'dashicons-feedback',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'capability_type'       => 'post',
    );
    register_post_type( 'contact_message', $args );
}
add_action( 'init', 'mytheme_register_contact_cpt', 0 );

/**
 * Add Meta Box for Contact Message details
 */
function mytheme_add_contact_metaboxes() {
    add_meta_box(
        'contact_details',
        __( 'Message Details', 'mytheme' ),
        'mytheme_contact_details_callback',
        'contact_message',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'mytheme_add_contact_metaboxes' );

function mytheme_contact_details_callback( $post ) {
    $full_name = get_post_meta( $post->ID, '_contact_full_name', true );
    $email = get_post_meta( $post->ID, '_contact_email', true );
    $message = $post->post_content;

    echo '<table class="form-table">';
    echo '<tr><th style="width: 150px;"><strong>Sender Name:</strong></th><td>' . esc_html( $full_name ) . '</td></tr>';
    echo '<tr><th><strong>Sender Email:</strong></th><td>' . esc_html( $email ) . '</td></tr>';
    echo '<tr><th><strong>Message:</strong></th><td>' . nl2br( esc_html( $message ) ) . '</td></tr>';
    echo '</table>';
}

/**
 * Customize Contact Columns
 */
function mytheme_set_contact_columns($columns) {
    $new_columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => __( 'Subject', 'mytheme' ),
        'sender_name' => __( 'Sender Name', 'mytheme' ),
        'sender_email' => __( 'Sender Email', 'mytheme' ),
        'date' => __( 'Date', 'mytheme' )
    );
    return $new_columns;
}
add_filter( 'manage_contact_message_posts_columns', 'mytheme_set_contact_columns' );

function mytheme_custom_contact_column( $column, $post_id ) {
    switch ( $column ) {
        case 'sender_name' :
            echo esc_html( get_post_meta( $post_id, '_contact_full_name', true ) );
            break;
        case 'sender_email' :
            echo esc_html( get_post_meta( $post_id, '_contact_email', true ) );
            break;
    }
}
add_action( 'manage_contact_message_posts_custom_column' , 'mytheme_custom_contact_column', 10, 2 );

/**
 * Handle Contact AJAX Form Submission
 */
function mytheme_handle_contact_submission() {
    // Verify nonce
    if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'vps_enquiry_nonce' ) ) {
        wp_send_json_error( array( 'message' => __( 'Security verification failed. Please refresh the page and try again.', 'mytheme' ) ) );
    }

    // Retrieve and sanitize fields
    $full_name = isset( $_POST['full_name'] ) ? sanitize_text_field( $_POST['full_name'] ) : '';
    $email     = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
    $message   = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : '';

    // Validate required fields
    if ( empty( $full_name ) || empty( $email ) || empty( $message ) ) {
        wp_send_json_error( array( 'message' => __( 'Please fill in all fields.', 'mytheme' ) ) );
    }

    if ( ! is_email( $email ) ) {
        wp_send_json_error( array( 'message' => __( 'Please enter a valid email address.', 'mytheme' ) ) );
    }

    // Create a new contact post
    $contact_post = array(
        'post_title'   => sprintf( 'Message from %s', $full_name ),
        'post_content' => $message,
        'post_status'  => 'publish',
        'post_type'    => 'contact_message'
    );

    $post_id = wp_insert_post( $contact_post );

    if ( is_wp_error( $post_id ) ) {
        wp_send_json_error( array( 'message' => __( 'Failed to send message. Please try again.', 'mytheme' ) ) );
    }

    // Save metadata
    update_post_meta( $post_id, '_contact_full_name', $full_name );
    update_post_meta( $post_id, '_contact_email', $email );

    // Optional: Send email notification to Admin
    $admin_email = get_option( 'admin_email' );
    $subject = sprintf( '[VPS School] New Contact Message from %s', $full_name );
    $email_body = sprintf(
        "Hello Admin,\n\nYou have received a new message through the school contact form.\n\n" .
        "Sender Name: %s\n" .
        "Sender Email: %s\n" .
        "Message: %s\n\n" .
        "View message in WordPress Dashboard:\n%s\n",
        $full_name,
        $email,
        $message,
        admin_url( 'post.php?post=' . $post_id . '&action=edit' )
    );

    @wp_mail( $admin_email, $subject, $email_body );

    wp_send_json_success( array( 'message' => __( 'Thank you! Your message has been sent successfully. We will get back to you shortly.', 'mytheme' ) ) );
}
add_action( 'wp_ajax_submit_contact', 'mytheme_handle_contact_submission' );
add_action( 'wp_ajax_nopriv_submit_contact', 'mytheme_handle_contact_submission' );


/**
 * Register Student Result Custom Post Type
 */
function mytheme_register_student_result_cpt() {
    $labels = array(
        'name'               => _x( 'Student Results', 'post type general name', 'mytheme' ),
        'singular_name'      => _x( 'Student Result', 'post type singular name', 'mytheme' ),
        'menu_name'          => _x( 'Student Results', 'admin menu', 'mytheme' ),
        'name_admin_bar'     => _x( 'Student Result', 'add new on admin bar', 'mytheme' ),
        'add_new'            => _x( 'Add New Result', 'result', 'mytheme' ),
        'add_new_item'       => __( 'Add New Student Result', 'mytheme' ),
        'new_item'           => __( 'New Student Result', 'mytheme' ),
        'edit_item'          => __( 'Edit Student Result', 'mytheme' ),
        'view_item'          => __( 'View Student Result', 'mytheme' ),
        'all_items'          => __( 'All Student Results', 'mytheme' ),
        'search_items'       => __( 'Search Student Results', 'mytheme' ),
        'parent_item_colon'  => __( 'Parent Student Results:', 'mytheme' ),
        'not_found'          => __( 'No student results found.', 'mytheme' ),
        'not_found_in_trash' => __( 'No student results found in Trash.', 'mytheme' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'student-result' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'supports'           => array( 'title' ) // Title will be Student Name
    );

    register_post_type( 'student_result', $args );
}
add_action( 'init', 'mytheme_register_student_result_cpt' );

/**
 * Add Meta Boxes for Student Result CPT
 */
function mytheme_add_student_result_meta_boxes() {
    add_meta_box(
        'student_details_meta_box',
        __( 'Student Information', 'mytheme' ),
        'mytheme_render_student_details_meta_box',
        'student_result',
        'normal',
        'high'
    );
    add_meta_box(
        'student_marks_meta_box',
        __( 'Subject Marks Information', 'mytheme' ),
        'mytheme_render_student_marks_meta_box',
        'student_result',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'mytheme_add_student_result_meta_boxes' );

function mytheme_render_student_details_meta_box( $post ) {
    wp_nonce_field( 'save_student_result_meta', 'student_result_nonce' );

    $roll_number = get_post_meta( $post->ID, '_roll_number', true );
    $class_level = get_post_meta( $post->ID, '_class_level', true );
    $academic_year = get_post_meta( $post->ID, '_academic_year', true );
    $father_name = get_post_meta( $post->ID, '_father_name', true );
    $mother_name = get_post_meta( $post->ID, '_mother_name', true );
    $result_status = get_post_meta( $post->ID, '_result_status', true );
    $percentage = get_post_meta( $post->ID, '_percentage', true );

    ?>
    <table class="form-table">
        <tr>
            <th><label for="roll_number"><?php _e( 'Roll Number', 'mytheme' ); ?></label></th>
            <td><input type="text" id="roll_number" name="roll_number" value="<?php echo esc_attr( $roll_number ); ?>" class="regular-text" required /></td>
        </tr>
        <tr>
            <th><label for="class_level"><?php _e( 'Class', 'mytheme' ); ?></label></th>
            <td>
                <select id="class_level" name="class_level">
                    <option value="Class X" <?php selected( $class_level, 'Class X' ); ?>>Class X</option>
                    <option value="Class XII" <?php selected( $class_level, 'Class XII' ); ?>>Class XII</option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="academic_year"><?php _e( 'Academic Year', 'mytheme' ); ?></label></th>
            <td>
                <select id="academic_year" name="academic_year">
                    <option value="2023-24" <?php selected( $academic_year, '2023-24' ); ?>>2023-24</option>
                    <option value="2022-23" <?php selected( $academic_year, '2022-23' ); ?>>2022-23</option>
                    <option value="2021-22" <?php selected( $academic_year, '2021-22' ); ?>>2021-22</option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="father_name"><?php _e( "Father's Name", 'mytheme' ); ?></label></th>
            <td><input type="text" id="father_name" name="father_name" value="<?php echo esc_attr( $father_name ); ?>" class="regular-text" required /></td>
        </tr>
        <tr>
            <th><label for="mother_name"><?php _e( "Mother's Name", 'mytheme' ); ?></label></th>
            <td><input type="text" id="mother_name" name="mother_name" value="<?php echo esc_attr( $mother_name ); ?>" class="regular-text" required /></td>
        </tr>
        <tr>
            <th><label for="result_status"><?php _e( 'Result Status', 'mytheme' ); ?></label></th>
            <td>
                <select id="result_status" name="result_status">
                    <option value="PASS" <?php selected( $result_status, 'PASS' ); ?>>PASS</option>
                    <option value="COMPARTMENT" <?php selected( $result_status, 'COMPARTMENT' ); ?>>COMPARTMENT</option>
                    <option value="FAIL" <?php selected( $result_status, 'FAIL' ); ?>>FAIL</option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="percentage"><?php _e( 'Overall Percentage (%)', 'mytheme' ); ?></label></th>
            <td><input type="text" id="percentage" name="percentage" value="<?php echo esc_attr( $percentage ); ?>" placeholder="e.g. 95.6%" class="regular-text" required /></td>
        </tr>
    </table>
    <?php
}

function mytheme_render_student_marks_meta_box( $post ) {
    ?>
    <style>
        .marks-table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .marks-table th, .marks-table td { padding: 8px; border: 1px solid #ccd0d4; text-align: left; }
        .marks-table th { background: #f6f7f7; }
        .marks-table input { width: 100%; box-sizing: border-box; }
    </style>
    <table class="marks-table">
        <thead>
            <tr>
                <th style="width: 5%;">#</th>
                <th style="width: 40%;">Subject Name</th>
                <th style="width: 15%;">Theory Marks</th>
                <th style="width: 15%;">Practical Marks</th>
                <th style="width: 25%;">Grade</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ( $i = 1; $i <= 6; $i++ ) {
                $sub_name = get_post_meta( $post->ID, "_subject_{$i}_name", true );
                $sub_theory = get_post_meta( $post->ID, "_subject_{$i}_theory", true );
                $sub_practical = get_post_meta( $post->ID, "_subject_{$i}_practical", true );
                $sub_grade = get_post_meta( $post->ID, "_subject_{$i}_grade", true );
                ?>
                <tr>
                    <td><strong><?php echo $i; ?></strong></td>
                    <td><input type="text" name="subject_<?php echo $i; ?>_name" value="<?php echo esc_attr( $sub_name ); ?>" placeholder="e.g. English, Mathematics, Chemistry" /></td>
                    <td><input type="number" name="subject_<?php echo $i; ?>_theory" value="<?php echo esc_attr( $sub_theory ); ?>" min="0" max="100" placeholder="0-100" /></td>
                    <td><input type="number" name="subject_<?php echo $i; ?>_practical" value="<?php echo esc_attr( $sub_practical ); ?>" min="0" max="100" placeholder="0-100" /></td>
                    <td><input type="text" name="subject_<?php echo $i; ?>_grade" value="<?php echo esc_attr( $sub_grade ); ?>" placeholder="e.g. A1, A2, B1" /></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <p class="description">Note: Leave subject fields empty if a student takes fewer than 6 subjects.</p>
    <?php
}

/**
 * Save Student Result Meta
 */
function mytheme_save_student_result_meta( $post_id ) {
    if ( ! isset( $_POST['student_result_nonce'] ) || ! wp_verify_nonce( $_POST['student_result_nonce'], 'save_student_result_meta' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    // Save Information Details
    $fields = array(
        'roll_number'   => '_roll_number',
        'class_level'   => '_class_level',
        'academic_year' => '_academic_year',
        'father_name'   => '_father_name',
        'mother_name'   => '_mother_name',
        'result_status' => '_result_status',
        'percentage'    => '_percentage'
    );

    foreach ( $fields as $post_key => $meta_key ) {
        if ( isset( $_POST[$post_key] ) ) {
            update_post_meta( $post_id, $meta_key, sanitize_text_field( $_POST[$post_key] ) );
        }
    }

    // Save Subjects Details
    for ( $i = 1; $i <= 6; $i++ ) {
        if ( isset( $_POST["subject_{$i}_name"] ) ) {
            update_post_meta( $post_id, "_subject_{$i}_name", sanitize_text_field( $_POST["subject_{$i}_name"] ) );
        }
        if ( isset( $_POST["subject_{$i}_theory"] ) ) {
            update_post_meta( $post_id, "_subject_{$i}_theory", sanitize_text_field( $_POST["subject_{$i}_theory"] ) );
        }
        if ( isset( $_POST["subject_{$i}_practical"] ) ) {
            update_post_meta( $post_id, "_subject_{$i}_practical", sanitize_text_field( $_POST["subject_{$i}_practical"] ) );
        }
        if ( isset( $_POST["subject_{$i}_grade"] ) ) {
            update_post_meta( $post_id, "_subject_{$i}_grade", sanitize_text_field( $_POST["subject_{$i}_grade"] ) );
        }
    }
}
add_action( 'save_post_student_result', 'mytheme_save_student_result_meta' );

/**
 * Configure Custom Listing Columns for Student Result List
 */
function mytheme_set_student_result_columns( $columns ) {
    $new_columns = array(
        'cb'            => $columns['cb'],
        'roll_number'   => __( 'Roll Number', 'mytheme' ),
        'title'         => __( 'Student Name', 'mytheme' ),
        'class_level'   => __( 'Class', 'mytheme' ),
        'academic_year' => __( 'Year', 'mytheme' ),
        'percentage'    => __( 'Percentage', 'mytheme' ),
        'result_status' => __( 'Status', 'mytheme' ),
        'date'          => $columns['date']
    );
    return $new_columns;
}
add_filter( 'manage_student_result_posts_columns', 'mytheme_set_student_result_columns' );

function mytheme_render_student_result_custom_columns( $column, $post_id ) {
    switch ( $column ) {
        case 'roll_number':
            echo esc_html( get_post_meta( $post_id, '_roll_number', true ) );
            break;
        case 'class_level':
            echo esc_html( get_post_meta( $post_id, '_class_level', true ) );
            break;
        case 'academic_year':
            echo esc_html( get_post_meta( $post_id, '_academic_year', true ) );
            break;
        case 'percentage':
            echo esc_html( get_post_meta( $post_id, '_percentage', true ) );
            break;
        case 'result_status':
            $status = get_post_meta( $post_id, '_result_status', true );
            $color = '#16a34a'; // PASS Green
            if ( $status === 'COMPARTMENT' ) {
                $color = '#ea580c'; // Orange
            } elseif ( $status === 'FAIL' ) {
                $color = '#dc2626'; // Red
            }
            printf( '<span style="color: %s; font-weight: 700;">%s</span>', esc_attr( $color ), esc_html( $status ) );
            break;
    }
}
add_action( 'manage_student_result_posts_custom_column', 'mytheme_render_student_result_custom_columns', 10, 2 );

/**
 * Handle Secure Client-Side Student Result Search Requests via AJAX
 */
function mytheme_handle_student_result_search() {
    // Validate nonce
    if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'vps_enquiry_nonce' ) ) {
        wp_send_json_error( array( 'message' => __( 'Security check failed. Please refresh the page and try again.', 'mytheme' ) ) );
    }

    $roll_number = isset( $_POST['roll_number'] ) ? sanitize_text_field( $_POST['roll_number'] ) : '';
    $class_level = isset( $_POST['class_level'] ) ? sanitize_text_field( $_POST['class_level'] ) : '';
    $academic_year = isset( $_POST['academic_year'] ) ? sanitize_text_field( $_POST['academic_year'] ) : '';

    if ( empty( $roll_number ) || empty( $class_level ) || empty( $academic_year ) ) {
        wp_send_json_error( array( 'message' => __( 'Please fill in all search parameters (Class, Year, and Roll Number).', 'mytheme' ) ) );
    }

    $args = array(
        'post_type'      => 'student_result',
        'posts_per_page' => 1,
        'meta_query'     => array(
            'relation' => 'AND',
            array(
                'key'     => '_roll_number',
                'value'   => $roll_number,
                'compare' => '='
            ),
            array(
                'key'     => '_class_level',
                'value'   => $class_level,
                'compare' => '='
            ),
            array(
                'key'     => '_academic_year',
                'value'   => $academic_year,
                'compare' => '='
            )
        )
    );

    $query = new WP_Query( $args );

    if ( ! $query->have_posts() ) {
        wp_send_json_error( array( 'message' => __( 'Result not found. Please check your Class, Academic Year, and Board Roll Number and try again.', 'mytheme' ) ) );
    }

    $query->the_post();
    $post_id = get_the_ID();
    $student_name = get_the_title();
    $father_name = get_post_meta( $post_id, '_father_name', true );
    $mother_name = get_post_meta( $post_id, '_mother_name', true );
    $percentage = get_post_meta( $post_id, '_percentage', true );
    $status = get_post_meta( $post_id, '_result_status', true );

    // Gather Subject-wise details
    $subjects = array();
    for ( $i = 1; $i <= 6; $i++ ) {
        $sub_name = get_post_meta( $post_id, "_subject_{$i}_name", true );
        if ( ! empty( $sub_name ) ) {
            $theory = (int) get_post_meta( $post_id, "_subject_{$i}_theory", true );
            $practical = (int) get_post_meta( $post_id, "_subject_{$i}_practical", true );
            $grade = get_post_meta( $post_id, "_subject_{$i}_grade", true );
            $total = $theory + $practical;
            $subjects[] = array(
                'name'      => $sub_name,
                'theory'    => $theory,
                'practical' => $practical,
                'total'     => $total,
                'grade'     => $grade
            );
        }
    }

    wp_reset_postdata();

    // Render structured board-grade marksheets
    ob_start();
    ?>
    <div class="card glass" style="opacity: 1 !important; display: block !important; padding: 2.5rem; margin-top: 2rem; border: 1px solid var(--secondary); background: #ffffff !important; color: #1e293b !important; box-shadow: var(--shadow-xl);">
        <!-- Board Header -->
        <div style="text-align: center; border-bottom: 2px double var(--secondary); padding-bottom: 1.5rem; margin-bottom: 1.5rem;">
            <h3 style="font-family: 'Cinzel', serif; font-size: 1.6rem; color: #002147 !important; margin: 0 0 5px; letter-spacing: 1px;">VARANASI PUBLIC SCHOOL</h3>
            <p style="margin: 0; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 2px; color: #64748b !important; font-weight: 600;">Affiliated to CBSE, New Delhi | Lohta Road, Varanasi</p>
            <h4 style="margin: 15px 0 0; font-family: 'Cinzel', serif; font-size: 1.1rem; color: #d4af37 !important; text-transform: uppercase; letter-spacing: 1px;">Statement of Marks</h4>
            <p style="margin: 2px 0 0; font-size: 0.9rem; font-weight: 700; color: #334155 !important;"><?php echo esc_html( $class_level ); ?> Public Examination (<?php echo esc_html( $academic_year ); ?>)</p>
        </div>

        <!-- Student Basic Details Info Table -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.5rem; margin-bottom: 2rem; font-size: 0.9rem; line-height: 1.6;">
            <div>
                <span style="color: #64748b !important; font-weight: 600; display: block; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.5px;">Student Name</span>
                <strong style="font-size: 1rem; color: #002147 !important;"><?php echo esc_html( $student_name ); ?></strong>
            </div>
            <div>
                <span style="color: #64748b !important; font-weight: 600; display: block; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.5px;">Board Roll Number</span>
                <strong style="font-size: 1rem; color: #002147 !important;"><?php echo esc_html( $roll_number ); ?></strong>
            </div>
            <div>
                <span style="color: #64748b !important; font-weight: 600; display: block; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.5px;">Father's Name</span>
                <strong style="font-size: 1rem; color: #002147 !important;"><?php echo esc_html( $father_name ); ?></strong>
            </div>
            <div>
                <span style="color: #64748b !important; font-weight: 600; display: block; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.5px;">Mother's Name</span>
                <strong style="font-size: 1rem; color: #002147 !important;"><?php echo esc_html( $mother_name ); ?></strong>
            </div>
        </div>

        <!-- Subject Marks Details Table -->
        <div style="overflow-x: auto; margin-bottom: 2rem;">
            <table style="width: 100%; border-collapse: collapse; font-size: 0.9rem; min-width: 500px; background: #ffffff !important;">
                <thead>
                    <tr style="border-bottom: 2px solid var(--secondary); background: #f8fafc !important; text-align: left;">
                        <th style="padding: 12px 10px; font-weight: 700; color: #002147 !important; width: 45%;">Subject</th>
                        <th style="padding: 12px 10px; font-weight: 700; color: #002147 !important; text-align: center; width: 15%;">Theory</th>
                        <th style="padding: 12px 10px; font-weight: 700; color: #002147 !important; text-align: center; width: 15%;">Practical</th>
                        <th style="padding: 12px 10px; font-weight: 700; color: #002147 !important; text-align: center; width: 15%;">Total Marks</th>
                        <th style="padding: 12px 10px; font-weight: 700; color: #002147 !important; text-align: center; width: 10%;">Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ( $subjects as $sub ) : ?>
                        <tr style="border-bottom: 1px solid #e2e8f0 !important; font-weight: 500; background: #ffffff !important;">
                            <td style="padding: 12px 10px; color: #002147 !important; font-weight: 600;"><?php echo esc_html( $sub['name'] ); ?></td>
                            <td style="padding: 12px 10px; text-align: center; color: #475569 !important;"><?php echo esc_html( $sub['theory'] ); ?></td>
                            <td style="padding: 12px 10px; text-align: center; color: #475569 !important;"><?php echo esc_html( $sub['practical'] ); ?></td>
                            <td style="padding: 12px 10px; text-align: center; font-weight: 700; color: #002147 !important;"><?php echo esc_html( $sub['total'] ); ?></td>
                            <td style="padding: 12px 10px; text-align: center; font-weight: 700; color: #d4af37 !important;"><?php echo esc_html( $sub['grade'] ); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Marksheet Footer: Results Summary & Percentages -->
        <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 1rem; border-top: 2px solid var(--line); padding-top: 1.5rem; margin-top: 1rem;">
            <div style="display: flex; gap: 2rem;">
                <div>
                    <span style="color: #64748b !important; font-weight: 600; display: block; font-size: 0.75rem; text-transform: uppercase;">Overall Percentage</span>
                    <strong style="font-size: 1.25rem; color: #002147 !important;"><?php echo esc_html( $percentage ); ?></strong>
                </div>
                <div>
                    <span style="color: #64748b !important; font-weight: 600; display: block; font-size: 0.75rem; text-transform: uppercase;">Result Status</span>
                    <?php
                    $status_color = '#16a34a'; // PASS Green
                    if ( $status === 'COMPARTMENT' ) {
                        $status_color = '#ea580c'; // Orange
                    } elseif ( $status === 'FAIL' ) {
                        $status_color = '#dc2626'; // Red
                    }
                    ?>
                    <strong style="font-size: 1.25rem; color: <?php echo esc_attr( $status_color ); ?> !important;"><?php echo esc_html( $status ); ?></strong>
                </div>
            </div>
            <div>
                <button type="button" onclick="window.print();" class="button" style="background: #002147 !important; color: white !important; border: none; padding: 10px 25px; border-radius: var(--radius-sm); font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 8px;">
                    Print Marksheet
                </button>
            </div>
        </div>
    </div>
    <?php
    $marksheet_html = ob_get_clean();

    wp_send_json_success( array( 'html' => $marksheet_html ) );
}
add_action( 'wp_ajax_search_student_result', 'mytheme_handle_student_result_search' );
add_action( 'wp_ajax_nopriv_search_student_result', 'mytheme_handle_student_result_search' );


/**
 * Auto-seed default student results for testing purposes
 */
function mytheme_seed_default_student_results() {
    // Only run once to allow admins to delete or modify records
    if ( get_option( 'mytheme_student_results_seeded' ) === 'yes' ) {
        return;
    }

    // Only run if the post type is registered
    if ( ! post_type_exists( 'student_result' ) ) {
        return;
    }

    $test_roll = '10245678';

    // Check if Class X result exists
    $existing = new WP_Query( array(
        'post_type'  => 'student_result',
        'meta_key'   => '_roll_number',
        'meta_value' => $test_roll,
        'post_status'=> 'any', // Check all statuses (including trash/drafts)
        'posts_per_page' => 1
    ) );

    if ( ! $existing->have_posts() ) {
        // Create student result
        $post_id = wp_insert_post( array(
            'post_title'  => 'Chanchal Kumar',
            'post_status' => 'publish',
            'post_type'   => 'student_result'
        ) );

        if ( ! is_wp_error( $post_id ) ) {
            update_post_meta( $post_id, '_roll_number', $test_roll );
            update_post_meta( $post_id, '_class_level', 'Class X' );
            update_post_meta( $post_id, '_academic_year', '2023-24' );
            update_post_meta( $post_id, '_father_name', 'Rajesh Kumar' );
            update_post_meta( $post_id, '_mother_name', 'Suman Devi' );
            update_post_meta( $post_id, '_result_status', 'PASS' );
            update_post_meta( $post_id, '_percentage', '96.0%' );

            // Add subjects
            $subjects = array(
                1 => array( 'name' => 'English', 'theory' => 75, 'practical' => 20, 'grade' => 'A1' ),
                2 => array( 'name' => 'Mathematics', 'theory' => 78, 'practical' => 20, 'grade' => 'A1' ),
                3 => array( 'name' => 'Science', 'theory' => 76, 'practical' => 20, 'grade' => 'A1' ),
                4 => array( 'name' => 'Social Science', 'theory' => 74, 'practical' => 20, 'grade' => 'A1' ),
                5 => array( 'name' => 'Hindi', 'theory' => 75, 'practical' => 20, 'grade' => 'A1' ),
                6 => array( 'name' => 'Information Technology', 'theory' => 48, 'practical' => 50, 'grade' => 'A1' )
            );

            foreach ( $subjects as $i => $sub ) {
                update_post_meta( $post_id, "_subject_{$i}_name", $sub['name'] );
                update_post_meta( $post_id, "_subject_{$i}_theory", $sub['theory'] );
                update_post_meta( $post_id, "_subject_{$i}_practical", $sub['practical'] );
                update_post_meta( $post_id, "_subject_{$i}_grade", $sub['grade'] );
            }
        }
    }

    $test_roll_12 = '12245678';

    // Check if Class XII result exists
    $existing_12 = new WP_Query( array(
        'post_type'  => 'student_result',
        'meta_key'   => '_roll_number',
        'meta_value' => $test_roll_12,
        'post_status'=> 'any', // Check all statuses (including trash/drafts)
        'posts_per_page' => 1
    ) );

    if ( ! $existing_12->have_posts() ) {
        // Create Class XII result
        $post_id_12 = wp_insert_post( array(
            'post_title'  => 'Rahul Verma',
            'post_status' => 'publish',
            'post_type'   => 'student_result'
        ) );

        if ( ! is_wp_error( $post_id_12 ) ) {
            update_post_meta( $post_id_12, '_roll_number', $test_roll_12 );
            update_post_meta( $post_id_12, '_class_level', 'Class XII' );
            update_post_meta( $post_id_12, '_academic_year', '2023-24' );
            update_post_meta( $post_id_12, '_father_name', 'Suresh Verma' );
            update_post_meta( $post_id_12, '_mother_name', 'Rekha Verma' );
            update_post_meta( $post_id_12, '_result_status', 'PASS' );
            update_post_meta( $post_id_12, '_percentage', '94.8%' );

            // Add subjects for Class XII Science
            $subjects_12 = array(
                1 => array( 'name' => 'English Core', 'theory' => 76, 'practical' => 20, 'grade' => 'A1' ),
                2 => array( 'name' => 'Physics', 'theory' => 68, 'practical' => 30, 'grade' => 'A1' ),
                3 => array( 'name' => 'Chemistry', 'theory' => 69, 'practical' => 30, 'grade' => 'A1' ),
                4 => array( 'name' => 'Mathematics', 'theory' => 78, 'practical' => 20, 'grade' => 'A1' ),
                5 => array( 'name' => 'Computer Science', 'theory' => 67, 'practical' => 30, 'grade' => 'A1' )
            );

            foreach ( $subjects_12 as $i => $sub ) {
                update_post_meta( $post_id_12, "_subject_{$i}_name", $sub['name'] );
                update_post_meta( $post_id_12, "_subject_{$i}_theory", $sub['theory'] );
                update_post_meta( $post_id_12, "_subject_{$i}_practical", $sub['practical'] );
                update_post_meta( $post_id_12, "_subject_{$i}_grade", $sub['grade'] );
            }
        }
    }

    // Mark as seeded in the database options
    update_option( 'mytheme_student_results_seeded', 'yes' );
}
add_action( 'init', 'mytheme_seed_default_student_results', 20 );


/**
 * -------------------------------------------------------------------
 * DYNAMIC FEE SUBMISSION PORTAL BACKEND
 * -------------------------------------------------------------------
 */

// 1. Register Fee Submission Custom Post Type
function mytheme_register_fee_submission_cpt() {
    $labels = array(
        'name'               => _x( 'Fee Submissions', 'post type general name', 'mytheme' ),
        'singular_name'      => _x( 'Fee Submission', 'post type singular name', 'mytheme' ),
        'menu_name'          => _x( 'Fee Submissions', 'admin menu', 'mytheme' ),
        'name_admin_bar'     => _x( 'Fee Submission', 'add new on admin bar', 'mytheme' ),
        'add_new'            => _x( 'Add New', 'submission', 'mytheme' ),
        'add_new_item'       => __( 'Add New Fee Submission', 'mytheme' ),
        'new_item'           => __( 'New Fee Submission', 'mytheme' ),
        'edit_item'          => __( 'Edit Fee Submission', 'mytheme' ),
        'view_item'          => __( 'View Fee Submission', 'mytheme' ),
        'all_items'          => __( 'All Fee Submissions', 'mytheme' ),
        'search_items'       => __( 'Search Fee Submissions', 'mytheme' ),
        'not_found'          => __( 'No submissions found.', 'mytheme' ),
        'not_found_in_trash' => __( 'No submissions found in Trash.', 'mytheme' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'fee-submission' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 29,
        'menu_icon'          => 'dashicons-money-alt',
        'supports'           => array( 'title' )
    );

    register_post_type( 'fee_submission', $args );
}
add_action( 'init', 'mytheme_register_fee_submission_cpt' );

// 2. Add Custom Columns to Fee Submissions List
function mytheme_set_fee_submission_columns( $columns ) {
    $new_columns = array(
        'cb'               => '<input type="checkbox" />',
        'title'            => __( 'Student Name', 'mytheme' ),
        'admission_no'     => __( 'Admission No', 'mytheme' ),
        'class_section'    => __( 'Class & Section', 'mytheme' ),
        'fee_category'     => __( 'Fee Category', 'mytheme' ),
        'amount'           => __( 'Amount (INR)', 'mytheme' ),
        'payment_method'   => __( 'Payment Method', 'mytheme' ),
        'transaction_id'   => __( 'Transaction ID', 'mytheme' ),
        'date'             => __( 'Date', 'mytheme' )
    );
    return $new_columns;
}
add_filter( 'manage_fee_submission_posts_columns', 'mytheme_set_fee_submission_columns' );

// 3. Render Custom Column Content for Fee Submissions List
function mytheme_render_fee_submission_columns( $column, $post_id ) {
    switch ( $column ) {
        case 'admission_no':
            echo esc_html( get_post_meta( $post_id, '_admission_no', true ) );
            break;
        case 'class_section':
            echo esc_html( get_post_meta( $post_id, '_class_section', true ) );
            break;
        case 'fee_category':
            echo esc_html( get_post_meta( $post_id, '_fee_category', true ) );
            break;
        case 'amount':
            $amt = get_post_meta( $post_id, '_payable_amount', true );
            echo '<strong>₹' . esc_html( number_format( (float) $amt, 2 ) ) . '</strong>';
            break;
        case 'payment_method':
            echo '<span style="text-transform: uppercase; font-weight: 600; color: #4b5563;">' . esc_html( get_post_meta( $post_id, '_payment_method', true ) ) . '</span>';
            break;
        case 'transaction_id':
            echo '<code style="background: #f3f4f6; padding: 2px 6px; border-radius: 4px; font-weight: bold; color: #111827;">' . esc_html( get_post_meta( $post_id, '_transaction_id', true ) ) . '</code>';
            break;
    }
}
add_action( 'manage_fee_submission_posts_custom_column', 'mytheme_render_fee_submission_columns', 10, 2 );

// 4. Register columns as sortable
function mytheme_fee_submission_sortable_columns( $columns ) {
    $columns['amount'] = 'amount';
    $columns['date']   = 'date';
    return $columns;
}
add_filter( 'manage_edit-fee_submission_sortable_columns', 'mytheme_fee_submission_sortable_columns' );

// 5. Handle AJAX Secure Fee Submission POST Requests
function mytheme_handle_fee_submission() {
    // Security check
    if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'vps_enquiry_nonce' ) ) {
        wp_send_json_error( array( 'message' => __( 'Security verification failed. Please refresh the page and try again.', 'mytheme' ) ) );
    }

    // Capture & sanitize inputs
    $student_name = isset( $_POST['student_name'] ) ? sanitize_text_field( $_POST['student_name'] ) : '';
    $admission_no = isset( $_POST['admission_no'] ) ? sanitize_text_field( $_POST['admission_no'] ) : '';
    $class_section = isset( $_POST['class_section'] ) ? sanitize_text_field( $_POST['class_section'] ) : '';
    $fee_category = isset( $_POST['fee_category'] ) ? sanitize_text_field( $_POST['fee_category'] ) : '';
    $payable_amount = isset( $_POST['payable_amount'] ) ? sanitize_text_field( $_POST['payable_amount'] ) : '';
    $payment_method = isset( $_POST['payment_method'] ) ? sanitize_text_field( $_POST['payment_method'] ) : '';

    // Field Validations
    if ( empty( $student_name ) || empty( $admission_no ) || empty( $class_section ) || empty( $payable_amount ) || empty( $payment_method ) ) {
        wp_send_json_error( array( 'message' => __( 'Please fill in all required fields and select a payment method.', 'mytheme' ) ) );
    }

    if ( ! is_numeric( $payable_amount ) || (float) $payable_amount <= 0 ) {
        wp_send_json_error( array( 'message' => __( 'Please enter a valid positive payable fee amount.', 'mytheme' ) ) );
    }

    // Generate unique transaction reference ID
    $transaction_id = 'TXN-VPS-' . strtoupper( wp_generate_password( 4, false, false ) ) . '-' . time();

    // Insert record CPT post
    $post_id = wp_insert_post( array(
        'post_title'  => $student_name,
        'post_status' => 'publish',
        'post_type'   => 'fee_submission'
    ) );

    if ( is_wp_error( $post_id ) ) {
        wp_send_json_error( array( 'message' => __( 'Failed to register transaction database entry. Please try again.', 'mytheme' ) ) );
    }

    // Persist meta details
    update_post_meta( $post_id, '_admission_no', $admission_no );
    update_post_meta( $post_id, '_class_section', $class_section );
    update_post_meta( $post_id, '_fee_category', $fee_category );
    update_post_meta( $post_id, '_payable_amount', $payable_amount );
    update_post_meta( $post_id, '_payment_method', $payment_method );
    update_post_meta( $post_id, '_transaction_id', $transaction_id );

    // Format current transaction timestamps
    $date_formatted = date_i18n( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ) );

    // Construct premium digital fee receipt HTML response
    ob_start();
    ?>
    <div class="card glass" style="opacity: 1 !important; display: block !important; padding: 2.5rem; border: 1px solid var(--secondary); background: #ffffff !important; color: #1e293b !important; box-shadow: var(--shadow-xl); border-radius: var(--radius-lg); text-align: left;">
        
        <!-- Receipt CBSE Style Header -->
        <div style="text-align: center; border-bottom: 2px dashed var(--secondary); padding-bottom: 1.5rem; margin-bottom: 1.5rem; position: relative;">
            <div style="position: absolute; top: -10px; right: -10px; background: #e8f5e9; color: #2e7d32; font-size: 0.75rem; font-weight: 700; padding: 4px 10px; border-radius: 99px; text-transform: uppercase;">
                SUCCESSFUL
            </div>
            <h3 style="font-family: 'Cinzel', serif; font-size: 1.5rem; color: #002147 !important; margin: 0 0 5px; letter-spacing: 1px;">VARANASI PUBLIC SCHOOL</h3>
            <p style="margin: 0; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 2px; color: #64748b !important; font-weight: 600;">Affiliated to CBSE, New Delhi | Lohta Road, Varanasi</p>
            <h4 style="margin: 15px 0 0; font-family: 'Cinzel', serif; font-size: 1.1rem; color: #d4af37 !important; text-transform: uppercase; letter-spacing: 1px;">Digital Fee Receipt</h4>
        </div>

        <!-- Receipt Metadata Layout Grid -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.5rem; margin-bottom: 2rem; font-size: 0.9rem; line-height: 1.6;">
            <div>
                <span style="color: #64748b !important; font-weight: 600; display: block; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.5px;">Student Name</span>
                <strong style="font-size: 1rem; color: #002147 !important;"><?php echo esc_html( $student_name ); ?></strong>
            </div>
            <div>
                <span style="color: #64748b !important; font-weight: 600; display: block; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.5px;">Admission Number</span>
                <strong style="font-size: 1rem; color: #002147 !important;"><?php echo esc_html( $admission_no ); ?></strong>
            </div>
            <div>
                <span style="color: #64748b !important; font-weight: 600; display: block; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.5px;">Class & Section</span>
                <strong style="font-size: 1rem; color: #002147 !important;"><?php echo esc_html( $class_section ); ?></strong>
            </div>
            <div>
                <span style="color: #64748b !important; font-weight: 600; display: block; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.5px;">Payment Date & Time</span>
                <strong style="font-size: 1rem; color: #002147 !important;"><?php echo esc_html( $date_formatted ); ?></strong>
            </div>
        </div>

        <!-- Receipt Table breakdown -->
        <div style="border: 1px solid #e2e8f0; border-radius: 8px; overflow: hidden; margin-bottom: 2rem;">
            <table style="width: 100%; border-collapse: collapse; font-size: 0.95rem;">
                <thead>
                    <tr style="background: #f8fafc; border-bottom: 1px solid #e2e8f0; text-align: left;">
                        <th style="padding: 12px 15px; font-weight: 700; color: #002147 !important;">Fee Item Description</th>
                        <th style="padding: 12px 15px; font-weight: 700; color: #002147 !important; text-align: right; width: 30%;">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="padding: 12px 15px; color: #002147 !important; font-weight: 600;">
                            <?php echo esc_html( $fee_category ); ?>
                        </td>
                        <td style="padding: 12px 15px; text-align: right; color: #1e293b !important; font-weight: 600;">
                            ₹<?php echo esc_html( number_format( (float) $payable_amount, 2 ) ); ?>
                        </td>
                    </tr>
                    <!-- Total Paid Row -->
                    <tr style="background: #fafafa; font-weight: 700; font-size: 1.05rem;">
                        <td style="padding: 15px; color: #002147 !important; text-transform: uppercase;">Total Paid Amount</td>
                        <td style="padding: 15px; text-align: right; color: #16a34a !important; font-size: 1.1rem;">
                            ₹<?php echo esc_html( number_format( (float) $payable_amount, 2 ) ); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Transaction Details Reference -->
        <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 1.2rem; margin-bottom: 2.5rem; display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 1rem;">
            <div>
                <span style="color: #64748b !important; font-size: 0.8rem; font-weight: 600; display: block; text-transform: uppercase; letter-spacing: 0.5px;">Transaction Reference ID</span>
                <code style="font-size: 1.05rem; font-weight: 700; color: #1e293b !important; background: transparent; padding: 0;"><?php echo esc_html( $transaction_id ); ?></code>
            </div>
            <div>
                <span style="color: #64748b !important; font-size: 0.8rem; font-weight: 600; display: block; text-transform: uppercase; letter-spacing: 0.5px;">Payment Gateway Mode</span>
                <strong style="color: #002147 !important; font-size: 1rem; text-transform: uppercase;"><?php echo esc_html( $payment_method ); ?></strong>
            </div>
        </div>

        <!-- Print Action button -->
        <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #e2e8f0; padding-top: 1.5rem;">
            <p style="margin: 0; font-size: 0.8rem; color: #64748b !important; font-style: italic;">Note: This is a secure system generated receipt and does not require a physical signature.</p>
            <button type="button" onclick="window.print();" class="button" style="background: #002147 !important; color: white !important; border: none; padding: 10px 25px; border-radius: var(--radius-sm); font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 8px; box-shadow: var(--shadow-md);">
                <svg viewBox="0 0 24 24" style="width: 18px; height: 18px; fill: currentColor;">
                    <path d="M19 8H5c-1.66 0-3 1.34-3 3v6h4v4h12v-4h4v-6c0-1.66-1.34-3-3-3zm-3 11H8v-5h8v5zm3-7c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm-1-9H6v4h12V3z"/>
                </svg>
                Print Fee Receipt
            </button>
        </div>
    </div>
    <?php
    $receipt_html = ob_get_clean();

    wp_send_json_success( array(
        'html'           => $receipt_html,
        'transaction_id' => $transaction_id,
        'message'        => __( 'Fee payment processed successfully.', 'mytheme' )
    ) );
}
add_action( 'wp_ajax_submit_fee_payment', 'mytheme_handle_fee_submission' );
add_action( 'wp_ajax_nopriv_submit_fee_payment', 'mytheme_handle_fee_submission' );


/**
 * -------------------------------------------------------------------
 * DYNAMIC SCHOOL TOPPERS & ACHIEVERS REGISTRATION
 * -------------------------------------------------------------------
 */

// 1. Register School Toppers Custom Post Type
function mytheme_register_school_topper_cpt() {
    $labels = array(
        'name'               => _x( 'Toppers & Achievers', 'post type general name', 'mytheme' ),
        'singular_name'      => _x( 'Topper', 'post type singular name', 'mytheme' ),
        'menu_name'          => _x( 'School Toppers', 'admin menu', 'mytheme' ),
        'name_admin_bar'     => _x( 'Topper', 'add new on admin bar', 'mytheme' ),
        'add_new'            => _x( 'Add New Topper', 'topper', 'mytheme' ),
        'add_new_item'       => __( 'Add New School Topper', 'mytheme' ),
        'new_item'           => __( 'New Topper', 'mytheme' ),
        'edit_item'          => __( 'Edit Topper', 'mytheme' ),
        'view_item'          => __( 'View Topper', 'mytheme' ),
        'all_items'          => __( 'All Toppers', 'mytheme' ),
        'search_items'       => __( 'Search Toppers', 'mytheme' ),
        'not_found'          => __( 'No toppers found.', 'mytheme' ),
        'not_found_in_trash' => __( 'No toppers found in Trash.', 'mytheme' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'school-topper' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 30,
        'menu_icon'          => 'dashicons-awards',
        'supports'           => array( 'title', 'thumbnail' )
    );

    register_post_type( 'school_topper', $args );
}
add_action( 'init', 'mytheme_register_school_topper_cpt' );

// 2. Register Meta Box for Topper Parameters
function mytheme_add_school_topper_meta_boxes() {
    add_meta_box(
        'school_topper_details',
        __( 'Topper Academic Parameters', 'mytheme' ),
        'mytheme_render_school_topper_meta_box',
        'school_topper',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'mytheme_add_school_topper_meta_boxes' );

// Render Meta Box UI
function mytheme_render_school_topper_meta_box( $post ) {
    wp_nonce_field( 'mytheme_topper_meta_nonce', 'mytheme_topper_nonce' );

    $percentage = get_post_meta( $post->ID, '_topper_percentage', true );
    $class      = get_post_meta( $post->ID, '_topper_class', true );
    $year       = get_post_meta( $post->ID, '_topper_year', true );
    $rank       = get_post_meta( $post->ID, '_topper_rank', true );

    ?>
    <table class="form-table">
        <tr>
            <th><label for="topper_percentage"><?php _e( 'Percentage / Score (%)', 'mytheme' ); ?></label></th>
            <td><input type="text" id="topper_percentage" name="topper_percentage" value="<?php echo esc_attr( $percentage ); ?>" placeholder="e.g. 98.4%" class="regular-text" required></td>
        </tr>
        <tr>
            <th><label for="topper_class"><?php _e( 'Class & Section', 'mytheme' ); ?></label></th>
            <td><input type="text" id="topper_class" name="topper_class" value="<?php echo esc_attr( $class ); ?>" placeholder="e.g. Class XII - Science" class="regular-text" required></td>
        </tr>
        <tr>
            <th><label for="topper_year"><?php _e( 'Academic Year', 'mytheme' ); ?></label></th>
            <td><input type="text" id="topper_year" name="topper_year" value="<?php echo esc_attr( $year ); ?>" placeholder="e.g. 2023-24" class="regular-text" required></td>
        </tr>
        <tr>
            <th><label for="topper_rank"><?php _e( 'Rank / Achievement Title', 'mytheme' ); ?></label></th>
            <td><input type="text" id="topper_rank" name="topper_rank" value="<?php echo esc_attr( $rank ); ?>" placeholder="e.g. 1st Rank / School Topper" class="regular-text"></td>
        </tr>
    </table>
    <?php
}

// Save Meta Box Data
function mytheme_save_school_topper_meta( $post_id ) {
    if ( ! isset( $_POST['mytheme_topper_nonce'] ) || ! wp_verify_nonce( $_POST['mytheme_topper_nonce'], 'mytheme_topper_meta_nonce' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['topper_percentage'] ) ) {
        update_post_meta( $post_id, '_topper_percentage', sanitize_text_field( $_POST['topper_percentage'] ) );
    }
    if ( isset( $_POST['topper_class'] ) ) {
        update_post_meta( $post_id, '_topper_class', sanitize_text_field( $_POST['topper_class'] ) );
    }
    if ( isset( $_POST['topper_year'] ) ) {
        update_post_meta( $post_id, '_topper_year', sanitize_text_field( $_POST['topper_year'] ) );
    }
    if ( isset( $_POST['topper_rank'] ) ) {
        update_post_meta( $post_id, '_topper_rank', sanitize_text_field( $_POST['topper_rank'] ) );
    }
}
add_action( 'save_post_school_topper', 'mytheme_save_school_topper_meta' );

// 3. Customize Dashboard Columns
function mytheme_set_school_topper_columns( $columns ) {
    $new_columns = array(
        'cb'         => '<input type="checkbox" />',
        'title'      => __( 'Topper Name', 'mytheme' ),
        'image'      => __( 'Photo', 'mytheme' ),
        'class'      => __( 'Class & Section', 'mytheme' ),
        'score'      => __( 'Percentage / Score', 'mytheme' ),
        'year'       => __( 'Academic Year', 'mytheme' ),
        'rank'       => __( 'Rank / Achievement', 'mytheme' ),
        'date'       => __( 'Date Added', 'mytheme' )
    );
    return $new_columns;
}
add_filter( 'manage_school_topper_posts_columns', 'mytheme_set_school_topper_columns' );

function mytheme_render_school_topper_columns( $column, $post_id ) {
    switch ( $column ) {
        case 'image':
            if ( has_post_thumbnail( $post_id ) ) {
                echo get_the_post_thumbnail( $post_id, array( 50, 50 ), array( 'style' => 'border-radius: 50%; object-fit: cover;' ) );
            } else {
                echo '<span style="color: #9ca3af; font-size: 0.85rem; font-style: italic;">No photo</span>';
            }
            break;
        case 'class':
            echo esc_html( get_post_meta( $post_id, '_topper_class', true ) );
            break;
        case 'score':
            echo '<strong style="color: #0f172a; font-size: 1.05rem;">' . esc_html( get_post_meta( $post_id, '_topper_percentage', true ) ) . '</strong>';
            break;
        case 'year':
            echo esc_html( get_post_meta( $post_id, '_topper_year', true ) );
            break;
        case 'rank':
            echo '<span style="background: rgba(212, 175, 55, 0.15); color: #854d0e; padding: 2px 8px; border-radius: 99px; font-weight: 600; font-size: 0.85rem;">' . esc_html( get_post_meta( $post_id, '_topper_rank', true ) ) . '</span>';
            break;
    }
}
add_action( 'manage_school_topper_posts_custom_column', 'mytheme_render_school_topper_columns', 10, 2 );

// 4. Auto-seeder for School Toppers
function mytheme_seed_default_school_toppers() {
    if ( get_option( 'mytheme_toppers_seeded' ) === 'yes' ) {
        return;
    }
    if ( ! post_type_exists( 'school_topper' ) ) {
        return;
    }

    // Default toppers data
    $default_toppers = array(
        array(
            'name'       => 'Aditya Narayan',
            'class'      => 'Class XII - Science',
            'score'      => '98.4%',
            'year'       => '2023-24',
            'rank'       => 'School Topper (1st Rank)'
        ),
        array(
            'name'       => 'Priya Mishra',
            'class'      => 'Class XII - Commerce',
            'score'      => '97.6%',
            'year'       => '2023-24',
            'rank'       => '2nd Rank'
        ),
        array(
            'name'       => 'Sumit Verma',
            'class'      => 'Class X - A',
            'score'      => '97.2%',
            'year'       => '2023-24',
            'rank'       => 'Class Topper (1st Rank)'
        ),
        array(
            'name'       => 'Ananya Singh',
            'class'      => 'Class X - B',
            'score'      => '96.8%',
            'year'       => '2023-24',
            'rank'       => 'High Excellence Award'
        )
    );

    foreach ( $default_toppers as $topper ) {
        $existing = new WP_Query( array(
            'post_type'      => 'school_topper',
            'title'          => $topper['name'],
            'post_status'    => 'any',
            'posts_per_page' => 1
        ) );

        if ( ! $existing->have_posts() ) {
            $post_id = wp_insert_post( array(
                'post_title'  => $topper['name'],
                'post_status' => 'publish',
                'post_type'   => 'school_topper'
            ) );

            if ( ! is_wp_error( $post_id ) ) {
                update_post_meta( $post_id, '_topper_class', $topper['class'] );
                update_post_meta( $post_id, '_topper_percentage', $topper['score'] );
                update_post_meta( $post_id, '_topper_year', $topper['year'] );
                update_post_meta( $post_id, '_topper_rank', $topper['rank'] );
            }
        }
    }

    update_option( 'mytheme_toppers_seeded', 'yes' );
}
add_action( 'init', 'mytheme_seed_default_school_toppers', 20 );


/**
 * -------------------------------------------------------------------
 * DYNAMIC MEDIA GALLERY HUB REGISTRATION
 * -------------------------------------------------------------------
 */

// 1. Register Media Gallery Hub Custom Post Type
function mytheme_register_gallery_item_cpt() {
    $labels = array(
        'name'               => _x( 'Media Gallery Hub', 'post type general name', 'mytheme' ),
        'singular_name'      => _x( 'Gallery Item', 'post type singular name', 'mytheme' ),
        'menu_name'          => _x( 'Gallery Hub', 'admin menu', 'mytheme' ),
        'name_admin_bar'     => _x( 'Gallery Item', 'add new on admin bar', 'mytheme' ),
        'add_new'            => _x( 'Add New Item', 'gallery item', 'mytheme' ),
        'add_new_item'       => __( 'Add New Gallery Item', 'mytheme' ),
        'new_item'           => __( 'New Gallery Item', 'mytheme' ),
        'edit_item'          => __( 'Edit Gallery Item', 'mytheme' ),
        'view_item'          => __( 'View Gallery Item', 'mytheme' ),
        'all_items'          => __( 'All Gallery Items', 'mytheme' ),
        'search_items'       => __( 'Search Gallery Items', 'mytheme' ),
        'not_found'          => __( 'No gallery items found.', 'mytheme' ),
        'not_found_in_trash' => __( 'No gallery items found in Trash.', 'mytheme' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'gallery-item' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 31,
        'menu_icon'          => 'dashicons-images-alt2',
        'supports'           => array( 'title', 'editor', 'thumbnail' )
    );

    register_post_type( 'gallery_item', $args );
}
add_action( 'init', 'mytheme_register_gallery_item_cpt' );

// 2. Add Meta Boxes for Gallery Options
function mytheme_add_gallery_item_meta_boxes() {
    add_meta_box(
        'gallery_item_options',
        __( 'Media Gallery Item Details', 'mytheme' ),
        'mytheme_render_gallery_item_meta_box',
        'gallery_item',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'mytheme_add_gallery_item_meta_boxes' );

// Render Meta Box UI
function mytheme_render_gallery_item_meta_box( $post ) {
    wp_nonce_field( 'mytheme_gallery_meta_nonce', 'mytheme_gallery_nonce' );

    $item_type      = get_post_meta( $post->ID, '_gallery_item_type', true );
    $video_url      = get_post_meta( $post->ID, '_gallery_video_url', true );
    $event_location = get_post_meta( $post->ID, '_gallery_event_location', true );
    $news_link      = get_post_meta( $post->ID, '_gallery_news_link', true );
    $fallback_url   = get_post_meta( $post->ID, '_gallery_image_url', true );

    // Default to photo type if not set
    if ( empty( $item_type ) ) {
        $item_type = 'photo';
    }

    ?>
    <style>
        .gallery-meta-row { margin-bottom: 15px; }
        .gallery-meta-row label { display: block; font-weight: bold; margin-bottom: 5px; }
        .gallery-meta-row input[type="text"], .gallery-meta-row select { width: 100%; max-width: 500px; padding: 8px; }
        .gallery-meta-row p.description { margin-top: 4px; font-style: italic; color: #64748b; }
    </style>

    <div class="gallery-meta-row">
        <label for="gallery_item_type"><?php _e( 'Media Item Type', 'mytheme' ); ?></label>
        <select id="gallery_item_type" name="gallery_item_type">
            <option value="photo" <?php selected( $item_type, 'photo' ); ?>>Photo</option>
            <option value="video" <?php selected( $item_type, 'video' ); ?>>Video</option>
            <option value="news" <?php selected( $item_type, 'news' ); ?>>News Item</option>
            <option value="event" <?php selected( $item_type, 'event' ); ?>>Event</option>
        </select>
        <p class="description">Select the category tab where this item will appear in the frontend Gallery page.</p>
    </div>

    <!-- Conditional sections managed via simple CSS toggling on select change -->
    <div class="gallery-meta-row gallery-conditional-field video-field">
        <label for="gallery_video_url"><?php _e( 'Video Embed URL or YouTube ID', 'mytheme' ); ?></label>
        <input type="text" id="gallery_video_url" name="gallery_video_url" value="<?php echo esc_attr( $video_url ); ?>" placeholder="e.g. https://www.youtube.com/embed/rnvLDK0zgCE or rnvLDK0zgCE">
        <p class="description">Provide a YouTube embed URL or YouTube Video ID.</p>
    </div>

    <div class="gallery-meta-row gallery-conditional-field event-field">
        <label for="gallery_event_location"><?php _e( 'Event Location', 'mytheme' ); ?></label>
        <input type="text" id="gallery_event_location" name="gallery_event_location" value="<?php echo esc_attr( $event_location ); ?>" placeholder="e.g. KRP Grounds, Varanasi">
        <p class="description">Location where the event is scheduled / took place.</p>
    </div>

    <div class="gallery-meta-row gallery-conditional-field news-field">
        <label for="gallery_news_link"><?php _e( 'News Redirect / Action Link', 'mytheme' ); ?></label>
        <input type="text" id="gallery_news_link" name="gallery_news_link" value="<?php echo esc_attr( $news_link ); ?>" placeholder="e.g. /admission/ or #">
        <p class="description">Optional redirect URL when clicking "Read More" on a news card.</p>
    </div>

    <div class="gallery-meta-row">
        <label for="gallery_image_url"><?php _e( 'Asset Fallback Image URL (Optional)', 'mytheme' ); ?></label>
        <input type="text" id="gallery_image_url" name="gallery_image_url" value="<?php echo esc_attr( $fallback_url ); ?>" placeholder="e.g. /assets/facilities/school photos/DSC01192.jpg">
        <p class="description">Allows mapping standard local theme assets as a fallback when no Featured Image is uploaded.</p>
    </div>

    <script>
    jQuery(document).ready(function($) {
        function toggleFields() {
            var type = $('#gallery_item_type').val();
            $('.gallery-conditional-field').hide();
            if (type === 'video') {
                $('.video-field').show();
            } else if (type === 'event') {
                $('.event-field').show();
            } else if (type === 'news') {
                $('.news-field').show();
            }
        }
        $('#gallery_item_type').change(toggleFields);
        toggleFields();
    });
    </script>
    <?php
}

// Save Meta Box Data
function mytheme_save_gallery_item_meta( $post_id ) {
    if ( ! isset( $_POST['mytheme_gallery_nonce'] ) || ! wp_verify_nonce( $_POST['mytheme_gallery_nonce'], 'mytheme_gallery_meta_nonce' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['gallery_item_type'] ) ) {
        update_post_meta( $post_id, '_gallery_item_type', sanitize_text_field( $_POST['gallery_item_type'] ) );
    }
    if ( isset( $_POST['gallery_video_url'] ) ) {
        update_post_meta( $post_id, '_gallery_video_url', sanitize_text_field( $_POST['gallery_video_url'] ) );
    }
    if ( isset( $_POST['gallery_event_location'] ) ) {
        update_post_meta( $post_id, '_gallery_event_location', sanitize_text_field( $_POST['gallery_event_location'] ) );
    }
    if ( isset( $_POST['gallery_news_link'] ) ) {
        update_post_meta( $post_id, '_gallery_news_link', sanitize_text_field( $_POST['gallery_news_link'] ) );
    }
    if ( isset( $_POST['gallery_image_url'] ) ) {
        update_post_meta( $post_id, '_gallery_image_url', sanitize_text_field( $_POST['gallery_image_url'] ) );
    }
}
add_action( 'save_post_gallery_item', 'mytheme_save_gallery_item_meta' );

// 3. Customize Media Hub Dashboard Columns
function mytheme_set_gallery_item_columns( $columns ) {
    $new_columns = array(
        'cb'         => '<input type="checkbox" />',
        'title'      => __( 'Media Title', 'mytheme' ),
        'image'      => __( 'Thumbnail', 'mytheme' ),
        'type'       => __( 'Media Type', 'mytheme' ),
        'meta_info'  => __( 'Special Fields', 'mytheme' ),
        'date'       => __( 'Date Published', 'mytheme' )
    );
    return $new_columns;
}
add_filter( 'manage_gallery_item_posts_columns', 'mytheme_set_gallery_item_columns' );

function mytheme_render_gallery_item_columns( $column, $post_id ) {
    switch ( $column ) {
        case 'image':
            $thumb_url = get_the_post_thumbnail_url( $post_id, array( 60, 45 ) );
            if ( ! $thumb_url ) {
                $fallback = get_post_meta( $post_id, '_gallery_image_url', true );
                if ( $fallback ) {
                    $thumb_url = get_template_directory_uri() . $fallback;
                }
            }
            if ( $thumb_url ) {
                echo '<img src="' . esc_url( $thumb_url ) . '" style="width: 60px; height: 45px; border-radius: 4px; object-fit: cover; border: 1px solid #e2e8f0;" />';
            } else {
                echo '<span style="color: #9ca3af; font-size: 0.85rem; font-style: italic;">No media</span>';
            }
            break;
        case 'type':
            $type = get_post_meta( $post_id, '_gallery_item_type', true );
            $labels = array(
                'photo' => array( 'Photo', 'background: rgba(14, 165, 233, 0.15); color: #0369a1;' ),
                'video' => array( 'Video', 'background: rgba(239, 68, 68, 0.15); color: #b91c1c;' ),
                'news'  => array( 'News', 'background: rgba(16, 185, 129, 0.15); color: #047857;' ),
                'event' => array( 'Event', 'background: rgba(245, 158, 11, 0.15); color: #b45309;' )
            );
            $badge = isset( $labels[$type] ) ? $labels[$type] : array( 'Photo', 'background: #f1f5f9; color: #475569;' );
            echo '<span style="' . $badge[1] . ' padding: 3px 10px; border-radius: 99px; font-weight: 600; font-size: 0.8rem; text-transform: uppercase;">' . esc_html( $badge[0] ) . '</span>';
            break;
        case 'meta_info':
            $type = get_post_meta( $post_id, '_gallery_item_type', true );
            if ( $type === 'video' ) {
                echo '<span style="font-family: monospace; font-size: 0.85rem; color: #64748b;">YouTube: ' . esc_html( get_post_meta( $post_id, '_gallery_video_url', true ) ) . '</span>';
            } elseif ( $type === 'event' ) {
                echo '<span style="font-size: 0.85rem; color: #475569;">📍 ' . esc_html( get_post_meta( $post_id, '_gallery_event_location', true ) ) . '</span>';
            } elseif ( $type === 'news' ) {
                $link = get_post_meta( $post_id, '_gallery_news_link', true );
                echo '<span style="font-size: 0.85rem; color: #0891b2;">🔗 Action: ' . esc_html( empty( $link ) ? '#' : $link ) . '</span>';
            } else {
                echo '<span style="color: #94a3b8; font-size: 0.85rem;">Standard Image</span>';
            }
            break;
    }
}
add_action( 'manage_gallery_item_posts_custom_column', 'mytheme_render_gallery_item_columns', 10, 2 );

// 4. Robust Option-guarded Auto-seeder for Media Gallery
function mytheme_seed_default_gallery_items() {
    if ( get_option( 'mytheme_gallery_seeded' ) === 'yes' ) {
        return;
    }
    if ( ! post_type_exists( 'gallery_item' ) ) {
        return;
    }

    $default_items = array(
        // Photos
        array(
            'title'    => 'Photo Gallery 1',
            'content'  => '',
            'type'     => 'photo',
            'image'    => '/assets/facilities/school photos/DSC01192.jpg',
            'extra'    => ''
        ),
        array(
            'title'    => 'Auditorium View',
            'content'  => '',
            'type'     => 'photo',
            'image'    => '/assets/facilities/01. Auditoriam.jpg',
            'extra'    => ''
        ),
        array(
            'title'    => 'School Gallery View',
            'content'  => '',
            'type'     => 'photo',
            'image'    => '/assets/facilities/06. School Gallery.jpg',
            'extra'    => ''
        ),
        array(
            'title'    => 'Classroom View 1',
            'content'  => '',
            'type'     => 'photo',
            'image'    => '/assets/facilities/10. Class Room 01.jpg',
            'extra'    => ''
        ),
        array(
            'title'    => 'Library View',
            'content'  => '',
            'type'     => 'photo',
            'image'    => '/assets/facilities/05 Library.jpg',
            'extra'    => ''
        ),
        array(
            'title'    => 'School Building Front',
            'content'  => '',
            'type'     => 'photo',
            'image'    => '/assets/facilities/school photos/vps building.jpg',
            'extra'    => ''
        ),
        array(
            'title'    => 'Front Office Entrance',
            'content'  => '',
            'type'     => 'photo',
            'image'    => '/assets/facilities/school photos/Front Office (1).jpg',
            'extra'    => ''
        ),
        array(
            'title'    => 'Classroom View 2',
            'content'  => '',
            'type'     => 'photo',
            'image'    => '/assets/facilities/10. Class Room 02.jpg',
            'extra'    => ''
        ),
        array(
            'title'    => 'PGT Computer Lab',
            'content'  => '',
            'type'     => 'photo',
            'image'    => '/assets/facilities/computer lab/04. PGT Computer  Lab.jpg',
            'extra'    => ''
        ),
        array(
            'title'    => 'Bio Lab Setup',
            'content'  => '',
            'type'     => 'photo',
            'image'    => '/assets/facilities/biology lab/08 Bio Lab 01.jpg',
            'extra'    => ''
        ),

        // Videos
        array(
            'title'    => 'VPS Virtual Campus Tour',
            'content'  => '',
            'type'     => 'video',
            'image'    => '',
            'extra'    => 'https://www.youtube.com/embed/rnvLDK0zgCE'
        ),
        array(
            'title'    => 'VPS Annual Day Highlights',
            'content'  => '',
            'type'     => 'video',
            'image'    => '',
            'extra'    => 'https://www.youtube.com/embed/sytoZ20LPz4'
        ),
        array(
            'title'    => 'Inter-House Sports Meet',
            'content'  => '',
            'type'     => 'video',
            'image'    => '',
            'extra'    => 'https://www.youtube.com/embed/XzS_o0-L7eY'
        ),
        array(
            'title'    => 'Science & Art Exhibition 2026',
            'content'  => '',
            'type'     => 'video',
            'image'    => '',
            'extra'    => 'https://www.youtube.com/embed/kY31R97rF-E'
        ),

        // News
        array(
            'title'    => 'Admissions Open for Session 2026-27',
            'content'  => 'Varanasi Public School announces the opening of admissions for the upcoming academic session. Apply now to secure your child\'s future with our world-class education.',
            'type'     => 'news',
            'image'    => '',
            'extra'    => '/admission/'
        ),
        array(
            'title'    => 'Inter-School Sports Championship',
            'content'  => 'Our students secured top positions in the recent district-level sports championship, demonstrating outstanding teamwork and athletic prowess.',
            'type'     => 'news',
            'image'    => '',
            'extra'    => '/achievement/'
        ),
        array(
            'title'    => 'Annual Science Exhibition',
            'content'  => 'The annual science exhibition showcased innovative projects by our bright minds, focusing on sustainability and renewable energy solutions.',
            'type'     => 'news',
            'image'    => '',
            'extra'    => '#'
        ),

        // Events
        array(
            'title'    => 'Annual Day 2026',
            'content'  => 'Celebrating institutional excellence.',
            'type'     => 'event',
            'image'    => '/assets/facilities/school photos/DSC01194.jpg',
            'extra'    => 'Varanasi Public School Campus'
        ),
        array(
            'title'    => 'Inter-School Sports Meet',
            'content'  => 'KRP Grounds, Varanasi',
            'type'     => 'event',
            'image'    => '/assets/facilities/school photos/DSC01192.jpg',
            'extra'    => 'KRP Grounds, Varanasi'
        )
    );

    foreach ( $default_items as $item ) {
        $existing = new WP_Query( array(
            'post_type'      => 'gallery_item',
            'title'          => $item['title'],
            'post_status'    => 'any',
            'posts_per_page' => 1
        ) );

        if ( ! $existing->have_posts() ) {
            $post_id = wp_insert_post( array(
                'post_title'   => $item['title'],
                'post_content' => $item['content'],
                'post_status'  => 'publish',
                'post_type'    => 'gallery_item'
            ) );

            if ( ! is_wp_error( $post_id ) ) {
                update_post_meta( $post_id, '_gallery_item_type', $item['type'] );

                if ( ! empty( $item['image'] ) ) {
                    update_post_meta( $post_id, '_gallery_image_url', $item['image'] );
                }

                // Handle conditional extras
                if ( $item['type'] === 'video' ) {
                    update_post_meta( $post_id, '_gallery_video_url', $item['extra'] );
                } elseif ( $item['type'] === 'event' ) {
                    update_post_meta( $post_id, '_gallery_event_location', $item['extra'] );
                } elseif ( $item['type'] === 'news' ) {
                    update_post_meta( $post_id, '_gallery_news_link', $item['extra'] );
                }
            }
        }
    }

    update_option( 'mytheme_gallery_seeded', 'yes' );
}
add_action( 'init', 'mytheme_seed_default_gallery_items', 25 );

