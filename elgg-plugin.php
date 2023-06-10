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
	
	'view_extensions' => [
        'elgg.css' => [
            'elgg_theme/elgg_theme.css' => [],
        ],
		'river/sidebar' => [
            'elgg_theme/sidebar' => [],
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

