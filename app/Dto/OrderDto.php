<?php


namespace App\Dto;


use App\Helpers\OrderHelper;
use App\Models\Order;

class OrderDto
{
    public $id;
    public $name;
    public $phone;
    public $address;
    public $organization;
    public $price;
    public $comment;
    public $dishesStr;
    public $created_at;

    public function __construct(Order $order)
    {
        $this->id = $order->id;
        $this->name = $order->client_name;
        $this->phone = $order->client_phone;
        $this->address = $order->client_address;
        $this->organization = $order->organization;
        $this->price = OrderHelper::getIncome($order);
        $this->comment = $order->comment;
        $this->dishesStr = $this->getDishes($order);
        $this->created_at = $order->created_at;
    }

    private function getDishes(Order $order)
    {
        $result = array();
        foreach ($order->dishes as $dish)
        {
            $amount = $dish->pivot->amount;
            $amountStr = " ($amount пор.)";
            $str = $dish->name.$amountStr;
            array_push($result, $str);
        }
        return join(", \n", $result);
    }
}
