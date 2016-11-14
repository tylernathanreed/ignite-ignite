<?php

namespace App\Support\Transformation;

use BadMethodCallException;

abstract class Transformer
{
	/**
	 * The Adapter that created this Transformer.
	 *
	 * @var \App\Support\Transformation\MatrixAdapter
	 */
	protected $adapter;

	/**
	 * Creates a new Transformer.
	 *
	 * @param  \App\Support\Transformation\MatrixAdapter  $adapter
	 *
	 * @return  $this
	 */
	public function __construct($adapter)
	{
		$this->adapter = $adapter;
	}

	/**
	 * Transforms the specified Instance into an Array.
	 *
	 * @param  mixed  $instance
	 *
	 * @return array
	 *
	 * @throws \BadMethodCallException
	 */
	public function transform($instance)
	{
		throw new BadMethodCallException(sprintf('Transformer [%s] does not support Transforming.', static::class));
	}

	/**
	 * Untransfroms the specified Data into an Object.
	 *
	 * @param  array  $data
	 *
	 * @return mixed
	 *
	 * @throws \BadMethodCallException
	 */
	public function untransform($data)
	{
		throw new BadMethodCallException(sprintf('Transformer [%s] does not support Untransforming.', static::class));
	}
}