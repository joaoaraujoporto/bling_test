<?php

function get_min_value($array) {
    $array = quicksort($array);
    $min_value = $array[0];
    return $min_value;
}

function get_max_value($array) {
    $array = quicksort_decrescent($array);
    $max_value = $array[0];
    return $max_value;
}