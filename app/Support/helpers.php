<?php

if(!function_exists('flash'))
{
	/**
	 * Returns an HTML Class when the specified Field has an Error.
	 *
	 * @param  string|null  $type     The Type of Message to Flash.
	 * @param  string|null  $message  The Message to Flash.
	 *
	 * @return \Reed\Flash\Flash|null
	 */
	function flash($type = null, $message = null)
	{
		// Determine the Flash Instance
		$flash = app()->make('flash');

		// Check for Message Flash
		if($message != null)
			return $flash->$type($message);

		// Check for Type as Message
		if($type != null)
			return $flash->success($type);

		// Return the Flash Instance
		return $flash;
	}
}

if(!function_exists('has_error'))
{
	/**
	 * Returns an HTML Class when the specified Field has an Error.
	 *
	 * @param  string  $field  The Name of the Field
	 *
	 * @return string
	 */
	function has_error($field)
	{
		// Determine the Session
		$session = app('session');

		if($session->has('errors') && $session->get('errors')->has($field))
			return ' has-error';

		return '';
	}
}

if(!function_exists('method'))
{
	/**
	 * Returns the Method associated with the given Route.
	 *
	 * @param  string  $name  The Name of the Route
	 *
	 * @return string
	 */
	function method($name)
	{
		// Determine the Route by Name
		$route = Route::getRoutes()->getByName($name);

		// Determine the Methods of the Route
		$methods = $route->getMethods();

		// Return the First Entry
		return count($methods) ? $methods[0] : null;
	}
}

if(!function_exists('spinal_case'))
{
	/**
	 * Returns the spinal-case representation of the specified String.
	 *
	 * @param  string  $string  The specified String.
	 *
	 * @return string
	 */
	function spinal_case($string)
	{
		return str_replace(['_', '.'], '-', snake_case($string));
	}
}