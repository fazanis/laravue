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
/* mix.scripts([
   // 'resources/admin/bower_components/jquery/dist/jquery.min.js',
   // 'resources/admin/bower_components/bootstrap/dist/js/bootstrap.min.js',
   'resources/admin/bower_components/datatables.net/js/jquery.dataTables.min.js',
   'resources/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js',
   'resources/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
   'resources/admin/bower_components/fastclick/lib/fastclick.js',
   'resources/admin/dist/js/adminlte.min.js',
   'resources/admin/dist/js/demo.js',
   'resources/admin/my.js',
],'public/js/admin.js');
*/
mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
