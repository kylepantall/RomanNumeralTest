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

        //To store the number of skips in the current loop.
        $skip = 0;

        for ($i = 0; $i < strlen($this->numeral); $i++)
        {
            //If skip is greater than 0, then continue decrementing and skipping.
            if ($skip > 0){
                $skip--;
                continue;
            }

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


            //Is the Roman Numeral 1 letter? If it is, return the value of the letter.
            //Else continue;

            if (strlen($this->numeral) > 1){
                //If the next value is more than the current value, then deduct and skip 1 letter
                if ($next_value > $value && $next_value !== false){
                    $total += ($next_value - $value);
                    $skip = 1;

                    //If the next letter is less than the current letter then add the next letter to the total;
                } else if ($next_value < $value && $next_value !== false) {
                    $total += $next_value;
                } else {

                    //If the letters are the same, add them together and skip 1 letter.
                    if ($next_value !== false){
                        $total += $value + $next_value;
                        $skip = 1;
                    } else {

                        //Else add the value of the letter to the total.
                        $total += $value;
                    }
                }
            } else {

                //Return value.
                return $value;
            }
        }

        //Return the total.
        return $total;
    }
}
