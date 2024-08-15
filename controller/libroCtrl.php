<?php
require_once('../models/libros_modelo.php');

$libros = new Libros();

switch ($_GET["op"]){
//TODO: operaciones de librod
    case 'todos': 
        $datos = array(); 
        $datos = $libros->todos(); 
        while ($row = mysqli_fetch_assoc($datos))
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    case 'uno':
        $libro_id = $_POST["libro_id"];
        $datos = array();
        $datos = $libros->uno($libro_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        //TODO: Procedimeinto para insertar un proveedor en la base de datos
    case 'insertar':
        $titulo = $_POST["titulo"]; 
        $autor = $_POST["autor"];
        $genero = $_POST["genero"];
        $anio_publicacion = $_POST["anio_publicacion"]; 
        $datos = array();
        $datos = $libros->insertar($titulo, $autor, $genero, $anio_publicacion);
        echo json_encode($datos);
        break;
    case 'actualizar':
        $libro_id = $_POST["libro_id"];
        $titulo = $_POST["titulo"]; 
        $autor = $_POST["autor"];
        $genero = $_POST["genero"];
        $anio_publicacion = $_POST["anio_publicacion"]; 
        $datos = array();
        $datos = $libros->actualizar($libro_id,$titulo,$autor,$genero,$anio_publicacion);
        echo json_encode($datos);
        break;
       
    case 'eliminar':
        $libro_id = $_POST["libro_id"];
        $datos = array();
        $datos = $libros->eliminar($libro_id);
        echo json_encode($datos);
        break;
}

?>