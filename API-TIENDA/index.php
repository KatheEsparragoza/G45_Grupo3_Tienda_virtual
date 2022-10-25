<?php
    require_once "models/Cliente.php";

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            if(isset($_GET['Id'])) {
                echo json_encode(Cliente::getWhere($_GET['Id']));
            }//end if
            else {
                echo json_encode(Cliente::getAll());
            }//end else
            break;
        case 'POST':
            $datos = json_decode(file_get_contents('php://input'));
            if($datos != NULL) {
                if(Cliente::insert($datos->Cedula, $datos->Nombre, $datos->Correo)) {
                    http_response_code(200);
                }//end if
                else {
                    http_response_code(400);
                }//end else
            }//end if
            else {
                http_response_code(405);
            }//end else
            break;
        case 'PUT':
            $datos = json_decode(file_get_contents('php://input'));
            if($datos != NULL) {
                if(Cliente::update($datos->Id, $datos->Cedula, $datos->Nombre, $datos->Correo)) {
                    http_response_code(200);
                }//end if
                else {
                    http_response_code(400);
                }//end else
            }//end if
            else {
                http_response_code(405);
            }//end else
            break;
        case 'DELETE':
            if(isset($_GET['Id'])){
                if(Cliente::delete($_GET['Id'])) {
                    http_response_code(200);
                }//end if
                else {
                    http_response_code(400);
                }//end else
            }//end if 
            else {
                http_response_code(405);
            }//end else
            break;

        default:
            http_response_code(405);
            break;
    }//end while          