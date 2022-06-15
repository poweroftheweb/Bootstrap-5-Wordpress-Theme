<?php

namespace Elementor; // Custom widgets must be defined in the Elementor namespace

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)



/**

 * Widget Name: Icon Box

 */

class POTW_Service_Box2 extends Widget_Base{



 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.

	public function get_name() {

		return 'iservice_box2';

	}



	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.

	public function get_title() {

		return __( 'POTW Service Box 2', 'potw' );

	}



	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.

	public function get_icon() {

		return 'eicon-number-field';

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



		//Content Service box

		$this->start_controls_section(

			'content_section',

			[

				'label' => __( 'Service Box', 'potw' ),

			]

		);



		$this->add_control(

			'title',

			[

				'label' => __( 'Title', 'potw' ),

				'type' => Controls_Manager::TEXT,

				'default' => __( 'Content Marketing', 'potw' ),

				'label_block' => true,

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

				'label' => __( 'Button', 'potw' ),

				'type' => Controls_Manager::TEXT,

				'default' => __( 'Start Now', 'potw' ),

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

					'{{WRAPPER}} .service-box-2, {{WRAPPER}} .service-box-2 .overlay' => 'border-radius: {{SIZE}}{{UNIT}};',

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

					'{{WRAPPER}} .service-box-2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					'{{WRAPPER}} .service-box-2 .octf-btn' => 'margin-left: -{{LEFT}}{{UNIT}};',

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

			]

		);



		$this->add_group_control(

			Group_Control_Background::get_type(),

			[

				'name' => 'box_bg_color',

				'label' => __( 'Background', 'potw' ),

				'types' => [ 'classic', 'gradient' ],

				'selector' => '{{WRAPPER}} .service-box-2',

			]

		);

		$this->add_group_control(

			Group_Control_Box_Shadow::get_type(),

			[

				'name' => 'accs_box_shadow',

				'selector' => '{{WRAPPER}} .service-box-2',

				'separator' => 'before',

			]

		);



		$this->end_controls_tab();



		$this->start_controls_tab(

			'tab_box_hover',

			[

				'label' => __( 'Hover', 'potw' ),

			]

		);



		$this->add_group_control(

			Group_Control_Background::get_type(),

			[

				'name' => 'box_bg_hover_color',

				'label' => __( 'Background', 'potw' ),

				'types' => [ 'classic', 'gradient' ],

				'selector' => '{{WRAPPER}} .service-box-2:hover',

			]

		);

		$this->add_group_control(

			Group_Control_Box_Shadow::get_type(),

			[

				'name' => 'accs_box_hover_shadow',

				'selector' => '{{WRAPPER}} .service-box-2:hover',

				'separator' => 'before',

			]

		);

		$this->add_control(

			'hover_animation',

			[

				'label' => __( 'Hover Animation', 'potw' ),

				'type' => Controls_Manager::HOVER_ANIMATION,

				'selector' => '{{WRAPPER}} .service-box-2:hover',

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



		//Title

		$this->add_control(

			'heading_title',

			[

				'label' => __( 'Title', 'potw' ),

				'type' => Controls_Manager::HEADING,

				'separator' => 'before',

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

					'{{WRAPPER}} .service-box-2 .service-box-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',

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

					'{{WRAPPER}} .service-box-2 .service-box-title' => 'color: {{VALUE}};',

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

					'{{WRAPPER}} .service-box-2:hover .service-box-title' => 'color: {{VALUE}};',

				]

			]

		);

		$this->add_group_control(

			Group_Control_Typography::get_type(),

			[

				'name' => 'title_typography',

				'selector' => '{{WRAPPER}} .service-box-2 .service-box-title',

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

		$this->add_control(

			'des_color',

			[

				'label' => __( 'Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .service-box-2 p' => 'color: {{VALUE}};',

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

					'{{WRAPPER}} .service-box-2:hover p' => 'color: {{VALUE}};',

				]

			]

		);

		$this->add_group_control(

			Group_Control_Typography::get_type(),

			[

				'name' => 'des_typography',

				'selector' => '{{WRAPPER}} .service-box-2 p',

			]

		);



		//Button

		$this->add_control(

			'heading_btn',

			[

				'label' => __( 'Button', 'potw' ),

				'type' => Controls_Manager::HEADING,

				'separator' => 'before',

			]

		);		

		

		$this->add_control(

			'btn_color',

			[

				'label' => __( 'Text Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .service-box-2 .octf-btn' => 'color: {{VALUE}};',

					'{{WRAPPER}} .octf-btn i' => 'background: {{VALUE}};',

				],

			]

		);



		$this->add_control(

			'btn_bg_color',

			[

				'label' => __( 'Background Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .service-box-2 .octf-btn' => 'background: {{VALUE}};',

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

				'name' => 'btn_box_shadow',

				'label' => __( 'Box Shadow', 'potw' ),

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



		if ( ! empty( $settings['link']['url'] ) ) {

			$this->add_render_attribute( 'button', 'href', $settings['link']['url'] );



			if ( $settings['link']['is_external'] ) {

				$this->add_render_attribute( 'button', 'target', '_blank' );

			}



			if ( $settings['link']['nofollow'] ) {

				$this->add_render_attribute( 'button', 'rel', 'nofollow' );

			}

		}



		$this->add_render_attribute( 'button', 'class', 'octf-btn octf-btn-secondary octf-btn-icon' );

		$titletag = $settings['title_html_tag'];

		?>



		

		<div class="service-box-2 elementor-animation-<?php echo $settings['hover_animation']; ?>">

	        <div class="content-box">

	            <<?php echo $titletag; ?> class="service-box-title"><?php echo $settings['title']; ?></<?php echo $titletag; ?>>

	            <p><?php echo $settings['des']; ?></p>

	        </div>

			<a <?php echo $this->get_render_attribute_string( 'button' ); ?>><?php echo esc_html( $settings['btn_text'] ); ?> <i class="flaticon-right-arrow-1"></i></a>

	    </div>



	    <?php

	}



	

}

// After the Schedule class is defined, I must register the new widget class with Elementor:

Plugin::instance()->widgets_manager->register_widget_type( new POTW_Service_Box2() );