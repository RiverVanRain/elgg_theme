<?php

if ((bool) elgg_get_plugin_setting('walled_garden', 'elgg_theme')) {
	elgg_push_context('elgg_theme');
	$class = ['class' => 'elgg-landing-page'];

	$body = elgg_view_layout('front_page');
	echo elgg_view_page('', $body, 'default', ['body_attrs' => $class]);
} else {
	echo elgg_view_page('', [
		'content' => elgg_view('core/account/login_box', ['title' => false]),
		'title' => elgg_echo('login'),
		'sidebar' => false,
		'filter' => false,
	], 'walled_garden');
}
