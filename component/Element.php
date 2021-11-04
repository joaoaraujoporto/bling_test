<?php

namespace component;

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

    public function getIterator(): \Iterator {
        return new ElementIterator($this);
    }
}