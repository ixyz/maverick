var path = require('path');
var ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = [{
        entry: ['./resources/app.js'],
        output: {
            path: path.resolve(__dirname, 'assets'),
            filename: 'app.js'
        },
        resolve: {
            extensions: ['.', '.js', '.ts']
        },
        module: {
            rules: [{
                test: /\.ts$/,
                use: 'ts-loader'
            }]
        }
    },
    {
        entry: ['./resources/style.js'],
        output: {
            path: path.resolve(__dirname, 'assets'),
            filename: 'style.css'
        },
        module: {
            rules: [{
                    test: /\.(css|sass|scss)$/,
                    use: ExtractTextPlugin.extract({
                        fallback: "style-loader",
                        use: [
                            'css-loader',
                            'sass-loader',
                            {
                                loader: 'postcss-loader',
                                options: {
                                    plugins: function () {
                                        return [
                                            require('autoprefixer')
                                        ];
                                    }
                                }
                            }
                        ]
                    })
                },
                {
                    test: /\.(jpe?g|png|gif|svg|ico)(\?.+)?$/,
                    include: [
                        path.resolve(__dirname, 'resources')
                    ],
                    use: {
                        loader: 'url-loader',
                        options: {
                            limit: 16384,
                            name: '[name].[ext]',
                            outputPath: './img/',
                            publicPath: './img/'
                        }
                    }
                },
                {
                    test: /\.(eot|otf|ttf|woff2?|svg)(\?.+)?$/,
                    include: [
                        path.resolve(__dirname, 'node_modules')
                    ],
                    use: {
                        loader: 'file-loader',
                        options: {
                            name: '[name].[ext]',
                            outputPath: './fonts/',
                            publicPath: './fonts/'
                        }
                    }
                }
            ]
        },
        plugins: [
            new ExtractTextPlugin('style.css')
        ]
    }
];
