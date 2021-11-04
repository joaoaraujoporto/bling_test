<?php

require_once("../autoload.php");

use graph\Graph;

$vertices = $argv[1];
$vertices = explode(",", $vertices);
$graph = new Graph();
foreach ($vertices as $vertice) {
    $graph->add_vertice($vertice);
}

$links = $argv[2];
$links = explode("/", $links);
foreach ($links as $link) {
    $vertices = explode(",", $link);
    $vertice_1 = null;
    $vertice_2 = null;

    foreach ($graph->vertices as $vertice) {
        if ($vertice->value === $vertices[0]) {
            $vertice_1 = $vertice;
            break;
        }
    }
    
    foreach ($graph->vertices as $vertice) {
        if ($vertice->value === $vertices[1]) {
            $vertice_2 = $vertice;
            break;
        }
    }

    if (!is_null($vertice_1) && !is_null($vertice_2)) {
        $graph->add_link($vertice_1, $vertice_2);
    }
}

$path_vertices = $argv[3];
$path_vertices = explode(",", $path_vertices);
$start_vertice = null;
$end_vertice = null;
foreach ($graph->vertices as $vertice) {
    if ($vertice->value === $path_vertices[0]) {
        $start_vertice = $vertice;
        break;
    }
}

foreach ($graph->vertices as $vertice) {
    if ($vertice->value === $path_vertices[1]) {
        $end_vertice = $vertice;
        break;
    }
}

if (!is_null($start_vertice) && !is_null($end_vertice)) {
    $paths = $graph->get_paths_between_vertices($start_vertice, $end_vertice);
    $paths = array_map(function($path) {
            $path = array_map(function($vertice) {
                return $vertice->value;
            }, $path);
        return $path;
    }, $paths);
    print_r($paths);
}