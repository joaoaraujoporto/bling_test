<?php

namespace component;

/**
 * This abstract class provides a component.
 */
abstract class Component implements \IteratorAggregate {
    abstract public function getIterator(): \Iterator;
}