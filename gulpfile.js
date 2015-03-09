var gulp = require('gulp');
var zip = require('gulp-zip');

gulp.task('zip', function () {
    return gulp.src(['edit_in_composer_button/**/*'], {base: "."})
        .pipe(zip('edit_in_composer_button.zip'))
        .pipe(gulp.dest('./build'));
});

gulp.task('default', ['zip']);
