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

    public function calculateAdd ($firstnumber, $secondnumber)
    {
        return $firstnumber + $secondnumber;
    }

    // public function calculateSubtract ($firstnumber, $secondnumber)
    // {
    //     echo "Hello";
    // }

    // public function calculateDivide ($firstnumber, $secondnumber)
    // {
    //     echo "Hello there peoples of the earth, this thing is now working";
    // }

    // public function calculateMutliply ($firstnumber, $secondnumber)
    // {
    //     echo "Hello there peoples of the earth, this thing is now working";
    // }
}