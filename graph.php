<?php

class Vertice {
    public $id;
    public $value;
    public $neighbors;

    public function __construct($value) {
        $this->id = uniqid();
        $this->value = $value;
    }

    public function add_neighbor($neighbor) {
        $this->neighbors[$neighbor->id] = $neighbor;
    }

    public function rmv_neighbor($neighbor) {
        unset($this->neighbors[$neighbor->id]);
    }
}

class Link {
    public $id;
    public $vertice_1;
    public $vertice_2;
    public $value;

    public function __construct($vertice_1, $vertice_2, $value = null) {
        $this->id = Link::get_link_id($vertice_1, $vertice_2);
        $this->value = $value;
        $this->vertice_1 = $vertice_1;
        $this->vertice_2 = $vertice_2;

        $this->link_vertices();
    }

    public function __destruct() {
        $this->unlink_vertices();
    }

    public static function get_link_id($vertice_1, $vertice_2) {
        $link_id = $vertice_1->id . $vertice_2->id;
        return $link_id;
    }

    private function link_vertices() {
        $this->vertice_1->add_neighbor($this->vertice_2);
        $this->vertice_2->add_neighbor($this->vertice_1);
    }

    private function unlink_vertices() {
        $this->vertice_1->rmv_neighbor($this->vertice_2);
        $this->vertice_2->rmv_neighbor($this->vertice_1);
    }
}

class Graph {
    public $vertices;

    public function __construct() {
        $this->vertices = [];
    }

    public function add_vertice($value) {
        $vertice = new Vertice($value);
        $this->vertices[$vertice->id] = $vertice;
        return $vertice;
    }

    public function rmv_vertice($vertice_id) {
        unset($this->vertices[$vertice_id]);
    }

    public function add_link($vertice_1, $vertice_2) {
        $link = new Link($vertice_1, $vertice_2);
        $this->links[$link->id] = $link;
    }

    public function rmv_link($vertice_1, $vertice_2) {
        $link_id = Link::get_link_id($vertice_1, $vertice_2);
        unset($this->links[$link_id]);
    }

    private function _get_paths_between_vertices($start_vertice,
        $end_vertice,
        $original_start_vertice,
        $irrelevant_neighbor = null) {
        $paths = [];
        
        foreach ($start_vertice->neighbors as $start_vertice_neighbor) {
            if ($start_vertice_neighbor->id === $original_start_vertice->id) {
                continue;
            }

            if (!is_null($irrelevant_neighbor) && $start_vertice_neighbor->id === $irrelevant_neighbor->id) {
                continue;
            }

            if ($start_vertice_neighbor->id === $end_vertice->id) {
                $paths[] = [$start_vertice, $end_vertice];
            } else {
                $_paths = $this->_get_paths_between_vertices($start_vertice_neighbor, $end_vertice, $original_start_vertice, $start_vertice);

                foreach ($_paths as $path) {
                    $paths[] = array_merge([$start_vertice], $path);
                }
            }
        }

        return $paths;
    }

    public function get_paths_between_vertices($start_vertice, $end_vertice) {
        return $this->_get_paths_between_vertices($start_vertice, $end_vertice, $start_vertice);
    }

}