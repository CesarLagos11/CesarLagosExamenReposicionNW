<?php

namespace Controllers\Playeras;

use Controllers\PublicController;
use Views\Renderer;
use Dao\Playeras as DaoPlayeras;

class Listado extends PublicController
{
    public function run(): void
    {
        $viewData = [];
        $viewData["playeras"] = DaoPlayeras::getAll();
        Renderer::render('playeras/listado', $viewData);
    }
}
?>