<?php

namespace graph;

class Link {
    public $id;
    public $vertice_1;
    public $vertice_2;
    public $value;

    /**
     * Create a link between two vertices.
     * @param Vertice $vertice_1 Is the first vertice to be linked.
     * @param Vertice $vertice_2 Is the second vertice to be linked.
     * @param mixed $value Is an optional value to be associated with the link.
     * @return Link The created link.
     */
    public function __construct(Vertice $vertice_1, Vertice $vertice_2, $value = null) {
        $this->id = Link::get_link_id($vertice_1, $vertice_2);
        $this->value = $value;
        $this->vertice_1 = $vertice_1;
        $this->vertice_2 = $vertice_2;

        $this->link_vertices();
    }

    /**
     * Destruct the link.
     */
    public function __destruct() {
        $this->unlink_vertices();
    }

    /**
     * Provide the id of a link based on the two vertices linked.
     * @param Vertice $vertice_1 Is the first vertice linked.
     * @param Vertice $vertice_2 Is the second vertice linked.
     * @return int The id of the link.
     */
    public static function get_link_id($vertice_1, $vertice_2) {
        $link_id = $vertice_1->id . $vertice_2->id;
        return $link_id;
    }

    /**
     * Link the two vertices together.
     */
    private function link_vertices() {
        $this->vertice_1->add_neighbor($this->vertice_2);
        $this->vertice_2->add_neighbor($this->vertice_1);
    }

    /**
     * Unlink the two vertices from each other.
     */
    private function unlink_vertices() {
        $this->vertice_1->rmv_neighbor($this->vertice_2);
        $this->vertice_2->rmv_neighbor($this->vertice_1);
    }
}