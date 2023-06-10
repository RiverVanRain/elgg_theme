define(['jquery'], function ($) {
	
	landing_action = function(elem) {
		if ($(elem).is(':checked')) {
			$('#settings-landing-action').show();
		} else {
			$('#settings-landing-action').hide();
		}
	};
	
	display_members = function(elem) {
		if ($(elem).is(':checked')) {
			$('#settings-display-members').show();
		} else {
			$('#settings-display-members').hide();
		}
	};
	
	display_groups = function(elem) {
		if ($(elem).is(':checked')) {
			$('#settings-display-groups').show();
		} else {
			$('#settings-display-groups').hide();
		}
	};
	
	activity_sidebar = function(elem) {
		if ($(elem).is(':checked')) {
			$('#settings-activity-sidebar').show();
		} else {
			$('#settings-activity-sidebar').hide();
		}
	};
});
