<?php

namespace Tests\Unit\Models;

use App\Exceptions\RecipeException;
use App\Models\Recipe;
use App\Models\Ingredient;
use PHPUnit\Framework\TestCase;

class RecipeTest extends TestCase
{

    public function testFailIngredient(): void
    {
        $ingredients = [
            new Ingredient('Butterscotch', -1, -2, 6, 3, 8),
            new Ingredient('Cinnamon', 2, 3, -2, -1, 3),
        ];
        $cookie = new Recipe($ingredients);
        $this->expectException(RecipeException::class);
        $cookie->setUsedIngredients(['Butter']);
        $amounts = [10];
        $cookie->calculateScore($ingredients, $amounts);
    }

    public function testCalculateScore(): void
    {
        $ingredients = [
            new Ingredient('Butterscotch', -1, -2, 6, 3, 8),
            new Ingredient('Cinnamon', 2, 3, -2, -1, 3),
        ];
        $cookie = new Recipe($ingredients);
        $amounts = [44, 56];
        $expected = 62842880;
        $this->assertEquals($expected, $cookie->calculateScore($amounts));
    }

    public function testFailSpoonsValue(): void
    {
        $cookie = new Recipe();
        $this->expectException(RecipeException::class);
        $cookie->setTotalSpoons(-3);
    }

    public function testFailCaloriesValue(): void
    {
        $cookie = new Recipe();
        $this->expectException(RecipeException::class);
        $cookie->setTotalCalories(-10);
    }

    public function testCalculateBetterScore(): void
    {
        $ingredients = [
            new Ingredient('Butterscotch', -1, -2, 6, 3, 8),
            new Ingredient('Cinnamon', 2, 3, -2, -1, 3),
        ];
        $cookie = new Recipe($ingredients);
        $expected = 62842880;
        $this->assertEquals($expected, $cookie->calculateBetterScore());
    }

    public function testCalculateBetterScoreWithDelimitedIngredients(): void
    {
        $ingredients = [
            new Ingredient('Butterscotch', -1, -2, 6, 3, 8),
            new Ingredient('Cinnamon', 2, 3, -2, -1, 3),
            new Ingredient('Egg', 1, 4, 3, -2, 6),
        ];
        $cookie = new Recipe($ingredients);
        $cookie->setUsedIngredients(['Butterscotch', 'Cinnamon']);
        $expected = 62842880;
        $this->assertEquals($expected, $cookie->calculateBetterScore());
    }

    public function testCalculateBetterScoreWithDefaultIngredients(): void
    {
        $cookie = new Recipe();
        $expected = 21367368;
        $this->assertEquals($expected, $cookie->calculateBetterScore());
    }

    public function testCalculateBetterScoreWithCalories(): void
    {
        $ingredients = [
            new Ingredient('Butterscotch', -1, -2, 6, 3, 8),
            new Ingredient('Cinnamon', 2, 3, -2, -1, 3),
        ];
        $cookie = new Recipe($ingredients);
        $expected = 57600000;
        $this->assertEquals($expected, $cookie->calculateBetterScoreWithCallories());
    }

    public function testCalculateBetterScoreWithCaloriesWithDefaultIngredients(): void
    {
        $cookie = new Recipe();
        $expected = 1766400;
        $this->assertEquals($expected, $cookie->calculateBetterScoreWithCallories());
    }
}
