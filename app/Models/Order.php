<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function house_type()
    {
    	return $this->belongsTo(HouseType::class, 'house_type_id');
    }
}
