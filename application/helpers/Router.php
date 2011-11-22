<?php
include 'Route.php';
class Router {
  var $routing_table;
  var $template_engine;
  
  function __construct($routing_table,$template_engine){
    $this->routing_table = $routing_table;
    $this->template_engine= $template_engine;
  }
  private function getRoute($entrypoint){
    $route_info = $this->routing_table[$entrypoint];
    $route=  new Route($route_info);
    return $route;
  }
  
  public function dispatch($entrypoint){
    $route= $this->getRoute($entrypoint);  
    $view_path = $route->getView();
    $model_path = $route->getModel();
    $model_class_name = $route->getModelClassName();
    $widgets = $route->getWidgets();
    if(file_exists($view_path) && file_exists($model_path)){
      $view_template = file_get_contents($view_path);
      include($model_path);
      $page = new $model_class_name($_REQUEST);
      if(!$page){
        $page = new Page($_REQUEST);
      }
      $page_data = $page->getData();
      $page_data["widgets"]= array();
      foreach($widgets as $widget_name=>$widget_path ){
        if(file_exists($widget_path)){
          include_once($widget_path);
          $widget = new $widget_name($_REQUEST);
          if(!$widget){
            continue;
          }
          $page_data["widgets"][strtolower($widget_name)]= $widget->getData();
        }
      }
      if(empty($page_data["widgets"])){
        unset($page_data["widgets"]);
      }   
      echo $this->template_engine->render($view_template,$page_data);
    }else{
      header("HTTP/1.0 404 Not Found");
      exit;
    }
    
  }
}

?>