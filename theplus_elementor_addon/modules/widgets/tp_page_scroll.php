<?php 
	/*
Widget Name: Page Scroll
Description: Page Scroll
Author: Theplus
Author URI: http://posimyththemes.com
*/
namespace TheplusAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Core\Responsive\Responsive;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;
use Elementor\Scheme_Typography;

use TheplusAddons\Theplus_Element_Load;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class ThePlus_Page_Scroll extends Widget_Base {
		
	
	public function get_name() {
		return 'tp-page-scroll';
	}

    public function get_title() {
        return esc_html__('Page Scroll', 'theplus');
    }

    public function get_icon() {
        return 'fa fa-rocket theplus_backend_icon';
    }

    public function get_categories() {
        return array('plus-creatives');
    }
	public function get_keywords() {
		return ['one page scroll', 'full page js', 'page piling', 'page pilling', 'multi scroll', 'page scroll', 'scroll'];
	}
    protected function _register_controls() {
		$this->start_controls_section(
			'section_page_scroll',
			[
				'label' => esc_html__( 'Page Scroll', 'theplus' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'page_scroll_opt',
			[
				'label' => esc_html__( 'Option', 'theplus' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'tp_full_page',
				'options' => [
					'tp_full_page'  => esc_html__( 'Full Page', 'theplus' ),
					'tp_page_pilling'  => esc_html__( 'Page Piling', 'theplus' ),					
					'tp_multi_scroll'  => esc_html__( 'Multi Scroll', 'theplus' ),
				],
			]
		);
		$this->end_controls_section();
		
		/*full page & page pilling content start*/
		$this->start_controls_section(
			'full_pagepilling_content_templates',
			[
				'label' => esc_html__( 'Content', 'theplus' ),
				'tab' => Controls_Manager::TAB_CONTENT,
				'condition'		=> [
					'page_scroll_opt' => ['tp_page_pilling','tp_full_page'],
				],
			]
		);
		$this->add_control(
			'fit_screen_note',
			[
				'label' => esc_html__( 'Make sure your templates have full width On and It will suitable to screen height.', 'theplus' ),
				'type' => \Elementor\Controls_Manager::HEADING,				
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'fp_content_template',
			[
				'label'       => esc_html__( 'Elementor Templates', 'theplus' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => '0',
				'options'     => theplus_get_templates(),
				'label_block' => 'true',
			]
		);
		$repeater->add_control(
			'fp-slideid',
			[
				'label' => esc_html__( 'Slide Id', 'theplus' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],				
				'placeholder' => esc_html__( 'slideid', 'theplus' ),
			]
		);
		$this->add_control(
			'fp_content',
			[
				'label' => '',
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();
		/*full page & page pilling content end*/
		
		
		/*multi scroll content start*/
		$this->start_controls_section(
			'multi_scroll_content_templates',
			[
				'label' => esc_html__( 'Multi Scroll Content', 'theplus' ),
				'tab' => Controls_Manager::TAB_CONTENT,
				'condition'		=> [
					'page_scroll_opt' => 'tp_multi_scroll',
				],
			]
		);
		$this->add_control(
			'template_full_height_text',
		  	[
                'label'         => esc_html__( 'Make sure your templates have full width On and It will suitable to screen height.', 'theplus' ),
		     	'type'          => Controls_Manager::RAW_HTML,		     	
		  	]
		);
		
		 $multiscroll_repeater = new REPEATER();
		 
		 $multiscroll_repeater->add_control(
			'fp-slideid',
			[
				'label' => esc_html__( 'Slide Id', 'theplus' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],				
				'placeholder' => esc_html__( 'Enter Slide Id', 'theplus' ),
			]
		);
		
		$multiscroll_repeater->add_control(
			'multi_left_template',
			[
				'label'       => esc_html__( 'Left Template', 'theplus' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => '0',
				'options'     => theplus_get_templates(),
				'label_block' => false,
			]
		);		
		 $multiscroll_repeater->add_control(
			'multi_right_template',
		  	[
		     	'label'			=> esc_html__( 'Right Template', 'theplus' ),
		     	'type'          => Controls_Manager::SELECT2,
		     	'options'     => theplus_get_templates(),
		     	'label_block'      => false,
		  	]
		);
		 $this->add_control(
			'multi_left_right_repeater',
           [
               'label'          => esc_html__( 'Sections', 'theplus' ),
               'type'           => Controls_Manager::REPEATER,
               'fields' => $repeater->get_controls(),   
           ]
       );
        
        $this->end_controls_section();						
		
		/*full page dots settings start*/
		$this->start_controls_section('dots_settings',
            [
                'label'     => esc_html__('Dots', 'theplus'),
            ]
        );		
		$this->add_control(
			'show_dots',
			[
				'label' => esc_html__( 'Dots', 'theplus' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Enable', 'theplus' ),
				'label_off' => esc_html__( 'Disable', 'theplus' ),
				'default' => 'yes',
				'description'   => esc_html__('Works only on the frontend', 'theplus'),
				'condition' => [
					'page_scroll_opt!' => 'tp_multi_scroll',
				],
			]
		);		
		$this->add_control('nav_postion',
            [
                'label'         => esc_html__('Dots Positions', 'theplus'),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'right'   => esc_html__('Right', 'theplus'),
                    'left'   => esc_html__('Left', 'theplus'),
                ],
                'default'       => 'right',
				'condition' => [					
					'show_dots' => 'yes',
					'page_scroll_opt!' => 'tp_multi_scroll',
				],
            ]
        );
		$this->add_control('nav_dots_tooltips',
            [
                'label'         => esc_html__('Dots Tooltips Text', 'theplus'),
                'type'          => Controls_Manager::TEXT,
                'description'   => esc_html__('Add Multiple text separated by comma \',\'','theplus'),
                'condition'     => [
					'page_scroll_opt' => ['tp_full_page','tp_page_pilling'],
                    'show_dots'   => 'yes'					
                ]
            ]
        );
		/*navigation multi scroll*/
		
		$this->add_control(
			'multi_navigation_dots',
            [
                'label'         => esc_html__('Navigation Dots', 'theplus'),
                'type'          => Controls_Manager::SWITCHER,
				'default'		=> 'yes',
				'condition'		=> [
					'page_scroll_opt' => 'tp_multi_scroll',
				],
                
            ]
        );		
		$this->add_control(
			'multi_navigation_dots_pos',
            [
                'label'         => esc_html__('Dots Horizontal Position', 'theplus'),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'left'  => esc_html__('Left', 'theplus'),
                    'right' => esc_html__('Right', 'theplus'),
                ],
                'default'       => 'right',
                'condition'     => [
					'page_scroll_opt' => 'tp_multi_scroll',
                    'multi_navigation_dots'   => 'yes'
                ]
            ]
        );
		$this->add_control('multi_navigation_verti_dots_pos',
            [
                'label'         => esc_html__('Dots Vertical Position', 'theplus'),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'top'   => esc_html__('Top', 'theplus'),
                    'middle'=> esc_html__('Middle', 'theplus'),
                    'bottom'=> esc_html__('Bottom', 'theplus'),
                ],
                'default'       => 'middle',
                'condition'     => [
					'page_scroll_opt' => 'tp_multi_scroll',
                    'multi_navigation_dots'   => 'yes'
                ]
            ]
        );
		$this->add_control(
			'multi_dots_tooltips',
            [
                'label'         => esc_html__('Dots Tooltip\'s Text', 'theplus'),
                'type'          => Controls_Manager::TEXT,
                'description'   => esc_html__('Add Multiple text separated by comma \',\'','theplus'),
                'condition'     => [
					'page_scroll_opt' => 'tp_multi_scroll',
                    'multi_navigation_dots'   => 'yes'
                ]
            ]
        );
		/*navigation multi scroll*/
		
		$this->add_control(
			'scroll_nav_connection',
			[
				'label' => esc_html__( 'Scroll Navigation Connection', 'theplus' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Enable', 'theplus' ),
				'label_off' => esc_html__( 'Disable', 'theplus' ),
				'default' => 'no',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'scrollnav_connect_id',
			[
				'label' => esc_html__( 'Scroll Navigation Connect ID', 'theplus' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'condition'    => [
					'scroll_nav_connection' => 'yes',
				],
			]
		);
		$this->end_controls_section();
		/*full page dots settings end*/
		
		/*Next previous settings end*/
		$this->start_controls_section('next_previous_settings',
            [
                'label'     => esc_html__('Next Previous Button', 'theplus'),
				'condition' => [
					'page_scroll_opt' => ['tp_full_page','tp_page_pilling','tp_multi_scroll'],
				],
            ]
        );
		$this->add_control(
			'show_next_prev',
			[
				'label' => esc_html__( 'Next Previous Button', 'theplus' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Enable', 'theplus' ),
				'label_off' => esc_html__( 'Disable', 'theplus' ),
				'default' => 'yes',				
			]
		);
		$this->add_control('next_prev_style',
            [
                'label'         => esc_html__('Style', 'theplus'),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'style-1'   => esc_html__('Style 1', 'theplus'),
                    'style-2'   => esc_html__('Style 2', 'theplus'),
                    'style-3'   => esc_html__('Style 3', 'theplus'),
                    'custom'   => esc_html__('Custom', 'theplus'),
                ],
                'default'       => 'style-1',
				'condition' => [
					'show_next_prev' => 'yes',
				],
            ]
        );
		$this->add_control(
			'nav_prev_image',
			[
				'label' => esc_html__( 'Previous Icon', 'theplus' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'next_prev_style' => 'custom',
				],
			]
		);
		$this->add_control(
			'nav_next_image',
			[
				'label' => esc_html__( 'Next Icon', 'theplus' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'next_prev_style' => 'custom',
				],
			]
		);
			$this->add_control(
			'np_gap',
			[
				'label' => esc_html__( 'Gap', 'theplus' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .fp-nxt-prev .fp-nav-btn.fp-nav-next' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'show_next_prev' => 'yes',
				],
			]
		);
		$this->add_control('next_prev_direction',
            [
                'label'         => esc_html__('Direction', 'theplus'),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'horizontal'   => esc_html__('Horizontal', 'theplus'),
                    'vertical'   => esc_html__('Vertical', 'theplus'),
                ],
                'default'       => 'horizontal',
				'condition' => [
					'show_next_prev' => 'yes',
				],
            ]
        );
		$this->add_control('fp_nav_position',
            [
                'label'         => esc_html__('Position', 'theplus'),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'bottom-center'   => esc_html__('bottom-center', 'theplus'),
                    'bottom-left'   => esc_html__('bottom-left', 'theplus'),
                    'bottom-right'   => esc_html__('bottom-right', 'theplus'),
                    'left-top'   => esc_html__('left-top', 'theplus'),
                    'left-center'   => esc_html__('left-center', 'theplus'),
                    'right-top'   => esc_html__('right-top', 'theplus'),
                    'right-center'   => esc_html__('right-center', 'theplus'),
                ],
                'default'       => 'bottom-center',
				'condition' => [
					'show_next_prev' => 'yes',
				],
            ]
        );
		$this->add_responsive_control(
			'fp_offset_left',
			[
				'label' => esc_html__( 'Offset Left', 'theplus' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => ['min' => 0,'max' => 1000,'step' => 5,],
					'%' => ['min' => 0,'max' => 100,],
				],
				'default' => ['unit' => '%','size' => 7,],				
				'selectors'  => [
					'{{WRAPPER}} .fp-nxt-prev.bottom-left,{{WRAPPER}} .fp-nxt-prev.left-top,{{WRAPPER}} .fp-nxt-prev.left-center' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => ['show_next_prev' => 'yes','fp_nav_position' => ['bottom-left','left-top','left-center'],],
			]
		);
		$this->add_responsive_control(
			'fp_offset_right',
			[
				'label' => esc_html__( 'Offset Right', 'theplus' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => ['min' => 0,'max' => 1000,'step' => 1,],
					'%' => ['min' => 0,'max' => 100,],
				],
				'default' => ['unit' => '%','size' => 7,],
				'selectors'  => [
					'{{WRAPPER}} .fp-nxt-prev.bottom-right,{{WRAPPER}} .fp-nxt-prev.right-top,{{WRAPPER}} .fp-nxt-prev.right-center' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => ['show_next_prev' => 'yes','fp_nav_position' => ['bottom-right','right-top','right-center'],],
			]
		);
		$this->add_responsive_control(
			'fp_offset_bottom',
			[
				'label' => esc_html__( 'Offset Bottom', 'theplus' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => ['min' => 0,'max' => 1000,'step' => 1,],
					'%' => ['min' => 0,'max' => 100,],
				],
				'default' => ['unit' => '%','size' => 7,],
				'selectors'  => [
					'{{WRAPPER}} .fp-nxt-prev.bottom-left,{{WRAPPER}} .fp-nxt-prev.bottom-right,{{WRAPPER}} .fp-nxt-prev.bottom-center' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => ['show_next_prev' => 'yes','fp_nav_position' => ['bottom-left','bottom-center','bottom-right'],],
			]
		);
		$this->add_responsive_control(
			'fp_offset_top',
			[
				'label' => esc_html__( 'Offset Top', 'theplus' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => ['min' => 0,'max' => 1000,'step' => 1,],
					'%' => ['min' => 0,'max' => 100,],
				],
				'default' => ['unit' => '%','size' => 7,],
				'selectors'  => [
					'{{WRAPPER}} .fp-nxt-prev.left-top,{{WRAPPER}} .fp-nxt-prev.right-top' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => ['show_next_prev' => 'yes','fp_nav_position' => ['left-top','right-top'],],
			]
		);
		$this->add_control(
			'next_size',
			[
				'label'         => esc_html__('Next Icon Size', 'theplus'),
				'type'          => Controls_Manager::SELECT,
				'options'       => [
					'small'   => esc_html__('Small', 'theplus'),
					'medium'   => esc_html__('Medium', 'theplus'),
					'large'   => esc_html__('Large', 'theplus'),					
				],
				'default'       => 'medium',
				'separator' => 'before',
				'condition' => [
					'show_next_prev' => 'yes',
					'next_prev_style!' => ['style-3','custom'],
				],
			]
        );
		$this->add_control(
			'prev_size',
			[
				'label'         => esc_html__('Prev Icon Size', 'theplus'),
				'type'          => Controls_Manager::SELECT,
				'options'       => [
					'small'   => esc_html__('Small', 'theplus'),
					'medium'   => esc_html__('Medium', 'theplus'),
					'large'   => esc_html__('Large', 'theplus'),					
				],
				'default'       => 'medium',
				'condition' => [
					'show_next_prev' => 'yes',
					'next_prev_style!' => ['style-3','custom'],
				],
			]
        );
		$this->add_control(
			'nxt_txt',
			[
				'label' => esc_html__( 'Next Button Text', 'theplus' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Next',
				'placeholder' => esc_html__( 'Next', 'theplus' ),
				'condition' => [
					'show_next_prev' => 'yes',
					'next_prev_style' => 'style-3',
				],
			]
		);
		$this->add_control(
			'prev_txt',
			[
				'label' => esc_html__( 'Previous Button Text', 'theplus' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Prev',
				'placeholder' => esc_html__( 'Prev', 'theplus' ),
				'condition' => [
					'show_next_prev' => 'yes',
					'next_prev_style' => 'style-3',
				],
			]
		);
		$this->end_controls_section();
		/*Next previous settings end*/
				
		/*paginate settings start*/
		$this->start_controls_section('section_show_paginate',
            [
                'label'     => esc_html__('Paginate', 'theplus'),
				'condition' => [
					'page_scroll_opt' => ['tp_full_page','tp_page_pilling','tp_multi_scroll'],
				],
            ]
        );
		$this->add_control(
			'show_paginate',
			[
				'label' => esc_html__( 'Show Paginate', 'theplus' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Enable', 'theplus' ),
				'label_off' => esc_html__( 'Disable', 'theplus' ),
				'default' => 'no',				
			]
		);
		$this->add_control('paginate_style',
            [
                'label'         => esc_html__('Pagination Styles', 'theplus'),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'fadeIn'   => esc_html__('FadeIn', 'theplus'),
                    'fadeInDown'   => esc_html__('FadeInDown', 'theplus'),
                    'fadeInUp'   => esc_html__('FadeInUp', 'theplus'),
                    'flipInX'   => esc_html__('FlipInX', 'theplus'),
                    'flipInY'   => esc_html__('FlipInY', 'theplus'),
                    'rotateInDownRight'   => esc_html__('RotateInDownRight', 'theplus'),
                    'rotateInUpRight'   => esc_html__('RotateInUpRight', 'theplus'),
                    'zoomIn'   => esc_html__('ZoomIn', 'theplus'),
                    'rollIn'   => esc_html__('RollIn', 'theplus'),
                    'bounceIn'   => esc_html__('BounceIn', 'theplus'),                    
                ],
                'default'       => 'fadeIn',
				'condition' => [
					'show_paginate' => 'yes',
				],
            ]
        );
		$this->add_control('paginate_position',
            [
                'label'         => esc_html__('Pagination Position', 'theplus'),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'bottom-center'   => esc_html__('Bottom Center', 'theplus'),                               
                    'bottom-left'   => esc_html__('Bottom Left', 'theplus'),                               
                    'bottom-right'   => esc_html__('Bottom Right', 'theplus'),                               
                    'left-top'   => esc_html__('Left Top', 'theplus'),                               
                    'left-center'   => esc_html__('Left Center', 'theplus'),                               
                    'right-top'   => esc_html__('Right Top', 'theplus'),                               
                    'right-center'   => esc_html__('Right Center', 'theplus'), 
                ],
                'default'       => 'bottom-left',
				'condition' => [
					'show_paginate' => 'yes',
				],
            ]
        );
		$this->add_responsive_control(
			'paginate_offset_left',
			[
				'label' => esc_html__( 'Offset Left', 'theplus' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => ['min' => 0,'max' => 1000,'step' => 5,],
					'%' => ['min' => 0,'max' => 100,],
				],
				'default' => ['unit' => '%','size' => 7,],				
				'selectors'  => [
					'.ps{{ID}}.fullpage-nav-paginate.bottom-left,.ps{{ID}}.fullpage-nav-paginate.left-top,.ps{{ID}}.fullpage-nav-paginate.left-center' => 'left: {{SIZE}}{{UNIT}};',
				],
				'condition' => ['show_paginate' => 'yes','paginate_position' => ['bottom-left','left-top','left-center'],],
			]
		);
		$this->add_responsive_control(
			'paginate_offset_right',
			[
				'label' => esc_html__( 'Offset Right', 'theplus' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => ['min' => 0,'max' => 1000,'step' => 1,],
					'%' => ['min' => 0,'max' => 100,],
				],
				'default' => ['unit' => '%','size' => 7,],
				'selectors'  => [
					'.ps{{ID}}.fullpage-nav-paginate.bottom-right,.ps{{ID}}.fullpage-nav-paginate.right-top,.ps{{ID}}.fullpage-nav-paginate.right-center' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => ['show_paginate' => 'yes','paginate_position' =>  ['bottom-right','right-top','right-center'],],
			]
		);
		$this->add_responsive_control(
			'paginate_offset_bottom',
			[
				'label' => esc_html__( 'Offset Bottom', 'theplus' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => ['min' => 0,'max' => 1000,'step' => 1,],
					'%' => ['min' => 0,'max' => 100,],
				],
				'default' => ['unit' => '%','size' => 7,],
				'selectors'  => [
					'.ps{{ID}}.fullpage-nav-paginate.bottom-left,.ps{{ID}}.fullpage-nav-paginate.bottom-right,.ps{{ID}}.fullpage-nav-paginate.bottom-center' => 'bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => ['show_paginate' => 'yes','paginate_position' =>  ['bottom-left','bottom-center','bottom-right'],],
			]
		);
		$this->add_responsive_control(
			'paginate_offset_top',
			[
				'label' => esc_html__( 'Offset Top', 'theplus' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => ['min' => 0,'max' => 1000,'step' => 1,],
					'%' => ['min' => 0,'max' => 100,],
				],
				'default' => ['unit' => '%','size' => 7,],
				'selectors'  => [
					'.ps{{ID}}.fullpage-nav-paginate.left-top,.ps{{ID}}.fullpage-nav-paginate.right-top' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => ['show_paginate' => 'yes','paginate_position' =>  ['left-top','right-top'],],
			]
		);
		$this->end_controls_section();
		/*paginate settings end*/
		/*extra option start*/
		$this->start_controls_section('section_show_extra_opt',
            [
                'label'     => esc_html__('Extra Option', 'theplus'),
				'condition' => [
					'page_scroll_opt' => ['tp_full_page','tp_page_pilling'],
				],
            ]
        );
		$this->add_control(
			'tp_direction',
			[
				'label' => esc_html__( 'Direction', 'theplus' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'vertical',
				'options' => [
					'vertical'  => esc_html__( 'Vertical', 'theplus' ),
					'horizontal'  => esc_html__( 'Horizontal', 'theplus' ),					
				],
				'separator' => 'after',
				'condition' => [
					'page_scroll_opt!' => ['tp_full_page'],
				],
			]
		);
		$this->add_control(
			'tp_fp_hide_hash_id',
			[
				'label' => esc_html__( 'Hide Hash/id in URL', 'theplus' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Enable', 'theplus' ),
				'label_off' => esc_html__( 'Disable', 'theplus' ),
				'default' => 'no',
				'separator' => 'after',
				'condition' => [
					'page_scroll_opt' => ['tp_full_page'],
				],
			]
		);
		$this->add_control(
			'tp_keyboard_scrolling',
			[
				'label' => esc_html__( 'Keyboard Scrolling', 'theplus' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Enable', 'theplus' ),
				'label_off' => esc_html__( 'Disable', 'theplus' ),
				'default' => 'yes',
				
			]
		);
		$this->add_control(
			'tp_scrolling_speed',
			[
				'label' => esc_html__( 'Scrolling Speed', 'theplus' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 5,
				'max' => 5000,
				'step' => 5,
				'default' => 700,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'tp_loop_bottom',
			[
				'label' => esc_html__( 'Loop Bottom', 'theplus' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Enable', 'theplus' ),
				'label_off' => esc_html__( 'Disable', 'theplus' ),
				'default' => 'no',
				'description'   => esc_html__('Scrolling down in the last section should scroll to the first one or not.','theplus'),
				'separator' => 'before',
			]
		);
		$this->add_control(
			'tp_loop_top',
			[
				'label' => esc_html__( 'Loop Top', 'theplus' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Enable', 'theplus' ),
				'label_off' => esc_html__( 'Disable', 'theplus' ),
				'description'   => esc_html__('Scrolling up in the first section should scroll to the last one or not.','theplus'),
				'default' => 'no',
			]
		);
		$this->add_control(
			'tp_tablet_off',
			[
				'label' => esc_html__( 'Page Pilling in Tablet', 'theplus' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Enable', 'theplus' ),
				'label_off' => esc_html__( 'Disable', 'theplus' ),				
				'default' => 'no',
				'separator' => 'before',
				'condition' => [
					'page_scroll_opt!' => ['tp_full_page'],
				],
			]
		);
		$this->add_control(
			'tp_mobile_off',
			[
				'label' => esc_html__( 'Page Pilling in Mobile', 'theplus' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Enable', 'theplus' ),
				'label_off' => esc_html__( 'Disable', 'theplus' ),
				'default' => 'no',
				'condition' => [
					'page_scroll_opt!' => ['tp_full_page'],					
				],
			]
		);
		$this->add_control(
			'tp_continuous_vertical',
			[
				'label' => esc_html__( 'Continuous Vertical', 'theplus' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Enable', 'theplus' ),
				'label_off' => esc_html__( 'Disable', 'theplus' ),
				'default' => 'no',
				'separator' => 'before',
				'condition' => [
					'page_scroll_opt!' => ['tp_page_pilling'],
				],
			]
		);
		$this->add_control(
			'tp_responsive_width',
			[
				'label' => esc_html__( 'Responsive Width', 'theplus' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Enable', 'theplus' ),
				'label_off' => esc_html__( 'Disable', 'theplus' ),
				'default' => 'no',				
				'condition' => [
					'page_scroll_opt!' => ['tp_page_pilling'],
				],
			]
		);
		$this->add_control(
			'res_width_value',
			[
				'label' => esc_html__( 'Responsive Width', 'theplus' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 300,
				'max' => 2000,
				'step' => 5,
				'default' => 0,
				'description'   => esc_html__('ex. 900 < Scroll Normal Site','theplus'),
				'condition' => [
					'page_scroll_opt!' => ['tp_page_pilling'],
					'tp_responsive_width' => 'yes',
				],
			]
		);
		$this->end_controls_section();
		/*extra option end*/
		
		/*extra option multi scroll start*/
		$this->start_controls_section(
			'section_multi_extra_opt',
            [
                'label'     => esc_html__('Extra Option', 'theplus'),
				'condition'		=> [
					'page_scroll_opt' => 'tp_multi_scroll',
				],
            ]
        );
		$this->add_control(
			'multi_left_width',
            [
                'label'         => esc_html__('Left Section Width', 'theplus'),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => '%',
                'default'       => [
                    'size'  => 50
                ]
            ]
        );
		$this->add_control(
			'multi_right_width',
            [
                'label'         => esc_html__('Right Section Width', 'theplus'),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => '%',
                'default'       => [
                    'size'  => 50
                ]
            ]
        );
		$this->add_control(
			'multi_keyboard_scrolling',
            [
                'label'         => esc_html__('Keyboard Scrolling', 'theplus'),
                'type'          => Controls_Manager::SWITCHER,
            ]
        );
        
        $this->add_control(
			'multi_loop_top',
            [
                'label'         => esc_html__('Loop Top', 'theplus'),
                'type'          => Controls_Manager::SWITCHER,
                'description'   => esc_html__('Scrolling up in the first section should scroll to the last one or not.','theplus')
                
            ]
        );
        
        $this->add_control(
			'multi_loop_bottom',
            [
                'label'         => esc_html__('Loop Bottom', 'theplus'),
                'type'          => Controls_Manager::SWITCHER,
                'description'   => esc_html__('Scrolling down in the last section should scroll to the first one or not.','theplus')
                
            ]
        );
        
        $this->add_control(
			'multi_scrolling_speed',
            [
                'label'         => esc_html__('Scroll Speed', 'theplus'),
                'type'          => Controls_Manager::NUMBER,
                'title'         => esc_html__('Set scrolling speed in seconds, default: 700', 'theplus'),
                'default'       => 700,               
            ]
        );        
        $this->add_control(
			'multi_scroll_responsive_tabs',
            [
                'label'         => esc_html__('Disable on Tablet', 'theplus'),
                'type'          => Controls_Manager::SWITCHER,                
                'default'       => 'no'
            ]
        );
        
        $this->add_control('multi_scroll_responsive_mobile',
            [
                'label'         => esc_html__('Disable on Mobiles', 'theplus'),
                'type'          => Controls_Manager::SWITCHER,                
                'default'       => 'no'
            ]
        );
		$this->end_controls_section();
		/*extra option multi scroll end*/
		/************** style tag start*****************/
		/*dot style start*/
		$this->start_controls_section(
            'section_dot_styling',
            [
                'label' => esc_html__('Dot Style', 'theplus'),
                'tab' => Controls_Manager::TAB_STYLE,
				'condition'		=> [
					'page_scroll_opt' => ['tp_full_page','tp_page_pilling','tp_multi_scroll'],
				],
            ]
        );
		$this->start_controls_tabs( 'tabs_dot_style' );
		$this->start_controls_tab(
			'tab_dot_normal',
			[
				'label' => esc_html__( 'Normal', 'theplus' ),
			]
		);	
		$this->add_control(
			'dots_color_n',
			[
				'label' => esc_html__( 'Dots Color', 'theplus' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'#fp-nav ul li a span' => 'background: {{VALUE}}',
					'#pp-nav ul li a span,#multiscroll-nav ul li a span' => 'border:1px solid {{VALUE}} !important',
				],
			]
		);		
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_dot_active',
			[
				'label' => esc_html__( 'Active', 'theplus' ),
				'condition'		=> [
					'page_scroll_opt!' => ['tp_full_page'],
				],
			]
		);
		$this->add_control(
			'dots_color_h',
			[
				'label' => esc_html__( 'Dots Color', 'theplus' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'#pp-nav ul li .active span,#multiscroll-nav ul li .active span' => 'background: {{VALUE}}',					
				],
			]
		);		
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_control(
			'dots_tt_head',
			[
				'label' => esc_html__( 'Tooltip Text Option', 'theplus' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'dots_text_padding',
			[
				'label' => esc_html__( 'Padding', 'theplus' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],				
				'selectors' => [
					'#fp-nav ul li .fp-tooltip,#pp-nav ul li .pp-tooltip,#multiscroll-nav ul li .multiscroll-tooltip' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],				
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'dots_text_typo_n',
				'label' => esc_html__( 'Typography', 'theplus' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '#fp-nav ul li .fp-tooltip,#pp-nav ul li .pp-tooltip,#multiscroll-nav ul li .multiscroll-tooltip',
				
			]
		);
		$this->add_control(
			'dots_text_color_n',
			[
				'label' => esc_html__( 'Tooltip Color', 'theplus' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'#fp-nav ul li .fp-tooltip,#pp-nav ul li .pp-tooltip,#multiscroll-nav ul li .multiscroll-tooltip' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'dots_text_bg_color_n',
			[
				'label' => esc_html__( 'Tooltip Background', 'theplus' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'#fp-nav ul li .fp-tooltip,#pp-nav ul li .pp-tooltip,#multiscroll-nav ul li .multiscroll-tooltip' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'dots_tt_border',
			[
				'label'      => esc_html__( 'Border Radius', 'theplus' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'#fp-nav ul li .fp-tooltip,#pp-nav ul li .pp-tooltip,#multiscroll-nav ul li .multiscroll-tooltip' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],				
			]
		);
		$this->end_controls_section();
		/*dot style end*/
		/*next previous buton start*/
		$this->start_controls_section(
            'section_nxt_prv_styling',
            [
                'label' => esc_html__('Next Previous Button Style', 'theplus'),
                'tab' => Controls_Manager::TAB_STYLE,
				'condition'		=> [
					'page_scroll_opt' => ['tp_full_page','tp_page_pilling','tp_multi_scroll'],
					'next_prev_style!' => ['custom'],
				],
            ]
        );
		$this->start_controls_tabs( 'tabs_nxt_prv_style' );
		$this->start_controls_tab(
			'tab_np_normal',
			[
				'label' => esc_html__( 'Normal', 'theplus' ),
			]
		);
		$this->add_control(
			'np_icon_color_n',
			[
				'label' => esc_html__( 'Color', 'theplus' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'#ps{{ID}}.fp-nxt-prev.style-1 .fp-nav-btn,
					#ps{{ID}}.fp-nxt-prev.style-2 .fp-nav-btn,
					#ps{{ID}}.fp-nxt-prev.style-3 .fp-nav-btn' => 'color: {{VALUE}}',
				],
				'condition'		=> [
					'next_prev_style!' => ['style-3'],
				],
			]
		);
		$this->add_control(
			'np_st3_n_color_n',
			[
				'label' => esc_html__( 'Next Color', 'theplus' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'#ps{{ID}}.fp-nxt-prev.style-3 .fp-nav-btn.fp-nav-next' => 'color: {{VALUE}}',
				],
				'condition'		=> [
					'next_prev_style' => ['style-3'],
				],
			]
		);		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'np_st3_n_size_n',
				'selector' => '#ps{{ID}}.fp-nxt-prev.style-3 .fp-nav-btn.fp-nav-next',
				'condition' => [
					'next_prev_style' => ['style-3'],
				],
			]
		);
		$this->add_control(
			'np_st3_p_color_n',
			[
				'label' => esc_html__( 'Previous Color', 'theplus' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'#ps{{ID}}.fp-nxt-prev.style-3 .fp-nav-btn.fp-nav-prev' => 'color: {{VALUE}}',
				],
				'separator' => 'before',
				'condition'		=> [
					'next_prev_style' => ['style-3'],
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'np_st3_p_size_n',
				'selector' => '#ps{{ID}}.fp-nxt-prev.style-3 .fp-nav-btn.fp-nav-prev',
				'condition' => [
					'next_prev_style' => ['style-3'],
				],
			]
		);
		$this->add_control(
			'np_icon_bg_n',
			[
				'label' => esc_html__( 'Background', 'theplus' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{wrapper}} .fp-nxt-prev.style-1 .fp-nav-btn,
					{{wrapper}} .fp-nxt-prev.style-2 .fp-nav-btn' => 'background: {{VALUE}}',
				],
				'condition'		=> [
					'next_prev_style!' => ['style-3'],
				],
			]
		);
		$this->add_responsive_control(
			'np_icon_n_br',
			[
				'label'      => esc_html__( 'Border Radius', 'theplus' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .fp-nxt-prev.style-1 .fp-nav-btn,{{WRAPPER}} .fp-nxt-prev.style-2 .fp-nav-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'		=> [
					'next_prev_style!' => ['style-3'],
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'np_icon_n_bx_sdw',
				'selector' => '{{WRAPPER}} .fp-nxt-prev.style-1 .fp-nav-btn,{{WRAPPER}} .fp-nxt-prev.style-2 .fp-nav-btn',
				'condition'		=> [
					'next_prev_style!' => ['style-3'],
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_np_hover',
			[
				'label' => esc_html__( 'Hover', 'theplus' ),
			]
		);
		$this->add_control(
			'np_icon_color_h',
			[
				'label' => esc_html__( 'Color', 'theplus' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{wrapper}} .fp-nxt-prev.style-1 .fp-nav-btn:hover,
					{{wrapper}} .fp-nxt-prev.style-2 .fp-nav-btn:hover' => 'color: {{VALUE}}',
				],
				'condition'		=> [
					'next_prev_style!' => ['style-3'],
				],
			]
		);
		$this->add_control(
			'np_st3_n_color_h',
			[
				'label' => esc_html__( 'Next Color', 'theplus' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'#ps{{ID}}.fp-nxt-prev.style-3 .fp-nav-btn:hover.fp-nav-next' => 'color: {{VALUE}}',
				],
				'condition'		=> [
					'next_prev_style' => ['style-3'],
				],
			]
		);
		$this->add_control(
			'np_st3_p_color_h',
			[
				'label' => esc_html__( 'Previous Color', 'theplus' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'#ps{{ID}}.fp-nxt-prev.style-3 .fp-nav-btn:hover.fp-nav-prev' => 'color: {{VALUE}}',
				],
				'condition'		=> [
					'next_prev_style' => ['style-3'],
				],
			]
		);
		$this->add_control(
			'np_icon_bg_h',
			[
				'label' => esc_html__( 'Background', 'theplus' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{wrapper}} .fp-nxt-prev.style-1 .fp-nav-btn:hover,
					{{wrapper}} .fp-nxt-prev.style-2 .fp-nav-btn:hover' => 'background: {{VALUE}}',
				],
				'condition'		=> [
					'next_prev_style!' => ['style-3'],
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();		
		$this->end_controls_section();
		$this->start_controls_section(
            'section_nxt_prv_custom',
            [
                'label' => esc_html__('Next Previous Custom Style', 'theplus'),
                'tab' => Controls_Manager::TAB_STYLE,
				'condition'		=> [					
					'page_scroll_opt' => ['tp_full_page','tp_page_pilling'],			
					'next_prev_style' => ['custom'],
				],
            ]
        );
		$this->add_control(
			'fp_nxt_btn',
			[
				'label' => esc_html__( 'Next Button Size', 'theplus' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .fp-nxt-prev.custom .fp-nav-btn.fp-nav-next' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'fp_prev_btn',
			[
				'label' => esc_html__( 'Preview Button Size', 'theplus' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 35,
				],
				'selectors' => [
					'{{WRAPPER}} .fp-nxt-prev.custom .fp-nav-btn.fp-nav-prev' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		/*next previous buton end*/
		$this->start_controls_section(
            'section_paginate_custom',
            [
                'label' => esc_html__('Paginate Style', 'theplus'),
                'tab' => Controls_Manager::TAB_STYLE,
				'condition'		=> [				
					'page_scroll_opt' => ['tp_full_page','tp_page_pilling','tp_multi_scroll'],
					'show_paginate' => 'yes',
				],
            ]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'paginate_typography',
				'label' => esc_html__( 'Typography', 'theplus' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '.ps{{ID}}.fullpage-nav-paginate .slide-nav',
			]
		);
		$this->add_control(
			'paginate_color',
			[
				'label' => esc_html__( 'Current Paginate Color', 'theplus' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'.ps{{ID}}.fullpage-nav-paginate .slide-nav' => 'color: {{VALUE}}',
				],
				'separator' => 'after',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'paginate_last_typography',
				'label' => esc_html__( 'Typography', 'theplus' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '.ps{{ID}}.fullpage-nav-paginate .total-page-nav',
				
			]
		);
		$this->add_control(
			'paginate_last_color',
			[
				'label' => esc_html__( 'Total Paginate Color', 'theplus' ),
				'type' => Controls_Manager::COLOR,				
				'selectors' => [
					'.ps{{ID}}.fullpage-nav-paginate .total-page-nav' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();
		/*next previous buton end*/	
		/************** style tag end*****************/
	}
	
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$page_scroll_opt = $settings['page_scroll_opt'];
		$uid_widget=uniqid("ps");
		$id = $this->get_id();
		$data_attr='';
        $widget_id = 'ps'.$this->get_id();
		
        $multi_navigation_dots = ( 'yes' == $settings['multi_navigation_dots'] ) ? true : false;        
        $dots_text = explode(',', $settings['multi_dots_tooltips'] );
		$nav_dots_text = explode(',', $settings['nav_dots_tooltips'] );
		$top_loop = ( 'yes' == $settings['multi_loop_top'] ) ? true : false;        
        $bottom_loop = ( 'yes' == $settings['multi_loop_bottom'] ) ? true : false;
		
		if((($settings['show_paginate']=='yes' && $settings['page_scroll_opt']=='tp_full_page') 
			|| ($settings['show_paginate']=='yes' && $settings['page_scroll_opt']=='tp_page_pilling') 
			|| ($settings['show_paginate']=='yes' && $settings['page_scroll_opt']=='tp_multi_scroll')) 
			&& 
			((!empty($settings['show_paginate']) && $settings['page_scroll_opt']=='tp_full_page') 
			|| (!empty($settings['show_paginate']) && $settings['page_scroll_opt']=='tp_page_pilling')
			|| (!empty($settings['show_paginate']) && $settings['page_scroll_opt']=='tp_multi_scroll')
			)){
			$data_attr .='data-show_paginate="on"';
			$data_attr .='data-paginate_style="'.$settings['paginate_style'].'"';
			$data_attr .='data-paginate_position="'.$widget_id.' '.$settings['paginate_position'].'"';			
		}else{
			$data_attr .='data-show_paginate="off"';
		}
	
		
		
		$show_next_prev = $settings['show_next_prev'];
		$next_prev_style = $settings['next_prev_style'];
		$fp_nav_position = $settings['fp_nav_position'];		
		$next_prev_direction = $settings['next_prev_direction'];		
		$nav_prev_image = $settings['nav_prev_image']['url'];
		$nav_next_image = $settings['nav_next_image']['url'];
		$prev_size = (!empty($settings['prev_size']) && $settings['prev_size']) ? $settings['prev_size'] : '';
		$nxt_txt = (!empty($settings['nxt_txt'])) ? $settings['nxt_txt'] : '';
		$prev_txt = (!empty($settings['prev_txt'])) ? $settings['prev_txt'] : '';		
		$next_size = $settings['next_size'];
		
		
        $multi_scroll_options = [
			'multi_id'            => esc_attr( $id ),			
            'dots'          => $multi_navigation_dots,
            'dotsTooltips'      => $dots_text,
            'dotsPosition'       => $settings['multi_navigation_dots_pos'],
            'dotsVertical'       => $settings['multi_navigation_verti_dots_pos'],
            'loopTop'       => $top_loop,
            'loopBottom'       => $bottom_loop,        
            'disable_tablet'      => ( $settings['multi_scroll_responsive_tabs'] == 'yes' ) ? 'yes' : 'no',            
            'disable_mobile'      => ( $settings['multi_scroll_responsive_mobile'] == 'yes' ) ? 'yes' : 'no',            
			'keyboardScrolling'      => ( $settings['multi_keyboard_scrolling'] == 'yes' ) ? true : false,
			'scrollingSpeed' => ($settings["multi_scrolling_speed"]) ? $settings["multi_scrolling_speed"] : 700,
			'leftSide'     => !empty( $settings['multi_left_width']['size'] ) ? $settings['multi_left_width']['size'] : 50,
            'rightSide'    => !empty( $settings['multi_right_width']['size'] ) ? $settings['multi_right_width']['size'] : 50,
        ];
        
        $this->add_render_attribute( 'multi_scroll_wrapper', 'class', 'theplus-multiscroll-wrap' );
        $this->add_render_attribute( 'multi_scroll_inner', 'class', array( 'theplus-multiscroll-inner' ) );
		$this->add_render_attribute( 'multi_scroll_inner', 'id', 'theplus-multiscroll-' . $id );        
        
        $this->add_render_attribute('multi_right_template', 'class', [ 'theplus-multiscroll-temp', 'theplus-multiscroll-right-temp', 'theplus-multiscroll-temp-' . $id ] );
        $this->add_render_attribute('multi_left_template', 'class', [ 'theplus-multiscroll-temp', 'theplus-multiscroll-left-temp', 'theplus-multiscroll-temp-' . $id ] );
        
        
        $this->add_inline_editing_attributes('left_side_text', 'advanced');
        $this->add_inline_editing_attributes('right_side_text', 'advanced');
        $this->add_render_attribute('left_side_text', 'class', 'theplus-multiscroll-left-text');
        $this->add_render_attribute('right_side_text', 'class', 'theplus-multiscroll-right-text');
        $templates = $settings['multi_left_right_repeater'];
		
		/*Full Page*/
		$full_page_content='';
		$full_page_anchors=array();
		$fullpage_opt=array();
		if($page_scroll_opt=='tp_full_page'){
			if(!empty($settings["fp_content"])) {
				$i=1;
				foreach($settings["fp_content"] as $item) {
					if(!empty($item["fp_content_template"])){
						$slideid =(!empty($item['fp-slideid'])) ? $item['fp-slideid'] : 'fp_'.$id.'_'.$i;
						$full_page_anchors[] = $slideid;
						
						$full_page_content .='<div class="section">';
							$full_page_content .=Theplus_Element_Load::elementor()->frontend->get_builder_content_for_display($item["fp_content_template"]);
						$full_page_content .='</div>';
						
						$i++;
					}
				}
			}
			
			if(!empty($full_page_anchors)){				
				$fullpage_opt['anchors']=$full_page_anchors;				
			}
			$fullpage_opt["navigationTooltips"] = false;			
			
			$fullpage_opt["scrollingSpeed"] = ($settings["tp_scrolling_speed"]!='') ? $settings["tp_scrolling_speed"]: 700;
			$fullpage_opt["responsiveWidth"] = ($settings["res_width_value"]!='') ? $settings["res_width_value"]: 0;
			$fullpage_opt["loopBottom"] = ( 'yes' == $settings['tp_loop_bottom'] ) ? true : false;
			$fullpage_opt["lockAnchors"] = ( 'yes' == $settings['tp_fp_hide_hash_id'] ) ? true : false;
			$fullpage_opt["loopTop"] = ( 'yes' == $settings['tp_loop_top'] ) ? true : false;
			$fullpage_opt["continuousVertical"] = ( 'yes' == $settings['tp_continuous_vertical'] ) ? true : false;			
			$fullpage_opt["keyboardScrolling"] = ( 'yes' == $settings['tp_keyboard_scrolling'] ) ? true : false;
			
			if(($settings['show_dots']=='yes' && $settings['page_scroll_opt']=='tp_full_page') && (!empty($settings['show_dots']) && $settings['page_scroll_opt']=='tp_full_page')){
				//$data_attr .='data-nav="true"';
				$fullpage_opt["navigation"] = true;
				$fullpage_opt["navigationPosition"] = (!empty($settings['nav_postion']) && $settings['nav_postion']=='left') ? 'left' : 'right';
				$fullpage_opt['navigationTooltips']=$nav_dots_text;				
			}else{
				$fullpage_opt["navigation"] = false;
			}
			
			$data_fullpage=json_encode($fullpage_opt);
			$data_attr .= ' data-full-page-opt=\'' . $data_fullpage . '\'';
			
			if(!empty($settings['scroll_nav_connection']) && $settings['scroll_nav_connection']=='yes' && !empty($settings['scrollnav_connect_id'])){
				$data_attr .= ' data-scroll-nav-id="tp-sc-'.esc_attr($settings['scrollnav_connect_id']).'"';
			}
		}
		
		/*Page Piling*/
		$page_piling_content='';
		$page_piling_anchors=array();
		$page_piling_opt=array();
		if($page_scroll_opt=='tp_page_pilling'){
			$i=1;
			if(!empty($settings["fp_content"])) {
				$page_piling_content .= '<div id="pagepiling">';
					foreach($settings["fp_content"] as $item) {
						if(!empty($item["fp_content_template"])){
							$slideid =(!empty($item['fp-slideid'])) ? $item['fp-slideid'] : 'fp_'.$id.'_'.$i;
							$page_piling_anchors[] = $slideid;
						
							$page_piling_content .= '<div class="section pp_section">';
								$page_piling_content .= Theplus_Element_Load::elementor()->frontend->get_builder_content_for_display($item["fp_content_template"]);
							$page_piling_content .='</div>';
						}
						$i++;						
					}
				$page_piling_content .='</div>';
			}
			
			if(!empty($page_piling_anchors)){				
				$page_piling_opt['anchors']=$page_piling_anchors;
			}
			
			$page_piling_opt["scrollingSpeed"] = ($settings["tp_scrolling_speed"]!='') ? $settings["tp_scrolling_speed"]: 700;			
			$page_piling_opt["loopBottom"] = ( 'yes' == $settings['tp_loop_bottom'] ) ? true : false;
			$page_piling_opt["loopTop"] = ( 'yes' == $settings['tp_loop_top'] ) ? true : false;			
			
			$page_piling_opt["pp_tablet_off"] = ( 'yes' == $settings['tp_tablet_off'] ) ? 'yes' : 'no';
			$page_piling_opt["pp_mobile_off"] = ( 'yes' == $settings['tp_mobile_off'] ) ? 'yes' : 'no';
			
			$page_piling_opt["keyboardScrolling"] = ( 'yes' == $settings['tp_keyboard_scrolling'] ) ? true : false;
			$page_piling_opt['direction']=(!empty($settings["tp_direction"])) ? $settings["tp_direction"] : 'vertical';
			
		
			if(($settings['show_dots']=='yes' && $settings['page_scroll_opt']=='tp_page_pilling') && (!empty($settings['show_dots']) && $settings['page_scroll_opt']=='tp_page_pilling')){				
				$page_piling_opt["navigation"]["display"] = true;
				$page_piling_opt["navigation"]["position"] = (!empty($settings['nav_postion']) && $settings['nav_postion']=='left') ? 'left' : 'right';
				$page_piling_opt["navigation"]["tooltips"]=$nav_dots_text;
			}else{				
				$page_piling_opt["navigation"]["display"] = false;
				$page_piling_opt["navigation"]["position"] ='';
				$page_piling_opt["navigation"]["tooltips"]='';
			}
		
			$pagepiling_opt=json_encode($page_piling_opt);
			$data_attr .= ' data-page-piling-opt=\'' . $pagepiling_opt . '\'';
			
			if(!empty($settings['scroll_nav_connection']) && $settings['scroll_nav_connection']=='yes' && !empty($settings['scrollnav_connect_id'])){
				$data_attr .= ' data-scroll-nav-id="tp-sc-'.esc_attr($settings['scrollnav_connect_id']).'"';
			}
		}
		
		//Multiscroll
		$multiscroll_anchors = array();
		$multi_scroll_opt=array();
		if($page_scroll_opt=='tp_multi_scroll'){
			if(!empty($settings["multi_left_right_repeater"])) {
				$i=1;
				foreach($settings["multi_left_right_repeater"] as $item) {
					if(!empty($item["multi_left_template"]) && !empty($item["multi_right_template"])){
						$slideid =(!empty($item['fp-slideid'])) ? $item['fp-slideid'] : 'fp_'.$id.'_'.$i;
						$multiscroll_anchors[] = $slideid;
					}
					$i++;
				}
			}
			
			if(!empty($multiscroll_anchors)){
				$multi_scroll_opt['anchors']=$multiscroll_anchors;
			}
			
			$multiscroll_opt=json_encode($multi_scroll_opt);
			
			$data_attr .= ' data-multi-scroll-opt=\'' . $multiscroll_opt . '\'';
			if(!empty($settings['scroll_nav_connection']) && $settings['scroll_nav_connection']=='yes' && !empty($settings['scrollnav_connect_id'])){
				$data_attr .= ' data-scroll-nav-id="tp-sc-'.esc_attr($settings['scrollnav_connect_id']).'"';
			}
		}
		$pp_tab_off=$pp_mob_off='';
		if((!empty($settings['tp_tablet_off']) && $settings['tp_tablet_off']=='yes') || (!empty($settings['multi_scroll_responsive_tabs']) && $settings['multi_scroll_responsive_tabs']=='yes')){
			$pp_tab_off = 'tp_tablet_off';
		}
		
		if((!empty($settings['tp_mobile_off']) && $settings['tp_mobile_off']=='yes') || (!empty($settings['multi_scroll_responsive_mobile']) && $settings['multi_scroll_responsive_mobile']=='yes')){
			$pp_mob_off = 'tp_mobile_off';
		}
		echo '<div id="'.$uid_widget.'" class="tp-page-scroll-wrapper '.$uid_widget.' '.$page_scroll_opt.' '.$pp_tab_off.' '.$pp_mob_off.'" data-id="'.$uid_widget.'" data-option="'.esc_attr($page_scroll_opt).'" '.$data_attr.'>';
		
			if($page_scroll_opt=='tp_full_page'){
				echo $full_page_content;
			}
			if($page_scroll_opt=='tp_page_pilling'){
				echo $page_piling_content;
			}
			if($page_scroll_opt=='tp_multi_scroll'){ ?>
				<div <?php echo $this->get_render_attribute_string('multi_scroll_wrapper'); ?> data-settings='<?php echo wp_json_encode($multi_scroll_options); ?>'>			
					<div <?php echo $this->get_render_attribute_string('multi_scroll_inner'); ?>>
						<div class="<?php echo 'theplus-multiscroll-left-' . esc_attr($id); ?>">
							<?php foreach( $templates as $index => $section ) : ?>
							<div <?php echo $this->get_render_attribute_string('multi_left_template'); ?>>
								<?php
								
									if(!empty($section['multi_left_template']) ){
										echo Theplus_Element_Load::elementor()->frontend->get_builder_content_for_display($section['multi_left_template']);
									}
								?>
							</div>
							<?php endforeach; ?>
						</div>
						<div class="<?php echo 'theplus-multiscroll-right-' . esc_attr($id); ?>">
							<?php foreach( $templates as $index => $section ) : ?>
							<div <?php echo $this->get_render_attribute_string('multi_right_template'); ?>>
								<?php                        
									if(!empty($section['multi_right_template'])){
										echo Theplus_Element_Load::elementor()->frontend->get_builder_content_for_display($section['multi_right_template']);
									}
								?>
							</div>
							<?php endforeach; ?>					
						</div>
					</div>
				</div>
			<?php
			}
			
		echo '</div>';
		
		$mob_hidden_class = '';
		if($settings['multi_scroll_responsive_mobile']=='yes'){
			$mob_hidden_class = 'ms-mobs-hidd';
		}
		
		$tabs_hidden_class = '';
		if($settings['multi_scroll_responsive_tabs']=='yes'){
			$tabs_hidden_class = 'ms-tabs-hidd';
		}
		
		
		if(!empty($show_next_prev) && $show_next_prev=='yes'){		
			echo '<div id="ps'.$id.'" class="fp-nxt-prev '.esc_attr($mob_hidden_class).' '.esc_attr($tabs_hidden_class).' '.esc_attr($next_prev_style).' '.esc_attr($fp_nav_position).' '.esc_attr($next_prev_direction).'">';
				if($next_prev_style=='style-1' || $next_prev_style=='style-2'){
					echo '<div class="fp-nav-btn fp-nav-prev '.esc_attr($prev_size).'"><i class="fa fa-angle-left" aria-hidden="true"></i></div>';
					echo '<div class="fp-nav-btn fp-nav-next '.esc_attr($next_size).'"><i class="fa fa-angle-right" aria-hidden="true"></i></div>';
				}elseif($next_prev_style=='style-3'){
					echo '<div class="fp-nav-btn fp-nav-prev">'.esc_attr($prev_txt).'</div>';
					echo '<div class="fp-nav-btn fp-nav-next">'.esc_attr($nxt_txt).'</div>';
				}elseif($next_prev_style=='custom' && !empty($nav_prev_image) && !empty($nav_next_image)){			
					echo '<div class="fp-nav-btn fp-nav-prev"><img src="'.esc_url($nav_prev_image).'"></div>';
					echo '<div class="fp-nav-btn fp-nav-next"><img src="'.esc_url($nav_next_image).'"></div>';
				}
			echo '</div>';
		}
	}
}