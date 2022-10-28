$(document).ready(function() {
    var contadorEX = 0;
    
    
    $('input[type="file"]').on('change', function() {
        var ext = $(this).val().split('.').pop();
        if ($(this).val() != '') {
            if(ext == "xlsx"){
            }
            else{
                $(this).val('');
                swal("Extencion no Permitida", "", "error");
            }
        }
    });

    $("#ImportarInstructores").submit(function(e){
        e.preventDefault();
        var excel = $("#InstructorExcel").val();
        if(excel === ""){
            return swal("Seleccione un archivo", "", "warning");
        }

        $("#ModalCargueInstructores").modal('hide');
        $("#ModalImportarPersonal").modal('show');
    })
})