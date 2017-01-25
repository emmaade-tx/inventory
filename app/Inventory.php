<?php

namespace app\Model;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
    	'user_id',
    	"category_id",
        'name',
        'price',
    ];

    /**
     * A product belongs to user
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo('app\User');
    }

    /**
     * An Inventory belongs to Category
     *
     * @return object
     */
    public function categories()
    {
        return $this->belongsTo('app\Category');
    }
}