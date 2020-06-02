<?php

namespace hd\composer\core;

use ReflectionClass;

class APP
{
    // 不立即注册的集合
    protected $deferServices = [];
    // 需要立即注册的服务的集合
    protected $serversProviders = [];

    public function bootstrap()
    {
        //  定义基本路径
        define("BASE_PATH", __DIR__ . "/../..");
        // 绑定provider服务
        $this->bindProvider();
    }

    protected function bindProvider()
    {    
        // 获取需要加载的服务
        $config = include BASE_PATH . "/config/app.php";
        //   循环获取配置加载的服务
        foreach ($config["providers"] as $provider) {
            // dd($provider);
            //  通过反射类获得服务类的镜像
            $reflection = new ReflectionClass($provider);
            // 获得类的默认属性
            $proper = $reflection->getDefaultProperties();
            if ($proper['defer'] == false) {
                // 获取不用立即注册的服务的短名
                $alisa = substr($reflection->getShortName(),0,-8);
                // 将未立即注册的服务添加到不用立即注册集合，并以短名作为索引
                $deferServices[$alisa] = $provider;
            } else {
                echo  2;
            }
        }
    }
}
