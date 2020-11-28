<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function flower(){
        return $this->hasMany(
            Flower::class, 'category_id', 'id'
        );
    }
}
