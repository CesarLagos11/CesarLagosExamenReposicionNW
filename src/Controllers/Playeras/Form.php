<?php

namespace Controllers\Playeras;

use Controllers\PublicController;
use Views\Renderer;
use Dao\Playeras as DaoPlayeras;
use Utilities\Validators;

class Form extends PublicController
{
    private $viewData = [];
    private $arrModeDesc = [];
    private $arrTallas = [];

    public function run(): void
    {
        $this->init();

        if ($this->isPostBack()) {
            $this->handlePost();
        }

        $this->prepareViewData();
        Renderer::render('playeras/formulario', $this->viewData);
    }

    private function init()
    {
        $this->viewData = [
            "mode" => "INS",
            "id" => 0,
            "nombre_cliente" => "",
            "causa_apoyada" => "",
            "talla" => "M",
            "diseño_favorito" => "",
            "email" => "",
            "pais" => "",
            "mensaje" => "",
            "formTitle" => "Nueva Orden de Playera",
            "isReadOnly" => false,
            "showDeleteBtn" => false
        ];

        $this->arrModeDesc = [
            "INS" => "Nueva Orden de Playera",
            "UPD" => "Editando Orden de %s (%d)",
            "DSP" => "Detalle de Orden de %s (%d)",
            "DEL" => "Eliminando Orden de %s (%d)"
        ];

        // Para el <select> de tallas
        $this->arrTallas = [
            ["value" => "XS", "text" => "Extra Pequeña (XS)"],
            ["value" => "S", "text" => "Pequeña (S)"],
            ["value" => "M", "text" => "Mediana (M)"],
            ["value" => "L", "text" => "Grande (L)"],
            ["value" => "XL", "text" => "Extra Grande (XL)"]
        ];
        $this->viewData["tallas"] = $this->arrTallas;

        if (isset($_GET["mode"])) {
            $this->viewData["mode"] = $_GET["mode"];
        }
        if (isset($_GET["id"])) {
            $this->viewData["id"] = intval($_GET["id"]);
        }
    }

    private function handlePost()
    {
        $data = [
            "mode" => $_POST["mode"],
            "id" => intval($_POST["id"]),
            "nombre_cliente" => $_POST["nombre_cliente"],
            "causa_apoyada" => $_POST["causa_apoyada"],
            "talla" => $_POST["talla"],
            "diseño_favorito" => $_POST["diseño_favorito"],
            "email" => $_POST["email"],
            "pais" => $_POST["pais"],
            "mensaje" => $_POST["mensaje"],
        ];



        switch ($data["mode"]) {
            case "INS":
                $result = DaoPlayeras::insertOne($data);
                if ($result) {
                    \Utilities\Site::redirectToWithMsg("index.php?page=Playeras-Listado", "Orden creada exitosamente.");
                }
                break;
            case "UPD":
                $result = DaoPlayeras::updateOne($data["id"], $data);
                if ($result) {
                    \Utilities\Site::redirectToWithMsg("index.php?page=Playeras-Listado", "Orden actualizada exitosamente.");
                }
                break;
        }
    }

    private function prepareViewData()
    {
        if ($this->viewData["mode"] !== "INS") {
            $dbData = DaoPlayeras::getById($this->viewData["id"]);
            if ($dbData) {
                $this->viewData = array_merge($this->viewData, $dbData);
                $this->viewData["formTitle"] = sprintf(
                    $this->arrModeDesc[$this->viewData["mode"]],
                    $this->viewData["nombre_cliente"],
                    $this->viewData["id"]
                );
            }
        }

        if ($this->viewData["mode"] === "DSP" || $this->viewData["mode"] === "DEL") {
            $this->viewData["isReadOnly"] = true;
        }
        
        if ($this->viewData["mode"] === "DEL") {
            $this->viewData["showDeleteBtn"] = true;
        }

        foreach ($this->viewData["tallas"] as &$talla) {
            if ($talla["value"] === $this->viewData["talla"]) {
                $talla["selected"] = "selected";
            }
        }
    }
}
?>