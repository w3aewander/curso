<?php
/**
 * Trait para renderização de views
 * @author Wanderlei Silva do Carmo <wander.silva@gmail.com>
 * @version 20250227.2125
 * 
 */

namespace App\Traits;

trait TraitViewRender
{
    private $header = __DIR__ . '/../templates/header.phtml';
    private $footer = __DIR__ . '/../templates/footer.phtml';
    

    public function render($view, $data = [])
    {
        
        if (file_exists($view)) {
            extract($data);
            ob_start();
            require $this->header;
            require $view;
            require $this->footer;
            $content = ob_get_clean();
            return $content;
        } else {
            throw new \Exception("View não encontrada");
        }
    }
}