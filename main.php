<?php

require_once("./quicksort.php");
require_once("./quicksort_decrescent.php");

/**
 * Rotates a array to right based on a given offset.
 * @param array $array to be rotated.
 * @param int $offset to rotate array.
 * @return array the array rotated.
 */
function rotate_to_right($array, $offset) {
    $array_rotated = [];
    $array_size = sizeof($array);

    foreach ($array as $key => $value) {
        $key_rotated = ($key + $offset) % $array_size;
        $array_rotated[$key_rotated] = $value;
    }

    return $array_rotated;
}

function extract_evens($array) {
    $evens = [];
    foreach ($array as $value) {
        $value_is_even = ($value % 2) === 0;
        if ($value_is_even) {
            $evens[] = $value;
        }
    }

    return $evens;
}

function extract_odds($array) {
    $odds = [];
    foreach ($array as $value) {
        $value_is_odd = ($value % 2) !== 0;
        if ($value_is_odd) {
            $odds[] = $value;
        }
    }

    return $odds;
}

function sort_even_crescent_odd_decrescent($array) {
    $evens = extract_evens($array);
    $odds = extract_odds($array);
    $sorted_evens = quicksort($evens);
    $sorted_odds = quicksort_decrescent($odds);
    $sorted_even_crescent_odd_decrescent = array_merge($sorted_evens, $sorted_odds);
    return $sorted_even_crescent_odd_decrescent;
}

// print_r(rotate_to_right([1,2,3,4,5,6], 2));
print_r(sort_even_crescent_odd_decrescent([6,5,4,3,2,1]));