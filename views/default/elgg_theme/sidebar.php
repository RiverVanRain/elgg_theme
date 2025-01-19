<?php

use Elgg\Database\Clauses\OrderByClause;

$entity = elgg_get_plugin_from_id('elgg_theme');

if (!elgg_is_logged_in() || !(bool) $entity->activity_sidebar) {
	return;
}

$user = elgg_get_logged_in_user_entity();

if ((bool) $entity->sidebar_profile_icon) {
	$icon = elgg_format_element('div', ['class' => 'elgg-theme-sidebar-profile'], elgg_view_entity_icon($user, 'medium'));
	
	echo elgg_view_module('aside', $user->getDisplayName(), $icon);
}

if ((bool) $entity->sidebar_friends) {
	$content = elgg_list_entities([
		'relationship' => 'friend',
		'relationship_guid' => $user->guid,
		'inverse_relationship' => false,
		'type' => 'user',
		'full_view' => false,
		'pagination' => false,
		'list_type' => 'gallery',
		'limit' => 40,
		'size' => 'small',
		'no_results' => elgg_echo('friends:none'),
		'order_by' => new OrderByClause('RAND()', null),
	]);
	
	$friends_count = function ($user) {
		return elgg_count_entities([
			'relationship' => 'friend',
			'relationship_guid' => $user->guid,
			'inverse_relationship' => false,
			'type' => 'user',
		]);
	};

	$count = elgg_format_element('span', ['class' => 'mlm'], '(' . $friends_count($user) . ')');
	
	$url = elgg_view('output/url', [
		'href' => elgg_generate_url('collection:friends:owner', [
			'username' => $user->username,
		]),
		'text' => elgg_echo('friends'),
	]);
	
	$title = elgg_format_element('span', [], $url . $count);
	
	
	echo elgg_view_module('aside', $title, $content);
}
