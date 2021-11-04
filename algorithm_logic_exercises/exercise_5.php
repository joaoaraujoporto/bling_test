<?php

require_once("../autoload.php");

use useful\general\UsefulFunction;

$string = $argv[1];
$substring = $argv[2];
print_r(UsefulFunction::contains($string, $substring));