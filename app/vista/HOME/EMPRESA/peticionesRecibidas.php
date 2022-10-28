<main id="main" class="main">
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title" style="font-size:30px; text-align:center;">NOTIFICACIONES&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <!-- Accordion without outline borders -->
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style="font-size:20px;">
                                <b>BANDEJA</b>
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <br><br>

                                        <div class="col">
                                            <div class="card col" style="width: 19rem;">
                                                <img src="public/assets/img/PeticionesEnviadas.webp" class="card-img-top">
                                                <div class="card-body">
                                                    <h5 class="card-title">SALIDA</h5>
                                                    <p class="card-text"></p>
                                                    <div style="text-align: center">
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalPeticiones2">Ver <i class="bi bi-eye-fill"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card col" style="width: 19rem;">
                                                <img src="public/assets/img/PeticionesRecibidas.webp" class="card-img-top">
                                                <div class="card-body">
                                                    <h5 class="card-title">ENTRADA</h5>
                                                    <p class="card-text"></p>
                                                    <div style="text-align: center">
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalEnvio2">Ver <i class="bi bi-eye-fill"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <!--MODAL DE PETICIONES-->
    <div class="modal fade" id="ModalPeticiones2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><label style="font-size:20px; font-weight: bold;">BANDEJA DE ENTRADA</label></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                    <?php
                        if ($id_sede == 1) {
                    ?>
                        <table class="table" id="tablaPeticionesEnviadasEmpresa" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">EMPRESAS</th>
                                    <th scope="col">CANTIDAD(Aprendizes)</th>
                                    <th scope="col">FORMACION</th>
                                    <th scope="col">PROGRAMA</th>
                                    <th scope="col">MOTIVO DE PETICION</th>
                                    <th scope="col">FECHA</th>
                                    <th scope="col">HORA</th>
                                    <th scope="col"></th>

                                    
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!--MODAL ENVIO DE PETICIONES-->
     <div class="modal fade" id="ModalEnvio2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><label style="font-size:20px; font-weight: bold;">BANDEJA DE SALIDA</label></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table" id="tablaPeticionesRecibidasAdmins" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">SEDE</th>
                                    <th scope="col">VALIDACION</th>
                                    <th scope="col">MOTIVO</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!--VALIDAR OPCIONES-->
    <form action="" method="POST" id="ValidarPeticion">
        <div class="modal fade" id="ModalValidarPeticion" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="jesus-header">
                        <h5 class="modal-title"><b style="color: white;">MOTIVO DE PETICION</b></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                    <div class="col-6">
                                        <b>SEDE:</b>
                                        <select class="form-select" data-width="100%" data-size="3" name="sedePet" id="sedePet" disabled>
                                            <option value="1">METALMECANICA MALAMBO</option>
                                        </select>
                                    </div>
                                <div class="col-6">
                                        <b>VALIDACION:</b>
                                        <select class="form-select" data-width="100%" data-size="3" name="validarPet" id="validarPet" required>
                                            <option value="null">--SELECCIONE--</option>
                                            <option value="1">ACEPTADA</option>
                                            <option value="2">DENEGADA</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <b>MOTIVO:</b>
                                    <textarea class="form-control" id="motivoPet" name="motivoPet" rows="3" placeholder="¿POR QUE?" required></textarea>
                                </div>
                            </div>
                            <input type="hidden" id="idPeticion" name="idPeticion" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="idPeticion" name="idPeticion">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CERRAR</button>
                        <button type="submit" class="btn btn-primary">ENVIAR</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
        
</main>