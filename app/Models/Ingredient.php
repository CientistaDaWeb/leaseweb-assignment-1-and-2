<?php

namespace App\Models;


class Ingredient
{
    /**
     * @param  string  $name
     * @param  int  $capacity
     * @param  int  $durability
     * @param  int  $flavor
     * @param  int  $texture
     * @param  int  $calories
     */
    public function __construct(
        public string $name,
        public int $capacity,
        public int $durability,
        public int $flavor,
        public int $texture,
        public int $calories)
    {
    }
}
