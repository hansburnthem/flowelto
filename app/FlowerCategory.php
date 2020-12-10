<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlowerCategory extends Model
{
    // /**
    //  * The table associated with the model.
    //  *
    //  * @var string
    //  */
    // protected $table = 'flower_categories';

    // /**
    //  * The primary key associated with the table.
    //  *
    //  * @var string
    //  */
    // protected $primaryKey = 'id';

    protected $table='flower_categories';
    protected $fillable =['category_name','category_img'];


    public function flowers() {
        return $this->hasMany(Flower::class);
    }
    
} 
