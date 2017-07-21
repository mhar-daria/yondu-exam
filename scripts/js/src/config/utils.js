window.APP = window.APP || {};

APP.pattern = {

	and: /[&]/gi,

	hours: /hrs/gi,

	nonWord: /[^\w ]/g,

	whitespace: /([ ]{1,})/g

};

APP.utils = {

	messages: {
	
	},

	url: function( url ) {

		return window.location.origin + '/' + (url || '');
	},

	img: function (url) {
		return this.url('public/images/uploads/' + url);
	},

	// return rest url
	rest: function(url) {
		return (this.url('api/v1/') + url.toString());
	},

	category: function () {

		return window.location.pathname.replace(/^[/]/gi, '').split('/').shift();
	},


	setCategory: function () {

		var category = this.category();

		if ( ! category ) {

			category = 'home';
		}

		var $elem = $('a[data-category="'+category+'"]');

		if ( _.size($elem) ) {

			$elem.closest('ul').find('li').removeClass('active'); // find all li in nav and remove active
			$elem.parent().addClass('active'); // set as active

			return true;
		}

		return false;
	}
};

// #utils.js