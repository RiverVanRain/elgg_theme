<?php

namespace wZm\ElggTheme\Actions;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class SettingsAction {

	public function __invoke(\Elgg\Request $request) {
		$asset = 'cover';
		$upload = elgg_get_uploaded_file($asset);
		
		if (!$upload instanceof UploadedFile || !$upload->isValid()) {
			return elgg_error_response(elgg_echo('elgg_theme:settings:cover:invalid'));
		}
		
		$assets_dir = elgg_get_data_path() . '/elgg_theme/';

		if (!is_dir($assets_dir)) {
			mkdir($assets_dir, 0755, true);
		}
		
		$target = elgg_get_data_path() . 'elgg_theme/' . $asset . '.png';
		if (file_exists($target)) {
			unlink($target);
		}
		
		try {
			$upload->move(elgg_get_data_path() . 'elgg_theme/', $asset . '.png');
			elgg_invalidate_caches();
			elgg_clear_caches();
		} catch (\Exception $ex) {
			return false;
		}
		
		return elgg_ok_response('', elgg_echo('elgg_theme:settings:cover:success'));
	}
}