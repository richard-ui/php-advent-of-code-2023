<?php
    require_once("classes/dayOne.php");

    echo "Welcome to Day One - Advents of Code!\n";

    $input = new InputList("input.txt");
    echo "Part 1: " . $input->getPart1() . "\n";
    echo "Part 2: " . $input->getPart2();
?>