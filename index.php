<?php

    echo "Welcome to Day One - Advents of Code!\n";

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

            foreach ($input as $line) {
                $total = $this->calculateTotal($total, $line);
            }

            return $total;
        }

        public function getPart2() {
            $total = $this->total;
            $input = $this->getInput();

            $wordNumbers = [
                'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'
            ];

            foreach ($input as $line) {
                $characters = str_split($line);
                $newLine = '';
                
                foreach ($characters as $character) {// get first character
                    // echo $character;// two1nine
                    $newLine .= $character;
        
                    foreach ($wordNumbers as $index => $word) {
                        // echo $index + 1 . $character . "\n";
                        // echo $newLine . "\n";
                        // exit();
                        // $searchVal, $replaceVal, $subjectVal.
                        $newLine = str_replace($word, $index + 1 . $character, $newLine);// two 2
                        // echo $newLine . "\n"; // t two matches two then it will stop and go to next one.
                    }
                    // echo $newLine . "\n";
                }
                // echo $newLine; // 2o19e. extract 1 and last numbers from this - 29
                // exit();
                $total = $this->calculateTotal($total, $newLine);
            }
            return $total;
        }

        public function calculateTotal($total, $newLine){
            $characters = str_split($newLine); 
            $digits = array_values(array_filter($characters, "is_numeric"));
    
            $length = count($digits);
            $firstNumber = $digits[0];
            $lastNumber = $digits[$length - 1];
            $total += $firstNumber . $lastNumber;
            return $total;
        }
    }

    $input = new InputList("input.txt");
    echo "Part 1: " . $input->getPart1() . "\n";
    echo "Part 2: " . $input->getPart2();
?>