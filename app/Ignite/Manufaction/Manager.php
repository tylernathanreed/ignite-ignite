<?php

namespace App\Ignite\Manufaction;

use InvalidArgumentException;

class Manager
{
	//////////////////
	//* Attributes *//
	//////////////////
    /**
     * The Application Instance.
     *
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * The Array of created Model Factories.
     *
     * @var array
     */
    protected $models = [];

    ///////////////////
    //* Constructor *//
    ///////////////////
    /**
     * Creates a Manager Instance.
     *
     * @param  \Illuminate\Foundation\Application  $app  The Application Instance.
     *
     * @return $this
     */
    public function __construct($app)
    {
    	$this->app = $app;
    }

    //////////////////
    //* Management *//
    //////////////////
    /**
     * Attempt to get the Model Factory from the Local Cache.
     *
     * @param  string  $name  The Name of the Model Factory.
     *
     * @return mixed
     */
    public function model($name)
    {
        // Return the Model Factory from the Local Cache, or build a new one
        return isset($this->models[$name])
                   ? $this->models[$name]
                   : $this->models[$name] = $this->resolve($name);
    }

    /**
     * Resolve the specified Model Factory.
     *
     * @param  string  $name  The Name of the specified Model Factory.
     *
     * @return mixed
     *
     * @throws \InvalidArgumentException
     */
    protected function resolve($name)
    {
    	// Determine the List of Factories
    	$factories = $this->app['config']['manufaction.factories'];

    	// Make sure the Model Factory is Defined
    	if(!array_key_exists($name, $factories))
    		throw new InvalidArgumentException("Model Factory [{$name}] is not defined.");

    	// Create the Model Factory
    	return $this->models[$name] = $this->app->make($factories[$name]);
    }

    ///////////////////////
    //* Dynamic Methods *//
    ///////////////////////
    /**
     * Dynamically retrieve the Model Factory.
     *
     * @param  string  $method      The Method being Called.
     * @param  array   $parameters  The Parameters being sent to the Call.
     *
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->model($method);
    }
}