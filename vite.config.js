import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
              'resources/sass/style.scss',
              'resources/js/app.js'
            ],
            refresh: [
              "app/View/Components/**",
              "lang/**",
              "resources/lang/**",
              "resources/views/**",
              "resources/sass/**",
              "routes/**",
            ],
        }),
    ],
});
