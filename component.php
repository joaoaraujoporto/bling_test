<?php

/**
 * This abstract class provides a component.
 */
abstract class Component implements IteratorAggregate {
    abstract public function getIterator(): Iterator;
}

/**
 * This class provides a composite.
 */
class Composite extends Component {
    public $components;

    /**
     * Create a composite.
     * @return Composite The created composite.
     */
    public function __construct() {
        $this->components = [];
    }

    /**
     * Add a component to the composite.
     * @param Component $component Is the component to be added.
     */
    public function add_component(Component $component) {
        $this->components[] = $component;
    }
    
    public function getIterator(): Iterator {
        return new CompositeIterator($this);
    }
}

/**
 * This class provides a element.
 */
class Element extends Component {
    public $value;

    /**
     * Create a element.
     * @param mixed $value Is the value of the element.
     * @return Element The created element.
     */
    public function __construct($value) {
        $this->value = $value;
    }

    public function getIterator(): Iterator {
        return new ElementIterator($this);
    }
}

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

/**
 * This class provides a external iterator to the Element class.
 */
class ElementIterator implements Iterator {
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