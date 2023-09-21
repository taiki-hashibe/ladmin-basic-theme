import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from "path";

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/ts/ladmin.ts'],
        }),
    ],
	build: {
        outDir: path.resolve( __dirname, './resources/dist' ),
		manifest: true,
		target: 'es2018',
		rollupOptions: {
			output: {
				entryFileNames: `[name].js`,
				chunkFileNames: `[name].js`,
				assetFileNames: ( { name } ) => {
					if ( /\.( gif|jpeg|jpg|png|svg|webp| )$/.test( name ?? '' ) ) {
						return '[name].[ext]';
					}
					if ( /\.css$/.test( name ?? '' ) ) {
						return '[name].[ext]';
					}
					if ( /\.js$/.test( name ?? '' ) ) {
						return '[name].[ext]';
					}
					return '[name].[ext]';
				}
			},
		},

	},
});
