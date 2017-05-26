<?php

namespace Ckryo\Laravel\App\Console;

use Illuminate\Console\GeneratorCommand;

class ModelMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '创建一个新的模型';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Model';



    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/model.stub';
    }
}