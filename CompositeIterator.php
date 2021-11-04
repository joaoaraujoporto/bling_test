<?php

/**
 * This class provides a external iterator to the Composite class.
 */
class CompositeIterator implements Iterator {
    private $position;
    private $elements;

    /**
     * Create a CompositeIterator based on a given composite.
     * @param Composite $composite Is the composite to be iterated.
     * @return CompositeIterator The created CompositeIterator.
     */
    public function __construct(Composite $composite) {
        $this->position = 0;
        $this->elements = [];

        foreach ($composite->components as $component) {
            foreach ($component as $sub_component) {
                $this->elements[] = $sub_component;
            }
        }
    }

    function current() {
        return $this->elements[$this->position];
    }

    function key() {
        return $this->position;
    }

    function next() {
        $this->position += 1;
    }

    function rewind() {
        $this->position = 0;
    }

    function valid() {
        return isset($this->elements[$this->position]);
    }
}