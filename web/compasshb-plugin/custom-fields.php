<?php

/* Advanced Custom Fields */
if(function_exists("register_field_group")) {
	
	register_field_group(array (
		'id' => 'acf_sotd-custom-post-type',
		'title' => 'Scripture of the Day Custom Post Type',
		'fields' => array (
			array (
				'key' => 'field_5472cf2004b30',
				'label' => 'Instructions',
				'name' => '',
				'type' => 'message',
				'message' => 'Put the scripture reference in the title field above (<em>e.g.</em> 1 Thessalonians 1).',
			),
			array (
				'key' => 'field_5472cba8cbd8e',
				'label' => 'Pastor\'s Note',
				'name' => 'sotd_summary',
				'type' => 'textarea',
				'instructions' => 'Optional',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'read',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
				1 => 'excerpt',
				2 => 'custom_fields',
				3 => 'discussion',
		//		4 =  'comments',
				5 => 'revisions',
				6 => 'author',
				7 => 'format',
		//		8 => 'featured_image',
				9 => 'categories',
				10 => 'tags',
				11 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
	
	register_field_group(array (
		'id' => 'acf_event-custom-post',
		'title' => 'Event Custom Post',
		'fields' => array (
			array (
				'key' => 'field_546584f1c7eb3',
				'label' => 'Related Content',
				'name' => 'related_content',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'page',
					1 => 'sermon',
					2 => 'article',
					3 => 'video',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
					1 => 'post_type',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'event',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'excerpt',
				1 => 'custom_fields',
				2 => 'discussion',
				3 => 'comments',
				4 => 'author',
				5 => 'format',
				6 => 'categories',
				7 => 'tags',
				8 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
	
	register_field_group(array (
		'id' => 'acf_series-custom-post',
		'title' => 'Series Custom Post',
		'fields' => array (
			array (
				'key' => 'field_542cd465666a9',
				'label' => 'Image',
				'name' => 'series_image',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_542cd4be666aa',
				'label' => 'Description',
				'name' => 'series_description',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'series',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
				1 => 'excerpt',
				2 => 'discussion',
				3 => 'comments',
				4 => 'author',
				5 => 'format',
				6 => 'tags',
				7 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
	
	register_field_group(array (
		'id' => 'acf_sermon-custom-post',
		'title' => 'Sermon Custom Post',
		'fields' => array (
			array (
				'key' => 'field_5417db672e922',
				'label' => 'Number',
				'name' => 'sermon_number',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => 4,
			),
			array (
				'key' => 'field_5417ec64ab140',
				'label' => 'Text',
				'name' => 'sermon_text',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => 'Chapter and verse - or "Various" 1',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5417d60a846da',
				'label' => 'Worksheet',
				'name' => 'sermon_worksheet',
				'type' => 'file',
				'instructions' => 'Upload PDF',
				'save_format' => 'object',
				'library' => 'all',
			),
			array (
				'key' => 'field_5417d5ad846d9',
				'label' => 'Sermon',
				'name' => 'video_oembed',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'URL to Vimeo page',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5417dd5e094a9',
				'label' => 'Series',
				'name' => 'sermon_series',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'series',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'sermon',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'excerpt',
				1 => 'discussion',
				2 => 'comments',
				3 => 'revisions',
				4 => 'slug',
				5 => 'format',
		//		6 => 'featured_image',
				7 => 'tags',
				8 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
	
	register_field_group(array (
		'id' => 'acf_video-custom-post',
		'title' => 'Video Custom Post',
		'fields' => array (
			array (
				'key' => 'field_542b9985d519a',
				'label' => 'Video',
				'name' => 'video_oembed',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => 'Vimeo URL',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_category',
					'operator' => '==',
					'value' => '4',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'video',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'excerpt',
				1 => 'discussion',
				2 => 'comments',
				3 => 'revisions',
				4 => 'author',
				5 => 'format',
				6 => 'featured_image',
				7 => 'categories',
				8 => 'tags',
				9 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
	
}
?>