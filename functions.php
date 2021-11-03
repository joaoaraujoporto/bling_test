<?php

/**
 * Find the minimum value of an integer array.
 * @param array $array Is the array with integer values.
 * @return int The minimum value of the gived array.
 */
function get_min_value($array) {
    $array = quicksort($array);
    $min_value = $array[0];
    return $min_value;
}

/**
 * Find the maximum value of an integer array.
 * @param array $array Is the array with integer values.
 * @return int The maximum value of the gived array.
 */
function get_max_value($array) {
    $array = quicksort_decrescent($array);
    $max_value = $array[0];
    return $max_value;
}

/**
 * Rotate a array to right based on a given offset.
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

/**
 * Extract the even values of a gived integer array.
 * @param array $array Is the array with integer values.
 * @return array An array containing the even values from the gived array.
 */
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

/**
 * Extract the odd values of a gived integer array.
 * @param array $array Is the array with integer values.
 * @return array An array containing the odd values from the gived array.
 */
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

/**
 * Sort the values of an integer array with the evens
 * sorted crescently and the odds sorted decrescently.
 * @param array $array Is the array with integer values.
 * @return array An array containing the evens sorted crescently and the odds sorted decrescently.
 */
function sort_even_crescent_odd_decrescent($array) {
    $evens = extract_evens($array);
    $odds = extract_odds($array);
    $sorted_evens = quicksort($evens);
    $sorted_odds = quicksort_decrescent($odds);
    $sorted_even_crescent_odd_decrescent = array_merge($sorted_evens, $sorted_odds);
    return $sorted_even_crescent_odd_decrescent;
}

/**
 * Combine the n elements of a gived array taken 2 at a time.
 * @param array $array Is the array with the elements values.
 * @return array An array of arrays where each array is a combination of 2 elements from the gived array.
 */
function combine2($array) {
    $combinations = [];
    $array_last_index = sizeof($array) - 1;

    for ($i = 0; $i < $array_last_index; $i++) {
        for ($j = $i + 1; $j <= $array_last_index; $j++) {
            $combinations[] = [$array[$i], $array[$j]];
        }
    }

    return $combinations;
}

/**
 * Combine the n elements of a gived array taken p at a time.
 * @param array $array Is the array with the elements values.
 * @param array $p Is the number of elements to be taked at a time.
 * @return array An array of arrays where each array is a combination of p elements from the gived array.
 */
function combine($array, $p) {
    if ($p === 2) {
        return combine2($array);
    }

    $combinations = [];
    $array_last_index = sizeof($array) - 1;

    for ($i = 0; $i <= (sizeof($array) - $p); $i++) {
        $array2 = array_slice($array, $i+1, $array_last_index);
        $subcombs = combine($array2, $p-1);

        foreach ($subcombs as $subcomb) {
            array_unshift($subcomb, $array[$i]);
            $combinations[] = $subcomb;
        }
    }

    return $combinations;
}

/**
 * Find the number of triangles and the triangles that could be formed with a gived array of measurements.
 * @param array $array Is the array with the measurements.
 * @return array An array where the first element is the number of triangles and the second element is the triangles.
 */
function get_triangles($array) {
    $triangles = [];
    if (sizeof($array) < 3) {
        return $triangles;
    }

    $combinations = combine($array, 3);
    foreach($combinations as $combination) {
        $sorted_comb = quicksort($combination);
        $comb_is_triangle = $sorted_comb[0] + $sorted_comb[1] > $sorted_comb[2];

        if ($comb_is_triangle) {
            $triangles[] = $combination;
        }
    }

    $num_triangles = sizeof($triangles);
    return ["num_triangles" => $num_triangles, "triangles" => $triangles];
}

/**
 * Check if a gived string contains a gived substring.
 * @param string $string Is the string that could contains the substring.
 * @param string $substring Is the substring that could be contained in the string.
 * @return boolean True if the substring is contained and false otherwise.
 */
function contains($string, $substring) {
    $string = str_split($string);
    $substring = str_split($substring);

    for ($i = 0; $i < sizeof($string); $i++) {
        if ((sizeof($string) - $i) < sizeof($substring)) {
            break;
        }
        
        for ($j = 0; $j < sizeof($substring); $j++) {
            if ($substring[$j] !== $string[$i + $j]) {
                break;
            }
        }

        if ($j === sizeof($substring)) {
            return true;
        }
    }

    return false;
}