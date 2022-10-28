<?php
require_once "../modelo/ReportesModelo.php";
class ReportesControlador
{
	public function ListarReporteIntructorHoy()
    {
	  	 $respuesta = ReportesModelo::ListarReporteIntructorHoy();
         return $respuesta;
	}
	public function ListarReporteAprendizHoy()
    {
	  	 $respuesta = ReportesModelo::ListarReporteAprendizHoy();
         return $respuesta;
	}
	public function ListarReporteIntructorEntreFechas($fechaI,$fechaF)
    {
	  	 $respuesta = ReportesModelo::ListarReporteIntructorEntreFechas($fechaI,$fechaF);
         return $respuesta;
	}

	public function ListarReporteAprendizEntreFechas($fechaI,$fechaF)
    {
	  	 $respuesta = ReportesModelo::ListarReporteAprendizEntreFechas($fechaI,$fechaF);
         return $respuesta;
	}
}



if(isset($_POST["opcion"]))
{
	if($_POST["opcion"]=="ListarReporteInstructorHoy"):
		$respuesta = new ReportesControlador();
		$respuesta =$respuesta -> ListarReporteIntructorHoy();
		 if($respuesta == false):
            echo 1;
         else:
			echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
		 endif;
		 
    elseif($_POST["opcion"]=="ListarReporteAprendizHoy"):
		$respuesta = new ReportesControlador();
		$respuesta =$respuesta -> ListarReporteAprendizHoy();
		 if($respuesta == false):
            echo 1;
         else:
			echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
		 endif;
	elseif($_POST["opcion"]=="ListarReporteInstructorEntreFechas"):
		$fechaI = (isset($_POST['fechaI'])) ? $_POST['fechaI'] : null;
		$fechaF = (isset($_POST['fechaF'])) ? $_POST['fechaF'] : null;
		$respuesta = new ReportesControlador();
		$respuesta =$respuesta -> ListarReporteIntructorEntreFechas($fechaI,$fechaF);
		 if($respuesta == false):
            echo 1;
         else:
			echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
		 endif;
	elseif($_POST["opcion"]=="ListarReporteAprendizEntreFechas"):
		$fechaI = (isset($_POST['fechaI'])) ? $_POST['fechaI'] : null;
		$fechaF = (isset($_POST['fechaF'])) ? $_POST['fechaF'] : null;
		$respuesta = new ReportesControlador();
		$respuesta =$respuesta -> ListarReporteAprendizEntreFechas($fechaI,$fechaF);
		 if($respuesta == false):
			echo 1;
		 else:
			echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
		 endif;
	endif;
}





   
?> 
