<?php

//logo
$file_src = elgg_get_data_path() . 'elgg_theme/logo.png';

if (file_exists($file_src)) {
	$asset_src = elgg_get_simplecache_url('elgg_theme/logo.png');
} else {
	$asset_src = elgg_get_simplecache_url('graphics/logo.png');
}
	
echo elgg_view('output/img', [
	'src' => $asset_src,
	'class' => 'elgg-theme-logo__preview mbl',
]);

echo elgg_view_field([
	'#type' => 'file',
	'#label' => elgg_echo('elgg_theme:settings:logo'),
	'name' => 'logo',
	'accept' => 'image/*',
	'#help' => elgg_echo('elgg_theme:settings:logo:help'),
]);

$footer = elgg_view_field([
	'#type' => 'submit',
	'value' => elgg_echo('save'),
]);

elgg_set_form_footer($footer);
