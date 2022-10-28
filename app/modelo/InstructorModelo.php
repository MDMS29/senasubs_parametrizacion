<?php

require_once "conexion.php";
date_default_timezone_set('America/Bogota');
Class InstructorModelo{
    static public function ListarFichaPorInstructor($id_instructor)
    {
        $x=Conexion::conectar()->prepare("SELECT FI.tbl_ficha_ID as id_ficha, F.tbl_ficha_CODIGO as codigo_ficha,
        P.tbl_programa_NOMBRE as nombre_programa  FROM tbl_ficha_vs_instructor as FI inner join tbl_ficha as F 
        on FI.tbl_ficha_ID=F.tbl_ficha_ID inner join tbl_programa as P on F.tbl_programa_ID=P.tbl_programa_ID
         WHERE tbl_instructor_ID=:id_instructor");
        $x->bindParam(":id_instructor", $id_instructor, PDO::PARAM_INT);
        $x->execute();
        return $x->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function ListarAprendizPorFichaYAsistencia($id_ficha)
    {
        $x=Conexion::conectar()->prepare("SELECT A.tbl_aprendiz_ID as id_aprendiz, A.tbl_aprendiz_NOMBRES as nombres,
        A.tbl_aprendiz_APELLIDOS as apellidos FROM tbl_aprendiz as A WHERE tbl_ficha_ID=:id_ficha");
        $x->bindParam(":id_ficha", $id_ficha, PDO::PARAM_INT);
        $x->execute();
      
        $FechaActual = date('Y-m-d');  
        $y=Conexion::conectar2()->prepare("SELECT A.tbl_personal_ID as id_aprendiz, A.tbl_personal_ID_FICHA as id_ficha FROM tbl_asistencia as A WHERE tbl_personal_ID_FICHA=:id_ficha and tbl_asistencia_FECHA=:fecha");
        $y->bindParam(":id_ficha", $id_ficha, PDO::PARAM_INT);
        $y->bindParam(":fecha", $FechaActual, PDO::PARAM_STR);
        $y->execute();
        $c=0;
        $c2=0;

            while ($r2 = $y->fetch(PDO::FETCH_ASSOC)) {
                $asistencia["asistencia"][] = $r2;
                $c= $c+1;
            }
            while ($r = $x->fetch(PDO::FETCH_ASSOC)) {
                $aprendiz["aprendiz"][] = $r;
                $c2= $c2+1;
            }
            
            if($c>0 && $c2>0):
               $resultado= array_merge($aprendiz,$asistencia);
               return $resultado;
            else:
               return false;
            endif;
    }
//5658500 - 7515-7511
    static public function GuardarAprendiz($datos)
    {
        $y=Conexion::conectar()->prepare("SELECT COUNT(*) FROM  tbl_aprendiz WHERE tbl_aprendiz_DOCUMENTO=:numero_documento");
        $y->bindParam(":numero_documento", $datos['numero_documento'], PDO::PARAM_INT);
        $y->execute();
        $n = $y->fetchColumn();
        if($n>0)
        {
          return false;
        }
        else
        {
            $x=Conexion::conectar()->prepare("INSERT INTO tbl_aprendiz (tbl_aprendiz_ID,tbl_tipodocumento_ID,tbl_aprendiz_DOCUMENTO,tbl_aprendiz_NOMBRES,tbl_aprendiz_APELLIDOS,tbl_aprendiz_CELULAR ,tbl_aprendiz_CORREO,
           tbl_aprendiz_PASSWORD,tbl_aprendiz_DIRECCION, tbl_aprendiz_ESTADO,tbl_ficha_ID,tbl_programa_ID,tbl_aprendiz_PRESENTE,tbl_aprendiz_SEDE,tbl_aprendiz_CARGO)  VALUES (NULL, :tipo_documento, :numero_documento, :nombres,
            :apellidos, :telefono, :correo, :password,  :direccion, :estado, :ficha,:programa,'0',:sede,:cargo)");
            $x->bindParam(":tipo_documento", $datos['tipo_documento'], PDO::PARAM_INT);
            $x->bindParam(":numero_documento", $datos['numero_documento'], PDO::PARAM_INT);
            $x->bindParam(":nombres", $datos['nombres'], PDO::PARAM_STR);
            $x->bindParam(":apellidos", $datos['apellidos'], PDO::PARAM_STR);
            $x->bindParam(":telefono", $datos['telefono'], PDO::PARAM_STR);
            $x->bindParam(":correo", $datos['correo'], PDO::PARAM_STR);
            $x->bindParam(":password", $datos['contraseña'], PDO::PARAM_STR);
            $x->bindParam(":direccion", $datos['direccion'], PDO::PARAM_STR);
            $x->bindParam(":estado", $datos['estado'], PDO::PARAM_STR);
            $x->bindParam(":ficha", $datos['ficha'], PDO::PARAM_INT);
            $x->bindParam(":programa", $datos['programa'], PDO::PARAM_INT);
            $x->bindParam(":sede", $datos['sede'], PDO::PARAM_STR);
            $x->bindParam(":cargo", $datos['cargo'], PDO::PARAM_STR);
            if($x->execute()){ return true; }else{ return false;}
        }
    }

    static public function ConsultarAprendiz($id)
    {
        $x=Conexion::conectar()->prepare("SELECT A.tbl_aprendiz_ID as id_aprendiz ,A.tbl_aprendiz_DOCUMENTO as numero_documento,  
        A.tbl_aprendiz_NOMBRES as nombres, A.tbl_aprendiz_APELLIDOS as apellidos, A.tbl_aprendiz_CELULAR as telefono, A.tbl_aprendiz_DIRECCION as direccion,
        A.tbl_aprendiz_CORREO as correo, A.	tbl_tipodocumento_ID as tipo_documento, A.tbl_aprendiz_PASSWORD as password, F.tbl_ficha_ID as id_ficha, P.tbl_programa_ID as id_programa,
        A.tbl_aprendiz_SEDE as id_sede, S.tbl_centro_tbl_centro_ID as id_centro, C.tbl_regional_tbl_regional_ID as id_regional
        FROM tbl_aprendiz as A  INNER JOIN tbl_ficha as F on A.tbl_ficha_ID=F.tbl_ficha_ID  INNER JOIN tbl_programa as P on A.tbl_programa_ID=P.tbl_programa_ID INNER JOIN 
        tbl_tipodocumento as T on A.tbl_tipodocumento_ID= T.tbl_tipodocumento_ID inner join tbl_sede as S on  A.tbl_aprendiz_SEDE =S.tbl_sede_ID inner join tbl_centro as C on
        S.tbl_centro_tbl_centro_ID=C.tbl_centro_ID WHERE A.tbl_aprendiz_ID=:id_aprendiz");
         $x->bindParam(":id_aprendiz", $id, PDO::PARAM_INT);
        $x->execute();
        return $x->fetch(PDO::FETCH_ASSOC);
    }

    static public function ActualizarAprendiz($datos)
    {
        $x=Conexion::conectar()->prepare("UPDATE tbl_aprendiz SET tbl_tipodocumento_ID = :tipo_documento,tbl_aprendiz_DOCUMENTO = :numero_documento, tbl_aprendiz_NOMBRES = :nombres, 
        tbl_aprendiz_APELLIDOS = :apellidos,tbl_aprendiz_CELULAR = :telefono, tbl_aprendiz_CORREO = :correo, tbl_aprendiz_PASSWORD= :password, 	tbl_aprendiz_DIRECCION=:direccion,
        tbl_ficha_ID=:ficha, tbl_programa_ID=:programa, tbl_aprendiz_SEDE=:sede  WHERE tbl_aprendiz_ID = :id_aprendiz ");
          $x->bindParam(":id_aprendiz", $datos['id_aprendiz'], PDO::PARAM_INT);
          $x->bindParam(":tipo_documento", $datos['tipo_documento'], PDO::PARAM_INT);
          $x->bindParam(":numero_documento", $datos['numero_documento'], PDO::PARAM_INT);
          $x->bindParam(":nombres", $datos['nombres'], PDO::PARAM_STR);
          $x->bindParam(":apellidos", $datos['apellidos'], PDO::PARAM_STR);
          $x->bindParam(":telefono", $datos['telefono'], PDO::PARAM_STR);
          $x->bindParam(":correo", $datos['correo'], PDO::PARAM_STR);
          $x->bindParam(":password", $datos['contraseña'], PDO::PARAM_STR);
          $x->bindParam(":direccion", $datos['direccion'], PDO::PARAM_STR);
          $x->bindParam(":ficha", $datos['ficha'], PDO::PARAM_INT);
          $x->bindParam(":programa", $datos['programa'], PDO::PARAM_INT);
          $x->bindParam(":sede", $datos['sede'], PDO::PARAM_INT);
          if($x->execute()){ return true; }else{ return false;}
    }

    static public function EliminarAprendiz($id)
    {
        $x=Conexion::conectar()->prepare("DELETE FROM tbl_aprendiz WHERE tbl_aprendiz_ID=:id_aprendiz ");
        $x->bindParam(":id_aprendiz", $id, PDO::PARAM_INT);
        if($x->execute()){ return true; }else{ return false;}
    }

    

   
}
?>


