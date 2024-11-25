import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import purge from '@erbelion/vite-plugin-laravel-purgecss'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/cirrus.min.css',
                'resources/css/fonts/fonts.css',
                'resources/js/main.js',
            ],
            refresh: true,
        }),
        purge({
            paths: [
                'resources/views/**/*.php',
            ],
            output: 'resources/css/cirrus.min.css',
            fontFace: true,
            keyframes: true,
            safelist: ["active", "m-1", "p-0", "text-blue-500"],
        }),
    ],
    esbuild: { legalComments: 'none' },
});
