<?php
// Implementing an interface for calculating input
interface CalculateTemplate
{

    // Calculate the input
    public function finalCalculation ($firstnumber, $operation, $secondnumber);
}

class Calculation implements CalculateTemplate
{
    public function finalCalculation ($firstnumber, $operation, $secondnumber) {
        // var_dump($firstnumber);
        // var_dump($operation);
        // var_dump($secondnumber);
        // die();
    }
}