<?php

  namespace hd\composer\core;
//    容器类
  abstract class Container{
      //  容器集合
      protected $budling = [];
      // 单例对象集合
      protected $instance = [];
    // 通过注册的方法，将服务绑定到容器中
    public function bind($name,$closure,$force = false){
      // dd($name);
       $this->budling[$name] = compact('closure','force');
      //  dump($this->budling[$name]);
    }

    protected function make($name){
      if (isset($this->instance[$name])) {
        return $this->instance[$name];
      }

        $closure = $this->getClosure($name);
        // dd($closure);
        $instance = $this->bulid($closure);
        dump($instance);
        // 是否生成单例   true为生成单例    false为不生成单例
        if ($this->budling[$name]['force'] == true) {
          $this->instance[$name] = $instance;
        }
       
        return $instance;
        
    }

    protected function bulid($name){
      // dd($name());
       return $name($this);
    }

    protected function getClosure($closure){
      return isset($this->budling[$closure])?$this->budling[$closure]["closure"]:$closure;
    }
  }