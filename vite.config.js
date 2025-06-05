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
                'resources/css/cirrus.css',
                'resources/css/fonts/fonts.css',
                'resources/css/overrides.css',
                'resources/js/main.js',
                'resources/js/highlight.js',
            ],
            refresh: true,
        }),

        // PurgeCSS
        purge({
            paths: [
                'resources/views/**',
            ],
            output: 'resources/css/cirrus.css',
            // This fixes escaped prefixes (sm:, lg:, ...)
            extractors: [
                {
                    extractor: (content) => {
                        return content.match(/[A-z0-9-:\/]+/g) || []
                    },
                    extensions: ['php', 'html']
                }
            ],
            fontFace: true,
            keyframes: true,
            safelist: {
                // standard: exact class names
                standard: [
                    'active',        // Header
                    'text-blue-300', // Promo link
                    /^shj-/          // Speed-highlight
                ],
            },
        }),
    ],
});
