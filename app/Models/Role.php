<?php

namespace App\Models;

class Role extends Model
{
    //////////////////
    //* Attributes *//
    //////////////////
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'display_name', 'system_name'
    ];

    /**
     * The Unique Key for String Resolution.
     *
     * @var string
     */
    protected $unique = 'system_name';

    ///////////////////////////
    //* Attribute Overrides *//
    ///////////////////////////
    /**
     * Adds the $this->permissions Mutator to synchronize Permissions.
     *
     * @param  array  $permissions
     *
     * @return void
     */
    public function setPermissionsAttribute($permissions)
    {
        return $this->permissions()->sync(Permission::resolve($permissions)->pluck('id')->all());
    }

    /////////////////////
    //* Relationships *//
    /////////////////////
    /**
     * Returns the Permissions associated with this Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Returns the Users associated with this Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
