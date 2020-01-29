<?php

namespace OXI_IMAGE_HOVER_UPLOADS\Flipbox\Admin;

/**
 * Description of Effects1
 *
 * @author biplo
 */
use OXI_IMAGE_HOVER_UPLOADS\Flipbox\Modules as Modules;
use OXI_IMAGE_HOVER_PLUGINS\Classes\Controls as Controls;

class Effects14 extends Modules {

    public function register_frontend_tabs() {
        $this->start_section_tabs(
                'oxi-image-hover-start-tabs', [
            'condition' => [
                'oxi-image-hover-start-tabs' => 'frontend'
            ]
                ]
        );
        $this->start_section_devider();
        $this->register_front_content_settings();

        $this->register_front_description_settings();
        $this->end_section_devider();
        $this->start_section_devider();
        $this->register_front_heading_settings();
        $this->register_front_number_settings();
        $this->end_section_devider();
        $this->end_section_tabs();
    }

    public function register_front_content_settings() {
        $this->start_controls_section(
                'oxi-image-hover', [
            'label' => esc_html__('Content Settings', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'showing' => TRUE,
                ]
        );
        $this->add_control(
                'oxi-image-flip-front-alignment', $this->style, [
            'label' => __('Content Alignment', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::SELECT,
            'default' => 'image-hover-align-center-center',
            'options' => [
                'image-hover-align-top-left' => __('Top Left', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'image-hover-align-top-center' => __('Top Center', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'image-hover-align-top-right' => __('Top Right', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'image-hover-align-center-left' => __('Center Left', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'image-hover-align-center-center' => __('Center Center', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'image-hover-align-center-right' => __('Center Right', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'image-hover-align-bottom-left' => __('Bottom Left', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'image-hover-align-bottom-center' => __('Bottom Center', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'image-hover-align-bottom-right' => __('Bottom Right', OXI_IMAGE_HOVER_TEXTDOMAIN),
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure-front-section' => '',
            ]
                ]
        );
        $this->add_group_control(
                'oxi-image-flip-front-background', $this->style, [
            'type' => Controls::BACKGROUND,
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure-front-section-body' => '',
            ]
                ]
        );

        $this->add_group_control(
                'oxi-image-flip-front-border', $this->style, [
            'type' => Controls::BORDER,
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure-front-section' => '',
            ]
                ]
        );

        $this->add_responsive_control(
                'oxi-image-flip-front-border-radius', $this->style, [
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
                '{{WRAPPER}} .oxi-image-hover-figure-frontend, '
                . '{{WRAPPER}} .oxi-image-hover-figure-frontend:before, '
                . '{{WRAPPER}} .oxi-image-hover-figure-frontend:after, '
                . '{{WRAPPER}} .oxi-image-hover-figure-front-section-body, '
                . '{{WRAPPER}} .oxi-image-hover-figure-front-section, '
                . '{{WRAPPER}} .oxi-image-hover-figure-backend, '
                . '{{WRAPPER}} .oxi-image-hover-figure-backend-section-body, '
                . '{{WRAPPER}} .oxi-image-hover-figure-backend:before, '
                . '{{WRAPPER}} .oxi-image-hover-figure-backend:after, '
                . '{{WRAPPER}} .oxi-image-hover-figure-back-section ' => 'border-radius:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->add_group_control(
                'oxi-image-flip-front-boxshadow', $this->style, [
            'type' => Controls::BOXSHADOW,
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure-frontend:before' => '',
                '{{WRAPPER}} .oxi-image-hover-figure-backend:before' => '',
            ],
                ]
        );
        $this->add_responsive_control(
                'oxi-image-flip-front-padding', $this->style, [
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
                '{{WRAPPER}} .oxi-image-hover-figure-front-section' => 'padding:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ]
                ]
        );
        $this->add_responsive_control(
                'oxi-image-flip-front-margin', $this->style, [
            'label' => __('Margin', OXI_IMAGE_HOVER_TEXTDOMAIN),
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
                '{{WRAPPER}} .oxi-image-hover-figure-front-section' => 'margin:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ]
                ]
        );
        $this->end_controls_section();
    }

    public function register_front_number_settings() {
        $this->start_controls_section(
                'imahe-hover', [
            'label' => esc_html__('Icon Settings', OXI_FLIP_BOX_TEXTDOMAIN),
            'showing' => FALSE,
                ]
        );


        $this->add_responsive_control(
                'oxi-image-flip-front-icon-size', $this->style, [
            'label' => __('Icon Size', OXI_FLIP_BOX_TEXTDOMAIN),
            'type' => Controls::SLIDER,
            'default' => [
                'unit' => 'px',
                'size' => 20,
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
                '{{WRAPPER}} .oxi-image-hover-figure-front-section .oxi-image-hover-icon  .oxi-icons' => 'font-size:{{SIZE}}{{UNIT}};',
            ],
                ]
        );
        $this->add_control(
                'oxi-image-flip-front-icon-color', $this->style, [
            'label' => __('Color', OXI_FLIP_BOX_TEXTDOMAIN),
            'type' => Controls::COLOR,
            'default' => '#b414c9',
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure-front-section .oxi-image-hover-icon  .oxi-icons' => 'color: {{VALUE}};',
            ]
                ]
        );
        $this->add_group_control(
                'oxi-image-flip-front-icon-background', $this->style, [
            'type' => Controls::BACKGROUND,
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure-front-section .oxi-image-hover-icon  .oxi-icons' => '',
            ]
                ]
        );

        $this->add_group_control(
                'oxi-image-flip-front-icon-border', $this->style, [
            'type' => Controls::BORDER,
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure-front-section .oxi-image-hover-icon  .oxi-icons' => '',
            ]
                ]
        );

        $this->add_responsive_control(
                'oxi-image-flip-front-icon-border-radius', $this->style, [
            'label' => __('Border Radius', OXI_FLIP_BOX_TEXTDOMAIN),
            'type' => Controls::DIMENSIONS,
            'default' => [
                'unit' => 'px',
                'size' => 100,
            ],
            'range' => [
                '%' => [
                    'min' => 0,
                    'max' => 50,
                    'step' => .1,
                ],
                'px' => [
                    'min' => -200,
                    'max' => 200,
                    'step' => 1,
                ],
                'em' => [
                    'min' => 0,
                    'max' => 10,
                    'step' => .1,
                ],
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure-front-section .oxi-image-hover-icon  .oxi-icons' => 'border-radius:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ]
                ]
        );
        $this->add_responsive_control(
                'oxi-image-flip-front-icon-padding', $this->style, [
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
                '{{WRAPPER}} .oxi-image-hover-figure-front-section .oxi-image-hover-icon  .oxi-icons ' => 'padding:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ]
                ]
        );
        $this->add_group_control(
                'oxi-image-flip-front-icon-boxshadow', $this->style, [
            'type' => Controls::BOXSHADOW,
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure-front-section .oxi-image-hover-icon .oxi-icons' => '',
            ],
                ]
        );
        $this->end_controls_section();
    }

    public function register_backend_tabs() {
        $this->start_section_tabs(
                'oxi-image-hover-start-tabs', [
            'condition' => [
                'oxi-image-hover-start-tabs' => 'backend'
            ]
                ]
        );
        $this->start_section_devider();
        $this->register_back_content_settings();
        $this->register_back_description_settings();
        $this->end_section_devider();

        $this->start_section_devider();
        $this->register_back_heading_settings();
        $this->end_section_devider();


        $this->end_section_tabs();
    }

    public function register_back_content_settings() {
        $this->start_controls_section(
                'oxi-image-hover', [
            'label' => esc_html__('Content Settings', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'showing' => TRUE,
                ]
        );
        $this->add_control(
                'oxi-image-flip-back-content-alignment', $this->style, [
            'label' => __('Content Alignment', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::SELECT,
            'default' => 'image-hover-align-center-center',
            'options' => [
                'image-hover-align-top-left' => __('Top Left', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'image-hover-align-top-center' => __('Top Center', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'image-hover-align-top-right' => __('Top Right', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'image-hover-align-center-left' => __('Center Left', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'image-hover-align-center-center' => __('Center Center', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'image-hover-align-center-right' => __('Center Right', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'image-hover-align-bottom-left' => __('Bottom Left', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'image-hover-align-bottom-center' => __('Bottom Center', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'image-hover-align-bottom-right' => __('Bottom Right', OXI_IMAGE_HOVER_TEXTDOMAIN),
            ],
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure-back-section' => '',
            ]
                ]
        );
        $this->add_group_control(
                'oxi-image-flip-back-background', $this->style, [
            'type' => Controls::BACKGROUND,
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure-backend-section-body' => '',
            ]
                ]
        );

        $this->add_group_control(
                'oxi-image-flip-back-border', $this->style, [
            'type' => Controls::BORDER,
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure-back-section' => '',
            ]
                ]
        );

        $this->add_responsive_control(
                'oxi-image-flip-back-border-radius', $this->style, [
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
                '{{WRAPPER}} .oxi-image-hover-figure-frontend:hover, '
                . '{{WRAPPER}} .oxi-image-hover-figure-frontend.oxi-touch, '
                . '{{WRAPPER}} .oxi-image-hover-figure-frontend:hover:before, '
                . '{{WRAPPER}} .oxi-image-hover-figure-frontend.oxi-touch:before, '
                . '{{WRAPPER}} .oxi-image-hover-figure-frontend:hover:after, '
                . '{{WRAPPER}} .oxi-image-hover-figure-frontend.oxi-touch:after, '
                . '{{WRAPPER}} .oxi-image-hover-figure-front-section:hover, '
                . '{{WRAPPER}} .oxi-image-hover-figure-front-section.oxi-touch, '
                . '{{WRAPPER}} .oxi-image-hover-figure-front-section:hover img, '
                . '{{WRAPPER}} .oxi-image-hover-figure-front-section.oxi-touch img, '
                . '{{WRAPPER}} .oxi-image-hover-figure-backend-section-body, '
                . '{{WRAPPER}} .oxi-image-hover-figure-backend:hover, '
                . '{{WRAPPER}} .oxi-image-hover-figure-backend.oxi-touch, '
                . '{{WRAPPER}} .oxi-image-hover-figure-backend:hover:before, '
                . '{{WRAPPER}} .oxi-image-hover-figure-backend.oxi-touch:before, '
                . '{{WRAPPER}} .oxi-image-hover-figure-backend:hover:after, '
                . '{{WRAPPER}} .oxi-image-hover-figure-backend.oxi-touch:after, '
                . '{{WRAPPER}} .oxi-image-hover-figure-back-section:hover, '
                . '{{WRAPPER}} .oxi-image-hover-figure-back-section.oxi-touch ' => 'border-radius:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );
        $this->add_group_control(
                'oxi-image-flip-back-boxshadow', $this->style, [
            'type' => Controls::BOXSHADOW,
            'selector' => [
                '{{WRAPPER}} .oxi-image-hover-figure-backend:before' => '',
            ],
                ]
        );
        $this->add_responsive_control(
                'oxi-image-flip-back-padding', $this->style, [
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
                '{{WRAPPER}} .oxi-image-hover-figure-back-section' => 'padding:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ]
                ]
        );
        $this->add_responsive_control(
                'oxi-image-flip-back-margin', $this->style, [
            'label' => __('Margin', OXI_IMAGE_HOVER_TEXTDOMAIN),
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
                '{{WRAPPER}} .oxi-image-hover-figure-back-section' => 'margin:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ]
                ]
        );
        $this->end_controls_section();
    }

    public function modal_form_data() {
        echo '<div class="modal-header">                    
                    <h4 class="modal-title">Image Hover Form</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">';

        $this->add_control(
                'image_hover_front_heading', $this->style, [
            'label' => __('Front Title', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::TEXT,
            'default' => 'Heading',
            'placeholder' => 'Heading',
            'description' => 'Add Your Flipbox Front Title.'
                ]
        );
        $this->add_control(
                'image_hover_back_heading', $this->style, [
            'label' => __('Backend Title', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::TEXT,
            'default' => 'Border Flipbox',
            'placeholder' => 'Heading',
            'description' => 'Add Your Flipbox Backend Title.'
                ]
        );

        $this->add_control(
                'image_hover_front_icon', $this->style, [
            'label' => __('Front Icon', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::ICON,
            'description' => 'Add Your Flipbox Front Icon.'
                ]
        );

        $this->add_control(
                'image_hover_front_description', $this->style, [
            'label' => __('Front Description', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::TEXTAREA,
            'description' => 'Add Your Front Description Unless make it blank.'
                ]
        );


        $this->add_control(
                'image_hover_back_description', $this->style, [
            'label' => __('Backend Description', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::TEXTAREA,
            'description' => 'Add Your Backend Description Unless make it blank.'
                ]
        );


        $this->start_controls_tabs(
                'image_hover-start-tabs', [
            'separator' => TRUE,
            'options' => [
                'frontend' => esc_html__('Front Image', OXI_IMAGE_HOVER_TEXTDOMAIN),
                'backend' => esc_html__('Backend Image', OXI_IMAGE_HOVER_TEXTDOMAIN),
            ]
                ]
        );
        $this->start_controls_tab();

        $this->add_group_control(
                'image_hover_front_image', $this->style, [
            'label' => __('Image', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::MEDIA,
            'description' => 'Add or Modify Your Front Image. Adjust Front background to get better design.'
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab();
        $this->add_group_control(
                'image_hover_back_image', $this->style, [
            'label' => __('Feature Image', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::MEDIA,
            'description' => 'Add or Modify Your Backend Image. Adjust Backend background to get better design.'
                ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();


        $this->add_group_control(
                'image_hover_button_link', $this->style, [
            'label' => __('URL', OXI_IMAGE_HOVER_TEXTDOMAIN),
            'type' => Controls::URL,
            'separator' => TRUE,
            'default' => '',
            'placeholder' => 'https://www.yoururl.com',
            'description' => 'Add Your Desire Link or Url Unless make it blank'
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
        return '<li class="list-group-item" id="{{id}}">{{image_hover_front_heading}}</li>';
    }

}
