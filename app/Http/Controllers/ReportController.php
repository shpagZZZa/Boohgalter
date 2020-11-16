<?php

namespace App\Http\Controllers;

use App\Helpers\IngredientHelper;
use App\Helpers\OrderHelper;
use App\Models\Ingredient;
use App\Models\Order;
use App\Models\Organization;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $allIngredients = IngredientHelper::getIngredientNames();

        if ($org = $request->input('org'))
        {
            $organizationObject = Organization::find($org);
            $orders = Order::where(
                'created_at', '>=', Carbon::now()->startOfMonth()->toDateTimeString()
            )->where('organization_id', $org)->get();
            $orgName = $organizationObject->name;
            $orgStr = 'Отчёт организации '.$orgName;
            $isTotalReport = false;

            $amountArray = IngredientHelper::getIngAmountsForOrganization($organizationObject);
        } else {
            $orders = Order::where(
                'created_at', '>=', Carbon::now()->startOfMonth()->toDateTimeString()
            )->get();
            $orgStr = 'Общий отчет';
            $isTotalReport = true;
        }
        $income = $this->getIncomeForPeriod($orders);
        $ingredients = $this->getIngredientsForPeriod($orders);

        return view('report.index', compact(
            'income',
            'ingredients',
            'orgStr',
            'allIngredients',
            'isTotalReport',
            'amountArray'
        ));
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
