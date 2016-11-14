<?php

namespace App\Support\Transformation;

class MatrixManager
{
    /**
     * The Application Instance.
     *
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * The array of created Matrix Adapters.
     *
     * @var array
     */
	protected $adapters = [];

    /**
     * Create a new manager instance.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * Returns the specified Matrix Adapter.
     *
     * @param  string  $adapter
     *
     * @return \App\Support\Transformation\MatrixAdapter
     */
    public function adapter($adapter)
    {
        // If the given adapter has not been created before, we will create the instances
        // here and cache it so we can return it next time very quickly. If there is
        // already a adapter created by this name, we'll just return that instance.
        if(!isset($this->adapters[$adapter]))
            $this->adapters[$adapter] = $this->createAdapter($adapter);

        return $this->adapters[$adapter];
    }

    /**
     * Alias for {@see $this->adapter()}.
     *
     * @return \App\Support\Transformation\MatrixAdapter
     */
    public function matrix($adapter)
    {
        return $this->adapter($adapter);
    }

    /**
     * Create a new Matrix Adapter Instance.
     *
     * @param  string  $adapter
     *
     * @return \App\Support\Transformation\MatrixAdapter
     *
     * @throws \InvalidArgumentException
     */
    protected function createAdapter($adapter)
    {
    	// Determine the Configuration for the Adapter
    	$config = $this->getConfig($adapter);

    	// Make sure the Matrix is Configured
    	if(is_null($config))
    		throw new InvalidArgumentException("Matrix Adapter [{$adapter}] is not configured.");

    	// Create a new Matrix Adapter
    	return new MatrixAdapter($adapter, $config);
    }

    /**
     * Returns the Configuration for the specified Adapter.
     *
     * @param  string  $adapter
     *
     * @return array|null
     */
    protected function getConfig($adapter)
    {
    	return $this->app['config']["transformation.matricies.{$adapter}"];
    }
}