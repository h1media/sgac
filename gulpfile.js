var config = {
    devUrl: 'sgac.loc.com',
    sass: 'assets/scss/**/*.{scss,sass}',
    sassFolder: 'assets/sass/',
    css: 'dist/css',
    cssUrl: 'dist/css/app.min.css',

    jsMain : 'assets/js/app.js',
    jsVendor: 'assets/js/vendor/**/*.js',
    jsSrc : 'assets/js/**/*.js',
    js: 'dist/js/',

    spriteSrc : 'assets/img/sprites/*.*',
    spriteOut : 'dist/img/',
    spriteSass : 'assets/scss/global/',

    fontsSrc : 'assets/fonts/**',
    fontsDist : 'dist/fonts/',

    imgSrc : ['assets/img/**', '!assets/img/sprites/**'],
    imgDist : 'dist/img'

};

// Core
require('es6-promise').polyfill();
var gulp        = require('gulp');
var browserSync = require('browser-sync');
var gutil       = require('gulp-util');
var fs          = require('fs');
var request     = require('request');
var path        = require('path');
var notify      = require('gulp-notify');
const osTmpdir  = require('os-tmpdir');

// Stylesheets
var sass        = require('gulp-sass');
var notify      = require("gulp-notify");
var plumber     = require('gulp-plumber');
var pleeease    = require('gulp-pleeease');
var rename      = require('gulp-rename');
var sourcemaps  = require('gulp-sourcemaps');

// Javascripts
var order       = require("gulp-order");
var concat      = require('gulp-concat');
var uglify      = require("gulp-uglify");
// Tools
var plumber     = require('gulp-plumber');
var spritesmith = require('gulp.spritesmith');


// Images
var imagemin = require('gulp-imagemin');

var PleeeaseOptions = {
    autoprefixer: true,
    pseudoElements: true,
    import: true,
    minifier: true,
    mqpacker: false,
    next: false,
    browsers: ["last 2 versions", "iOS 7"]
};

gulp.task('sass', function () {
    gulp.src( config.sass )
        .pipe(sourcemaps.init())
        .pipe(plumber({
            errorHandler: function (error) {
                gutil.log(gutil.colors.red('Error (' + error.plugin + '): ' + error.message));
                this.emit('end');
            }
        }))
        .pipe(sass({
            errorHandler: function (error) {
                gutil.log(gutil.colors.red('Error (' + error.plugin + '): ' + error.message));
                this.emit('end');
            }
        }))
        .pipe(pleeease(PleeeaseOptions))
        .pipe(rename({
            suffix: '.min',
            extname: '.css'
        }))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest( config.css ))
        .pipe(notify({ message: 'Styles task complete', onLast: true }))
        .pipe(browserSync.stream());
});

gulp.task('build-js', function() {
    return gulp.src([
        config.jsSrc,
    ])
        .pipe(plumber({
            errorHandler: function (error) {
                gutil.log(gutil.colors.red('Error (' + error.plugin + '): ' + error.message));
                this.emit('end');
            }
        }))
        .pipe(order([
            config.jsVendor,
            config.jsMain
          ]))
        .pipe(concat('app.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(config.js))
        .pipe(notify({ message: 'build-js task complete', onLast: true }));
});



gulp.task('sprite', function() {
    var spriteData =
        gulp.src(config.spriteSrc) // source path of the sprite images
            .pipe(spritesmith({
                imgName: 'sprite.png',
                cssName: '_sprite.scss',
                imgPath: '../img/sprite.png',
            }));

    spriteData.img.pipe(gulp.dest(config.spriteOut)); // output path for the sprite
    spriteData.css.pipe(gulp.dest(config.spriteSass)); // output path for the CSS
});

gulp.task('copyfonts', function() {
   gulp.src( config.fontsSrc )
   .pipe(gulp.dest( config.fontsDist ));
});

gulp.task('images', function() {
    gulp.src( config.imgSrc )
        .pipe(imagemin({quality: '70-90'}))
        .pipe(gulp.dest( config.imgDist ));
});


gulp.task('browser-sync', function() {
    var files = [
                    '**/*.php',
                    '**/*.{png,jpg,gif}'
                ];
    browserSync.init(files, {
        proxy: config.devUrl,
        injectChanges: true
    });
});


gulp.task('default', ['sass','build-js', 'sprite', 'copyfonts', 'images', 'browser-sync'], function () {
    gulp.watch( config.sass , ['sass']);
    gulp.watch( config.jsSrc , ['build-js', browserSync.reload]);
    gulp.watch( config.spriteSrc , ['sprite']);
});
