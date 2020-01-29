<?php

namespace OXI_IMAGE_HOVER_UPLOADS\Caption\Admin;

/**
 * Description of Effects29
 *
 * @author biplo
 */
use OXI_IMAGE_HOVER_UPLOADS\Caption\Modules as Modules;
use OXI_IMAGE_HOVER_PLUGINS\Classes\Controls as Controls;

class Effects29 extends Modules {

    public function register_effects() {
        return $this->add_control(
                        'image_hover_effects', $this->style, [
                    'label' => __('Effects Direction', OXI_IMAGE_HOVER_TEXTDOMAIN),
                    'type' => Controls::SELECT,
                    'default' => '',
                    'options' => [
                        'oxi-image-switch-up' => __('Switch Up', OXI_IMAGE_HOVER_TEXTDOMAIN),
                        'oxi-image-switch-down' => __('Switch Down', OXI_IMAGE_HOVER_TEXTDOMAIN),
                        'oxi-image-switch-left' => __('Switch Left', OXI_IMAGE_HOVER_TEXTDOMAIN),
                        'oxi-image-switch-right' => __('Switch Right', OXI_IMAGE_HOVER_TEXTDOMAIN),
                    ],
                    'selector' => [
                        '{{WRAPPER}} .oxi-image-caption-hover' => '',
                    ]
                        ]
        );
    }

}
