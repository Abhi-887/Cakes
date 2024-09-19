import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/admin.js',
                'resources/js/frontend.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public/dist', // Set your production output directory
        assetsDir: 'assets',   // Directory for assets
        sourcemap: false,      // Disable source maps in production
        minify: 'terser',      // Minify using Terser
    }
});
