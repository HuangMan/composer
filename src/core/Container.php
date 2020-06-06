<?php

  namespace hd\composer\core;
//    容器类
  abstract class Container{
      protected $budling = [];
    
    public function bind($name,$value){
       $this->budling[$name] = compact($value);
    }
  }