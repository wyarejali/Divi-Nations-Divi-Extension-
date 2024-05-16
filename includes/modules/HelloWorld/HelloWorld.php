<?php

class DINA_HelloWorld extends ET_Builder_Module {

	public $slug       = 'dina_hello_world';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://wordpress.org/plugins/divi-nations',
		'author'     => 'Unique UI',
		'author_uri' => 'https://unique-ui.com',
	);

	public function init() {
		$this->name = esc_html__( 'Hello World', 'dina-divi-nations' );
	}

	public function get_fields() {
		return array(
			'content' => array(
				'label'           => esc_html__( 'Content', 'dina-divi-nations' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'dina-divi-nations' ),
				'toggle_slug'     => 'main_content',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
	}
}

new DINA_HelloWorld;
