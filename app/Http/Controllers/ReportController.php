<?php

namespace App\Http\Controllers;

use App\Helpers\OrderHelper;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
//        if ($request->input('period'))
        $orders = Order::where(
            'created_at', '>=', Carbon::now()->startOfMonth()->toDateTimeString()
        )->get();

        $income = $this->getIncomeForPeriod($orders);
        $ingredients = $this->getIngredientsForPeriod($orders);

        return view('report.index', compact('income', 'ingredients'));
    }

    private function getIncomeForPeriod($orders)
    {
        $result = 0;
        foreach ($orders as $order)
        {
            $result += OrderHelper::getIncome($order);
        }
        return $result;
    }

    private function getIngredientsForPeriod($orders)
    {
        $result = array();
        foreach ($orders as $order)
        {
            foreach ($order->dishes as $dish)
            {
                foreach ($dish->ingredients as $ingredient)
                {
                    if (!isset($result[$ingredient->name]))
                        $result[$ingredient->name] = 0;
                    $amount = $ingredient->pivot->amount * $dish->pivot->amount;
                    $result[$ingredient->name] += $amount;
                }
            }
        }
        return $result;
    }
}
