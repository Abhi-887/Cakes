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
    server: {
        host: 'localhost', // Use localhost instead of IPv6 address
        port: 5173, // Ensure the port is set correctly
        cors: true, // Enable CORS
    },
});
