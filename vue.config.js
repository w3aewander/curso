const { defineConfig } = require('@vue/cli-service')
const path = require('path')
const CopyPlugin = require('copy-webpack-plugin')

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
    // plugins: [
    //   new CopyPlugin({
    //     patterns: [
    //       {
    //         from: path.resolve(__dirname, 'public/*'),
    //         to: path.resolve(__dirname, 'public')
    //       }
    //     ]})
    //   ]
  },
})
