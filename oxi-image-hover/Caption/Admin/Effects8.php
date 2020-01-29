<?php

namespace OXI_IMAGE_HOVER_UPLOADS\Caption\Admin;

/**
 * Description of Effects2
 *
 * @author biplo
 */
use OXI_IMAGE_HOVER_UPLOADS\Caption\Modules as Modules;
use OXI_IMAGE_HOVER_PLUGINS\Classes\Controls as Controls;

class Effects8 extends Modules {

    public function register_effects() {
        return $this->add_control(
                        'image_hover_effects', $this->style, [
                    'label' => __('Effects Direction', OXI_IMAGE_HOVER_TEXTDOMAIN),
                    'type' => Controls::SELECT,
                    'default' => '',
                    'options' => [
                        'oxi-image-dive' => __('Drive', OXI_IMAGE_HOVER_TEXTDOMAIN),
                        'oxi-image-dive-cc' => __('Drive CC', OXI_IMAGE_HOVER_TEXTDOMAIN),
                        'oxi-image-dive-ccc' => __('Drive CCC', OXI_IMAGE_HOVER_TEXTDOMAIN),
                    ],
                    'selector' => [
                        '{{WRAPPER}} .oxi-image-caption-hover' => '',
                    ]
                        ]
        );
    }

}
