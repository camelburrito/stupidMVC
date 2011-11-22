<?php

class Widget{
  var $request;
  function __construct($request){
    $this->request= $request;
  }
  
  public function getData(){
    return array();
  }
  
}


?>