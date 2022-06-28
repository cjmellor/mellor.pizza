import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.css',
            'resources/js/app.js'
        ]),

        // hot reload .blade.php files
        {
            name: 'blade',
            handleHotUpdate ({ file, server }) {
                if (file.endsWith('.blade.php')) {
                    server.ws.send({
                        type: 'full-reload',
                        path: '*'
                    });
                }
            }
        }
    ],
    server: {
        https: true,
        host: 'localhost'
    }
});
