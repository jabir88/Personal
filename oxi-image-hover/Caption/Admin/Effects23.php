<?php

namespace OXI_IMAGE_HOVER_UPLOADS\Caption\Admin;

/**
 * Description of Effects22
 *
 * @author biplo
 */
use OXI_IMAGE_HOVER_UPLOADS\Caption\Modules as Modules;
use OXI_IMAGE_HOVER_PLUGINS\Classes\Controls as Controls;

class Effects23 extends Modules {

    public function register_effects() {
        return $this->add_control(
                        'image_hover_effects', $this->style, [
                    'label' => __('Effects Direction', OXI_IMAGE_HOVER_TEXTDOMAIN),
                    'type' => Controls::SELECT,
                    'default' => '',
                    'options' => [
                        'oxi-image-shift-top-left' => __('Shift Top Left', OXI_IMAGE_HOVER_TEXTDOMAIN),
                        'oxi-image-shift-top-right' => __('Shift Top Right', OXI_IMAGE_HOVER_TEXTDOMAIN),
                        'oxi-image-shift-bottom-left' => __('Shift Bottom Left', OXI_IMAGE_HOVER_TEXTDOMAIN),
                        'oxi-image-shift-bottom-right' => __('Shift Bottom Right', OXI_IMAGE_HOVER_TEXTDOMAIN),
                    ],
                    'selector' => [
                        '{{WRAPPER}} .oxi-image-caption-hover' => '',
                    ]
                        ]
        );
    }

}
