<?php

namespace Elementor; // Custom widgets must be defined in the Elementor namespace

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)



/**

 * Widget Name: Icon Box

 */

class POTW_IconBox extends Widget_Base{



 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.

	public function get_name() {

		return 'iiconbox';

	}



	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.

	public function get_title() {

		return __( 'POTW Icon Box', 'potw' );

	}



	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.

	public function get_icon() {

		return 'eicon-icon-box';

	}



	// The get_categories method, lets you set the category of the widget, return the category name as a string.

	public function get_categories() {

		return [ 'category_potw' ];

	}



	public static function get_button_color() {

		return [

			'primary' 	=> __( 'Primary Color', 'potw' ),

			'secondary' => __( 'Second Color', 'potw' ),

			'third'   	=> __( 'Third Color', 'potw' ),

			'pink'   	=> __( 'Pink Color', 'potw' ),

			'purple'   	=> __( 'Purple Color', 'potw' ),

			'aqua'   	=> __( 'Aqua Color', 'potw' ),

			'white'   	=> __( 'White Color', 'potw' ),

		];

	}



	public static function get_potw_heading_html_tag() {

		return [

			'h1'  => __( 'H1', 'potw' ),

			'h2'  => __( 'H2', 'potw' ),

			'h3'  => __( 'H3', 'potw' ),

			'h4'  => __( 'H4', 'potw' ),

			'h5'  => __( 'H5', 'potw' ),

			'h6'  => __( 'H6', 'potw' ),

			'div'  => __( 'div', 'potw' ),

			'span'  => __( 'span', 'potw' ),

			'p'  => __( 'p', 'potw' ),

		];

	}



	protected function _register_controls() {



		//Content Service box

		$this->start_controls_section(

			'content_section',

			[

				'label' => __( 'Icon Box', 'potw' ),

			]

		);



		$this->add_control(

			'box_style',

			[

				'label' 	=> __( 'Box Style', 'potw' ),

				'type'  	=> Controls_Manager::SELECT,

				'default' 	=> 's1',

				'options' 	=> [

					's1'  => __( 'Style 1: Icon Left', 'potw' ),

					's2'  => __( 'Style 2: Icon Center', 'potw' ),

					's3'  => __( 'Style 3: Icon Center With Shadow', 'potw' ),

					's4'  => __( 'Style 4: Icon Right', 'potw' ),

				]

			]

		);



		$this->add_control(

			'icon_type',

			[

				'label' => __( 'Icon Type', 'potw' ),

				'type' => Controls_Manager::SELECT,

				'default' => 'font',

				'options' => [

					'font' 	=> __( 'Font Icon', 'potw' ),

					'image' => __( 'Image Icon', 'potw' ),

					'class' => __( 'Custom Icon', 'potw' ),

				]

			]

		);

		$this->add_control(

			'icon_font',

			[

				'label' => __( 'Icon', 'potw' ),

				'type' => Controls_Manager::ICONS,

				'label_block' => true,

				'fa4compatibility' => 'icon',

				'default' => [

					'value' => 'fas fa-star',

					'library' => 'fa-solid',

				],

				'condition' => [

					'icon_type' => 'font',

				]

			]

		);

		$this->add_control(

	       'icon_image',

	        [

	           'label' => esc_html__( 'Photo', 'potw' ),

	           'type'  => Controls_Manager::MEDIA,

				'default' => [

					'url' => get_template_directory_uri().'/images/analysis.png',

			  	],

			  	'condition' => [

					'icon_type' => 'image',

				]

		    ]

	    );

	    $this->add_control(

			'icon_class',

			[

				'label' => __( 'Custom Class', 'potw' ),

				'type' => Controls_Manager::TEXT,

				'default' => __( 'flaticon-world', 'potw' ),

				'condition' => [

					'icon_type' => 'class',

				]

			]

		);



		$this->add_control(

			'title',

			[

				'label' => __( 'Title', 'potw' ),

				'type' => Controls_Manager::TEXT,

				'default' => __( 'Content Marketing', 'potw' ),

				'label_block' => true,

			]

		);



		$this->add_control(

			'des',

			[

				'label' => 'Description',

				'type' => Controls_Manager::TEXTAREA,

				'default' => __( 'You can provide the answers that your potential customers are trying to find, so you can become the industry.', 'potw' ),

			]

		);



		$this->add_control(

			'link',

			[

				'label' => __( 'Link', 'potw' ),

				'type' => Controls_Manager::URL,

				'placeholder' => __( 'https://your-link.com', 'potw' ),

			]

		);



		$this->add_control(

			'btn_text',

			[

				'label' => __( 'Bottom Button', 'potw' ),

				'type' => Controls_Manager::TEXT,

				'placeholder' => __( 'Learn More', 'potw' ),

				'condition' => [

					'box_style' => 's3',

				]

			]

		);



		$this->add_control(

			'btn_style_color',

			[

				'label' => __( 'Style Color', 'potw' ),

				'type' => Controls_Manager::SELECT,

				'default' => 'white',

				'options' => self::get_button_color(),

				'style_transfer' => true,

				'condition' => [

					'box_style' => 's3',

					'btn_text!' => ''

				]

			]

		);



		$this->add_responsive_control(

			'align',

			[

				'label' => __( 'Alignment', 'potw' ),

				'type' => Controls_Manager::CHOOSE,

				'options' => [

					'left'    => [

						'title' => __( 'Left', 'potw' ),

						'icon' => 'eicon-text-align-left',

					],

					'center' => [

						'title' => __( 'Center', 'potw' ),

						'icon' => 'eicon-text-align-center',

					],

					'right' => [

						'title' => __( 'Right', 'potw' ),

						'icon' => 'eicon-text-align-right',

					],

					'justify' => [

						'title' => __( 'Justified', 'potw' ),

						'icon' => 'eicon-text-align-justify',

					],

				],

				// 'prefix_class' => 'potw%s-align-',

				'selectors' => [

					'{{WRAPPER}}' => 'text-align: {{VALUE}};',

				],

				'default' => 'center',

				'condition' => [

					'box_style' => ['s2', 's3'],

				]

			]

		);



		$this->add_control(

			'title_html_tag',

			[

				'label' => __( 'Title HTML Tag', 'potw' ),

				'type' => Controls_Manager::SELECT,

				'default' => 'h5',

				'options' => self::get_potw_heading_html_tag(),

			]

		);



		$this->end_controls_section();



		//Style

		$this->start_controls_section(

			'style_box_section',

			[

				'label' => __( 'Box', 'potw' ),

				'tab'   => Controls_Manager::TAB_STYLE,

				'condition' => [

					'box_style' => ['s3', 's2'],

				]

			]

		);



		$this->add_responsive_control(

			'box_radius',

			[

				'label' => __( 'Border Radius', 'potw' ),

				'type' => Controls_Manager::SLIDER,

				'range' => [

					'px' => [

						'min' => 0,

						'max' => 100,

					],

				],

				'selectors' => [

					'{{WRAPPER}} .icon-box' => 'border-radius: {{SIZE}}{{UNIT}};',

				],

			]

		);

		$this->add_responsive_control(

			'box_padding',

			[

				'label' => __( 'Padding Box', 'potw' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', 'em', '%' ],

				'selectors' => [

					'{{WRAPPER}} .icon-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

				'separator' => 'before',

			]

		);



		//Hover

		$this->start_controls_tabs( 'tabs_box_style' );



		$this->start_controls_tab(

			'tab_box_normal',

			[

				'label' => __( 'Normal', 'potw' ),

				'condition' => [

					'box_style' => ['s3', 's2'],

				]

			]

		);



		$this->add_group_control(

			Group_Control_Box_Shadow::get_type(),

			[

				'name' => 'accs_box_shadow',

				'selector' => '{{WRAPPER}} .s2, {{WRAPPER}} .s3',

				'separator' => 'before',

			]

		);



		$this->add_control(

			'is_gradient',

			[

				'label'   => esc_html__( 'Background Gradient?', 'potw' ),

				'type'    => Controls_Manager::SWITCHER,

				'default' => 'no',

			]

		);

		$this->add_group_control(

			Group_Control_Background::get_type(),

			[

				'name' => 'gradient_color_bg',

				'label' => __( 'Background', 'potw' ),

				'types' => [ 'gradient' ],

				'selector' => '{{WRAPPER}} .s3 .bg-s3',

				'condition' => [

					'is_gradient' => 'yes',

				]

			]

		);



		$this->add_control(

			'heading_bg_top',

			[

				'label' => __( 'Background Top Box', 'potw' ),

				'type' => Controls_Manager::HEADING,

				'separator' => 'before',

				'condition' => [

					'is_gradient!' => 'yes',

				]

			]

		);

		$this->add_group_control(

			Group_Control_Background::get_type(),

			[

				'name' => 'before_bg_color',

				'label' => __( 'Background', 'potw' ),

				'types' => [ 'classic' ],

				'selector' => '{{WRAPPER}} .s3 .bg-before, {{WRAPPER}} .s2:before',

				'condition' => [

					'is_gradient!' => 'yes',

				]

			]

		);

		$this->add_control(

			'heading_bg_bot',

			[

				'label' => __( 'Background Bottom Box', 'potw' ),

				'type' => Controls_Manager::HEADING,

				'separator' => 'before',

				'condition' => [

					'is_gradient!' => 'yes',

				]

			]

		);

		$this->add_group_control(

			Group_Control_Background::get_type(),

			[

				'name' => 'after_bg_color',

				'label' => __( 'Background', 'potw' ),

				'types' => [ 'classic' ],

				'selector' => '{{WRAPPER}} .s3 .bg-after, {{WRAPPER}} .s2:after',

				'condition' => [

					'is_gradient!' => 'yes',

				]

			]

		);



		$this->end_controls_tab();



		$this->start_controls_tab(

			'tab_box_hover',

			[

				'label' => __( 'Hover', 'potw' ),

				'condition' => [

					'box_style' => ['s3', 's2'],

				]

			]

		);



		$this->add_group_control(

			Group_Control_Box_Shadow::get_type(),

			[

				'name' => 'accs_box_hover_shadow',

				'selector' => '{{WRAPPER}} .s2:hover, {{WRAPPER}} .s3:hover',

				'separator' => 'before',

			]

		);

		$this->add_control(

			'is_gradient_hover',

			[

				'label'   => esc_html__( 'Background Gradient?', 'potw' ),

				'type'    => Controls_Manager::SWITCHER,

				'default' => 'yes',

			]

		);

		$this->add_group_control(

			Group_Control_Background::get_type(),

			[

				'name' => 'gradient_bg_hover_color',

				'label' => __( 'Background', 'potw' ),

				'types' => [ 'gradient' ],

				'selector' => '{{WRAPPER}} .s3:hover .bg-s3',

				'condition' => [

					'is_gradient_hover' => 'yes',

				]

			]

		);



		$this->add_control(

			'heading_bg_hover_top',

			[

				'label' => __( 'Background Top Box', 'potw' ),

				'type' => Controls_Manager::HEADING,

				'separator' => 'before',

				'condition' => [

					'is_gradient_hover!' => 'yes',

				]

			]

		);

		$this->add_group_control(

			Group_Control_Background::get_type(),

			[

				'name' => 'before_bg_hover_color',

				'label' => __( 'Background', 'potw' ),

				'types' => [ 'classic' ],

				'selector' => '{{WRAPPER}} .s3:hover .bg-before, {{WRAPPER}} .s2:hover:before',

				'condition' => [

					'is_gradient_hover!' => 'yes',

				]

			]

		);

		$this->add_control(

			'heading_bg_hover_bot',

			[

				'label' => __( 'Background Bottom Box', 'potw' ),

				'type' => Controls_Manager::HEADING,

				'separator' => 'before',

				'condition' => [

					'is_gradient_hover!' => 'yes',

				]

			]

		);

		$this->add_group_control(

			Group_Control_Background::get_type(),

			[

				'name' => 'after_bg_hover_color',

				'label' => __( 'Background', 'potw' ),

				'types' => [ 'classic' ],

				'selector' => '{{WRAPPER}} .s3:hover .bg-after, {{WRAPPER}} .s2:hover:after',

				'condition' => [

					'is_gradient_hover!' => 'yes',

				]

			]

		);



		$this->end_controls_tab();



		$this->end_controls_tabs();



		$this->end_controls_section();

		

		$this->start_controls_section(

			'style_icon_section',

			[

				'label' => __( 'Icon', 'potw' ),

				'tab'   => Controls_Manager::TAB_STYLE,

			]

		);



		$this->add_responsive_control(

			'icon_size',

			[

				'label' => __( 'Size', 'potw' ),

				'type' => Controls_Manager::SLIDER,

				'range' => [

					'px' => [

						'min' => 0,

						'max' => 200,

					],

				],

				'selectors' => [

					'{{WRAPPER}} .icon-main i, {{WRAPPER}} .icon-main span:before' => 'font-size: {{SIZE}}{{UNIT}};',

					'{{WRAPPER}} .icon-main img' => 'max-width : {{SIZE}}{{UNIT}};',

					'{{WRAPPER}} .icon-main svg' => 'width : {{SIZE}}{{UNIT}};',

				],

			]

		);

		$this->add_responsive_control(

			'icon_width',

			[

				'label' => __( 'Width', 'potw' ),

				'type' => Controls_Manager::SLIDER,

				'range' => [

					'px' => [

						'min' => 0,

						'max' => 400,

					],

				],

				'selectors' => [

					'{{WRAPPER}} .icon-main' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',

					'{{WRAPPER}} .icon-main i' => 'line-height: {{SIZE}}{{UNIT}};',

					'{{WRAPPER}} .s1 .content-box' => 'padding-left: {{SIZE}}{{UNIT}};',

					'{{WRAPPER}} .s4 .content-box' => 'padding-right: {{SIZE}}{{UNIT}};',

				],

				'condition' => [

					'box_style' => ['s1', 's4', 's3'],

				]

			]

		);

		$this->add_responsive_control(

			'icon_line_height',

			[

				'label' => __( 'Line Height', 'potw' ),

				'type' => Controls_Manager::SLIDER,

				'range' => [

					'px' => [

						'min' => 0,

						'max' => 200,

					],

				],

				'selectors' => [

					'{{WRAPPER}} .icon-main' => 'line-height: {{SIZE}}{{UNIT}};',					

				],

				'condition' => [

					'box_style' => ['s1', 's4', 's3'],

				]

			]

		);

		$this->add_responsive_control(

			'icon_space',

			[

				'label' => __( 'Spacing', 'potw' ),

				'type' => Controls_Manager::SLIDER,

				'range' => [

					'px' => [

						'min' => 0,

						'max' => 200,

					],

				],

				'selectors' => [

					'{{WRAPPER}} .s2 .icon-main, {{WRAPPER}} .s3 .icon-main' => 'margin-bottom: {{SIZE}}{{UNIT}};',

				],

				'condition' => [

					'box_style' => ['s2', 's3'],

				]

			]

		);



		//Hover

		$this->start_controls_tabs( 'tabs_icon_style' );



		$this->start_controls_tab(

			'tab_icon_normal',

			[

				'label' => __( 'Normal', 'potw' ),

			]

		);



		$this->add_control(

			'icon_color',

			[

				'label' => __( 'Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .icon-main i, {{WRAPPER}} .icon-main span' => 'color: {{VALUE}};',

					'{{WRAPPER}} .icon-main svg' => 'fill: {{VALUE}};',

				],

			]

		);



		$this->add_group_control(

			Group_Control_Background::get_type(),

			[

				'name' => 'icon_bg_color',

				'label' => __( 'Background', 'potw' ),

				'types' => [ 'classic', 'gradient' ],

				'selector' => '{{WRAPPER}} .s1 .icon-main, {{WRAPPER}} .s3 .icon-main, {{WRAPPER}} .s4 .icon-main',

			]

		);



		$this->add_group_control(

			Group_Control_Border::get_type(),

			[

				'name' => 'icon_border',

				'label' => __( 'Border', 'potw' ),

				'selector' => '{{WRAPPER}} .s1 .icon-main, {{WRAPPER}} .s3 .icon-main, {{WRAPPER}} .s4 .icon-main',

			]

		);



		$this->add_group_control(

			Group_Control_Box_Shadow::get_type(),

			[

				'name' => 'icon_box_shadow',

				'selector' => '{{WRAPPER}} .icon-main',

			]

		);



		$this->end_controls_tab();



		$this->start_controls_tab(

			'tab_icon_hover',

			[

				'label' => __( 'Hover', 'potw' ),

			]

		);



		$this->add_control(

			'icon_hover_color',

			[

				'label' => __( 'Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .icon-box:hover .icon-main i, {{WRAPPER}} .icon-box:hover .icon-main span' => 'color: {{VALUE}};',

					'{{WRAPPER}} .icon-box:hover .icon-main svg' => 'fill: {{VALUE}};',

				],

			]

		);



		$this->add_group_control(

			Group_Control_Background::get_type(),

			[

				'name' => 'icon_bg_hover_color',

				'label' => __( 'Background', 'potw' ),

				'types' => [ 'classic', 'gradient' ],

				'selector' => '{{WRAPPER}} .s1:hover .icon-main, {{WRAPPER}} .s3:hover .icon-main, {{WRAPPER}} .s4:hover .icon-main',

			]

		);



		$this->add_control(

			'icon_hover_bdcolor',

			[

				'label' => __( 'Border Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .s1:hover .icon-main, {{WRAPPER}} .s3:hover .icon-main, {{WRAPPER}} .s4:hover .icon-main' => 'border-color: {{VALUE}};',

				],

			]

		);



		$this->add_group_control(

			Group_Control_Box_Shadow::get_type(),

			[

				'name' => 'icon_box_hover_shadow',

				'selector' => '{{WRAPPER}} .s1:hover .icon-main, {{WRAPPER}} .s3:hover .icon-main, {{WRAPPER}} .s4:hover .icon-main',

			]

		);



		$this->end_controls_tab();



		$this->end_controls_tabs();



		$this->end_controls_section();



		$this->start_controls_section(

			'style_content_section',

			[

				'label' => __( 'Content', 'potw' ),

				'tab'   => Controls_Manager::TAB_STYLE,

			]

		);



		$this->add_responsive_control(

			'content_space',

			[

				'label' => __( 'Content Spacing', 'potw' ),

				'type' => Controls_Manager::SLIDER,

				'range' => [

					'px' => [

						'min' => 0,

						'max' => 300,

					],

				],

				'selectors' => [

					'{{WRAPPER}} .s1 .content-box' => 'margin-left: {{SIZE}}{{UNIT}};',

					'{{WRAPPER}} .s4 .content-box' => 'margin-right: {{SIZE}}{{UNIT}};',

				],

				'condition' => [

					'box_style' => ['s1', 's4'],

				]

			]

		);



		//Title

		$this->add_control(

			'heading_title',

			[

				'label' => __( 'Title', 'potw' ),

				'type' => Controls_Manager::HEADING,

			]

		);

		$this->add_responsive_control(

			'title_space',

			[

				'label' => __( 'Spacing', 'potw' ),

				'type' => Controls_Manager::SLIDER,

				'range' => [

					'px' => [

						'min' => 0,

						'max' => 100,

					],

				],

				'selectors' => [

					'{{WRAPPER}} .icon-box .box-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',

				],

			]

		);

		$this->add_control(

			'title_color',

			[

				'label' => __( 'Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .icon-box .box-title, {{WRAPPER}} .icon-box .box-title a' => 'color: {{VALUE}};',

				]

			]

		);

		$this->add_control(

			'bhover_title_color',

			[

				'label' => __( 'Box Hover Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .icon-box:hover .box-title, {{WRAPPER}} .icon-box:hover .box-title a' => 'color: {{VALUE}};',

				]

			]

		);

		$this->add_control(

			'title_hover_color',

			[

				'label' => __( 'Hover Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .icon-box .box-title a:hover' => 'color: {{VALUE}};',

				],

				'condition' => [

					'link[url]!' => '',

					'btn_text'   => '',

				]

			]

		);

		$this->add_group_control(

			Group_Control_Typography::get_type(),

			[

				'name' => 'title_typography',

				'selector' => '{{WRAPPER}} .icon-box .box-title',

			]

		);



		//Description

		$this->add_control(

			'heading_des',

			[

				'label' => __( 'Description', 'potw' ),

				'type' => Controls_Manager::HEADING,

				'separator' => 'before',

			]

		);

		$this->add_responsive_control(

			'des_space',

			[

				'label' => __( 'Spacing', 'potw' ),

				'type' => Controls_Manager::SLIDER,

				'range' => [

					'px' => [

						'min' => 0,

						'max' => 100,

					],

				],

				'selectors' => [

					'{{WRAPPER}} .icon-box p' => 'margin-bottom: {{SIZE}}{{UNIT}};',

				],

			]

		);

		$this->add_control(

			'des_color',

			[

				'label' => __( 'Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .icon-box p' => 'color: {{VALUE}};',

				],

			]

		);

		$this->add_control(

			'bhover_des_color',

			[

				'label' => __( 'Box Hover Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .icon-box:hover p' => 'color: {{VALUE}};',

				]

			]

		);

		$this->add_group_control(

			Group_Control_Typography::get_type(),

			[

				'name' => 'des_typography',

				'selector' => '{{WRAPPER}} .icon-box p',

			]

		);



		$this->end_controls_section();



		$this->start_controls_section(

			'style_button_section',

			[

				'label' => __( 'Button', 'potw' ),

				'tab'   => Controls_Manager::TAB_STYLE,

				'condition' => [

					'box_style' => 's3',

					'btn_text!' => ''

				]

			]

		);



		$this->add_control(

			'button_text_color',

			[

				'label' => __( 'Text Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .octf-btn' => 'color: {{VALUE}};',

				],

			]

		);



		$this->add_control(

			'background_color',

			[

				'label' => __( 'Background Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'selectors' => [

					'{{WRAPPER}} .octf-btn' => 'background-color: {{VALUE}};',

					'{{WRAPPER}} .octf-btn i' => 'color: {{VALUE}};',

				],

			]

		);



		$this->add_control(

			'btn_border_radius',

			[

				'label' => __( 'Border Radius', 'potw' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', '%' ],

				'selectors' => [

					'{{WRAPPER}} .octf-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

			]

		);



		$this->add_group_control(

			Group_Control_Box_Shadow::get_type(),

			[

				'name' => 'button_box_shadow',

				'selector' => '{{WRAPPER}} .octf-btn',

			]

		);



		$this->add_responsive_control(

			'btn_text_padding',

			[

				'label' => __( 'Padding', 'potw' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', 'em', '%' ],

				'selectors' => [

					'{{WRAPPER}} .octf-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

				'separator' => 'before',

			]

		);		



		$this->end_controls_section();		



	}



	protected function render() {

		$settings = $this->get_settings_for_display();



		$title = '';

		if ( ! empty( $settings['link']['url'] ) ) {

			$this->add_render_attribute( 'button', 'href', $settings['link']['url'] );



			if ( $settings['link']['is_external'] ) {

				$this->add_render_attribute( 'button', 'target', '_blank' );

			}



			if ( $settings['link']['nofollow'] ) {

				$this->add_render_attribute( 'button', 'rel', 'nofollow' );

			}



			$this->add_render_attribute( 'iconbox', 'href', $settings['link']['url'] );



			if ( $settings['link']['is_external'] ) {

				$this->add_render_attribute( 'iconbox', 'target', '_blank' );

			}



			if ( $settings['link']['nofollow'] ) {

				$this->add_render_attribute( 'iconbox', 'rel', 'nofollow' );

			}



			$title = '<a '. $this->get_render_attribute_string( 'iconbox' ).'>'. $settings['title'] . '</a>';



		} else {

			$title = $settings['title'];

		}



		$this->add_render_attribute( 'button', 'class', 'octf-btn octf-btn-icon' );

		$this->add_render_attribute( 'button', 'class', 'octf-btn-'.$settings['btn_style_color'] );



		if ( empty( $settings['icon'] ) && ! Icons_Manager::is_migration_allowed() ) {

			// add old default

			$settings['icon'] = 'fa fa-star';

		}



		if ( ! empty( $settings['icon'] ) ) {

			$this->add_render_attribute( 'icon', 'class', $settings['icon'] );

			$this->add_render_attribute( 'icon', 'aria-hidden', 'true' );

		}



		$migrated = isset( $settings['__fa4_migrated']['icon_font'] );

		$is_new = empty( $settings['icon'] ) && Icons_Manager::is_migration_allowed();

		$titletag = $settings['title_html_tag'];

		?>

		<div class="icon-box <?php echo $settings['box_style']; if( $settings['is_gradient'] ) echo ' box-gradient'; if( $settings['is_gradient_hover'] ) echo ' box-hover-gradient'; ?>">

			<div class="bg-s3"></div>

			<div class="bg-before"></div>

			<div class="bg-after"></div>

			<div class="icon-main">

		        <?php if ( $settings['icon_type'] == 'font' ) { ?>

		        	<?php if ( $is_new || $migrated ) :

						Icons_Manager::render_icon( $settings['icon_font'], [ 'aria-hidden' => 'true' ] );

					else : ?>

						<i <?php echo $this->get_render_attribute_string( 'icon' ); ?>></i>

					<?php endif; ?>

		        <?php } ?>

			    

			    <?php if ( $settings['icon_type'] == 'image' ) { echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'icon_image' ); } ?>

		        <?php if ( $settings['icon_type'] == 'class' ) { ?><span class="<?php echo esc_attr( $settings['icon_class'] ); ?>"></span><?php } ?>

	        </div>

	        <div class="content-box">

	            <<?php echo $titletag; ?> class="box-title"><?php echo $title; ?></<?php echo $titletag; ?>>

	            <p><?php echo $settings['des']; ?></p>

	        </div>

	        <?php if ( $settings['btn_text'] != '' ) { ?>

        	<div class="action-box">

        		<a <?php echo $this->get_render_attribute_string( 'button' );?>><?php echo $settings['btn_text']; ?><i class="flaticon-right-arrow-1"></i></a>

        	</div>

	        <?php } ?>	

	    </div>

	    <?php

	}



	

}

// After the Schedule class is defined, I must register the new widget class with Elementor:

Plugin::instance()->widgets_manager->register_widget_type( new POTW_IconBox() );