<?php

namespace App\Models\Budget;

use App\Models\Model;

class Transaction extends Model
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
        'charged_at', 'amount', 'description', 'original_description'
    ];

    protected $dates = [
        'charged_at'
    ];

    /////////////////////
    //* Relationships *//
    /////////////////////
    /**
     * Returns the Account that owns this Transaction.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    /**
     * Returns the Payors that this Transaction was for.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function payors()
    {
        return $this->belongsToMany(Payor::class, 'transaction_payors');
    }
}
