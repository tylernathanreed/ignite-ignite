<?php

namespace App\Models\Budget;

use App\Models\Model;

class Account extends Model
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
        'name', 'number', 'type'
    ];

    /////////////////////
    //* Relationships *//
    /////////////////////
    /**
     * Returns the Payor that owns this Account.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payor()
    {
        return $this->belongsTo(Payor::class);
    }

    /**
     * Returns the Transactions made on this Account.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Account::class);
    }
}
