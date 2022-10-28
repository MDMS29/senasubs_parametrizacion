<main id="main" class="main">

    <section class="section">
        <div class="card">
            <div class="card-header">
                <b style="font-size:20px;">DETALLES DE PETTICION</b>
            </div>

            <div class="card-body">
                <form action="" method="POST" id="EnviarPeticiones">
                    <div id="Formulario_peticiones">

                        <br><br>
                        <div class="row">
                            <div class="col-6">
                                <b>NOMBRE EMPRESA</b>
                            </div>
                            <div class="col-6">
                                <div class="file-upload" id="">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="nombreEmpresa" name="nombreEmpresa" placeholder="<?php echo $datos['nombreEmpresa'] ?>" value="<?php echo $datos['nombreEmpresa'] ?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <b>CANTIDAD DE APRENDIZES</b>
                            </div>
                            <div class="col-6">
                                <div class="file-upload" id="">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="cantidadAprendizes" placeholder="CANTIDAD" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="datos">
                            <div class="col-6">
                                <b>FORMACION</b>
                            </div>
                            <div class="col-6" id="listaFormacion">
                                <select class="form-select" data-width="100%" data-size="3" name="formacion" id="formacion" required>
                                    <option value="null">--SELECIONE--</option>
                                    <option value="1">COMPLEMENTARIA</option>
                                    <option value="2">TECNICO</option>
                                    <option value="3">TECNOLOGO</option>
                                </select>
                            </div>
                        </div><br>
                        <div class="row" id="datosTC">
                            <div class="col-6">
                                <b>TIPO DE PROGRAMA</b>
                            </div>
                            <div class="col-6" id="listaPrograma">
                                <!-- *<SELECT></SELECT>* LISTADO DE LOS PROGRAMAS VALIDOS EN LA SEDE -->
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-6">
                                <b>ACLARACICIONES</b>
                            </div>
                            <div class="col-6">
                                <div class="mb-3" id="datosTC">
                                    <textarea class="form-control" id="motivo" rows="3" placeholder="¿POR QUE MOTIVO REQUIERE A NUESTROS APRENDIZES?" required></textarea>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" id="fecha" name="fecha" value="">
                        <input type="hidden" id="hora" name="hora" value="">

                        <div class="card-footer text-muted">
                            <button type="submit" class="btn btn-primary">ENVIAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>

    </script>
</main><!-- End #main -->