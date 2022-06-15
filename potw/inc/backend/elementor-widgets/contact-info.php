<?php

namespace Elementor; // Custom widgets must be defined in the Elementor namespace

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)



/**

 * Widget Name: Contact Info

 */

class POTW_Contact_Info extends Widget_Base{



 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.

	public function get_name() {

		return 'icontact_info';

	}



	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.

	public function get_title() {

		return __( 'POTW Contact Info', 'potw' );

	}



	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.

	public function get_icon() {

		return 'eicon-info-box';

	}



	// The get_categories method, lets you set the category of the widget, return the category name as a string.

	public function get_categories() {

		return [ 'category_potw' ];

	}



	protected function _register_controls() {



		//Content Service box

		$this->start_controls_section(

			'content_section',

			[

				'label' => __( 'Content', 'potw' ),

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

				'default' => __( 'Our Address:', 'potw' ),

			]

		);



		$this->add_control(

			'des',

			[

				'label' => 'Infomation',

				'type' => Controls_Manager::TEXTAREA,

				'default' => __( '411 University St, Seattle, USA', 'potw' ),

			]

		);

		$this->add_control(

			'light',

			[

				'label' => __( 'Text Light', 'potw' ),

				'type' => Controls_Manager::SWITCHER,

				'label_on' => __( 'Yes', 'potw' ),

				'label_off' => __( 'No', 'potw' ),

				'return_value' => 'yes',

				'default' => '',

			]

		);		



		$this->add_control(

			'box_style',

			[

				'label' 	=> __( 'Box Style', 'potw' ),

				'type'  	=> Controls_Manager::SELECT,

				'default' 	=> 's1',

				'options' 	=> [

					's1'  => __( 'Icon Left', 'potw' ),

					's2'  => __( 'Icon Center', 'potw' ),

				]

			]

		);



		$this->end_controls_section();



		$this->start_controls_section(

			'style_content_section',

			[

				'label' => __( 'Style', 'potw' ),

				'tab'   => Controls_Manager::TAB_STYLE,

			]

		);



		//Icon

		$this->add_control(

			'heading_icon',

			[

				'label' => __( 'Icon', 'potw' ),

				'type' => Controls_Manager::HEADING,

				'separator' => 'before',

			]

		);

		$this->add_control(

			'icon_color',

			[

				'label' => __( 'Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .contact-info i' => 'color: {{VALUE}};',

					'{{WRAPPER}} .contact-info svg' => 'fill: {{VALUE}};',

				]

			]

		);

		$this->add_responsive_control(

			'icon_size',

			[

				'label' => __( 'Size', 'potw' ),

				'type' => Controls_Manager::SLIDER,

				'range' => [

					'px' => [

						'min' => 6,

						'max' => 200,

					],

				],

				'default' => [

					'unit' => 'px',

					'size' => 30,

				],

				'selectors' => [

					'{{WRAPPER}} .contact-info i:before' => 'font-size: {{SIZE}}{{UNIT}};',

					'{{WRAPPER}} .contact-info img, {{WRAPPER}} .contact-info svg' => 'width: {{SIZE}}{{UNIT}};',

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

					'{{WRAPPER}} .contact-info .info-text' => 'padding-left: {{SIZE}}{{UNIT}};',

				],

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

					'{{WRAPPER}} .contact-info h6' => 'margin-bottom: {{SIZE}}{{UNIT}};',

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

					'{{WRAPPER}} .contact-info h6' => 'color: {{VALUE}};',

				]

			]

		);

		$this->add_group_control(

			Group_Control_Typography::get_type(),

			[

				'name' => 'title_typography',

				'selector' => '{{WRAPPER}} .contact-info h6',

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

					'{{WRAPPER}} .contact-info p' => 'color: {{VALUE}};',

				],

			]

		);

		$this->add_group_control(

			Group_Control_Typography::get_type(),

			[

				'name' => 'des_typography',

				'selector' => '{{WRAPPER}} .contact-info p',

			]

		);



		$this->end_controls_section();



	}



	protected function render() {

		$settings = $this->get_settings_for_display();

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

		?>

			<?php if( $settings['box_style'] === 's2' ) {  ?>

				<div class="contact-info box-style2 <?php if( $settings['light'] === 'yes' ) { echo 'text-light'; } ?>">

					<div class="box-icon">

						<?php if( $settings['icon_type'] == 'font' ) { ?>

							<?php if ( $is_new || $migrated ) :

								Icons_Manager::render_icon( $settings['icon_font'], [ 'aria-hidden' => 'true' ] );

							else : ?>

								<i <?php echo $this->get_render_attribute_string( 'icon' ); ?>></i>

							<?php endif; ?>

						<?php } ?>



					    <?php if( $settings['icon_type'] == 'image' ) { echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'icon_image' ); } ?>

				        <?php if( $settings['icon_type'] == 'class' ) { ?><i class="<?php echo $settings['icon_class']; ?>"></i><?php } ?>

					</div>

		        	<p><?php echo $settings['des']; ?></p>

		        	<h6><?php echo $settings['title']; ?></h6>			        				        

			    </div>

		    <?php }else { ?>

		    	<div class="contact-info <?php if( $settings['light'] === 'yes' ) { echo 'text-light'; } ?>">

		    		<?php if( $settings['icon_type'] == 'font' ) { ?>

		    			<?php if ( $is_new || $migrated ) :

							Icons_Manager::render_icon( $settings['icon_font'], [ 'aria-hidden' => 'true' ] );

						else : ?>

							<i <?php echo $this->get_render_attribute_string( 'icon' ); ?>></i>

						<?php endif; ?>

					<?php } ?>



				    <?php if( $settings['icon_type'] == 'image' ) { echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'icon_image' ); } ?>

			        <?php if( $settings['icon_type'] == 'class' ) { ?><i class="<?php echo $settings['icon_class']; ?>"></i><?php } ?>

			        <div class="info-text">

			        	<h6><?php echo $settings['title']; ?></h6>

			        	<p><?php echo $settings['des']; ?></p>

			        </div>

			    </div>

		    <?php } ?>

	    <?php

	}



	

}

// After the Schedule class is defined, I must register the new widget class with Elementor:

Plugin::instance()->widgets_manager->register_widget_type( new POTW_Contact_Info() );