// webpack.mix.js

let mix = require('laravel-mix');

// mix.js('src/app.js', 'dist').setPublicPath('dist');
// mix.styles(['resources/css/mdb.rtl.min.css','resources/css/animate.min.css','resources/css/all.min.css','resources/css/swiper-bundle.min.css','resources/css/style.css'],'public/assets/css/style.min.css');
// mix.styles(['resources/css/mdb.rtl.min.css','resources/css/swiper-bundle.min.css','resources/css/style.css'],'public/assets/css/vendor.min.css');
// mix.styles(['resources/css/mdb.rtl.min.css','resources/css/style.css'],'public/assets/css/pages.min.css');

// mix.styles(['resources/css/bootstrap.rtl.min.css','resources/css/all.min.css'],'public/panel/assets/css/style.min.css');
// mix.styles(['resources/css/bootstrap.rtl.min.css','resources/css/all.min.css','resources/css/style.css','resources/css/side-nav.css'],'public/panel/assets/css/style.min.css');
mix.styles(['resources/mainMgn/css/bootstrap.rtl.min.css','resources/mainMgn/css/all.min.css','resources/mainMgn/css/summernote.min.css','resources/mainMgn/css/select2.min.css','resources/mainMgn/css/dropzone.min.css','resources/mainMgn/css/datatables.min.css','resources/mainMgn/css/sweetalert2.min.css','resources/mainMgn/css/style.css','resources/mainMgn/css/leftSide.css'],'public/mainMgn/assets/css/style.min.css');
