const gulp = require('gulp');
const browserSync = require('browser-sync');
const sass = require('gulp-sass');
const prefix = require('gulp-autoprefixer');
const clean = require('gulp-clean-css');
const jshint = require('gulp-jshint');
const uglify = require('gulp-uglify');
const babel = require('gulp-babel');
const concat = require('gulp-concat');
const rename = require('gulp-rename');
const reload = browserSync.reload;

gulp.task('browser-sync', ['sass', 'js'], () => {
  browserSync.init({
    proxy: "localhost:8000/ss-beevy/public",
    port: 3000,
    browser: 'chrome',
    logPrefix: "Beevy"
  });
});

gulp.task('sass', () => {
  return gulp
    .src('assets/sass/main.sass')
    .pipe(sass({
            onError: browserSync.notify
          })
          .on('error', browserSync.notify)
        )
    .pipe(prefix(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true }))
    .pipe(clean({keepSpecialComments: 0}))
    .pipe(rename({suffix: '.min', basename: 'style', extname: '.css'}))
    .pipe(gulp.dest('public'))
    .pipe(reload({stream:true}));
});

gulp.task('js', () => {
  return gulp
    .src('assets/js/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter('jshint-stylish'))
    .pipe(babel({presets: ['@babel/env']}))
    .pipe(concat('script.js'))
    .pipe(uglify())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('public/js'))
    .pipe(reload({stream:true}))
});

gulp.task('watch', () => {
  gulp.watch('assets/js/*.js', ['js']);
  gulp.watch(['assets/sass/main.sass', 'assets/sass/**/*.sass'], ['sass']);
});

gulp.task('default', ['browser-sync', 'watch']);
