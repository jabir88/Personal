<?php

namespace OXI_IMAGE_HOVER_UPLOADS\General\Admin;

/**
 * Description of Effects1
 *
 * @author biplo
 */
use OXI_IMAGE_HOVER_UPLOADS\General\Modules as Modules;
use OXI_IMAGE_HOVER_PLUGINS\Classes\Controls as Controls;

class Effects8 extends Modules {

    public function register_effects() {
        return $this->add_control(
                        'image_hover_effects', $this->style, [
                    'label' => __('Effects Direction', OXI_IMAGE_HOVER_TEXTDOMAIN),
                    'type' => Controls::SELECT,
                    'default' => 'left_to_right',
                    'options' => [
                        'top_to_bottom' => __('Top To Bottom', OXI_IMAGE_HOVER_TEXTDOMAIN),
                        'bottom_to_top' => __('Bottom To Top', OXI_IMAGE_HOVER_TEXTDOMAIN),
                        'left_to_right' => __('Left To Right', OXI_IMAGE_HOVER_TEXTDOMAIN),
                        'right_to_left' => __('Right To Left', OXI_IMAGE_HOVER_TEXTDOMAIN),
                    ],
                    'selector' => [
                        '{{WRAPPER}} .oxi-image-hover-figure' => '',
                    ]
                        ]
        );
    }

}
