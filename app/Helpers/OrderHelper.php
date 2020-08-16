<?php


namespace App\Helpers;


use App\Models\Order;

class OrderHelper
{
    public static function getIncome(Order $order)
    {
        $result = 0;
        foreach ($order->dishes as $dish) {
            $amount = $dish->pivot->amount;
            $result += $dish->price * $amount;
        }
        return $result;
    }
}
