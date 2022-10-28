<?php

require_once "conexion.php";


Class ModeloUsuarios{
    static public function ConsultarUsuario($valor)
    {
        $x=Conexion::conectar()->prepare("SELECT count(*) FROM tbl_persona WHERE tbl_persona_NUMDOCUMENTO=:numero_documento");
        $x->bindParam(":numero_documento", $valor, PDO::PARAM_STR);
        $x->execute();
        $a=Conexion::conectar()->prepare("SELECT count(*) FROM tbl_empresa WHERE tbl_empresa_CORREO=:correo");
        $a->bindParam(":correo", $valor, PDO::PARAM_STR);
        $a->execute();
        $b = $a->fetchColumn();
        $n = $x->fetchColumn();
        if($n>0)
        {
            $z=Conexion::conectar()->prepare("SELECT P.tbl_persona_ID as id_persona, P.tbl_persona_NUMDOCUMENTO as numero_documento, 
            C.tbl_cargo_TIPO as cargo, P.tbl_persona_password as password, P.tbl_persona_sede_ID as id_sede
            FROM tbl_persona as P inner join tbl_cargo as C on P.tbl_cargo_tbl_cargo_ID=C.tbl_cargo_ID
            WHERE P.tbl_persona_NUMDOCUMENTO=:numero_documento");
            $z->bindParam(":numero_documento", $valor, PDO::PARAM_STR);
            $z->execute();
            return $z->fetch();
        }
        elseif ($b>0) {
            $c=Conexion::conectar()->prepare("SELECT E.tbl_empresa_ID as id_empresa, E.tbl_empresa_CORREO as correo, 
            E.tbl_empresa_CLAVE as password, E.tbl_empresa_CARGONOMBRE as cargo, E.tbl_sede_ID as id_sede
            FROM tbl_empresa as E WHERE tbl_empresa_CORREO=:correo");
            $c->bindParam(":correo", $valor, PDO::PARAM_STR);
            $c->execute();
            return $c->fetch();
        }
        {
            $y=Conexion::conectar()->prepare("SELECT A.tbl_aprendiz_ID as id_aprendiz, A.tbl_aprendiz_CORREO as correo, 
            A.tbl_aprendiz_PASSWORD as password, A.tbl_aprendiz_CARGO as cargo, A.tbl_aprendiz_SEDE as id_sede
            FROM tbl_aprendiz as A WHERE tbl_aprendiz_CORREO=:correo");
            $y->bindParam(":correo", $valor, PDO::PARAM_STR);
            $y->execute();
            return $y->fetch();
        }

    }
    static public function ActualizarDatos($datos)
    {
        $x=Conexion::conectar()->prepare("UPDATE tbl_persona SET tbl_persona_NOMBRES = :nombres, tbl_persona_APELLIDOS = :apellidos, tbl_persona_DIRECCION = :direccion, tbl_persona_TELEFONO = :telefono, tbl_persona_CORREO = :correo WHERE tbl_persona_ID = :id_usuario ");
        $x->bindParam(":id_usuario", $datos['id_usuario'], PDO::PARAM_INT);
        $x->bindParam(":nombres", $datos['nombres'], PDO::PARAM_STR);
        $x->bindParam(":apellidos", $datos['apellidos'], PDO::PARAM_STR);
        $x->bindParam(":direccion", $datos['direccion'], PDO::PARAM_STR);
        $x->bindParam(":telefono", $datos['telefono'], PDO::PARAM_STR);
        $x->bindParam(":correo", $datos['correo'], PDO::PARAM_STR);
        if($x->execute()){ return true; }else{ return false;}
        
    }
    static public function ActualizarDatosAprendiz($datos)
    {
        $x=Conexion::conectar()->prepare("UPDATE tbl_aprendiz SET tbl_aprendiz_DIRECCION=:direccion, tbl_aprendiz_CELULAR=:telefono,
         tbl_aprendiz_CORREO=:correo WHERE tbl_aprendiz_ID=:id_aprendiz ");
        $x->bindParam(":id_aprendiz", $datos['id_aprendiz'], PDO::PARAM_INT);
        $x->bindParam(":direccion", $datos['direccion'], PDO::PARAM_STR);
        $x->bindParam(":telefono", $datos['telefono'], PDO::PARAM_STR);
        $x->bindParam(":correo", $datos['correo'], PDO::PARAM_STR);
        if($x->execute()){ return true; }else{ return false;}
    }
    static public function DatosUsuario($id)
    {
        $x=Conexion::conectar()->prepare("SELECT  P.tbl_persona_NUMDOCUMENTO as cedula,  P.tbl_persona_NOMBRES as nombres, 
        P.tbl_persona_APELLIDOS as apellidos, P.tbl_cargo_tbl_cargo_ID, 
        P.tbl_persona_DIRECCION as direccion, P.tbl_persona_TELEFONO as telefono, P.tbl_persona_CORREO as correo, C.tbl_cargo_TIPO as cargo, 
        P.tbl_persona_password as password FROM tbl_persona as P inner join tbl_cargo as C on P.tbl_cargo_tbl_cargo_ID=C.tbl_cargo_ID 
        WHERE P.tbl_persona_ID=:id_usuario");
        $x->bindParam(":id_usuario", $id, PDO::PARAM_INT);
        $x->execute();
        return $x->fetch();
    }
    static public function DatosUsuarioAprendiz($id)
    {
        $x=Conexion::conectar()->prepare("SELECT A.tbl_aprendiz_ID as id_aprendiz, A.tbl_aprendiz_DOCUMENTO as numero_documento, 
        A.tbl_aprendiz_NOMBRES as nombres, A.tbl_aprendiz_APELLIDOS as apellidos, A.tbl_aprendiz_CELULAR as telefono, 
        A.tbl_aprendiz_CORREO as correo, A.tbl_aprendiz_PASSWORD as password, A.tbl_aprendiz_DIRECCION as direccion, 
        T.tbl_tipodocumento_NOMBRE as tipo_documento, F.tbl_ficha_CODIGO as ficha, P.tbl_programa_NOMBRE as programa, A.tbl_aprendiz_CARGO as cargo 
        FROM tbl_aprendiz as A inner join tbl_tipodocumento as T on A.tbl_tipodocumento_ID=T.tbl_tipodocumento_ID 
        inner join tbl_ficha as F on A.tbl_ficha_ID=F.tbl_ficha_ID inner join tbl_programa as P on A.tbl_programa_ID=P.tbl_programa_ID 
        WHERE tbl_aprendiz_ID=:id_aprendiz");
        $x->bindParam(":id_aprendiz", $id, PDO::PARAM_INT);
        $x->execute();
        return $x->fetch();
    }
    static public function DatosUsuarioEmpresa($id)
    {
        $x=Conexion::conectar()->prepare("SELECT E.tbl_empresa_ID as id_empresa, E.tbl_empresa_NUMDOCUMENTO as numero_documento, 
        E.tbl_empresa_NOMBRE as nombreEmpresa, E.tbl_empresa_CELULAR as telefono, E.tbl_empresa_CORREO as correo, E.tbl_empresa_CARGONOMBRE as cargo,
        E.tbl_empresa_DIRECCION as direccion, E.tbl_empresa_CLAVE as password
        FROM tbl_empresa as E inner join tbl_cargo as C on E.tbl_cargo_ID=C.tbl_cargo_ID
        WHERE tbl_empresa_ID=:id_empresa");
        $x->bindParam(":id_empresa", $id, PDO::PARAM_INT);
        $x->execute();
        return $x->fetch();
    }
    static public function DatosPeticiones($id_peticiones)
    {
        $x=Conexion::conectar()->prepare("SELECT P.tbl_peticiones_ID as id_peticiones, P.tbl_peticiones_CantAPRENDIZES as cantidadAprendizes, 
        TS.tbl_tipoSolicitud_ID as tipoSolicitud, PR.tbl_programa_NOMBRE as id_programa, P.tbl_peticiones_MOTIVO as motivo,
        E.tbl_empresa_ID as id_empresa FROM tbl_peticiones as P 
        inner join tbl_tipo_solicitud as TS on P.tbl_tipoSolicitud_ID=T.tbl_tipoSolicitud_ID
        inner join tbl_programa as PR on P.tbl_programa_ID = PR.tbl_programa_ID
        inner join tbl_empresa as E on P.tbl_empresa_ID = E.tbl_empresa_ID
        WHERE tbl_peticiones_ID=:id_peticiones");
        $x->bindParam(":id_peticiones", $id_peticiones, PDO::PARAM_INT); 
        $x->execute();
        return $x->fetch();
    }
} 
?>


