<?php


session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SENA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">

  

  <!-- Favicons -->
  <link href="public/assets/img/logosena.png" rel="icon">


  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  

  
   <link href="public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">

   <link href="public/assets/css/datatable.min.css" rel="stylesheet">
  <link href="public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"> 
  <link href="public/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="public/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="public/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="public/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="public/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  <link href="public/assets/css/style.css?n=2" rel="stylesheet">
  
  <!-- Sweet Alert -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <!-- Sweet Alert -->
  <!-- Include a required theme --
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>-->

  
</head>

<body>

  <?php

    if (isset($_SESSION["sesion_active"]) && ($_SESSION["sesion_active"]["tipo_usuario"] == "ADMINISTRADOR")) 
    {
        require_once "app/controlador/LoginControlador.php";
        include "app/vista/MENU/navAdministrador.php";
        include "app/vista/MENU/menuAdministrador.php";
        if (isset($_GET["ruta"]) &&$_GET["ruta"] == "index" ) :
            include "app/vista/HOME/ADMINISTRADOR/index.php";
        elseif (isset($_GET["ruta"]) && $_GET["ruta"] == "fidelizacion") :
            include "app/vista/FIDELIZACION/index.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "autoreporte") :
            include "app/vista/SECURITA/autoreporte.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "perfil") :
            include "app/vista/HOME/PERFIL/perfil.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "salir") :
            include "app/vista/LOGIN/salir.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "DatosPersonal") :
            include "app/vista/PERSONAL/DatosPersonal.php";
          elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "Bienestar") :
            include "app/vista/FIDELIZACION/Bienestar.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "DatosInstructor") :
            include "app/vista/PERSONAL/DatosInstructor.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "DatosHerramentero") :
            include "app/vista/PERSONAL/DatosHerramentero.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "DatosBienestar") :
            include "app/vista/PERSONAL/DatosBienestar.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "DatosRegional") :
            include "app/vista/CONFIGURACION/DatosRegional.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "DatosCentro") :
            include "app/vista/CONFIGURACION/DatosCentro.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "DatosSede") :
            include "app/vista/CONFIGURACION/DatosSede.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "DatosProgramas") :
            include "app/vista/CONFIGURACION/DatosProgramas.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "DatosFicha") :
            include "app/vista/CONFIGURACION/DatosFicha.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "DatosAprendiz") :
            include "app/vista/PERSONAL/DatosAprendiz.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "DatosInstructorVSFicha") :
            include "app/vista/CONFIGURACION/DatosInstructorVSFicha.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "Reportes") :
            include "app/vista/REPORTES/Reportes.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "ReporteDisciplinario") :
            include "app/vista/FIDELIZACION/ReporteDisciplinario.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "ReportesBienestar") :
            include "app/vista/REPORTES/ReportesBienestar.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "Solicitudes") :
            include "app/vista/SOLICITUDES/Solicitudes.php";
        elseif (isset($_GET["ruta"]) && $_GET["ruta"] == "carnet") :
            include "app/vista/HOME/PERFIL/carnet.php";
        else:
            include "app/vista/HOME/ADMINISTRADOR/index.php";
        endif;
        include "app/vista/MENU/footer.php";
        include "app/vista/MENU/scripts.php";
    } 
    else if (isset($_SESSION["sesion_active"]) && ($_SESSION["sesion_active"]["tipo_usuario"] == "INSTRUCTOR")) 
    {
        require_once "app/controlador/LoginControlador.php";
        require_once "app/controlador/PersonaControlador.php";
        include "app/vista/MENU/navInstructor.php";
        include "app/vista/MENU/menuInstructor.php";
        if (isset($_GET["ruta"]) &&$_GET["ruta"] == "index" ) :
            include "app/vista/HOME/INSTRUCTOR/index.php";
        elseif (isset($_GET["ruta"]) && $_GET["ruta"] == "AsistenciaAprendiz") :
            include "app/vista/HOME/INSTRUCTOR/AsistenciaAprendiz.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "autoreporte") :
            include "app/vista/SECURITA/autoreporte.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "ReporteAprendiz") :
            include "app/vista/HOME/INSTRUCTOR/ReporteAprendiz.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "perfil") :
            include "app/vista/HOME/PERFIL/perfil.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "salir") :
            include "app/vista/LOGIN/salir.php";
        elseif (isset($_GET["ruta"]) && $_GET["ruta"] == "fidelizacion" && $consulta["bienestar"]==1) :
            include "app/vista/FIDELIZACION/index.php";
        elseif (isset($_GET["ruta"]) && $_GET["ruta"] == "ReporteDisciplinario" && $consulta["bienestar"]==1) :
            include "app/vista/FIDELIZACION/ReporteDisciplinario.php";
        elseif (isset($_GET["ruta"]) && $_GET["ruta"] == "carnet") :
            include "app/vista/HOME/PERFIL/carnet.php";
        else:
            include "app/vista/HOME/INSTRUCTOR/index.php";
        endif;
        include "app/vista/MENU/footer.php";
        include "app/vista/MENU/scriptsInstructor.php";
    }
    else if (isset($_SESSION["sesion_active"]) && ($_SESSION["sesion_active"]["tipo_usuario"] == "BIENESTAR")) 
    {
        require_once "app/controlador/LoginControlador.php";
        include "app/vista/MENU/navBienestar.php";
        include "app/vista/MENU/menuBienestar.php";
        if (isset($_GET["ruta"]) &&$_GET["ruta"] == "index" ) :
            include "app/vista/HOME/BIENESTAR/index.php";
        elseif (isset($_GET["ruta"]) && $_GET["ruta"] == "fidelizacion") :
            include "app/vista/FIDELIZACION/index.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "autoreporte") :
            include "app/vista/SECURITA/autoreporte.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "perfil") :
            include "app/vista/HOME/PERFIL/perfil.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "salir") :
            include "app/vista/LOGIN/salir.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "ReporteDisciplinario") :
            include "app/vista/FIDELIZACION/ReporteDisciplinario.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "Bienestar") :
            include "app/vista/FIDELIZACION/Bienestar.php";
        elseif (isset($_GET["ruta"]) && $_GET["ruta"] == "carnet") :
            include "app/vista/HOME/PERFIL/carnet.php";
        else:
            include "app/vista/HOME/BIENESTAR/index.php";
        endif;
        include "app/vista/MENU/footer.php";
        include "app/vista/MENU/scriptsBienestar.php";
    }
    else if (isset($_SESSION["sesion_active"]) && ($_SESSION["sesion_active"]["tipo_usuario"] == "PARAMETRIZACION")) 
    {
        require_once "app/controlador/LoginControlador.php";
        include "app/vista/MENU/navParametrizacion.php";
        include "app/vista/MENU/menuParametrizacion.php";
        if (isset($_GET["ruta"]) &&$_GET["ruta"] == "index" ) :
            include "app/vista/HOME/PARAMETRIZACION/index.php";
        elseif (isset($_GET["ruta"]) && $_GET["ruta"] == "bienestar") :
            include "app/vista/FIDELIZACION/Bienestar.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "autoreporte") :
            include "app/vista/SECURITA/autoreporte.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "perfil") :
            include "app/vista/HOME/PERFIL/perfil.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "salir") :
            include "app/vista/LOGIN/salir.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "DatosPersonal") :
            include "app/vista/PERSONAL/DatosPersonal.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "DatosInstructor") :
            include "app/vista/PERSONAL/DatosInstructor.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "DatosHerramentero") :
            include "app/vista/PERSONAL/DatosHerramentero.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "DatosBienestar") :
            include "app/vista/PERSONAL/DatosBienestar.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "DatosRegional") :
            include "app/vista/CONFIGURACION/DatosRegional.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "DatosCentro") :
            include "app/vista/CONFIGURACION/DatosCentro.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "DatosSede") :
            include "app/vista/CONFIGURACION/DatosSede.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "DatosProgramas") :
            include "app/vista/CONFIGURACION/DatosProgramas.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "DatosFicha") :
            include "app/vista/CONFIGURACION/DatosFicha.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "DatosAprendiz") :
            include "app/vista/PERSONAL/DatosAprendiz.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "DatosInstructorVSFicha") :
            include "app/vista/CONFIGURACION/DatosInstructorVSFicha.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "Reportes") :
            include "app/vista/REPORTES/Reportes.php";  
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "ReporteDisciplinario") :
            include "app/vista/FIDELIZACION/ReporteDisciplinario.php";  
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "ReportesBienestar") :
            include "app/vista/REPORTES/ReportesBienestar.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "Solicitudes") :
            include "app/vista/SOLICITUDES/Solicitudes.php";
        elseif (isset($_GET["ruta"]) && $_GET["ruta"] == "carnet") :
            include "app/vista/HOME/PERFIL/carnet.php";
        else:
            include "app/vista/HOME/ADMINISTRADOR/index.php";
        endif;
        include "app/vista/MENU/footer.php";
        include "app/vista/MENU/scripts.php";
    }
    else if (isset($_SESSION["sesion_active"]) && ($_SESSION["sesion_active"]["tipo_usuario"] == "APRENDIZ")) 
    {
        require_once "app/controlador/LoginControlador.php";
        include "app/vista/MENU/navAprendiz.php";
        include "app/vista/MENU/menuAprendiz.php";
        if (isset($_GET["ruta"]) &&$_GET["ruta"] == "index" ) :
            include "app/vista/HOME/APRENDIZ/index.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "salir") :
            include "app/vista/LOGIN/salir.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "perfilAprendiz") :
            include "app/vista/HOME/PERFIL/perfilAprendiz.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "certificacion") :
            include "app/vista/HOME/APRENDIZ/certificacion.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "autoreporte") :
            include "app/vista/SECURITA/autoreporte.php";
        elseif (isset($_GET["ruta"]) && $_GET["ruta"] == "carnet") :
            include "app/vista/HOME/PERFIL/carnet.php";
        else:
            include "app/vista/HOME/APRENDIZ/index.php";
        endif;
        include "app/vista/MENU/footer.php";
        include "app/vista/MENU/scriptsAprendiz.php";
    }
    else if(isset($_SESSION["sesion_active"]) && ($_SESSION["sesion_active"]["tipo_usuario"] == "PORTERIA"))
    {
        require_once "app/controlador/LoginControlador.php";
        include "app/vista/MENU/navAprendiz.php";
        include "app/vista/MENU/menuPorteria.php";
        if (isset($_GET["ruta"]) &&$_GET["ruta"] == "index" ) :
            include "app/vista/HOME/PORTERIA/index.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "Ingreso") :
            include "app/vista/HOME/PORTERIA/Ingreso.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "salir") :
            include "app/vista/LOGIN/salir.php";
        else:
            include "app/vista/HOME/PORTERIA/index.php";
        endif;
        include "app/vista/MENU/footer.php";
        include "app/vista/MENU/scriptsPorteria.php";
    }
    else if(isset($_SESSION["sesion_active"]) && ($_SESSION["sesion_active"]["tipo_usuario"] == "EMPRESA"))
    {
        require_once "app/controlador/LoginControlador.php";
        include "app/vista/MENU/navEmpresa.php";
        include "app/vista/MENU/menuEmpresa.php";
        if (isset($_GET["ruta"]) &&$_GET["ruta"] == "index" ) :
            include "app/vista/HOME/EMPRESA/index.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "salir") :
            include "app/vista/LOGIN/salir.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "perfilEmpresa") :
            include "app/vista/HOME/PERFIL/perfilEmpresa.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "EnviarPeticiones") :
            include "app/vista/HOME/EMPRESA/peticion.php";
            elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "peticionesRecibidas") :
                include "app/vista/HOME/EMPRESA/peticionesRecibidas.php";
        elseif (isset($_GET["ruta"]) &&$_GET["ruta"] == "autoreporte") :
            include "app/vista/SECURITA/autoreporte.php";
        elseif (isset($_GET["ruta"]) && $_GET["ruta"] == "carnet") :
            include "app/vista/HOME/PERFIL/carnet.php";
        else:
            include "app/vista/HOME/EMPRESA/index.php";
        endif;
        include "app/vista/MENU/footer.php";
        include "app/vista/MENU/scriptsEmpresa.php";
    }
    else
    {
        require_once "app/controlador/LoginControlador.php";
        include "app/vista/LOGIN/index.php";
    }

  ?>


</body>

</html>