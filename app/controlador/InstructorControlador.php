<?php
require_once "../modelo/InstructorModelo.php";
class InstructorControlador
{
	public function ListarFichaPorInstructor($id_instructor)
    {
	  	 $respuesta = InstructorModelo::ListarFichaPorInstructor($id_instructor);
         return $respuesta;
	}
	public function ListarAprendizPorFichaYAsistencia($id_ficha)
    {
	  	 $respuesta = InstructorModelo::ListarAprendizPorFichaYAsistencia($id_ficha);
         return $respuesta;
	}
}



if(isset($_POST["opcion"]))
{
	if($_POST["opcion"]=="ListarFichaPorInstructor"):
		$id_instructor = (isset($_POST['id_instructor'])) ? $_POST['id_instructor'] : null;
		$respuesta = new InstructorControlador();
		$respuesta =$respuesta -> ListarFichaPorInstructor($id_instructor);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	else:
		if($_POST["opcion"]=="ListarAprendizPorFichaYAsistencia"):
			$id_ficha = (isset($_POST['id_ficha'])) ? $_POST['id_ficha'] : null;
			$respuesta = new InstructorControlador();
			$respuesta =$respuesta -> ListarAprendizPorFichaYAsistencia($id_ficha);
			if($respuesta==false):
			    echo 1;
			else:
			  echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
			endif;
		endif;
    endif;
}





   
?> 
