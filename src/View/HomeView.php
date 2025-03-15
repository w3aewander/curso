<?php
/**
 * HomeView
 * @version 20250227.2125
 * 
 */

namespace App\View;

class HomeView
{
    private $header = __DIR__ . '/../templates/header.phtml';
    private $footer = __DIR__ . '/../templates/footer.phtml';
    
    public function render($view)
    {
         $tpl = ob_clean();
         include_once $this->header;
         include_once $view;
         include_once $this->footer;
         $tpl = ob_get_contents();
         ob_end_clean();
         echo $tpl;
    }
}
?>