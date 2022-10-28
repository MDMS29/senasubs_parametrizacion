$(document).ready(function () {
  var opcion;
  var fila;
  var ContadorPEE = 0;
  var ContadorE = 0;
  var ContadorPRA = 0;
  var ContadorPRC = 0;
  var ContadorPEA = 0;

  // OPCIONES DE LISTAR DATOS
  //TABLA DE EMPRESAS REGISTRADAS
  var tablaEmpresa = $("#tablaEmpresa").DataTable({
    retrieve: true,
    paging: false,
  });
  tablaEmpresa.destroy();
  tablaEmpresa = $("#tablaEmpresa").DataTable({
    ajax: {
      url: "app/controlador/EmpresaControlador.php",
      method: "POST",
      data: { opcion: "listarEmpresa", cargo: 9 },
      dataSrc: "",
    },
    columns: [
      {
        data: null,
        render: function (data, type, row) {
          ContadorE = ContadorE + 1;
          return "<b>" + ContadorE + "</b>";
        },
      },
      { data: "numeroDocumento" },
      { data: "nombreEmpresa" },
      { data: "direccion" },
      { data: "telefono" },
      { data: "correo" },
      { data: "tipoDocumento" },
      { data: "cargo" },
      { data: "sede" },
      {
        data: null,
        render: function (data, type, row) {
          return (
            '<button type="button" class="btn btn-primary btnEditarEmpresa" data-id="' +
            data.idEmpresa +
            '"  ><i class="bi bi-pencil-square"></i></button>'
          );
        },
      },
      {
        data: null,
        render: function (data, type, row) {
          return (
            '<button type="button" class="btn btn-danger btnEliminarEmpresa" data-id="' +
            data.idEmpresa +
            '" ><i class="bi bi-trash"></i></button>'
          );
        },
      },
    ],
  });

  // TABLAS DE PETICIONES

  //VER TABLAS DESDE LOS ADMINISTRADORES
  //TABLA PETICIONES RECIBIDAS DE LAS EMPRESAS
  var tablaPeticionesRecibidasEmpresa = $(
    "#tablaPeticionesRecibidasEmpresa"
  ).DataTable({ retrieve: true, paging: false });
  tablaPeticionesRecibidasEmpresa.destroy();
  tablaPeticionesRecibidasEmpresa = $(
    "#tablaPeticionesRecibidasEmpresa"
  ).DataTable({
    ajax: {
      url: "app/controlador/EmpresaControlador.php",
      method: "POST",
      data: { opcion: "listarPeticiones" },
      dataSrc: "",
    },
    columns: [
      {
        data: null,
        render: function (data, type, row) {
          ContadorPRC = ContadorPRC + 1;
          return "<b>" + ContadorPRC + "</b>";
        },
      },
      { data: "nombreEmpresa" },
      { data: "cantidadAprendizes" },
      { data: "formacion" },
      { data: "programa" },
      { data: "motivo" },
      { data: "fecha" },
      { data: "hora" },
      {
        data: null,
        render: function (data, type, row) {
          return (
            '<button type="button" class="btn btn-warning btnValidar"  data-id="' +
            data.idPeticiones +
            '"><i class="bi bi-exclamation-octagon-fill"></i></button>'
          );
        },
      },
    ],
  });

  // TABLA PETICIONES ENVIADAS POR EL ADMINISTRADOR
  var tablaPeticionesEnviadasAdmins = $(
    "#tablaPeticionesEnviadasAdmins"
  ).DataTable({ retrieve: true, paging: false });
  tablaPeticionesEnviadasAdmins.destroy();
  tablaPeticionesEnviadasAdmins = $("#tablaPeticionesEnviadasAdmins").DataTable(
    {
      ajax: {
        url: "app/controlador/EmpresaControlador.php",
        method: "POST",
        data: { opcion: "listarValidacion" },
        dataSrc: "",
      },
      columns: [
        {
          data: null,
          render: function (data, type, row) {
            ContadorPEA = ContadorPEA + 1;
            return "<b>" + ContadorPEA + "</b>";
          },
        },
        { data: "sede" },
        { data: "tipoValidacion" },
        { data: "motivoValidacion" },
      ],
    }
  );

  // VER TABLAS DESDE LAS EMPRESAS
  //TABLA PETICIONES RECIBIDAS POR LOS ADMINISTRADORES
  var tablaPeticionesRecibidasAdmins = $(
    "#tablaPeticionesRecibidasAdmins"
  ).DataTable({ retrieve: true, paging: false });
  tablaPeticionesRecibidasAdmins.destroy();
  tablaPeticionesRecibidasAdmins = $(
    "#tablaPeticionesRecibidasAdmins"
  ).DataTable({
    ajax: {
      url: "app/controlador/EmpresaControlador.php",
      method: "POST",
      data: { opcion: "listarValidacion" },
      dataSrc: "",
    },
    columns: [
      {
        data: null,
        render: function (data, type, row) {
          ContadorPRA = ContadorPRA + 1;
          return "<b>" + ContadorPRA + "</b>";
        },
      },
      { data: "sede" },
      { data: "tipoValidacion" },
      { data: "motivoValidacion" },
    ],
  });

  //TABLA DE PETICIONES ENVIADAS POR LA EMPRESA
  var tablaPeticionesEnviadasEmpresa = $(
    "#tablaPeticionesEnviadasEmpresa"
  ).DataTable({ retrieve: true, paging: false });
  tablaPeticionesEnviadasEmpresa.destroy();
  tablaPeticionesEnviadasEmpresa = $(
    "#tablaPeticionesEnviadasEmpresa"
  ).DataTable({
    ajax: {
      url: "app/controlador/EmpresaControlador.php",
      method: "POST",
      data: { opcion: "listarPeticiones" },
      dataSrc: "",
    },
    columns: [
      {
        data: null,
        render: function (data, type, row) {
          ContadorPEE = ContadorPEE + 1;
          return "<b>" + ContadorPEE + "</b>";
        },
      },
      { data: "nombreEmpresa" },
      { data: "cantidadAprendizes" },
      { data: "formacion" },
      { data: "programa" },
      { data: "motivo" },
      { data: "fecha" },
      { data: "hora" },
    ],
  });

  // OPCIONES DE EDITAR DATOS EMPRESA
  $(document).on("click", ".btnEditarEmpresa", function () {
    $("#ModalEditarEmpresa").modal("show");
    idEmpresa = $(this).data("id");
    opcion = "ConsultarEmpresa";
    $.ajax({
      url: "app/controlador/EmpresaControlador.php",
      type: "POST",
      data: { idEmpresa: idEmpresa, opcion: opcion },
    }).done(function (data) {
      var datos = eval(data);
      $("#idEmpresaEm").val(datos[0].idEmpresa);
      $("#numeroDocumentoEm").val(datos[0].numeroDocumento);
      $("#nombreEmpresaEm").val(datos[0].nombreEmpresa);
      $("#direccionEm").val(datos[0].direccion);
      $("#telefonoEm").val(datos[0].telefono);
      $("#correoEm").val(datos[0].correo);
      $("#contraseñaEm").val(datos[0].password);
      $("#tipoDocumentoEm").val(datos[0].tipoDocumento);
      $("#sedeEm").val(datos[0].sede);
      $("#cargoEm").val(datos[0].cargo);
    });
  });
  $("#EditarEmpresa").submit(function (e) {
    e.preventDefault();
    idEmpresa = $.trim($("#idEmpresaEm").val());
    numeroDocumento = $.trim($("#numeroDocumentoEm").val());
    nombreEmpresa = $.trim($("#nombreEmpresaEm").val());
    direccion = $.trim($("#direccionEm").val());
    telefono = $.trim($("#telefonoEm").val());
    correo = $.trim($("#correoEm").val());
    contraseña = $.trim($("#contraseñaEm").val());
    tipoDocumento = $.trim($("#tipoDocumentoEm").val());
    sede = $.trim($("#sedeEm").val());
    cargo = $.trim($("#cargoEm").val());
    opcion = "ActualizarEmpresa";

    if (sede.trim() === "null" || tipoDocumento.trim() === "null") {
      swal("faltan campos por llenar", "", "error");
    } else {
      $.ajax({
        url: "app/controlador/EmpresaControlador.php",
        type: "POST",
        data: {
          idEmpresa: idEmpresa,
          numeroDocumento: numeroDocumento,
          nombreEmpresa: nombreEmpresa,
          direccion: direccion,
          telefono: telefono,
          correo: correo,
          contraseña: contraseña,
          tipoDocumento: tipoDocumento,
          sede: sede,
          cargo: cargo,
          opcion: opcion,
        },
      }).done(function (data) {
        if (data == 1) {
          $("#ModalEditarEmpresa").modal("hide");
          swal("", "DATOS ACTUALIZADOS", "success");
          contadorE = 0;
          tablaEmpresa.ajax.reload(null, false);
        } else {
          swal("", "HA OCURRIDO UN ERROR", "error");
        }
      });
    }
  });

  //OPCIONES DE ELIMINAR DATOS

  //ELIMINAR DATOS DE LAS EMPRESAS
  $(document).on("click", ".btnEliminarEmpresa", function () {
    opcion = "EliminarEmpresa";
    id_empresa = $(this).data("id");
    fila = $(this);
    swal({
      title: "Estas Seguro De Eliminar ",
      text: "",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "app/controlador/EmpresaControlador.php",
          type: "POST",
          data: { opcion: opcion, id_empresa: id_empresa },
        }).done(function (data) {
          if ((data = 1)) {
            contadorEm = 0;
            tablaEmpresa.row(fila.parents("tr")).remove().draw();
            swal("Datos Eliminados", { icon: "success" });
            tablaEmpresa.ajax.reload(null, false);
          } else {
            alert(data);
          }
        });
      } else {
        swal("CANCELADO", "", "error");
      }
    });
  });

  //OPCIONES DE REGISTRAR DATOS

  //REGISTRAR EMPRESAS
  $("#RegistrarDatosEmpresa").submit(function (e) {
    e.preventDefault();
    cargo = $.trim($("#cargoEmp").val());
    nombreEmpresa = $.trim($("#nombreEmpresaEmp").val());
    direccion = $.trim($("#direccionEmp").val());
    telefono = $.trim($("#telefonoEmp").val());
    correo = $.trim($("#correoEmp").val());
    contraseña = $.trim($("#contraseñaEmp").val());
    tipoDocumento = $.trim($("#tipoDocumentoEmp").val());
    numeroDocumento = $.trim($("#numeroDocumentoEmp").val());
    documeto = $.trim($("#documentoEmp").val());
    nombreCargo = $.trim($("#nombreCargoEmp").val());
    sede = $.trim($("#sedeEmp").val());
    regional = $.trim($("#regionalEmp").val());
    centro = $.trim($("#centroEmp").val());
    if (
      cargo === "null" ||
      sede === "null" ||
      tipoDocumento === "null" ||
      regional === "null" ||
      centro === "null"
    ) {
      swal("", "FALTAN CAMPOS POR LLENAR", "error");
    } else {
      if (cargo != 5) {
        if (cargo == 9) {
          opcion = "GuardarEmpresa";
          $.ajax({
            url: "app/controlador/EmpresaControlador.php",
            type: "post",
            data: {
              cargo: cargo,
              nombreEmpresa: nombreEmpresa,
              direccion: direccion,
              telefono: telefono,
              correo: correo,
              contraseña: contraseña,
              tipoDocumento: tipoDocumento,
              numeroDocumento: numeroDocumento,
              documeto: documeto,
              nombreCargo: nombreCargo,
              sede: sede,
              opcion: opcion,
            },
          }).done(function (data) {
            if ((data = 1)) {
              $("#ModalAgregarEmpresa").modal("hide");
              $("#ModalAgregarEmpresa").find("input").val("");
              $("#ModalAgregarEmpresa").find("select").val("null");
              swal("GUARDADO EXITOSAMENTE", "", "success");
              tablaEmpresa.ajax.reload(null, false);
            } else {
              swal("", "ERROR", "error");
            }
          });
        }
      }
    }
  });

  //REGISTRAR PETICIONES DE LAS EMPRESAS
  $("#EnviarPeticiones").submit(function (e) {
    e.preventDefault();
    const form = document.querySelector("form");
    opcion = "GuardarPeticiones";
    cantidadAprendizes = $("#cantidadAprendizes").val();
    formacion = $("#formacion").val();
    programa = $("#programa").val();
    motivo = $("#motivo").val();
    nombreEmpresa = $("#nombreEmpresa").val();
    fecha = $("#fecha").val();
    hora = $("#hora").val();

    $.ajax({
      url: "app/controlador/EmpresaControlador.php",
      type: "POST",
      data: {
        opcion: opcion,
        cantidadAprendizes: cantidadAprendizes,
        formacion: formacion,
        programa: programa,
        motivo: motivo,
        fecha: fecha,
        hora: hora,
        nombreEmpresa: nombreEmpresa,
      },
    }).done(function (data) {
      if (data == 1) {
        swal("", "PETICION ENVIADA CON EXITO!!", "success");
        contadorT = 0;
        form.reset();
      } else {
        swal("", "HA OCURRIDO UN ERROR!!", "error");
      }
    });
  });

  //CAMBIO DINAMICO DE SELECT
  $("#formacion").on("change", function (e) {
    e.preventDefault();
    opcion = "listarProgramaTecniTecno";
    formacion = $("#formacion").val();
    $.ajax({
      url: "app/controlador/EmpresaControlador.php",
      type: "POST",
      data: {
        opcion: opcion,
        formacion: formacion,
      },
    }).done(function (data) {
      var dato = eval(data);
      var cadena = `<select class="form-select" data-width="100%" data-size="3" name="programa" id="programa" required>
                    <option value="null">--SELECIONE--</option>`;
      for (i = 0; i < dato.length; i++) {
        cadena += `<option value="${dato[i].tbl_programa_ID}">${dato[i].tbl_programa_NOMBRE}</option>`;
      }
      cadena += `</select>`;
      $("#listaPrograma").html(cadena);
    });
  });

  //VALIDAR INFORMACION DE ENVIO
  $(document).on("click", ".btnValidar", function () {
    $("#ModalValidarPeticion").modal("show");
    $("#idValidacion").val($(this).data("id"));
  });

  $("#ValidarPeticion").submit(function (e) {
    e.preventDefault();
    opcion = "EnviarValidacion";
    sede = $.trim($("#sedePet").val());
    tipoValidacion = $.trim($("#validarPet").val());
    motivo = $.trim($("#motivoPet").val());
    nombreEmpresa = $.trim($("#nombreEmpresaPet").val());
    idValidacion = $.trim($("#idValidacion").val());
    if (sede === "null" || tipoValidacion === "null") {
      swal("", "FALTAN CAMPOS POR LLENAR", "error");
    } else {
      $.ajax({
        url: "app/controlador/EmpresaControlador.php",
        type: "post",
        data: {
          opcion: opcion,
          sede: sede,
          tipoValidacion: tipoValidacion,
          motivo: motivo,
          idValidacion: idValidacion
        },
      }).done(function (data) {
        opcion2 = "ActualizarValidacion";
        idValidacion = $.trim($("#idValidacion").val());
        tipoValidacion = $.trim($("#validarPet").val());
        alert(idValidacion)
        if (data == 1) {
          $.ajax({
            url: "app/controlador/EmpresaControlador.php",
            type: "POST",
            data: {
              opcion: opcion2,
              idValidacion: idValidacion,
              tipoValidacion: tipoValidacion
            },
          });
          $("#ModalValidarPeticion").modal("hide");
          swal("", "ENVIADO!!", "success");
          contadorV = 0;
          tablaPeticionesRecibidasEmpresa.ajax.reload(null, false);
          tablaPeticionesEnviadasAdmins.ajax.reload(null, false);
          ModalValidarPeticion.ajax.reload(null, false);
          ModalEnvio.ajax.reload(null, false);
          ModalPeticiones.ajax.reload(null, false);

        } else {
          swal("", "HA OCURRIDO UN ERROR", "error");
        }
      });
    }
  });

  //CARGUE DE ARCHIVOS EXCEL
});
