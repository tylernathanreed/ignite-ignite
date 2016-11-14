<?php

namespace App\Models\Budget;

use App\Models\Model;

class TransactionCategory extends Model
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

    /////////////////////
    //* Relationships *//
    /////////////////////
    /**
     * Returns the Transactions that use this Category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function transactions()
    {
        return $this->belongsToMany(Transaction::class, 'transaction_transaction_categories');
    }

    /**
     * Returns the Businesses that use this Category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function payors()
    {
        return $this->belongsToMany(Business::class, 'business_transaction_categories');
    }
}
