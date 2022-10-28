<?php

require_once "../modelo/ExcelsModelo.php";

class ExcelsControlador{
    public function ImportarInstructorExcel(){
        $respuesta = ExcelsModelo::ImportarInstructores();
        return $respuesta;
    }
}
    

if (is_array($_FILES["opcion"]) && count($_FILES["opcion"])>0) {
    
}
?>

