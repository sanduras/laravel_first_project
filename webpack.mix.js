const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
 mix.js('resources/js/lfm.js', 'public/js/lfm.js')
 mix.js('resources/js/ckeditor.js', 'public/js/ckeditor.js')
 mix.js('resources/js/create-article.js', 'public/js/create-article.js')


mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]);
//user js
mix.copy('public/template/js/revolution-slider/js/jquery.themepunch.tools.min.js', 'public/js/revolution-slider/js/jquery.themepunch.tools.min.js')
mix.copy('public/template/js/revolution-slider/js/jquery.themepunch.revolution.min.js', 'public/js/revolution-slider/js/jquery.themepunch.revolution.min.js')
mix.copy('public/template/js/bootstrap/bootstrap.min.js', 'public/js/bootstrap/bootstrap.min.js')
mix.copy('public/template/js/less/less.min.js', 'public/js/less/less.min.js')
mix.copy('public/template/js/megamenu/js/main.js', 'public/js/megamenu/js/main.js')
mix.copy('public/template/js/ytplayer/*.js', 'public/js/ytplayer.js')
mix.copy('public/template/js/revolution-slider/*.js', 'public/js/revolution-slider.js')
mix.copy('public/template/js/revolution-slider/js/extensions/*.js', 'public/js/revolution-slider/js/extensions.js')
mix.copy('public/template/js/parallax/*.js', 'public/js/parallax.js')
mix.copy('public/template//js/cubeportfolio/jquery.cubeportfolio.min.js', 'public/js/cubeportfolio/jquery.cubeportfolio.min.js')
mix.copy('public/template/js/cubeportfolio/cols-5.js', 'public/js/cubeportfolio/cols-5.js')
mix.copy('public/template/js/owl-carousel/*.js', 'public/js/owl-carousel.js')
mix.copy('public/template/js/accordion/js/*.js', 'public/js/accordion/js.js')
mix.copy('public/template/js/progress-circle/*.js', 'public/js/progress-circle.js')
mix.copy('public/template/js/functions/functions.js', 'public/js/functions/functions.js')
mix.copy('public/template/js/loaders/loading-custom.js', 'public/js/loaders/loading-custom.js')
mix.copy('public/template/js/tabs/js/responsive-tabs.min.js', 'public/js/tabs/js/responsive-tabs.min.js')


//user css
mix.copy('public/css/bootstrap/userSettings.css', 'public/css/bootstraps/userSettings.css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
mix.copy('public/template/js/bootstrap/bootstrap.min.css', 'public/css/bootstraps/bootstrap.min.css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
mix.copy('public/template/js/megamenu/stylesheets/screen.css', 'public/css/megamenu/stylesheets/screen.css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
mix.copy('public/template/css/theme-default.css', 'public/css/theme-default.css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
mix.copy('public/template/js/loaders/stylesheets/screen.css', 'public/css/loaders/stylesheets/screen.css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
mix.copy('public/template/css/corporate.css', 'public/css/corporate.css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
mix.copy('public/template/fonts/font-awesome/css/font-awesome.min.css', 'public/css/fonts/font-awesome/css/font-awesome.min.css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
mix.copy('public/template/fonts/Simple-Line-Icons-Webfont/simple-line-icons.css', 'public/css/fonts/Simple-Line-Icons-Webfont/simple-line-icons.css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
mix.copy('public/template/fonts/et-line-font/et-line-font.css', 'public/css/fonts/et-line-font/et-line-font.css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
mix.copy('public/template/js/revolution-slider/css/settings.css', 'public/css/revolution-slider/css/settings.css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
mix.copy('public/template/js/revolution-slider/css/layers.css', 'public/css/revolution-slider/css/layers.css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
mix.copy('public/template/js/revolution-slider/css/navigation.css', 'public/css/revolution-slider/css/navigation.css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
mix.copy('public/template/js/parallax/main.css', 'public/css/parallax/main.css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
mix.copy('public/template/js/owl-carousel/owl.carousel.css', 'public/css/owl-carousel/owl.carousel.css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
mix.copy('public/template/js/owl-carousel/owl.theme.css', 'public/css/owl-carousel/owl.theme.css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
mix.copy('public/template/js/cubeportfolio/cubeportfolio.min.css', 'public/css/cubeportfolio/cubeportfolio.min.css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
mix.copy('public/template/js/tabs/css/responsive-tabs.css', 'public/css/tabs/css/responsive-tabs.css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
//mix admin

mix.copy('adminstyles/jquery/jquery.min.js', 'public/js/jquery/jquery.min.js')
mix.copy('adminstyles/bootstrap/js/bootstrap.bundle.min.js', 'public/js/bootstrap/js/bootstrap.bundle.min.js')
mix.copy('adminstyles/jquery-easing/jquery.easing.min.js', 'public/js/jquery-easing/jquery.easing.min.js')
mix.copy('adminstyles/datatables/jquery.dataTables.js', 'public/js/datatables/jquery.dataTables.js')
mix.copy('adminstyles/chart.js/Chart.min.js', 'public/js/chart.js/Chart.min.js')
mix.copy('adminstyles/datatables/dataTables.bootstrap4.js', 'public/js/datatables/dataTables.bootstrap4.js')
mix.copy('resources/js/sb-admin.min.js', 'public/js/sb-admin.min.js')
mix.copy('resources/js/demo/datatables-demo.js', 'public/js/demo/datatables-demo.js')
mix.copy('resources/js/demo/chart-area-demo.js', 'public/js/demo/chart-area-demo.js')




    mix.postCss('adminstyles/bootstrap/css/bootstrap.min.css', 'public/css/bootstrap.min.css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ]);

    
    mix.postCss('adminstyles/fontawesome-free/css/all.min.css', 'public/css/all.min.css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ]);

    mix.postCss('adminstyles/datatables/dataTables.bootstrap4.css', 'public/css/dataTables.bootstrap4.css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ]);
    mix.postCss('adminstyles/bootstrap/css/admincss.css', 'public/css/admincss.css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ]);
    mix.postCss('resources/css/sb-admin.min.css', 'public/css/sb-admin.min.css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ]);

if (mix.inProduction()) {
    mix.version();
}
