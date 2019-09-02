<?php
namespace PhpNwSykes;

class RomanNumeral
{
    protected $symbols = [
        1000 => 'M',
        500 => 'D',
        100 => 'C',
        50 => 'L',
        10 => 'X',
        5 => 'V',
        1 => 'I',
    ];

    protected $numeral;

    public function __construct(string $romanNumeral)
    {
        $this->numeral = $romanNumeral;
    }

    /**
     * Converts a roman numeral such as 'X' to a number, 10
     *
     * @throws InvalidNumeral on failure (when a numeral is invalid)
     */
    public function toInt():int
    {
        $total = 0;

        $accounted_for = [];

        for ($i = 0; $i < strlen($this->numeral); $i++)
        {

            //Stores the next letter index
            $next_letter_index = $i + 1;

            //Finds the letter using the given index
            $next_letter = substr($this->numeral,$next_letter_index,1);

            //Finds the value from the array using the given letter
            $next_value = array_search($next_letter, $this->symbols);

            //Same as previous functionality - retrieves letter using index
            $letter =  substr($this->numeral, $i, 1);

            //Stores the value by finding the value of the given letter
            $value = array_search($letter, $this->symbols);

            //If letter could not be found throw invalid exception.
            if ($value == false) throw new InvalidNumeral();


            //Only calculate more than 1 roman numeral
            if (strlen($this->numeral) > 1){

                if (!in_array($i,$accounted_for) && !in_array($next_letter_index,$accounted_for)){


                    //If no next value exists, add the current value and add this to list of accounted values.
                    //Skip current iteration.
                    if ($value !== false && $next_value == false) {
                        $total += $value;

                        array_push($accounted_for, $i);
                        continue;
                    }
                    
                    //If next value is less or equal to current value, add them together and increment total by calculation.
                    //Else, increment total by the subtraction of both values.

                    if ($next_value <= $value){
                        $total += ($next_value + $value);
                    } 

                    if ($next_value > $value) {
                        $total += ($next_value - $value);
                    }

                    //Add both indexes to accounted_for array to prevent re-processing.
                    array_push($accounted_for, $i);
                    array_push($accounted_for, $next_letter_index);
                }
                
            } 
            
            if (strlen($this->numeral) <= 1) {
                //Return value for single roman numeral as no calculation is necessary.
                return $value;
            }
        }

        //Return the total.
        return $total;
    }
}
