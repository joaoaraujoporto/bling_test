<?php

require_once("../autoload.php");

use useful\general\UsefulFunction;

$input_array = $argv[1];
$input_array = explode(",", $input_array);
$input_array = array_map(fn($x) => intval($x), $input_array);

print_r(UsefulFunction::get_triangles($input_array));