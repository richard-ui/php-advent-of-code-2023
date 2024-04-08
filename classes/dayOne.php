<?php

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

        public function __construct() {
            $this->total = $total;
        }

        public function getPart1() {
            $total = $this->total;
            $input = $this->getInput();
            $part = "part1";

            foreach ($input as $line) {
                // Get digits in numeric and word form.
                $numbers = $this->calculateTotal($total, '/\d/', $line, $part);
                
                $totalValue = $numbers[0] . $numbers[1];
                $total += intval($totalValue); // Convert to integer.
            }
            return $total;
        }

        public function getPart2() {
            $total = $this->total;
            $input = $this->getInput();
            $part = "part2";

            foreach ($input as $line) {
                // Get digits in numeric and word form.
                $numbers = $this->calculateTotal($total, '/(?=(\d|one|two|three|four|five|six|seven|eight|nine))/', $line, $part);

                $totalValue = strval($numbers[0]) . strval($numbers[1]); // Concatenate 2 digits as string.
                $total += intval($totalValue); // Convert to integer.
            }
            return $total;
        }

        public function calculateTotal($total, $pattern, $line, $part) {
            $lettersNumbers = [
                'one' => 1,
                'two' => 2,
                'three' => 3,
                'four' => 4,
                'five' => 5,
                'six' => 6,
                'seven' => 7,
                'eight' => 8,
                'nine' => 9,
            ];
            preg_match_all($pattern, $line, $matches);
    
            if($part === "part1"){
                $firstNumber = $matches[0][0];
                $lastNumber  = end($matches[0]);
            } else {
                $firstNumber = $lettersNumbers[$matches[1][0]] ?? $matches[1][0];
                $lastNumber  = $lettersNumbers[end($matches[1])] ?? end($matches[1]);
            }
            return [$firstNumber, $lastNumber];
        }
    }
?>