<?php
$root = dirname(__FILE__) . "/../..";

include_once "$root/controller/PersonController.php";

$controller = new PersonController();
$controller->invoke();

