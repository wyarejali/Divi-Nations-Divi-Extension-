<?php

class DINA_Divider extends DINA_Divi_Nations_Modules_Core {

    protected $module_credits = array(
        'module_uri'        => DIVI_NATIONS_BASE_URL . '/module/advanced-divider/',
        'author'            => 'Divi Nations',
        'author_uri'        => DIVI_NATIONS_BASE_URL,
    );

    public function init()
    {
        $this->name        = esc_html__( 'Advanced Divider', 'divi_nations' );
        $this->slug        = 'dina_divider';
        $this->vb_support  = 'on';
        $this->folder_name = 'Divi Nations';
        $this->icon_path   = plugin_dir_path(__FILE__) . 'icon.svg';

        $this->settings_modal_toggles = array(
            'general'                       => array(
                'toggles'                   => array(
                    'content'               => esc_html__( 'Content', 'divi_nations' ),
                ),
            ),
            'advanced'                      => array(
                'toggles'                   => array(
                    'divider'               => esc_html__( 'Divider', 'divi_nations' ),
                    'divider_text'          => array(
                        'title'             => esc_html__( 'Divider Text', 'divi_nations' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'text'          => array(
                                'name'      => esc_html__( 'Text', 'divi_nations' ),
                            ),
                            'style'         => array(
                                'name'      => esc_html__( 'Style', 'divi_nations' ),
                            ),
                        )
                    ),
                    'icon'                  => esc_html__( 'Icon', 'divi_nations' ),
                ),
            ),
        );
    }

    public function get_fields() {
        $et_accent_color = et_builder_accent_color();

        $content = array(
            'use_text'            => array(
                'label'           => esc_html__( 'Use Text', 'divi_nations' ),
                'description'     => esc_html__( 'Define content type icon/text', 'divi_nations' ), 'type' => 'yes_no_button',
                'toggle_slug'     => 'content',
                'option_category' => 'configuration',
                'options'         => array(
                    'on'          => esc_html__( 'Yes', 'divi_nations' ),
                    'off'         => esc_html__( 'No', 'divi_nations' ),
                ),
                'default'         => 'off',
            ),
            'divider_icon'        => array(
                'label'           => esc_html__( 'Icon', 'divi_nations' ),
                'description'     => esc_html__( 'Define divider icon', 'divi_nations' ),
                'type'            => 'select_icon',
                'default'         => '&#x2b;||divi||400',
                'toggle_slug'     => 'content',
                'show_if'         => array(
                    'use_text'    => 'off'
                )
            ),
            'divider_text'        => array(
                'label'           => esc_html__( 'Divider Text', 'divi_nations' ),
                'description'     => esc_html__( 'Enter your divider text here', 'divi_nations' ),
                'type'            => 'text',
                'default'         => 'Divider Text',
                'toggle_slug'     => 'content',
                'show_if'         => array(
                    'use_text'    => 'on'
                ),
            ),
        );

        $styles = array(
            'icon_color'         => array(
                'label'          => esc_html__( 'Icon Color', 'divi_nations' ),
                'description'    => esc_html__( 'Define divider icon color', 'divi_nations' ),
                'type'           => 'color-alpha',
                'default'        => $et_accent_color,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'show_if'        => array(
                    'use_text'   => 'off'
                )
            ),

            'icon_bg'            => array(
                'label'          => esc_html__( 'Icon Background', 'divi_nations' ),
                'description'    => esc_html__( 'Define divider iocn background color', 'divi_nations' ),
                'type'           => 'color-alpha',
                'default'        => '',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'show_if'        => array(
                    'use_text'   => 'off'
                ),
                'hover'          => 'tabs'
            ),

            'icon_size'          => array(
                'label'          => esc_html__( 'Icon Size', 'divi_nations' ),
                'description'    => esc_html__( 'Here you can change your divider icon size.', 'divi_nations' ),
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
                'toggle_slug'    => 'icon',
                'show_if'        => array(
                    'use_text'   => 'off',
                ),
            ),
        
            'icon_width'        => array(
                'label'          => esc_html__( 'Icon width', 'divi_nations' ),
                'description'    => esc_html__( 'Here you can change your divider icon width.', 'divi_nations' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '40px',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'        => 0,
                    'step'       => 1,
                    'max'        => 500,
                ),
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'show_if'        => array(
                    'use_text'   => 'off',
                ),
            ),

            'icon_height'        => array(
                'label'          => esc_html__( 'Icon height', 'divi_nations' ),
                'description'    => esc_html__( 'Here you can change your divider icon height.', 'divi_nations' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '40px',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'        => 0,
                    'step'       => 1,
                    'max'        => 500,
                ),
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'show_if'        => array(
                    'use_text'   => 'off',
                ),
            ),

            'icon_padding'       => array(
                'label'          => esc_html__( 'Padding', 'divi_nations' ),
                'description'    => esc_html__( 'Define custom padding for divider icon', 'divi_nations' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'default'        => '20px|20px|20px|20px',
                'mobile_options' => true,
                'show_if'        => array(
                    'use_text'   => 'off',
                ),
            ),

            'divider_color'      => array(
                'label'          => esc_html__( 'Divider Color', 'divi_nations' ),
                'discription'    => esc_html__( 'Define the divi line color', 'divi_nations' ),
                'type'           => 'color-alpha',
                'default'        => $et_accent_color,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider',
                'default'        => '#0dc8f1',

            ),

            'divider_style'      => array(
                'label'          => esc_html__( 'Divider Style', 'divi_nations' ),
                'description'    => esc_html__( 'Define the divider style', 'divi_nations' ),
                'type'           => 'select',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider',
                'options'        => array(
                    'dotted'     => esc_html__( 'Dotted', 'divi_nations' ),
                    'dashed'     => esc_html__( 'Dashed', 'divi_nations' ),
                    'solid'      => esc_html__( 'Solid', 'divi_nations' ),
                    'double'     => esc_html__( 'Double', 'divi_nations' ),
                    'groove'     => esc_html__( 'Groove', 'divi_nations' ),
                    'ridge'      => esc_html__( 'Ridge', 'divi_nations' ),
                    'inset'      => esc_html__( 'Inset', 'divi_nations' ),
                    'outset'     => esc_html__( 'Outset', 'divi_nations' ),
                    'none'       => esc_html__( 'None', 'divi_nations' ),
                ),
                'default'        => 'solid',
                'mobile_options' => true,
            ),
            'divider_position'   => array(
                'label'          => esc_html__( 'Divider Postions', 'divi_nations' ),
                'description'    => esc_html__( 'Define the divider positions', 'divi_nations' ),
                'type'           => 'select',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider',
                'options'        => array(
                    'flex-start' => esc_html__( 'Top', 'divi_nations' ),
                    'center'     => esc_html__( 'Vertically Center', 'divi_nations' ),
                    'flex-end'   => esc_html__( 'Bottom', 'divi_nations' ),
                ),
                'default'        => 'center',
                'mobile_options' => true,
            ),
            'divider_weight'     => array(
                'label'          => esc_html__( 'Divider Weight', 'divi_nations' ),
                'description'    => esc_html__( 'Define space between divider and text/icon', 'divi_nations' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'range_settings' => array(
                    'min'        => 0,
                    'step'       => 1,
                    'max'        => 250,
                ),
                'default'        => '1px',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider',
                'mobile_options' => true,
            ),
            'divider_gap'        => array(
                'label'          => esc_html__( 'Divider Space', 'divi_nations' ),
                'description'    => esc_html__( 'Define space between divider and text/icon', 'divi_nations' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'range_settings' => array(
                    'min'        => 0,
                    'step'       => 1,
                    'max'        => 250,
                ),
                'default'        => '15px',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider',
                'mobile_options' => true,
            ),

            'text_bg'            => array(
                'label'          => esc_html__( 'Text Background', 'divi_nations' ),
                'description'    => esc_html__( 'Define divider text background color', 'divi_nations' ),
                'type'           => 'color-alpha',
                'default'        => '',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider_text',
                'sub_toggle'     => 'style',
                'show_if'        => array(
                    'use_text'   => 'on'
                )
            ),

            'text_padding'       => array(
                'label'          => esc_html__( 'Text Padding', 'divi_nations' ),
                'description'    => esc_html__( 'Define custom padding for divider text', 'divi_nations' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider_text',
                'sub_toggle'     => 'style',
                'default'        => '6px|10px|6px|10px',
                'mobile_options' => true,
                'show_if'        => array(
                    'use_text'   => 'on',
                ),
            ),

        );

        return array_merge($content, $styles);
    }

    public function get_advanced_fields_config() {

        $et_accent_color = et_builder_accent_color();

        $advanced_fields                = array();
        $advanced_fields['text']        = false;
        $advanced_fields['text_shadow'] = false;
        $advanced_fields['fonts']       = array();

        $advanced_fields['fonts']['divider_text'] = array(
            'label'             => esc_html__( 'Divider', 'divi_nations' ),
            'css'               => array(
                'main'          => '%%order_class%% .dina_divider_wrapper .dina_divider-title',
                'important'     => 'all',
            ),
            'header_level'      => array(
                'default'       => 'h3',
            ),
            'font_size'         => array(
                'default'       => '26px',
            ),
            'tab_slug'          => 'advanced',
            'toggle_slug'       => 'divider_text',
            'sub_toggle'        => 'text',
            'show_if'           => array(
                'use_text'      => 'on'
            )
        );

        $advanced_fields['borders']['divider_icon'] = array(
            'label_prefix'          => esc_html__( 'Icon', 'divi_nations' ),
            'toggle_slug'           => 'icon',
            'css'                   => array(
                'main'              => array(
                    'border_radii'  => '%%order_class%% .dina_divider_icon',
                    'border_styles' => '%%order_class%% .dina_divider_icon',
                ),
                'important'         => 'all',
            ),
            'defaults'              => array(
                'border_radii'      => 'on|0px|0px|0px|0px',
                'border_styles'     => array(
                    'width'         => '0px',
                    'color'         => $et_accent_color,
                    'style'         => 'none',
                ),
            ),
            'show_if'               => array(
                'use_text'          => 'off',
            )
        );
        $advanced_fields['borders']['divider_text'] = array(
            'label_prefix'          => esc_html__( 'Divider Text', 'divi_nations' ),
            'toggle_slug'           => 'divider_text',
            'sub_toggle'            => 'style',
            'css'                   => array(
                'main'              => array(
                    'border_radii'  => '%%order_class%% .dina_divider-title',
                    'border_styles' => '%%order_class%% .dina_divider-title',
                ),
                'important'         => 'all',
            ),
            'defaults'              => array(
                'border_radii'      => 'on|0px|0px|0px|0px',
                'border_styles'     => array(
                    'width'         => '0px',
                    'color'         => $et_accent_color,
                    'style'         => 'none',
                ),
            ),
        );

        return $advanced_fields;
    }

    public function render_icon() {

        // Inject Font Awesome Manually!.
        dina_inject_fontawesome_icons($this->props['divider_icon']);

        $icon_name = esc_attr(et_pb_process_font_icon($this->props['divider_icon']));

        return sprintf(
            '<div class="dina_divider_icon">
                <i class="dina_icon">%1$s</i>
            </div>',
            $icon_name
        );
    }

    public function render_heading() {

        $heading = $this->props['divider_text'];
        $heading_level = et_pb_process_header_level($this->props['divider_text_level'], 'h3' );

        return sprintf(
            '<%1$s class="dina_divider-title">%2$s</%1$s>',
            $heading_level,
            $heading
        );
    }

    public function render_content() {

        $is_text = $this->props['use_text'];

        if ($is_text === 'on' ) {
            return $this->render_heading();
        }

        return $this->render_icon();
    }

    public function render($attrs, $content, $render_slug) {

        $this->render_css($render_slug);
        $dividier_position = $this->props['divider_position'];
        $classes = array();
        array_push($classes, 'dina_divider-' . $dividier_position);

        return sprintf(
            '<div class="dina_divider_wrapper %1$s">
                <div class="dina_divider-before dina_divider"></div>
                %2$s
                <div class="dina_divider-after dina_divider"></div>
            </div>',
            join( ' ', $classes), // 1
            $this->render_content(), // 2
        );
    }

    public function render_css($render_slug) {
 
        $divider_style  = $this->props['divider_style'];
        $divider_weight = $this->props['divider_weight'];
        $divider_color  = $this->props['divider_color'];
        $icon_color     = $this->props['icon_color'];
        $icon_bg        = $this->props['icon_bg']; 
        $text_bg        = $this->props['text_bg'];

        $this->generate_styles(
            array(
                'utility_arg'    => 'icon_font_family',
                'render_slug'    => $render_slug,
                'base_attr_name' => 'divider_icon',
                'important'      => true,
                'selector'       => '%%order_class%% .dina_icon',
                'processor'      => array(
                    'ET_Builder_Module_Helper_Style_Processor',
                    'process_extended_icon',
                ),
            )
        );

        ET_Builder_Element::set_style(
            $render_slug,
            array(
                'selector' => '%%order_class%% .dina_divider',
                'declaration' => sprintf(
                    'border-top-style: %1$s; border-top-width: %2$s; border-top-color: %3$s',
                    $divider_style,
                    $divider_weight,
                    $divider_color
                ),
            )
        );

        ET_Builder_Element::set_style(
            $render_slug,
            array(
                'selector' => '%%order_class%% .dina_divider_icon i.dina_icon',
                'declaration' => sprintf(
                    'color: %1$s;',
                    $icon_color
                ),
            )
        );

        ET_Builder_Element::set_style(
            $render_slug,
            array(
                'selector' => '%%order_class%% .dina_divider_icon',
                'declaration' => sprintf(
                    'background-color: %1$s;',
                    $icon_bg
                ),
            )
        );

        $this->dina_set_responsive_css(array(
            'render_slug'   => $render_slug,
            'option_slug'   => 'divider_gap',
            'property'      => 'gap',
            'selector'      => '%%order_class%% .dina_divider_wrapper',

        ));

        $this->dina_set_responsive_css(array(
            'render_slug'   => $render_slug,
            'option_slug'   => 'icon_padding',
            'property'      => 'padding',
            'selector'      => '%%order_class%% .dina_divider_icon',

        ));

        $this->dina_set_responsive_css(array(
            'render_slug'   => $render_slug,
            'option_slug'   => 'icon_width',
            'property'      => 'width',
            'selector'      => '%%order_class%% .dina_divider_icon',

        ));

        $this->dina_set_responsive_css(array(
            'render_slug'   => $render_slug,
            'option_slug'   => 'icon_height',
            'property'      => 'height',
            'selector'      => '%%order_class%% .dina_divider_icon',

        ));

        $this->dina_set_responsive_css(array(
            'render_slug'   => $render_slug,
            'option_slug'   => 'icon_size',
            'property'      => 'font-size',
            'selector'      => '%%order_class%% .dina_divider_icon i.dina_icon',

        ));

        $this->dina_set_responsive_css(array(
            'render_slug'   => $render_slug,
            'option_slug'   => 'text_padding',
            'property'      => 'padding',
            'selector'      => '%%order_class%% .dina_divider-title',

        ));


        ET_Builder_Element::set_style(
            $render_slug,
            array(
                'selector' => '%%order_class%% .dina_divider-title',
                'declaration' => sprintf(
                    'background-color: %1$s;',
                    $text_bg,
                ),
            )
        );
    }
}

new DINA_Divider();
