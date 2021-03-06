<?php

namespace OXI_FLIP_BOX_PLUGINS\Admin;

/**
 * Description of Style1
 *
 * @author biplo
 */
use OXI_FLIP_BOX_PLUGINS\Page\Admin_Render;
use OXI_FLIP_BOX_PLUGINS\Classes\Controls as Controls;

class Style25 extends Admin_Render {

  public function register_controls() {

        $this->start_section_header(
                'shortcode-addons-start-tabs', [
            'options' => [
                'general-settings' => esc_html__('General Settings', OXI_FLIP_BOX_TEXTDOMAIN),
                'front' => esc_html__('Front', OXI_FLIP_BOX_TEXTDOMAIN),
                'backend' => esc_html__('Backend', OXI_FLIP_BOX_TEXTDOMAIN),
            ]
                ]
        );
        $this->start_section_tabs(
                'shortcode-addons-start-tabs', [
            'condition' => [
                'shortcode-addons-start-tabs' => 'general-settings'
            ]
                ]
        );


        $this->start_section_devider();
        $this->start_controls_section(
                'shortcode-addons', [
            'label' => esc_html__('General Settings', OXI_FLIP_BOX_TEXTDOMAIN),
            'showing' => TRUE,
                ]
        );
        $this->add_group_control(
                'sa-flip-boxes-col', $this->style, [
            'type' => Controls::COLUMN,
            'loader' => TRUE,
            'selector' => [
                '{{WRAPPER}} .oxi-flip-box-col-style-25' => '',
            ]
                ]
        );
        
        $this->add_control(
                'sa-ac-flip_boxes_flip_direction', $this->style, [
            'label' => __('Flip Direction', OXI_FLIP_BOX_TEXTDOMAIN),
            'type' => Controls::SELECT,
            'loader' => TRUE,
            'separator' => TRUE,
            'default' => 'oxi-addons-flip-box-flip-top-to-bottom',
            'options' => [
                'oxi-addons-flip-box-flip-top-to-bottom' => __('Top To Bottom', OXI_FLIP_BOX_TEXTDOMAIN),
                'oxi-addons-flip-box-flip-bottom-to-top' => __('Bottom To Top', OXI_FLIP_BOX_TEXTDOMAIN),
                'oxi-addons-flip-box-flip-left-to-right' => __('Left To Right', OXI_FLIP_BOX_TEXTDOMAIN),
                'oxi-addons-flip-box-flip-right-to-left' => __('Right To Left', OXI_FLIP_BOX_TEXTDOMAIN),
            ],
                ]
        );
        $this->add_control(
                'sa-ac-flip_boxes_flip_effects', $this->style, [
            'label' => __('Flip Effects', OXI_FLIP_BOX_TEXTDOMAIN),
            'type' => Controls::SELECT,
            'loader' => TRUE,
            'default' => 'easing_easeInOutExpo',
            'options' => [
                'easing_easeInOutExpo' => __('EaseOutBack', OXI_FLIP_BOX_TEXTDOMAIN),
                'easing_easeInOutCirc' => __('EaseInOutExpo', OXI_FLIP_BOX_TEXTDOMAIN),
                'easing_easeOutBack' => __('EaseInOutCirc', OXI_FLIP_BOX_TEXTDOMAIN),
            ],
                ]
        );
        $this->add_control(
                'sa-flip-boxes-flip_time', $this->style, [
            'label' => __('Flipping Time', OXI_FLIP_BOX_TEXTDOMAIN),
            'type' => Controls::SLIDER,
            'default' => [
                'unit' => 'px',
                'size' => 0.5,
            ],
            'range' => [
                'px' => [
                    'min' => 0.1,
                    'max' => 10,
                    'step' => 0.1,
                ],
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-addons-flip-box-style-25 *' => 'transition: all {{SIZE}}s ease-in-out !important;',
            ],
                ]
        );
        $this->add_group_control(
                'sa-flip-boxes-animation', $this->style, [
            'type' => Controls::ANIMATION,
            'separator' => TRUE,
            'selector' => [
                '{{WRAPPER}} .oxi-flip-box-col-style-25' => '',
            ]
                ]
        );

        $this->end_controls_section();

        $this->end_section_devider();
        $this->start_section_devider();

        $this->start_controls_section(
                'shortcode-addons', [
            'label' => esc_html__('General Style', OXI_FLIP_BOX_TEXTDOMAIN),
            'showing' => TRUE,
                ]
        );
        $this->add_responsive_control(
                'sa-flip-boxes-width', $this->style, [
            'label' => __('Width', OXI_FLIP_BOX_TEXTDOMAIN),
            'type' => Controls::SLIDER,
            'default' => [
                'unit' => 'px',
                'size' => 280,
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1500,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
                'em' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 0.1,
                ],
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-addons-flip-box-style-25' => 'max-width:{{SIZE}}{{UNIT}};',
            ],
                ]
        );
        $this->add_responsive_control(
                'sa-flip-boxes-height', $this->style, [
            'label' => __('Height', OXI_FLIP_BOX_TEXTDOMAIN),
            'type' => Controls::SLIDER,
            'default' => [
                'unit' => 'px',
                'size' => 280,
            ],
             'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1500,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
                'em' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 0.1,
                ],
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-addons-flip-box-style-25 .oxi-addons-flip-boxes-body:after ' => 'padding-bottom:{{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa-flip-boxes-border-radius', $this->style, [
            'label' => __('Border Radius', OXI_FLIP_BOX_TEXTDOMAIN),
            'type' => Controls::DIMENSIONS,
            'default' => [
                'unit' => 'px',
                'size' => '',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 500,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
                'em' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => .1,
                ],
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-addons-flip-box-style-25 .oxi-addons-flip-box-front-section-box' => 'border-radius:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                '{{WRAPPER}} .oxi-addons-flip-box-style-25 .oxi-addons-flip-box-front-section' => 'border-radius:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                '{{WRAPPER}} .oxi-addons-flip-box-style-25 .oxi-addons-flip-box-front-img .oxi-image' => 'border-radius:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                '{{WRAPPER}} .oxi-addons-flip-box-style-25 .oxi-addons-flip-box-back-section-box' => 'border-radius:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                '{{WRAPPER}} .oxi-addons-flip-box-style-25 .oxi-addons-flip-box-back-section' => 'border-radius:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_responsive_control(
                'sa-flip-boxes-margin', $this->style, [
            'label' => __('Margin', OXI_FLIP_BOX_TEXTDOMAIN),
            'type' => Controls::DIMENSIONS,
            'default' => [
                'unit' => 'px',
                'size' => '',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 500,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
                'em' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => .1,
                ],
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-flip-box-col-style-25' => 'padding:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->start_controls_tabs(
                'shortcode-addons-start-tabs', [
            'options' => [
                'normal' => esc_html__('Normal', OXI_FLIP_BOX_TEXTDOMAIN),
                'hover' => esc_html__('Hover', OXI_FLIP_BOX_TEXTDOMAIN),
            ]
                ]
        );

        $this->start_controls_tab();
        $this->add_group_control(
                'sa-flip-boxes-boxshadow', $this->style, [
            'type' => Controls::BOXSHADOW,
            'selector' => [
                '{{WRAPPER}} .oxi-addons-flip-box-front-section-box' => '',
                
            ]
                ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab();
        $this->add_group_control(
                'sa-flip-boxes-hover-boxshadow', $this->style, [
            'type' => Controls::BOXSHADOW,
            'selector' => [
               '{{WRAPPER}} .oxi-addons-flip-box-back-section-box' => '',
            ]
                ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();



        $this->end_controls_section();

        $this->end_section_devider();


        $this->end_section_tabs();
        $this->start_section_tabs(
                'shortcode-addons-start-tabs', [
            'condition' => [
                'shortcode-addons-start-tabs' => 'front'
            ]
                ]
        );
        $this->start_section_devider();
        $this->start_controls_section(
                'shortcode-addons', [
            'label' => esc_html__('Content Settings', OXI_FLIP_BOX_TEXTDOMAIN),
            'showing' => TRUE,
                ]
        );

        $this->add_group_control(
                'sa-flip-box-front-background', $this->style, [
            'type' => Controls::BACKGROUND,
            'selector' => [
                '{{WRAPPER}} .oxi-addons-flip-box-style-25 .oxi-addons-flip-box-front-section-box' => '',
            ]
                ]
        );
       
        $this->add_group_control(
                'sa-flip-box-front-border', $this->style, [
            'type' => Controls::BORDER,
            'selector' => [
                '{{WRAPPER}} .oxi-addons-flip-box-style-25 .oxi-addons-flip-box-front-section' => '',
            ]
                ]
        );

        
        $this->add_responsive_control(
                'sa-ib-content-font-box-padding', $this->style, [
            'label' => __('Padding', OXI_FLIP_BOX_TEXTDOMAIN),
            'type' => Controls::DIMENSIONS,
            'default' => [
                'unit' => 'px',
                'size' => '',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 500,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
                'em' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => .1,
                ],
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-addons-flip-box-style-25 .oxi-addons-flip-box-front-section' => 'padding:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ]
                ]
        );
         $this->add_responsive_control(
                'sa-ib-content-font-box-margin', $this->style, [
            'label' => __('Margin', OXI_FLIP_BOX_TEXTDOMAIN),
            'type' => Controls::DIMENSIONS,
            'default' => [
                'unit' => 'px',
                'size' => 0,
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 500,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
                'em' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => .1,
                ],
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-addons-flip-box-style-25 .oxi-addons-flip-box-front-section-box' => 'padding:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ]
                ]
        );
        $this->end_controls_section();
        $this->end_section_devider();

        $this->end_section_tabs();


        $this->start_section_tabs(
                'shortcode-addons-start-tabs', [
            'condition' => [
                'shortcode-addons-start-tabs' => 'backend'
            ]
                ]
        );
        $this->start_section_devider();
        $this->start_controls_section(
                'shortcode-addons', [
            'label' => esc_html__('Content Settings', OXI_FLIP_BOX_TEXTDOMAIN),
            'showing' => TRUE,
                ]
        );

        $this->add_group_control(
                'sa-flip-box-back-background', $this->style, [
            'type' => Controls::BACKGROUND,
            'selector' => [
                '{{WRAPPER}} .oxi-addons-flip-box-style-25 .oxi-addons-flip-box-back-section-box' => '',
            ]
                ]
        );
        
        $this->add_group_control(
                'sa-flip-box-back-border-back', $this->style, [
            'type' => Controls::BORDER,
            'selector' => [
                '{{WRAPPER}} .oxi-addons-flip-box-style-25 .oxi-addons-flip-box-back-section' => '',
            ]
                ]
        );

        $this->add_responsive_control(
                'sa-flip-boxes-back-padding', $this->style, [
            'label' => __('Padding', OXI_FLIP_BOX_TEXTDOMAIN),
            'type' => Controls::DIMENSIONS,
            'default' => [
                'unit' => 'px',
                'size' => '',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 500,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
                
                'em' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => .1,
                ],
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-addons-flip-box-style-25 .oxi-addons-flip-box-back-section' => 'padding:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ]
                ]
        );
        $this->add_responsive_control(
                'sa-ib-content-back-box-margin', $this->style, [
            'label' => __('Margin', OXI_FLIP_BOX_TEXTDOMAIN),
            'type' => Controls::DIMENSIONS,
            'default' => [
                'unit' => 'px',
                'size' => '',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 500,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
                'em' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => .1,
                ],
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-addons-flip-box-style-25 .oxi-addons-flip-box-back-section-box' => 'padding:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ]
                ]
        );
      
        $this->end_controls_section();
        $this->start_controls_section(
                'shortcode-addons', [
            'label' => esc_html__('Heading Settings', OXI_FLIP_BOX_TEXTDOMAIN),
            'showing' => TRUE,
                ]
        );

        $this->add_control(
                'sa-flip-box-back-heading-color', $this->style, [
            'label' => __('Color', OXI_FLIP_BOX_TEXTDOMAIN),
            'type' => Controls::COLOR,
            'default' => '#787878',
            'selector' => [
                '{{WRAPPER}} .oxi-addons-flip-box-style-25 .oxi-addons-flip-box-back-headding' => 'color: {{VALUE}};',
            ]
                ]
        );
        $this->add_group_control(
                'sa-flip-box-back-heading-typho', $this->style, [
            'type' => Controls::TYPOGRAPHY,
            'include' => Controls::ALIGNNORMAL,
            'selector' => [
                '{{WRAPPER}} .oxi-addons-flip-box-style-25 .oxi-addons-flip-box-back-headding' => '',
            ]
                ]
        );
        $this->add_group_control(
                'sa-flip-box-back-heading-tx-shadow', $this->style, [
            'type' => Controls::TEXTSHADOW,
            'selector' => [
                '{{WRAPPER}} .oxi-addons-flip-box-style-25 .oxi-addons-flip-box-back-headding' => '',
            ]
                ]
        );
        $this->add_responsive_control(
                'sa-flip-box-back-heading-padding', $this->style, [
            'label' => __('Padding', OXI_FLIP_BOX_TEXTDOMAIN),
            'type' => Controls::DIMENSIONS,
            'default' => [
                'unit' => 'px',
                'size' => '',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 500,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
                'em' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => .1,
                ],
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-addons-flip-box-style-25 .oxi-addons-flip-box-back-headding' => 'padding:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ]
                ]
        );
        $this->end_controls_section();
        
        $this->end_section_devider();
        $this->start_section_devider();
        $this->start_controls_section(
                'shortcode-addons', [
            'label' => esc_html__('Heading Border Settings', OXI_FLIP_BOX_TEXTDOMAIN),
            'showing' => TRUE,
                ]
        );
        $this->add_responsive_control(
                'sa-flip-boxes-heading-border-width', $this->style, [
            'label' => __('Border Width', OXI_FLIP_BOX_TEXTDOMAIN),
            'type' => Controls::SLIDER,
            'default' => [
                'unit' => 'px',
                'size' => 100,
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1500,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
                'em' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => .1,
                ],
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-addons-flip-box-style-25 .oxi-addons-flip-box-back-headding-border' => 'width:{{SIZE}}{{UNIT}}',
            ],
                ]
        );
        $this->add_responsive_control(
                'sa-flip-boxes-heading-border-height', $this->style, [
            'label' => __('Border Height', OXI_FLIP_BOX_TEXTDOMAIN),
            'type' => Controls::SLIDER,
            'default' => [
                'unit' => 'px',
                'size' => 3,
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 50,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
                'em' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => .1,
                ],
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-addons-flip-box-style-25 .oxi-addons-flip-box-back-headding-border' => 'height:{{SIZE}}{{UNIT}};',
            ],
                ]
        );
        $this->add_control(
                'sa-flip-boxes-heading-border-color', $this->style, [
            'label' => __('Border Color', OXI_FLIP_BOX_TEXTDOMAIN),
            'type' => Controls::COLOR,
            'default' => '#ffffff',
            'selector' => [
                '{{WRAPPER}} .oxi-addons-flip-box-style-25 .oxi-addons-flip-box-back-headding-border' => 'background: {{VALUE}};',
            ]
                ]
        );
        
        $this->end_controls_section();
        $this->start_controls_section(
                'shortcode-addons', [
            'label' => esc_html__('Short Description', OXI_FLIP_BOX_TEXTDOMAIN),
            'showing' => TRUE,
                ]
        );

        $this->add_control(
                'sa-flip-box-back-short-description-color', $this->style, [
            'label' => __('Color', OXI_FLIP_BOX_TEXTDOMAIN),
            'type' => Controls::COLOR,
            'default' => '#ffffff',
            'selector' => [
                '{{WRAPPER}} .oxi-addons-flip-box-style-25 .oxi-addons-flip-box-back-info' => 'color: {{VALUE}};',
            ]
                ]
        );
        $this->add_group_control(
                'sa-flip-box-back-short-description-typho', $this->style, [
            'type' => Controls::TYPOGRAPHY,
            'include' => Controls::ALIGNNORMAL,
            'selector' => [
                '{{WRAPPER}} .oxi-addons-flip-box-style-25 .oxi-addons-flip-box-back-info' => '',
            ]
                ]
        );
        $this->add_group_control(
                'sa-flip-box-back-short-description-tx-shadow', $this->style, [
            'type' => Controls::TEXTSHADOW,
            'selector' => [
                '{{WRAPPER}} .oxi-addons-flip-box-style-25 .oxi-addons-flip-box-back-info' => '',
            ]
                ]
        );
        $this->add_responsive_control(
                'sa-flip-box-back-short-description-padding', $this->style, [
            'label' => __('Padding', OXI_FLIP_BOX_TEXTDOMAIN),
            'type' => Controls::DIMENSIONS,
            'default' => [
                'unit' => 'px',
                'size' => '',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 500,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
                'em' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => .1,
                ],
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-addons-flip-box-style-25 .oxi-addons-flip-box-back-info' => 'padding:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ]
                ]
        );
        $this->end_controls_section();
        $this->end_section_devider();
        $this->end_section_tabs();
    }

    public function modal_opener() {
        $this->add_substitute_control('', [], [
            'type' => Controls::MODALOPENER,
            'title' => __('Add New Flip Boxes', OXI_FLIP_BOX_TEXTDOMAIN),
            'sub-title' => __('Open Flip Boxes Form', OXI_FLIP_BOX_TEXTDOMAIN),
            'showing' => TRUE,
        ]);
    }

    public function modal_form_data() {
        echo '<div class="modal-header">                    
                    <h4 class="modal-title">Flip Boxes Form</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">';
        $this->start_controls_tabs(
                'shortcode-addons-start-tabs', [
            'options' => [
                'frontend' => esc_html__('Frontend Data', OXI_FLIP_BOX_TEXTDOMAIN),
                'backend' => esc_html__('Backend Box', OXI_FLIP_BOX_TEXTDOMAIN),
            ]
                ]
        );

        $this->start_controls_tab();
        $this->add_group_control(
                'sa_flip_boxes_media', $this->style, [
            'label' => __('URL', OXI_FLIP_BOX_TEXTDOMAIN),
            'type' => Controls::MEDIA,
            'default' => [
                'type' => 'media-library',
                'link' => '#',
            ]
                ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab();
        $this->add_control(
                'sa_flip_back_boxes_heading', $this->style, [
            'label' => __('Title', OXI_FLIP_BOX_TEXTDOMAIN),
            'type' => Controls::TEXT,
            'default' => 'Heading',
            'placeholder' => 'Heading',
                ]
        );
        $this->add_control(
                'sa_flip_boxes_back_description', $this->style, [
            'label' => __('Short Description', OXI_FLIP_BOX_TEXTDOMAIN),
            'type' => Controls::TEXTAREA,
            'default' => 'Lorem ipsum dolor sit amet, consectetur tempor incididunt ut labore et dolore magna aliqua dapibus tellus blandit quis. Cras tempor non mi et vestibulum.',
                ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_group_control(
                'sa_flip_boxes_button_link', $this->style, [
            'label' => __('URL', OXI_FLIP_BOX_TEXTDOMAIN),
            'type' => Controls::URL,
            'separator' => TRUE,
            'default' => '',
            'placeholder' => 'https://www.yoururl.com',
                ]
        );

        echo '</div>';
    }
    /**
     * Template Parent Item Data Rearrange
     *
     * @since 2.0.0
     */
    public function Rearrange() {
        return '<li class="list-group-item" id="{{id}}">{{sa_flip_back_boxes_heading}}</li>';
    }

}
