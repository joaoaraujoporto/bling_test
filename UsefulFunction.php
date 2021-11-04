<?php

require_once("./autoload.php");

class UsefulFunction {
    public static function exchange($A, $i, $j) {
        $aux = $A[$i];
        $A[$i] = $A[$j];
        $A[$j] = $aux;
        return $A;
    }
}