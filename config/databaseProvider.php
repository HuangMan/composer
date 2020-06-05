<?php

namespace hd\config;

use hd\composer\core\APP;
use hd\composer\core\Provider;

class databaseProvider extends Provider
 {
    //   设置是否立即注册，true为立即注册，false为不立即注册
    protected $defer = true;
    // 继承抽象父类必须用public声明
    // 实现注册的方法
    public function register(APP $app){
        echo "database register";
    }
     
    public function boot(){
        echo "database boot";
    }

}