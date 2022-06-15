<?php

namespace Elementor; // Custom widgets must be defined in the Elementor namespace

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)



/**

 * Widget Name: Contact Info

 */

class POTW_CountDown extends Widget_Base{



 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.

	public function get_name() {

		return 'icountdown';

	}



	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.

	public function get_title() {

		return __( 'POTW CountDown', 'potw' );

	}



	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.

	public function get_icon() {

		return 'eicon-countdown';

	}



	// The get_categories method, lets you set the category of the widget, return the category name as a string.

	public function get_categories() {

		return [ 'category_potw' ];

	}



	protected function _register_controls() {



		$this->start_controls_section(

			'content_section',

			[

				'label' => __( 'CountDown', 'potw' ),

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

					]

				],

				// 'prefix_class' => 'potw%s-align-',

				'selectors' => [

					'{{WRAPPER}}' => 'text-align: {{VALUE}};',

				],

			]

		);



		$this->add_control(

			'date',

			[

				'label' => 'Date - Time',

				'type' => Controls_Manager::DATE_TIME,

				'default' => __( '2020-10-22 12:00', 'potw' ),

			]

		);



		$this->add_control(

			'zone',

			[

				'label' => __( 'UTC Timezone Offset', 'potw' ),

				'type' => Controls_Manager::NUMBER,

				'default' => __( '0', 'potw' ),

			]

		);



		$this->start_controls_tabs( 'tabs_titles' );



		$this->start_controls_tab(

			'tab_title_normal',

			[

				'label' => __( 'One', 'potw' ),

			]

		);

		$this->add_control(

			'day',

			[

				'label' => __( 'Day', 'potw' ),

				'type' => Controls_Manager::TEXT,

				'default' => __( 'Day', 'potw' ),

			]

		);

		$this->add_control(

			'hour',

			[

				'label' => __( 'Hour', 'potw' ),

				'type' => Controls_Manager::TEXT,

				'default' => __( 'Hour', 'potw' ),

			]

		);

		$this->add_control(

			'min',

			[

				'label' => __( 'Minute', 'potw' ),

				'type' => Controls_Manager::TEXT,

				'default' => __( 'Minute', 'potw' ),

			]

		);

		$this->add_control(

			'second',

			[

				'label' => __( 'Second', 'potw' ),

				'type' => Controls_Manager::TEXT,

				'default' => __( 'Second', 'potw' ),

			]

		);



		$this->end_controls_tab();



		$this->start_controls_tab(

			'tab_title_active',

			[

				'label' => __( 'Multi', 'potw' ),

			]

		);

		$this->add_control(

			'days',

			[

				'label' => __( 'Days', 'potw' ),

				'type' => Controls_Manager::TEXT,

				'default' => __( 'Days', 'potw' ),

			]

		);

		$this->add_control(

			'hours',

			[

				'label' => __( 'Hours', 'potw' ),

				'type' => Controls_Manager::TEXT,

				'default' => __( 'Hours', 'potw' ),

			]

		);

		$this->add_control(

			'mins',

			[

				'label' => __( 'Minutes', 'potw' ),

				'type' => Controls_Manager::TEXT,

				'default' => __( 'Minutes', 'potw' ),

			]

		);

		$this->add_control(

			'seconds',

			[

				'label' => __( 'Seconds', 'potw' ),

				'type' => Controls_Manager::TEXT,

				'default' => __( 'Seconds', 'potw' ),

			]

		);



		$this->end_controls_tab();



		$this->end_controls_tabs();



		$this->end_controls_section();



		$this->start_controls_section(

			'style_content_section',

			[

				'label' => __( 'Style', 'potw' ),

				'tab'   => Controls_Manager::TAB_STYLE,

			]

		);



		//Number

		$this->add_control(

			'heading_number',

			[

				'label' => __( 'Number', 'potw' ),

				'type' => Controls_Manager::HEADING,

				'separator' => 'before',

			]

		);

		$this->add_control(

			'number_color',

			[

				'label' => __( 'Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .ot-countdown li span' => 'color: {{VALUE}};',

				]

			]

		);

		$this->add_group_control(

			Group_Control_Typography::get_type(),

			[

				'name' => 'number_typography',

				'selector' => '{{WRAPPER}} .ot-countdown li span, {{WRAPPER}} .ot-countdown li.seperator',

			]

		);

		$this->add_responsive_control(

			'number_space',

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

					'{{WRAPPER}} .ot-countdown li span' => 'margin-bottom: {{SIZE}}{{UNIT}};',

				],

			]

		);



		//Title

		$this->add_control(

			'heading_titles',

			[

				'label' => __( 'Texts', 'potw' ),

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

					'{{WRAPPER}} .ot-countdown p' => 'color: {{VALUE}};',

				]

			]

		);

		$this->add_group_control(

			Group_Control_Typography::get_type(),

			[

				'name' => 'title_typography',

				'selector' => '{{WRAPPER}} .ot-countdown p',

			]

		);



		//Seperator

		$this->add_control(

			'heading_sepe',

			[

				'label' => __( 'Seperator', 'potw' ),

				'type' => Controls_Manager::HEADING,

				'separator' => 'before',

			]

		);

		$this->add_control(

			'sepe_color',

			[

				'label' => __( 'Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .ot-countdown li.seperator' => 'color: {{VALUE}};',

				]

			]

		);



		$this->end_controls_section();



	}



	protected function render() {

		$settings = $this->get_settings_for_display();

		$datex = str_replace('-','/',$settings['date']);

		

		/* Use for demo only */				

		$next_date = date('m/d/Y', strtotime(' +60 days'));			

		?>

			

		<ul class="ot-countdown unstyle" data-zone="<?php echo $settings['zone']; ?>" data-date="<?php echo $datex; ?>" data-day="<?php echo $settings['day']; ?>" data-days="<?php echo $settings['days']; ?>" data-hour="<?php echo $settings['hour']; ?>" data-hours="<?php echo $settings['hours']; ?>" data-min="<?php echo $settings['min']; ?>" data-mins="<?php echo $settings['mins']; ?>" data-second="<?php echo $settings['second']; ?>" data-seconds="<?php echo $settings['seconds']; ?>">

			<li><span class="days">00</span><p class="days_text">Days</p></li>

			<li class="seperator">:</li>

			<li><span class="hours">00</span><p class="hours_text">Hours</p></li>

			<li class="seperator">:</li>

			<li><span class="minutes">00</span><p class="minutes_text">Minutes</p></li>

			<li class="seperator">:</li>

			<li><span class="seconds">00</span><p class="seconds_text">Seconds</p></li>			

		</ul>

	    <?php

	}



	

}

// After the Schedule class is defined, I must register the new widget class with Elementor:

Plugin::instance()->widgets_manager->register_widget_type( new POTW_CountDown() );