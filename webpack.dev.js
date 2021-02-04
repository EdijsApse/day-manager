
const path = require('path');

module.exports = {
    entry: './resources/js/index.js',
    mode: 'development',
    output: {
        filename: 'app.js',
        path: path.resolve(__dirname, './public/js')
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: ['/node_modules', '/public'],
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: [ '@babel/env' ]
                    }
                }
            }
        ]
    }
}