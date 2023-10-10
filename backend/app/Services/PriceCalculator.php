<?php

namespace App\Services;

class PriceCalculator
{
    public static function calculate($carrier, $weight)
    {
        $prices = $carrier->prices;

        foreach($prices as $price) {
            if($weight >= $price->min_weight && $weight <= $price->max_weight) {
                return $price->price;
            }
        }

        throw new \Exception('No matching price found');
    }
}
