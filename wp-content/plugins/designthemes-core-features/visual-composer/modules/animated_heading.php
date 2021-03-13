<?php add_action( 'vc_before_init', 'dt_sc_animated_heading_vc_map' );
function dt_sc_animated_heading_vc_map() {

	vc_map( array(
		"name" => esc_html__( "Animated Heading", 'designthemes-core' ),
        "base" => "dt_sc_animated_heading",
		"icon" => "dt_sc_animated_heading",
		"category" => DT_VC_CATEGORY,
		"params" => array(

      		# Heading
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Heading", 'designthemes-core' ),
      			"param_name" => "heading"
      		),

			# BG Image
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Background Image', 'designthemes-core' ),
				'param_name' => 'bg_image',
				'description' => esc_html__( 'Select image from media library', 'designthemes-core' )
			),

      		# Font Size
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Font Size", 'designthemes-core' ),
      			"param_name" => "font_size",
				'description' => esc_html__( 'Put the font size of heading. ex: 150', 'designthemes-core' )
      		),

      		# Class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'designthemes-core' ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular icon box element differently - add a class name and refer to it in custom CSS','designthemes-core')
      		),
		)
	) );
}?>