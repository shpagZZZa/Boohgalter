<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::all();
        return view('ingredient.index', compact('ingredients'));
    }

    public function store(Request $request)
    {
        $data = $this->ingValidate($request->all());
        Ingredient::create($data);
        return redirect(route('ingredients'));
    }

    public function edit(Ingredient $ingredient)
    {
        return view('ingredient.edit', compact('ingredient'));
    }

    public function update(Request $request, Ingredient $ingredient)
    {
        $data = $this->ingValidate($request->all());
        $ingredient->update($data);
        return redirect(route('ingredients'));
    }

    private function ingValidate(array $data)
    {
        return Validator::make($data, [
            'name' => ['string', 'required'],
            'amount' => ['numeric', 'min:0']
        ])->validate();
    }
}
