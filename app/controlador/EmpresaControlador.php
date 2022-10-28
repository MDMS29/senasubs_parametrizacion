<?php
if (isset($_POST["opcion"])) {
	require_once "../modelo/EmpresaModelo.php";
} else {
	//si la opcion no es mandada por ajax entra aqui
	require_once "app/modelo/EmpresaModelo.php";
}

class EmpresaControlador
{
	//LISTAR DATOS
	public function ListarEmpresa()
	{
		$respuesta = EmpresaModelo::ListarEmpresa();
		return $respuesta;
	}
	public function ListarPeticiones()
	{
		$respuesta = EmpresaModelo::ListarPeticiones();
		return $respuesta;
	}
	public function ListarSolicitudesAcepODen()
	{
		$respuesta = EmpresaModelo::ListarSolicitudesAcepODen();
		return $respuesta;
	}
	//Listar Peticiones
	public function ListarValidacion()
	{
		$respuesta = EmpresaModelo::ListarValidacion();
		return $respuesta;
	}
	public function ListarValidacionPorEmpresa()
	{
		$respuesta = EmpresaModelo::ListarValidacionPorEmpresa();
		return $respuesta;
	}

	//Listar los programas tecnicos y tecnologos
	public function ListarProgramaTecniTecno($datos)
	{
		$respuesta = EmpresaModelo::ListarProgramaTecniTecno($datos);
		return $respuesta;
	}

	//GUARDAR DATOS
	public function GuardarEmpresa($datos)
	{
		$respuesta = EmpresaModelo::GuardarEmpresa($datos);
		return $respuesta;
	}
	public function GuardarPeticiones($datos)
	{

		$respuesta = EmpresaModelo::GuardarPeticiones($datos);
		return $respuesta;
	}
	public function EnviarValidacion($datos)
	{
		$respuesta = EmpresaModelo::EnviarValidacion($datos);
		return	$respuesta;
	}

	//ACTUALIZAR DATOS
	public function ActualizarEmpresa($datos)
	{
		$respuesta = EmpresaModelo::ActualizarEmpresa($datos);
		return $respuesta;
	}
	public function ActualizarDatosEmpresa($datos)
	{
		$respuesta = EmpresaModelo::ActualizarDatosEmpresa($datos);
		return $respuesta;
	}
	//CONSULTAR PERSONAS
	public function ConsultarEmpresa($datos)
	{
		$respuesta = EmpresaModelo::ConsultarEmpresa($datos);
		return $respuesta;
	}
	//ELIMINAR EMPRESA
	public function EliminarEmpresa($id_empresa)
	{
		$respuesta = EmpresaModelo::EliminarEmpresa($id_empresa);
		return $respuesta;
	}
	//ELIMINAR VALIDACION ENVIADA
	public function ActualizarValidacion($datos)
	{
		$respuesta = EmpresaModelo::ActualizarValidacion($datos);
		return $respuesta;
	}
}

if (isset($_POST['opcion'])) {
	//LISTAR DATOS
	//echo $_POST['opcion'];
	if ($_POST["opcion"] == "listarEmpresa") {
		$respuesta = new EmpresaControlador();
		$respuesta = $respuesta->ListarEmpresa();
		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	} else {
		if ($_POST["opcion"] == "listarPeticiones") {
			$respuesta = new EmpresaControlador();
			$respuesta = $respuesta->ListarPeticiones();
			echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
		} else {
			if ($_POST["opcion"] == "listarSolicitudesAcepODen") {
				$respuesta = new EmpresaControlador();
				$respuesta = $respuesta->ListarSolicitudesAcepODen();
				echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
			} else {
				if ($_POST["opcion"] == "listarValidacion") {
					$respuesta = new EmpresaControlador();
					$respuesta = $respuesta->ListarValidacion();
					echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
				}
				if ($_POST["opcion"] == "ListarValidacionPorEmpresa") {
					$respuesta = new EmpresaControlador();
					$respuesta = $respuesta->ListarValidacionPorEmpresa();
					echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
				} else {

					if ($_POST["opcion"] == "listarProgramaTecniTecno") {
						$formacion = (isset($_POST['formacion'])) ? $_POST['formacion'] : null;
						$datos = [
							"formacion" => $formacion

						];
						$respuesta = new EmpresaControlador();
						$respuesta = $respuesta->ListarProgramaTecniTecno($datos);

						echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
					}
				}
			}
		}
	}

	//GUARDAR DATOS
	if ($_POST["opcion"] == "GuardarEmpresa") {

		$numeroDocumento = (isset($_POST['numeroDocumento'])) ? $_POST['numeroDocumento'] : null;
		$nombreEmpresa = (isset($_POST['nombreEmpresa'])) ? $_POST['nombreEmpresa'] : null;
		$direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : null;
		$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : null;
		$correo = (isset($_POST['correo'])) ? $_POST['correo'] : null;
		$contraseña = (isset($_POST['contraseña'])) ? $_POST['contraseña'] : null;
		$cargo = (isset($_POST['cargo'])) ? $_POST['cargo'] : null;
		$tipoDocumento = (isset($_POST['tipoDocumento'])) ? $_POST['tipoDocumento'] : null;
		$documento = "NUMERO DE IDENTIFIACCION FISCAL";
		$nombreCargo = "EMPRESA";
		$nombreCargo = (isset($_POST['nombreCargo'])) ? $_POST['nombreCargo'] : null;
		$sede = (isset($_POST['sede'])) ? $_POST['sede'] : null;

		$datos = [
			"numeroDocumento" => $numeroDocumento,
			"nombreEmpresa" => $nombreEmpresa,
			"direccion" => $direccion,
			"telefono" => $telefono,
			"correo" => $correo,
			"password" => $contraseña,
			"cargo" => $cargo,
			"tipoDocumento" => $tipoDocumento,
			"documento" => $documento,
			"nombreCargo" => $nombreCargo,
			"sede" => $sede
		];

		$respuesta = new EmpresaControlador();
		$respuesta = $respuesta->GuardarEmpresa($datos);
		if ($respuesta) :
			echo 1;
		else :
			echo 2;
		endif;
	} else {
		if ($_POST["opcion"] == "GuardarPeticiones") {
			$cantidadAprendizes = (isset($_POST['cantidadAprendizes'])) ? $_POST['cantidadAprendizes'] : null;
			$formacion = (isset($_POST['formacion'])) ? $_POST['formacion'] : null;
			$programa = (isset($_POST['programa'])) ? $_POST['programa'] : null;
			$motivo = (isset($_POST['motivo'])) ? $_POST['motivo'] : null;
			$fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : null;
			$hora = (isset($_POST['hora'])) ? $_POST['hora'] : null;
			$nombreEmpresa = (isset($_POST['nombreEmpresa'])) ? $_POST['nombreEmpresa'] : null;


			$datos = [
				"cantidadAprendizes" => $cantidadAprendizes,
				"formacion" => $formacion,
				"programa" => $programa,
				"motivo" => $motivo,
				"fecha" => $fecha,
				"hora" => $hora,
				"nombreEmpresa" => $nombreEmpresa

			];


			$respuesta = new EmpresaControlador();
			$respuesta = $respuesta->GuardarPeticiones($datos);
			if ($respuesta) :
				echo 1;
			else :
				echo 2;
			endif;
		} else {
			if ($_POST["opcion"] == "EnviarValidacion") {
				$sede = (isset($_POST['sede'])) ? $_POST['sede'] : null;
				$validacion = (isset($_POST['tipoValidacion'])) ? $_POST['tipoValidacion'] : null;
				$motivo = (isset($_POST['motivo'])) ? $_POST['motivo'] : null;
				$idValidacion = (isset($_POST['idValidacion'])) ? $_POST['idValidacion'] : null;
				


				$datos = [
					"sede" => $sede,
					"tipoValidacion" => $validacion,
					"motivo" => $motivo,
					"idValidacion" => $idValidacion
				];

				$respuesta = new EmpresaControlador();
				$respuesta = $respuesta->EnviarValidacion($datos);
				if ($respuesta) :
					echo 1;
				else :
					echo 2;
				endif;
			}
		}
	}
	//CONSULTAR DATOS
	if ($_POST["opcion"] == "ConsultarEmpresa") {
		$idEmpresa = (isset($_POST['idEmpresa'])) ? $_POST['idEmpresa'] : null;
		$datos = ["idEmpresa" => $idEmpresa];
		$respuesta = new EmpresaControlador();
		$respuesta = $respuesta->ConsultarEmpresa($datos);
		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}

	//ACTUALIZAR DATOS
	if ($_POST["opcion"] == "ActualizarEmpresa") {
		// obtenemos todos los datos de la persona para actualizarlos 
		$idEmpresa = (isset($_POST['idEmpresa'])) ? $_POST['idEmpresa'] : null;
		$numeroDocumento = (isset($_POST['numeroDocumento'])) ? $_POST['numeroDocumento'] : null;
		$nombreEmpresa = (isset($_POST['nombreEmpresa'])) ? $_POST['nombreEmpresa'] : null;
		$direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : null;
		$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : null;
		$correo = (isset($_POST['correo'])) ? $_POST['correo'] : null;
		$contraseña = (isset($_POST['contraseña'])) ? $_POST['contraseña'] : null;
		$tipoDocumento = (isset($_POST['tipoDocumento'])) ? $_POST['tipoDocumento'] : null;
		$cargo = (isset($_POST['cargo'])) ? $_POST['cargo'] : null;
		$sede = (isset($_POST['sede'])) ? $_POST['sede'] : null;

		// guardamos todos los datos en el array llamado datos
		$datos =
			[
				'idEmpresa' => $idEmpresa,
				'numeroDocumento' => $numeroDocumento,
				'nombreEmpresa' => $nombreEmpresa,
				'direccion' => $direccion,
				'telefono' => $telefono,
				'correo' => $correo,
				'password' => $contraseña,
				'tipoDocumento' => $tipoDocumento,
				'cargo' => $cargo,
				'sede' => $sede
			];

		$respuesta = new EmpresaControlador();
		$respuesta = $respuesta->ActualizarEmpresa($datos);

		if ($respuesta) {
			echo 1;
		} else {
			echo 2;
		}
	}

	//ELIMINAR DATOS
	if ($_POST['opcion'] == "EliminarEmpresa") {
		$id_empresa = (isset($_POST['id_empresa'])) ? $_POST['id_empresa'] : null;
		$objeto = new EmpresaControlador();
		$objeto = $objeto->EliminarEmpresa($id_empresa);
	}
	if ($_POST['opcion'] == "ActualizarValidacion") {
		$idValidacion = (isset($_POST['idValidacion'])) ? $_POST['idValidacion'] : null;
		$tipoValidacion = (isset($_POST['tipoValidacion'])) ? $_POST['tipoValidacion'] : null;
		echo $idValidacion;
		$datos = [
			'idValidacion' => $idValidacion,	
            'tipoValidacion' => $tipoValidacion
		];

		$respuesta = new EmpresaControlador();
		$respuesta = $respuesta->ActualizarValidacion($datos);
	}
}
