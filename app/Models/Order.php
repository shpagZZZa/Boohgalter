<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function dishes()
    {
        return $this->belongsToMany(Dish::class)->withPivot('amount');
    }

    protected $fillable = ['client_name', 'client_phone', 'client_address', 'comment'];

    protected $attributes = [
        'comment' => '-',
    ];
}
