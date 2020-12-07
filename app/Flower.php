<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'flowers';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public function flowerCategory() {
        return $this->belongsTo(FlowerCategory::class);
    }
    
}
