<?php
/**
 * Elgg header logo
 */

$text = elgg_get_site_entity()->getDisplayName();

$asset_src = false;

$file_src = elgg_get_data_path() . 'elgg_theme/logo.png';

if (file_exists($file_src)) {
	$asset_src = elgg_get_simplecache_url('elgg_theme/logo.png');

	$text = elgg_format_element('img', [
		'src' => $asset_src,
		'alt' => elgg_get_site_entity()->getDisplayName(),
	]);
}

if ((bool) elgg_get_plugin_setting('topbar_logo_text', 'elgg_theme')) {
	$text = elgg_get_site_entity()->getDisplayName();
}

echo elgg_format_element('div', [
	'class' => 'elgg-heading-site elgg-loud'
], elgg_view('output/url', [
	'text' => $text,
	'href' => elgg_get_site_entity()->getURL(),
	'title' => elgg_get_site_entity()->getDisplayName(),
]));
