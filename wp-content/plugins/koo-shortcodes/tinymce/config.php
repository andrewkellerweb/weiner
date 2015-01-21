<?php

/*-----------------------------------------------------------------------------------*/
/*	Button Config
/*-----------------------------------------------------------------------------------*/

$koo_shortcodes['button'] = array(
	'no_preview' => true,
	'params' => array(
		'url' => array(
			'std' => '',
			'type' => 'text',
			'label' => __( 'Button URL', 'koo' ),
			'desc' => __( 'Add the button\'s url eg http://example.com', 'koo' )
		),

		'style' => array(
			'type' => 'select',
			'label' => __( 'Button Color', 'koo' ),
			'desc' => __( 'Select the button color', 'koo' ),
			'options' => array(
				'white' => __( 'White', 'koo' ),
				'blue' => __( 'Blue', 'koo' ),
				'black' => __( 'Black', 'koo' ),
				'green' => __( 'Green', 'koo' ),
				'light-blue' => __( 'Light Blue', 'koo' ),
				'pink' => __( 'Pink', 'koo' ),
				'red' => __( 'Red', 'koo' ),
				'orange' => __( 'Orange', 'koo' ),
				'purple' => __( 'Purple', 'koo' ),
				'grey' => __( 'Grey', 'koo' )
			)
		),

		'size' => array(
			'type' => 'select',
			'label' => __( 'Button Size', 'koo' ),
			'desc' => __( 'Select the button size', 'koo' ),
			'options' => array(
				'small' => __( 'Small', 'koo' ),
				'medium' => __( 'Medium', 'koo' ),
				'large' => __( 'Large', 'koo' )
			)
		),

		'type' => array(
			'type' => 'select',
			'label' => __( 'Button Type', 'koo' ),
			'desc' => __( 'Select the button type', 'koo' ),
			'options' => array(
				'square' => __( 'Square', 'koo' ),
				'round' => __( 'Round', 'koo' )
			)
		),

		'target' => array(
			'type' => 'select',
			'label' => __( 'Button Target', 'koo' ),
			'desc' => __( '_self = open in same window. _blank = open in new window', 'koo' ),
			'options' => array(
				'_self' => '_self',
				'_blank' => '_blank'
			)
		),

		'content' => array(
			'std' => __( 'Button Text', 'koo' ),
			'type' => 'text',
			'label' => __( 'Button Text', 'koo' ),
			'desc' => __( 'Add the button text', 'koo' ),
		)

	),
	'shortcode' => '[koo_button url="{{url}}" style="{{style}}" size="{{size}}" type="{{type}}" target="{{target}}"] {{content}} [/koo_button]',
	'popup_title' => __( 'Insert Button Shortcode', 'koo' )
);

/*-----------------------------------------------------------------------------------*/
/*	Alert Config
/*-----------------------------------------------------------------------------------*/

$koo_shortcodes['alert'] = array(
	'no_preview' => true,
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __( 'Alert Color', 'koo' ),
			'desc' => __( 'Select the alert color', 'koo' ),
			'options' => array(
				'white' => __( 'White', 'koo' ),
				'grey' => __( 'Grey', 'koo' ),
				'red' => __( 'Red', 'koo' ),
				'yellow' => __( 'Yellow', 'koo' ),
				'green' => __( 'Green', 'koo' ),
				'blue' => __( 'Blue', 'koo' )
			)
		),

		'content' => array(
			'std' => __( 'Your Alert!', 'koo' ),
			'type' => 'textarea',
			'label' => __( 'Alert Text', 'koo' ),
			'desc' => __( 'Add the alert text', 'koo' ),
		)
		
	),
	'shortcode' => '[koo_alert style="{{style}}"] {{content}} [/koo_alert]',
	'popup_title' => __( 'Insert Alert Shortcode', 'koo' )
);

/*-----------------------------------------------------------------------------------*/
/*	Toggle Config
/*-----------------------------------------------------------------------------------*/

$koo_shortcodes['toggle'] = array(
	'no_preview' => true,
	'params' => array(
		'title' => array(
			'type' => 'text',
			'label' => __( 'Toggle Content Title', 'koo' ),
			'desc' => __( 'Add the title that will go above the toggle content', 'koo' ),
			'std' => __( 'Title', 'koo' )
		),

		'content' => array(
			'std' => __( 'Content', 'koo' ),
			'type' => 'textarea',
			'label' => __( 'Toggle Content', 'koo' ),
			'desc' => __( 'Add the toggle content. Will accept HTML', 'koo' ),
		),

		'state' => array(
			'type' => 'select',
			'label' => __( 'Toggle State', 'koo'),
			'desc' => __( 'Select the state of the toggle on page load', 'koo' ),
			'options' => array(
				'open' => __( 'Open', 'koo' ),
				'closed' => __( 'Closed', 'koo' )
			)
		),
		
	),
	'shortcode' => '[koo_toggle title="{{title}}" state="{{state}}"] {{content}} [/koo_toggle]',
	'popup_title' => __( 'Insert Toggle Content Shortcode', 'koo' )
);

/*-----------------------------------------------------------------------------------*/
/*	Tabs Config
/*-----------------------------------------------------------------------------------*/

$koo_shortcodes['tabs'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode' => '[koo_tabs] {{child_shortcode}}  [/koo_tabs]',
    'popup_title' => __( 'Insert Tab Shortcode', 'koo' ),
    
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => __( 'Title', 'koo' ),
                'type' => 'text',
                'label' => __( 'Tab Title', 'koo' ),
                'desc' => __( 'Title of the tab', 'koo' ),
            ),

            'content' => array(
                'std' => __( 'Tab Content', 'koo' ),
                'type' => 'textarea',
                'label' => __( 'Tab Content', 'koo' ),
                'desc' => __( 'Add the tabs content', 'koo' )
            )
        ),
        'shortcode' => '[koo_tab title="{{title}}"] {{content}} [/koo_tab]',
        'clone_button' => __( 'Add Tab Shortcode', 'koo' )
    )
);

/*-----------------------------------------------------------------------------------*/
/*	Columns Config
/*-----------------------------------------------------------------------------------*/

$koo_shortcodes['columns'] = array(
	'params' => array(),
	'shortcode' => ' {{child_shortcode}} ',
	'popup_title' => __( 'Insert Columns Shortcode', 'koo' ),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'column' => array(
				'type' => 'select',
				'label' => __( 'Column Type', 'koo' ),
				'desc' => __( 'Select the width of the column.', 'koo' ),
				'options' => array(
					'koo_one_third' => __( 'One Third', 'koo' ),
					'koo_one_third_last' => __( 'One Third Last', 'koo' ),
					'koo_two_third' => __( 'Two Thirds', 'koo' ),
					'koo_two_third_last' => __( 'Two Thirds Last', 'koo' ),
					'koo_one_half' => __( 'One Half', 'koo' ),
					'koo_one_half_last' => __( 'One Half Last', 'koo' ),
					'koo_one_fourth' => __( 'One Fourth', 'koo' ),
					'koo_one_fourth_last' => __( 'One Fourth Last', 'koo' ),
					'koo_three_fourth' => __( 'Three Fourth', 'koo' ),
					'koo_three_fourth_last' => __( 'Three Fourth Last', 'koo' ),
					'koo_one_fifth' => __( 'One Fifth', 'koo' ),
					'koo_one_fifth_last' => __( 'One Fifth Last', 'koo' ),
					'koo_two_fifth' => __( 'Two Fifth', 'koo' ),
					'koo_two_fifth_last' => __( 'Two Fifth Last', 'koo' ),
					'koo_three_fifth' => __( 'Three Fifth', 'koo' ),
					'koo_three_fifth_last' => __( 'Three Fifth Last', 'koo' ),
					'koo_four_fifth' => __( 'Four Fifth', 'koo' ),
					'koo_four_fifth_last' => __( 'Four Fifth Last', 'koo' ),
					'koo_one_sixth' => __( 'One Sixth', 'koo' ),
					'koo_one_sixth_last' => __( 'One Sixth Last', 'koo' ),
					'koo_five_sixth' => __( 'Five Sixth', 'koo' ),
					'koo_five_sixth_last' => __( 'Five Sixth Last', 'koo' )
				)
			),
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => __( 'Column Content', 'koo' ),
				'desc' => __( 'Add the column content.', 'koo' ),
			)
		),
		'shortcode' => '[{{column}}] {{content}} [/{{column}}] ',
		'clone_button' => __( 'Add Column Shortcode', 'koo' )
	)
);

/*-----------------------------------------------------------------------------------*/
/*	Hightlight Config
/*-----------------------------------------------------------------------------------*/
$koo_shortcodes['highlight'] = array(
	'no_preview' => true,
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __( 'Highlight Color', 'koo' ),
			'desc' => __( 'Select the highlight color', 'koo' ),
			'options' => array(
				'yellow' => __( 'Yellow', 'koo' ),
				'blue' => __( 'Blue', 'koo' ),
				'red' => __( 'Red', 'koo' ),
				'green' => __( 'Green', 'koo' )
			)
		),
		'content' => array(
			'std' => __( 'Highlighted Text', 'koo' ),
			'type' => 'text',
			'label' => __( 'Highlight Text', 'koo' ),
			'desc' => __( 'Add the highlight\'s text', 'koo' ),
		)
		
	),
	'shortcode' => '[koo_highlight style="{{style}}"] {{content}} [/koo_highlight]',
	'popup_title' => __( 'Insert Highlight Shortcode', 'koo' )
);

/*-----------------------------------------------------------------------------------*/
/*	Box Config
/*-----------------------------------------------------------------------------------*/

$koo_shortcodes['box'] = array(
	'no_preview' => true,
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __( 'Box Color', 'koo' ),
			'desc' => __( 'Select the boxes color', 'koo' ),
			'options' => array(
				'white' => __( 'White', 'koo' ),
				'black' => __( 'Black', 'koo' ),
				'grey' => __( 'Grey', 'koo' ),
				'red' => __( 'Red', 'koo' ),
				'yellow' => __( 'Yellow', 'koo' ),
				'green' => __( 'Green', 'koo' ),
				'blue' => __( 'Blue', 'koo' ),
				'orange' => __( 'Orange', 'koo' )
			)
		),
		'title' => array(
			'std' => __( 'Title', 'koo' ),
			'type' => 'text',
			'label' => __( 'Box Title', 'koo' ),
			'desc' => __( 'The box title', 'koo' ),
		),
		'content' => array(
			'std' => __( 'Your Box Content!', 'koo' ),
			'type' => 'textarea',
			'label' => __( 'Box Content', 'koo' ),
			'desc' => __( 'Add the box content', 'koo' ),
		)
		
	),
	'shortcode' => '[koo_box style="{{style}}" title="{{title}}"] {{content}} [/koo_box]',
	'popup_title' => __( 'Insert Box Shortcode', 'koo' )
);

/*-----------------------------------------------------------------------------------*/
/*	Accordion Config
/*-----------------------------------------------------------------------------------*/

$koo_shortcodes['accordions'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode' => '[koo_accordions] {{child_shortcode}}  [/koo_accordions]',
    'popup_title' => __( 'Insert Accordion Shortcode', 'koo' ),
    
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => __( 'Title', 'koo' ),
                'type' => 'text',
                'label' => __( 'Accordion Title', 'koo' ),
                'desc' => __( 'Title of the accordion', 'koo' ),
            ),
            'content' => array(
                'std' => __( 'Accordion Content', 'koo' ),
                'type' => 'textarea',
                'label' => __( 'Accordion Content', 'koo' ),
                'desc' => __( 'Add the accordions content', 'koo' )
            )
        ),
        'shortcode' => '[koo_accordion title="{{title}}"] {{content}} [/koo_accordion]',
        'clone_button' => __( 'Add Accordion Shortcode', 'koo' )
    )
);

?>