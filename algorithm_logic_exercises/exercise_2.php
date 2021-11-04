<?php

require_once("../functions.php");

$input_array = $argv[1];
$input_array = explode(",", $input_array);
$input_array = array_map(fn($x) => intval($x), $input_array);
// var_dump($input_array);die;
print_r(sort_even_crescent_odd_decrescent($input_array));