$(document).ready(function () {
    var opcion;
    var fila; 
    var idI =$("#id_Instructor").val();
    var FichasInstructorSelect='<option value="null" >--SELECCIONE--</option>';
    var AprendicesInasistencia=[];
    var AprendizReporte=[];


     function llenarFichaPorInstructor(idI) 
     {
         $.ajax({
             url: "app/controlador/InstructorControlador.php",
             type: 'post',
             datatype: "json",
             data: {opcion:"ListarFichaPorInstructor", id_instructor:idI }
         }).done(function (res) {
           var datos = JSON.parse(res);
           $.each(datos, function(i, item) {
             FichasInstructorSelect +=' <option value="'+datos[i].id_ficha+'" >'+datos[i].codigo_ficha+" - "+datos[i].nombre_programa+'</option>';
           });
           $("#ficha_asistencia").html(FichasInstructorSelect);
           $("#ficha_asistenciaR").html(FichasInstructorSelect);
         });   
     }



     function llenartabla(id_ficha) 
     {
         $.ajax({
             url: "app/controlador/InstructorControlador.php",
             type: 'post',
             datatype: "json",
             data: {opcion:"ListarAprendizPorFichaYAsistencia", id_ficha:id_ficha }
         }).done(function (res) {
             
              if(res!=1)
              {
                var c=0;
                var datos = JSON.parse(res);
                let busqueda ;
                let id_aprendiz;
                let nombre;
                AprendicesInasistencia=[];
               
                  
                  var LongitudListadoAprendiz=Object.keys(datos.aprendiz).length;
                  
                 for (var j = 0; j < LongitudListadoAprendiz; j++) 
                 {
                    id_aprendiz=datos.aprendiz[j].id_aprendiz;
                    nombre=datos.aprendiz[j].nombres+" "+datos.aprendiz[j].apellidos;
                    busqueda= datos.asistencia.find(b=> b.id_aprendiz === id_aprendiz);
                    if(!busqueda)
                    {
                      let datos={
                        "id_aprendiz": id_aprendiz,
                        "nombre": nombre
                      };
                      AprendicesInasistencia.push(datos);
                      c=c+1;
                    }
                 }
                 
                var tablaAsistenciaAprendiz = $('#tablaAsistenciaAprendiz').DataTable({ retrieve: true, paging: false });
                tablaAsistenciaAprendiz.destroy();
                contadorAI=0;
                $('#tablaAsistenciaAprendiz').DataTable({
                    data : AprendicesInasistencia,
                    "columns": [
                        {
                            data: null, render: function ( data, type, row ) {
                                contadorAI=contadorAI+1;
                                return "<b>"+contadorAI+"</b>";
                            }
                         },
                         {"data" : "nombre"},
                         {
                          data: null, render: function ( data, type, row ) {
                              return '<div class="row"> <div class="col-2"><button type="button" class="btn btn-success  BtnEliminarDeLista"  data-id="'+data.id_aprendiz+'"><i class="bi bi-hand-thumbs-up"></i></button></div></div>';
                          }
                       },
                    ]
                });

              }
              else
              {
                swal("", "No se encontraron registros de asistencia para esta ficha", "warning");
                var tablaAsistenciaAprendiz = $('#tablaAsistenciaAprendiz').DataTable({ retrieve: true, paging: false });
                tablaAsistenciaAprendiz.clear().draw();
                tablaAsistenciaAprendiz.destroy();
              }
            
              
              $(document).on("click", ".EnviarABienestar", function () {
                 ListadoAprendices=JSON.stringify(AprendicesInasistencia);
                 id_instructor = $("#id_Instructor").val();
                 id_ficha = $("#ficha_asistencia").val();
                 
                 $.ajax({
                    url: "app/controlador/FidelizacionControlador.php",
                    type: 'post',
                    data: { opcion: "GuardarAprendicesInasistencia", ListadoAprendices:ListadoAprendices, id_instructor: id_instructor, id_ficha: id_ficha }
                    
                    }).done(function (res) {
                      if(res==1)
                      {
                        swal("", "Datos enviados A bienestar", "success");         
                      }
                      else
                      {
                        swal("", "Ya Estos Datos Fueron Enviados a Bienestar", "error");
                      }
                    });
                    AprendicesInasistencia=[];
                    console.log(AprendicesInasistencia);
               });
           });   
       }


       function llenartablaR(id_ficha) 
       {
         $.ajax({
             url: "app/controlador/InstructorControlador.php",
             type: 'post',
             datatype: "json",
             data: {opcion:"ListarAprendizPorFichaYAsistencia", id_ficha:id_ficha }
         }).done(function (res) {
             
              if(res!=1)
              {
                var c=0;
                var datos = JSON.parse(res);
                let busqueda ;
                let id_aprendiz;
                let nombre;
                AprendizReporte=[];
               
                  
                   var LongitudListadoAprendiz=Object.keys(datos.aprendiz).length;
                  
                 for (var j = 0; j < LongitudListadoAprendiz; j++) 
                 {
                    
                    id_aprendiz=datos.aprendiz[j].id_aprendiz;
                    nombre=datos.aprendiz[j].nombres+" "+datos.aprendiz[j].apellidos;
                   
                   
                      let datosR={
                        "id_aprendiz": id_aprendiz,
                        "nombre": nombre
                      };
                      AprendizReporte.push(datosR);
                      c=c+1;
                    
                 }
                 
                var tablaReporteAprendiz = $('#tablaReporteAprendiz').DataTable({ retrieve: true, paging: false });
                tablaReporteAprendiz.destroy();
                contadorAR=0;
                $('#tablaReporteAprendiz').DataTable({
                    data : AprendizReporte,
                    "columns": [
                        {
                            data: null, render: function ( data, type, row ) {
                                contadorAR=contadorAR+1;
                                return "<b>"+contadorAR+"</b>";
                            }
                         },
                         {"data" : "nombre"},
                         {
                          data: null, render: function ( data, type, row ) {
                              return '<button type="button" class="btn btn-primary BtnReporte" data-bs-toggle="modal" data-bs-target="#ReporteModal" data-id="'+data.id_aprendiz+'"><i class="bi bi-eye-fill"></i></button>';
                          }
                       },
                    ]
                });
              
              }
              else
              {
                swal("", "No se encontraron los aprendices de esta ficha", "warning");
                var tablaReporteAprendiz = $('#tablaReporteAprendiz').DataTable({ retrieve: true, paging: false });
                tablaReporteAprendiz.clear().draw();
                tablaReporteAprendiz.destroy();
              }
           });   
        }
    
     

    llenarFichaPorInstructor(idI);
   
     
    $("#ficha_asistencia").change(function() {
        id_ficha = $(this).val();
        if(id_ficha!="null")
        {
            llenartabla(id_ficha);
        }
    });

    $("#ficha_asistenciaR").change(function() {
      id_ficha = $(this).val();
      if(id_ficha!="null")
      {
          llenartablaR(id_ficha);
      }
  });

   
    $(document).on("click", ".BtnEliminarDeLista", function () 
    {
            fila = $(this);
            idA=$(this).data("id");
            var tablaAsistenciaAprendiz = $('#tablaAsistenciaAprendiz').DataTable({ retrieve: true, paging: false });
            contadorAI=0;
            tablaAsistenciaAprendiz.row(fila.parents('tr')).remove().draw(); 
            posicion = AprendicesInasistencia.findIndex(A=> A.id_aprendiz === idA);
            AprendicesInasistencia.splice(posicion, 1);
     });

     $(document).on("click", ".BtnReporte", function () 
    {
        idA=$(this).data("id");
        $("#IDA").val(idA);
    });

    $('#EnviarReporteComportamiento').submit(function (e)
    {
        e.preventDefault(); 
        opcion="GuardarReporteComportamiento";
        tipo_reporte=$('#tipo_reporte').val();
        observacion=$("#obsComportamiento").val();
        id_aprendiz = $("#IDA").val();
        id_instructor = $("#id_Instructor").val();
        id_ficha = $("#ficha_asistenciaR").val();
        if(tipo_reporte==="null")
        {
          swal("No Ha Seleccionado una opcion", "", "error");   
        }
        else
        {
       
        $.ajax({
          url: "app/controlador/FidelizacionControlador.php",
          type: 'post',
          data: { opcion:opcion , id_instructor:id_instructor, id_ficha:id_ficha , id_aprendiz:id_aprendiz, observacion:observacion, tipo_reporte:tipo_reporte}
          
          }).done(function (res) {
           
            if(res==1)
            {
              $("#ReporteModal").modal("hide");
              swal("", "Datos enviados A bienestar", "success");        
              $("#obsComportamiento").val(""); 
              $("#tipo_reporte").val("");
            }
            else
            {
              swal("", "Ya Este Aprendiz Fue Enviado a Bienestar Hoy", "error");
            }
          });
          }
    });


});




