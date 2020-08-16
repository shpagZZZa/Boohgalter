<?php


namespace App\Dto;


use App\Models\Dish;

class DishDto
{
    public $id;
    public $name;
    public $category;
    public $price;
    public $ingredientsStr;

    public function __construct(Dish $dish)
    {
        $this->id = $dish->id;
        $this->name = $dish->name;
        $this->category = $dish->category;
        $this->price = $dish->price;
        $this->ingredientsStr = $this->getIngredients($dish);
    }

    private function getIngredients(Dish $dish)
    {
        $result = array();
        foreach ($dish->ingredients as $ingredient)
        {
            $amount = $ingredient->pivot->amount;
            $amountStr = " ($amount г)";
            $str = $ingredient->name.$amountStr;
            array_push($result, $str);
        }
        return join(", \n", $result);
    }
}
