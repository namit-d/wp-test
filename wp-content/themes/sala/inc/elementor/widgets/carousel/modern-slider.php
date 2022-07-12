<?php

namespace Sala_Elementor;

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;

defined( 'ABSPATH' ) || exit;

class Widget_Modern_Slider extends Carousel_Base {

	public function get_name() {
		return 'sala-modern-slider';
	}

	public function get_title() {
		return esc_html__( 'Modern Slider', 'sala' );
	}

	public function get_icon_part() {
		return 'eicon-post-slider';
	}

	public function get_keywords() {
		return [ 'modern', 'slider' ];
	}

	protected function _register_controls() {
		$this->add_content_section();

		$this->add_styling_section();

		parent::_register_controls();

		$this->update_controls();
	}

	private function update_controls() {
		$this->update_responsive_control( 'swiper_items', [
			'default'        => '1',
			'tablet_default' => '1',
			'mobile_default' => '1',
		] );

		$this->update_responsive_control( 'swiper_gutter', [
			'default' => 30,
		] );
	}

	protected function update_slider_settings( $settings, $slider_settings ) {
		// Enable layer transition.
		if ( 'yes' === $settings['layers_animation'] ) {
			$slider_settings['class'][]               = 'slide-layer-transition';
			$slider_settings['data-layer-transition'] = '1';
			$slider_settings['data-fade-effect']      = 'custom';
		}

		return $slider_settings;
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'wrapper', 'class', 'sala-modern-slider' );
		?>
		<div <?php $this->print_attributes_string( 'wrapper' ); ?>>
			<?php $this->print_slider( $settings ); ?>
		</div>
		<?php
	}

	private function add_content_section() {
		$this->start_controls_section( 'content_section', [
			'label' => esc_html__( 'Content', 'sala' ),
		] );

		$this->add_responsive_control( 'height', [
			'label'          => esc_html__( 'Height', 'sala' ),
			'type'           => Controls_Manager::SLIDER,
			'default'        => [
				'size' => 700,
				'unit' => 'px',
			],
			'tablet_default' => [
				'unit' => 'px',
			],
			'mobile_default' => [
				'unit' => 'px',
			],
			'size_units'     => [ 'px', '%', 'vh' ],
			'range'          => [
				'%'  => [
					'min' => 1,
					'max' => 100,
				],
				'px' => [
					'min' => 1,
					'max' => 1600,
				],
				'vh' => [
					'min' => 1,
					'max' => 100,
				],
			],
			'selectors'      => [
				'{{WRAPPER}} .swiper-slide' => 'height: {{SIZE}}{{UNIT}};',
			],
			'render_type'    => 'template',
		] );

		$this->add_control( 'layers_animation', [
			'label' => esc_html__( 'Layers Animation', 'sala' ),
			'type'  => Controls_Manager::SWITCHER,
		] );

		$repeater = new Repeater();

		$repeater->start_controls_tabs( 'slide_tabs' );

		$repeater->start_controls_tab( 'slide_content_tab', [
			'label' => esc_html__( 'Content', 'sala' ),
		] );

		$repeater->add_control( 'title_heading', [
			'label' => esc_html__( 'Title', 'sala' ),
			'type'  => Controls_Manager::HEADING,
		] );

		$repeater->add_control( 'title', [
			'label'       => esc_html__( 'Text', 'sala' ),
			'type'        => Controls_Manager::TEXTAREA,
			'dynamic'     => [
				'active' => true,
			],
			'placeholder' => esc_html__( 'Enter your title', 'sala' ),
			'default'     => esc_html__( 'Add Your Heading Text Here', 'sala' ),
		] );

		$repeater->add_control( 'title_link', [
			'label'         => esc_html__( 'Link', 'sala' ),
			'type'          => Controls_Manager::URL,
			'dynamic'       => [
				'active' => true,
			],
			'placeholder'   => esc_html__( 'https://your-link.com', 'sala' ),
			'show_external' => true,
			'default'       => [
				'url'         => '',
				'is_external' => false,
				'nofollow'    => false,
			],
		] );

		$repeater->add_control( 'sub_title_heading', [
			'label'     => esc_html__( 'Sub Title', 'sala' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		] );

		$repeater->add_control( 'sub_title', [
			'label'       => esc_html__( 'Text', 'sala' ),
			'type'        => Controls_Manager::TEXTAREA,
			'dynamic'     => [
				'active' => true,
			],
			'placeholder' => esc_html__( 'Enter your sub title', 'sala' ),
			'default'     => '',
		] );

		$repeater->add_control( 'description_heading', [
			'label'     => esc_html__( 'Description', 'sala' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		] );

		$repeater->add_control( 'description', [
			'label'      => esc_html__( 'Description', 'sala' ),
			'show_label' => false,
			'type'       => Controls_Manager::TEXTAREA,
		] );

		$repeater->add_control( 'button_heading', [
			'label'     => esc_html__( 'Button', 'sala' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		] );

		$repeater->add_control( 'button_style', [
			'label'   => esc_html__( 'Style', 'sala' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 'flat',
			'options' => Widget_Utils::get_button_style(),
		] );

		$repeater->add_control( 'button_text', [
			'label' => esc_html__( 'Text', 'sala' ),
			'type'  => Controls_Manager::TEXT,
		] );

		$repeater->add_control( 'button_link', [
			'label'         => esc_html__( 'Link', 'sala' ),
			'type'          => Controls_Manager::URL,
			'dynamic'       => [
				'active' => true,
			],
			'placeholder'   => esc_html__( 'https://your-link.com', 'sala' ),
			'show_external' => true,
			'default'       => [
				'url'         => '',
				'is_external' => false,
				'nofollow'    => false,
			],
		] );

		$repeater->end_controls_tab();

		$repeater->start_controls_tab( 'slide_background_tab', [
			'label' => esc_html__( 'Background', 'sala' ),
		] );

		$repeater->add_control( 'background_animation', [
			'label'       => esc_html__( 'Background Animation', 'sala' ),
			'label_block' => true,
			'type'        => Controls_Manager::SELECT,
			'default'     => '',
			'options'     => [
				''          => esc_html__( 'None', 'sala' ),
				'ken-burns' => esc_html__( 'Ken Burns', 'sala' ),
			],
		] );

		$repeater->add_group_control( Group_Control_Background::get_type(), [
			'name'      => 'background',
			'types'     => [ 'classic', 'gradient' ],
			'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}} .slide-bg',
			'separator' => 'before',
		] );

		$repeater->end_controls_tab();

		$repeater->start_controls_tab( 'slide_style_tab', [
			'label' => esc_html__( 'Style', 'sala' ),
		] );

		$repeater->add_control( 'slide_wrapper_heading', [
			'label' => esc_html__( 'Wrapper', 'sala' ),
			'type'  => Controls_Manager::HEADING,
		] );

		$repeater->add_responsive_control( 'content_horizontal_align', [
			'label'                => esc_html__( 'Horizontal Align', 'sala' ),
			'label_block'          => true,
			'type'                 => Controls_Manager::CHOOSE,
			'options'              => Widget_Utils::get_control_options_horizontal_alignment(),
			'selectors_dictionary' => [
				'left'  => 'flex-start',
				'right' => 'flex-end',
			],
			'selectors'            => [
				'{{WRAPPER}} {{CURRENT_ITEM}} .slide-content' => 'justify-content: {{VALUE}}',
			],
		] );

		$repeater->add_responsive_control( 'content_vertical_alignment', [
			'label'                => esc_html__( 'Vertical Alignment', 'sala' ),
			'label_block'          => true,
			'type'                 => Controls_Manager::CHOOSE,
			'options'              => Widget_Utils::get_control_options_vertical_alignment(),
			'selectors_dictionary' => [
				'top'    => 'flex-start',
				'middle' => 'center',
				'bottom' => 'flex-end',
			],
			'selectors'            => [
				'{{WRAPPER}} {{CURRENT_ITEM}} .slide-content' => 'align-items: {{VALUE}};',
			],
		] );

		$repeater->add_responsive_control( 'text_align', [
			'label'       => esc_html__( 'Text Align', 'sala' ),
			'label_block' => true,
			'type'        => Controls_Manager::CHOOSE,
			'options'     => Widget_Utils::get_control_options_text_align(),
			'default'     => '',
			'selectors'   => [
				'{{WRAPPER}} {{CURRENT_ITEM}} .slide-content' => 'text-align: {{VALUE}};',
			],
		] );

		$repeater->add_responsive_control( 'slide_wrapper_max_width', [
			'label'      => esc_html__( 'Max Width', 'sala' ),
			'type'       => Controls_Manager::SLIDER,
			'default'    => [
				'unit' => 'px',
			],
			'size_units' => [ 'px', '%' ],
			'range'      => [
				'%'  => [
					'min' => 1,
					'max' => 100,
				],
				'px' => [
					'min' => 1,
					'max' => 1600,
				],
			],
			'selectors'  => [
				'{{WRAPPER}} {{CURRENT_ITEM}} .slide-layers' => 'max-width: {{SIZE}}{{UNIT}};',
			],
		] );

		$repeater->add_responsive_control( 'slide_wrapper_padding', [
			'label'      => esc_html__( 'Padding', 'sala' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%' ],
			'selectors'  => [
				'{{WRAPPER}} {{CURRENT_ITEM}} .slide-layers' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$repeater->add_control( 'title_style_heading', [
			'label'     => esc_html__( 'Title', 'sala' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		] );

		$repeater->add_control( 'title_margin', [
			'label'      => esc_html__( 'Margin', 'sala' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%' ],
			'selectors'  => [
				'{{WRAPPER}} {{CURRENT_ITEM}} .title-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$repeater->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'title_typography',
			'label'    => esc_html__( 'Typography', 'sala' ),
			'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .title',
		] );

		$repeater->add_control( 'title_color', [
			'label'     => esc_html__( 'Color', 'sala' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} {{CURRENT_ITEM}} .title' => 'color: {{VALUE}};',
			],
		] );

		$repeater->add_control( 'title_hover_color', [
			'label'     => esc_html__( 'Hover Color', 'sala' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} {{CURRENT_ITEM}} .title:hover' => 'color: {{VALUE}};',
			],
		] );

		$repeater->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'title_mark_typography',
			'label'    => esc_html__( 'Highlight Words Typography', 'sala' ),
			'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .title mark',
		] );

		$repeater->add_control( 'title_mark_color', [
			'label'     => esc_html__( 'Highlight Words Color', 'sala' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} {{CURRENT_ITEM}} .title mark' => 'color: {{VALUE}};',
			],
		] );

		$repeater->add_control( 'sub_title_style_heading', [
			'label'     => esc_html__( 'Sub Title', 'sala' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		] );

		$repeater->add_control( 'sub_title_margin', [
			'label'      => esc_html__( 'Margin', 'sala' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%' ],
			'selectors'  => [
				'{{WRAPPER}} {{CURRENT_ITEM}} .sub-title-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$repeater->add_control( 'sub_title_padding', [
			'label'      => esc_html__( 'Padding', 'sala' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%' ],
			'selectors'  => [
				'{{WRAPPER}} {{CURRENT_ITEM}} .sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$repeater->add_control( 'sub_title_border_radius', [
			'label'      => esc_html__( 'Rounded', 'sala' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%' ],
			'selectors'  => [
				'{{WRAPPER}} {{CURRENT_ITEM}} .sub-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$repeater->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'sub_title_typography',
			'label'    => esc_html__( 'Typography', 'sala' ),
			'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .sub-title',
		] );

		$repeater->add_control( 'sub_title_color', [
			'label'     => esc_html__( 'Color', 'sala' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} {{CURRENT_ITEM}} .sub-title' => 'color: {{VALUE}};',
			],
		] );

		$repeater->add_control( 'sub_title_bg_color', [
			'label'     => esc_html__( 'Background Color', 'sala' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} {{CURRENT_ITEM}} .sub-title' => 'background-color: {{VALUE}};',
			],
		] );

		$repeater->add_control( 'description_style_heading', [
			'label'     => esc_html__( 'Description', 'sala' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		] );

		$repeater->add_control( 'description_margin', [
			'label'      => esc_html__( 'Margin', 'sala' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%' ],
			'selectors'  => [
				'{{WRAPPER}} {{CURRENT_ITEM}} .description-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$repeater->add_group_control( Group_Control_Typography::get_type(), [
			'name'     => 'description_typography',
			'label'    => esc_html__( 'Typography', 'sala' ),
			'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .description',
		] );

		$repeater->add_control( 'description_color', [
			'label'     => esc_html__( 'Text Color', 'sala' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} {{CURRENT_ITEM}} .description' => 'color: {{VALUE}};',
			],
		] );

		$repeater->add_control( 'button_style_heading', [
			'label'     => esc_html__( 'Button', 'sala' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		] );

		$repeater->add_control( 'button_margin', [
			'label'      => esc_html__( 'Margin', 'sala' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%' ],
			'selectors'  => [
				'{{WRAPPER}} {{CURRENT_ITEM}} .button-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$repeater->add_control( 'button_text_color', [
			'label'     => esc_html__( 'Text Color', 'sala' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} {{CURRENT_ITEM}} .elementor-button' => 'color: {{VALUE}};',
			],
		] );

		$repeater->add_control( 'button_text_border_color', [
			'label'     => esc_html__( 'Line Color', 'sala' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} {{CURRENT_ITEM}} .elementor-button.style-bottom-line .button-content-wrapper:before' => 'background: {{VALUE}};',
				'{{WRAPPER}} {{CURRENT_ITEM}} .elementor-button.style-left-line .button-content-wrapper:before'   => 'background: {{VALUE}};',
			],
			'condition' => [
				'button_style' => [ 'text', 'text-left-line' ],
			],
		] );

		$repeater->add_group_control( Group_Control_Background::get_type(), [
			'name'     => 'button_background',
			'types'    => [ 'classic', 'gradient' ],
			'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .elementor-button:before',
		] );

		$repeater->add_control( 'button_hover_style_heading', [
			'label'     => esc_html__( 'Button Hover', 'sala' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		] );

		$repeater->add_control( 'button_hover_text_color', [
			'label'     => esc_html__( 'Text Color', 'sala' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} {{CURRENT_ITEM}} .elementor-button:hover' => 'color: {{VALUE}};',
			],
		] );

		$repeater->add_control( 'button_hover_text_border_color', [
			'label'     => esc_html__( 'Line Color', 'sala' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} {{CURRENT_ITEM}} .elementor-button.style-bottom-line .button-content-wrapper:after' => 'background: {{VALUE}};',
				'{{WRAPPER}} {{CURRENT_ITEM}} .elementor-button.style-left-line .button-content-wrapper:after'   => 'background: {{VALUE}};',
			],
			'condition' => [
				'button_style' => [ 'text', 'text-left-line' ],
			],
		] );

		$repeater->add_group_control( Group_Control_Background::get_type(), [
			'name'     => 'button_hover_background',
			'types'    => [ 'classic', 'gradient' ],
			'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .elementor-button:after',
		] );

		$repeater->end_controls_tab();

		$repeater->end_controls_tabs();

		$this->add_control( 'slides', [
			'label'       => esc_html__( 'Slides', 'sala' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $repeater->get_controls(),
			'default'     => [
				[
					'title'       => 'Sala Studio',
					'description' => 'So. Morning. Seas shall he darkness moving without. Kind, living, great were whose from behold you’ll sea. And seas.',
				],
				[
					'title'       => 'Sala Studio',
					'description' => 'So. Morning. Seas shall he darkness moving without. Kind, living, great were whose from behold you’ll sea. And seas.',
				],
			],
			'title_field' => '{{{ title }}}',
		] );

		$this->end_controls_section();
	}

	private function add_styling_section() {
		$this->start_controls_section( 'style_section', [
			'label' => esc_html__( 'Style', 'sala' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		] );

		$this->add_responsive_control( 'slide_padding', [
			'label'      => esc_html__( 'Padding', 'sala' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors'  => [
				'{{WRAPPER}} .sala-modern-slider .slide-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$this->add_responsive_control( 'slide_radius', [
			'label'      => esc_html__( 'Border Radius', 'sala' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors'  => [
				'{{WRAPPER}} .sala-modern-slider' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$this->add_group_control( Group_Control_Box_Shadow::get_type(), [
			'name'     => 'box',
			'selector' => '{{WRAPPER}} .sala-modern-slider',
		] );

		$this->end_controls_section();
	}

	protected function print_slides( array $settings ) {
		foreach ( $settings['slides'] as $slide ) :
			$slide_id = $slide['_id'];
			$item_key = 'item_' . $slide_id;
			$item_title_link_key = 'title_link_' . $slide_id;
			$item_button_key = 'button_' . $slide_id;

			$this->add_render_attribute( $item_key, 'class', [
				'swiper-slide',
				'elementor-repeater-item-' . $slide_id,
				'sala-slide-bg-animation-' . $slide['background_animation'],
			] );

			if ( ! empty( $slide['title_link']['url'] ) ) {
				$this->add_render_attribute( $item_title_link_key, 'class', 'link-secret' );
				$this->add_link_attributes( $item_title_link_key, $slide['title_link'] );
			}

			$this->add_render_attribute( $item_button_key, 'class', [
				'elementor-button',
				'style-' . $slide['button_style'],
			] );

			if ( ! empty( $slide['button_link']['url'] ) ) {
				$this->add_link_attributes( $item_button_key, $slide['button_link'] );
			}
			?>
			<div <?php $this->print_attributes_string( $item_key ); ?>>
				<div class="slide-bg-wrap">
					<div class="slide-bg"></div>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="slide-content">
								<div class="slide-layers">
									<?php if ( '' !== $slide['sub_title'] ) : ?>

										<div class="slide-layer-wrap sub-title-wrap">
											<div class="slide-layer">
												<h4 class="sub-title"><?php echo wp_kses( $slide['sub_title'], 'sala-default' ); ?></h4>
											</div>
										</div>

									<?php endif; ?>

									<?php if ( '' !== $slide['title'] ) : ?>

										<div class="slide-layer-wrap title-wrap">
											<div class="slide-layer">

												<?php if ( ! empty( $slide['title_link']['url'] ) ) : ?>
												<a <?php $this->print_attributes_string( $item_title_link_key ); ?>>
													<?php endif; ?>

													<h3 class="title"><?php echo wp_kses( $slide['title'], 'sala-default' ); ?></h3>

													<?php if ( ! empty( $slide['title_link']['url'] ) ) : ?>
												</a>
											<?php endif; ?>

											</div>
										</div>

									<?php endif; ?>

									<?php if ( ! empty( $slide['description'] ) ) : ?>
										<div class="slide-layer-wrap description-wrap">
											<div class="slide-layer">
												<div
													class="description"><?php echo esc_html( $slide['description'] ); ?></div>
											</div>
										</div>
									<?php endif; ?>

									<?php if ( ! empty( $slide['button_text'] ) && ! empty( $slide['button_link']['url'] ) ) : ?>
										<div class="slide-layer-wrap button-wrap">
											<div class="slide-layer">
												<div class="sala-button-wrapper">
													<a <?php $this->print_attributes_string( $item_button_key ); ?>>
														<div class="button-content-wrapper">
															<span class="button-text">
																<?php echo esc_html( $slide['button_text'] ); ?>
															</span>
														</div>
													</a>
												</div>
											</div>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach;
	}
}
