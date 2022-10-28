  
  <script src="public/assets/vendor/simple-datatables/jquery-3.3.1.min.js"></script>
  <script src="public/assets/vendor/simple-datatables/jquery.dataTables.min.js"></script>
  <script src="public/assets/vendor/simple-datatables/dataTables.bootstrap.min.js"></script> 

  <script src="public/assets/vendor/popper/popper.min.js"></script> 

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

  <script src="public/assets/vendor/simple-datatables/sweetalert.min.js"></script>
  <script src="public/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="public/assets/vendor/chart.js/chart.min.js"></script>
  <script src="public/assets/vendor/echarts/echarts.min.js"></script>
  <script src="public/assets/vendor/quill/quill.min.js"></script>
  <script src="public/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="public/assets/vendor/php-email-form/validate.js"></script>
  <script src="public/assets/js/main.js"></script>
  <script src="public/assets/js/Personal.js?n=4"></script>
  <script src="public/assets/js/Empresa.js?n=4"></script>
  <script src="public/assets/js/Asistencia.js?n=4"></script>
  <script src="public/assets/js/Autoreporte.js?n=4"></script>

  
  <script type="text/javascript">
  
  
  $('#Formulario_Empresa').submit(function (e) {
    e.preventDefault(); //actualizar datos
    direccion = $.trim($('#direccion_empresa').val());
    telefono = $.trim($('#telefono_empresa').val());
    correo = $.trim($('#correo_empresa').val());
    id_empresa = $.trim($('#id_empresa').val());
    opcion = "ActualizarDatosEmpresa";
    
     $.ajax({
         url: "app/controlador/EmpresaControlador.php",
         type: "POST",
         data: { opcion:opcion, direccion: direccion, telefono: telefono, correo:correo, id_empresa:id_empresa }
     }).done( function (data) {
       if(data==1)
        {
          swal("DATOS ACTUALIZADOS", "", "success").then((value) => { location.reload(); });
        }
        else
        {
            alert(data);
        }    
     });
  });
  </script>