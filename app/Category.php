<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    /**
     * A category has many inventories
     *
     * @return object
     */
    public function inventory()
    {
        return $this->hasMany('app\Inventory');
    }
}