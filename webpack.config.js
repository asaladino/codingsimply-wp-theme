var path = require('path');
var webpack = require('webpack');

module.exports = {
    devtool: 'source-map',
    entry: [
        './js/src/start-search/app.js',
        './js/src/discovery/App.js'
    ],
    output: {
        path: path.join(__dirname, 'webroot/js/dist'),
        publicPath: '/js/dist/',
        filename: 'bundle.js'
    },
    resolve: {
        alias: {
            'vue$': 'vue/dist/vue.esm.js'
        }
    },
    plugins: [
        // new webpack.optimize.UglifyJsPlugin({
        //     comments: false,
        //     mangle: false,
        //     compress: {
        //         warnings: true
        //     }
        // })
    ],
    externals: {
        'jquery': 'jQuery',
        'foundation-sites': 'Foundation',
        // 'vue': 'Vue'
    },
    module: {
        loaders: [
            {
                test: /\.js$/,
                loaders: ['babel-loader'],
                exclude: '/node_modules/'
            }
        ]
    }
};