<?php

namespace App\Support\Traits;

use Illuminate\Support\Collection;

/*
|--------------------------------------------------------------------------
| Resolvable Trait
|--------------------------------------------------------------------------
|
| The Resolveable Trait is intended to be applied to an Eloquent Model.
| If a Model is 'Resolveable', then it is implied that the Model can
| be found by an Integer Primary Key, and possibly a String Unique
| Key. Either way, using the Model::resolve($key) Query Scope
| will become available when utilizing this Trait.
|
*/
trait Resolveable
{
	/**
	 * Resolves the specified Key to a Single Resource.
	 *
	 * @param  Builder  $query  The Original Query.
	 * @param  mixed 	$key 	A Unique Identifer for this Model.
	 *
	 * @return mixed
	 */
	public function scopeResolve($query, $key, $fail = true)
	{
		// Check for Array or Collection
		if(is_array($key) || $key instanceof Collection)
			return $query->resolveMany($key);

		// Determine the Query Resolver
		$resolve = $fail ? 'firstOrFail' : 'first';

		// Resolve by Integer ID
		if(is_int($key))
			return $query->where($this->primaryKey, $key)->$resolve();

		// Resolve by Unique String Column
		if(is_string($key))
			return $query->where($this->getUniquekey(), $key)->$resolve();

		// Key is already Resolved
		return $key;
	}

	/**
	 * Resolves the specified Keys to a Collection of Resources Resource.
	 *
	 * @param  Builder  $query  The Original Query.
	 * @param  array 	$keys 	Unique Identifers for this Model.
	 *
	 * @return Collection
	 */
	public function scopeResolveMany($query, $keys)
	{
		// Normalize the Keys into a Collection
		$collection = collect($keys);

		// Use the First Key as a Type Identifier
		$type = $keys[0];

		// Resolve by Integer ID
		if(is_int($type))
			return $query->whereIn($this->primaryKey, $collection->all())->get();

		// Resolve by Unique String Column
		if(is_string($type))
			return $query->whereIn($this->getUniquekey(), $collection->all())->get();

		// Collection is already Resolved
		return $keys;
	}

	/**
	 * Returns the Unique Key for this Model.
	 *
	 * @return string|null
	 */
	public function getUniqueKey()
	{
		return property_exists($this, 'unique') ? $this->unique : null;
	}
}