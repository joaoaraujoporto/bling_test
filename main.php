<?php

require_once("./quicksort.php");
require_once("./quicksort_decrescent.php");
require_once("./geo.php");
require_once("./functions.php");
require_once("./graph.php");
require_once("./component.php");
require_once("./Date.php");
require_once("./functions.php");

print_r(rotate_to_right([1,2,3,4,5,6], 2));
print_r(sort_even_crescent_odd_decrescent([6,5,4,3,2,1]));
print_r(Date::calc_date_diff_in_days("03/04/1998", "27/10/2021"));
print_r(Date::calc_date_diff_in_days("03/04/1998", "27/10/1998"));
print_r(Date::calc_date_diff_in_days("27/10/2021", "03/04/1998"));
print_r(combine2([1,2,3,4,5,6]));
print_r(combine([1,2,3,4,5,6], 3));
print_r(get_triangles([1,2,3,4]));
print_r(get_triangles([1,2,3,4,5,6]));
print_r(contains("amarelo", "amak"));
print_r(contains("amarelo", "amar"));
print_r(contains("amarelo", "amaro"));
print_r(contains("amarelo", "o"));
print_r(contains("amarelo", "b"));
$rectangle_1 = new Rectangle(new Point(1,1), new Point(3,3));
$rectangle_2 = new Rectangle(new Point(2,2), new Point(4,4));
print_r($rectangle_1->get_overlap_area($rectangle_2));
$rectangle_1 = new Rectangle(new Point(5,1), new Point(7,3));
$rectangle_2 = new Rectangle(new Point(6,-1), new Point(8,2));
print_r($rectangle_1->get_overlap_area($rectangle_2));
$rectangle_1 = new Rectangle(new Point(5,1), new Point(7,3));
$rectangle_2 = new Rectangle(new Point(6,-1), new Point(8,2));
print_r($rectangle_1->get_overlap_area($rectangle_2));


$graph = new Graph();
$vertice_a = $graph->add_vertice("a");
$vertice_b = $graph->add_vertice("b");
$vertice_c = $graph->add_vertice("c");
$vertice_d = $graph->add_vertice("d");
$vertice_e = $graph->add_vertice("e");
$vertice_f = $graph->add_vertice("f");
$vertice_g = $graph->add_vertice("g");
$vertice_h = $graph->add_vertice("h");
$graph->add_link($vertice_a, $vertice_b);
$graph->add_link($vertice_a, $vertice_e);
$graph->add_link($vertice_a, $vertice_h);
$graph->add_link($vertice_b, $vertice_c);
$graph->add_link($vertice_b, $vertice_d);
$graph->add_link($vertice_c, $vertice_d);
$graph->add_link($vertice_c, $vertice_e);
$graph->add_link($vertice_d, $vertice_g);
$graph->add_link($vertice_e, $vertice_f);
$graph->add_link($vertice_g, $vertice_h);
$paths = $graph->get_paths_between_vertices($vertice_a, $vertice_c);
$paths = array_map(function($path) {
        $path = array_map(function($vertice) {
            return $vertice->value;
        }, $path);
    return $path;
}, $paths);
print_r($paths);


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