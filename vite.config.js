import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import purge from '@erbelion/vite-plugin-laravel-purgecss'

export default defineConfig({
    build: {
        // Disable polyfill
        modulePreload: {
            polyfill: false,
        },

        // Rollup options
        rollupOptions: {
            // Tree-shaking
            treeshake: {
                preset: "smallest",
                propertyReadSideEffects: false,
            }
        }
    },
    // Disable comments in JS
    esbuild: { legalComments: 'none' },

    // Plugins
    plugins: [
        // Laravel
        laravel({
            input: [
                'resources/css/cirrus.min.css',
                'resources/css/fonts/fonts.css',
                'resources/css/overrides.css',
                'resources/js/main.js',
            ],
            refresh: true,
        }),

        // PurgeCSS
        purge({
            paths: [
                'resources/views/**',
            ],
            output: 'resources/css/cirrus.min.css',
            fontFace: true,
            keyframes: true,
            safelist: ["active"],
        }),
    ],
});
