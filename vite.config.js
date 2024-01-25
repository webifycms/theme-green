const path = require('path')

export default {
  build: {
    manifest: true,
    rollupOptions: {
      input: '/assets/js/site.js',
    },
  },
  server: {
    port: 3005,
    proxy: {
      '/*': {
        target: 'http://webify.framework.docker',
        changeOrigin: true
      }
    },
  }
}