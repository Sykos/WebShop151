<?php
class Controller extends mainController
{
    public function __construct()
    {
        parent::construct();

        $this->aContent['viewPath'] = './views/viewOrder.php';
        $this->aContent['pageTitle'] = 'Mes commandes';
    }

    public function render()
    {
        parent::render();
    }
}
