<?php
require_once 'app/models/goleadores.model.php';
require_once 'app/api/api.view.php';
abstract class abstractApiController {

    protected $model; // lo instancia el hijo
    protected $view;

    private $data;

    public function __construct() {
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");
    }

    function getData() {
        return json_decode($this->data);
    }
}
