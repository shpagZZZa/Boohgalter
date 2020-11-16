<?php

namespace App\Http\Controllers;

use App\Dto\DishDto;
use App\Helpers\RequestHelper;
use App\Models\Category;
use App\Models\Dish;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DishController extends Controller
{
    public function index()
    {
        $dishes = array();
        foreach (Dish::orderBy('category_id')->get() as $dish)
        {
            array_push($dishes, new DishDto($dish));
        }
        return view('dish.index', compact('dishes'));
    }

    public function create()
    {
        $categories = Category::all();
        $ingredients = Ingredient::all();
        return view('dish.create', compact('categories', 'ingredients'));
    }

    public function store(Request $request)
    {
        $category = Category::find($request->input('category'));
        $data = $this->dishValidate($request->all());
        $category->dishes()->create($data);
        $dish = $category->dishes->last();

        $ingredients = RequestHelper::fillArrayFromRequest("ingredient", $request);
        $amountArray = RequestHelper::fillArrayFromRequest("amount", $request);

        foreach ($ingredients as $index => $value)
        {
            $ing = Ingredient::find($ingredients[$index]);
            $dish->ingredients()->attach($ing, ['amount' => $amountArray[$index]]);
        }
//        for ($i = 0; $i < count($ingredients); $i++)
//        {
//            $ing = Ingredient::find($ingredients[$i]);
//            $dish->ingredients()->attach($ing, ['amount' => $amountArray[$i]]);
//        }

        return redirect(route('dishes'));
    }

    public function edit(Dish $dish)
    {

    }

    public function update(Request $request, Dish $dish)
    {

    }

    public function delete(Dish $dish)
    {

    }

    private function dishValidate(array $data)
    {
        return Validator::make($data, [
            'category' => ['required'],
            'name' => ['string', 'max:255', 'required'],
            'price' => ['regex:/^\d*(\.\d{2})?$/', 'required'],
            'amount*' => ['required'],
            'ingredient*' => ['required'],
        ])->validate();
    }
}
