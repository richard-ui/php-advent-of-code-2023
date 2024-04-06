<?php

// echo "Welcome to Day One - Advents of Code!";

class InputList extends dayOne {

    public $inputTxt = "";

    public function __construct($inputTxt) {
        $this->inputTxt = $inputTxt;
    }

    public function getInput() {
        $contents = file_get_contents($this->inputTxt);
        $input = preg_split('/\r\n|\r|\n/', $contents);
        return $input;
    }
}

class dayOne {

    public $total = 0;

    public function __construct($total) {
        $this->total = $total;
    }

    public function getTotal() {
        // $total = $this->total;
        // return $total;
        
        foreach ($input as $line) {
            $characters = str_split($line); 
            $digits = array_values(array_filter($characters, "is_numeric"));
    
            $length = count($digits);
            $firstNumber = $digits[0];
            $lastNumber = $digits[$length - 1];
            $total += $firstNumber . $lastNumber;
        }
    
        return $total; 

    }
}

    $input = new InputList("input.txt");
    echo $input->getTotal();
    exit();

    $input = new InputList("input.txt");
    echo $input->getInput();
    foreach($input->getInput() as $line) {
        echo $line;
        echo "\n";
    }
    exit();

// $input = [
    // '1abc2',
    // 'pqr3stu8vwx',
    // 'a1b2c3d4e5f',
    // 'treb7uchet',
// ];
function part1()
{
    // Get string values by line.
    $contents = file_get_contents("input.txt");
    $input = preg_split('/\r\n|\r|\n/', $contents);
    $total = 0;

    foreach ($input as $line) {
        $characters = str_split($line);
        // var_dump($characters); 
        $digits = array_values(array_filter($characters, "is_numeric"));
        // $digits = array_values($digits);
        // $digits = array_values(array_filter($characters, fn (string $character) => is_numeric($character)));
        // $var = preg_match_all('/\d/', $line, $matches);
        // echo $b;

        $length = count($digits);
        $firstNumber = $digits[0];
        $lastNumber = $digits[$length - 1];
        $total += $firstNumber . $lastNumber;
    }

    return $total;
}

echo part1();

?>