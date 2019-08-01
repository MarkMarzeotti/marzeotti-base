const webpack = require("webpack");
const postcss = require("postcss");
const BrowserSync = require('browser-sync-webpack-plugin');
const ExtractTextPlugin = require("extract-text-webpack-plugin");

const style = new ExtractTextPlugin({
	filename: "dist/css/style.css",
	disable: process.env.NODE_ENV === "development"
});
const admin = new ExtractTextPlugin({
	filename: "dist/css/admin.css",
	disable: process.env.NODE_ENV === "development"
});

module.exports = {
	entry: './assets/js/App.js',
	output: {
		path: __dirname,
		filename: 'dist/js/bundle.js',
	},
	plugins: [
		style,
		admin,
		new BrowserSync({
			host: 'localhost',
			port: 3000,
			proxy: 'http://localhost',
		})
	],
	devtool: 'source-map',
	module: {
		rules: [
			{
				test: /\.js$/,
				exclude: /(node_modules)/,
				loader: ['babel-loader?presets=env'],
			},
			{
				test: /\.json$/,
				exclude: /(node_modules)/,
				loader: "json-loader"
			},
			{
				test: /style\.(scss|css)$/,
				use: style.extract({
					fallback: 'style-loader',
					use: [
						{
							loader: 'css-loader',
						},
						{
							loader: 'postcss-loader',
							options: {
								ident: 'postcss',
								plugins: [
									require('autoprefixer')(),
									require('cssnano')()
								]
							}
						},
						{ 
							loader: 'sass-loader'
						}
					]
				})
			},
			{
				test: /admin\.(scss|css)$/,
				use: admin.extract({
					fallback: 'style-loader',
					use: [
						{
							loader: 'css-loader',
						},
						{
							loader: 'postcss-loader',
							options: {
								ident: 'postcss',
								plugins: [
									require('autoprefixer')(),
									require('cssnano')()
								]
							}
						},
						{ 
							loader: 'sass-loader'
						}
					]
				})
			},
		]
	}
}