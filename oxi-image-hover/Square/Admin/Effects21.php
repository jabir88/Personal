<?php

namespace OXI_IMAGE_HOVER_UPLOADS\Square\Admin;

/**
 * Description of Effects21
 *
 * @author biplo
 */
use OXI_IMAGE_HOVER_UPLOADS\Square\Modules as Modules;
use OXI_IMAGE_HOVER_PLUGINS\Classes\Controls as Controls;

class Effects21 extends Modules {

    public function register_effects() {
        return $this->add_control(
                        'image_hover_effects', $this->style, [
                    'label' => __('Effects Direction', OXI_IMAGE_HOVER_TEXTDOMAIN),
                    'type' => Controls::SELECT,
                    'default' => 'left_to_right',
                    'options' => [
                        'top_to_bottom' => __('Top To Bottom', OXI_IMAGE_HOVER_TEXTDOMAIN),
                        'bottom_to_top' => __('Bottom To Top', OXI_IMAGE_HOVER_TEXTDOMAIN),
                    ],
                    'selector' => [
                        '{{WRAPPER}} .oxi-image-hover-figure' => '',
                    ]
                        ]
        );
    }

    public function register_general_style() {
        $this->start_controls_section(
                'oxi-image-hover', [
            'label' => esc_html__('General Style', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'showing' => true,
                ]
        );
        $this->add_responsive_control(
                'oxi-image-hover-width', $this->style, [
            'label' => __('Width', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::SLIDER,
            'default' => [
                'unit' => 'px',
                'size' => '',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1900,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 1,
                    'max' => 100,
                    'step' => 1,
                ],
                'em' => [
                    'min' => 1,
                    'max' => 200,
                    'step' => 0.1,
                ],
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-style-square' => 'max-width:{{SIZE}}{{UNIT}};',
            ],
                ]
        );
        $this->add_responsive_control(
                'oxi-image-hover-height', $this->style, [
            'label' => __('Height', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::SLIDER,
            'default' => [
                'unit' => 'px',
                'size' => '',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 1,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-style-square:after ' => 'padding-bottom:{{SIZE}}{{UNIT}};',
            ],
                ]
        );
        $this->add_responsive_control(
                'oxi-image-hover-content-height', $this->style, [
            'label' => __('Content Height', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::SLIDER,
            'default' => [
                'unit' => 'px',
                'size' => '',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 1,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-image-square-hover-style-21 .oxi-image-hover-figure:hover .oxi-image-hover-figure-caption, {{WRAPPER}} .oxi-image-square-hover-style-21 .oxi-image-hover-figure.oxi-touch .oxi-image-hover-figure-caption' => ' height: {{SIZE}}{{UNIT}};',
            ],
                ]
        );
        $this->add_responsive_control(
                'oxi-image-hover-margin', $this->style, [
            'label' => __('Margin', OXI_IMAGE_HOVER_TEXTDOMAIN),
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
                    'max' => 200,
                    'step' => .1,
                ],
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-style' => 'padding:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->end_controls_section();
    }

    public function register_content_settings() {
        $this->start_controls_section(
                'oxi-image-hover', [
            'label' => esc_html__('Content Settings', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'showing' => TRUE,
                ]
        );
        $this->add_group_control(
                'oxi-image-hover-background', $this->style, [
            'type' => Controls::BACKGROUND,
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-caption-tab' => '',
            ]
                ]
        );
        $this->start_controls_tabs(
                'image-hover-content-start-tabs',
                [
                    'options' => [
                        'normal' => esc_html__('Normal ', OXI_IMAGE_HOVER_TEXTDOMAIN),
                        'hover' => esc_html__('Hover ', OXI_IMAGE_HOVER_TEXTDOMAIN),
                    ]
                ]
        );
        $this->start_controls_tab();
        $this->add_responsive_control(
                'oxi-image-hover-border-radius', $this->style, [
            'label' => __('Border Radius', OXI_IMAGE_HOVER_TEXTDOMAIN),
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
                    'max' => 50,
                    'step' => 1,
                ],
                'em' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => .1,
                ],
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure,'
                . '{{WRAPPER}} .oxi-image-hover-figure:before,'
                . '{{WRAPPER}} .oxi-image-hover-image,'
                . '{{WRAPPER}} .oxi-image-hover-image:before,'
                . '{{WRAPPER}} .oxi-image-hover-image img,'
                . '{{WRAPPER}} .oxi-image-hover-figure-caption,'
                . '{{WRAPPER}} .oxi-image-hover-figure-caption:before,'
                . '{{WRAPPER}} .oxi-image-hover-figure-caption:after,'
                . '{{WRAPPER}} .oxi-image-hover-figure-caption .oxi-image-hover-caption-tab' => 'border-radius:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->add_group_control(
                'oxi-image-hover-boxshadow', $this->style, [
            'type' => Controls::BOXSHADOW,
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-image:before' => '',
            ],
                ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab();
        $this->add_responsive_control(
                'oxi-image-hover-hover-border-radius', $this->style, [
            'label' => __('Border Radius', OXI_IMAGE_HOVER_TEXTDOMAIN),
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
                    'max' => 50,
                    'step' => 1,
                ],
                'em' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => .1,
                ],
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure:hover,'
                . '{{WRAPPER}} .oxi-image-hover-figure.oxi-touch,'
                . '{{WRAPPER}}  .oxi-image-hover-figure:hover:before,'
                . '{{WRAPPER}}  .oxi-image-hover-figure.oxi-touch:before,'
                . '{{WRAPPER}} .oxi-image-hover-figure:hover .oxi-image-hover-image,'
                . '{{WRAPPER}} .oxi-image-hover-figure.oxi-touch .oxi-image-hover-image,'
                . '{{WRAPPER}} .oxi-image-hover-figure:hover .oxi-image-hover-image:before,'
                . '{{WRAPPER}} .oxi-image-hover-figure.oxi-touch .oxi-image-hover-image:before,'
                . '{{WRAPPER}} .oxi-image-hover-figure:hover .oxi-image-hover-image img,'
                . '{{WRAPPER}} .oxi-image-hover-figure.oxi-touch .oxi-image-hover-image img,'
                . '{{WRAPPER}} .oxi-image-hover-figure:hover .oxi-image-hover-figure-caption,'
                . '{{WRAPPER}} .oxi-image-hover-figure.oxi-touch .oxi-image-hover-figure-caption,'
                . '{{WRAPPER}} .oxi-image-hover-figure:hover .oxi-image-hover-figure-caption:before,'
                . '{{WRAPPER}} .oxi-image-hover-figure.oxi-touch .oxi-image-hover-figure-caption:before,'
                . '{{WRAPPER}} .oxi-image-hover-figure:hover .oxi-image-hover-figure-caption:after,'
                . '{{WRAPPER}} .oxi-image-hover-figure.oxi-touch .oxi-image-hover-figure-caption:after,'
                . '{{WRAPPER}} .oxi-image-hover-figure:hover .oxi-image-hover-figure-caption .oxi-image-hover-caption-tab,'
                . '{{WRAPPER}} .oxi-image-hover-figure.oxi-touch .oxi-image-hover-figure-caption .oxi-image-hover-caption-tab' => 'border-radius:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->add_group_control(
                'oxi-image-hover-hover-boxshadow', $this->style, [
            'type' => Controls::BOXSHADOW,
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure .oxi-image-hover-figure-caption:before' => '',
            ]
                ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_responsive_control(
                'oxi-image-hover-padding', $this->style, [
            'label' => __('Padding', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::DIMENSIONS,
            'separator' => TRUE,
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
                '{{WRAPPER}} .oxi-image-hover-figure .oxi-image-hover-caption-tab' => 'padding:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ]
                ]
        );
        $this->add_responsive_control(
                'oxi-image-hover-content-margin', $this->style, [
            'label' => __('Margin', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::DIMENSIONS,
            'default' => [
                'unit' => 'px',
                'size' => -10,
            ],
            'range' => [
                'px' => [
                    'min' => -100,
                    'max' => 500,
                    'step' => 1,
                ],
                '%' => [
                    'min' => -100,
                    'max' => 100,
                    'step' => 1,
                ],
                'em' => [
                    'min' => -100,
                    'max' => 100,
                    'step' => .1,
                ],
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-image-square-hover-style-21 .oxi-image-hover-figure:hover .oxi-image-hover-figure-caption, {{WRAPPER}} .oxi-image-square-hover-style-21 .oxi-image-hover-figure.oxi-touch .oxi-image-hover-figure-caption' => 'margin:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ]
                ]
        );
        $this->end_controls_section();
    }

    public function register_heading_settings() {
        $this->start_controls_section(
                'oxi-image-hover', [
            'label' => esc_html__('Heading Settings', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'showing' => TRUE,
                ]
        );

        $this->add_group_control(
                'oxi-image-hover-heading-typho', $this->style, [
            'type' => Controls::TYPOGRAPHY,
            'include' => Controls::ALIGNNORMAL,
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure-caption .oxi-image-hover-heading' => '',
            ]
                ]
        );
        $this->add_control(
                'oxi-image-hover-heading-color', $this->style, [
            'label' => __('Color', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::COLOR,
            'default' => '#ffffff',
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure-caption .oxi-image-hover-heading' => 'color: {{VALUE}};',
            ]
                ]
        );
        $this->add_group_control(
                'oxi-image-hover-heading-tx-shadow', $this->style, [
            'type' => Controls::TEXTSHADOW,
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure-caption .oxi-image-hover-heading' => '',
            ]
                ]
        );
        $this->add_responsive_control(
                'oxi-image-hover-heading-padding', $this->style, [
            'label' => __('Padding', OXI_IMAGE_HOVER_TEXTDOMAIN),
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
                '{{WRAPPER}} .oxi-image-hover-figure-caption .oxi-image-hover-heading' => 'padding:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ]
                ]
        );
        $this->add_responsive_control(
                'oxi-image-hover-heading-margin', $this->style, [
            'label' => __('Margin', OXI_IMAGE_HOVER_TEXTDOMAIN),
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
                '{{WRAPPER}} .oxi-image-hover-figure-caption .oxi-image-hover-figure-heading' => 'padding:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ]
                ]
        );
        $this->add_control(
                'oxi-image-hover-heading-animation', $this->style, [
            'label' => __('Animation', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::SELECT,
            'default' => '',
            'options' => [
                '' => __('None', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'iheu-fade-up' => __('Fade Up', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'iheu-fade-down' => __('Fade Down', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'iheu-fade-left' => __('Fade Left', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'iheu-fade-right' => __('Fade Right', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'iheu-fade-up-big' => __('Fade up Big', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'iheu-fade-down-big' => __('Fade down Big', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'iheu-fade-left-big' => __('Fade left Big', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'iheu-fade-right-big' => __('Fade Right Big', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'iheu-zoom-in' => __('Zoom In', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'iheu-zoom-out' => __('Zoom Out', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'iheu-flip-x' => __('Flip X', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'iheu-flip-y' => __('Flip Y', OXI_IMAGE_HOVER_TEXTDOMAIN),
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure-caption .oxi-image-hover-figure-heading' => '',
            ]
                ]
        );
        $this->add_control(
                'oxi-image-hover-heading-animation-delay', $this->style, [
            'label' => __('Animation Delay', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::SELECT,
            'default' => '',
            'options' => [
                '' => __('None', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'oxi-image-hover-delay-xs' => __('Delay XS', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'oxi-image-hover-delay-sm' => __('Delay SM', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'oxi-image-hover-delay-md' => __('Delay MD', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'oxi-image-hover-delay-lg' => __('Delay LG', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'oxi-image-hover-delay-xl' => __('Delay XL', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'oxi-image-hover-delay-xxl' => __('Delay XXL', OXI_IMAGE_HOVER_TEXTDOMAIN),
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure-caption .oxi-image-hover-figure-heading' => '',
            ]
                ]
        );

        $this->end_controls_section();
    }

    public function register_heading_underline() {
        
    }

}
