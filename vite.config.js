import { defineConfig } from 'vite';
import { resolve } from 'path'
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: true,
        hmr: {
            host: 'localhost'
        },
    },
    resolve: {
        alias: {
            '~fomantic': resolve(__dirname, 'node_modules/fomantic-ui-less'),
            '../../theme.config': resolve(__dirname, './resources/less/theme.config'),
            'theme.less': resolve(__dirname, './node_modules/fomantic-ui-less/theme.less'),
            '../../themes': resolve(__dirname, './node_modules/fomantic-ui-less/themes'),
            'fomantic': resolve(__dirname, 'node_modules/fomantic-ui/dist/semantic.min.js'),
            $: 'jquery',
        }
    },
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/less/app.less',
                'resources/scss/app.scss',
                'resources/js/semantic.js'
            ],
            refresh: true,
        }),
    ],
});
