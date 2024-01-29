<?php

/**
 * Register size guide post type
 * @author jacek
 */
class ctSizeGuideCPT {

	public function __construct() {
		add_action( 'init', array( $this, 'registerTypes' ) );
		add_filter( 'manage_ct_size_guide_posts_columns', array($this, 'ct_size_guide_set_column') );
		add_action( 'manage_ct_size_guide_posts_custom_column' , array($this,'ct_size_guide_display_column'), 10, 2 );
		register_activation_hook( dirname(__FILE__) . '/ctSizeGuidePlugin.php', array( $this, 'examplePosts' ) );

	}

	public function registerTypes() {

		if ( ! ctSizeGuidePlugin::hasWooCommerce() ) {
			return;
		}

		$labels = array(
			'name'               => __( 'Size guides', 'post type general name', 'ct-sgp' ),
			'singular_name'      => __( 'Size guide', 'post type singular name', 'ct-sgp' ),
			'menu_name'          => __( 'Size guides', 'admin menu', 'ct-sgp' ),
			'name_admin_bar'     => __( 'Size guide', 'add new on admin bar', 'ct-sgp' ),
			'add_new'            => __( 'Add new', 'size guide', 'ct-sgp' ),
			'add_new_item'       => __( 'Add new size guide', 'ct-sgp' ),
			'new_item'           => __( 'New size guide', 'ct-sgp' ),
			'edit_item'          => __( 'Edit size guide', 'ct-sgp' ),
			'view_item'          => __( 'View size guide', 'ct-sgp' ),
			'all_items'          => __( 'All size guides', 'ct-sgp' ),
			'search_items'       => __( 'Search size guides', 'ct-sgp' ),
			'not_found'          => __( 'No size guides found.', 'ct-sgp' ),
			'not_found_in_trash' => __( 'No size guides found in trash.', 'ct-sgp' )
		);

		$args = array(
			'hierarchical'       => false,
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => false,
			'show_ui'            => true,
            'show_in_nav_menus'  => false,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'size-guide' ),
			'capability_type'    => 'page',
			'has_archive'        => false,
			'supports'           => array( 'title', 'editor' )
		);

		register_post_type( 'ct_size_guide', $args );

	}

	/*
	 * Sort Column
	 *
	 */

	public function ct_size_guide_set_column( $columns ){
		unset($columns['date']);
		$columns['ct_shortcode'] = __( 'Shortcode (Pages only) ', 'ct-sgp' );
		$columns['date'] = __( 'Date', '' );

		return $columns;
	}

	/*
	 * Set Column Shortcode
	 * Default Shortcode value
	 *
	 */

	public function ct_size_guide_display_column( $columns, $post_id ){
	    $btn_val = '""';
	    $btn = "true";
	    $id = $post_id;
		switch( $columns ){
			case 'ct_shortcode' :
				echo "<input type = 'text' value = '[ct_size_guide postid = ".$id." button=".$btn." button_value=".$btn_val."]' style='width:100%; max-width:350px;'>";
				break;
		}
	}

	/**
	 * Add custom post types
	 */

	public function examplePosts() {

		$this->registerTypes();

		if ( count( get_posts( array( 'post_type' => 'ct_size_guide' ) ) ) == 0 ) {

			//sample women
			$women = array(
				'post_content' => __('<h3>Measuring Tips to Assure The Best Fit</h3>
            <img class="alignright size-full wp-image-2101" style="float:right" src="' . CT_SIZEGUIDE_ASSETS . 'img/size-guide-woman.jpg" alt="silhouette-woman"/><h4>Bust</h4>
            With arms at sides, place tape measure under your arms and run it around the fullest part of the bustline and across the shoulder blades.
            <br><h4>Waist</h4>
            Find the natural crease of your waist by bending to one side. Run tape measure around your natural waistline, keeping one finger between the tape and your body for a comfortable fit.
            <br><h4>Hips</h4>
            With feet together, run tape measure around the fullest part of your hips/seat, about 7 to 8 inches below your waistline.
            <br><h4>Inseam</h4>
            For full-length pants, run tape measure along the inside of your leg, from just below the crotch to about 1 inch below the ankle.', 'ct-sgp'),
				'post_name'    => 'sample-women-size-guide',
				'post_title'   => __('Sample women size guide', 'ct-sgp'),
				'post_status'  => 'publish',
				'post_type'    => 'ct_size_guide',
			);

			$womenID = wp_insert_post( $women );

			$womenTitle   = __('Premier Designer And Contemporary Apparel Sizing', 'ct-sgp');
			$womenTable   = array(
				array( 'UK Size', 'Bust', 'Waist', 'Hips' ),
				array( '4', '30', '22.75', '32.75' ),
				array( '6', '31', '23.75', '33.75' ),
				array( '8', '32', '24.75', '34.75' ),
				array( '10', '34', '26.75', '36.75' ),
				array( '12', '36', '28.75', '38.75' ),
				array( '14', '38', '30.75', '40.75' ),
				array( '16', '40', '32.75', '42.75' ),
				array( '18', '43', '35.75', '45.75' )
			);
			$womenCaption = __('All dimensions are given in inches', 'ct-sgp');

			$meta_table    = array();
			$meta_table[0] = array(
				'title'   => $womenTitle,
				'table'   => $womenTable,
				'caption' => $womenCaption
			);

			update_post_meta( $womenID, '_ct_sizeguide', $meta_table );

			//sample men
			$men = array(
				'post_content' => __('<h3>Measuring Tips to Assure The Best Fit</h3>
            <img class="alignright size-full wp-image-2101" style="float:right;" src="' . CT_SIZEGUIDE_ASSETS . 'img/size-guide-man.jpg" alt="silhouette-woman"/><h4>Bust</h4>
            With arms at sides, place tape measure under your arms and run it around the fullest part of the bustline and across the shoulder blades.
            <br><h4>Waist</h4>
            Find the natural crease of your waist by bending to one side. Run tape measure around your natural waistline, keeping one finger between the tape and your body for a comfortable fit.
            <br><h4>Hips</h4>
            With feet together, run tape measure around the fullest part of your hips/seat, about 7 to 8 inches below your waistline.
            <br><h4>Inseam</h4>
            For full-length pants, run tape measure along the inside of your leg, from just below the crotch to about 1 inch below the ankle.', 'ct-sgp'),
				'post_name'    => 'sample-men-size-guide',
				'post_title'   => __('Sample men size guide', 'ct-sgp'),
				'post_status'  => 'publish',
				'post_type'    => 'ct_size_guide',
			);

			$menID = wp_insert_post( $men );

			$menTitle   = __('Premier Designer And Contemporary Apparel Sizing', 'ct-sgp');
			$menTable   = array(
				array( 'UK Size', 'Bust', 'Waist', 'Hips' ),
				array( '4', '30', '22.75', '32.75' ),
				array( '6', '31', '23.75', '33.75' ),
				array( '8', '32', '24.75', '34.75' ),
				array( '10', '34', '26.75', '36.75' ),
				array( '12', '36', '28.75', '38.75' ),
				array( '14', '38', '30.75', '40.75' ),
				array( '16', '40', '32.75', '42.75' ),
				array( '18', '43', '35.75', '45.75' )
			);
			$menCaption = __('All dimensions are given in inches', 'ct-sgp');

			$meta_table    = array();
			$meta_table[0] = array(
				'title'   => $menTitle,
				'table'   => $menTable,
				'caption' => $menCaption
			);

			update_post_meta( $menID, '_ct_sizeguide', $meta_table );

		}

	}

}

new ctSizeGuideCPT();