<?php

namespace App\Exceptions;

use Exception;

class RecipeException extends Exception
{
    public static function invalidIngredient(string $ingredient): self
    {
        return new self('The "'.$ingredient.'" is not found in recipe.');
    }

    public static function invalidSpoons(int $spoons): self
    {
        return new self('The total spoons must be greater than 0. Got: '.$spoons);
    }

    public static function invalidCalories(int $calories): self
    {
        return new self('The total calories must be greater than 0. Got: '.$calories);
    }


}
