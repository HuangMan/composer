<?php

namespace hd\config;

use hd\composer\core\APP;
use hd\composer\core\Provider;

class databaseProvider extends Provider
 {
    //   设置是否立即注册，true为立即注册，false为不立即注册
    protected $defer = true;
    // 继承抽象父类必须用public声明
    // 实现注册的方法  通过注册的方式将服务加入到容器中。
    public function register(APP $app){
        
        $app->bind("Database",function(){
            return new Database();
        });
    }
    //  启动服务
    public function boot(){
        echo "database boot";
    }

}