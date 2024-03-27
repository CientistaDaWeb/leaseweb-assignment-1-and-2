<?php

namespace App\Models;

use App\Exceptions\RecipeException;

class Recipe
{
    public array $usedIngredients = [];

    public function __construct(
        public array $ingredients = [
            new Ingredient('Sprinkers', 2, 0, -2, 0, 3),
            new Ingredient('Butterscotch', 0, 5, -3, 0, 3),
            new Ingredient('Chocolate', 0, 0, 5, -1, 8),
            new Ingredient('Candy', 0, -1, 0, 5, 8),
        ],
        private int $totalSpoons = 100,
        private int $totalCalories = 500
    ) {
        $this->setUsedIngredients(collect($this->ingredients)->map(fn($i) => $i->name)->toArray());
    }

    public function hasIngredient($ingredient)
    {
        $result = collect($this->ingredients)->first(fn($i) => $i->name === $ingredient);
        return $result instanceof Ingredient;
    }

    public function setUsedIngredients(array $ingredients)
    {
        foreach ($ingredients as $ingredient) {
            if (!$this->hasIngredient($ingredient)) {
                throw RecipeException::invalidIngredient($ingredient);
            }
        }
        $this->usedIngredients = $ingredients;
    }

    public function setTotalSpoons(int $totalSpoons = null)
    {
        if ($totalSpoons < 1) {
            throw RecipeException::invalidSpoons($totalSpoons);
        }
        $this->totalSpoons = $totalSpoons;
    }

    public function setTotalCalories(int $totalCalories = null)
    {
        if ($totalCalories < 1) {
            throw RecipeException::invalidCalories($totalCalories);
        }
        $this->totalCalories = $totalCalories;
    }

    /**
     * @throws RecipeException
     */
    public function calculateScore($amounts): int
    {
        $capacity = $durability = $flavor = $texture = 0;
        foreach ($this->usedIngredients as $key => $ingredientName) {
            $amount = $amounts[$key];
            $ingredient = collect($this->ingredients)->first(fn($i) => $i->name === $ingredientName);
            $capacity += $ingredient->capacity * $amount;
            $durability += $ingredient->durability * $amount;
            $flavor += $ingredient->flavor * $amount;
            $texture += $ingredient->texture * $amount;
        }

        return array_product([
            ($capacity > 0) ? $capacity : 0,
            ($durability > 0) ? $durability : 0,
            ($flavor > 0) ? $flavor : 0,
            ($texture > 0) ? $texture : 0,
        ]);
    }

    public function calculateCalories($amounts): int
    {
        $calories = 0;
        foreach ($this->usedIngredients as $key => $ingredientName) {
            $amount = $amounts[$key];
            $ingredient = collect($this->ingredients)->first(fn($i) => $i->name === $ingredientName);
            $calories += $ingredient->calories * $amount;
        }
        return $calories;
    }

    public function calculateBetterScore(): int
    {
        $betterScore = 0;
        $totalIngredients = count($this->usedIngredients);
        $amounts = $this->generateCombinations($totalIngredients, $this->totalSpoons);
        foreach ($amounts as $amount) {
            $score = $this->calculateScore($amount);
            if ($score <= $betterScore) {
                continue;
            }
            $betterScore = $score;
        }

        return $betterScore;
    }

    public function calculateBetterScoreWithCallories(): int
    {
        $betterScore = 0;
        $totalIngredients = count($this->usedIngredients);
        $amounts = $this->generateCombinations($totalIngredients, $this->totalSpoons);
        foreach ($amounts as $amount) {
            $calories = $this->calculateCalories($amount);
            if($calories !== $this->totalCalories)
            {
                continue;
            }
            $score = $this->calculateScore($amount);
            if ($score <= $betterScore) {
                continue;
            }
            $betterScore = $score;
        }

        return $betterScore;
    }

    public function generateCombinations($totalIngredients, $totalSpoons)
    {
        if ($totalIngredients == 1) {
            return [$totalSpoons];
        }

        $possibleCombinations = [];

        for ($i = 0; $i <= $totalSpoons; $i++) {
            $combinations = $this->generateCombinations($totalIngredients - 1, $totalSpoons - $i);

            foreach ($combinations as $combination) {
                if (is_int($combination)) {
                    $combination = [$combination];
                }
                array_unshift($combination, $i);
                $possibleCombinations[] = $combination;
            }
        }

        return $possibleCombinations;
    }
}
