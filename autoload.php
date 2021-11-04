<?php

spl_autoload_register(function ($classname) {
    $classname = dirname(__FILE__)."/".str_replace("\\", "/", $classname).".php";
    require_once($classname);
});