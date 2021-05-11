const { watch } = require('fs');
const path = require('path');

module.exports = {
  mode: "development",
  entry: [
    __dirname + '/src/js/main.js',
    __dirname + '/src/sass/main.scss'
  ],
  output: {
    path: path.resolve(__dirname, 'public'), 
    filename: 'bundle.js' 
    
  },

  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: [],
      }, {
        test: /\.(scss)$/,
        exclude: /node_modules/,
        use: [
          {
            loader: 'file-loader',
            options: {
              outputPath: '',
              name: '[name].css'
            }
          },
            'sass-loader',
  
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

  resolve: {
    preferAbsolute: true,
  },



};

node: {
  fs: "empty"

};