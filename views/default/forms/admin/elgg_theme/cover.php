<?php

//cover
$file_src = elgg_get_data_path() . 'elgg_theme/cover.png';

if (file_exists($file_src)) {
	$asset_src = elgg_get_simplecache_url('elgg_theme/cover.png');
} else {
	$asset_src = elgg_get_simplecache_url('graphics/cover.jpg');
}
	
echo elgg_view('output/img', [
	'src' => $asset_src,
	'class' => 'elgg-theme-cover__preview mbl',
]);

echo elgg_view_field([
	'#type' => 'file',
	'#label' => elgg_echo('elgg_theme:settings:cover'),
	'name' => 'cover',
	'accept' => 'image/png',
	'#help' => elgg_echo('elgg_theme:settings:cover:help'),
]);

$footer = elgg_view_field([
	'#type' => 'submit',
	'value' => elgg_echo('save'),
]);

elgg_set_form_footer($footer);
