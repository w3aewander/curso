<?php

/**
 *  Controller base
 */

namespace App\Controller;

use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Container\Container;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\Events\Dispatcher;



class Controller
{

    /**
     * @var string
     */
    protected $menu;
    protected $view;


    public function __construct()
    {
        $this->initializeView();
        // Carrega o menu
        $this->menu = \App\Model\Menu::carregarMenu();
    }

    protected function initializeView()
    {
        $container = new Container();
        $filesystem = new Filesystem();
        $cachePath = __DIR__ . '/../storage/framework/views';
        $viewPath = __DIR__ . '/../resources/views';

        $bladeCompiler = new BladeCompiler($filesystem, $cachePath);
        $engineResolver = new EngineResolver();
        $engineResolver->register('blade', function () use ($bladeCompiler) {
            return new \Illuminate\View\Engines\CompilerEngine($bladeCompiler);
        });

        $viewFinder = new FileViewFinder($filesystem, [$viewPath]);
        $eventDispatcher = new Dispatcher($container); // Adiciona o dispatcher de eventos
        $this->view = new Factory($engineResolver, $viewFinder, $eventDispatcher);
    }
}
