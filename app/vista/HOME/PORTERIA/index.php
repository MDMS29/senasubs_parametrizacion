<main id="main" class="main">

    

    <section class="section dashboard" >
          <div class="row">
            <div class="col-md-8">
                <br>
                <br>
                <div class="card" style="left: 300px; padding:10px">
                        <div class="card-body m-4">
                            <form id="FrmDatos" action="" method="post" class="form-card">
                                <!--<div class="row" id="DataPersonal">
                                    <div class="col-md-6">
                                        <div class=" form-group">
                                            <div class="form-group" style=" margin-top: 22px;">
                                                <label for="exampleInputPersonal">Id Personal</label>
                                                <input type="text" class="form-control" id="IdPersonal" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class=" form-group">
                                            <div class="form-group" style=" margin-top: 22px;">
                                                <label for="exampleInputFicha">Id Ficha</label>
                                                <input type="text" class="form-control" id="IdFicha" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class=" form-group">
                                            <div class="form-group" style=" margin-top: 22px;">
                                                <label for="exampleInputFicha">Id Programa</label>
                                                <input type="text" class="form-control" id="IdPrograma" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class=" form-group">
                                            <div class="form-group" style=" margin-top: 22px;">
                                                <label for="exampleInputFicha">Hora</label>
                                                <input type="text" class="form-control" id="Hora" value="<?php echo date('h:i:s A')?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                                <div class="row">
                                    
                                     <div class="col-md-6">
                                        <div class=" form-group">
                                            <div class="form-group" style=" margin-top: 22px;">
                                                <label for="exampleInputPassword1">Identificacion</label>
                                                <input type="number" class="form-control" id="Identificacion" placeholder="" maxLength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autofocus>
                                                <input type="hidden" class="form-control">
                                                <input type="hidden" class="form-control">
                                                <input type="hidden" class="form-control">
                                                <input type="hidden" class="form-control">
                                                <input type="hidden" class="form-control">
                                                <input type="hidden" class="form-control">
                                                <input type="hidden" class="form-control">
                                                <input type="hidden" class="form-control">
                                                <input type="hidden" class="form-control">
                                                <input type="hidden" class="form-control">
                                                <input type="hidden" class="form-control">
                                             </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class=" form-group">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Perfil</label>
                                                <div>
                                                    <label>
                                                        <input type="radio" name="Perfil" id="AdminPerfil" value="3" disabled>
                                                        ADMINISTRADOR
                                                    </label>
                                                </div>
                                                <div>
                                                	<label>
                                                		<input type="radio" name="Perfil" id="ApendizPerfil" value="1" disabled>
                                                		APRENDIZ
                                                	</label>
                                                </div>
                                                <div>
                                                	<label>
                                                		<input type="radio" name="Perfil" id="InstructorPerfil" value="2" disabled>
                                                		INSTRUCTOR
                                                	</label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input type="radio" name="Perfil" id="BienestarPerfil" value="4" disabled>
                                                        BIENESTAR
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input type="radio" name="Perfil" id="InvitadoPerfil" value="3" disabled>
                                                        INVITADOS
                                                    </label>
                                                </div>
                                                
                                                 
                                             </div>
                                        </div>
                                    </div>
                                <div class="col-md-6">
                                    <button id="Limpiar" type="button" class="btn btn-outline-info btn-round" style="width: 100%" name="">Limpiar</button>
                                </div>
                                <div class="col-md-6 pb-5">
                                    <button type="button" class="btn btn-info btn-round" id="Consultar" style="width: 100%" name="" focus="">Consultar</button>
                                </div>
                                <div class="col-md-6">
                                    <div class=" form-group">
                                        <div class="form-group">
                                            <label for="exampleInputPassword2">Nombres</label>
                                                <input id="Nombres" type="text" class="form-control" id="exampleInputPassword2" placeholder="" readonly>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" form-group">
                                        <div class="form-group">
                                            <label for="exampleInputPassword2">Apellidos</label>
                                            <input id="Apellidos" type="text" class="form-control" id="exampleInputPassword2" placeholder="" readonly>
                                         </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row" id="Instructor">
                                    <div class="col-md-6" >
                                        <div class=" form-group">
                                            <div class="form-group">
                                                <label for="exampleInputPassword2">Ficha</label>
                                                <input id="Ficha" type="text" class="form-control" id="exampleInputPassword2" placeholder="" readonly >
                                             </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class=" form-group">
                                            <div class="form-group">
                                                <label for="exampleInputPassword3">Programa</label>
                                                <input id="Programa" type="text" class="form-control" id="exampleInputPassword3" placeholder=""readonly >
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex justify-content-center" id="Mensaje">
                    
                </div>
                
        </div>
    
    </section>

  </main>
  <!-- Reports -->