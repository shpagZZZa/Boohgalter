<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public function dish()
    {
        return $this->belongsToMany(Dish::class)
            ->withPivot('amount');
    }

    public function organizations()
    {
        return $this->belongsToMany(Organization::class)
            ->withPivot('amount');
    }

    protected $fillable = ['name'];
}
