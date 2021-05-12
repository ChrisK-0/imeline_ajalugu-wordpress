const { watch } = require('fs');
const path = require('path');

module.exports = {
  mode: "development",
  entry: [
    '/assets/js/main.js',
    '/assets/sass/main.scss'
  ],
  
  output: {
    path: path.resolve(__dirname, 'assets/js/'), 
    filename: 'bundle.js'
  },

  module: {

    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        // 'babel-loader'
        use: [],
      }, {
        test: /\.scss$/,
        exclude: /node_modules/,
        use: [
          {
            loader: 'file-loader',
            options: { outputPath: '../../assets/css/', name: 'main.css'}
        },
          "sass-loader",
        ]
      },

      {
        test: /\.(png|jpe?g|gif)$/i,

            loader: 'file-loader',
            options: {
              name: '../src/imgs/[name].[ext]',
              emitFile: false,
            }
      }
    ]
  },
};