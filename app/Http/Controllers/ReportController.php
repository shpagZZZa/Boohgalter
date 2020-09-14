<?php

namespace App\Http\Controllers;

use App\Helpers\OrderHelper;
use App\Models\Order;
use App\Models\Organization;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        if ($org = $request->input('org'))
        {
            $orders = Order::where(
                'created_at', '>=', Carbon::now()->startOfMonth()->toDateTimeString()
            )->where('organization_id', $org)->get();
            $orgName = Organization::find($org)->name;
            $orgStr = 'Отчёт организации '.$orgName;
        } else {
            $orders = Order::where(
                'created_at', '>=', Carbon::now()->startOfMonth()->toDateTimeString()
            )->get();
            $orgStr = 'Общий отчет';
        }
        $income = $this->getIncomeForPeriod($orders);
        $ingredients = $this->getIngredientsForPeriod($orders);

        return view('report.index', compact('income', 'ingredients', 'orgStr'));
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
