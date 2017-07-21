// this will handle all the routing for dynamic loading of modules

module.exports = function() {
		
		// route for homepage
		crossroads.addRoute('recipe/create', function () {
			var g = require('./../view/recipe/create.v.js');
			new g();
		});
		
		var recipePerCategory = crossroads.addRoute('{category_name}/edit/{recipe_name}',
			function ( category_name, recipe_name ) {

				var a = require('./../view/recipe/edit.v.js');
				new a();
			});

		recipePerCategory.rules = {

			category_name: ['appetizer', 'main-dish', 'desserts', 'soup'],
		};

		// this will log every change of url
		crossroads.parse(window.location.pathname);

 };

// #router.js