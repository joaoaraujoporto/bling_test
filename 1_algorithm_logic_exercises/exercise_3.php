<?php

require_once("../autoload.php");

use useful\date\Date;

$initial_date = $argv[1];
$final_date = $argv[2];

print_r(Date::calc_date_diff_in_days($initial_date, $final_date));