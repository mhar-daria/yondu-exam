var APP = window.APP || {};

require('./config/config');
require('./modules/parsleyjs/parsleyjs.addons');

// utilities
require('./config/utils.js');

// routing
var router = require('./router/router');

(function() {

	// lazyload images
	$('img.images-lazy').lazyload({
		threshold: 200,
	})
	.removeClass('images-lazy')
	.filter(':in-viewport').trigger('appear');

  APP.utils.setCategory();

	// router
	new router;
}());