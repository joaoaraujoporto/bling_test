<?php

require_once("./quicksort.php");

// void quicksort(int *A, int p, int r);
// int partition(int *A, int p, int r);
// void exchange(int *A, int i, int j);

function quicksort_decrescent(&$A, $p = 0, $r = null) {
    // print_r($A);exit();
    if (is_null($r)) {
        $r = sizeof($A) - 1;
    }

    if ($p < $r) {
            $q = partition_decrescent($A, $p, $r);
            quicksort_decrescent($A, $p, $q);
            quicksort_decrescent($A, $q+1, $r);
    }
}
                                
function partition_decrescent(&$A, $p, $r) {
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
       	
       	if ($i > $j) exchange($A, $i, $j);
       	else return $j;
	}
}
