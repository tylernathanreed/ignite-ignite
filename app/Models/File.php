<?php 

namespace App\Models;

use Storage;

class File extends Model
{
    //////////////////
    //* Attributes *//
    //////////////////
    /**
     * The Database Table associated with this Model.
     *
     * @var string
     */
    protected $table = 'files';

    /**
     * The name of the Temp Storage Driver.
     *
     * @var string
     */
    protected static $temp = 'temp';

    /**
     * The name of the Uploads Storage Driver.
     *
     * @var string
     */
    protected static $uploads = 'uploads';

    /**
     * The Attributes that are allowed to be Mass Assigned.
     *
     * @var array
     */
    protected $fillable = [
        'display_name', // The User-Friendly Name of this File
        'path',         // The Storage Location of this File
        'size',         // The Size of this File
        'extension',    // The Extension of this File
        'mime',         // The Mime Type of this File
    ];

    /////////////////////
    //* Boot Override *//
    /////////////////////
    /**
     * This method handles any triggers associated with this Model.
     *
     * @return void
     */
    public static function boot()
    {
        /**
         * Delete the Document that belongs to this Model.
         */
        static::deleting(function($file)
        {
            // Delete the Physical File
            $file->deleteFromStorage();
        });
    }

    ////////////////////
    //* Constructors *//
    ////////////////////
    /**
     * Creates an Instance of this Model using a Temp File.
     *
     * @param  string  $temp        The Path to the Temp File.
     * @param  array   $attributes  The Attributes for the Model.
     *
     * @return static
     */
    public static function import($temp, $attributes = [])
    {
        // Create a new File Instance
        $file = new static($attributes);

        // Remember the File Location
        $file->path = $temp;

        // Move the Temp File
        $contents = $file->getTempContents(); // Get Temp Contents
        $file->contents = $contents; // Put Contents into Long-Term Storage
        $file->deleteTempFile(); // Delete Temp File

        // Return the File Instance
        return $file;
    }

    /**
     * Creates an Instance of this Model using raw Contents.
     *
     * @param  string  $contents    The File Contents.
     * @param  string  $extension   The File Extension.
     * @param  array   $attributes  The Attributes for the Model.
     *
     * @return static
     */
    public static function fromContents($contents, $extension, $attributes = [])
    {
        // Add Extension to Attributes
        $attributes['extension'] = $extension;

        // Create a new File Instance
        $file = new static($attributes);

        // Generate a name
        $path = $file->generateFilePath($contents, $extension);

        // Remember the File Location
        $file->path = $path;

        // Put Contents into Long-Term Storage
        $file->contents = $contents; // Put Contents into Long-Term Storage

        // Return the File Instance
        return $file;
    }

    ///////////////////////
    //* File Operations *//
    ///////////////////////
    /**
     * Returns the Contents of this File's Temp File.
     *
     * @return string
     */
    public function getTempContents()
    {
        // Custom Implementation
        return static::getTempDisk()->get($this->path);
    }

    /**
     * Deletes this File's Temp File from Storage.
     *
     * @return string
     */
    public function deleteTempFile()
    {
        // Custom Implementation
        return static::getTempDisk()->delete($this->path);
    }

    /**
     * Deletes this File from Storage.
     *
     * @return string
     */
    public function deleteFromStorage()
    {
        return $this->disk->delete($file->path);
    }

    /**
     * Returns the Contents of this File.
     *
     * @return string
     */
    public function getContents()
    {
        return $this->disk->get($this->path);
    }

    /**
     * Sets the Contents of this File.
     *
     * @param  string  $contents  The File Contents.
     *
     * @return string
     */
    public function setContents($contents)
    {
        return $this->disk->put($this->path, $contents);
    }

    /**
     * Returns the Size of this File (in Bytes).
     *
     * @return int
     */
    public function getSize()
    {
        return $this->disk->size($this->path);
    }

    /**
     * Returns the Mime Type of this File.
     *
     * @return string
     */
    public function getMimeType()
    {
        return $this->disk->mimeType($this->path);
    }

    //////////////////////
    //* Disk Accessors *//
    //////////////////////
    /**
     * Returns the Name of the Temp Storage Driver.
     *
     * @return string
     */
    public static function getTempDiskName()
    {
        return static::$temp;
    }

    /**
     * Returns the Name of the Uploads Storage Driver.
     *
     * @return string
     */
    public static function getUploadsDiskName()
    {
        return static::$uploads;
    }

    /**
     * Returns the Temp Storage Disk.
     *
     * @return \Illuminate\Contracts\Filesystem\Filesystem
     */
    public static function getTempDisk($disk = null)
    {
        return Storage::disk($disk ?: static::$temp);
    }

    /**
     * Returns the Uploads Storage Disk.
     *
     * @return \Illuminate\Contracts\Filesystem\Filesystem
     */
    public static function getUploadsDisk($disk = null)
    {
        return Storage::disk($disk ?: static::$uploads);
    }

    ///////////////////////////
    //* Attribute Overrides *//
    ///////////////////////////
    /**
     * Creates the $this->disk Accessor to return the Storage Instance.
     *
     * @return \Illuminate\Filesystem\FilesystemManager
     */
    public function getDiskAttribute()
    {
        return static::getUploadsDisk();
    }

    /**
     * Creates the $this->contents Accessor to allow simple
     * Access to this File's contents.
     *
     * @return string
     */
    public function getContentsAttribute()
    {
        // Return the File Contents
        return $this->getContents();
    }

    /**
     * Creates the $this->contents Mutator to allow simple
     * Writing of this File's contents.
     *
     * @param  string  $contents  The File Contents.
     *
     * @return void
     */
    public function setContentsAttribute($contents)
    {
        // Set the File Contents
        $this->setContents($contents);

        // Set the File Size
        $this->size = $this->getSize();
    }

    /**
     * Overrides the $thi->path Mutator to update the Mime Type and Extension.
     *
     * @param  string  $path  The File Path.
     *
     * @return void
     */
    public function setPathAttribute($path)
    {
        // Set the File Path
        $this->attributes['path'] = $path;

        // Update the Extension
        $this->extension = last(explode('.', $path));

        // Update the Mime Type
        $this->mime = $this->getMimeType();
    }

    /**
     * Overrides the $this->extension Mutatator to trim Periods
     * from Extensions (i.e. '.txt' becomes 'txt').
     *
     * @param  string  $value  The specified Extension.
     *
     * @return void
     */
    public function setExtensionAttribute($value) 
    {
        $this->attributes['extension'] = ($value !== null ? ltrim($value, '.') : null);
    }

    /**
     * Creates the $this->download_name Accessor to allow simple
     * derivation of a clean, downloadable File Name.
     *
     * @return string
     */
    public function getDownloadNameAttribute()
    {
        return "{$this->display_name}.{$this->extension}";
    }

    /////////////////
    //* Utilities *//
    /////////////////
    /**
     * Generates a File Path from the Contents and Extension.
     *
     * @param  string  $contents   The File Contents.
     * @param  string  $extension  The File Extension.
     *
     * @return string
     */
    public function generateFilePath($contents, $extension)
    {
        // Custom Implementation
        return md5($contents) . ".{$extension}";
    }

    /**
     * Returns a Response to download this File.
     *
     * @return Response
     */
    public function download()
    {
        return response($this->contents, 200)
            ->header('Content-Description', 'File Transfer')
            ->header('Content-Type', $this->mime)
            ->header('Content-Disposition', 'attachment; filename="' . $this->download_name . '"')
            ->header('Content-Transfer-Encoding', 'binary')
            ->header('Expires', 0)
            ->header('Cache-Control', 'must-revalidate, post-check=0, pre-check=0')
            ->header('Pragma', 'public')
            ->header('Content-Length', $this->size);
    }

    /////////////////////
    //* Relationships *//
    /////////////////////
    /**
     * Returns the Entity that this File belongs to.
     *
     * @return Relationship
     */
    public function link()
    {
        return $this->morphTo();
    }
}