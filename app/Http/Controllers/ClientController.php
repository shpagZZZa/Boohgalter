<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Order::all()->map(function (Order $order) {
            return Client::fromOrder($order);
        });
        return view('client.index', compact('clients'));
    }
}
