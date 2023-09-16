<?php

class PizzaPi
{
    public function calculateDoughRequirement($pizzas, $persons)
    {
        return $pizzas * (200 + $persons * 20);
    }

    public function calculateSauceRequirement($pizzas, $can_volume)
    {
        return $pizzas * 125 / $can_volume;
    }

    public function calculateCheeseCubeCoverage($cheese_dimension, $thickness, $pizza_diameter)
    {
        return floor(($cheese_dimension ** 3) / ($thickness * pi() * $pizza_diameter));
    }

    public function calculateLeftOverSlices($pizzas, $friends)
    {
        return ($pizzas * 8) % $friends;
    }
}
