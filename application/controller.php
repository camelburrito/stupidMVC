<?php
  ob_start();
  include_once 'helpers/Mustache.php';
  include_once 'helpers/Router.php';
  include_once 'helpers/Route.php';
  try {
    $entrypoint = $_SERVER['REQUEST_URI'];
    $routing_table_path = "entrypoints.json";
    $routing_table_content = file_get_contents($routing_table_path);
    $routingtable = json_decode($routing_table_content,true);
    $mustache = new Mustache();
    $router = new Router($routingtable,$mustache);         
    $route=$router->dispatch($entrypoint);
  } catch (Exception $e) {
    
  }
ob_flush();  
?>