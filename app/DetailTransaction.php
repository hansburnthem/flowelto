<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    public function header(){
        return $this->belongsTo(
            Transaction::class, 'transaction_id'
        );
    }

    public function flower(){
        return $this->belongsTo(
            Flower::class, 'flower_id'
        );
    }
}
