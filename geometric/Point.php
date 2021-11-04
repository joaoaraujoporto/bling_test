<?php

namespace geometric;

/**
 * This class provides a geometric point.
 */
class Point {
    public $x;
    public $y;

    /**
     * Create a point.
     * @param float $x Is the x coordinate of the point.
     * @param float $y Is the y coordinate of the point.
     * @return Point The created point.
     */
    public function __construct(float $x, float $y) {
        $this->x = $x;
        $this->y = $y;
    }
}
