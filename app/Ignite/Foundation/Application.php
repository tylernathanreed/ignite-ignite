<?php

namespace App\Ignite\Foundation;

use ArrayAccess;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\ProviderRepository;

class Application implements ArrayAccess
{
	//////////////////
	//* Attributes *//
	//////////////////
	/**
	 * The Laravel Application Instance.
	 *
	 * @var \Illuminate\Foundation\Application
	 */
	protected $app;

	///////////////////
	//* Constructor *//
	///////////////////
	/**
	 * Creates the Ignite Application Instance.
	 *
	 * @param  \Illuminate\Foundation\Application  $app  The Laravel Application Instance.
	 *
	 * @return $this
	 */
	public function __construct($app)
	{
		$this->app = $app;

        $this->registerConfiguredPackages();
	}

    //////////////////////////
    //* Package Management *//
    //////////////////////////
    /**
     * Register all of the configured Packages.
     *
     * @return void
     */
    public function registerConfiguredPackages()
    {
        $manifestPath = $this->getCachedServicesPath();

        (new ProviderRepository($this->app, new Filesystem, $manifestPath))
                    ->load($this->app->config['ignite.packages']);
    }

    /**
     * Get the path to the cached packages.php file.
     *
     * @return string
     */
    public function getCachedServicesPath()
    {
        return $this->app->bootstrapPath() . '/cache/ignite/packages.php';
    }

	//////////////////////
	//* Implementation *//
	//////////////////////
	/**
     * Determine if a given offset exists.
     *
     * @param  string  $key
     *
     * @return bool
     */
    public function offsetExists($key)
    {
        return $this->app->offsetExists($key);
    }

    /**
     * Get the value at a given offset.
     *
     * @param  string  $key
     *
     * @return mixed
     */
    public function offsetGet($key)
    {
        return $this->app->offsetGet($key);
    }

    /**
     * Set the value at a given offset.
     *
     * @param  string  $key
     * @param  mixed   $value
     *
     * @return void
     */
    public function offsetSet($key, $value)
    {
    	return $this->app->offsetSet($key, $value);
    }

    /**
     * Unset the value at a given offset.
     *
     * @param  string  $key
     *
     * @return void
     */
    public function offsetUnset($key)
    {
    	return $this->app->offsetUnset($key);
    }

    ///////////////////////
    //* Dynamic Methods *//
    ///////////////////////
    /**
     * Dynamically access the Laravel Application Instance.
     *
     * @param  string  $key
     *
     * @return mixed
     */
    public function __get($key)
    {
        return $this->app->$key;
    }

    /**
     * Dynamically mutate the Laravel Application Instance.
     *
     * @param  string  $key
     * @param  mixed   $value
     *
     * @return void
     */
    public function __set($key, $value)
    {
        $this->app->$key = $value;
    }
}