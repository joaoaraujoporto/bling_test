<?php

require_once("../autoload.php");

use useful\general\UsefulFunction;

$input_array = $argv[1];
$input_array = explode(",", $input_array);
$input_array = array_map(fn($x) => intval($x), $input_array);
$input_offset = intval($argv[2]);
$direction = intval($argv[3]);

print_r(UsefulFunction::rotate($input_array, $input_offset, $direction));