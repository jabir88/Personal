<?php

namespace OXI_IMAGE_HOVER_UPLOADS\General\Admin;

/**
 * Description of Effects1
 *
 * @author biplo
 */
use OXI_IMAGE_HOVER_UPLOADS\General\Modules as Modules;
use OXI_IMAGE_HOVER_PLUGINS\Classes\Controls as Controls;

class Effects6 extends Modules {

    public function register_effects() {
        return $this->add_control(
                        'image_hover_effects', $this->style, [
                    'label' => __('Effects Direction', OXI_IMAGE_HOVER_TEXTDOMAIN),
                    'type' => Controls::SELECT,
                    'default' => 'left_to_right',
                    'options' => [
                        'scale_up' => __('Scale Up', OXI_IMAGE_HOVER_TEXTDOMAIN),
                        'scale_down' => __('Scale Down', OXI_IMAGE_HOVER_TEXTDOMAIN),
                        'scale_down_up' => __('Scale up Down', OXI_IMAGE_HOVER_TEXTDOMAIN),
                    ],
                    'selector' => [
                        '{{WRAPPER}} .oxi-image-hover-figure' => '',
                    ]
                        ]
        );
    }

}
