<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        dd($categories);
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $data = $this->categoryValidate($request->all());
        Category::create($data);
        return redirect(route('categories'));
    }

    private function categoryValidate(array $data)
    {
        return Validator::make($data, [
            'name' => ['string', 'max:255', 'required'],
        ])->validate();
    }
}
