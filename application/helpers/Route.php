<?php
class Route{
  var $model;
  var $view;
  var $modelClass;
  var $widgets;
  function __construct($route_array=array()){
    if(!isset($route_array["model"])|| !isset($route_array["view"])){
      header("HTTP/1.0 404 Not Found");
      exit;
    }else{    
      $this->model = "model/".$route_array["model"];
      $this->view = "view/".$route_array["view"];
      $this->widgets = array();
      
      foreach($route_array["widgets"] as $widget_path){
        $widget_name_arr = explode("/",$widget_path);
        $widget_name = $widget_name_arr[count($widget_name_arr)-1];
        $widget_name = explode(".",$widget_name);
        $widget_name = $widget_name[0];    
        $this->widgets[$widget_name] = "widgets/".$widget_path;        
      }
      
      $model_class_name_arr= explode(".",$route_array["model"]);
      $this->modelClass=$model_class_name_arr[0];
    }
  }
  
  public function getModel(){
    return $this->model;
  }
  
  public function getView(){
    return $this->view;
  }
  
  public function getModelClassName(){
    return $this->modelClass;
  }
  
  public function getWidgets(){
    return $this->widgets;
  }
}
?>