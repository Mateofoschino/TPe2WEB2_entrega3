<?php
require_once 'app/api/abstractApiController.php';
require_once 'app/models/goleadores.model.php';
require_once 'app/api/api.view.php';

class ApiController extends abstractApiController
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new goleadoresModel();
    }

    // $params al poder ser null puede ser invocado para listar todo o
    // para listar 1

    public function getAll($params = null)
    {
        $parametros = [];
        if (isset($_GET['order']) && isset($_GET['sort'])) {
            $parametros['order'] = $_GET['order'];
            $parametros['sort'] = $_GET['sort'];
        } 

        if (!isset($params[':ID'])) {
            $goleadores = $this->model->getGoleadores($parametros);
            $this->view->response($goleadores, 200);
        } else {
            $idGoleador = $params[':ID'];
            $goleador = $this->model->getGoleadorById($idGoleador);
            if ($goleador) {
                $this->view->response($goleador, 200);
            } else {
                $this->view->response("El goleador con el id=$idGoleador no existe", 404);
            }
        }
    }


    public function add()
    {
        $body = $this->getData();

        $nombre = $body->Nombre;
        $club = $body->Club;
        $goles = $body->Goles;
        $pj = $body->PJ;

        $id = $this->model->insertGoleador($nombre, $club, $goles, $pj);

        if ($id) {
            $this->view->response("El goleador fue creado con exito", 201);
        } else {
            $this->view->response("El goleador no fue creado", 404);
        }
    }

    public function modify($params = null)
    {
        if (empty($params)) {
            $this->view->response("Inserte un ID para modificar", 400);
        } else {
            $idGoleador = $params[':ID'];
            $jugador = $this->model->getGoleadores($idGoleador);
            if ($jugador) {
                $body = $this->getData();
                $nombre = $body->Nombre;
                $club = $body->Club;
                $goles = $body->Goles;
                $pj = $body->PJ;
                $success = $this->model->modifyGoleador($nombre, $club, $goles, $pj, $idGoleador);
                if ($success) {
                    $this->view->response("El jugador fue modificado con exito", 201);
                } else {
                    $this->view->response("Bad request", 400);
                }
            } else {
                $this->view->response("El jugador con el id =$idGoleador no existe", 404);
            }
        }
    }
}
