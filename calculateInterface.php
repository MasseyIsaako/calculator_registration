<?php
// Implementing an interface for calculating input
interface CalculateTemplate
{

    // Finding which operator to use
    public function identifyOperator ($firstnumber, $secondnumber, $operation);
}

class FinalCalculation implements CalculateTemplate
{
    public function identifyOperator ($firstnumber, $secondnumber, $operation) {

        // Using switch case to select which method to run, 
        // based on $operation variable
        switch ($operation) {
            case "+":
                $result = $firstnumber + $secondnumber;

                return $result;
                break;
            case "-":
                $result = $firstnumber - $secondnumber;

                return $result;
                break;
            case "/":
                $result = $firstnumber / $secondnumber;
                
                return $result;
                break;
            case "*":
                $result = $firstnumber * $secondnumber;

                return $result;
                break;
        }
    }
}