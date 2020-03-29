const mix = require('laravel-mix');


mix.browserSync({ // ファイル監視設定
            proxy: '0.0.0.0:10080', // アプリの起動アドレス
            open: false // ブラウザを自動で開かない
        })
        .js('resources/js/app.js', 'public/js').version()
        .js('resources/js/base.js', 'public/js').version()
        .sass('resources/sass/base.scss', 'public/css/base.css').version()
        .autoload({
            jquery: ['$', 'window.jQuery']
        });