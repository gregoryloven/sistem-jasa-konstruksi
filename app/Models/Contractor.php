<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Contractor extends Model
{
    protected $table = 'contractors';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
