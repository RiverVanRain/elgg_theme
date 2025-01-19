import $ from 'jquery';

const landingAction = () => {
	if ($('#landingAction').is(':checked')) {
		$('#settings-landing-action').show();
	} else {
		$('#settings-landing-action').hide();
	}
};

const displayMembers = () => {
	if ($('#displayMembers').is(':checked')) {
		$('#settings-display-members').show();
	} else {
		$('#settings-display-members').hide();
	}
};
	
const displayGroups = () => {
	if ($('#displayGroups').is(':checked')) {
		$('#settings-display-groups').show();
	} else {
		$('#settings-display-groups').hide();
	}
};

const activitySidebar = () => {
	if ($('#activitySidebar').is(':checked')) {
		$('#settings-activity-sidebar').show();
	} else {
		$('#settings-activity-sidebar').hide();
	}
};

landingAction();
displayMembers();
displayGroups();
activitySidebar();

$(document).ready(() => {
    $('#landingAction').change(landingAction);
	$('#displayMembers').change(displayMembers);
	$('#displayGroups').change(displayGroups);
	$('#activitySidebar').change(activitySidebar);
});
