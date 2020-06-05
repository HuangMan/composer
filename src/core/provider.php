<?php

namespace hd\composer\core;

abstract class Provider
{
  // 设置默认defer属性值为false，即为不立即注册
  protected $defer = false;
  protected $app;
  abstract public function register(APP $app);
  public function __construct(APP $app){
    $this->app = $app;
  }

  

}
