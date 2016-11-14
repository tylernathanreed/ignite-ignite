<?php

namespace App\Models\Budget;

use App\Models\Model;

class Payor extends Model
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
        'first_name', 'middle_name', 'last_name'
    ];

    /////////////////////
    //* Relationships *//
    /////////////////////
    /**
     * Returns the Accounts that belong to this Payor.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    /**
     * Returns the Transactions made by this Payor.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function payments()
    {
        return $this->hasManyThrough(Transaction::class, Account::class);
    }

    /**
     * Returns the Transactions made by this Payor.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function transactions()
    {
        return $this->belongsToMany(Transaction::class, 'transaction_payors');
    }
}
