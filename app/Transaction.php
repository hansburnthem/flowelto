<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transactions';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function transactionDetails() {
        return $this->hasMany(TransactionDetail::class);
    }
}
