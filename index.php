<?php

    ini_set('display_errors', 1);
    ini_set('error_reporting', -1);

    if(!class_exists('Controller'))
        require_once 'Controller.php';
    $Controller = new Controller();
    $req = !empty($_REQUEST['q'])
        ? trim($_REQUEST['q'])
        : '';
    $Controller->handleRequest($req);