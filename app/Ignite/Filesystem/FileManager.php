<?php

namespace App\Ignite\Filesystem;

use Illuminate\Support\Facades\Storage;

abstract class FileManager
{
	/**
	 * The Name of the Storage Driver.
	 *
	 * @var string
	 */
	protected $disk;

    /**
     * Creates a new Instance of this Class.
     *
     * @param  string  $disk
     *
     * @return $this
     */
    public function __construct($disk = null)
    {
        $this->disk = $disk;
    }

    /**
     * Returns the Storage Driver.
     *
     * @return \Illuminate\Contracts\Filesystem\Filesystem
     */
    public function getDisk()
    {
        return Storage::disk($this->getDiskName());
    }

    /**
     * Returns the Name of the Storage Driver.
     *
     * @return string
     */
    public function getDiskName()
    {
        return $this->disk;
    }

    /**
     * Sets the Storage Driver.
     *
     * @param  string  $name
     *
     * @return $this
     */
    public function setDisk($name)
    {
        $this->disk = $name;

        return $this;
    }

    /**
     * Handle Static Calls to the Storage Instance.
     *
     * @param  string  $method
     * @param  array   $parameters
     *
     * @return mixed
     */
    public static function __callStatic($method, $parameters)
    {
        return Storage::$method(...$parameters);
    }
}