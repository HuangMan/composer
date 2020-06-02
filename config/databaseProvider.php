<?php

namespace hd\config;

use hd\composer\core\Provider;

class databaseProvider extends Provider
 {
    //   设置是否立即注册，true为立即注册，false为不立即注册
    protected $defer = false;
    // 继承抽象父类必须用public声明
    public function register(){
        echo "database register";
    }

}