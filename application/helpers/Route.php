<?php
class Route{
  var $model;
  var $view;
  
  function __construct($route_array=array()){
    if(!isset($route_array["model"])|| !isset($route_array["view"])){
      header("HTTP/1.0 404 Not Found");
      exit;
    }else{    
      $this->model = "model/".$route_array["model"];
      $this->view = "view/".$route_array["view"];
    }
  }
  
  public function getModel(){
    return $this->model;
  }
  
  public function getView(){
    return $this->view;
  }
}
?>