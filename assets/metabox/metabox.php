<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb_';

	/**
	 * Metaboxes
	 */
	$meta_boxes['item_id'] = array(
		'id'         => 'item_id',
		'title'      => __( 'Item Id', 'cmb' ),
		'pages'      => array( 'football', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
			array(
			'name' => __( 'Item Id', 'cmb' ),
			'desc' => __( 'field description (optional)', 'cmb' ),
			'id'   => $prefix . 'item_id',
			'type' => 'text_medium',
			// 'repeatable' => true,
			),
		),
	);


	$meta_boxes['banner_sports_singel'] = array(
		'id'         => 'banner_sports_singel',
		'title'      => __( 'Banner Page', 'cmb' ),
		'pages'      => array( 'featured', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
	        array(
	            'name' => 'Entry Image',
	            'id'   => 'image',
	            'type' => 'file',
	        ),
		),
	);





	$meta_boxes['contact_us'] = array(
		'id'         => 'contact_us',
		'title'      => __( 'Contact Details Page', 'cmb' ),
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'id', 'value' => array( 77, ), ), // Specific post IDs to display this metabox
		'fields'     => array(
			array(
				'name' => __( 'Google Map Code', 'cmb' ),
				'desc' => __( 'field description (optional)', 'cmb' ),
				'id'   => $prefix . 'google_map',
				'type' => 'textarea_code',
			),
			array(
				'name' => __( 'Address', 'cmb' ),
				'desc' => __( 'field description (optional)', 'cmb' ),
				'id'   => $prefix . 'address_text',
				'type' => 'textarea_small',
			),
			array(
				'name' => __( 'PO.BOX', 'cmb' ),
				'desc' => __( 'field description (optional)', 'cmb' ),
				'id'   => $prefix . 'po_box',
				'type' => 'textarea_small',
			),
			array(
				'name' => __( 'Email', 'cmb' ),
				'desc' => __( 'field description (optional)', 'cmb' ),
				'id'   => $prefix . 'email',
				'type' => 'text',
			),
			array(
				'name' => __( 'Phone', 'cmb' ),
				'desc' => __( 'field description (optional)', 'cmb' ),
				'id'   => $prefix . 'phone',
				'type' => 'text',
			),
			array(
				'name' => __( 'Website', 'cmb' ),
				'desc' => __( 'field description (optional)', 'cmb' ),
				'id'   => $prefix . 'website',
				'type' => 'text',
			),
			array(
				'name' => __( 'Day Open', 'cmb' ),
				'desc' => __( 'field description (optional)', 'cmb' ),
				'id'   => $prefix . 'day',
				'type' => 'text',
			),
			array(
				'name' => __( 'Hours', 'cmb' ),
				'desc' => __( 'field description (optional)', 'cmb' ),
				'id'   => $prefix . 'hours',
				'type' => 'text',
			),			
		)
	);

	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}
