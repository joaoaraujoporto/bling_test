<?php

class Date {
    const SECONDS_IN_ONE_YEAR = 31556928;
    const MONTHS_IN_ONE_YEAR = 12;
    const SECONDS_IN_ONE_MONTH = Date::SECONDS_IN_ONE_YEAR / Date::MONTHS_IN_ONE_YEAR;
    const SECONDS_IN_ONE_DAY = 24*60*60;

    static function get_day($date) {
        $date = explode("/", $date);
        $day = $date[0];
        return $day;
    }

    static function get_month($date) {
        $date = explode("/", $date);
        $month = $date[1];
        return $month;
    }

    static function get_year($date) {
        $date = explode("/", $date);
        $year = $date[2];
        return $year;
    }

    static function calc_seconds_since_init($date) {
        $day = Date::get_day($date);
        $month = Date::get_month($date);
        $year = Date::get_year($date);
        $seconds_since_init = $day * Date::SECONDS_IN_ONE_DAY;
        $seconds_since_init += $month * Date::SECONDS_IN_ONE_MONTH;
        $seconds_since_init += $year * Date::SECONDS_IN_ONE_YEAR;
        return $seconds_since_init;
    }

    static function calc_date_diff_in_days($initial_date, $final_date) {
        $init_date_seconds_since_init = Date::calc_seconds_since_init($initial_date);
        $final_date_seconds_since_init = Date::calc_seconds_since_init($final_date);
        $diff_in_seconds = $final_date_seconds_since_init - $init_date_seconds_since_init;
        $diff_in_days = $diff_in_seconds / Date::SECONDS_IN_ONE_DAY;
        $diff_in_days = floor($diff_in_days);
        $diff_in_days = abs($diff_in_days);
        return $diff_in_days;
    }
}