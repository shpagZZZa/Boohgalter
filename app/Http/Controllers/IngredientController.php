<?php

namespace App\Http\Controllers;

use App\Helpers\RequestHelper;
use App\Models\Ingredient;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::all();
        $organizations = Organization::all();
        $amounts = [];
        foreach ($ingredients as $ingredient)
        {
            $amounts[$ingredient->id] = $this->getIngOrgAmounts($ingredient);
        }
        return view('ingredient.index', compact(
            'ingredients',
            'organizations',
            'amounts')
        );
    }

    public function store(Request $request)
    {
        $data = $this->ingValidate($request->all());
//        $organization = Organization::find($request->input('organization_id'));
//        $organization->ingredients()->create($data);
        Ingredient::create($data);
        return redirect(route('ingredients'));
    }

    public function edit(Ingredient $ingredient)
    {
        $organizations = Organization::all();
        $amounts = $this->getIngOrgAmounts($ingredient);
        return view('ingredient.edit', compact('ingredient', 'organizations', 'amounts'));
    }

    public function update(Request $request, Ingredient $ingredient)
    {
        $data = $this->ingValidate($request->all());
        $ingredient->update($data);

        $amountArray = RequestHelper::fillArrayFromRequest('amount', $request);
        foreach ($amountArray as $orgId => $amount)
        {
            $org = Organization::find($orgId);
            $ingredient->organizations()->attach($org, ['amount' => $amount]);
        }
        return redirect(route('ingredients'));
    }

    private function ingValidate(array $data)
    {
        return Validator::make($data, [
            'name' => ['string', 'required'],
            'amount*' => ['numeric', 'min:0']
        ])->validate();
    }

    private function getIngOrgAmounts(Ingredient $ingredient): array
    {
        $organizations = Organization::all();
        $amounts = [];
        foreach ($ingredient->organizations as $organization)
        {
            $amounts[$organization->id] = $organization->pivot->amount;
        }
        foreach ($organizations as $organization)
            if (!isset($amounts[$organization->id]))
                $amounts[$organization->id] = 0;

        return $amounts;
    }
}
