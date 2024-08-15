<?php 
//TODO: model 
require_once('../config/config.php');
error_reporting(0);
class Miembros{
    public function todos() 
    {
        $con = new ClaseConectar();
        $con = $con->conectarBaseDatos();
        $cadena = "SELECT * FROM `miembros`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($miembro_id) 
    {
        $con = new ClaseConectar();
        $con = $con->conectarBaseDatos();
        $cadena = "SELECT * FROM `miembros` WHERE `miembro_id`=$miembro_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($nombre, $apellido, $email) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->conectarBaseDatos();
            $fecha_suscripcion =  date('Y-m-d');
            $cadena = "INSERT INTO `miembros` (`nombre`,`apellido`,`email`,`fecha_suscripcion`) VALUES ('$nombre','$apellido','$email','$fecha_suscripcion')";
            if (mysqli_query($con, $cadena)) {
                return $con->insert_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($miembro_id, $nombre, $apellido, $email)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->conectarBaseDatos();
            $cadena = "UPDATE `miembros`
                    SET
                    `nombre` = '$nombre',
                    `apellido` = '$apellido',
                    `email` = '$email'
                    WHERE `miembro_id` = $miembro_id";            
            if (mysqli_query($con, $cadena)) {
                return $miembro_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($miembro_id) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->conectarBaseDatos();
            $cadena = "DELETE FROM `miembros` WHERE `miembro_id`= $miembro_id";
            if (mysqli_query($con, $cadena)) {
                return 1;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }


}

?>