<?php

namespace App\Models;

class Permission extends Model
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
        'display_name', 'system_name', 'system_group',
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
     * Adds the $this->name Accessor to return a Scoped Name.
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->category . ' / ' . $this->display_name;
    }

    /**
     * Adds the $this->category Accessor to alias 'system_group'.
     *
     * @return string
     */
    public function getCategoryAttribute()
    {
        return $this->system_group;
    }

    /**
     * Adds the $this->category Mutator to alias 'system_group'.
     *
     * @param  string  $category  The Value to Assign to 'system_group'.
     *
     * @return string
     */
    public function setCategoryAttribute($category)
    {
        return $this->system_group = $category;
    }

    ////////////////////
    //* Query Scopes *//
    ////////////////////
    /**
     * Returns all of the Categories within the Query.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     *
     * @return \Illuminate\Support\Collection
     */
    public function scopeCategories($query)
    {
        // Determine the Permissions from the Query
        $permissions = $query->get();

        // Grab the Category Names
        $categories = $permissions->pluck('system_group')->unique();

        // Map the Categories into Objects
        return $categories->map(function($category) use ($permissions) {
            return (object) [
                'name' => $category,
                'permissions' => $permissions->where('system_group', $category)
            ];
        });
    }

    /////////////////////
    //* Relationships *//
    /////////////////////
    /**
     * Returns the Roles associated with this Permission.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Returns the Users associated with this Permission.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
