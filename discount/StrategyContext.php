<?php 
class StrategyContext
{
    private Calculate $calculate;

    public function __construct(Calculate $calculate)
    {
        $this->calculate = $calculate;
    }

    public function apllyDiscount(float $value): float
    {
        return $this->calculate->CalculateDiscount($value);
    }
}
?>