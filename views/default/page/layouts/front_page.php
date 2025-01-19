<?php

$entity = elgg_get_plugin_from_id('elgg_theme');

echo elgg_view('elgg_theme/elements/featured');

$action_content = '';
$members_content = '';
$groups_content = '';

// call to action section
if ((bool) $entity->landing_action) {
	$header = '';
	$sub = '';
	$button = '';
	
	if (!empty($entity->action_h1)) {
		$h1 = elgg_format_element('h1', [], $entity->action_h1);
		$header = elgg_format_element('div', [
			'class' => 'elgg-head elgg-layout-header',
		], $h1);
	}
	
	if (!empty($entity->action_h2)) {
		$sub = elgg_format_element('div', [
			'class' => 'elgg-layout-content',
		], $entity->action_h2);
	}
	
	if (!empty($entity->button_link)) {
		$button = elgg_format_element('div', ['class' => 'action-button'], elgg_view('output/url', [
			'text' => $entity->button_text,
			'href' => $entity->button_link,
			'class' => 'elgg-button elgg-button-action',
		]));
	}
	
	$body = elgg_format_element('div', ['class' => 'elgg-container action'], $header . $sub . $button);
	$action_content = elgg_format_element('div', ['class' => 'elgg-layout-content'], $body);
}

// members section 
if ((bool) $entity->display_members) {
	$members = elgg_get_entities([
		'type' => 'user',
		'full_view' => false,
		'pagination' => false,
		'limit' => 10,
		'offset' => 0,
	]);
	
	$header = '';
	$items = '';
	
	if (!empty($entity->members_h1)) {
		$h1 = elgg_format_element('h1', [], $entity->members_h1);
		
		if (elgg_is_active_plugin('members')) {
			$h1 = elgg_format_element('h1', [], elgg_view('output/url', [
				'text' => $entity->members_h1,
				'href' => elgg_generate_url('collection:user:user'),
			]));
		}
		
		$header = elgg_format_element('div', [
			'class' => 'elgg-head elgg-layout-header',
		], $h1);
	}
	
	$i = 0; 
	foreach ($members as $member) {
		if ($member->banned === 'yes') {
			continue;
		}
		$name = elgg_format_element('div', [], $member->getDisplayName());
		$items .= elgg_format_element('div', [
			'class' => 'elgg-item',
		], elgg_view_entity_icon($member, 'medium', [
			'use_hover' => false
		]) . $name);
		
		$i ++;
		if ($i == 5) {
			break;
		}
	}
	
	$body = elgg_format_element('div', ['class' => 'elgg-container members'], $header . $items);
	
	$members_content = elgg_format_element('div', ['class' => 'elgg-layout-content'], $body);
}

// groups section
if (elgg_is_active_plugin('groups') && (bool) $entity->display_groups) {
	$groups = elgg_get_entities([
		'type' => 'group', 
		'full_view' => false,
		'pagination' => false,
		'limit' => 10,
		'offset' => 0
	]);
	
	$header = '';
	$group_items = '';
	
	if (!empty($entity->groups_h1)) {
		$h1 = elgg_format_element('h1', [], elgg_view('output/url', [
			'text' => $entity->groups_h1,
			'href' => elgg_generate_url('default:group:group'),
		]));
		
		$header = elgg_format_element('div', [
			'class' => 'elgg-head elgg-layout-header',
		], $h1);
	}

	$i = 0;
	foreach ($groups as $group) {
		if ($group->getContentAccessMode() == ElggGroup::CONTENT_ACCESS_MODE_MEMBERS_ONLY) {
			continue;
		}
		
		$name = elgg_format_element('div', [], $group->getDisplayName());
		
		$members_count = $group->getMembers(['count' => true]);
		$sub = elgg_format_element('div', [], elgg_echo('groups:members_count', [$members_count]));
		
		$group_items .= elgg_format_element('div', [
			'class' => 'elgg-item',
		], elgg_view_entity_icon($group, 'medium') . $name . $sub );
		
		$i ++;
		if ($i == 5) {
			break;
		}
	}
	$body = elgg_format_element('div', ['class' => 'elgg-container groups'], $header . $group_items);
	$groups_content = elgg_format_element('div', ['class' => 'elgg-layout-content'], $body);
}
	
echo elgg_format_element('div', [
	'class' => 'elgg-landing-page-body'
], $action_content . $members_content . $groups_content);
