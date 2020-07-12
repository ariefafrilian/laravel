const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');


//Master
mix.styles([
	'vendor/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css',
	'vendor/almasaeed2010/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css',
	'vendor/almasaeed2010/adminlte/plugins/pace-progress/themes/black/pace-theme-flat-top.css',
	'vendor/almasaeed2010/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
	'vendor/almasaeed2010/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css',
	'vendor/almasaeed2010/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css',
	'vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css',
	], 'public/css/master.css').version();

mix.scripts([
	'vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js',
	'vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js',
	'vendor/almasaeed2010/adminlte/plugins/chart.js/Chart.min.js',
	'vendor/almasaeed2010/adminlte/plugins/sweetalert2/sweetalert2.min.js',
	'vendor/almasaeed2010/adminlte/plugins/pace-progress/pace.min.js',
	'vendor/almasaeed2010/adminlte/plugins/datatables/jquery.dataTables.min.js',
	'vendor/almasaeed2010/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
	'vendor/almasaeed2010/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js',
	'vendor/almasaeed2010/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js',
	'vendor/almasaeed2010/adminlte/plugins/sweetalert2/sweetalert2.min.js',
	'vendor/almasaeed2010/adminlte/dist/js/adminlte.min.js',
	], 'public/js/master.js').version();

//Auth
mix.styles([
	'vendor/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css',
	'vendor/almasaeed2010/adminlte/plugins/pace-progress/themes/black/pace-theme-flat-top.css',
	'vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css',
	], 'public/css/auth.css').version();

mix.scripts([
	'vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js',
	'vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js',
	'vendor/almasaeed2010/adminlte/plugins/pace-progress/pace.min.js',
	'vendor/almasaeed2010/adminlte/dist/js/adminlte.min.js',
	], 'public/js/auth.js').version();
