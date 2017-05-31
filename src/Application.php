<?php

namespace Ckryo\Laravel\App;
/**
 * Created by PhpStorm.
 * User: liurong
 * Date: 2017/5/31
 * Time: 上午9:14
 */
class Application extends \Illuminate\Foundation\Application
{

    /**
     * Get the path to the application "src" directory.
     *
     * @param string $path Optionally, a path to append to the app path
     * @return string
     */
    public function path($path = '')
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'src'.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    /**
     * Create a new Illuminate application instance.
     *
     * @param  string|null  $basePath
     * @return void
     */
    public function __construct($basePath = null)
    {
        parent::__construct($basePath);

        $this->loadDefaultKernel();
    }


    public function loadDefaultKernel () {
        $this->singleton(
            \Illuminate\Contracts\Http\Kernel::class,
            \Ckryo\Laravel\App\Http\Kernel::class
        );

        $this->singleton(
            \Illuminate\Contracts\Console\Kernel::class,
            \Ckryo\Laravel\App\Console\Kernel::class
        );

        $this->singleton(
            \Illuminate\Contracts\Debug\ExceptionHandler::class,
            \Ckryo\Laravel\App\Exceptions\Handler::class
        );
    }
}