<?php

namespace useful\sort;

use useful\general\UsefulFunction;

/**
 * This class provides sorting based on the quicksort algorithm.
 */
class Quicksort {
    /**
     * Essa implementação de quicksort foi baseada em uma implementação de quicksort em C que fiz
     * em uma das disciplinas da graduação.
     */
    public static function sort($A, $p = 0, $r = null) {
        if (is_null($r)) {
            $r = sizeof($A) - 1;
        }

        if ($p < $r) {
            list($A, $q) = Quicksort::partition($A, $p, $r);
            $A = Quicksort::sort($A, $p, $q);
            $A = Quicksort::sort($A, $q+1, $r);
        }

        return $A;
    }
                                    
    private static function partition($A, $p, $r) {
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
                $A = UsefulFunction::exchange($A, $i, $j);
            } else {
                return [$A, $j];
            }
        }
    }

    public static function sort_decrescent($A, $p = 0, $r = null) {
        if (is_null($r)) {
            $r = sizeof($A) - 1;
        }
    
        if ($p < $r) {
                list($A, $q) = Quicksort::partition_decrescent($A, $p, $r);
                $A = Quicksort::sort_decrescent($A, $p, $q);
                $A = Quicksort::sort_decrescent($A, $q+1, $r);
        }
    
        return $A;
    }
                                    
    public static function partition_decrescent($A, $p, $r) {
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
                $A = UsefulFunction::exchange($A, $i, $j);
            } else {
                return [$A, $j];
            }
        }
    }
}