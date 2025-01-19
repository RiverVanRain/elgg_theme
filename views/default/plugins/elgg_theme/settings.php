<?php

$entity = elgg_extract('entity', $vars);

elgg_import_esm('js/elgg_theme');

// walled garden mode
echo elgg_view_field([
	'#type' => 'checkbox',
	'#label' => elgg_echo('elgg_theme:settings:walled_garden'),
	'name' => 'params[walled_garden]',
	'checked' => (bool) $entity->walled_garden,
	'switch' => true,
]);

// logo
echo elgg_view_field([
	'#type' => 'checkbox',
	'#label' => elgg_echo('elgg_theme:settings:topbar_logo_text'),
	'name' => 'params[topbar_logo_text]',
	'checked' => (bool) $entity->topbar_logo_text,
	'switch' => true,
]);

//landing page
echo elgg_view_field([
	'#type' => 'fieldset',
	'legend' => elgg_echo('elgg_theme:settings:landing'),
	'fields' => [
		[
			'#type' => 'text',
			'#label' => elgg_echo('elgg_theme:settings:landing:caption_h1'),
			'name' => 'params[caption_h1]',
			'value' => $entity->caption_h1 ?: '',
		],
		[
			'#type' => 'text',
			'#label' => elgg_echo('elgg_theme:settings:landing:caption_h2'),
			'name' => 'params[caption_h2]',
			'value' => $entity->caption_h2 ?: '',
		],
	],
]);

// call to action section
echo elgg_view_field([
	'#type' => 'checkbox',
	'#label' => elgg_echo('elgg_theme:settings:landing:action'),
	'name' => 'params[landing_action]',
	'checked' => (bool) $entity->landing_action,
	'switch' => true,
	'onchange' => 'landingAction();',
	'id' => 'landingAction',
]);

echo elgg_view_field([
	'#type' => 'fieldset',
	'class' => (bool) $entity->landing_action ? '' : 'hidden',
	'id' => 'settings-landing-action',
	'fields' => [
		[
			'#type' => 'text',
			'#label' => elgg_echo('elgg_theme:settings:landing:action:action_h1'),
			'name' => 'params[action_h1]',
			'value' => $entity->action_h1 ?: '',
		],
		[
			'#type' => 'text',
			'#label' => elgg_echo('elgg_theme:settings:landing:action:action_h2'),
			'name' => 'params[action_h2]',
			'value' => $entity->action_h2 ?: '',
		],
		[
			'#type' => 'text',
			'#label' => elgg_echo('elgg_theme:settings:landing:action:button_text'),
			'name' => 'params[button_text]',
			'value' => $entity->button_text ?: '',
		],
		[
			'#type' => 'url',
			'#label' => elgg_echo('elgg_theme:settings:landing:action:button_link'),
			'name' => 'params[button_link]',
			'value' => $entity->button_link ?: '',
		],
	],
]);

// members section
echo elgg_view_field([
	'#type' => 'checkbox',
	'#label' => elgg_echo('elgg_theme:settings:landing:display_members'),
	'name' => 'params[display_members]',
	'checked' => (bool) $entity->display_members,
	'switch' => true,
	'onchange' => 'displayMembers();',
	'id' => 'displayMembers',
]);

echo elgg_view_field([
	'#type' => 'fieldset',
	'class' => (bool) $entity->display_members ? '' : 'hidden',
	'id' => 'settings-display-members',
	'fields' => [
		[
			'#type' => 'text',
			'#label' => elgg_echo('elgg_theme:settings:landing:display_members:members_h1'),
			'name' => 'params[members_h1]',
			'value' => $entity->members_h1 ?: '',
		],
	],
]);

// groups section
echo elgg_view_field([
	'#type' => 'checkbox',
	'#label' => elgg_echo('elgg_theme:settings:landing:display_groups'),
	'name' => 'params[display_groups]',
	'checked' => (bool) $entity->display_groups,
	'switch' => true,
	'onchange' => 'displayGroups();',
	'id' => 'displayGroups',
]);

echo elgg_view_field([
	'#type' => 'fieldset',
	'class' => (bool) $entity->display_groups ? '' : 'hidden',
	'id' => 'settings-display-groups',
	'fields' => [
		[
			'#type' => 'text',
			'#label' => elgg_echo('elgg_theme:settings:landing:display_groups:groups_h1'),
			'name' => 'params[groups_h1]',
			'value' => $entity->groups_h1 ?: '',
		],
	],
]);

//sidebar
echo elgg_view_field([
	'#type' => 'fieldset',
	'legend' => elgg_echo('elgg_theme:settings:sidebar'),
	'fields' => [
		[
			'#type' => 'checkbox',
			'#label' => elgg_echo('elgg_theme:settings:activity_sidebar'),
			'name' => 'params[activity_sidebar]',
			'checked' => (bool) $entity->activity_sidebar,
			'switch' => true,
			'onchange' => 'activitySidebar();',
			'id' => 'activitySidebar',
		],
	],
]);

echo elgg_view_field([
	'#type' => 'fieldset',
	'class' => (bool) $entity->activity_sidebar ? '' : 'hidden',
	'id' => 'settings-activity-sidebar',
	'fields' => [
		[
			'#type' => 'checkbox',
			'#label' => elgg_echo('elgg_theme:settings:activity_sidebar:profile_icon'),
			'name' => 'params[sidebar_profile_icon]',
			'checked' => (bool) $entity->sidebar_profile_icon,
			'switch' => true,
		],
		[
			'#type' => 'checkbox',
			'#label' => elgg_echo('elgg_theme:settings:activity_sidebar:friends'),
			'name' => 'params[sidebar_friends]',
			'checked' => (bool) $entity->sidebar_friends,
			'switch' => true,
		],
	],
]);
