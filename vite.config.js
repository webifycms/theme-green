import { defineConfig, splitVendorChunkPlugin } from 'vite'
import liveReload from 'vite-plugin-live-reload'
import path from 'node:path'

export default defineConfig({

  plugins: [
    liveReload([
      __dirname + '/templates/**/*.php'
    ]),
    splitVendorChunkPlugin(),
  ],

  // config
  root: 'assets',
  base: '/',

  build: {
    // output dir for production build
    outDir: '../dist',
    emptyOutDir: true,

    // emit manifest so PHP can find the hashed files
    manifest: true,

    // our entry
    rollupOptions: {
      input: path.resolve(__dirname, 'assets/js/main.js'),
    }
  },

  server: {
    strictPort: true,
    port: 5000,
    open: true,
    proxy: {
      '/': {
        target: 'http://webify.framework.docker:8080/',
        changeOrigin: true,
        secure: false
      }
    }
  }

})