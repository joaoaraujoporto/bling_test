<?php

require_once("./quicksort.php");

function quicksort_decrescent($A, $p = 0, $r = null) {
    if (is_null($r)) {
        $r = sizeof($A) - 1;
    }

    if ($p < $r) {
            list($A, $q) = partition_decrescent($A, $p, $r);
            $A = quicksort_decrescent($A, $p, $q);
            $A = quicksort_decrescent($A, $q+1, $r);
    }

    return $A;
}
                                
function partition_decrescent($A, $p, $r) {
    $x = $A[$p];
    $i = $p-1;
    $j = $r+1;
    while (1) {
    	do {
        	$j = $j-1;
        } while ($A[$j] < $x);
        
        do {
        	$i = $i+1;
       	} while ($A[$i] > $x);
       	
       	if ($i < $j) {
            $A = exchange($A, $i, $j);
        } else {
            return [$A, $j];
        }
	}
}
