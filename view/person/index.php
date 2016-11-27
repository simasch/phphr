<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/hr";

include_once "$root/controller/PersonController.php";

$controller = new PersonController();
$controller->invoke();

