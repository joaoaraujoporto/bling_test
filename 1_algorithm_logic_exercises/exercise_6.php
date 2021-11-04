<?php

require_once("../autoload.php");

use geometric\Point;
use geometric\Rectangle;

$rectangle_1 = $argv[1];
$rectangle_1 = explode("/", $rectangle_1);
$rec_1_bottom_left_point = explode(",", $rectangle_1[0]);
$rec_1_bottom_left_point = new Point(intval($rec_1_bottom_left_point[0]), intval($rec_1_bottom_left_point[1]));
$rec_1_top_right_point = explode(",", $rectangle_1[1]);
$rec_1_top_right_point = new Point(intval($rec_1_top_right_point[0]), intval($rec_1_top_right_point[1]));
$rectangle_1 = new Rectangle($rec_1_bottom_left_point, $rec_1_top_right_point);

$rectangle_2 = $argv[2];
$rectangle_2 = explode("/", $rectangle_2);
$rec_2_bottom_left_point = explode(",", $rectangle_2[0]);
$rec_2_bottom_left_point = new Point(intval($rec_2_bottom_left_point[0]), intval($rec_2_bottom_left_point[1]));
$rec_2_top_right_point = explode(",", $rectangle_2[1]);
$rec_2_top_right_point = new Point(intval($rec_2_top_right_point[0]), intval($rec_2_top_right_point[1]));
$rectangle_2 = new Rectangle($rec_2_bottom_left_point, $rec_2_top_right_point);

print_r($rectangle_1->get_overlap_area($rectangle_2));
