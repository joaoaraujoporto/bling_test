<?php

namespace component;

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
    
    public function getIterator(): \Iterator {
        return new CompositeIterator($this);
    }
}