<?php

abstract class Component implements IteratorAggregate {
    abstract public function getIterator(): Iterator;
}

class Composite extends Component {
    public $components;

    public function __construct() {
        $this->components = [];
    }

    public function add_component(Component $component) {
        $this->components[] = $component;
    }

    public function getIterator(): Iterator {
        return new CompositeIterator($this);
    }
}

class Element extends Component {
    public $value;

    public function __construct($value) {
        $this->value = $value;
    }

    public function getIterator(): Iterator {
        return new ElementIterator($this);
    }
}

class CompositeIterator implements Iterator {
    private $position;
    private $elements;

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

class ElementIterator implements Iterator {
    private $position;
    private $element;

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