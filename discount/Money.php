<?php 

class Money implements Calculate
{
    const discount = 20.0;

    public function CalculateDiscount(float $value): float
    {
        return $value - ($value * self::discount / 100);
    }
}
?>