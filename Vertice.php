<?php

/**
 * This class provides a vertice to be used with a Graph.
 */
class Vertice {
    public $id;
    public $value;
    public $neighbors;

    /**
     * Create a vertice.
     * @param mixed $value Is an optional value to be associated with the vertice.
     * @return Vertice The created vertice.
     */
    public function __construct($value = null) {
        $this->id = uniqid();
        $this->value = $value;
    }

    /**
     * Add neighbor to the vertice.
     * @param Vertice $neighbor Is the neighbor vertice to be added.
     */
    public function add_neighbor($neighbor) {
        $this->neighbors[$neighbor->id] = $neighbor;
    }

    /**
     * Remove a neighbor of the vertice.
     * @param Vertice $neighbor Is the neighbor vertice to be removed.
     */
    public function rmv_neighbor($neighbor) {
        unset($this->neighbors[$neighbor->id]);
    }
}