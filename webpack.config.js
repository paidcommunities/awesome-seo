const path = require('path');

const config = {
    devtool: 'source-map',
    entry: {
        adminApp: path.resolve(__dirname, './assets/js/admin-app.js')
    },
    output: {
        path: path.resolve(__dirname, 'build'),
        filename: 'admin-app.js'
    },
    module: {
        rules: [
            {
                test: /\.m?jsx?$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        cacheDirectory: true,
                        presets: [
                            [
                                '@babel/preset-env',
                                {
                                    modules: false,
                                    targets: {
                                        browsers: [
                                            'extends @wordpress/browserslist-config'
                                        ]
                                    }
                                }
                            ],
                            '@babel/preset-react'
                        ],
                        plugins: [
                            require.resolve('@babel/plugin-proposal-object-rest-spread'),
                            require.resolve('@babel/plugin-proposal-async-generator-functions'),
                            require.resolve('@babel/plugin-proposal-class-properties'),
                        ]
                    }
                }
            }
        ]
    },
    resolve: {
        extensions: ['.js', '.jsx']
    },
    externals: {
        'react': 'React',
        'react-dom': 'ReactDOM',
        '@wordpress/components': 'wp.components',
        'jquery': 'jQuery',
        '@paidcommunities-wp/components': 'paidcommunities.wp.components',
        '@paidcommunities-wp/api': 'paidcommunities.wp.api'
    }
};

module.exports = config;