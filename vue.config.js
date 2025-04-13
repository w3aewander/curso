const { defineConfig } = require('@vue/cli-service')
const { WebpackManifestPlugin } = require('webpack-manifest-plugin')
const path = require('path')

module.exports = defineConfig({
  transpileDependencies: true,
  outputDir: path.resolve(__dirname, 'public'),
  publicPath: '/',
  pages: {
    index: {
      entry: 'application/src/main.js',
      template: 'application/public/index.html',
      filename: 'index.html',
    }
  },
  configureWebpack: {
    resolve: {
      alias: {
        '@': path.resolve(__dirname, 'application/src')
      }
    },
    plugins: [
      new WebpackManifestPlugin({
        fileName: 'js/manifest.json'
      })
    ]
  }
})
