<?php

require_once "../modelo/ConfiguracionModel.php";
class ConfiguracionControlador
{
    //metodos de la tabla regional
	public function ListarRegional()
    {
	  	 $respuesta = Configuracion::ListarRegional();
         return $respuesta;
	}
    public function GuardarRegional($nombre_regional)
    {
	  	 $respuesta = Configuracion::GuardarRegional($nombre_regional);
         return $respuesta;
	}
    public function ConsultarRegional($id)
    {
	  	 $respuesta = Configuracion::ConsultarRegional($id);
         return $respuesta;
	}
    public function ActualizarRegional($id,$nombre_regionale)
    {
	  	 $respuesta = Configuracion::ActualizarRegional($id, $nombre_regionale);
         return $respuesta;
	}
    public function EliminarRegional($id)
    {
	  	 $respuesta = Configuracion::EliminarRegional($id);
         return $respuesta;
	}
	//metodos de la tabla centro
    public function ListarCentro()
    {
	  	 $respuesta = Configuracion::ListarCentro();
         return $respuesta;
	}

    public function ListarCentroPorRegional($id_regional)
    {
	  	 $respuesta = Configuracion::ListarCentroPorRegional($id_regional);
         return $respuesta;
	}

    public function GuardarCentro($datos)
    {
	  	 $respuesta = Configuracion::GuardarCentro($datos);
         return $respuesta;
	}
    public function ConsultarCentro($id)
    {
	  	 $respuesta = Configuracion::ConsultarCentro($id);
         return $respuesta;
	}
    public function ActualizarCentro($datos)
    {
	  	 $respuesta = Configuracion::ActualizarCentro($datos);
         return $respuesta;
	}
    public function EliminarCentro($id)
    {
	  	 $respuesta = Configuracion::EliminarCentro($id);
         return $respuesta;
	}
// metodos para la tabla sede
    public function ListarSede()
    {
       $respuesta = Configuracion::ListarSede();
       return $respuesta;
    }

    public function ListarSedePorCentro($id)
    {
       $respuesta = Configuracion::ListarSedePorCentro($id);
       return $respuesta;
    }

    public function GuardarSede($datos)
    {
          $respuesta = Configuracion::GuardarSede($datos);
          return $respuesta;
    }
    public function ConsultarSede($id)
    {
        $respuesta = Configuracion::ConsultarSede($id);
        return $respuesta;
    }
    public function ActualizarSede($datos)
    {
       $respuesta = Configuracion::ActualizarSede($datos);
       return $respuesta;
    }
    public function EliminarSede($id)
    {
        $respuesta = Configuracion::EliminarSede($id);
        return $respuesta;
    }

    // metodos para la tabla sede
    public function ListarPrograma($id_sede,$cargoU)
    {
       $respuesta = Configuracion::Listarprograma($id_sede,$cargoU);
       return $respuesta;
    }

    public function ListarProgramaPorSede($id_sede)
    {
       $respuesta = Configuracion::ListarProgramaPorSede($id_sede);
       return $respuesta;
    }

    public function GuardarPrograma($datos)
    {
          $respuesta = Configuracion::GuardarPrograma($datos);
          return $respuesta;
    }
    public function ConsultarPrograma($id)
    {
        $respuesta = Configuracion::ConsultarPrograma($id);
        return $respuesta;
    }
    public function ActualizarPrograma($datos)
    {
       $respuesta = Configuracion::ActualizarPrograma($datos);
       return $respuesta;
    }
    public function EliminarPrograma($id)
    {
        $respuesta = Configuracion::EliminarPrograma($id);
        return $respuesta;
    }

     // metodos para la tabla ficha
     public function ListarFicha($id_sede,$cargoU)
     {
        $respuesta = Configuracion::ListarFicha($id_sede,$cargoU);
        return $respuesta;
     }
     public function ListarFichaPorPrograma($id_programa)
     {
        $respuesta = Configuracion::ListarFichaPorPrograma($id_programa);
        return $respuesta;
     }

     public function ListarFichaPorSede($id_sede)
     {
        $respuesta = Configuracion::ListarFichaPorSede($id_sede);
        return $respuesta;
     }

     public function GuardarFicha($datos)
     {
           $respuesta = Configuracion::GuardarFicha($datos);
           return $respuesta;
     }
     public function ConsultarFicha($id)
     {
         $respuesta = Configuracion::ConsultarFicha($id);
         return $respuesta;
     }
     public function ActualizarFicha($datos)
     {
        $respuesta = Configuracion::ActualizarFicha($datos);
        return $respuesta;
     }
     public function EliminarFicha($id)
     {
         $respuesta = Configuracion::EliminarFicha($id);
         return $respuesta;
     }

      // metodos para la tabla ficha vs instructor
      public function ListarFVSI($id_sede,$cargoU)
      {
         $respuesta = Configuracion::ListarFVSI($id_sede,$cargoU);
         return $respuesta;
      }
 
      public function GuardarFVSI($id_ficha,$id_instructor,$id_sede,$estado)
      {
            $respuesta = Configuracion::GuardarFVSI($id_ficha,$id_instructor,$id_sede,$estado);
            return $respuesta;
      }
      public function ConsultarFVSI($id)
      {
          $respuesta = Configuracion::ConsultarFVSI($id);
          return $respuesta;
      }
      public function ActualizarFVSI($datos)
      {
         $respuesta = Configuracion::ActualizarFVSI($datos);
         return $respuesta;
      }
      public function EliminarFVSI($id)
      {
          $respuesta = Configuracion::EliminarFVSI($id);
          return $respuesta;
      }
 

}
if(isset($_POST["opcion"]))
{
    //opciones de la tabla regional
	if($_POST["opcion"]=="ListarRegional")
	{
		$respuesta = new ConfiguracionControlador();
		$respuesta =$respuesta -> ListarRegional();
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}
    else
    {
        if($_POST["opcion"]=="GuardarRegional")
	    {
            $nombre_regional = (isset($_POST['nombre_regional'])) ? $_POST['nombre_regional'] : null;
		    $respuesta = new ConfiguracionControlador();
		    $respuesta =$respuesta -> GuardarRegional($nombre_regional);
            if($respuesta)
            {
               echo 1;
            }
            else
            {
                echo 2;
            }
	    }
        else
        {
            if($_POST["opcion"]=="ConsultarRegional")
            {
                $id = (isset($_POST['id_regional'])) ? $_POST['id_regional'] : null;
                $respuesta = new ConfiguracionControlador();
                $respuesta =$respuesta -> ConsultarRegional($id);
                echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
            }
            else
            {
                if($_POST["opcion"]=="ActualizarRegional")
                {
                    $id = (isset($_POST['id_regional'])) ? $_POST['id_regional'] : null;
                    $nombre_regionale = (isset($_POST['nombre_regionale'])) ? $_POST['nombre_regionale'] : null;
                    $respuesta = new ConfiguracionControlador();
                    $respuesta =$respuesta -> ActualizarRegional($id,$nombre_regionale);
                    if($respuesta)
                    {
                        echo 1;
                    }
                    else
                    {
                        echo 2;
                    }
                }
                else
                {
                    if($_POST["opcion"]=="EliminarRegional")
                    {
                        $id = (isset($_POST['id_regional'])) ? $_POST['id_regional'] : null;
                        $respuesta = new ConfiguracionControlador();
                        $respuesta =$respuesta -> EliminarRegional($id);
                        if($respuesta)
                        {
                            echo 1;
                        }
                        else
                        {
                            echo 2;
                        }
                    }
                    //opciones de la tabla centro
                    else
                    {
                        if($_POST["opcion"]=="ListarCentro")
                        {
                            $respuesta = new ConfiguracionControlador();
                            $respuesta =$respuesta -> ListarCentro();
                            echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
                        }
                        else
                        {
                            if($_POST["opcion"]=="GuardarCentro")
                            {
                                $regional = (isset($_POST['regional'])) ? $_POST['regional'] : null;
                                $nombre_centro = (isset($_POST['nombre_centro'])) ? $_POST['nombre_centro'] : null;
                                $telefono_centro = (isset($_POST['telefono_centro'])) ? $_POST['telefono_centro'] : null;
                                $subdirector= (isset($_POST['subdirector'])) ? $_POST['subdirector'] : null;
                                $datos=[
                                    'regional'=>$regional,
                                    'nombre_centro'=>$nombre_centro,
                                    'telefono_centro'=>$telefono_centro,
                                    'subdirector'=>$subdirector
                                ];
                                $respuesta = new ConfiguracionControlador();
                                $respuesta =$respuesta -> GuardarCentro($datos);
                                if($respuesta)
                                {
                                    echo 1;
                                }
                                else
                                {
                                    echo 2;
                                }
                            }
                            else
                            {
                                if($_POST["opcion"]=="ConsultarCentro")
                                {
                                    $id = (isset($_POST['id_centro'])) ? $_POST['id_centro'] : null;
                                    $respuesta = new ConfiguracionControlador();
                                    $respuesta =$respuesta -> ConsultarCentro($id);
                                    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
                                }
                                else
                                {
                                    if($_POST["opcion"]=="ActualizarCentro")
                                    {
                                        $id_centroe = (isset($_POST['id_centro'])) ? $_POST['id_centro'] : null;
                                        $nombre_centroe = (isset($_POST['nombre_centroe'])) ? $_POST['nombre_centroe'] : null;
                                        $telefono_centroe = (isset($_POST['telefono_centroe'])) ? $_POST['telefono_centroe'] : null;
                                        $subdirector_centroe = (isset($_POST['subdirector_centroe'])) ? $_POST['subdirector_centroe'] : null;
                                        $regionale = (isset($_POST['regionale'])) ? $_POST['regionale'] : null;
                                        $datos=[
                                            'id_centro'=> $id_centroe,
                                            'nombre'=>$nombre_centroe,
                                            'telefono'=>$telefono_centroe,
                                            'subdirector'=>$subdirector_centroe,
                                            'regional'=>$regionale
                                        ];
                                        $respuesta = new ConfiguracionControlador();
                                        $respuesta =$respuesta -> ActualizarCentro($datos);
                                        if($respuesta):
                                            echo 1;
                                        else:
                                            echo 2;
                                        endif;
                                    }
                                    else
                                    {
                                        if($_POST["opcion"]=="EliminarCentro")
                                        {
                                            $id = (isset($_POST['id_centro'])) ? $_POST['id_centro'] : null;
                                            $respuesta = new ConfiguracionControlador();
                                            $respuesta =$respuesta -> EliminarCentro($id);
                                            if($respuesta):
                                                echo 1;
                                            else:
                                                echo 2;
                                            endif;
                                        }
                                        else
                                        {
                                            if($_POST["opcion"]=="ListarSede")
                                            {
                                                $respuesta = new ConfiguracionControlador();
                                                $respuesta =$respuesta -> ListarSede();
                                                echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
                                            }
                                            else
                                            {
                                                if($_POST["opcion"]=="ListarCentroPorRegional")
                                                {
                                                     $id_regional = (isset($_POST['id_regional'])) ? $_POST['id_regional'] : null;
                                                     $respuesta = new ConfiguracionControlador();
                                                     $respuesta =$respuesta -> ListarCentroPorRegional($id_regional);
                                                     echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
                                                }
                                                else
                                                {
                                                    if($_POST["opcion"]=="GuardarSede")
                                                    {
                                                         $nombre_sede = (isset($_POST['nombre_sede'])) ? $_POST['nombre_sede'] : null;
                                                         $telefono_sede = (isset($_POST['telefono_sede'])) ? $_POST['telefono_sede'] : null;
                                                         $responsable_sede = (isset($_POST['responsable_sede'])) ? $_POST['responsable_sede'] : null;
                                                         $centro_sede = (isset($_POST['centro_sede'])) ? $_POST['centro_sede'] : null;
                                                         $datos=[
                                                            'nombre_sede'=>$nombre_sede,
                                                            'telefono_sede'=>$telefono_sede,
                                                            'responsable_sede'=>$responsable_sede,
                                                            'centro_sede'=>$centro_sede
                                                         ];
                                                         $respuesta = new ConfiguracionControlador();
                                                         $respuesta =$respuesta -> GuardarSede($datos);
                                                         if($respuesta):
                                                            echo 1;
                                                         else:
                                                            echo 2;
                                                         endif;
                                                    }
                                                    else
                                                    {
                                                        if($_POST["opcion"]=="ConsultarSede")
                                                        {
                                                           $id = (isset($_POST['id_sede'])) ? $_POST['id_sede'] : null;
                                                           $respuesta = new ConfiguracionControlador();
                                                           $respuesta =$respuesta -> ConsultarSede($id);
                                                           echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
                                                        }
                                                        else
                                                        {
                                                            if($_POST["opcion"]=="ActualizarSede")
                                                            {
                                                               $id_sede = (isset($_POST['id_sede'])) ? $_POST['id_sede'] : null;
                                                               $nombre_sede = (isset($_POST['nombre_sedee'])) ? $_POST['nombre_sedee'] : null;
                                                               $telefono_sede = (isset($_POST['telefono_sedee'])) ? $_POST['telefono_sedee'] : null;
                                                               $responsable_sede = (isset($_POST['responsable_sedee'])) ? $_POST['responsable_sedee'] : null;
                                                               $datos=[
                                                                'id_sede'=>$id_sede,
                                                                'nombre_sede'=>$nombre_sede,
                                                                'telefono_sede'=>$telefono_sede,
                                                                'responsable'=>$responsable_sede
                                                               ];
                                                               
                                                               $respuesta = new ConfiguracionControlador();
                                                               $respuesta =$respuesta -> ActualizarSede($datos);
                                                               if($respuesta):
                                                                 echo 1;
                                                               else:
                                                                 echo 2;
                                                               endif;
                                                            }
                                                            else
                                                            {
                                                              if($_POST["opcion"]=="EliminarSede")
                                                              {
                                                                $id_sede = (isset($_POST['id_sede'])) ? $_POST['id_sede'] : null;
                                                                $respuesta = new ConfiguracionControlador();
                                                                $respuesta =$respuesta -> EliminarSede($id_sede);
                                                                if($respuesta):
                                                                  echo 1;
                                                                else:
                                                                  echo 2;
                                                                endif;
                                                               }
                                                               else
                                                               {
                                                                 if($_POST["opcion"]=="ListarPrograma")
                                                                 {
                                                                  $id_sede = (isset($_POST['id_sedeA'])) ? $_POST['id_sedeA'] : null;
                                                                  $cargoU = (isset($_POST['cargoU'])) ? $_POST['cargoU'] : null; 
                                                                  $respuesta = new ConfiguracionControlador();
                                                                   $respuesta =$respuesta -> ListarPrograma($id_sede,$cargoU);
                                                                   echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
                                                                 }
                                                                 else
                                                                 {
                                                                   if($_POST["opcion"]=="ListarSedePorCentro")
                                                                   {
                                                                     $id = (isset($_POST['id_centro'])) ? $_POST['id_centro'] : null;
                                                                     $respuesta = new ConfiguracionControlador();
                                                                     $respuesta =$respuesta -> ListarSedePorCentro($id);
                                                                     echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
                                                                   }
                                                                   else
                                                                   {
                                                                     if($_POST["opcion"]=="GuardarPrograma")
                                                                     {
                                                                         $nombre_programa = (isset($_POST['nombre_programa'])) ? $_POST['nombre_programa'] : null;
                                                                         $codigo_programa = (isset($_POST['codigo_programa'])) ? $_POST['codigo_programa'] : null;
                                                                         $sede_programa = (isset($_POST['sede_programa'])) ? $_POST['sede_programa'] : null;
                                                                         $datos=[
                                                                            'nombre_programa'=>$nombre_programa,
                                                                            'codigo_programa'=>$codigo_programa,
                                                                            'sede_programa'=>$sede_programa
                                                                         ];
                                                                         $respuesta = new ConfiguracionControlador();
                                                                         $respuesta =$respuesta -> GuardarPrograma($datos);
                                                                         if($respuesta):
                                                                            echo 1;
                                                                         else:
                                                                            echo 2;
                                                                         endif;
                                                                      }
                                                                      else
                                                                      {
                                                                        if($_POST["opcion"]=="ConsultarPrograma")
                                                                        {
                                                                             $id = (isset($_POST['id_programa'])) ? $_POST['id_programa'] : null;
                                                                             $respuesta = new ConfiguracionControlador();
                                                                             $respuesta =$respuesta -> ConsultarPrograma($id);
                                                                             echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
                                                                        }
                                                                        else
                                                                        {
                                                                          if($_POST["opcion"]=="ActualizarPrograma")
                                                                          {
                                                                              $id_programa = (isset($_POST['id_programa'])) ? $_POST['id_programa'] : null;
                                                                              $nombre_programae = (isset($_POST['nombre_programae'])) ? $_POST['nombre_programae'] : null;
                                                                              $codigo_programae = (isset($_POST['codigo_programae'])) ? $_POST['codigo_programae'] : null;
                                                                              $datos=[
                                                                                'nombre_programa'=>$nombre_programae,
                                                                                'codigo_programa'=>$codigo_programae,
                                                                                'id_programa'=>$id_programa
                                                                              ];
                                                                              $respuesta = new ConfiguracionControlador();
                                                                              $respuesta =$respuesta -> ActualizarPrograma($datos);
                                                                              if($respuesta):
                                                                                 echo 1;
                                                                              else:
                                                                                echo 2;
                                                                              endif;
                                                                           }
                                                                           else
                                                                           {
                                                                             if($_POST["opcion"]=="EliminarPrograma")
                                                                             {
                                                                                $id_programa = (isset($_POST['id_programa'])) ? $_POST['id_programa'] : null;
                                                                                $respuesta = new ConfiguracionControlador();
                                                                                $respuesta =$respuesta -> EliminarPrograma($id_programa);
                                                                                if($respuesta):
                                                                                  echo 1;
                                                                                else:
                                                                                  echo 2;
                                                                                endif;
                                                                             }
                                                                             else
                                                                             {
                                                                               if($_POST["opcion"]=="ListarFicha")
                                                                               {
                                                                                   $id_sede = (isset($_POST['id_sedeA'])) ? $_POST['id_sedeA'] : null;
                                                                                   $cargoU = (isset($_POST['cargoU'])) ? $_POST['cargoU'] : null; 
                                                                                    $respuesta = new ConfiguracionControlador();
                                                                                    $respuesta =$respuesta -> ListarFicha($id_sede,$cargoU);
                                                                                    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
                                                                               }
                                                                               else
                                                                               {
                                                                                 if($_POST["opcion"]=="ListarProgramaPorsede")
                                                                                 {
                                                                                    $id_sede = (isset($_POST['id_sede'])) ? $_POST['id_sede'] : null;
                                                                                    $respuesta = new ConfiguracionControlador();
                                                                                    $respuesta =$respuesta -> ListarProgramaPorSede($id_sede);
                                                                                    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
                                                                                 }
                                                                                 else
                                                                                 {
                                                                                   if($_POST["opcion"]=="GuardarFicha")
                                                                                   {
                                                                                      $programa_ficha = (isset($_POST['programa_ficha'])) ? $_POST['programa_ficha'] : null;
                                                                                      $codigo_ficha = (isset($_POST['codigo_ficha'])) ? $_POST['codigo_ficha'] : null;
                                                                                      $grupo_ficha = (isset($_POST['grupo_ficha'])) ? $_POST['grupo_ficha'] : null;
                                                                                      $datos=[
                                                                                        'programa_ficha'=>$programa_ficha,
                                                                                        'codigo_ficha'=>$codigo_ficha,
                                                                                        'grupo_ficha'=>$grupo_ficha
                                                                                      ];
                                                                                      $respuesta = new ConfiguracionControlador();
                                                                                      $respuesta =$respuesta -> GuardarFicha($datos);
                                                                                      if($respuesta):
                                                                                        echo 1;
                                                                                      else:
                                                                                        echo 2;
                                                                                      endif;    
                                                                                   }
                                                                                   else
                                                                                   {
                                                                                     if($_POST["opcion"]=="ConsultarFicha")
                                                                                     {
                                                                                        $id_ficha= (isset($_POST['id_ficha'])) ? $_POST['id_ficha'] : null;
                                                                                        $respuesta = new ConfiguracionControlador();
                                                                                        $respuesta =$respuesta -> ConsultarFicha($id_ficha);
                                                                                        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
                                                                                     }
                                                                                     else
                                                                                     {
                                                                                        if($_POST["opcion"]=="ActualizarFicha")
                                                                                        {
                                                                                            $id_ficha= (isset($_POST['id_ficha'])) ? $_POST['id_ficha'] : null;
                                                                                            $codigo_fichae= (isset($_POST['codigo_fichae'])) ? $_POST['codigo_fichae'] : null;
                                                                                            $grupo_fichae= (isset($_POST['grupo_fichae'])) ? $_POST['grupo_fichae'] : null;
                                                                                            $datos=[
                                                                                                'id_ficha'=>$id_ficha,
                                                                                                'codigo_ficha'=>$codigo_fichae,
                                                                                                'grupo_ficha'=>$grupo_fichae
                                                                                            ];
                                                                                            $respuesta = new ConfiguracionControlador();
                                                                                            $respuesta =$respuesta -> ActualizarFicha($datos);
                                                                                            if($respuesta):
                                                                                                echo 1;
                                                                                            else:
                                                                                                echo 2;
                                                                                            endif; 
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                            if($_POST["opcion"]=="EliminarFicha")
                                                                                            {
                                                                                                $id_ficha= (isset($_POST['id_ficha'])) ? $_POST['id_ficha'] : null;
                                                                                                $respuesta = new ConfiguracionControlador();
                                                                                                $respuesta =$respuesta -> EliminarFicha($id_ficha);
                                                                                                if($respuesta):
                                                                                                    echo 1;
                                                                                                else:
                                                                                                    echo 2;
                                                                                                endif; 
                                                                                            }
                                                                                            else
                                                                                            {
                                                                                              if($_POST["opcion"]=="ListarFichaPorPrograma")
                                                                                              {
                                                                                                 $id_programa= (isset($_POST['id_programa'])) ? $_POST['id_programa'] : null;
                                                                                                 $respuesta = new ConfiguracionControlador();
                                                                                                 $respuesta =$respuesta -> ListarFichaPorPrograma($id_programa);
                                                                                                 echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
                                                                                              }
                                                                                              else
                                                                                              {
                                                                                                if($_POST["opcion"]=="ListarFichaPorSede")
                                                                                                {
                                                                                                  $id_sede= (isset($_POST['id_sede'])) ? $_POST['id_sede'] : null;
                                                                                                  $respuesta = new ConfiguracionControlador();
                                                                                                  $respuesta =$respuesta -> ListarFichaPorSede($id_sede);
                                                                                                  echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                  if($_POST["opcion"]=="GuardarFVSI")
                                                                                                  {
                                                                                                    $ficha_fvsi= (isset($_POST['ficha_fvsi'])) ? $_POST['ficha_fvsi'] : null;
                                                                                                    $instructor_fvsi= (isset($_POST['instructor_fvsi'])) ? $_POST['instructor_fvsi'] : null;
                                                                                                    $sede_fvsi= (isset($_POST['sede_fvsi'])) ? $_POST['sede_fvsi'] : null;
                                                                                                    $estado="A";
                                                                                                    $respuesta = new ConfiguracionControlador();
                                                                                                    $respuesta =$respuesta -> GuardarFVSI($ficha_fvsi,$instructor_fvsi,$sede_fvsi,$estado);
                                                                                                    if($respuesta):
                                                                                                      echo 1;
                                                                                                    else:
                                                                                                      echo 2;
                                                                                                    endif;  
                                                                                                  }
                                                                                                  else
                                                                                                  {
                                                                                                    if($_POST["opcion"]=="ListarFVSI")
                                                                                                    {
                                                                                                      
                                                                                                      $id_sede = (isset($_POST['id_sedeA'])) ? $_POST['id_sedeA'] : null;
                                                                                                      $cargoU = (isset($_POST['cargoU'])) ? $_POST['cargoU'] : null; 
                                                                                                       $respuesta = new ConfiguracionControlador();
                                                                                                       $respuesta =$respuesta -> listarFVSI($id_sede,$cargoU);
                                                                                                       echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
                                                                                                    }
                                                                                                    else
                                                                                                    {
                                                                                                      if($_POST["opcion"]=="ConsultarFVSI")
                                                                                                      {
                                                                                                         $id_fvsi= (isset($_POST['id_fvsi'])) ? $_POST['id_fvsi'] : null;
                                                                                                         $respuesta = new ConfiguracionControlador();
                                                                                                         $respuesta =$respuesta -> ConsultarFVSI($id_fvsi);
                                                                                                         echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
                                                                                                      }
                                                                                                      else
                                                                                                      {
                                                                                                        if($_POST["opcion"]=="ActualizarFVSI")
                                                                                                        {
                                                                                                           $id_fvsi= (isset($_POST['id_fvsi'])) ? $_POST['id_fvsi'] : null;
                                                                                                           $ficha_fvsi= (isset($_POST['ficha_fvsiE'])) ? $_POST['ficha_fvsiE'] : null;
                                                                                                           $datos=[
                                                                                                            'id_fvsi'=>$id_fvsi,
                                                                                                            'ficha'=>$ficha_fvsi
                                                                                                           ];
                                                                                                           $respuesta = new ConfiguracionControlador();
                                                                                                           $respuesta =$respuesta -> ActualizarFVSI($datos);
                                                                                                           if($respuesta):
                                                                                                            echo 1;
                                                                                                           else:
                                                                                                            echo 2;
                                                                                                           endif;
                                                                                                        }
                                                                                                        else
                                                                                                        {
                                                                                                          if($_POST["opcion"]=="EliminarFVSI")
                                                                                                          {
                                                                                                            $id_fvsi= (isset($_POST['id_fvsi'])) ? $_POST['id_fvsi'] : null;
                                                                                                            $respuesta = new ConfiguracionControlador();
                                                                                                            $respuesta =$respuesta -> EliminarFVSI($id_fvsi);
                                                                                                            if($respuesta):
                                                                                                              echo 1;
                                                                                                            else:
                                                                                                              echo 2;
                                                                                                             endif;
                                                                                                          }
                                                                                                        }
                                                                                                      }
                                                                                                    }
                                                                                                  }
                                                                                                }
                                                                                              }
                                                                                            }
                                                                                        }
                                                                                     }
                                                                                   }
                                                                                 }
                                                                               }
                                                                             }
                                                                           }
                                                                         }
                                                                      }
                                                                    }
                                                                 }
                                                               }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
	
}





   
?> 
