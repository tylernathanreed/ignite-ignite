<?php

namespace App\Ignite\Filesystem;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

class CSV extends FileManager
{
	/**
	 * The Rows contained within the CSV.
	 *
	 * @var array
	 */
	protected $rows = [];

	/**
	 * Creates a new Instance of this Class.
	 *
	 * @param  array        $rows
	 * @param  string|null  $disk
	 *
	 * @return $this
	 */
	public function __construct($rows = [], $disk = null)
	{
		parent::__construct($disk);

		$this->rows = $rows;
	}

	/**
	 * Creates a new CSV from a CSV String.
	 *
	 * @param  string       $string
	 * @param  string|null  $disk
	 *
	 * @return static
	 */
	public static function fromString($string, $disk = null)
	{
		// Split the String into Lines
		$lines = explode("\r\n", $string);

		// Determine the Headers
		$headers = rtrim(array_shift($lines), ',');

		// Convert the Headers to an Array
		$headers = str_getcsv($headers);

		// Process each Line
		$rows = [];

		foreach($lines as $line)
			$rows[] = array_combine($headers, str_getcsv($line));

		// Return a new CSV
		return new static($rows, $disk);
	}

	/**
	 * Creates a new CSV from an Uploaded File Instance.
	 *
	 * @param  \Illuminate\Http\UploadedFile  $file
	 * @param  boolean                        $delete
	 * @param  string|null                    $disk
	 *
	 * @return static
	 */
	public static function fromUploadedFile(UploadedFile $file, $delete = true, $disk = null)
	{
        // Store the File Locally
        $path = $file->store('/', $disk);

        // Determine the File Contents
        $contents = static::disk($disk)->get($path);

        // Import the Contents
        $csv = static::fromString($contents, $disk);

        // Delete the File
        if($delete)
        	static::disk($disk)->delete($path);

        // Return the CSV
        return $csv;
	}

	/**
	 * Returns this Instance as an Array.
	 *
	 * @return array
	 */
	public function toArray()
	{
		return $this->rows;
	}

	/**
	 * Returns this Instance as a Collection.
	 *
	 * @return \Illuminate\Support\Collection
	 */
	public function toCollection()
	{
		return new Collection($this->rows);
	}

	/**
	 * Handle Dynamic Calls to the Collection.
	 *
	 * @param  string  $method
	 * @param  array   $parameters
	 *
	 * @return mixed
	 */
	public function __call($method, $parameters)
	{
		return $this->toCollection()->$method(...$parameters);
	}
}