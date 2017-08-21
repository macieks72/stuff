<?php
namespace MyClasses;

use Illuminate\View\FileViewFinder;
use Illuminate\Filesystem\Filesystem as Filesystem;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container as Container;
use Illuminate\View\Factory;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\View as BladeView;

class View
{

    function render($bladeFile, $data = array())
    {

        // create a template
        $r = $this->loadBlade('not-sure-what-this-does', __DIR__.'/../views/' . $bladeFile, $data );
        // render the template
        echo $r->render();
    }

    function loadBlade($view, $viewPath = false, $data = array() )
    {

        // echo $this->viewPath;
        if(isset($viewPath)) {
            $this->viewPath = $viewPath;
        }

        // this path needs to be array
        $FileViewFinder = new FileViewFinder(
            new Filesystem,
            array($this->viewPath)
        );

        // use blade instead of phpengine
        // pass in filesystem object and cache path
        $compiler = new BladeCompiler(new Filesystem(), __DIR__.'/../cache');
        $BladeEngine = new CompilerEngine($compiler);

        // create a dispatcher
        $dispatcher = new Dispatcher(new Container);

        // build the factory
        $factory = new Factory(
            new EngineResolver,
            $FileViewFinder,
            $dispatcher
        );

        // this path needs to be string
        $viewObj = new BladeView(
            $factory,
            $BladeEngine,
            $view,
            $this->viewPath,
            $data
        );

        return $viewObj;

    }
}
