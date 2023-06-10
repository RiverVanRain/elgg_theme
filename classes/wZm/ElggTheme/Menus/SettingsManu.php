<?php

namespace wZm\ElggTheme\Menus;

class SettingsManu {
	
	public function __invoke(\Elgg\Event $event) {
		if (!elgg_in_context('admin') || !elgg_is_admin_logged_in()) {
			return;
		}
		
		$current_route = elgg_get_current_route();
		if (elgg_extract('segments', $current_route->getMatchedParameters()) !== 'plugins' && $current_route->getName() !== 'admin:plugin_settings') {
			return;
		}
		
		$menu = $event->getValue();
		/* @var $menu \Elgg\Collections\Collection */

		$menu->add(\ElggMenuItem::factory([
			'name' => 'elgg_theme:cover',
			'text' => elgg_echo('admin:elgg_theme:cover'),
			'href' => elgg_normalize_url('admin/elgg_theme/cover'),
			'parent_name' => 'plugin:settings:elgg_theme',
			'section' => 'plugin_settings',
		]));
		
		return $menu;
	}
}
