<?php

class DINA_Logo_Slider extends DINA_Divi_Nations_Modules_Core
{

    protected $module_credits = array(
        'module_uri' => 'https://divi-nations/modules/logo-slider/',
        'author'     => 'Divi Nations',
        'author_uri' => 'https://divi-nations.com/',
    );

    public function init() {
        $this->name        = esc_html__('Logo Slider', 'divi_nations');
        $this->icon_path   = plugin_dir_path(__FILE__) . 'icon.svg';
        $this->slug        = 'dina_logo_slider';
        $this->child_slug  = 'dina_logo_slider_child';
        $this->vb_support  = 'on';
        $this->folder_name = 'Divi Nations';

        $this->settings_modal_toggles = array(
            'general'                       => array(
                'toggles'                   => array(
                    'content'               => esc_html__('Content', 'divi_nations'),
                    'slider_settings'       => esc_html__( 'Slider Settings', 'divi_nations' ),
                    'navigation_settings'       => esc_html__( 'Navigation Settings', 'divi_nations' ),
                ),
            ),
            'advanced'                      => array(
                'toggles'                   => array(
                    'image_border'          => esc_html__( 'Image Border', 'divi_nations' ),
                    'navigations'          => esc_html__( 'Navigations', 'divi_nations' ),
                    'arrows'          => esc_html__( 'Arrows', 'divi_nations' ),
                ),
            ),
        );
    }


    public function get_fields() {

        $et_accent_color = et_builder_accent_color();

        $slider_settings = array(
            'autoplay'            => array(
                'label'           => esc_html__('Autoplay', 'divi_nations'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__('Content entered here will appear inside the module.', 'divi_nations'),
                'options'         => array(
                    'on'          => esc_html__('Yes', 'divi_nations'),
                    'off'         => esc_html__('No', 'divi_nations'),
                ),
                'default'         => 'on',
                'toggle_slug'     => 'slider_settings',
            ),
            'autoplay_delay'      => array(
                'label'           => esc_html__('Autoplay Delay', 'divi_nations'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Adjust the autoplay delay in milliseconds (ms)', 'divi_nations'),
                'default'         => '2000',
                'toggle_slug'     => 'slider_settings',
                'show_if'         => array(
                    'autoplay'    => 'on'
                )
            ),
            'loop'                => array(
                'label'           => esc_html__('Loop', 'divi_nations'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__('Content entered here will appear inside the module.', 'divi_nations'),
                'options'         => array(
                    'on'          => esc_html__('Yes', 'divi_nations'),
                    'off'         => esc_html__('No', 'divi_nations'),
                ),
                'default'         => 'off',
                'toggle_slug'     => 'slider_settings',
            ),
            'centered_mode'       => array(
                'label'           => esc_html__('Center Slide', 'divi_nations'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__('Content entered here will appear inside the module.', 'divi_nations'),
                'options'         => array(
                    'on'          => esc_html__('Yes', 'divi_nations'),
                    'off'         => esc_html__('No', 'divi_nations'),
                ),
                'default'         => 'off',
                'toggle_slug'     => 'slider_settings',
            ),

            'pause_on_hover'      => array(
                'label'           => esc_html__('Pause On Hover', 'divi_nations'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__('Enable this option if you want to pause the slider on mouse hover', 'divi_nations'),
                'options'         => array(
                    'on'          => esc_html__('Yes', 'divi_nations'),
                    'off'         => esc_html__('No', 'divi_nations'),
                ),
                'default'         => 'on',
                'toggle_slug'     => 'slider_settings',
                'show_if'         => array(
                    'autoplay'    => 'on'
                )
            ),

            'is_grab'             => array(
                'label'           => esc_html__('Use Grab Cursor', 'divi_nations'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__('Content entered here will appear inside the module.', 'divi_nations'),
                'options'         => array(
                    'on'          => esc_html__('Yes', 'divi_nations'),
                    'off'         => esc_html__('No', 'divi_nations'),
                ),
                'default'         => 'off',
                'toggle_slug'     => 'slider_settings',
            ),
            'slider_speed'        => array(
                'label'           => esc_html__('Speed', 'divi_nations'),
                'type'            => 'range',
                'option_category' => 'basic_option',
                'range_settings'  => array(
                    'step'        => 1,
                    'min'         => 1,
                    'max'         => 1000,
                ),
                'default'         => '500',
                'fixed_unit'      => '',
                'validate_unit'   => false,
                'unitless'        => true,
                'toggle_slug'     => 'slider_settings',
            ),
            'space_between'       => array(
                'label'           => esc_html__('Space Between', 'divi_nations'),
                'type'            => 'range',
                'option_category' => 'basic_option',
                'range_settings'  => array(
                    'step'        => 1,
                    'min'         => 1,
                    'max'         => 300,
                ),
                'default'         => '15px',
                'default_unit'         => 'px',
                'toggle_slug'     => 'slider_settings',
                'mobile_options'  => true,
            ),

            'rtl'                 => array(
                'label'           => esc_html__('RTL (Slide Right to Left)', 'divi_nations'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__('Turn on if you want to Slide Right to Left', 'divi_nations'),
                'options'         => array(
                    'on'          => esc_html__('Yes', 'divi_nations'),
                    'off'         => esc_html__('No', 'divi_nations'),
                ),
                'default'         => 'off',
                'toggle_slug'                  => 'slider_settings',
            ),

        );

        $controllar = array(
            'is_dots'         => array(
                'label'       => esc_html__('Show Navigation', 'divi_nations'),
                'type'        => 'yes_no_button',
                'description' => esc_html__('Turn on if you want to display slider navigation dots', 'divi_nations'),
                'options'     => array(
                    'on'      => esc_html__('Yes', 'divi_nations'),
                    'off'     => esc_html__('No', 'divi_nations'),
                ),
                'default'     => 'on',
                'toggle_slug' => 'navigation_settings',
            ),

            'is_arrows'       => array(
                'label'       => esc_html__('Show Arrows', 'divi_nations'),
                'type'        => 'yes_no_button',
                'description' => esc_html__('Turn on if you want to display slider arrows', 'divi_nations'),
                'options'     => array(
                    'on'      => esc_html__('Yes', 'divi_nations'),
                    'off'     => esc_html__('No', 'divi_nations'),
                ),
                'default'     => 'on',
                'toggle_slug' => 'navigation_settings',
            ),

            'arrow_show_on_hover'       => array(
                'label'       => esc_html__('Show Arrows on Hover', 'divi_nations'),
                'type'        => 'yes_no_button',
                'description' => esc_html__('Turn on if you want to show arrows on hover the slider', 'divi_nations'),
                'options'     => array(
                    'on'      => esc_html__('Yes', 'divi_nations'),
                    'off'     => esc_html__('No', 'divi_nations'),
                ),
                'default'     => 'on',
                'toggle_slug' => 'navigation_settings',
                'show_if'       => array(
                    'is_arrows' => 'on'
                )
            ),

        );

        $arrows = array(
            'prev_icon'     => array(
                'label'           => esc_html__( 'Prevous Icon', 'divi_nations' ),
                'description'     => esc_html__( 'Change previous arrow icon', 'divi_nations' ),
                'type'            => 'select_icon',
                'default'         => '&#x34;||divi||400',
                'toggle_slug'     => 'navigation_settings',
                'show_if'         => array(
                    'is_arrows'   => 'on'
                )
            ),

            'next_icon'     => array(
                'label'           => esc_html__( 'Next Icon', 'divi_nations' ),
                'description'     => esc_html__( 'Change next arrow icon', 'divi_nations' ),
                'type'            => 'select_icon',
                'default'         => '&#x35;||divi||400',
                'toggle_slug'     => 'navigation_settings',
                'show_if'         => array(
                    'is_arrows'   => 'on'
                )
            ),

            'icon_color'         => array(
                'label'          => esc_html__( 'Icon Color', 'divi_nations' ),
                'description'    => esc_html__( 'Define arrows icon color', 'divi_nations' ),
                'type'           => 'color-alpha',
                'default'        => $et_accent_color,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'arrows',
                'hover'          => 'tabs',
                'mobile_options' => true,
                'show_if'         => array(
                    'is_arrows'   => 'on'
                )
            ),

            'icon_bg'            => array(
                'label'          => esc_html__( 'Icon Background', 'divi_nations' ),
                'description'    => esc_html__( 'Define arrows iocn background color', 'divi_nations' ),
                'type'           => 'color-alpha',
                'default'        => '',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'arrows',
                'hover'          => 'tabs',
                'mobile_options' => true,
                'show_if'         => array(
                    'is_arrows'   => 'on'
                )
            ),

            'icon_size'          => array(
                'label'          => esc_html__( 'Icon Size', 'divi_nations' ),
                'description'    => esc_html__( 'Here you can change your arrows icon size.', 'divi_nations' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '20px',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'        => 10,
                    'step'       => 1,
                    'max'        => 250,
                ),
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'arrows',
                'show_if'         => array(
                    'is_arrows'   => 'on'
                )
            ),
            'icon_padding'        => array(
                'label'                => esc_html__( 'Icon Padding', 'divi_nations' ),
                'description'          => esc_html__( 'Define custom padding for arrow icon', 'divi_nations' ),
                'type'                 => 'custom_padding',
                'tab_slug'             => 'advanced',
                'toggle_slug'          => 'arrows',
                'sub_toggle'           => 'back',
                'default'              => '0px|0px|0px|0px',
                'mobile_options'       => true,
                'show_if'         => array(
                    'is_arrows'   => 'on'
                )
            ),

            'icon_margin'         => array(
                'label'                => esc_html__( 'Icon Margin', 'divi_nations' ),
                'description'          => esc_html__( 'Define custom margin for arrow icon', 'divi_nations' ),
                'type'                 => 'custom_margin',
                'tab_slug'             => 'advanced',
                'toggle_slug'          => 'arrows',
                'sub_toggle'           => 'back',
                'default'              => '0px|0px|0px|0px',
                'mobile_options'       => true,
                'show_if'         => array(
                    'is_arrows'   => 'on'
                )
            ),
        );

        $dots = array(

        );

        return array_merge($slider_settings, $controllar, $arrows, $dots);
    }

    public function get_advanced_fields_config() {

        // Get theme accent color
        $et_accent_color = et_builder_accent_color();

        $advanced_fields                   = array();
        $advanced_fields[ 'text' ]         = false;
        $advanced_fields[ 'text_shadow' ]  = false;
        $advanced_fields[ 'fonts' ]        = false;

        $advanced_fields[ 'borders' ][ 'arrow_icon' ] = array(
            'label_prefix'          => esc_html__('Arrow Icon', 'divi_nations'),
            'tab_slug'              => 'advanced',
            'toggle_slug'           => 'arrows', 
            'css'                   => array(
                'main'              => array(
                    'border_radii'  => '%%order_class%% .dina_slider_icon',
                    'border_styles' => '%%order_class%% .dina_slider_icon',
                ),
                'important'         => false,
            ),
            'defaults'              => array(
                'border_radii'      => 'on|0px|0px|0px|0px',
                'border_styles'     => array(
                    'width'         => '0px',
                    'color'         => $et_accent_color,
                    'style'         => 'solid',
                ),
            ),
        );

        return $advanced_fields;
        
    }

    public function render_prev_icon() {

        // Inject Font Awesome Manually!.
        dina_inject_fontawesome_icons($this->props['prev_icon']);

        $icon_name = esc_attr(et_pb_process_font_icon($this->props['prev_icon']));

        return sprintf(
            '<button class="dina_slider_icon dina_prev_icon">
                <i class="dina_icon">%1$s</i>
            </button>',
            $icon_name
        );
    }

    public function render_next_icon() {

        // Inject Font Awesome Manually!.
        dina_inject_fontawesome_icons($this->props['next_icon']);

        $icon_name = esc_attr(et_pb_process_font_icon($this->props['next_icon']));

        return sprintf(
            '<button class="dina_slider_icon dina_next_icon">
                <i class="dina_icon">%1$s</i>
            </button>',
            $icon_name
        );
    }

    public function render($attrs, $content ,$render_slug) {

        $show_on_hover = $this->props['arrow_show_on_hover'] === 'on' ? 'show-arrow-on-hover': '';
        
        // Enqueue slick slider css and js
        wp_enqueue_style('dina-slick');
        wp_enqueue_script('dina-slick');
        wp_enqueue_script('dina-slick-logo-slider');

        $this->render_css($render_slug);

        // Logo silder settings
        $data = [
            'spaceBetween'   => $this->props['space_between'],
            'dots'           => $this->props['is_dots']        === 'on' ? true: false,
            'arrows'         => $this->props['is_arrows']      === 'on' ? true: false,
            'autoplay'       => $this->props['autoplay']       === 'on' ? true: false,
            'autoplaySpeed'  => intval($this->props['autoplay_delay']),
            'centerMode'     => $this->props['centered_mode']  === 'on' ? true: false,
            'centerPadding'  => '50px',
            'draggable'      => $this->props['is_grab']        === 'on' ? true: false,
            'easing'         => 'linear',
            'infinite'       => $this->props['loop']           === 'on' ? true: false,
            'initialSlide'   => 0,
            'pauseOnHover'   => $this->props['pause_on_hover'] === 'on' ? true: false,
            'rtl'            => $this->props['rtl']            === 'on' ? true: false,
            'slidesToScroll' => 1,
            'slidesToShow'   => 3,
            'speed'          => intval($this->props['slider_speed']),
            'vertical'       => false,
            'prevArrow'      => $this->render_prev_icon(),
            'nextArrow'      => $this->render_next_icon(),
            'responsive'     => [
                
                [
                    'breakpont' => 980,
                    'settings'  => [
                        'slidesToScroll' => 1,
                        'slidesToShow'   => 2,
                    ],
                ],
                [
                    'breakpont' => 767,
                    'settings'  => [
                        'slidesToScroll' => 1,
                        'slidesToShow'   => 1,
                    ],
                ],
            ]

        ];
        
        return sprintf(
            '<div class="dina_logo_slider-container %3$s" data-settings=\'%2$s\'> 
                %1$s 
            </div>',
            $this->content,
            wp_json_encode($data),
            $show_on_hover
            
        );
    }

   public function render_css($render_slug) {

        $this->generate_styles(
            array(
                'utility_arg'    => 'icon_font_family',
                'render_slug'    => $render_slug,
                'base_attr_name' => 'prev_icon',
                'important'      => true,
                'selector'       => '%%order_class%% .dina_slider_icon .dina_icon',
                'processor'      => array(
                    'ET_Builder_Module_Helper_Style_Processor',
                    'process_extended_icon',
                ),
            )
        );

        // Icon
        $this->dina_set_responsive_css(array(
            'render_slug'   => $render_slug,
            'option_slug'   => 'icon_size',
            'property'      => 'font-size',
            'selector'      => '%%order_class%% .dina_slider_icon i.dina_icon',
        ));

        $this->dina_set_responsive_css(array(
            'render_slug'   => $render_slug,
            'option_slug'   => 'icon_bg',
            'property'      => 'background',
            'selector'      => '%%order_class%% .dina_slider_icon',
        ));

        $this->dina_set_responsive_css(array(
            'render_slug'   => $render_slug,
            'option_slug'   => 'icon_color',
            'property'      => 'color',
            'selector'      => '%%order_class%% .dina_slider_icon i.dina_icon',
        ));

        $this->dina_set_responsive_css(array(
            'render_slug'   => $render_slug,
            'option_slug'   => 'icon_padding',
            'property'      => 'padding',
            'selector'      => '%%order_class%% .dina_slider_icon',
        ));

        $this->dina_set_responsive_css(array(
            'render_slug'   => $render_slug,
            'option_slug'   => 'icon_margin',
            'property'      => 'margin',
            'selector'      => '%%order_class%% .dina_slider_icon',
        ));
   }
}

new DINA_Logo_Slider();