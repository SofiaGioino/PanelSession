<?php

function DatosLogin($vusuario, $vclave, $vconexion)
{
    $Usuario = array();


    $SQL = "SELECT * FROM usuario WHERE email='$vusuario' AND clave=MD5('$vclave')";
    $rs = mysqli_query($vconexion, $SQL); 

    if ($data = mysqli_fetch_assoc($rs)) {
        $Usuario['ID'] = $data['id'];
        $Usuario['NOMBRE'] = $data['nombre'];
        $Usuario['APELLIDO'] = $data['apellido'];
        $Usuario['ROL'] = $data['idRol'];
        $Usuario['ACTIVO'] = $data['activo'];
        $Usuario['IMAGEN'] = $data['imagen'];
        
    }
        return $Usuario;


        

}


?>
