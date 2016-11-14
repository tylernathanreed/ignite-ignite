<?php

namespace App\Support\Transformation;

use InvalidArgumentException;
use Illuminate\Support\Collection;

class MatrixAdapter
{
	/**
	 * The Name of this Adapter.
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * The Configuration for this Adapter.
	 *
	 * @var array
	 */
	protected $config;

	/**
	 * Creates a new Matrix Adapter.
	 *
	 * @param  string  $name
	 * @param  array   $config
	 *
	 * @return $this
	 */
	public function __construct($name, $config)
	{
		$this->name = $name;
		$this->config = $config;
	}

	/**
	 * Transforms the specified Instance.
	 *
	 * @param  mixed  $instance
	 * @param  array  $options
	 *
	 * @return  array
	 *
	 * @throws \InvalidArgumentException
	 */
	public function transform($instance, $options = [])
	{
		// Make sure the Instance is an Object or an Array
		if(!is_object($instance) && !is_array($instance))
			throw new InvalidArgumentException(sprintf('Cannot transform scalar type %s.', gettype($instance)));

		// Check for Array or Collection
		if(is_array($instance) || $instance instanceof Collection)
			return $this->transformCollection(new Collection($instance), $options);

		// Determine the Transformer for the Instance
		$transformer = $this->transformer(get_class($instance));

		// Transform the Instance
		return $transformer->transform($instance, $options);
	}

	/**
	 * Untransforms the specified Data into the specified Class.
	 *
	 * @param  string  $class
	 * @param  mixed   $data
	 * @param  array   $options
	 *
	 * @return array
	 */
	public function untransform($class, $data, $options = [])
	{
		// Check for Collection
		if($data instanceof Collection)
			return $this->untransformCollection($class, $data, $options);

		// Determine the Transformer for the Class
		$transformer = $this->transformer($class);

		// Untransform the Data
		return $transformer->untransform($data, $options);
	}

	/**
	 * Transforms the specified Collection.
	 *
	 * @param  \Illuminate\Support\Collection  $collection
	 *
	 * @return array
	 */
	protected function transformCollection(Collection $collection, $options = [])
	{
		// Initialize the Transformation
		$items = [];

		// Transform each Item
		foreach($collection as $item)
			$items[] = $this->transform($item, $options);

		// Return the Items
		return $items;
	}

	/**
	 * Untransforms the specified Collection.
	 *
	 * @param  \Illuminate\Support\Collection  $collection
	 *
	 * @return array
	 */
	protected function untransformCollection($class, Collection $collection, $options = [])
	{
		// Initialize the Transformation
		$items = [];

		// Transform each Item
		foreach($collection as $item)
			$items[] = $this->untransform($class, $item, $options);

		// Return the Items
		return $items;
	}

	/**
	 * Returns the Transformer for the specified Class.
	 *
	 * @param  string  $class
	 *
	 * @return \App\Support\Transformation\Transformer
	 */
	public function transformer($class)
	{
        if(!isset($this->transformers[$class]))
            $this->transformer[$class] = $this->createTransformer($class);

        return $this->transformer[$class];
    }

	/**
	 * Creates a new Transformer Instance for the specified Class.
	 *
	 * @param  string  $class
	 *
	 * @return \App\Support\Transformation\Transformer
	 */
    public function createTransformer($class)
    {
		// Make sure the Transformer is Configured
		if(!array_key_exists($class, $this->config))
			throw new InvalidArgumentException("Transformer [{$class}] is not configured with Matrix Adapter [{$this->name}].");

		// Determine the Transformer Class
		$transformer = $this->config[$class];

		// Make sure the Class Exists
		if(!class_exists($transformer))
			throw new InvalidArgumentException("Transformer [{$transformer}] does not exist.");

		// Create the Transformer
		return new $transformer($this);
	}

	/**
	 * Returns the Name of this Adapter.
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}
}