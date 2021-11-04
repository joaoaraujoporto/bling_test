<?php

/**
 * This class provides a graph to be used as a data structure and useful methods to this kind
 * of data structure.
 */
class Graph {
    public $vertices;

    /**
     * Create a graph.
     * @return Graph The created graph.
     */
    public function __construct() {
        $this->vertices = [];
    }

    /**
     * Add a vertice to the graph.
     * @param mixed $value Is an optional value to be associated with the link.
     * @return Vertice The added vertice.
     */
    public function add_vertice($value = null) {
        $vertice = new Vertice($value);
        $this->vertices[$vertice->id] = $vertice;
        return $vertice;
    }

    /**
     * Remove a vertice from the graph.
     * @param int $vertice_id Is the id of the vertice to be removed.
     */
    public function rmv_vertice($vertice_id) {
        unset($this->vertices[$vertice_id]);
    }

    /**
     * Add a link between two vertices in the graph.
     * @param Vertice $vertice_1 Is the first vertice to be linked.
     * @param Vertice $vertice_2 Is the second vertice to be linked.
     */
    public function add_link(Vertice $vertice_1, Vertice $vertice_2) {
        $link = new Link($vertice_1, $vertice_2);
        $this->links[$link->id] = $link;
    }

    /**
     * Remove a link between two vertices in the graph.
     * @param Vertice $vertice_1 Is the first vertice linked.
     * @param Vertice $vertice_2 Is the second vertice linked.
     */
    public function rmv_link(Vertice $vertice_1, Vertice $vertice_2) {
        $link_id = Link::get_link_id($vertice_1, $vertice_2);
        unset($this->links[$link_id]);
    }

    /**
     * Find the possible paths between two vertices in the graph.
     * @param Vertice $start_vertice Is the vertice where the path starts.
     * @param Vertice $end_vertice Is the vertice where the path ends.
     * @param Vertice $original_start_vertice Is the original vertice where the path starts.
     * @param Vertice $irrelevant_neighbor Is a vertice that must not be traversed.
     * @return array An array of arrays where each array is a path from $start_vertice to the $end_vertice.
     */
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

    /**
     * Find the possible paths between two vertices in the graph.
     * @param Vertice $start_vertice Is the vertice where the path starts.
     * @param Vertice $end_vertice Is the vertice where the path ends.
     * @return array An array of arrays where each array is a path from $start_vertice to the $end_vertice.
     */
    public function get_paths_between_vertices(Vertice $start_vertice, Vertice $end_vertice) {
        return $this->_get_paths_between_vertices($start_vertice, $end_vertice, $start_vertice);
    }
}