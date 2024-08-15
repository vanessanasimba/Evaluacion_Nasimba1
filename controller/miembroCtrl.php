<?php
require_once('../models/miembro_model.php');

$miembros = new Miembros();

switch ($_GET["op"]){
//TODO: operaciones de librod
    case 'todos': 
        $datos = array(); 
        $datos = $miembros->todos(); 
        while ($row = mysqli_fetch_assoc($datos))
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    case 'uno':
        $miembro_id = $_POST["miembro_id"];
        $datos = array();
        $datos = $miembros->uno($miembro_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
    case 'insertar':
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $datos = array();
        $datos = $miembros->insertar($nombre,$apellido,$email);
        echo json_encode($datos);
        break;
    case 'actualizar':
        $miembro_id = $_POST["miembro_id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"]; 
        $datos = array();
        $datos = $miembros->actualizar($miembro_id,$nombre,$apellido,$email);
        echo json_encode($datos);
        break;
       
    case 'eliminar':
        $miembro_id = $_POST["miembro_id"];
        $datos = array();
        $datos = $miembros->eliminar($miembro_id);
        echo json_encode($datos);
        break;
}

?>