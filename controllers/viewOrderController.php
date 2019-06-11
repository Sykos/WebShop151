<?php
class Controller extends mainController
{
    public function __construct()
    {
        parent::__construct();

        $this->aContent['viewPath'] = './views/viewOrder.php';
        $this->aContent['pageTitle'] = 'Espace membre';
    }

    public function render()
    {
        parent::render();
    }
}
