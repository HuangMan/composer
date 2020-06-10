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
      // 判断是否是单例对象
      if (isset($this->instance[$name])) {
        // 返回单例对象
        return $this->instance[$name];
      }
        //  获取回调函数
        $closure = $this->getClosure($name);
        // dd($closure);
         
        $instance = $this->bulid($closure);
        // dump($instance);
        // 是否生成单例   true为生成单例    false为不生成单例
        if ($this->budling[$name]['force'] == true) {
          $this->instance[$name] = $instance;
        }
       
        return $instance;
        
    }
      //  建立服务对象
    protected function bulid($name){
      // dd($name());
      // 返回对象并传入当前类
       return $name($this);
    }
      // 获取生成对象的回调函数
    protected function getClosure($closure){
      // 如果容器存在，则返回回调函数，否则返回传入的值
      return isset($this->budling[$closure])?$this->budling[$closure]["closure"]:$closure;
    }
  }