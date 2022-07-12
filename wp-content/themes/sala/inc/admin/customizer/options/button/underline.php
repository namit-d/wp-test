<?php
$section  = 'button_underline';
$prefix   = 'button_underline_';

// Button
Sala_Kirki::add_section( $section, array(
	'title'    => esc_html__( 'Underline', 'sala' ),
    'panel'    => $panel,
	'priority' => $priority++,
) );

// Content
Sala_Kirki::add_field( 'theme', [
	'type'     => 'notice',
	'settings' => 'notice_button',
	'label'    => esc_html__( 'Underline', 'sala' ),
	'section'  => $section,
	'priority' => $priority++,
] );

Sala_Kirki::add_field( 'theme', array(
	'type'      => 'multicolor',
	'settings'  => $prefix . 'color',
	'label'     => esc_html__( 'Color', 'sala' ),
	'section'   => $section,
	'priority'  => $priority++,
	'transport' => 'auto',
	'choices'   => array(
		'normal' => esc_attr__( 'Normal', 'sala' ),
		'hover'  => esc_attr__( 'Hover', 'sala' ),
	),
	'default'     => array(
		'normal' => $default[$prefix . 'color'],
		'hover'  => $default[$prefix . 'hover_color'],
	),
	'output'      => array(
		array(
			'choice'   => 'normal',
			'element'  => '.sala-button.underline',
			'property' => 'color',
		),
		array(
			'choice'   => 'hover',
			'element'  => '.sala-button.underline:hover,.sala-button.underline:focus',
			'property' => 'color',
		),
	),
) );

Sala_Kirki::add_field( 'theme', array(
	'type'      => 'multicolor',
	'settings'  => $prefix . 'background_color',
	'label'     => esc_html__( 'Background Color', 'sala' ),
	'section'   => $section,
	'priority'  => $priority++,
	'transport' => 'auto',
	'choices'   => array(
		'normal' => esc_attr__( 'Normal', 'sala' ),
		'hover'  => esc_attr__( 'Hover', 'sala' ),
	),
	'default'     => array(
		'normal' => $default[$prefix . 'background_color'],
		'hover'  => $default[$prefix . 'hover_background_color'],
	),
	'output'      => array(
		array(
			'choice'   => 'normal',
			'element'  => '.sala-button.underline',
			'property' => 'background-color',
		),
		array(
			'choice'   => 'hover',
			'element'  => '.sala-button.underline:hover',
			'property' => 'background-color',
		),
	),
) );

Sala_Kirki::add_field('theme', [
    'type'      => 'spacing',
    'settings'  => $prefix . 'padding',
    'label'     => esc_attr__('Padding', 'sala'),
    'section'   => $section,
    'priority'  => $priority++,
    'transport' => 'auto',
    'default'   => array(
        'top'    => '0px',
        'right'  => '0px',
        'bottom' => '6px',
        'left'   => '0px',
    ),
    'output'    => array(
        array(
            'element'  => '.sala-button.underline',
            'property' => 'padding',
        ),
    ),
]);

Sala_Kirki::add_field('theme', [
    'type'      => 'slider',
    'settings'  => $prefix . 'radius',
    'label'     => esc_attr__('Radius', 'sala'),
    'section'   => $section,
    'priority'  => $priority++,
    'transport' => 'auto',
    'default'   => $default[$prefix . 'radius'],
    'choices'   => array(
        'min'  => 0,
        'max'  => 50,
        'step' => 1,
    ),
    'output'    => array(
        array(
            'element'  => '.sala-button.underline',
            'property' => 'border-radius',
            'units'    => 'px',
        ),
    ),
]);

Sala_Kirki::add_field('theme', [
    'type'      => 'select',
    'settings'  => $prefix . 'border',
    'label'     => esc_attr__('Border', 'sala'),
    'section'   => $section,
    'priority'  => $priority++,
    'transport' => 'auto',
    'default'   => $default[$prefix . 'border'],
    'choices'   => [
        'none'   => esc_attr__('None', 'sala'),
        'solid'  => esc_attr__('Solid', 'sala'),
        'double' => esc_attr__('Double', 'sala'),
        'dashed' => esc_attr__('Dashed', 'sala'),
        'groove' => esc_attr__('Groove', 'sala'),
    ],
    'output'    => array(
        array(
            'element'  => '.sala-button.underline',
            'property' => 'border-style',
        ),
    ),
]);

Sala_Kirki::add_field('theme', [
    'type'      => 'color-alpha',
    'settings'  => $prefix . 'border_color',
    'label'     => esc_attr__('Border Color', 'sala'),
    'section'   => $section,
    'priority'  => $priority++,
    'transport' => 'auto',
    'default'   => $default[$prefix . 'border_color'],
    'output'    => array(
        array(
            'element'  => '.sala-button.underline',
            'property' => 'border-color',
        ),
    ),
    'active_callback' => [
        [
            'setting'  => $prefix . 'border',
            'operator' => '!==',
            'value'    => 'none',
        ]
    ],
]);

Sala_Kirki::add_field('theme', [
    'type'      => 'slider',
    'settings'  => $prefix . 'border_top',
    'label'     => esc_attr__('Border Top', 'sala'),
    'section'   => $section,
    'priority'  => $priority++,
    'transport' => 'auto',
    'default'   => 0,
    'choices'   => array(
        'min'  => 0,
        'max'  => 10,
        'step' => 1,
    ),
    'output'    => array(
        array(
            'element'  => '.sala-button.underline',
            'property' => 'border-top-width',
            'units'    => 'px',
        ),
    ),
    'active_callback' => [
        [
            'setting'  => $prefix . 'border',
            'operator' => '!==',
            'value'    => 'none',
        ]
    ],
]);

Sala_Kirki::add_field('theme', [
    'type'      => 'slider',
    'settings'  => $prefix . 'border_right',
    'label'     => esc_attr__('Border Right', 'sala'),
    'section'   => $section,
    'priority'  => $priority++,
    'transport' => 'auto',
    'default'   => 0,
    'choices'   => array(
        'min'  => 0,
        'max'  => 10,
        'step' => 1,
    ),
    'output'    => array(
        array(
            'element'  => '.sala-button.underline',
            'property' => 'border-right-width',
            'units'    => 'px',
        ),
    ),
    'active_callback' => [
        [
            'setting'  => $prefix . 'border',
            'operator' => '!==',
            'value'    => 'none',
        ]
    ],
]);

Sala_Kirki::add_field('theme', [
    'type'      => 'slider',
    'settings'  => $prefix . 'border_bottom',
    'label'     => esc_attr__('Border Bottom', 'sala'),
    'section'   => $section,
    'priority'  => $priority++,
    'transport' => 'auto',
    'default'   => 1,
    'choices'   => array(
        'min'  => 0,
        'max'  => 10,
        'step' => 1,
    ),
    'output'    => array(
        array(
            'element'  => '.sala-button.underline',
            'property' => 'border-bottom-width',
            'units'    => 'px',
        ),
    ),
    'active_callback' => [
        [
            'setting'  => $prefix . 'border',
            'operator' => '!==',
            'value'    => 'none',
        ]
    ],
]);

Sala_Kirki::add_field('theme', [
    'type'      => 'slider',
    'settings'  => $prefix . 'border_left',
    'label'     => esc_attr__('Border Left', 'sala'),
    'section'   => $section,
    'priority'  => $priority++,
    'transport' => 'auto',
    'default'   => 0,
    'choices'   => array(
        'min'  => 0,
        'max'  => 10,
        'step' => 1,
    ),
    'output'    => array(
        array(
            'element'  => '.sala-button.underline',
            'property' => 'border-left-width',
            'units'    => 'px',
        ),
    ),
    'active_callback' => [
        [
            'setting'  => $prefix . 'border',
            'operator' => '!==',
            'value'    => 'none',
        ]
    ],
]);
