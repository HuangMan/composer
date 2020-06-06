<?php

namespace hd\composer\core;

use ReflectionClass;

class APP extends Container
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
        //   启动服务
        $this->boot();

    }
    protected function boot(){
        //   循环需要注册的服务的集合
        foreach ($this->serversProviders as  $value) {
            //   调用服务中的启动方法
            $value->boot();
        }
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
                // 不立刻注册采取的行动
                // 获取不用立即注册的服务的短名
                $alisa = substr($reflection->getShortName(), 0, -8);
                // 将未立即注册的服务添加到不用立即注册集合，并以短名作为索引
                $deferServices[$alisa] = $provider;
            } else {
                // 立即注册采取的行动
                $this->register($provider);
            }
        }
    }

    protected function register($provider)
    {
        // 判断provider实例出来的对象是否已经存在serversProviders（立即注册）的数组中
        // 如果存在，则什么都不做
        if ($this->getProvider($provider)) {
            return;
        }

        // 实例化对象
        $object = new $provider($this);
        //   注册服务
        $object->register($this);
        // 将注册的服务添加的需要立即注册的数组中
        $this->serversProviders[] = $object;
    }
    protected function getProvider($provider)
    {
        // 判断传入的参数是否是一个对象,如果是这返回对象的类
        $class = is_object($provider) ? get_class($provider) : $provider;
        foreach ($this->serversProviders as $provider) {
            // 判断instance对象是否是provider类实例出来的
            if ($provider instanceof $class) {
                return true;
            }
        }
    }
}
