<?php

namespace hd\config;

use hd\composer\core\APP;
use hd\composer\core\Provider;

class DatabaseProvider extends Provider
 {
    //   设置是否立即注册，true为立即注册，false为不立即注册
    protected $defer = false;
    // 继承抽象父类必须用public声明
    // 实现注册的方法  通过注册的方式将服务加入到容器中。
    public function register(APP $app){
        // 通过容器类将注册后的对象绑定到容器中，并采取回调函数的方式优化性能
        $app->bind("Database",function(){
            return new Database();
        },false);
    }
    //  启动服务
    public function boot(){
        echo "database boot";
    }

}