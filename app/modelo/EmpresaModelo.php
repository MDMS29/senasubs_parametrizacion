<?php

require_once "../modelo/conexion.php";

class EmpresaModelo
{
    //LISTAR DATOS
    static public function ListarEmpresa()
    { {
            $x = Conexion::conectar()->prepare("SELECT E.tbl_empresa_ID as idEmpresa, E.tbl_empresa_NUMDOCUMENTO as numeroDocumento, 
            E.tbl_empresa_NOMBRE as nombreEmpresa, E.tbl_empresa_DIRECCION as direccion, E.tbl_empresa_CELULAR as telefono,
            E.tbl_empresa_CORREO as correo, E.tbl_empresa_TIPODOCUMENTO as tipoDocumento, C.tbl_cargo_TIPO as cargo, 
            S.tbl_sede_NOMBRE as sede FROM tbl_empresa as E inner join tbl_sede as S on E.tbl_sede_ID= S.tbl_sede_ID
            inner join tbl_cargo as C on E.tbl_cargo_ID= C.tbl_cargo_ID");
            $x->execute();
            return $x->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    static public function ListarPeticiones()
    { {
            $x = Conexion::conectar()->prepare("SELECT P.tbl_peticiones_ID as idPeticiones, P.tbl_peticiones_CantAPRENDIZES as cantidadAprendizes, 
            F.tbl_formacion_TIPO as formacion, PR.tbl_programa_NOMBRE as programa, P.tbl_peticiones_MOTIVO as motivo,
            P.tbl_peticiones_FECHA as fecha, P.tbl_peticiones_HORA as hora, P.tbl_peticiones_NEMPRESA as nombreEmpresa 
            FROM tbl_peticiones as P inner join tbl_formacion as F on P.tbl_formacion_ID= F.tbl_formacion_ID
            inner join tbl_programa as PR on P.tbl_programa_ID= PR.tbl_programa_ID WHERE tbl_tipovalidacion_ID = 3");
            $x->execute();
            return $x->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    static public function ListarSolicitudesAcepODen()
    { {
            $x = Conexion::conectar()->prepare("SELECT TS.tbl_solicitud_ID as idSolicitud, TS.tbl_solicitud_MOTIVO as motivo,
            S.tbl_sede_NOMBRE as sede, V.tbl_validacion_TIPO as validacion
            FROM tbl_solicitud as TS inner join tbl_sede as S on TS.tbl_solicitud_SEDE = S.tbl_sede_ID
            inner join tbl_validacion as V on TS.tbl_validacion_ID = V.tbl_validacion_ID");
            $x->execute();
            return $x->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    static public function ListarValidacion()
    { {
            $x = Conexion::conectar()->prepare("SELECT V.tbl_validacion_ID as idValidacion, V.tbl_validacion_MOTIVO as motivoValidacion, 
            TV.tbl_tipovalidacion_TIPO as tipoValidacion, S.tbl_sede_NOMBRE as sede
            FROM tbl_validacion as V inner join tbl_sede as S on V.tbl_sede_ID = S.tbl_sede_ID
            inner join tbl_tipovalidacion as TV on V.tbl_tipovalidacion_ID = TV.tbl_tipovalidacion_ID");
            $x->execute();
            return $x->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    static public function ListarValidacionPorEmpresa()
    { {
            $x = Conexion::conectar()->prepare("SELECT V.tbl_validacion_ID as idValidacion, V.tbl_validacion_MOTIVO as motivoValidacion, 
            TV.tbl_tipovalidacion_TIPO as tipoValidacion, S.tbl_sede_NOMBRE as sede, E.tbl_empresa_NOMBRE as nombreEmpresa
            FROM tbl_validacion as V inner join tbl_sede as S on V.tbl_sede_ID = S.tbl_sede_ID
            inner join tbl_tipovalidacion as TV on V.tbl_tipovalidacion_ID = TV.tbl_tipovalidacion_ID
            inner join tbl_empresa as E on V.tbl_empresa_ID= E.tbl_empresa_ID
            WHERE V.tbl_empresa_ID = :idEmpresa");
            $x->execute();
            return $x->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    static public function ListarProgramaTecniTecno($datos)
    { {
            $x = Conexion::conectar()->prepare("SELECT * FROM tbl_programa WHERE tbl_formacion_ID=:tipoFormacion");
            $x->bindParam(":tipoFormacion", $datos['formacion'], PDO::PARAM_STR);
            $x->execute();
            return $x->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    // GUARDAR(Insertar) DATOS
    static public function GuardarEmpresa($datos)
    {
        $y = Conexion::conectar()->prepare("SELECT COUNT(*) FROM  tbl_empresa WHERE tbl_empresa_NUMDOCUMENTO=:numeroDocumento");
        $y->bindParam(":numeroDocumento", $datos['numeroDocumentoEmp'], PDO::PARAM_INT);
        $y->execute();
        $n = $y->fetchColumn();
        if ($n > 0) {
            return false;
        } else {
            $x = Conexion::conectar()->prepare("INSERT INTO tbl_empresa(tbl_empresa_ID, tbl_empresa_NUMDOCUMENTO , tbl_empresa_NOMBRE,
            tbl_empresa_DIRECCION, tbl_empresa_CELULAR, tbl_empresa_CORREO, tbl_empresa_CLAVE, tbl_cargo_ID, tbl_tipodocumento_ID, 
            tbl_empresa_TIPODOCUMENTO, tbl_empresa_CARGONOMBRE, tbl_sede_ID) 
            VALUES (null, :numeroDocumento, :nombreEmpresa, :direccion, :telefono, :correo, :password, :cargo, :tipoDocumento, :documento, :nombreCargo, :sede)");
            $x->bindParam(":numeroDocumento", $datos['numeroDocumento'], PDO::PARAM_INT);
            $x->bindParam(":nombreEmpresa", $datos['nombreEmpresa'], PDO::PARAM_STR);
            $x->bindParam(":direccion", $datos['direccion'], PDO::PARAM_STR);
            $x->bindParam(":telefono", $datos['telefono'], PDO::PARAM_STR);
            $x->bindParam(":correo", $datos['correo'], PDO::PARAM_STR);
            $x->bindParam(":password", $datos['password'], PDO::PARAM_STR);
            $x->bindParam(":cargo", $datos['cargo'], PDO::PARAM_INT);
            $x->bindParam(":tipoDocumento", $datos['tipoDocumento'], PDO::PARAM_INT);
            $x->bindParam(":documento", $datos['documento'], PDO::PARAM_STR);
            $x->bindParam(":nombreCargo", $datos['nombreCargo'], PDO::PARAM_STR);
            $x->bindParam(":sede", $datos['sede'], PDO::PARAM_INT);
            $x->execute();
            return true;
        }
    }

    static public function GuardarPeticiones($datos)
    {
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $tipoValidacion = 3;

        $x = Conexion::conectar()->prepare("INSERT INTO tbl_peticiones( tbl_peticiones_CantAPRENDIZES, tbl_formacion_ID,  
            tbl_programa_ID, tbl_peticiones_MOTIVO, tbl_peticiones_FECHA, tbl_peticiones_HORA, tbl_peticiones_NEMPRESA, tbl_tipovalidacion_ID) 
            VALUES ( :cantidadAprendizes, :formacion, :programa, :motivo,  :fecha, :hora, :nombreEmpresa, :tipovalidacion)");
        $x->bindParam(":cantidadAprendizes", $datos['cantidadAprendizes'], PDO::PARAM_STR);
        $x->bindParam(":formacion", $datos['formacion'], PDO::PARAM_STR);
        $x->bindParam(":programa", $datos['programa'], PDO::PARAM_STR);
        $x->bindParam(":motivo", $datos['motivo'], PDO::PARAM_STR);
        $x->bindParam(":fecha", $fecha, PDO::PARAM_STR);
        $x->bindParam(":hora", $hora, PDO::PARAM_STR);
        $x->bindParam(":nombreEmpresa", $datos['nombreEmpresa'], PDO::PARAM_STR);
        $x->bindParam(":tipovalidacion", $tipoValidacion, PDO::PARAM_STR);

        if ($x->execute()) {
            return true;
        } else {
            return false;
        }
    }

    static public function EnviarValidacion($datos)
    {
        $x = conexion::conectar()->prepare("INSERT INTO tbl_validacion(tbl_validacion_ID, tbl_sede_ID, tbl_tipovalidacion_ID, tbl_validacion_MOTIVO, tbl_peticiones_ID)
            VALUES (null, :sede, :tipoValidacion, :motivo, :idValidacion)");
        $x->bindParam(":sede", $datos['sede'], PDO::PARAM_INT);
        $x->bindParam(":tipoValidacion", $datos['tipoValidacion'], PDO::PARAM_INT);
        $x->bindParam(":motivo", $datos['motivo'], PDO::PARAM_STR);
        $x->bindParam(":idValidacion", $datos['idValidacion'], PDO::PARAM_STR);
        if ($x->execute()) {
            return true;
        } else {
            return false;
        }
    }
    //ACTUALIZAR DATOS
    static public function ActualizarDatosEmpresa($datos)
    {
        $x = Conexion::conectar()->prepare("UPDATE tbl_empresa SET tbl_empresa_NUMDOCUMENTO=:numeroDocumento, tbl_empresa_NOMBRE=:nombreEmpresa,
            tbl_empresa_DIRECCION=:direccion, tbl_empresa_CELULAR=:telefono, tbl_empresa_CORREO=:correo,
            tbl_empresa_TIPODOCUMENTO=:tipoDocumento, tbl_cargo_ID=:cargo, tbl_sede_ID=:sede
            WHERE tbl_empresa_ID = :idEmpresa)");
        $x->bindParam(":numeroDocumento", $datos['numeroDocumento2'], PDO::PARAM_STR);
        $x->bindParam(":nombreEmpresa", $datos['nombreEmpresa2'], PDO::PARAM_STR);
        $x->bindParam(":direccion", $datos['direccion2'], PDO::PARAM_STR);
        $x->bindParam(":telefono", $datos['telefono2'], PDO::PARAM_STR);
        $x->bindParam(":correo", $datos['correo2'], PDO::PARAM_STR);
        $x->bindParam(":tipoDocumento", $datos['tipoDocumento2'], PDO::PARAM_STR);
        $x->bindParam(":cargo", $datos['cargo2'], PDO::PARAM_STR);
        $x->bindParam(":idEmpresa", $datos['idEmpresa2'], PDO::PARAM_STR);
        $x->bindParam(":sede", $datos['sede2'], PDO::PARAM_STR);

        if ($x->execute()) {
            return true;
        } else {
            return false;
        }
    }

    static public function ActualizarEmpresa($datos)
    {
        $x = Conexion::conectar()->prepare("UPDATE tbl_empresa SET tbl_empresa_NUMDOCUMENTO=:numeroDocumento, tbl_empresa_NOMBRE=:nombreEmpresa,
            tbl_empresa_DIRECCION=:direccion, tbl_empresa_CELULAR=:telefono, tbl_empresa_CORREO=:correo, tbl_empresa_CLAVE=:password,
            tbl_tipodocumento_ID= :tipoDocumento, tbl_cargo_ID = :cargo, tbl_sede_ID = :sede
            WHERE tbl_empresa_ID = :idEmpresa");
        $x->bindParam(":idEmpresa", $datos['idEmpresa'], PDO::PARAM_STR);
        $x->bindParam(":numeroDocumento", $datos['numeroDocumento'], PDO::PARAM_INT);
        $x->bindParam(":nombreEmpresa", $datos['nombreEmpresa'], PDO::PARAM_STR);
        $x->bindParam(":direccion", $datos['direccion'], PDO::PARAM_STR);
        $x->bindParam(":telefono", $datos['telefono'], PDO::PARAM_STR);
        $x->bindParam(":correo", $datos['correo'], PDO::PARAM_STR);
        $x->bindParam(":password", $datos['password'], PDO::PARAM_STR);
        $x->bindParam(":tipoDocumento", $datos['tipoDocumento'], PDO::PARAM_INT);
        $x->bindParam(":cargo", $datos['cargo'], PDO::PARAM_INT);
        $x->bindParam(":sede", $datos['sede'], PDO::PARAM_INT);
        if ($x->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //CONSULTAR DATOS
    static public function ConsultarEmpresa($datos)
    {
        $x = Conexion::conectar()->prepare("SELECT E.tbl_empresa_ID as idEmpresa, E.tbl_empresa_NUMDOCUMENTO as numeroDocumento, E.tbl_empresa_NOMBRE as nombreEmpresa,
        E.tbl_empresa_DIRECCION as direccion, E.tbl_empresa_CELULAR as telefono, E.tbl_empresa_CORREO as correo, 
        E.tbl_empresa_CLAVE as password, E.tbl_tipodocumento_ID as tipoDocumento, E.tbl_cargo_ID as cargo, E.tbl_sede_ID as sede
        FROM tbl_empresa as E WHERE E.tbl_empresa_ID=:idEmpresa");
        $x->bindParam(":idEmpresa", $datos['idEmpresa'], PDO::PARAM_STR);
        $x->execute();
        return $x->fetchAll(PDO::FETCH_ASSOC);
    }

    //ELIMINAR DATOS
    static public function EliminarEmpresa($id_empresa)
    {
        $x = Conexion::conectar()->prepare("DELETE FROM tbl_empresa WHERE tbl_empresa_ID=:id_empresa");
        $x->bindParam(":id_empresa", $id_empresa, PDO::PARAM_INT);
        if ($x->execute()) {
            return true;
        } else {
            return false;
        }
    }
    //ELIMINAR VALIDACION ENVIADA
    static public function ActualizarValidacion($datos)
    {
        $x = Conexion::conectar()->prepare("UPDATE tbl_peticiones SET tbl_tipoValidacion_ID = :tipoValidacion WHERE tbl_peticiones_ID = :idValidacion");
        $x->bindParam(":tipoValidacion", $datos['tipoValidacion'], PDO::PARAM_INT);
        $x->bindParam(":idValidacion", $datos['idValidacion'], PDO::PARAM_INT);
        if ($x->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
