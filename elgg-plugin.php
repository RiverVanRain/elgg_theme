<?php
/**
 * Elgg Landing Theme 
 * @author Nikolai Shcherbin
 * @license GNU Affero General Public License version 3
 * @copyright (c) Nikolai Shcherbin 2022
 * @link https://wzm.me
**/

return [
	'plugin' => [
		'name' => 'Elgg Landing Theme',
		'version' => '2.0.0',
		'dependencies' => [
			'activity' => [
				'position' => 'after',
				'must_be_active' => false,
			],
			'groups' => [
				'position' => 'after',
				'must_be_active' => false,
			],
		],
		'activate_on_install' => true,
	],

	'actions' => [
		//admin
		'admin/elgg_theme/cover' => [
			'controller' => \wZm\ElggTheme\Actions\SettingsAction::class,
			'access' => 'admin',
		],
	],
	
	'events' => [
		'register' => [
			'menu:page' => [
				\wZm\ElggTheme\Menus\SettingsManu::class => [],
			],
		],
	],
	
	'view_extensions' => [
        'admin.css' => [
            'elgg_theme/elgg_theme_admin.css' => [],
        ],
		'elgg.css' => [
            'elgg_theme/elgg_theme.css' => [],
        ],
		'river/sidebar' => [
            'elgg_theme/sidebar' => [],
        ],
    ],
	
	'view_options' => [
		'graphics/cover.jpg' => ['simplecache' => true],
	],
	
	'views' => [
		'default' => [
			'elgg_theme/' => elgg_get_data_path() . 'elgg_theme/',
		],
	],

	'settings' => [
		'landing_action' => true,
		'display_members' => true,
		'display_groups' => false,
		'activity_sidebar' => false,
		'sidebar_profile_icon' => true,
		'sidebar_friends' => true,
	],
];

