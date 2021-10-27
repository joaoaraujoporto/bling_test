<?php

// void quicksort(int *A, int p, int r);
// int partition(int *A, int p, int r);
// void exchange(int *A, int i, int j);

function quicksort($A, $p = 0, $r = null) {
    if (is_null($r)) {
        $r = sizeof($A) - 1;
    }

    if ($p < $r) {
        list($A, $q) = partition($A, $p, $r);
        $A = quicksort($A, $p, $q);
        $A = quicksort($A, $q+1, $r);
    }

    return $A;
}
                                
function partition($A, $p, $r) {
    $x = $A[$p];
    $i = $p-1;
    $j = $r+1;
    while (1) {
    	do {
        	$j = $j-1;
        } while ($A[$j] > $x);
        
        do {
        	$i = $i+1;
       	} while ($A[$i] < $x);
       	
       	if ($i < $j) {
            $A = exchange($A, $i, $j);
        } else {
            return [$A, $j];
        }
	}
}

function exchange($A, $i, $j) {
    $aux = $A[$i];
    $A[$i] = $A[$j];
    $A[$j] = $aux;
    return $A;
}
