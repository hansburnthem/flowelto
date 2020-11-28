<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    
    public function flower(){
        return $this->belongsToMany(
            Flower::class, 'transaction_details', 'transaction_id', 'flower_id'
        );
    }
    
    public function details(){
        return $this->hasMany(
            TransactionDetail::class, 'transaction_id'
        );
    }
            public function user(){
                return $this->belongsTo(
                    User::class, 'user_id', 'user_id'
                );
            }
}
