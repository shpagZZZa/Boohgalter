<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class)->withPivot('amount');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('amount');
    }

    protected $fillable = ['name', 'price', 'category_id'];
}
