<?php

namespace Elementor; // Custom widgets must be defined in the Elementor namespace

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)



/**

 * Widget Name: Service Slider

 */

class POTW_Service_Slider extends Widget_Base{



 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.

	public function get_name() {

		return 'iservice_slider';

	}



	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.

	public function get_title() {

		return __( 'POTW Service Slider', 'potw' );

	}



	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.

	public function get_icon() {

		return 'eicon-carousel';

	}



	// The get_categories method, lets you set the category of the widget, return the category name as a string.

	public function get_categories() {

		return [ 'category_potw' ];

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



		$this->start_controls_section(

			'section_services',

			[

				'label' => __( 'Services', 'potw' ),

			]

		);

		$this->add_control(

			'show_title',

			[

				'label' => __( 'Show Title', 'potw' ),

				'type' => Controls_Manager::SWITCHER,

				'label_on' => __( 'Show', 'potw' ),

				'label_off' => __( 'Hide', 'potw' ),

				'return_value' => 'yes',

				'default' => 'no',

			]

		);

		$this->add_control(

			'subtitle',

			[

				'label' => 'Sub Title',

				'type' => Controls_Manager::TEXT,

				'default' => '',

				'placeholder' => __( 'Enter your subtitle', 'potw' ),

				'label_block' => true,

				'show_label' => false,

				'condition' => [

					'show_title' => 'yes',

				]

			]

		);

		$this->add_control(

			'title',

			[

				'label' => 'Title',

				'type' => Controls_Manager::TEXTAREA,

				'default' => '',

				'placeholder' => __( 'Enter your title', 'potw' ),

				'show_label' => false,

				'label_block' => true,

				'condition' => [

					'show_title' => 'yes',

				]

			]

		);

		$this->add_control(

			'title_link',

			[

				'label' => __( 'Link To Title', 'potw' ),

				'type' => Controls_Manager::URL,

				'placeholder' => __( 'https://', 'potw' ),

				'condition' => [

					'show_title' => 'yes',

				]

			]

		);

		$this->add_control(

			'switch_stroke',

			[

				'label' => __( 'Use Text Stroke?', 'potw' ),

				'type' => Controls_Manager::SWITCHER,

				'label_on' => __( 'On', 'potw' ),

				'label_off' => __( 'Off', 'potw' ),

				'return_value' => 'yes',

				'default' => 'no',

				'condition' => [

					'show_title' => 'yes',

				]

			]

		);

		$this->add_control(

			'text_stroke',

			[

				'label' => __( 'Text Stroke', 'potw' ),

				'type' => Controls_Manager::TEXT,

				'default' => '',

				'placeholder' => __( 'Type your text here', 'potw' ),

				'condition' => [

					'switch_stroke' => 'yes',

					'show_title' => 'yes',

				]

			]

		);

		$repeater = new Repeater();		

		$repeater->add_control(

			'image',

			[

				'label' => __( 'Icon', 'potw' ),

				'type' => Controls_Manager::MEDIA,

				'url' => get_template_directory_uri().'/images/testi1.png',

			]

		);

		$repeater->add_control(

			'title',

			[

				'label' => __( 'Title', 'potw' ),

				'type' => Controls_Manager::TEXT,

				'default' => 'Awesome Results',

			]

		);

		$repeater->add_control(

			'content',

			[

				'label' => __( 'Content', 'potw' ),

				'type' => Controls_Manager::TEXTAREA,

				'rows' => '10',

				'default' => 'Create and manage top-performing social campaigns and start.',

			]

		);

		$repeater->add_control(

			'number',

			[

				'label' => __( 'Number', 'potw' ),

				'type' => Controls_Manager::TEXT,

				'default' => '01',

			]

		);

		$repeater->add_control(

			'number_color',

			[

				'label' => __( 'Number Hover Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'selectors' => [

					'{{WRAPPER}} {{CURRENT_ITEM}}.service-slide-inner:hover .service_carousel-number' => 'color: {{VALUE}};',

					'{{WRAPPER}} {{CURRENT_ITEM}}.service-slide-inner:hover .service_carousel-number:before' => 'background-color: {{VALUE}};',

				],

			]

		);



		$this->add_control(

		    'service_slider',

		    [

		        'label'       => '',

		        'type'        => Controls_Manager::REPEATER,

		        'show_label'  => false,

		        'default'     => [

		            [		             	

		                'image'  => [

							'url' => get_template_directory_uri().'/images/testi1.png',

						],

						'title'	  => 'Awesome Results',

						'content' => __( 'Create and manage top-performing social campaigns and start.', 'potw' ),

						'number'	  => '01'

		 

		            ],

		            [

		                'image'  => [

							'url' => get_template_directory_uri().'/images/testi1.png',

						],

						'title'	  => 'All Sizes Business',

						'content' => __( 'Create and manage top-performing social campaigns and start.', 'potw' ),

						'number'	  => '02'

		 

		            ],

		            [

		                'image'  => [

							'url' => get_template_directory_uri().'/images/testi1.png',

						],

						'title'	  => 'Keep You in the Loop',

						'content' => __( 'Create and manage top-performing social campaigns and start.', 'potw' ),

						'number'	  => '03'

		 

		            ]

		            

		        ],

		        'fields'      => $repeater->get_controls(),

		        'title_field' => '{{{title}}}',

		    ]

		);

		$this->add_control(

			'tshow',

			[

				'label' => __( 'Slides to Show', 'potw' ),

				'type' => Controls_Manager::SELECT,

				'default' => '4',

				'options' => [

					'1' => __( '1', 'potw' ),

					'2' => __( '2', 'potw' ),

					'3' => __( '3', 'potw' ),

					'4' => __( '4', 'potw' ),

					'5' => __( '5', 'potw' ),

				]

			]

		);

		$this->add_control(

			'scroll',

			[

				'label' => __( 'Slides to Scroll', 'potw' ),

				'type' => Controls_Manager::SELECT,

				'default' => '3',

				'options' => [

					'1' => __( '1', 'potw' ),

					'2' => __( '2', 'potw' ),

					'3' => __( '3', 'potw' ),

					'4' => __( '4', 'potw' ),

					'5' => __( '5', 'potw' ),

				]

			]

		);

		$this->add_control(

			'tarrow',

			[

				'label' => __( 'Nav Slider', 'potw' ),

				'type' => Controls_Manager::SELECT,

				'default' => 'true',

				'options' => [

					'true' => __( 'Yes', 'potw' ),

					'false' => __( 'No', 'potw' ),

				]

			]

		);

		$this->add_control(

			'tdots',

			[

				'label' => __( 'Dots Slider', 'potw' ),

				'type' => Controls_Manager::SELECT,

				'default' => 'false',

				'options' => [

					'true' => __( 'Yes', 'potw' ),

					'false' => __( 'No', 'potw' ),

				]

			]

		);

		$this->add_control(

			'autoplay',

			[

				'label' 	=> __( 'Autoplay', 'potw' ),

				'type' 		=> Controls_Manager::SELECT,

				'default' 	=> 'false',

				'options' 	=> [

					'true' 	=> __( 'Yes', 'potw' ),

					'false' => __( 'No', 'potw' ),

				]

			]

		);

		$this->add_control(

			'autoplaySpeed',

			[

				'label' 	=> __( 'Autoplay Speed', 'potw' ),

				'type' 		=> Controls_Manager::NUMBER,

				'min' 		=> 1000,

				'max' 		=> 10000,

				'step' 		=> 100,

				'default' 	=> 6000,

				'condition' => [

					'autoplay' => 'true',

				]

			]

		);

		$this->add_responsive_control(

			'w_gaps',

			[

				'label' => __( 'Gap Width', 'potw' ),

				'type' => Controls_Manager::SLIDER,

				'range' => [

					'px' => [

						'min' => 0,

						'max' => 100,

					],

				],

				'selectors' => [

					'{{WRAPPER}} .service-slide-inner' => 'margin: 0 {{SIZE}}{{UNIT}};',

				]

			]

		);

		$this->add_responsive_control(

			'align_tcontent',

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

				//'prefix_class' => 'elementor%s-align-',

				'selectors' => [

					'{{WRAPPER}} .service-slide' => 'text-align: {{VALUE}};',

				],

				'default' => '',

			]

		);



		$this->end_controls_section();



		// Styling.

		$this->start_controls_section(

			'style_tcontent',

			[

				'label' => __( 'Content Box', 'potw' ),

				'tab' => Controls_Manager::TAB_STYLE,

			]

		);



		$this->start_controls_tabs( 'tabs_box_style' );



		$this->start_controls_tab(

			'tab_box_normal',

			[

				'label' => __( 'Normal', 'potw' ),

			]

		);



		$this->add_control(

			'content_bg',

			[

				'label' => __( 'Background Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .service_carousel-wrap .service-slide-inner' => 'background-color: {{VALUE}};',

				],

			]

		);		



		$this->add_control(

			'content_color',

			[

				'label' => __( 'Text Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .service_carousel-wrap .service-slide-inner .service_carousel-text' => 'color: {{VALUE}};',

				],

			]

		);



		$this->end_controls_tab();



		$this->start_controls_tab(

			'tab_box_hover',

			[

				'label' => __( 'Hover', 'potw' ),

			]

		);



		$this->add_control(

			'content_bg_hover',

			[

				'label' => __( 'Background Color Hover', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .service_carousel-wrap .service-slide-inner:hover' => 'background: {{VALUE}};',

				],

			]

		);



		$this->add_control(

			'content_color_hover',

			[

				'label' => __( 'Text Color Hover', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .service_carousel-wrap .service-slide-inner:hover .service_carousel-text' => 'color: {{VALUE}};',

				],

			]

		);



		$this->end_controls_tab();



		$this->end_controls_tabs();		



		$this->add_group_control(

			Group_Control_Typography::get_type(),

			[

				'name' => 'content_typography',

				'selector' => '{{WRAPPER}} .service_carousel-wrap .service-slide-inner .service_carousel-text',

			]

		);



		$this->add_responsive_control(

			'content_padding',

			[

				'label' => __( 'Padding', 'potw' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', '%' ],

				'selectors' => [

					'{{WRAPPER}} .service_carousel-wrap .service-slide-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

			]

		);

		$this->add_control(

			'content_radius',

			[

				'label' => __( 'Border Radius', 'potw' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', '%' ],

				'selectors' => [

					'{{WRAPPER}} .service_carousel-wrap .service-slide-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

			]

		);

		$this->add_group_control(

			Group_Control_Box_Shadow::get_type(),

			[

				'name' => 'content_box_shadow',

				'selector' => '{{WRAPPER}} .service_carousel-wrap .service-slide-inner',

			]

		);



		$this->end_controls_section();



		$this->start_controls_section(

			'service_style_section',

			[

				'label' => __( 'Heading', 'potw' ),

				'tab'   => Controls_Manager::TAB_STYLE,

				'condition' => [

					'show_title' => 'yes',

				]

			]

		);

		$this->add_responsive_control(

			'text_align',

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

					]

				],

				// 'prefix_class' => 'potw%s-align-',

				'selectors' => [

					'{{WRAPPER}}' => 'text-align: {{VALUE}};',

				],

				'default' => 'left',

			]

		);



		//Title

		$this->add_control(

			'heading_title',

			[

				'label' => __( 'Title', 'potw' ),

				'type' => Controls_Manager::HEADING,

				'separator' => 'before',

			]

		);

		$this->add_control(

			'title_color',

			[

				'label' => __( 'Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .ot-heading .main-heading' => 'color: {{VALUE}};',

				]

			]

		);

		$this->add_group_control(

			Group_Control_Typography::get_type(),

			[

				'name' => 'title_typography',

				'selector' => '{{WRAPPER}} .ot-heading .main-heading',

			]

		);

		$this->add_responsive_control(

			'title_bottom_space',

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

					'{{WRAPPER}} .ot-heading .main-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',

				],

			]

		);

		$this->add_control(

			'title_html_tag',

			[

				'label' => __( 'Title HTML Tag', 'potw' ),

				'type' => Controls_Manager::SELECT,

				'default' => 'h2',

				'options' => self::get_potw_heading_html_tag(),

			]

		);		



		//Sub Title

		$this->add_control(

			'heading_subtitle',

			[

				'label' => __( 'Sub Title', 'potw' ),

				'type' => Controls_Manager::HEADING,

				'separator' => 'before',

			]

		);		

		$this->add_control(

			'stitle_color',

			[

				'label' => __( 'Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .ot-heading .sub-heading span' => 'color: {{VALUE}};',

					'{{WRAPPER}} .ot-heading .sub-heading:before, {{WRAPPER}} .ot-heading .sub-heading:after' => 'background: {{VALUE}};',

				]

			]

		);

		$this->add_group_control(

			Group_Control_Typography::get_type(),

			[

				'name' => 'stitle_typography',

				'selector' => '{{WRAPPER}} .ot-heading .sub-heading',

			]

		);

		$this->add_responsive_control(

			'stitle_bottom_space',

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

					'{{WRAPPER}} .ot-heading .sub-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',

				],

			]

		);

		$this->add_control(

			'subtitle_html_tag',

			[

				'label' => __( 'Subtitle HTML Tag', 'archi' ),

				'type' => Controls_Manager::SELECT,

				'default' => 'h6',

				'options' => self::get_potw_heading_html_tag(),

			]

		);

		$this->end_controls_section();	



		$this->start_controls_section(

			'stroke_section',

			[

				'label' => __( 'Text Stroke', 'potw' ),

				'tab' => Controls_Manager::TAB_STYLE,

				'condition' => [

					'switch_stroke' => 'yes',

				]

			]

		);

		$this->add_control(

			'text_stroke_color',

			[

				'label' => __( 'Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .ot-heading .heading__text_stroke' => 'color: {{VALUE}};',

					'{{WRAPPER}} .ot-heading .heading__text_stroke' => '-webkit-text-stroke-color: {{VALUE}};',

				]

			]

		);

		$this->add_responsive_control(

			'text_stroke_position',

			[

				'label' => __( 'Position', 'potw' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', '%', 'em' ],

				'selectors' => [

					'{{WRAPPER}} .heading__text_stroke' => 'top: {{TOP}}{{UNIT}};right: {{RIGHT}}{{UNIT}};bottom: {{BOTTOM}}{{UNIT}};left: {{LEFT}}{{UNIT}};',

				],

			]

		);

		$this->add_control(

			'margin',

			[

				'label' => __( 'Margin', 'potw' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', '%', 'em' ],

				'selectors' => [

					'{{WRAPPER}} .heading__text_stroke' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

			]

		);

		$this->add_group_control(

			Group_Control_Typography::get_type(),

			[

				'name' => 'text_stroke_typography',

				'selector' => '{{WRAPPER}} .ot-heading .heading__text_stroke',

			]

		);

		$this->end_controls_section();



		// Slider Box.

		$this->start_controls_section(

			'style_slider_box',

			[

				'label' => __( 'Slider Box', 'potw' ),

				'tab' => Controls_Manager::TAB_STYLE,

			]

		);

		$this->add_control(

			'slider_boxes',

			[

				'label' => __( 'Boxes', 'potw' ),

				'type' => Controls_Manager::SWITCHER,

				'label_on' => __( 'On', 'potw' ),

				'label_off' => __( 'Off', 'potw' ),

				'return_value' => 'yes',

				'default' => 'yes',

			]

		);

		$this->add_control(

			'carousel_outside',

			[

				'label' => __( 'Out Side', 'potw' ),

				'type' => Controls_Manager::SWITCHER,

				'label_on' => __( 'On', 'potw' ),

				'label_off' => __( 'Off', 'potw' ),

				'return_value' => 'yes',

				'default' => 'yes',

				'condition' => [

					'slider_boxes' => 'yes',

				]

			]

		);

		$this->add_responsive_control(

			'margin_slider_box',

			[

				'label' => __( 'Margin', 'potw' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', '%', 'em' ],

				'selectors' => [

					'{{WRAPPER}} .ot-service-slider' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

			]

		);



		$this->end_controls_section();



		// Image.

		$this->start_controls_section(

			'style_image',

			[

				'label' => __( 'Icon', 'potw' ),

				'tab' => Controls_Manager::TAB_STYLE,

			]

		);



		$this->add_control(

			'image_spacing',

			[

				'label' => __( 'Spacing', 'potw' ),

				'type' => Controls_Manager::SLIDER,

				'size_units' => [ 'px' ],

				'range' => [

					'px' => [

						'min' => 0,

						'max' => 200,

					],

				],

				'selectors' => [

					'{{WRAPPER}} .service-slide-inner .service_carousel-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',

				],

			]

		);



		$this->add_control(

			'image_size',

			[

				'label' => __( 'Size', 'potw' ),

				'type' => Controls_Manager::SLIDER,

				'size_units' => [ 'px' ],

				'range' => [

					'px' => [

						'min' => 20,

						'max' => 200,

					],

				],

				'selectors' => [

					'{{WRAPPER}} .service-slide-inner .service_carousel-icon img' => 'width: {{SIZE}}{{UNIT}};',

				],

			]

		);



		$this->end_controls_section();



		// Title.

		$this->start_controls_section(

			'style_tname',

			[

				'label' => __( 'Title', 'potw' ),

				'tab' => Controls_Manager::TAB_STYLE,

			]

		);



		$this->add_control(

			'service_title_color',

			[

				'label' => __( 'Title Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .service-slide-inner .service_carousel-title' => 'color: {{VALUE}};',

				],

			]

		);



		$this->add_control(

			'service_title_color_hover',

			[

				'label' => __( 'Title Color Hover', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .service-slide-inner:hover .service_carousel-title' => 'color: {{VALUE}};',

				],

			]

		);



		$this->add_group_control(

			Group_Control_Typography::get_type(),

			[

				'name' => 'service_title_typography',

				'selector' => '{{WRAPPER}} .service-slide-inner .service_carousel-title',

			]

		);



		$this->add_control(

			'service_title_spacing',

			[

				'label' => __( 'Spacing', 'potw' ),

				'type' => Controls_Manager::SLIDER,

				'size_units' => [ 'px' ],

				'range' => [

					'px' => [

						'min' => 0,

						'max' => 200,

					],

				],

				'selectors' => [

					'{{WRAPPER}} .service-slide-inner .service_carousel-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',

				],

			]

		);



		$this->end_controls_section();



		// Number.

		$this->start_controls_section(

			'style_number',

			[

				'label' => __( 'Number', 'potw' ),

				'tab' => Controls_Manager::TAB_STYLE,

			]

		);



		$this->add_control(

			'number_color',

			[

				'label' => __( 'Text Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .service-slide-inner .service_carousel-number' => 'color: {{VALUE}};',

				],

			]

		);



		$this->add_control(

			'number_color_hover',

			[

				'label' => __( 'Text Color Hover', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .service-slide-inner:hover .service_carousel-number' => 'color: {{VALUE}};',

				],

			]

		);



		$this->add_group_control(

			Group_Control_Typography::get_type(),

			[

				'name' => 'number_typography',

				'selector' => '{{WRAPPER}} .service-slide-inner .service_carousel-number',

			]

		);		



		$this->add_control(

			'number_line',

			[

				'label' => __( 'Line', 'potw' ),

				'type' => Controls_Manager::HEADING,

				'separator' => 'before',

			]

		);



		$this->add_responsive_control(

			'line_width',

			[

				'label' => __( 'Width', 'potw' ),

				'type' => Controls_Manager::SLIDER,

				'range' => [

					'px' => [

						'min' => 1,

						'max' => 200,

					],

				],

				'selectors' => [

					'{{WRAPPER}} .service_carousel-number:before' => 'width: {{SIZE}}{{UNIT}};',

					'{{WRAPPER}} .service_carousel-number' => 'padding-left: calc({{SIZE}}{{UNIT}} + 10px);',

				]

			]

		);



		$this->add_control(

			'line_color',

			[

				'label' => __( 'Line Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .service-slide-inner .service_carousel-number:before' => 'background: {{VALUE}};',

				],

			]

		);



		$this->add_control(

			'line_color_hover',

			[

				'label' => __( 'Line Color Hover', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .service-slide-inner:hover .service_carousel-number:before' => 'background: {{VALUE}};',

				],

			]

		);



		$this->end_controls_section();



		// Dots.

		$this->start_controls_section(

			'style_dots',

			[

				'label' => __( 'Dots', 'potw' ),

				'tab' => Controls_Manager::TAB_STYLE,

				'condition' => [

					'tdots' => 'true'

				]

			]

		);



		$this->add_responsive_control(

			'spacing_dots',

			[

				'label' => __( 'Spacing', 'potw' ),

				'type' => Controls_Manager::SLIDER,

				'size_units' => [ 'px' ],

				'range' => [

					'px' => [

						'min' => -200,

						'max' => 200,

					]

				],

				'default' => [

					'unit' => 'px',

					'size' => -50,

				],

				'selectors' => [

					'{{WRAPPER}} .slick-dots' => 'bottom: {{SIZE}}{{UNIT}};',

				],

			]

		);

		$this->add_control(

			'dots_bgcolor',

			[

				'label' => __( 'Background', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .slick-dots li button:before' => 'color: {{VALUE}};',

				]

			]

		);

		$this->add_control(

			'dots_active_bgcolor',

			[

				'label' => __( 'Background Active', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .slick-dots li.slick-active button:before' => 'color: {{VALUE}};',

				]

			]

		);



		$this->end_controls_section();



		// Arrow.

		$this->start_controls_section(

			'style_nav',

			[

				'label' => __( 'Arrow', 'potw' ),

				'tab' => Controls_Manager::TAB_STYLE,

				'condition' => [

					'tarrow' => 'true',

				]

			]

		);		

		$this->add_control(

			'size_nav',

			[

				'label' => __( 'Size', 'potw' ),

				'type' => Controls_Manager::SLIDER,

				'size_units' => [ 'px' ],

				'range' => [

					'px' => [

						'min' => 40,

						'max' => 100,

					],

				],

				'selectors' => [					

					'{{WRAPPER}} .slick-arrow' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',

					'{{WRAPPER}} .service-slider-nav-1' => 'height: {{SIZE}}{{UNIT}};',

				]

			]

		);

		$this->add_control(

			'spacing_nav',

			[

				'label' => __( 'Spacing', 'potw' ),

				'type' => Controls_Manager::SLIDER,

				'size_units' => [ 'px', '%' ],

				'range' => [

					'px' => [

						'min' => -200,

						'max' => 200,

					],

					'%' => [

						'min' => -100,

						'max' => 200,

					],

				],

				'selectors' => [					

					'{{WRAPPER}} .service-slider-nav-2 .prev-nav' => 'left: {{SIZE}}{{UNIT}};',

					'{{WRAPPER}} .service-slider-nav-2 .next-nav' => 'right: {{SIZE}}{{UNIT}};',

				]

			]

		);

		$this->start_controls_tabs( 'tabs_style_arrow' );

		$this->start_controls_tab(

			'tab_arrow_normal',

			[

				'label' => __( 'Normal', 'potw' ),

			]

		);

		$this->add_control(

			'arrow_color',

			[

				'label' => __( 'Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .slick-arrow' => 'color: {{VALUE}};',

				]

			]

		);



		$this->add_control(

			'arrow_bgcolor',

			[

				'label' => __( 'Background', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .slick-arrow' => 'background: {{VALUE}};',

				],

			]

		);	

		$this->add_group_control(

			Group_Control_Box_Shadow::get_type(),

			[

				'name' => 'arrow_shadow',

				'label' => __( 'Box Shadow', 'potw' ),

				'selector' => '{{WRAPPER}} .slick-arrow',

			]

		);



		$this->end_controls_tab();



		$this->start_controls_tab(

			'tab_arrow_hover',

			[

				'label' => __( 'Hover', 'potw' ),

			]

		);

		$this->add_control(

			'arrow_hcolor',

			[

				'label' => __( 'Color Hover', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .slick-arrow:hover' => 'color: {{VALUE}};',

				]

			]

		);

		$this->add_control(

			'arrow_hbgcolor',

			[

				'label' => __( 'Background Hover', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .slick-arrow:hover' => 'background: {{VALUE}};',

				]

			]

		);

		$this->add_group_control(

			Group_Control_Box_Shadow::get_type(),

			[

				'name' => 'arrow_hshadow',

				'label' => __( 'Box Shadow Hover', 'potw' ),

				'selector' => '{{WRAPPER}} .slick-arrow:hover',

			]

		);



		$this->end_controls_tab();



		$this->end_controls_tabs();	



		$this->end_controls_section();

	}



	protected function render() {

		$settings = $this->get_settings_for_display();



		if ( ! empty( $settings['title_link']['url'] ) ) {

			$this->add_render_attribute( 'link', 'href', $settings['title_link']['url'] );



			if ( $settings['title_link']['is_external'] ) {

				$this->add_render_attribute( 'link', 'target', '_blank' );

			}



			if ( $settings['title_link']['nofollow'] ) {

				$this->add_render_attribute( 'link', 'rel', 'nofollow' );

			}

		}



		$css_classes = array();

		$css_classes[] = $settings['text_align'] . '-align'; 

		if ( $settings['switch_stroke'] === 'yes' ) { $css_classes[] = 'wrap__text_stroke'; }



		$titletag = $settings['title_html_tag'];

		$subtitletag = $settings['subtitle_html_tag'];

	?>



		<div class="ot-service_carousel <?php if ( 'yes' === $settings['carousel_outside'] ) { echo 'service__carousel-outside'; } ?>">



			<?php if ( 'yes' === $settings['show_title'] ) { ?>

				<div class="container">

					<div class="row">

						<div class="col-md-12">

							<div class="heading-service-carousel potw-row-flex content-bottom">

								<div class="ot-heading <?php echo implode( ' ', $css_classes ); ?>">

									<?php if ( $settings['switch_stroke'] === 'yes' && !empty( $settings['text_stroke'] ) ) { ?>

										<div class="heading__text_stroke"><?php echo $settings['text_stroke']; ?></div>

									<?php } ?>

									<?php if ( ! empty( $settings['subtitle'] ) ) { ?>

							            <<?php echo $subtitletag; ?> class="sub-heading"><span><?php echo $settings['subtitle']; ?></span></<?php echo $subtitletag; ?>>

							        <?php } ?> 



							        <?php if ( !empty( $settings['title'] ) ) { ?>

							        	<<?php echo $titletag; ?> class="main-heading"><?php if ( ! empty( $settings['title_link']['url'] ) ) { echo '<a ' .$this->get_render_attribute_string( 'link' ). '>' . $settings['title'] . '</a>'; } else {  echo $settings['title']; } ?></<?php echo $titletag; ?>>

							        <?php } ?>

							    </div>

								<?php if ( 'true' === $settings['tarrow'] ) {echo '<div class="service-slider-nav-1"></div>';} ?>

							</div>

						</div>

					</div>	

				</div>

			<?php } ?>

			<div class="<?php if ( 'yes' === $settings['slider_boxes'] ) { echo 'container'; } else { echo 'container-fluid'; } ?>"> 

				<div class="service_carousel-wrap">		

					<div class="ot-service-slider" <?php if ( is_rtl() ) { echo'dir="rtl"'; } ?> data-show="<?php echo $settings['tshow']; ?>" data-scroll="<?php echo $settings['scroll']; ?>" data-dots="<?php echo $settings['tdots']; ?>" data-arrow="<?php echo $settings['tarrow']; ?>" data-autoplay="<?php echo $settings['autoplay']; ?>" data-autoplaySpeed="<?php echo $settings['autoplaySpeed']; ?>">

						<?php if ( ! empty( $settings['service_slider'] ) ) : foreach ( $settings['service_slider'] as $service ) : ?>

						<div class="service-slide">

							<div class="<?php echo 'elementor-repeater-item-' . $service['_id']; ?> service-slide-inner">

								<div class="service_carousel-icon">

									<?php if( $service['image']['url'] ) { ?>

						        		<img src="<?php echo $service['image']['url']; ?>" alt="<?php echo $service['title']; ?>">

						        	<?php } ?>

								</div>

						        <div class="service_carousel-content">

					        		<?php if ( $service['title'] ) { ?><h5 class="service_carousel-title"><?php echo $service['title']; ?></h5><?php } ?>			        		

						        	<?php if ( $service['content'] ) { ?><div class="service_carousel-text"><?php echo $service['content']; ?></div><?php } ?>

						        	<?php if ( $service['number'] ) { ?><span class="service_carousel-number font-second"><?php echo $service['number']; ?></span><?php } ?>

						        </div>	

					        </div>			        

						</div>

						<?php endforeach; endif; ?>

					</div>	

					<?php if ( 'true' === $settings['tarrow'] && 'yes' !== $settings['show_title'] ) {echo '<div class="service-slider-nav-2"></div>';} ?>

				</div>	

			</div>				

		</div>		



	    <?php

	}



	

}

// After the Schedule class is defined, I must register the new widget class with Elementor:

Plugin::instance()->widgets_manager->register_widget_type( new POTW_Service_Slider() );