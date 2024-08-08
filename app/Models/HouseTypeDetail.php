<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HouseTypeDetail extends Model
{
    protected $table = 'house_type_details';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function house_type()
    {
    	return $this->belongsTo(HouseType::class, 'house_type_id');
    }

    public function contractor()
    {
    	return $this->belongsTo(Contractor::class, 'contractor_id');
    }
}
