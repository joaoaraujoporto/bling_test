<?php

namespace component;

/**
 * This class provides a external iterator to the Element class.
 */
class ElementIterator implements \Iterator {
    private $position;
    private $element;

    /**
     * Create a ElementIterator based on a given element.
     * @param Element $composite Is the element to be iterated.
     * @return ElementIterator The created ElementIterator.
     */
    public function __construct(Element $element) {
        $this->position = 0;
        $this->element = $element;
    }

    function current() {
        if ($this->position === 0) {
            return $this->element;
        }
        return null;
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
        return $this->position === 0;
    }
}