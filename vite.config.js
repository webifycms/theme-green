import { defineConfig } from 'vite'
import liveReload from 'vite-plugin-live-reload'

export default defineConfig({
  plugins: [
    liveReload([
      './**/*.php'
    ])
  ],
  root: './',
  build: {
    outDir: 'dist',
    assetsDir: '',
    emptyOutDir: true,
    manifest: 'manifest.json',
    rollupOptions: {
      input: {
        green: './assets/js/main.js'
      }
    }
  },
  server: {
    cors: true,
    strictPort: true,
    port: 5000,
    host: '0.0.0.0',
    watch: {
      usePolling: true
    }
  }
})