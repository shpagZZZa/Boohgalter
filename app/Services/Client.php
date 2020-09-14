<?php


namespace App\Services;


use App\Models\Order;

class Client
{
    public $name;
    public $phone;
    public $address;

    public function __construct(string $name, string $phone, string $address)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
    }

    public static function fromOrder(Order $order)
    {
        return new Client($order->client_name, $order->client_phone, $order->client_address);
    }
}
