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
		'version' => '3.0.0',
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
	
	'bootstrap' => \wZm\ElggTheme\Bootstrap::class,

	'actions' => [
		'admin/elgg_theme/cover' => [
			'controller' => \wZm\ElggTheme\Actions\CoverAction::class,
			'access' => 'admin',
		],
		
		'admin/elgg_theme/logo' => [
			'controller' => \wZm\ElggTheme\Actions\LogoAction::class,
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
		'topbar_logo_text' => true,
		'landing_action' => true,
		'display_members' => true,
		'display_groups' => false,
		'activity_sidebar' => false,
		'sidebar_profile_icon' => true,
		'sidebar_friends' => true,
	],
];

