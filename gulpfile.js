var gulp = require('gulp'),
		jshint = require('gulp-jshint'),
		browserify = require('gulp-browserify'),
		gutil = require('gutil'),
		merge = require('merge-stream'),
		concat = require('gulp-concat');

// var browserSync = require('browser-sync').create();

var rename = require('gulp-rename');
var sass = require('gulp-sass');

var browserify = require('gulp-browserify');
var uglify = require('gulp-uglify');

var autoprefixer = require('gulp-autoprefixer');

var input = {
	css: './stylesheets/**/*.scss',
	js: {
		allMain: 'scripts/js/**/*.js',
		allVendor: 'scripts/vendor/**/*.js',
		main: 'scripts/js/src/main.js',
		vendor: 'scripts/vendor/src/main-vendor.js',
	},
};
var output = {
	css: './stylesheets/dist',
	js: './scripts/dist',
};

var public = {
	css: './public/css',
	js: './public/js'
};

var sassOption = {
	errLogToConsole: true,
	outputStyle: 'expanded'
};

var prodOption = {
	outputStyle: 'compressed'
};

gulp.task('sass', function () {

	var sassStream, cssStream;

	sassStream = gulp
		.src(input.css) // find the .scss files from ./folder
		.pipe(sass(sassOption).on('error', function (err) {
			console.log(err.toString());
			this.emit('end');
		}))
		.pipe(sass()) // run sass on those files
		.pipe(concat('main.build.css')) // set filename for css build
		.pipe(gulp.dest(output.css)) // write the result css to output folder
		.pipe(gulp.dest(public.css)); // write the result css to output folder

	// cssStream = gulp.src('stylesheets/skins/lightgray/*.css');

	// return merge(sassStream, cssStream).pipe(concat('main.build.css')) // set filename for css build
	// 	.pipe(gulp.dest(output.css)) // write the result css to output folder
	// 	.pipe(gulp.dest(public.css)); // write the result css to output folder

	return sassStream;
});

gulp.task('jshint', function() {

	return gulp.src(input.js)
		.pipe(jshint())
		.pipe(jshint.reporter('jshint-stylish'));
});

gulp.task('scripts_vendor', function () {

	gulp.src(input.js.vendor, {read: false})
		.pipe(browserify({
			insertGlobals: true,
			debug: ! (gutil.env == 'production'),
		}).on('error', function (err) {
			console.log(err.toString());
			this.emit('end');
		}))
		.pipe(rename('main.vendor.build.js'))
		.pipe(gulp.dest(output.js))
		.pipe(gulp.dest(public.js));
});

gulp.task('scripts_main', function () {

	gulp.src(input.js.main, {read: false})
		.pipe(browserify({
			insertGlobals: true,
			debug: ! (gutil.env == 'production'),
			extensions: ['.js'],
		}).on('error', function (err) {
			console.log(err.toString());
			this.emit('end');
		}))
		.pipe(rename('main.build.js'))
		.pipe(gulp.dest(output.js))
		.pipe(gulp.dest(public.js));
});

gulp.task('prod', ['sass'], function () {
	return gulp
			.src(input.css)
			.pipe(sass(prodOption))
			.pipe(autoprefixer('last 15 version'))
			.pipe(rename('main.build.css')) // set filename for css build
			.pipe(gulp.dest(output.css))
			.pipe(gulp.dest(public));
});

gulp.task('watch', ['sass', 'scripts_vendor', 'scripts_main'], function () {
	gulp.watch('stylesheets/**/*.scss', ['sass']);
	gulp.watch(input.js.allVendor, ['scripts_vendor']);
	gulp.watch(input.js.allMain, ['scripts_main']);
	// gulp.watch('*.html', browserSync.reload);
});

//default
gulp.task('default', ['sass']);
