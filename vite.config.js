import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/unidades.css',
                'resources/sass/styles.css'
            ],
            refresh: true,
        }),
    ],
});
