<?php

namespace Controllers\Playeras;

use Controllers\PublicController;
use Dao\Playeras as DaoPlayeras;

class Delete extends PublicController
{
    public function run(): void
    {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $result = DaoPlayeras::deleteOne($id);
            if ($result) {
                \Utilities\Site::redirectToWithMsg("index.php?page=Playeras-Listado", "Orden eliminada exitosamente.");
            }
        } else {
             \Utilities\Site::redirectToWithMsg("index.php?page=Playeras-Listado", "Error: ID de orden no especificado.");
        }
    }
}
?>