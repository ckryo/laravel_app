<?php

namespace Ckryo\Laravel\App\Providers;

use Illuminate\Foundation\Application;
use Illuminate\Routing\UrlGenerator;

trait RouteServiceExtension
{

    /**
     * 声明控制器默认命名空间
     *
     * @var string|null
     */
    protected $namespace;

    /**
     * 执行路由加载方法
     * @return mixed
     */
    abstract function mapRoute ();

    /**
     * 获取 app 实例
     * @return Application
     */
    function get_app () {
        return $this->get_app();
    }

    /**
     * 执行路由初始化函数
     *
     * @return void
     */
    public function initialRoute()
    {
        $this->setRootControllerNamespace();

        if ($this->get_app()->routesAreCached()) {
            $this->loadCachedRoutes();
        } else {
            $this->mapRoute();

            $this->get_app()->booted(function () {
                $this->get_app()['router']->getRoutes()->refreshNameLookups();
                $this->get_app()['router']->getRoutes()->refreshActionLookups();
            });
        }
    }

    /**
     * Set the root controller namespace for the application.
     *
     * @return void
     */
    protected function setRootControllerNamespace()
    {
        if (! is_null($this->namespace)) {
            $this->get_app()[UrlGenerator::class]->setRootControllerNamespace($this->namespace);
        }
    }

    /**
     * Load the cached routes for the application.
     *
     * @return void
     */
    protected function loadCachedRoutes()
    {
        $this->get_app()->booted(function () {
            require $this->get_app()->getCachedRoutesPath();
        });
    }

}