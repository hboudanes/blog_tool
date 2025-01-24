import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/chart.js/Chart.min.js','resources/css/sb-admin-2.min.css', 'resources/fontawesome-free/css/all.min.css', 'resources/js/jquery-3.6.0.min.js', 'resources/jquery-easing/jquery.easing.min.js', 'resources/js/sb-admin-2.min.js','resources/js/demo/chart-area-demo.js','resources/js/demo/chart-pie-demo.js'],
            refresh: true,
        }),
    ],
});
