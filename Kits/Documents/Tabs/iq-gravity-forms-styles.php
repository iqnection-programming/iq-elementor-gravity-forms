<?php

namespace IQElementorGravityForms\Kits\Documents\Tabs;

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Tab_Base;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class IQ_Gravity_Forms_Styles extends Tab_Base {

	public function get_id() {
		return 'iq-theme-style-gravity-forms';
	}

	public function get_title() {
		return 'Gravity Forms';
	}

	public function get_group() {
		return 'theme-style';
	}

	public function get_icon() {
		return 'eicon-form-horizontal';
	}

	public function get_help_url() {
		return '';
	}

	protected function register_tab_controls() {
		$label_selectors = [
			'{{WRAPPER}} .gform-body label',
		];

		$field_wrapper_selectors = [
			'{{WRAPPER}} .gform_wrapper.gravity-theme .ginput_container_address span:not(.ginput_full):not(:last-of-type):not(:nth-last-of-type(2))',
			'{{WRAPPER}} .gform_wrapper.gravity-theme .ginput_full:not(:last-of-type)',
			'{{WRAPPER}} .gform-body .gfield:not(fieldset)',
			'{{WRAPPER}} .gform-body .ginput_complex span',
		];

		$input_selectors = [
			'{{WRAPPER}} .gform-body .gfield input:not([type="button"]):not([type="submit"])',
			'{{WRAPPER}} .gform-body .gfield textarea',
			'{{WRAPPER}} .gform-body .gfield select',
		];

		$file_input_selectors = [
			'{{WRAPPER}} .gform-body .gfield input[type="file"])',
		];

		$input_hover_selectors = [
			'{{WRAPPER}} .gform-body .gfield input:hover:not([type="button"]):not([type="submit"])',
			'{{WRAPPER}} .gform-body .gfield textarea:hover',
			'{{WRAPPER}} .gform-body .gfield select:hover',
		];

		$input_focus_selectors = [
			'{{WRAPPER}} .gform-body .gfield input:focus:not([type="button"]):not([type="submit"])',
			'{{WRAPPER}} .gform-body .gfield textarea:focus',
			'{{WRAPPER}} .gform-body .gfield select:focus',
		];

		$button_selectors = [
			'{{WRAPPER}} .gform_wrapper.gravity-theme .gform_footer input',
		];

		$button_selectors_hover = [
			'{{WRAPPER}} .gform_wrapper.gravity-theme .gform_footer input:hover',
		];

		$gform_footer_selectors = [
			'{{WRAPPER}} .gform_wrapper.gravity-theme .gform_footer',
			'{{WRAPPER}} .gform_wrapper.gravity-theme .gform_page_footer'
		];

		$label_selector = implode( ',', $label_selectors );
		$field_wrapper_selector = implode( ',', $field_wrapper_selectors );
		$input_selector = implode( ',', $input_selectors );
		$file_input_selector = implode( ',', $file_input_selectors );
		$input_hover_selector = implode( ',', $input_hover_selectors );
		$input_focus_selector = implode( ',', $input_focus_selectors );
		$button_selector = implode( ',', $button_selectors );
		$button_selector_hover = implode( ',', $button_selectors_hover );
		$gform_footer_selector = implode( ',', $gform_footer_selectors );

		$this->start_controls_section(
			'section_gform_fields',
			[
				'label' => esc_html__( 'Form Fields', 'elementor' ),
				'tab' => $this->get_id(),
			]
		);

		$this->add_default_globals_notice();

		$this->add_control(
			'gform_label_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Label', 'elementor' ),
			]
		);

		$this->add_control(
			'gform_label_color',
			[
				'label' => esc_html__( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'dynamic' => [],
				'selectors' => [
					$label_selector => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'elementor' ),
				'name' => 'gform_label_typography',
				'selector' => $label_selector,
			]
		);

		$this->add_control(
			'gform_field_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Fields', 'elementor' ),
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'elementor' ),
				'name' => 'gform_field_typography',
				'selector' => $input_selector,
			]
		);

		$this->add_responsive_control(
			'gform_field_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					$input_selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'gform_placeholder_color',
			[
				'label' => esc_html__( 'Placeholder', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'dynamic' => [],
				'selectors' => [
					'{{WRAPPER}} ::placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} :-ms-input-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} ::-ms-input-placeholder' => 'color: {{VALUE}};',
				],
			]
		);

		$this->start_controls_tabs( 'tabs_gform_field_style' );

		$this->start_controls_tab(
			'tab_gform_field_normal',
			[
				'label' => esc_html__( 'Normal', 'elementor' ),
			]
		);

		$this->add_form_field_state_tab_controls( 'gform_field', $input_selector );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_gform_field_hover',
			[
				'label' => esc_html__( 'Hover', 'elementor' ),
			]
		);

		$this->add_form_field_state_tab_controls( 'gform_field_hover', $input_hover_selector );

		$this->add_control(
			'gform_field_focus_transition_duration',
			[
				'label' => esc_html__( 'Transition Duration', 'elementor' ) . ' (ms)',
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					$input_selector => 'transition: {{SIZE}}ms',
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 3000,
					],
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_gform_field_focus',
			[
				'label' => esc_html__( 'Focus', 'elementor' ),
			]
		);

		$this->add_form_field_state_tab_controls( 'gform_field_focus', $input_focus_selector );

		$this->add_control(
			'gform_field_focus_transition_duration',
			[
				'label' => esc_html__( 'Transition Duration', 'elementor' ) . ' (ms)',
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					$input_selector => 'transition: {{SIZE}}ms',
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 3000,
					],
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'gform_file_field_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Upload Field', 'elementor' ),
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'gform_file_field_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					$file_input_selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_form_field_state_tab_controls( 'gform_file_field', $file_input_selector );

		$this->add_responsive_control(
			'gform_field_spacing',
			[
				'label' => esc_html__( 'Vertical Spacing', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					$field_wrapper_selector => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// Buttons / Footer

		$this->start_controls_section(
			'section_gform_buttons',
			[
				'label' => esc_html__( 'Buttons', 'elementor' ),
				'tab' => $this->get_id(),
			]
		);

		$this->start_controls_tabs( 'tabs_gform_button_style' );

		$this->start_controls_tab(
			'tab_gform_button_normal',
			[
				'label' => esc_html__( 'Normal', 'elementor' ),
			]
		);

		$this->add_form_field_state_tab_controls( 'gform_button', $button_selector );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_gform_button_hover',
			[
				'label' => esc_html__( 'Hover', 'elementor' ),
			]
		);

		$this->add_form_field_state_tab_controls( 'gform_button_hover', $button_selector_hover );

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'gform_footer_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => esc_html__( 'Form Footer', 'elementor' ),
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'gform_button_align',
			[
				'label' => esc_html__( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'elementor' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => '',
				'selectors' => [
					$gform_footer_selector => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'gform_footer_margin',
			[
				'label' => esc_html__( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					$gform_footer_selector => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'gform_footer_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					$gform_footer_selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	private function add_form_field_state_tab_controls( $prefix, $selector ) {
		$this->add_control(
			$prefix . '_text_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'dynamic' => [],
				'selectors' => [
					$selector => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			$prefix . '_background_color',
			[
				'label' => esc_html__( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'dynamic' => [],
				'selectors' => [
					$selector => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => $prefix . '_box_shadow',
				'selector' => $selector,
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => $prefix . '_border',
				'selector' => $selector,
				'fields_options' => [
					'color' => [
						'dynamic' => [],
					],
				],
			]
		);

		$this->add_control(
			$prefix . '_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					$selector => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
	}
}
