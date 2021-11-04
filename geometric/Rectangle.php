<?php

namespace geometric;

use useful\general\UsefulFunction;

/**
 * This class provides a geometric rectangle.
 */
class Rectangle {
    public $bottom_left_point;
    public $top_right_point;

    /**
     * Create a rectangle.
     * @param Point $bottom_left_point Is the point of the lower left corner of the rectangle.
     * @param Point $top_right_point Is the point of the upper right corner of the rectangle.
     * @return Rectangle The created rectangle.
     */
    public function __construct(Point $bottom_left_point, Point $top_right_point) {
        if (!Rectangle::validate_points_as_rectangle($bottom_left_point, $top_right_point)) {
            throw new \Exception("Points do not form a rectangle");
        }

        $this->bottom_left_point = $bottom_left_point;
        $this->top_right_point = $top_right_point;
    }

    /**
     * Check if two points could be form a rectangle.
     * @param Point $bottom_left_point Is the point of the lower left corner of the rectangle.
     * @param Point $top_right_point Is the point of the upper right corner of the rectangle.
     * @return bool True if the points forms a rectangle and false otherwise.
     */
    public static function validate_points_as_rectangle(Point $bottom_left_point, Point $top_right_point) {
        $valid_width = $bottom_left_point->x < $top_right_point->x;
        $valid_height = $bottom_left_point->y < $top_right_point->y;
        
        if ($valid_width && $valid_height) {
            return true;
        }
        
        return false;
    }

    /**
     * Provide the width of the rectangle.
     * @return float The width of the rectangle.
     */
    function get_width() {
        $width = $this->top_right_point->x - $this->bottom_left_point->x;
        return $width;
    }

    /**
     * Provide the height of the rectangle.
     * @return float The height of the rectangle.
     */
    function get_height() {
        $height = $this->top_right_point->y - $this->bottom_left_point->y;
        return $height;
    }

    /**
     * Provide the area of the rectangle.
     * @return float The area of the rectangle.
     */
    public function get_area() {
        $area = $this->get_width() * $this->get_height();
        return $area;
    }

    /**
     * Provide the overlap rectangle formed by the rectangle and another rectangle.
     * @param Rectangle $another_rectangle Is the another rectangle.
     * @return Rectangle The overlap rectangle formed.
     */
    public function get_overlap_rectangle($another_rectangle) {
        $overlap_rect_top_right_point_x = UsefulFunction::get_min_value([$this->top_right_point->x, $another_rectangle->top_right_point->x]);
        $overlap_rect_top_right_point_y = UsefulFunction::get_min_value([$this->top_right_point->y, $another_rectangle->top_right_point->y]);
        
        $overlap_rect_bottom_left_point_x = UsefulFunction::get_max_value([$this->bottom_left_point->x, $another_rectangle->bottom_left_point->x]);
        $overlap_rect_bottom_left_point_y = UsefulFunction::get_max_value([$this->bottom_left_point->y, $another_rectangle->bottom_left_point->y]);
        
        $overlap_rect_top_right_point = new Point($overlap_rect_top_right_point_x, $overlap_rect_top_right_point_y);
        $overlap_rect_bottom_left_point = new Point($overlap_rect_bottom_left_point_x, $overlap_rect_bottom_left_point_y);

        try {
            $overlap_rectangle = new Rectangle($overlap_rect_bottom_left_point, $overlap_rect_top_right_point);
            return $overlap_rectangle;
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * Provide the overlap area formed by the rectangle and another rectangle.
     * @param Rectangle $another_rectangle Is the another rectangle.
     * @return flaot The overlap area formed.
     */
    public function get_overlap_area($another_rectangle) {
        $overlap_rectangle = $this->get_overlap_rectangle($another_rectangle);
        $overlap_rectangle_exists = !is_null($overlap_rectangle);
        
        if ($overlap_rectangle_exists) {
            $overlap_area = $overlap_rectangle->get_area();
        } else {
            $overlap_area = 0;
        }

        return $overlap_area;
    }
}