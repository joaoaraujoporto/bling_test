<?php

require_once("../autoload.php");

use component\Element;
use component\Composite;

$element_1 = new Element(1);
$element_2 = new Element(2);
$element_3 = new Element(3);
$element_4 = new Element(4);
$element_5 = new Element(5);
$element_6 = new Element(6);
$composite_1 = new Composite();
$composite_2 = new Composite();
$composite_1->add_component($element_1);
$composite_1->add_component($element_2);
$composite_1->add_component($element_3);
$composite_1->add_component($element_4);
$composite_1->add_component($element_5);
$composite_2->add_component($element_6);
$composite_1->add_component($composite_2);
$composite_iterator = $composite_1->getIterator();
foreach ($composite_1 as $element) {
    print_r($element);
}