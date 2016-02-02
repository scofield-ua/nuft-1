var gulp = require('gulp');
var cssnano = require('gulp-cssnano');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var watch = require('gulp-watch');

gulp.task('default', function() {
    gulp.run(['process-css', 'process-scripts']);
    
    gulp.watch(['webroot/css/dev/**', 'webroot/css/plugins/**'], function(event) {
        gulp.run('process-css');
    })
});

gulp.task('process-css', function() {
    return gulp.src([            
            'webroot/node_modules/bootstrap/dist/css/bootstrap.min.css',
            'webroot/css/plugins/font-awesome/font-awesome.min.css',
            'webroot/css/dev/*.css',
        ])
        .pipe(cssnano())
        .pipe(concat('main.css'))
        .pipe(gulp.dest('webroot/css'));
});

gulp.task('process-scripts', function() {
    return gulp.src([
            'webroot/js/plugins/jquery/*.js',
            'webroot/node_modules/tether/dist/js/tether.min.js',
            'webroot/node_modules/bootstrap/dist/js/bootstrap.min.js',
            'webroot/node_modules/moment/min/moment-with-locales.min.js',
            'webroot/js/functions.js',
        ])
        .pipe(concat('main.js'))
        .pipe(uglify())
        .pipe(gulp.dest('webroot/js/'))
});
