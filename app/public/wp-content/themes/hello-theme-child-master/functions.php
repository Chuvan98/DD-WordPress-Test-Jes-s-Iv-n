<?php
/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_CHILD_VERSION', '2.0.0' );

/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function hello_elementor_child_scripts_styles() {

	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		HELLO_ELEMENTOR_CHILD_VERSION
	);

}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_scripts_styles', 20 );

function create_posttype() {
    register_post_type('deer_tests',
        array(
            'labels' => array(
                'name' => __('Deer Tests'),
                'singular_name' => __('Deer Test'),
                'menu_name' => __('Deer Tests'),
                'all_items' => __('All Deer Tests'),
                'add_new_item' => __('Add New Deer Test'),
                'edit_item' => __('Edit Deer Test'),
                'new_item' => __('New Deer Test'),
                'view_item' => __('View Deer Test'),
                'search_items' => __('Search Deer Tests'),
                'not_found' => __('Not Found'),
                'not_found_in_trash' => __('Not Found in Trash'),
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'deer-tests'),
            'supports' => array('title', 'editor', 'thumbnail'),
            'show_in_rest' => true,
            'menu_position' => 5
        )
    );
}
add_action('init', 'create_posttype');

// Add Meta Boxes
function add_deer_tests_meta_boxes() {
    add_meta_box('deer_tests_start_date', 'Start Date', 'deer_tests_start_date_callback', 'deer_tests', 'normal', 'high');
    add_meta_box('deer_tests_end_date', 'End Date', 'deer_tests_end_date_callback', 'deer_tests', 'normal', 'high');
    add_meta_box('deer_tests_description', 'Description', 'deer_tests_description_callback', 'deer_tests', 'normal', 'high');
    add_meta_box('deer_tests_cover_image', 'Cover Image', 'deer_tests_cover_image_callback', 'deer_tests', 'side', 'high');
    add_meta_box('deer_tests_application_link', 'Application Link', 'deer_tests_application_link_callback', 'deer_tests', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_deer_tests_meta_boxes');

// Callback functions for each field
function deer_tests_start_date_callback($post) {
    $value = get_post_meta($post->ID, '_deer_tests_start_date', true);
    echo '<input type="date" name="deer_tests_start_date" value="' . esc_attr($value) . '" class="widefat">';
}

function deer_tests_end_date_callback($post) {
    $value = get_post_meta($post->ID, '_deer_tests_end_date', true);
    echo '<input type="date" name="deer_tests_end_date" value="' . esc_attr($value) . '" class="widefat">';
}

function deer_tests_description_callback($post) {
    $value = get_post_meta($post->ID, '_deer_tests_description', true);
    echo '<textarea name="deer_tests_description" class="widefat">' . esc_textarea($value) . '</textarea>';
}

function deer_tests_cover_image_callback($post) {
    $value = get_post_meta($post->ID, '_deer_tests_cover_image', true);
    echo '<input type="text" name="deer_tests_cover_image" id="deer_tests_cover_image" value="' . esc_attr($value) . '" class="widefat">';
    echo '<input type="button" id="deer_tests_cover_image_button" class="button" value="Select Image">';
    ?>
    <script>
        jQuery(document).ready(function($) {
            var mediaUploader;
            $('#deer_tests_cover_image_button').click(function(e) {
                e.preventDefault();
                // If the media uploader instance exists, reopen it.
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }
                // Create a new media uploader instance.
                mediaUploader = wp.media({
                    title: 'Select Cover Image',
                    button: {
                        text: 'Use this image'
                    },
                    multiple: false
                });

                mediaUploader.on('select', function() {
                    var attachment = mediaUploader.state().get('selection').first().toJSON();
                    $('#deer_tests_cover_image').val(attachment.url);
                });
                // Open the uploader dialog.
                mediaUploader.open();
            });
        });
    </script>
    <?php
}

function deer_tests_application_link_callback($post) {
    $value = get_post_meta($post->ID, '_deer_tests_application_link', true);
    echo '<input type="url" name="deer_tests_application_link" value="' . esc_attr($value) . '" class="widefat">';
}

function ewp_upload_external_image($image_url) {
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    require_once(ABSPATH . 'wp-admin/includes/media.php');
    require_once(ABSPATH . 'wp-admin/includes/image.php');

    $tmp = download_url($image_url);

    if (is_wp_error($tmp)) {
        // Error al descargar la imagen
        return false;
    }

    $file_array = array(
        'name' => basename($image_url),
        'tmp_name' => $tmp
    );

    $id = media_handle_sideload($file_array, 0);

    if (is_wp_error($id)) {
        // Error al manejar la imagen
        @unlink($file_array['tmp_name']); // Eliminar archivo temporal
        return false;
    }

    return $id; // Devuelve el ID de la imagen subida
}



function save_deer_tests_meta_boxes($post_id) {
	if ( ! function_exists( 'save_deer_tests_meta_boxes' ) ) {
		function save_deer_tests_meta_boxes($post_id) {
			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
			if (!current_user_can('edit_post', $post_id)) return;
	
			if (isset($_POST['deer_tests_start_date'])) {
				update_post_meta($post_id, '_deer_tests_start_date', sanitize_text_field($_POST['deer_tests_start_date']));
			}
	
			if (isset($_POST['deer_tests_end_date'])) {
				update_post_meta($post_id, '_deer_tests_end_date', sanitize_text_field($_POST['deer_tests_end_date']));
			}
	
			if (isset($_POST['deer_tests_description'])) {
				update_post_meta($post_id, '_deer_tests_description', sanitize_textarea_field($_POST['deer_tests_description']));
			}
	
			if (isset($_POST['deer_tests_cover_image'])) {
				$image_url = esc_url_raw($_POST['deer_tests_cover_image']);
	
				// Si la imagen URL es externa, intenta subirla y obtener el ID de la imagen
				$attachment_id = ewp_upload_external_image($image_url);
	
				if ($attachment_id) {
					update_post_meta($post_id, '_deer_tests_cover_image', $image_url);
					set_post_thumbnail($post_id, $attachment_id); // Establece la imagen destacada del post
				}
			}
	
			if (isset($_POST['deer_tests_application_link'])) {
				update_post_meta($post_id, '_deer_tests_application_link', esc_url_raw($_POST['deer_tests_application_link']));
			}
		}
	}	
}

add_action('save_post', 'save_deer_tests_meta_boxes', 10, 1);
