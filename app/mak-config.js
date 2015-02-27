(function(window, angular, undefined) {
	'use strict';

	/* App Config */
	var makConfig = angular.module('makConfig', []);
	makConfig.value('makConfig', {
		apiUrl: 'http://banjo01.megumi-demo.org/',
		menu_id: 'primary'
	});

})(window, window.angular);
