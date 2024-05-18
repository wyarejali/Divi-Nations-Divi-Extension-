<?php

class DINA_PriceList extends DINA_Divi_Nations_Modules_Core {

    protected $module_credits = array(
        'module_uri' => 'https://divinasion/modules/image-accordion/',
        'author'     => 'Divi Nations',
        'author_uri' => 'https://divinasion.com/',
    );

    public function init() {

        $this->name        = esc_html__( 'Price List', 'divi_nations' );
        $this->icon_path   = plugin_dir_path(__FILE__) . 'icon.svg';
        $this->slug        = 'dina_pricelist';
        $this->child_slug  = 'dina_pricelist_item';
        $this->child_item_text = esc_html__( 'Price Item', 'divi_nations' );
        $this->vb_support  = 'on';
        $this->folder_name = 'Divi Nations';

        $this->settings_modal_toggles = array(
            'general'                       => array(
                'toggles'                   => array(
                    'content'               => esc_html__( 'Content', 'divi_nations' ),
                ),
            ),
            'advanced'                      => array(
                'toggles'                   => array(
                    'content'               => array(
                        'title'             => esc_html__( 'Price Texts', 'divi_nations' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'title'         => array(
                                'name'      => esc_html__( 'Title', 'divi_nations' ),
                            ),
                            'description'   => array(
                                'name'      => esc_html__( 'Description', 'divi_nations' ),
                            ),
                            'price'         => array(
                                'name'      => esc_html__( 'Price', 'divi_nations' ),
                            ),
                        )
                    ),
                    'image'                 => esc_html__( 'Price Image', 'divi_nations' ),
                    'icon'                  => esc_html__( 'Price Icon', 'divi_nations' ),
                    'item'                  => esc_html__( 'List Item', 'divi_nations' ),
                ),
            ),
        );

        $this->custom_css_fields = array(
			'separator'     => array(
				'label'        => esc_html__( 'Divider', 'divi_nations' ),
				'selector'     => '%%order_class%% .dina_pricelist-content .dina_pricelist-divider',
            ),
			'icon_wrapper'  => array(
				'label'        => esc_html__( 'Icon Wrapper', 'divi_nations' ),
				'selector'     => '%%order_class%% .dina_pricelist-icon',
            ),
			'icon'          => array(
				'label'        => esc_html__( 'Icon', 'divi_nations' ),
				'selector'     => '%%order_class%% .dina_pricelist-icon i.dina_icon',
            ),
			'image_wrapper' => array(
				'label'        => esc_html__( 'Image Wrapper', 'divi_nations' ),
				'selector'     => '%%order_class%% .dina_pricelist-image',
            ),
			'image'         => array(
				'label'        => esc_html__( 'Image', 'divi_nations' ),
				'selector'     => '%%order_class%% .dina_pricelist-image img',
            ),
			'title'         => array(
				'label'        => esc_html__( 'Price Title', 'divi_nations' ),
				'selector'     => '%%order_class%% .dina_pricelist-content .dina_pricelist-title',
            ),
			'price'         => array(
				'label'        => esc_html__( 'Price', 'divi_nations' ),
				'selector'     => '%%order_class%% .dina_pricelist-content .dina_pricelist-price',
            ),
			'description'   => array(
				'label'        => esc_html__( 'Description', 'divi_nations' ),
				'selector'     => '%%order_class%% .dina_pricelist-content .dina_pricelist-description p',
            ),
        );
    }

    public function get_fields() {
         
        $layout = array(
            'layout'             => array(
                'label'          => esc_html__( 'Choose Layout', 'divi_nations' ),
                'description'    => esc_html__( 'Here you can choose different type of style', 'divi_nations' ),
                'type'           => 'select',
                'options'        => array(
                    'flex'       => esc_html__( 'Media position left', 'divi_nations' ),
                    'block'      => esc_html__( 'Media position top', 'divi_nations' ),
                ),
                'default'        => 'flex',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'layout',
                'mobile_options' => true,
            ),

            'content_position'   => array(
                'label'          => esc_html__( 'Content alignement', 'divi_nations' ),
                'description'    => esc_html__( 'Define the content vertical alignement', 'divi_nations' ),
                'type'           => 'select',
                'options'        => array(
                    'flex-start' => esc_html__( 'Top', 'divi_nations' ),
                    'center'     => esc_html__( 'Vertically Center', 'divi_nations' ),
                    'flex-end'   => esc_html__( 'Bottom', 'divi_nations' ),
                ),
                'default'        => 'center',
                'mobile_options' => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'layout',
                'show_if'        => array(
                    'layout'     => 'flex',
                ),
            ),

            'content_gap'        => array(
                'label'          => esc_html__( 'Content space', 'divi_nations' ),
                'description'    => esc_html__( 'Define space between media and content', 'divi_nations' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '15px',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'        => 0,
                    'step'       => 1,
                    'max'        => 500,
                ),
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'layout',
                'show_if'        => array(
                    'layout'     => 'flex',
                ),
            )
        );

        $icon_design = array(
            'icon_bg'            => array(
                'label'          => esc_html__( 'Icon Background', 'divi_nations' ),
                'description'    => esc_html__( 'Here you can change icon background color.', 'divi_nations' ),
                'type'           => 'color-alpha',
                'default'        => '',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'mobile_options' => true,
            ),

            'icon_color'         => array(
                'label'          => esc_html__( 'Icon Color', 'divi_nations' ),
                'description'    => esc_html__( 'Here you can change icon color.', 'divi_nations' ),
                'type'           => 'color-alpha',
                'default'        => '#333333',
                'custom_color'   => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'mobile_options' => true,
            ),

            'icon_size'          => array(
                'label'          => esc_html__( 'Icon Size', 'divi_nations' ),
                'description'    => esc_html__( 'Here you can change icon size.', 'divi_nations' ),
                'type'           => 'range',
                'default_unit'   => 'px',
                'default'        => '30px',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'mobile_options' => true,
                'range_settings' => array(
                    'min'        => 0,
                    'step'       => 1,
                    'max'        => 1000,
                ),
            ),

            'icon_padding'       => array(
                'label'          => esc_html__( 'Image/Icon Padding', 'divi_nations' ),
                'description'    => esc_html__( 'Define custom padding for divider icon', 'divi_nations' ),
                'type'           => 'custom_padding',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'default'        => '0px|0px|0px|0px',
                'mobile_options' => true,
            ),

            'icon_margin'        => array(
                'label'          => esc_html__( 'Image/Icon Margin', 'divi_nations' ),
                'description'    => esc_html__( 'Define custom margin for divider icon', 'divi_nations' ),
                'type'           => 'custom_margin',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'icon',
                'default'        => '0px|0px|0px|0px',
                'mobile_options' => true,
            ),
        );

        $image_design = array(
            'image_align'         => array(
                'label'           => esc_html__( 'Image Alignment', 'divi_nations' ),
                'type'            => 'select',
                'option_category' => 'configuration',
                'options'         => array(
                    'flex-start'  => esc_html__( 'Left', 'divi_nations' ),
                    'center'      => esc_html__( 'Center', 'divi_nations' ),
                    'flex-end'    => esc_html__( 'Right', 'divi_nations' ),
                ),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'image',
                'default'         => 'flex-start',
                'mobile_options'  => true
            ),

            'image_width'         => array(
                'label'           => esc_html__( 'Image Width', 'divi_nations' ),
                'description'     => esc_html__( 'Here you can change image width.', 'divi_nations' ),
                'type'            => 'range',
                'default_unit'    => '%',
                'default'         => '50%',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'image',
                'mobile_options'  => true,
                'range_settings'  => array(
                    'min'         => 0,
                    'step'        => 1,
                    'max'         => 100,
                ),
            ),

            'image_margin'        => array(
                'label'           => esc_html__( 'Image Margin', 'divi_nations' ),
                'descripton'      => esc_html__( 'Define custom margin for price iamge', 'divi_nations' ),
                'type'            => 'custom_margin',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'image',
                'default'         => '0px|0px|20px|0px',
                'mobile_options'  => true,
            ),

            'image_padding'       => array(
                'label'           => esc_html__( 'Image Padding', 'divi_nations' ),
                'descripton'      => esc_html__( 'Define custom padding for price iamge', 'divi_nations' ),
                'type'            => 'custom_padding',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'image',
                'default'         => '0px|0px|0px|0px',
                'mobile_options'  => true,
            ),
        );

        $divider = array(
            'divider_color'      => array(
                'label'          => esc_html__( 'Divider Color', 'divi_nations' ),
                'discription'    => esc_html__( 'Define the divi line color', 'divi_nations' ),
                'type'           => 'color-alpha',
                'default'        => '#333333',
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'divider',
                'default'        => '#0dc8f1',
                'mobile_options' => true,

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
                'label'          => esc_html__( 'Divider Vertical Align', 'divi_nations' ),
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
                    'max'        => 25,
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
        );

        $custom_spacing = array(
            'item_margin'        => array(
                'label'           => esc_html__( 'Item Margin', 'divi_nations' ),
                'descripton'      => esc_html__( 'Define custom margin for price iamge', 'divi_nations' ),
                'type'            => 'custom_margin',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'item',
                'default'         => '0px|0px|20px|0px',
                'mobile_options'  => true,
            ),

            'item_padding'       => array(
                'label'           => esc_html__( 'Item Padding', 'divi_nations' ),
                'descripton'      => esc_html__( 'Define custom padding for price iamge', 'divi_nations' ),
                'type'            => 'custom_padding',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'item',
                'default'         => '0px|0px|0px|0px',
                'mobile_options'  => true,
            ),
        );


        return array_merge( $layout, $icon_design, $image_design, $divider, $custom_spacing );
    }

     // Modify existing functionalities and add new functionalities
     public function get_advanced_fields_config() {

        // Get theme accent color
        $et_accent_color = et_builder_accent_color();

        $advanced_fields                   = array();
        $advanced_fields[ 'text' ]         = false;
        $advanced_fields[ 'text_shadow' ]  = array();
        $advanced_fields[ 'fonts' ]        = array();

        // Flip card border
        $advanced_fields[ 'borders' ][ 'list_item' ] = array(
			'label_prefix'          => esc_html__( 'Price item', 'divi_nations' ),
            'tab_slug'              => 'advanced',
            'toggle_slug'           => 'item',
			'css'                   => array(
				'main'              => array(
					'border_radii'  => '%%order_class%% .dina_pricelist_item',
					'border_styles' => '%%order_class%% .dina_pricelist_item',
				),
				'important'         => false,
			),
			'defaults'              => array(
				'border_radii'      => 'on|0px|0px|0px|0px',
				'border_styles'     => array(
					'width'         => '0px',
					'color'         => '#333333',
					'style'         => 'solid',
				),
			),
		);

        // icon border
        $advanced_fields[ 'borders' ][ 'icon' ] = array(
            'label_prefix'          => esc_html__( 'Icon', 'divi_nations' ),
            'tab_slug'              => 'advanced',
            'toggle_slug'           => 'icon',
            'css'                   => array(
                'main'              => array(
                    'border_radii'  => '%%order_class%% .dina_pricelist-icon i.dina_icon',
                    'border_styles' => '%%order_class%% .dina_pricelist-icon i.dina_icon',
                ),
                'important'         => false,
            ),
            'depends_show_if'       => array(
                'media_type'        => 'icon',
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

        // Image border
        $advanced_fields[ 'borders' ][ 'image' ] = array(
            'label_prefix'          => esc_html__( 'Image', 'divi_nations' ),
            'tab_slug'              => 'advanced',
            'toggle_slug'           => 'image',
            'css'                   => array(
                'main'              => array(
                    'border_radii'  => '%%order_class%% .dina_pricelist-image',
                    'border_styles' => '%%order_class%% .dina_pricelist-image',
                ),
                'important'         => false,
            ),
            'depends_show_if'       => array(
                'media_type'        => 'icon',
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

        $advanced_fields[ 'fonts' ][ 'title' ] = array(
            'label'             => esc_html__( 'Title', 'divi_nations' ),
            'css'               => array(
                'main'          => '%%order_class%% .dina_pricelist-title',
                'important'     => false,
            ),
            'font_size'         => array(
                'default'       => '18px',
            ),
            'tab_slug'          => 'advanced',
            'toggle_slug'       => 'content',
            'sub_toggle'        => 'title',
            'line_height'       => array(
                'default'       => '1.5em',
            ),
        );

        $advanced_fields[ 'fonts' ][ 'price' ] = array(
            'label'             => esc_html__( 'Price', 'divi_nations' ),
            'css'               => array(
                'main'          => '%%order_class%% .dina_pricelist-price',
                'important'     => false,
            ),
            'font_size'         => array(
                'default'       => '18px',
            ),
            'tab_slug'          => 'advanced',
            'toggle_slug'       => 'content',
            'sub_toggle'        => 'price',
            'line_height'       => array(
                'default'       => '1.3em',
            ),
        );

        $advanced_fields[ 'fonts' ][ 'description' ] = array(
            'label'             => esc_html__( 'Description', 'divi_nations' ),
            'css'               => array(
                'main'          => '%%order_class%% .dina_pricelist-description p',
                'important'     => false,
            ),
            'tab_slug'          => 'advanced',
            'toggle_slug'       => 'content',
            'sub_toggle'        => 'description',
            'font_size'         => array(
                'default'       => '14px',
            ),
            'line_height'       => array(
                'default'       => '1.2em',
            ),
        );

        return $advanced_fields;
    }

    public function render($attrs, $content, $render_slug)
    {

        $this->render_css($render_slug);      

        return sprintf(
            '<div class="dina_pricelist-container">
                <div class="dina_pricelist-wrapper">
                    %1$s
                </div>
            </div>',
            $this->content,
            $this->props[ 'layout' ]
        );
    }

    public function render_css($render_slug)
    {

        // Layouts
        // ==============================
        $this->dina_set_responsive_css(array(
            'render_slug'       => $render_slug,
            'option_slug'       => 'layout',
            'property'          => 'display',
            'selector'          => '%%order_class%% .dina_pricelist-item-wrapper'
        ));

        $this->dina_set_responsive_css(array(
            'render_slug'       => $render_slug,
            'option_slug'       => 'content_position',
            'property'          => 'align-items',
            'selector'          => '%%order_class%% .dina_pricelist-item-wrapper'
        ));
        
        $this->dina_set_responsive_css(array(
            'render_slug'       => $render_slug,
            'option_slug'       => 'content_gap',
            'property'          => 'gap',
            'selector'          => '%%order_class%% .dina_pricelist-item-wrapper'
        ));

        $this->dina_set_responsive_css(array(
            'render_slug'       => $render_slug,
            'option_slug'       => 'icon_size',
            'property'          => 'font-size',
            'selector'          => '%%order_class%% .dina_pricelist-icon .dina_icon'
        ));

        $this->dina_set_responsive_css(array(
            'render_slug'       => $render_slug,
            'option_slug'       => 'icon_color',
            'property'          => 'color',
            'selector'          => '%%order_class%% .dina_pricelist-icon .dina_icon'
        ));

        $this->dina_set_responsive_css(array(
            'render_slug'       => $render_slug,
            'option_slug'       => 'icon_bg',
            'property'          => 'background',
            'selector'          => '%%order_class%% .dina_pricelist-icon'
        ));

        $this->dina_set_responsive_css(array(
            'render_slug'       => $render_slug,
            'option_slug'       => 'icon_padding',
            'property'          => 'padding',
            'selector'          => '%%order_class%% .dina_pricelist-icon i.dina_icon'
        ));

        $this->dina_set_responsive_css(array(
            'render_slug'       => $render_slug,
            'option_slug'       => 'icon_margin',
            'property'          => 'margin',
            'selector'          => '%%order_class%% .dina_pricelist-icon'
        ));

        // Price Image style
        $this->dina_set_responsive_css(array(
            'render_slug'       => $render_slug,
            'option_slug'       => 'image_width',
            'property'          => 'width',
            'selector'          => '%%order_class%% .dina_pricelist-image-wrapper'
        ));

        $this->dina_set_responsive_css(array(
            'render_slug'       => $render_slug,
            'option_slug'       => 'image_margin',
            'property'          => 'margin',
            'selector'          => '%%order_class%% .dina_pricelist-image'
        ));

        $this->dina_set_responsive_css(array(
            'render_slug'       => $render_slug,
            'option_slug'       => 'image_padding',
            'property'          => 'padding',
            'selector'          => '%%order_class%% .dina_pricelist-image'
        ));

        $this->dina_set_responsive_css(array(
            'render_slug'       => $render_slug,
            'option_slug'       => 'image_align',
            'property'          => 'justify-content',
            'selector'          => '%%order_class%% .dina_pricelist-image-wrapper'
        ));
      

        // Divider style

        // Divider color        
        $this->dina_set_responsive_css(array(
            'render_slug'       => $render_slug,
            'option_slug'       => 'divider_color',
            'property'          => 'border-color',
            'selector'          => '%%order_class%% .dina_pricelist-divider'
        ));

        $this->dina_set_responsive_css(array(
            'render_slug'       => $render_slug,
            'option_slug'       => 'divider_style',
            'property'          => 'border-style',
            'selector'          => '%%order_class%% .dina_pricelist-divider'
        ));

        $this->dina_set_responsive_css(array(
            'render_slug'       => $render_slug,
            'option_slug'       => 'divider_weight',
            'property'          => 'border-bottom-width',
            'selector'          => '%%order_class%% .dina_pricelist-divider'
        ));

        $this->dina_set_responsive_css(array(
            'render_slug'       => $render_slug,
            'option_slug'       => 'divider_gap',
            'property'          => 'gap',
            'selector'          => '%%order_class%% .dina_pricelist-heading'
        ));

        $this->dina_set_responsive_css(array(
            'render_slug'       => $render_slug,
            'option_slug'       => 'divider_position',
            'property'          => 'align-items',
            'selector'          => '%%order_class%% .dina_pricelist-heading'
        ));

        $this->dina_set_responsive_css(array(
            'render_slug'       => $render_slug,
            'option_slug'       => 'item_margin',
            'property'          => 'margin',
            'selector'          => '%%order_class%% .dina_pricelist_item',
            'important'         => true,
        ));
        
        $this->dina_set_responsive_css(array(
            'render_slug'       => $render_slug,
            'option_slug'       => 'item_padding',
            'property'          => 'padding',
            'selector'          => '%%order_class%% .dina_pricelist_item',
            'important'         => true,
        ));
    }

}

new DINA_PriceList();