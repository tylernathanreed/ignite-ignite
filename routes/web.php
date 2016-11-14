<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Guest Routes
 */
Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function()
{
	/**
	 * Login and Logout Routes
	 */
	Route::get('login', array(
		'as' 	=> 'auth.login',
		'uses' 	=> 'LoginController@showLoginForm'
	));

	Route::post('login', array(
		'as' 	=> 'auth.login.submit',
		'uses' 	=> 'LoginController@login'
	));

	Route::post('logout', array(
		'as' 	=> 'auth.logout',
		'uses' 	=> 'LoginController@logout'
	));
});

/**
 * Authenticated Routes
 */
Route::group(['middleware' => 'auth'], function()
{
	Route::get('/', [
		'as' => 'pages.home',
		'uses' => 'PagesController@home'
	]);

	/**
	 * Model Routes
	 */
	Route::group(['namespace' => 'Models'], function()
	{
		/**
		 * Permission Routes
		 */
		Route::resource('permissions', 'PermissionsController', [
			'parameters' => 'singular'
		]);

		Route::get('permissions/{permission}/delete', [
			'as' => 'permissions.delete',
			'uses' => 'PermissionsController@delete'
		]);

		/**
		 * Role Routes
		 */
		Route::resource('roles', 'RolesController', [
			'parameters' => 'singular'
		]);

		Route::get('roles/{role}/delete', [
			'as' => 'roles.delete',
			'uses' => 'RolesController@delete'
		]);

		/**
		 * Budget Models
		 */
		Route::group(['namespace' => 'Budget'], function() {

			/**
			 * Transaction Categories
			 */
			Route::resource('transaction-categories', 'TransactionCategoriesController', [
				'except' => 'show'
			]);

			Route::get('transaction-categories/{transaction_category}/delete', [
				'as' => 'transaction-categories.delete',
				'uses' => 'TransactionCategoriesController@delete'
			]);

		});
	});

	/**
	 * Tools
	 */
	Route::group(['prefix' => 'tools', 'namespace' => 'Tools', 'as' => 'tools.'], function() {

		/**
		 * Budget Upload
		 */
		Route::group(['prefix' => 'budget-upload', 'as' => 'budget-upload.'], function() {

			Route::get('/', [
				'as' => 'index',
				'uses' => 'BudgetUploadController@showUploadForm'
			]);

			Route::post('/', [
				'as' => 'upload',
				'uses' => 'BudgetUploadController@upload'
			]);

			Route::get('confirm', [
				'as' => 'confirm',
				'uses' => 'BudgetUploadController@showConfirmationForm'
			]);

			Route::post('confirm', [
				'as' => 'save',
				'uses' => 'BudgetUploadController@save'
			]);
		});

	});

});

