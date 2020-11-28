<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlowerCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'flower_categories';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public function flowers() {
        return $this->hasMany(Flower::class);
    }
}
