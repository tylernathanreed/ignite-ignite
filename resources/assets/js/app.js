/*
|--------------------------------------------------------------------------
| Register Dependencies
|--------------------------------------------------------------------------
|
| First we will load all of this project's JavaScript dependencies which
| include Vue and Vue Resource. This gives a great starting point for
| building robust, powerful web applications using Vue and Laravel.
|
*/

require('./bootstrap/vendor.js');

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate JS development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and handle
| asynchronous requests to make the broswer super responsive.
|
*/

const app = require('./bootstrap/app.js');

/*
|--------------------------------------------------------------------------
| Setup the Application
|--------------------------------------------------------------------------
|
| Once we have created the application, we'll have to perform certain
| tasks for the first time, and be ready to process any requests
| that come through AJAX. This involves processing the HTML.
|
*/

$(document).ready({
	app.bootstrap(document);
});