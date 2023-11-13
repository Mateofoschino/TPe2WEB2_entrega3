<?php
require_once 'app/api/abstractApiController.php';
require_once 'app/models/goleadores.model.php';
require_once 'app/api/api.view.php';

class ApiController extends abstractApiController {
    
    public function __construct() {
        parent::__construct();
        $this->model = new goleadoresModel();
        
    }

    // $params al poder ser null puede ser invocado para listar todo o
    // para listar 1

    public function getAll($params = null) {

        if (empty($params)) {
            $goleadores = $this->model->getGoleadores();
            $this->view->response($goleadores,200);
        } else {
            $idGoleador = $params[':ID'];
            $goleador = $this->model->getDetailsById($idGoleador);
            if ($goleador) {
                $this->view->response($goleador,200);
            } else {
                $this->view->response("El goleador con el id=$idGoleador no existe",404);
            }
        }
        
    }

    public function delete($params=null) {
        $idGoleador=$params[':ID'];
        $success = $this->model->deleteGoleador($params[':ID']);
        if (!$success) {
            $this->view->response("El jugador con el id =$idGoleador no existe",404);
        } else {
            $this->view->response("El jugador con el id=$idGoleador se borro exitosamente",200);
        }
        
    }

    public function add(){
        $body = $this->getData();

        $nombre = $body->Nombre;
        $club = $body->Club;
        $goles = $body->Goles;
        $pj = $body->PJ;

        $id = $this->model->insertGoleador($nombre,$club,$goles,$pj);

        if ($id) {
            $this->view->response("El goleador fue creado con exito",200);
        } else {
            $this->view->response("El goleador no fue creado",404);
        }
    }


}
