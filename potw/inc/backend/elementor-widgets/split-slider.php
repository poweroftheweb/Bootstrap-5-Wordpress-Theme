<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**

 * Widget Name: Section Heading 

 */

class SK_Split_Slider_Widget extends Widget_Base {

    public function get_name() {
        return 'split-slider';
    }

    public function get_title() {
        return  esc_html__( 'Split Slider', 'sliderkits' );
    }

    public function get_icon() {
        return 'eicon-column';
    }

    public function get_categories() {
        return array( 'sliderkits' );
    }

    /**
     * Enqueue when widget is on page.
     */
    public function get_style_depends() {
        return array( 'slick', 'slick-theme', 'sliderkits', 'split-slider' );
    }

    protected function _register_controls() {

      $this->start_controls_section(
          'section_sk_split_slider_slides',
          [
              'label' => esc_html__( 'Add Slides', 'sliderkits' ),
              'tab'   => Controls_Manager::TAB_CONTENT,
          ]
      );

      $repeater = new \Elementor\Repeater();

      $repeater->add_control(
        'title', [
          'label' => esc_html__( 'Title', 'sliderkits' ),
          'type' => \Elementor\Controls_Manager::TEXT,
          'default' => esc_html__( 'Title' , 'sliderkits' ),
          'label_block' => true,
        ]
      );

      $repeater->add_control(
        'subtitle', [
          'label' => esc_html__( 'Subtitle', 'sliderkits' ),
          'type' => \Elementor\Controls_Manager::TEXT,
          'default' => esc_html__( 'Easy to create the slider in Elementor Editor' , 'sliderkits' ),
          'label_block' => true,
        ]
      );

      $repeater->add_control(
        'paragraph', [
          'label' => esc_html__( 'Paragraph', 'sliderkits' ),
          'type' => \Elementor\Controls_Manager::TEXTAREA,
          'label_block' => true,
        ]
      );

      $repeater->add_control(
        'button_text', [
          'label' => esc_html__( 'Button Text', 'sliderkits' ),
          'type' => Controls_Manager::TEXT,
          'show_label' => true,
        ]
      );

      $repeater->add_control(
        'button_link', [
            'label' => esc_html__( 'Button Link', 'sliderkits' ),
            'type' => Controls_Manager::URL,
            'show_label' => true,
        ]
      );

      $repeater->add_control(
        'picture', [
          'label' => esc_html__( 'Slide Picture', 'sliderkits' ),
          'type' => Controls_Manager::MEDIA,
          'show_label' => false,
          'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
          ]
        ]
      );

      $this->add_control(
        'slides',
        [
          'label' => esc_html__( 'Add Slides', 'sliderkits' ),
          'type' => \Elementor\Controls_Manager::REPEATER,
          'fields' => $repeater->get_controls(),
          'default' => [
            [
               'title' => 'Hello, SliderKits',
               'subtitle' => 'Easy to create the slider in Elementor Editor',
               'paragraph' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
               'button_text' => 'Learn More'
            ],
            [
               'title' => 'Thanks For Using SliderKits',
               'subtitle' => '',
               'paragraph' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
               'button_text' => 'Learn More'
            ]
          ],
          'title_field' => '{{{ title }}}',
        ]
      );

      $this->end_controls_section();


      $this->start_controls_section(
          'section_sk_split_slider_settings',
          [
              'label' => esc_html__( 'Slider Setting', 'sliderkits' ),
              'tab'   => Controls_Manager::TAB_CONTENT,
          ]
      );

      $this->add_control(
          'autoplay',
          [
              'label' => esc_html__( 'Autoplay', 'sliderkits' ),
              'type' => Controls_Manager::SWITCHER,
              'default' => 'false',
              'label_on' => esc_html__( 'Yes', 'sliderkits' ),
              'label_off' => esc_html__( 'No', 'sliderkits' ),
              'return_value' => 'true',
          ]
      );

      $this->add_control(
          'autoplaySpeed',
          [
              'label' => esc_html__( 'Autoplay Speed', 'sliderkits' ),
              'type' => Controls_Manager::NUMBER,
              'default' => '3000',
              'condition' => [
                  'autoplay' => 'true',
              ]
          ]
      );

      $this->add_control(
          'pauseOnHover',
          [
              'label' => esc_html__( 'Pause On Hover', 'sliderkits' ),
              'type' => Controls_Manager::SWITCHER,
              'default' => 'true',
              'label_on' => esc_html__( 'Yes', 'sliderkits' ),
              'label_off' => esc_html__( 'No', 'sliderkits' ),
              'return_value' => 'true',
              'condition' => [
                  'autoplay' => 'true',
              ]
          ]
      );

      $this->add_control(
          'dots',
          [
              'label' => esc_html__( 'Pagination Dots', 'sliderkits' ),
              'type' => Controls_Manager::SWITCHER,
              'default' => 'true',
              'label_on' => esc_html__( 'Yes', 'sliderkits' ),
              'label_off' => esc_html__( 'No', 'sliderkits' ),
              'return_value' => 'true'
          ]
      );

      $this->add_control(
          'infinite',
          [
              'label' => esc_html__( 'Infinite Loop', 'sliderkits' ),
              'type' => Controls_Manager::SWITCHER,
              'default' => 'false',
              'label_on' => esc_html__( 'Yes', 'sliderkits' ),
              'label_off' => esc_html__( 'No', 'sliderkits' ),
              'return_value' => 'true'
          ]
      );

      $this->add_control(
          'swipe',
          [
              'label' => esc_html__( 'Touch Swipe', 'sliderkits' ),
              'type' => Controls_Manager::SWITCHER,
              'default' => 'true',
              'label_on' => esc_html__( 'Yes', 'sliderkits' ),
              'label_off' => esc_html__( 'No', 'sliderkits' ),
              'return_value' => 'true'
          ]
      );

      $this->add_control(
          'touchMove',
          [
              'label' => esc_html__( 'Slide moving with touch', 'sliderkits' ),
              'type' => Controls_Manager::SWITCHER,
              'default' => 'true',
              'label_on' => esc_html__( 'Yes', 'sliderkits' ),
              'label_off' => esc_html__( 'No', 'sliderkits' ),
              'return_value' => 'true'
          ]
      );

      $this->add_control(
          'speed',
          [
              'label' => esc_html__( 'Transition Speed', 'sliderkits' ),
              'type' => Controls_Manager::NUMBER,
              'default' => '300'
          ]
      );

      $this->end_controls_section();

      $this->start_controls_section(
          'section_sk_split_slider_content_style',
          [
              'label' => esc_html__( 'Content', 'sliderkits' ),
              'tab'   => Controls_Manager::TAB_STYLE,
          ]
      );

      $this->add_control(
          'title_color',
          [
              'type' => Controls_Manager::COLOR,
              'label' => esc_html__( 'Title Color', 'sliderkits' ),
              'default' => '',
              'selectors' => [
                  '{{WRAPPER}} .sk-slick-item .sk-heading' => 'color: {{VALUE}}',
              ],
          ]
      );

      $this->add_group_control(
          Group_Control_Typography::get_type(),
          [
              'name' => 'title_typography',
              'label' => esc_html__( 'Title Typography', 'sliderkits' ),
              'scheme' => Typography::TYPOGRAPHY_2,
              'selector' => '{{WRAPPER}} .sk-slick-item .sk-heading',
          ]
      );

      $this->add_control(
          'subtitle_color',
          [
              'type' => Controls_Manager::COLOR,
              'label' => esc_html__( 'Subtitle Color', 'sliderkits' ),
              'selectors' => [
                  '{{WRAPPER}} .sk-slick-item .sk-subheading' => 'color: {{VALUE}}',
              ],
          ]
      );

      $this->add_group_control(
          Group_Control_Typography::get_type(),
          [
              'name' => 'subtitle_typography',
              'label' => esc_html__( 'Subtitle Typography', 'sliderkits' ),
              'scheme' => Typography::TYPOGRAPHY_2,
              'selector' => '{{WRAPPER}} .sk-slick-item .sk-subheading',
          ]
      );

      $this->add_control(
          'paragraph_color',
          [
              'type' => Controls_Manager::COLOR,
              'label' => esc_html__( 'Paragraph Color', 'sliderkits' ),
              'selectors' => [
                  '{{WRAPPER}} .sk-slick-item .sk-content, {{WRAPPER}} .sk-slick-item .sk-content p' => 'color: {{VALUE}}',
              ],
          ]
      );

      $this->add_group_control(
          Group_Control_Typography::get_type(),
          [
              'name' => 'paragraph_typography',
              'label' => esc_html__( 'Paragraph Typography', 'sliderkits' ),
              'scheme' => Typography::TYPOGRAPHY_2,
              'selector' => '{{WRAPPER}} .sk-slick-item .sk-content, {{WRAPPER}} .sk-slick-item .sk-content p',
          ]
      );

      $this->end_controls_section();

      $this->start_controls_section(
          'section_sk_split_slider_button',
          [
              'label' => esc_html__('Button', 'sliderkits'),
              'tab'   => Controls_Manager::TAB_STYLE,
          ]
      );

      $this->add_group_control(
          Group_Control_Typography::get_type(),
          [
              'name' => 'button_typography',
              'scheme' => Typography::TYPOGRAPHY_2,
              'selector' => '{{WRAPPER}} .elementor-button.sk-button',
          ]
      );

      $this->start_controls_tabs( 'tabs_button_style' );

      $this->start_controls_tab(
          'tab_button_normal',
          [
              'label' => esc_html__( 'Normal', 'sliderkits' ),
          ]
      );

      $this->add_control(
          'button_text_color',
          [
              'label' => esc_html__( 'Text Color', 'sliderkits' ),
              'type' => Controls_Manager::COLOR,
              'default' => '',
              'selectors' => [
                  '{{WRAPPER}} .elementor-button.sk-button' => 'fill: {{VALUE}}; color: {{VALUE}};',
              ],
          ]
      );

      $this->add_control(
          'button_background_color',
          [
              'label' => esc_html__( 'Background Color', 'sliderkits' ),
              'type' => Controls_Manager::COLOR,
              'selectors' => [
                  '{{WRAPPER}} .elementor-button.sk-button' => 'background-color: {{VALUE}};',
              ],
          ]
      );

      $this->add_group_control(
          Group_Control_Border::get_type(),
          [
              'name' => 'button_border',
              'selector' => '{{WRAPPER}} .elementor-button.sk-button',
              'separator' => 'before',
          ]
      );

      $this->end_controls_tab();

      $this->start_controls_tab(
          'tab_button_hover',
          [
              'label' => esc_html__( 'Hover', 'sliderkits' ),
          ]
      );

      $this->add_control(
          'button_hover_color',
          [
              'label' => esc_html__( 'Text Color', 'sliderkits' ),
              'type' => Controls_Manager::COLOR,
              'selectors' => [
                  '{{WRAPPER}} .elementor-button.sk-button:hover' => 'color: {{VALUE}};'
              ],
          ]
      );

      $this->add_control(
          'button_background_hover_color',
          [
              'label' => esc_html__( 'Background Color', 'sliderkits' ),
              'type' => Controls_Manager::COLOR,
              'selectors' => [
                  '{{WRAPPER}} .elementor-button.sk-button:hover' => 'background-color: {{VALUE}};',
              ],
          ]
      );

      $this->add_control(
          'button_hover_border_color',
          [
              'label' => esc_html__( 'Border Color', 'sliderkits' ),
              'type' => Controls_Manager::COLOR,
              'condition' => [
                  'border_border!' => '',
              ],
              'selectors' => [
                  '{{WRAPPER}} .elementor-button.sk-button:hover' => 'border-color: {{VALUE}};',
              ],
          ]
      );

      $this->add_control(
          'button_hover_animation',
          [
              'label' => esc_html__( 'Hover Animation', 'sliderkits' ),
              'type' => Controls_Manager::HOVER_ANIMATION,
          ]
      );

      $this->end_controls_tab();

      $this->end_controls_tabs();

      $this->add_control(
          'button_border_radius',
          [
              'label' => esc_html__( 'Border Radius', 'sliderkits' ),
              'type' => Controls_Manager::DIMENSIONS,
              'size_units' => [ 'px', '%' ],
              'selectors' => [
                  '{{WRAPPER}} .elementor-button.sk-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
              ],
          ]
      );

      $this->add_group_control(
          Group_Control_Box_Shadow::get_type(),
          [
              'name' => 'button_box_shadow',
              'selector' => '{{WRAPPER}} .elementor-button.sk-button',
          ]
      );

      $this->add_responsive_control(
          'button_text_padding',
          [
              'label' => esc_html__( 'Padding', 'sliderkits' ),
              'type' => Controls_Manager::DIMENSIONS,
              'size_units' => [ 'px', 'em', '%' ],
              'selectors' => [
                  '{{WRAPPER}} .elementor-button.sk-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
              ],
              'separator' => 'before',
          ]
      );

      $this->end_controls_section();

      $this->start_controls_section(
          'section_sk_split_slider_dots',
          [
              'label' => esc_html__('Dots', 'sliderkits'),
              'tab'   => Controls_Manager::TAB_STYLE,
          ]
      );

      $this->add_control(
          'dots_color',
          [
              'type' => Controls_Manager::COLOR,
              'label' => esc_html__( 'Dots Color', 'sliderkits' ),
              'default' => '',
              'selectors' => [
                  '{{WRAPPER}} .slick-dots li button:before' => 'color: {{VALUE}}',
              ],
              'condition' => [
                  'dots' => 'true',
              ]
          ]
      );

      $this->add_control(
          'dots_active_color',
          [
              'type' => Controls_Manager::COLOR,
              'label' => esc_html__( 'Active Color', 'sliderkits' ),
              'default' => '',
              'selectors' => [
                  '{{WRAPPER}} .slick-dots li.slick-active button:before' => 'color: {{VALUE}}',
              ],
              'condition' => [
                  'dots' => 'true',
              ]
          ]
      );

      $this->add_responsive_control(
        'dots_size',
        [
          'label' => esc_html__( 'Dots Size', 'sliderkits' ),
          'type' => Controls_Manager::SLIDER,
          'size_units' => [ 'px' ],
          'range' => [
            'px' => [
              'min' => 5,
              'max' => 20,
              'step' => 1,
            ]
          ],
          'default' => [
            'unit' => 'px',
            'size' => 12,
          ],
          'condition' => [
              'dots' => 'true',
          ],
          'selectors' => [
            '{{WRAPPER}} .slick-dots li button:before' => 'font-size: {{SIZE}}{{UNIT}};',
          ],
        ]
      );

      $this->add_control(
        'dots_disabled',
        [
          'label' => esc_html__( 'Dots Disabled',  ),
          'show_label' => false,
          'type' => \Elementor\Controls_Manager::RAW_HTML,
          'raw' => esc_html__( 'The dots are disabled.', 'sliderkits' ),
          'conditions' => [
              'relation' => 'and',
              'terms' => [
                  [
                      'name' => 'dots',
                      'operator' => '!==',
                      'value' => 'true'
                  ]
              ]
          ]
        ]
      );
      $this->end_controls_section();
    }

    protected function render() {
       SK_Elementor_Widgets::widget_template( self::get_name(),$this->get_settings() );
       if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
           echo '<script>window.SliderKits.init();</script>';
       }
    }

}
