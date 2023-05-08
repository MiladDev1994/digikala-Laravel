import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/bootstrap.min.css',
                'resources/css/bootstrap.rtl.min.css',
                'resources/css/app.css',
                'resources/css/home.css',
                'resources/css/products.css',
                'resources/css/login.css',
                'resources/css/article.css',
                'resources/css/font.css',
                'resources/css/view.css',
                'resources/css/basket.css',
                'resources/css/user_panel.css',
                'resources/css/admin/admin_app.css',

                'resources/js/app.js',
                'resources/js/view.js',
                'resources/js/home.js',
                'resources/js/products.js',
                'resources/js/article.js',
                'resources/js/basket.js',
                'resources/js/user_panel.js',
                'resources/js/user_favorite.js',
                'resources/js/admin/admin_app.js',
                'resources/js/admin/admin_home_slider.js',
                'resources/js/admin/admin_home_article.js',
                'resources/js/admin/products/create.js',


            ],
            refresh: true,
        }),
    ],
});
