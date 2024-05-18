<?php

class DINA_Logo_Slider_Child extends DINA_Divi_Nations_Modules_Core {

    protected $module_credits = array(
        'module_uri' => 'https://divi-nations/modules/pricelist/',
        'author'     => 'Divi Nations',
        'author_uri' => 'https://divi-nations.com/',
    );

    public function init() {
        $this->name                     = esc_html__( 'Price Item', 'dina-divi-nations' );
        $this->type                     = 'child';
        $this->slug                     = 'dina_logo_slider_child';
        $this->child_title_var          = 'title';
        $this->child_title_fallback_var = 'admin_lable';
        $this->vb_support               = 'on';

        $this->settings_modal_toggles = array(
            'general'                       => array(
                'toggles'                   => array(
                    'content'               => esc_html__( 'Content', 'dina-divi-nations' ),
                ),
            ),
            'advanced'                      => array(
                'toggles'                   => array(
                    'image'                     => esc_html__( 'Logo Settings', 'dina-divi-nations' ),
                ),
            ),
        );
    }

    public function get_fields() {
        return array(
            'image'                  => array(
                'lable'              => esc_html__( 'Image', 'dina-divi-nations' ),
                'description'        => esc_html__( 'Select your logo image as a slider child', 'dina-divi-nations' ),
                'type'               => 'upload',
				'option_category'    => 'basic_option',
                'upload_button_text' => esc_attr__('Upload an image', 'dina-divi-nations' ),
                'choose_text'        => esc_attr__('Choose an Image', 'dina-divi-nations' ),
                'update_text'        => esc_attr__('Update Image', 'dina-divi-nations' ),
                'toggle_slug'        => 'content',
                'dynamic_content'    => 'image',
                'data_type'          => 'image',
                'mobile_options'     => true,
            ),

            'image_alt'              => array(
                'label'              => esc_html__( 'Image Alt Text', 'dina-divi-nations' ),
                'description'        => esc_html__( 'Define the front side image alt text for your flip box.', 'dina-divi-nations' ),
                'type'               => 'text',
                'toggle_slug'        => 'content',
            ),

            'image_settings'         => array(
                'label'              => esc_html__('Logo Width', 'dina-divi-nations'),
                'description'        => esc_html__('Adjust the width of the image.', 'dina-divi-nations'),
                'type'               => 'range',
                'option_category'    => 'layout',
                'tab_slug'           => 'advanced',
                'toggle_slug'        => 'image',
                'allowed_units'      => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'default_unit'       => '%',
                'allow_empty'        => true,
                'range_settings'     => array(
                    'min'            => '0',
                    'max'            => '100',
                    'step'           => '1',
                ),
                'mobile_options'     => true,
            )

        );
    }

    public function get_advanced_fields_config() {
        $advanced_fields                   = array();
        $advanced_fields[ 'text' ]         = false;
        $advanced_fields[ 'text_shadow' ]  = false;
        $advanced_fields[ 'fonts' ]        = false;

        // Flip card border
        $advanced_fields['borders']['card'] = array(
			'toggle_slug' => 'border',
			'css'         => array(
				'main'      => array(
					'border_radii'  => '%%order_class%% .dina_logo_slider-item',
					'border_styles' => '%%order_class%% .dina_logo_slider-item',
				),
				'important' => false,
			),
			'defaults'    => array(
				'border_radii'  => 'on|0px|0px|0px|0px',
				'border_styles' => array(
					'width' => '0px',
					'color' => '#333333',
					'style' => 'solid',
				),
			),
		);
    }

    public function render($attrs, $render_slug, $content) {

        return sprintf(
            '<img class="dina_logo_slider-item" src="%1$s" alt="%2$s"/>',
            $this->props['image'],
            $this->props['image_alt']
        );
    }
}

new DINA_Logo_Slider_Child();