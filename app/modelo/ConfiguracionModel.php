<?php

require_once "conexion.php";

Class Configuracion{

    // consultas de regional
    static public function ListarRegional()
    {
        $x=Conexion::conectar()->prepare("SELECT R.tbl_regional_ID as id_regional, R.tbl_regional_NOMBRE as nombre_regional,
         R.tbl_regional_ESTADO as estado_regional FROM  tbl_regional as R ");
        $x->execute();
        return $x->fetchAll(PDO::FETCH_ASSOC);
    }
    static public function GuardarRegional($nombre_regional)
    {
        $y=Conexion::conectar()->prepare("SELECT COUNT(*) FROM  tbl_regional WHERE tbl_regional_NOMBRE=:nombre");
        $y->bindParam(":nombre", $nombre_regional, PDO::PARAM_STR);
        $y->execute();
        $n = $y->fetchColumn();
        
        if($n>0)
        {
          return false;
        }
        else
        {
            $x=Conexion::conectar()->prepare("INSERT INTO tbl_regional (tbl_regional_ID, tbl_regional_NOMBRE,tbl_regional_ESTADO) 
             VALUES (NULL, :nombre,1)");
             $x->bindParam(":nombre", $nombre_regional, PDO::PARAM_STR);
             if($x->execute()){ return true; }else{ return false;}
        }
    }

    static public function ConsultarRegional($id)
    {
        $x=Conexion::conectar()->prepare("SELECT R.tbl_regional_NOMBRE as nombre_regional FROM tbl_regional as R WHERE tbl_regional_ID=:id");
         $x->bindParam(":id", $id, PDO::PARAM_INT);
         $x->execute();
         return $x->fetch(PDO::FETCH_ASSOC);
    }

    static public function ActualizarRegional($id,$nombre_regionale)
    {
        $x=Conexion::conectar()->prepare("UPDATE tbl_regional SET tbl_regional_NOMBRE = :nombre  WHERE tbl_regional_ID = :id_regional ");
         $x->bindParam(":id_regional", $id, PDO::PARAM_INT);
         $x->bindParam(":nombre", $nombre_regionale, PDO::PARAM_STR);
         if($x->execute()){ return true; }else{ return false;}
    }

    static public function EliminarRegional($id)
    {
        $x=Conexion::conectar()->prepare("DELETE FROM tbl_regional WHERE tbl_regional_ID=:id_regional");
        $x->bindParam(":id_regional", $id, PDO::PARAM_INT);
        if($x->execute()){ return true; }else{ return false;}
    }
  //consulta de centro

    static public function ListarCentro()
    {
        $x=Conexion::conectar()->prepare("SELECT C.tbl_centro_ID as id_centro, C.tbl_centro_NOMBRE as nombre_centro, C.tbl_centro_TELEFONO as telefono_centro,
        C.tbl_centro_SUBDIRECTOR as subdirector, R.tbl_regional_NOMBRE as nombre_regional 
        FROM tbl_centro as C inner join tbl_regional as R on C.tbl_regional_tbl_regional_ID=R.tbl_regional_ID");
        $x->execute();
        return $x->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function ListarCentroPorRegional($id_regional)
    {
        $x=Conexion::conectar()->prepare("SELECT C.tbl_centro_NOMBRE as nombre_centro, C.tbl_centro_ID as id_centro FROM tbl_centro as C WHERE tbl_regional_tbl_regional_ID=:id_regional");
        $x->bindParam(":id_regional", $id_regional, PDO::PARAM_INT);
        $x->execute();
        return $x->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function GuardarCentro($datos)
    {
       
            $x=Conexion::conectar()->prepare("INSERT INTO tbl_centro (tbl_centro_ID, tbl_centro_NOMBRE, tbl_centro_TELEFONO, tbl_centro_SUBDIRECTOR, tbl_regional_tbl_regional_ID) VALUES (null, :nombre_centro, :telefono_centro, :subdirector, :regional)");
             $x->bindParam(":nombre_centro", $datos['nombre_centro'], PDO::PARAM_STR);
             $x->bindParam(":telefono_centro", $datos['telefono_centro'], PDO::PARAM_STR);
             $x->bindParam(":subdirector", $datos['subdirector'], PDO::PARAM_STR);
             $x->bindParam(":regional", $datos['regional'], PDO::PARAM_INT);
             if($x->execute()){ return true; }else{ return false;}
        
    }

    static public function ConsultarCentro($id)
    {
         $x=Conexion::conectar()->prepare("SELECT C.tbl_centro_NOMBRE as nombre_centro, C.tbl_centro_TELEFONO as telefono_centro,
         C.tbl_centro_SUBDIRECTOR as subdirector, C.tbl_regional_tbl_regional_ID as regional FROM tbl_centro as C WHERE tbl_centro_ID=:id_centro");
         $x->bindParam(":id_centro", $id, PDO::PARAM_INT);
         $x->execute();
         return $x->fetch(PDO::FETCH_ASSOC);
    }

    static public function ActualizarCentro($datos)
    {
        $x=Conexion::conectar()->prepare("UPDATE tbl_centro SET tbl_centro_NOMBRE=:nombre, tbl_centro_TELEFONO=:telefono,
         tbl_centro_SUBDIRECTOR= :subdirector, tbl_regional_tbl_regional_ID=:regional  WHERE tbl_centro_ID = :id_centro ");
         $x->bindParam(":id_centro", $datos['id_centro'], PDO::PARAM_INT);
         $x->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
         $x->bindParam(":telefono", $datos['telefono'], PDO::PARAM_STR);
         $x->bindParam(":subdirector", $datos['subdirector'], PDO::PARAM_STR);
         $x->bindParam(":regional", $datos['regional'], PDO::PARAM_INT);
         if($x->execute()){ return true; }else{ return false;}
    }
    
    static public function EliminarCentro($id)
    {
        $x=Conexion::conectar()->prepare("DELETE FROM tbl_centro WHERE tbl_centro_ID=:id_centro");
        $x->bindParam(":id_centro", $id, PDO::PARAM_INT);
        if($x->execute()){ return true; }else{ return false;}
    }

    //consultas para sede

    static public function ListarSede()
    {
        $x=Conexion::conectar()->prepare("SELECT S.tbl_sede_ID as id_sede, S.tbl_sede_NOMBRE as nombre_sede, S.tbl_sede_RESPONSABLE as responsable_sede,
        S.tbl_sede_TELEFONO as telefono_sede, C.tbl_centro_NOMBRE as nombre_centro, R.tbl_regional_NOMBRE as regional FROM tbl_sede as S inner join tbl_centro as C 
        on S.tbl_centro_tbl_centro_ID=C.tbl_centro_ID inner join tbl_regional as R on C.tbl_regional_tbl_regional_ID=R.tbl_regional_ID");
        $x->execute();
        return $x->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function ListarSedePorCentro($id_centro)
    {
        $x=Conexion::conectar()->prepare("SELECT S.tbl_sede_ID as id_sede, S.tbl_sede_NOMBRE as nombre_sede FROM tbl_sede as S
        where tbl_centro_tbl_centro_ID=:id_centro");
        $x->bindParam(":id_centro", $id_centro, PDO::PARAM_INT);
        $x->execute();
        return $x->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function GuardarSede($datos)
    {
       
            $x=Conexion::conectar()->prepare("INSERT INTO tbl_sede (tbl_sede_ID, tbl_sede_NOMBRE, tbl_sede_RESPONSABLE, tbl_sede_TELEFONO, tbl_centro_tbl_centro_ID) VALUES (null, :nombre_sede, :responsable_sede, :telefono_sede, :centro_sede)");
             $x->bindParam(":nombre_sede", $datos['nombre_sede'], PDO::PARAM_STR);
             $x->bindParam(":responsable_sede", $datos['responsable_sede'], PDO::PARAM_STR);
             $x->bindParam(":telefono_sede", $datos['telefono_sede'], PDO::PARAM_STR);
             $x->bindParam(":centro_sede", $datos['centro_sede'], PDO::PARAM_INT);
             if($x->execute()){ return true; }else{ return false;}
        
    }

    static public function ConsultarSede($id)
    {
         $x=Conexion::conectar()->prepare("SELECT S.tbl_sede_NOMBRE as nombre_sede, S.tbl_sede_RESPONSABLE as responsable_sede,
         S.tbl_sede_TELEFONO as telefono_sede, C.tbl_centro_ID as nombre_centro, R.tbl_regional_ID as regional FROM tbl_sede as S
         inner join tbl_centro as C on S.tbl_centro_tbl_centro_ID=C.tbl_centro_ID inner join tbl_regional as R on C.tbl_regional_tbl_regional_ID=R.tbl_regional_ID 
         WHERE tbl_sede_ID=:id_sede ");
         $x->bindParam(":id_sede", $id, PDO::PARAM_INT);
         $x->execute();
         return $x->fetch(PDO::FETCH_ASSOC);
    }

    static public function ActualizarSede($datos)
    {
        $x=Conexion::conectar()->prepare("UPDATE tbl_sede SET tbl_sede_NOMBRE=:nombre_sede, tbl_sede_TELEFONO=:telefono_sede,
         tbl_sede_RESPONSABLE= :responsable  WHERE tbl_sede_ID = :id_sede ");
         $x->bindParam(":id_sede", $datos['id_sede'], PDO::PARAM_INT);
         $x->bindParam(":nombre_sede", $datos['nombre_sede'], PDO::PARAM_STR);
         $x->bindParam(":telefono_sede", $datos['telefono_sede'], PDO::PARAM_STR);
         $x->bindParam(":responsable", $datos['responsable'], PDO::PARAM_STR);
         if($x->execute()){ return true; }else{ return false;}
    }

    static public function EliminarSede($id)
    {
        $x=Conexion::conectar()->prepare("DELETE FROM tbl_sede WHERE tbl_sede_ID=:id_sede");
        $x->bindParam(":id_sede", $id, PDO::PARAM_INT);
        if($x->execute()){ return true; }else{ return false;}
    }


    
    //consultas para programas

    static public function ListarPrograma($id_sede,$cargoU)
    {
        if($cargoU=="PARAMETRIZACION")
        {
            $x=Conexion::conectar()->prepare("SELECT P.tbl_programa_ID as id_programa, P.tbl_programa_CODIGO as codigo_programa, P.tbl_programa_NOMBRE as nombre_programa,
            S.tbl_sede_NOMBRE as nombre_sede, C.tbl_centro_NOMBRE as nombre_centro, R.tbl_regional_NOMBRE as nombre_regional FROM tbl_programa as P
            inner join tbl_sede as S on P.tbl_sede_tbl_sede_ID=S.tbl_sede_ID inner join tbl_centro as C on S.tbl_centro_tbl_centro_ID=C.tbl_centro_ID
            inner join tbl_regional as R on C.tbl_regional_tbl_regional_ID= R.tbl_regional_ID ");
            $x->execute();
            return $x->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            $x=Conexion::conectar()->prepare("SELECT P.tbl_programa_ID as id_programa, P.tbl_programa_CODIGO as codigo_programa, P.tbl_programa_NOMBRE as nombre_programa,
            S.tbl_sede_NOMBRE as nombre_sede, C.tbl_centro_NOMBRE as nombre_centro, R.tbl_regional_NOMBRE as nombre_regional FROM tbl_programa as P
            inner join tbl_sede as S on P.tbl_sede_tbl_sede_ID=S.tbl_sede_ID inner join tbl_centro as C on S.tbl_centro_tbl_centro_ID=C.tbl_centro_ID
            inner join tbl_regional as R on C.tbl_regional_tbl_regional_ID= R.tbl_regional_ID WHERE tbl_sede_tbl_sede_ID=:id_sede");
            $x->bindParam(":id_sede", $id_sede, PDO::PARAM_INT);
            $x->execute();
            return $x->fetchAll(PDO::FETCH_ASSOC);
        }
       
    }

    static public function  ListarProgramaTecniTecno($id_sede){
        
    }

    static public function ListarProgramaPorSede($id_sede)
    {
        $x=Conexion::conectar()->prepare("SELECT P.	tbl_programa_ID as id_programa, P.tbl_programa_NOMBRE as nombre_programa FROM tbl_programa as P WHERE tbl_sede_tbl_sede_ID =:id_sede ");
        $x->bindParam(":id_sede", $id_sede, PDO::PARAM_STR);
        $x->execute();
        return $x->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function GuardarPrograma($datos)
    {
       
            $x=Conexion::conectar()->prepare("INSERT INTO tbl_programa (tbl_programa_ID, tbl_programa_CODIGO, tbl_programa_NOMBRE, tbl_programa_ESTADO, tbl_sede_tbl_sede_ID ) VALUES (null, :codigo_programa, :nombre_programa, 1, :sede_programa)");
             $x->bindParam(":nombre_programa", $datos['nombre_programa'], PDO::PARAM_STR);
             $x->bindParam(":codigo_programa", $datos['codigo_programa'], PDO::PARAM_STR);
             $x->bindParam(":sede_programa", $datos['sede_programa'], PDO::PARAM_INT);
             if($x->execute()){ return true; }else{ return false;}
        
    }

    static public function ConsultarPrograma($id)
    {
         $x=Conexion::conectar()->prepare("SELECT P.tbl_programa_CODIGO as codigo_programa, P.tbl_programa_NOMBRE as nombre_programa,
         S.tbl_sede_ID as id_sede, C.tbl_centro_ID as id_centro, R.tbl_regional_ID as id_regional FROM tbl_programa as P inner join tbl_sede as S on P.tbl_sede_tbl_sede_ID=S.tbl_sede_ID
         inner join tbl_centro as C on S.tbl_centro_tbl_centro_ID=C.tbl_centro_ID inner join tbl_regional as R on C.tbl_regional_tbl_regional_ID=R.tbl_regional_ID 
         where tbl_programa_ID=:id_programa ");
         $x->bindParam(":id_programa", $id, PDO::PARAM_INT);
         $x->execute();
         return $x->fetch(PDO::FETCH_ASSOC);
    }

    static public function ActualizarPrograma($datos)
    {
        $x=Conexion::conectar()->prepare("UPDATE tbl_programa SET tbl_programa_NOMBRE=:nombre_programa, tbl_programa_CODIGO=:codigo_programa
         WHERE tbl_programa_ID = :id_programa ");
          $x->bindParam(":id_programa", $datos['id_programa'], PDO::PARAM_INT);
         $x->bindParam(":nombre_programa", $datos['nombre_programa'], PDO::PARAM_STR);
         $x->bindParam(":codigo_programa", $datos['codigo_programa'], PDO::PARAM_STR);
         if($x->execute()){ return true; }else{ return false;}
    }

    static public function EliminarPrograma($id)
    {
        $x=Conexion::conectar()->prepare("DELETE FROM tbl_programa WHERE tbl_programa_ID=:id_programa");
        $x->bindParam(":id_programa", $id, PDO::PARAM_INT);
        if($x->execute()){ return true; }else{ return false;}
    }

    
    //consultas para fichas

    static public function ListarFicha($id_sede,$cargoU)
    {
        if($cargoU=="PARAMETRIZACION")
        {
            $x=Conexion::conectar()->prepare("SELECT F.tbl_ficha_ID as id_ficha, F.tbl_ficha_CODIGO as codigo_ficha, F.tbl_ficha_GRUPO as grupo_ficha,
            P.tbl_programa_NOMBRE as nombre_programa, S.tbl_sede_NOMBRE as nombre_sede, C.tbl_centro_NOMBRE as nombre_centro, R.tbl_regional_NOMBRE	as nombre_regional
            FROM tbl_ficha as F inner join tbl_programa as P on F.tbl_programa_ID=P.tbl_programa_ID inner join tbl_sede as S on P.tbl_sede_tbl_sede_ID=S.tbl_sede_ID
            inner join tbl_centro as C on S.tbl_centro_tbl_centro_ID=C.tbl_centro_ID inner join tbl_regional as R on C.tbl_regional_tbl_regional_ID=R.tbl_regional_ID");
            $x->execute();
            return $x->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            $x=Conexion::conectar()->prepare("SELECT F.tbl_ficha_ID as id_ficha, F.tbl_ficha_CODIGO as codigo_ficha, F.tbl_ficha_GRUPO as grupo_ficha,
            P.tbl_programa_NOMBRE as nombre_programa, S.tbl_sede_NOMBRE as nombre_sede, C.tbl_centro_NOMBRE as nombre_centro, R.tbl_regional_NOMBRE	as nombre_regional
            FROM tbl_ficha as F inner join tbl_programa as P on F.tbl_programa_ID=P.tbl_programa_ID inner join tbl_sede as S on P.tbl_sede_tbl_sede_ID=S.tbl_sede_ID
            inner join tbl_centro as C on S.tbl_centro_tbl_centro_ID=C.tbl_centro_ID inner join tbl_regional as R on C.tbl_regional_tbl_regional_ID=R.tbl_regional_ID
            WHERE P.tbl_sede_tbl_sede_ID=:id_sede");
            $x->bindParam(":id_sede", $id_sede, PDO::PARAM_INT);
            $x->execute();
            return $x->fetchAll(PDO::FETCH_ASSOC);
        }
        
    }

    static public function ListarFichaPorPrograma($id_programa)
    {
        $x=Conexion::conectar()->prepare("SELECT F.tbl_ficha_ID as id_ficha, F.tbl_ficha_CODIGO as codigo_ficha FROM tbl_ficha as F  WHERE tbl_programa_ID=:id_programa");
        $x->bindParam(":id_programa", $id_programa, PDO::PARAM_INT);
        $x->execute();
        return $x->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function ListarFichaPorSede($id_sede)
    {
        $x=Conexion::conectar()->prepare("SELECT F.tbl_ficha_codigo as codigo_ficha, F.tbl_ficha_ID as id_ficha FROM tbl_ficha as F inner join tbl_programa as P 
        on F.tbl_programa_ID=P.tbl_programa_ID and P.tbl_sede_tbl_sede_ID=:id_sede");
        $x->bindParam(":id_sede", $id_sede, PDO::PARAM_INT);
        $x->execute();
        return $x->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function GuardarFicha($datos)
    {
        $y=Conexion::conectar()->prepare("SELECT COUNT(*) FROM  tbl_ficha WHERE tbl_ficha_CODIGO=:codigo_ficha");
        $y->bindParam(":codigo_ficha",  $datos['codigo_ficha'], PDO::PARAM_INT);
        $y->execute();
        $n = $y->fetchColumn();
       
        if($n>0)
        {
          return false;
        }
        else
        {
            $x=Conexion::conectar()->prepare("INSERT INTO tbl_ficha (tbl_ficha_ID,tbl_ficha_CODIGO,tbl_programa_ID,tbl_ficha_GRUPO ) VALUES (null, :codigo_ficha, :programa_ficha,:grupo_ficha)");
            $x->bindParam(":codigo_ficha", $datos['codigo_ficha'], PDO::PARAM_INT);
            $x->bindParam(":programa_ficha", $datos['programa_ficha'], PDO::PARAM_INT);
            $x->bindParam(":grupo_ficha", $datos['grupo_ficha'], PDO::PARAM_STR);
            if($x->execute()){ return true; }else{ return false;}
        }
    }

    static public function ConsultarFicha($id)
    {
         $x=Conexion::conectar()->prepare("SELECT F.tbl_ficha_CODIGO as codigo_ficha , F.tbl_programa_ID as programa_ficha, F.tbl_ficha_GRUPO as grupo_ficha,
          P.tbl_sede_tbl_sede_ID as id_sede , S.tbl_centro_tbl_centro_ID as id_centro, C.tbl_regional_tbl_regional_ID as id_regional FROM tbl_ficha as F 
          inner join tbl_programa as P on F.tbl_programa_ID=P.tbl_programa_ID inner join tbl_sede as S on P.tbl_sede_tbl_sede_ID=S.tbl_sede_ID  
          inner join tbl_centro as C on S.tbl_centro_tbl_centro_ID=C.tbl_centro_ID WHERE tbl_ficha_ID=:id_ficha");
         $x->bindParam(":id_ficha", $id, PDO::PARAM_INT);
         $x->execute();
         return $x->fetch(PDO::FETCH_ASSOC);
    }

    static public function ActualizarFicha($datos)
    {
        $x=Conexion::conectar()->prepare("UPDATE tbl_ficha SET 	tbl_ficha_CODIGO=:codigo_ficha, tbl_ficha_GRUPO= :grupo_ficha 
         WHERE tbl_ficha_ID = :id_ficha ");
          $x->bindParam(":id_ficha", $datos['id_ficha'], PDO::PARAM_INT);
         $x->bindParam(":codigo_ficha", $datos['codigo_ficha'], PDO::PARAM_STR);
         $x->bindParam(":grupo_ficha", $datos['grupo_ficha'], PDO::PARAM_STR);
         if($x->execute()){ return true; }else{ return false;}
    }

    static public function EliminarFicha($id)
    {
        $x=Conexion::conectar()->prepare("DELETE FROM tbl_ficha WHERE tbl_ficha_ID=:id_ficha");
        $x->bindParam(":id_ficha", $id, PDO::PARAM_INT);
        if($x->execute()){ return true; }else{ return false;}
    }

    // consulta para ficha vs instructor

    static public function ListarFVSI($id_sede,$cargoU)
    {
        if($cargoU=="PARAMETRIZACION")
        {
            $x=Conexion::conectar()->prepare("SELECT FI.tbl_ficha_vs_instructor_ID as id_fvsi, F.tbl_ficha_CODIGO as ficha_codigo, P.tbl_persona_NOMBRES as nombres, P.tbl_persona_APELLIDOS as apellidos,
            S.tbl_sede_NOMBRE as nombre_sede, C.tbl_centro_NOMBRE as nombre_centro, R.tbl_regional_NOMBRE as nombre_regional FROM tbl_ficha_vs_instructor as FI 
            inner join tbl_ficha as F on FI.tbl_ficha_ID =F.tbl_ficha_ID inner join tbl_persona as P on FI.tbl_instructor_ID=P.tbl_persona_ID inner join tbl_sede as S on FI.tbl_sede_ID=S.tbl_sede_ID inner join 
            tbl_centro as C on S.tbl_centro_tbl_centro_ID= C.tbl_centro_ID inner join tbl_regional as R on C.tbl_regional_tbl_regional_ID= R.tbl_regional_ID");
            $x->execute();
            return $x->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            $x=Conexion::conectar()->prepare("SELECT FI.tbl_ficha_vs_instructor_ID as id_fvsi, F.tbl_ficha_CODIGO as ficha_codigo, P.tbl_persona_NOMBRES as nombres, P.tbl_persona_APELLIDOS as apellidos,
            S.tbl_sede_NOMBRE as nombre_sede, C.tbl_centro_NOMBRE as nombre_centro, R.tbl_regional_NOMBRE as nombre_regional FROM tbl_ficha_vs_instructor as FI 
            inner join tbl_ficha as F on FI.tbl_ficha_ID =F.tbl_ficha_ID inner join tbl_persona as P on FI.tbl_instructor_ID=P.tbl_persona_ID inner join tbl_sede as S on FI.tbl_sede_ID=S.tbl_sede_ID inner join 
            tbl_centro as C on S.tbl_centro_tbl_centro_ID= C.tbl_centro_ID inner join tbl_regional as R on C.tbl_regional_tbl_regional_ID= R.tbl_regional_ID
            WHERE FI.tbl_sede_ID=:id_sede");
             $x->bindParam(":id_sede", $id_sede, PDO::PARAM_INT);
            $x->execute();
            return $x->fetchAll(PDO::FETCH_ASSOC);
        }
        
        
    }

   

    static public function GuardarFVSI($id_ficha,$id_instructor,$id_sede,$estado)
    {
          $y=Conexion::conectar()->prepare("SELECT COUNT(*) FROM  tbl_ficha_vs_instructor WHERE tbl_instructor_ID=:id_instructor and tbl_ficha_ID=:id_ficha");
          $y->bindParam(":id_instructor",  $id_instructor, PDO::PARAM_INT);
          $y->bindParam(":id_ficha",  $id_ficha, PDO::PARAM_INT);
          $y->execute();
          $n = $y->fetchColumn();
          if($n>0)
          {
            return false;
          }
          else
          {
             $x=Conexion::conectar()->prepare("INSERT INTO tbl_ficha_vs_instructor (tbl_ficha_vs_instructor_ID,tbl_instructor_ID,tbl_ficha_ID,tbl_sede_ID, tbl_ESTADO ) VALUES (null, :id_instructor, :id_ficha, :id_sede, :estado)");
             $x->bindParam(":id_instructor", $id_instructor, PDO::PARAM_INT);
             $x->bindParam(":id_ficha", $id_ficha, PDO::PARAM_INT);
             $x->bindParam(":id_sede", $id_sede, PDO::PARAM_INT);
             $x->bindParam(":estado", $estado, PDO::PARAM_STR);
             if($x->execute()){ return true; }else{ return false;}
          }
    }

    static public function ConsultarFVSI($id)
    {
         $x=Conexion::conectar()->prepare("SELECT FI.tbl_ficha_ID as id_ficha, FI.tbl_instructor_ID as id_instructor, FI.tbl_sede_ID as id_sede, S.tbl_centro_tbl_centro_ID as id_centro,
          C.tbl_regional_tbl_regional_ID as id_regional FROM tbl_ficha_vs_instructor as FI inner join tbl_sede as S on FI.tbl_sede_ID=S.tbl_sede_ID inner join tbl_centro as C on
           S.tbl_centro_tbl_centro_ID=C.tbl_centro_ID WHERE tbl_ficha_vs_instructor_ID=:id_fvsi");
         $x->bindParam(":id_fvsi", $id, PDO::PARAM_INT);
         $x->execute();
         return $x->fetch(PDO::FETCH_ASSOC);
    }

    static public function ActualizarFVSI($datos)
    {
        $x=Conexion::conectar()->prepare("UPDATE tbl_ficha_vs_instructor SET tbl_ficha_ID=:id_ficha where tbl_ficha_vs_instructor_ID=:id_fvsi ");
          $x->bindParam(":id_ficha", $datos['ficha'], PDO::PARAM_INT);
         $x->bindParam(":id_fvsi", $datos['id_fvsi'], PDO::PARAM_INT);
         if($x->execute()){ return true; }else{ return false;}
    }

    static public function EliminarFVSI($id)
    {
        $x=Conexion::conectar()->prepare("DELETE FROM tbl_ficha_vs_instructor where tbl_ficha_vs_instructor_ID=:id_fvsi");
        $x->bindParam(":id_fvsi", $id, PDO::PARAM_INT);
        if($x->execute()){ return true; }else{ return false;}
    }
   
}
