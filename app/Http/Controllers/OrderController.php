<?php

namespace App\Http\Controllers;

use App\Dto\OrderDto;
use App\Helpers\RequestHelper;
use App\Models\Dish;
use App\Models\Order;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if ($sortMethod = $request->input('sortBy'))
        {
            if ($sortMethod == 'date')
                $orderSet = Order::orderBy('created_at', 'desc')->get();

        }
        else
            $orderSet = Order::all();
        $orders = array();
        foreach ($orderSet as $order)
            array_push($orders, new OrderDto($order));
        return view('order.index', compact('orders'));
    }

    public function create()
    {
        $organizations = Organization::all();
        $dishes = Dish::all();
        return view('order.create', compact('organizations', 'dishes'));
    }

    public function store(Request $request)
    {
        $organization = Organization::find($request->input('organization'));
        $data = $this->orderValidate($request->all());
        $organization->orders()->create($data);
        $order = $organization->orders->last();

        $dishes = RequestHelper::fillArrayFromRequest("dish", $request);
        $amountArray = RequestHelper::fillArrayFromRequest('amount', $request);
        for ($i = 0; $i < count($dishes); $i++)
        {
            $dish = Dish::find($dishes[$i]);
            $order->dishes()->attach($dish, ['amount' => $amountArray[$i]]);
        }

        return redirect(route('orders'));
    }

    private function orderValidate(array $data)
    {
        return Validator::make($data, [
            'organization' => ['required'],
            'client_name' => ['string', 'max:255', 'required'],
            'client_phone' => ['string', 'max:255'],
            'client_address' => ['string', 'max:255', 'required'],
            'comment' => ['string', 'nullable'],
        ])->validate();
    }
}
