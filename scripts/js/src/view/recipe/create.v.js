module.exports = Backbone.View.extend({

	el: '#fn-recipe-create',

	initialize: function () {

		Tinymce.init({ 
			selector: '.wyswig', 
			theme_url: ('/public/skins/tinymce/js/themes/theme.js').replace("\/\/", "\/"),
			theme: 'modern',
			skin_url: ('/public/skins/tinymce/css/lightgray/').replace("\/\/", "\/"),
			plugins_url: ('/public/skins/tinymce/plugins').replace("\/\/", "\/"),
			height: 500,
			menubar: false,
			plugins: [
		    'advlist autolink lists link image charmap print preview anchor',
		    'searchreplace visualblocks code fullscreen',
		    'insertdatetime table contextmenu paste code'
		  ],
			toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link',
		});
	},

	// events
	btnSubmit: function (e) {

		$(e.target).attr('disabled', 'disabled');
	},
	// end events

	events: {

		'#btn-create click': 'btnSubmit',
	}
});