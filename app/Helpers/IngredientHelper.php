<?php


namespace App\Helpers;


use App\Models\Dish;
use App\Models\Ingredient;
use App\Models\Organization;

class IngredientHelper
{
    public static function getIngAmountsForOrganization(Organization $organization): array
    {
        $allIngredients = self::getIngredientNames();
        $result = [];
        foreach ($organization->ingredients as $ingredient)
        {
            $result[$ingredient->id] = $ingredient->pivot->amount;
        }
        foreach ($allIngredients as $ingId => $name)
        {
            if (!key_exists($ingId, $result))
                $result[$ingId] = 0;
        }
        return $result;
    }

    public static function getIngredientNames(): array
    {
        $allIngredients = [];
        foreach (Ingredient::all() as $ingredient)
        {
            $allIngredients[$ingredient->id] = $ingredient->name;
        }
        return $allIngredients;
    }

    public static function getIngredientsForDish(Dish $dish): array
    {
        $result = [];
        foreach ($dish->ingredients as $ingredient)
        {
            $result[$ingredient->id] = $ingredient->pivot->amount;
        }
        return $result;
    }
}
