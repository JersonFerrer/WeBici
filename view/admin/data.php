<?php
$data = array(
        "data"=>array(
            array(
                "nroCedula"=>"2423423",
                "nombres"=>"Peter",
                "apellidos"=>"Griffin",
                "correo"=>"Quahog",
                "direccion"=>"Quahog",
                "telefono"=>"male",
                "rol"=>"male"
            ),
            array(
                "nroCedula"=>"2423423",
                "nombres"=>"Peter",
                "apellidos"=>"Griffin",
                "correo"=>"Quahog",
                "direccion"=>"Quahog",
                "telefono"=>"male",
                "rol"=>"male"
            ),
            array(
                "nroCedula"=>"2423423",
                "nombres"=>"Peter",
                "apellidos"=>"Griffin",
                "correo"=>"Quahog",
                "direccion"=>"Quahog",
                "telefono"=>"male",
                "rol"=>"male"
            )
        )
);
 
header('Content-type: application/json');
echo json_encode($data);
?>