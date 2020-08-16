<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    protected $fillable = ['name'];
}
