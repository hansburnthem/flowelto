<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    // /**
    //  * The table associated with the model.
    //  *
    //  * @var string
    //  */
    protected $table = 'flowers';
    protected $fillable=['flower_category_id','flower_name','flower_price','flower_desc','flower_img'];

    // /**
    //  * The primary key associated with the table.
    //  *
    //  * @var string
    //  */
    // protected $primaryKey = 'id';

    public function category()
    {
        return $this->belongsTo(FlowerCategory::class);
    }
    
}
