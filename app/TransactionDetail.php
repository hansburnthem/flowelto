<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transaction_details';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public function transaction() {
        return $this->belongsTo(Transaction::class);
    }

    public function flower() {
        return $this->belongsTo(Flower::class);
    }
}
