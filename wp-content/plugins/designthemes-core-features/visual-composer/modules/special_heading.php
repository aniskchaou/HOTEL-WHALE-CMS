<?php add_action( 'vc_before_init', 'dt_sc_special_heading_vc_map' );
function dt_sc_special_heading_vc_map() {

	vc_map( array(
		"name" => esc_html__( "Special Heading", 'designthemes-core' ),
		"base" => "dt_sc_special_heading",
		"icon" => "dt_sc_special_heading",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			// Title
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title', 'designthemes-core' ),
				'param_name' => 'title'
			),

			// Sub Title
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Sub Title', 'designthemes-core' ),
				'param_name' => 'subtitle'
			),

			// Extra Title
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra Title', 'designthemes-core' ),
				'param_name' => 'extratitle'
			),

			// Extra Title Font
			array(
				'type' => 'google_fonts',
				'heading' => esc_html__( 'Extra Title Typography', 'designthemes-core' ),
				'param_name' => 'google_fonts',
				'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
				'settings' => array(
					'fields' => array(
						'font_family_description' => esc_html__( 'Select font family.', 'designthemes-core' ),
						'font_style_description' => esc_html__( 'Select font styling.', 'designthemes-core' ),
					),
				)
			),

            // Font Size
			array(
                'param_name' => 'font_size',
                'type' => 'textfield', 
                'heading' => esc_html__('Font Size (px)', 'designthemes-core'),
                'description' => esc_html__('Font size for extra title. ex: 15', 'designthemes-core'),
                'std' => '15',
                'edit_field_class' => 'vc_col-sm-6 vc_column'
            ),

			// Align
      		array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Alignment', 'designthemes-core' ),
      			'param_name' => 'align',
				'value' => array( 'None' => 'alignnone', 'Left' => 'alignleft', 'Center' => 'aligncenter', 'Right' => 'alignright' ),
				'std' => 'alignnone'
			),

          	// Extra class name
          	array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Extra class name', 'designthemes-core' ),
          		'param_name' => 'class',
          		'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'designthemes-core' )
          	),
		)
	) );
} ?>