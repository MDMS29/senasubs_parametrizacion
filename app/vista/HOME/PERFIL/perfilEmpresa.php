<main id="main" class="main">
 
    <div class="pagetitle">
      <h1>PERFIL</h1>
      <BR>
      
    </div><!-- End Page Title -->
   
    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
              <i class="bi bi-person-circle" style="font-size:100px;"></i>
              <h2 style="text-align:center;">
                 <?php 
                    echo $datos["nombreEmpresa"];
                 ?>              
              </h2>
             
              
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">DATOS GENERALES</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">EDITAR</button>
                </li>

              

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">CAMBIAR CONTRASEÑA</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                 
                  <h5 class="card-title">PERFIL</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">NOMBRE COMPLETO</div>
                    <div class="col-lg-9 col-md-8">
                    <?php echo $datos["nombreEmpresa"]; ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">DIRECCION</div>
                    <div class="col-lg-9 col-md-8">
                       <?php  
                            echo $datos["direccion"];
                       ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">TELEFONO</div>
                    <div class="col-lg-9 col-md-8">
                       <?php  
                         echo $datos["telefono"];
                       ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">CORREO</div>
                    <div class="col-lg-9 col-md-8">
                       <?php  
                         echo $datos["correo"];
                       ?>
                    </div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                 
                  <form method="POST" id="Formulario_Empresa">
                    <div class="row mb-3">
                      <label for="nombres" class="col-md-4 col-lg-3 col-form-label">NOMBRE EMPRESA</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nombres_usuario" type="text" class="form-control" id="nombre_empresa" 
                        value="<?php echo $datos["nombreEmpresa"];  ?>" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" disabled>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="direccion" class="col-md-4 col-lg-3 col-form-label">DIRECCION</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="direccion_usuario" type="text" class="form-control" id="direccion_empresa" 
                        value="<?php echo $datos["direccion"]; ?>" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" disabled>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="telefono" class="col-md-4 col-lg-3 col-form-label">TELEFONO</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="telefono_usuario" type="number" class="form-control" id="telefono_empresa" 
                        value="<?php echo $datos["telefono"]; ?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="correo" class="col-md-4 col-lg-3 col-form-label">CORREO</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="correo_usuario" type="email" class="form-control" id="correo_empresa" 
                        value="<?php echo $datos["correo"]; ?>" required>
                        <input  type="hidden"  name="id_usuario" id="id_empresa" value="<?php  echo $_SESSION["sesion_active"]["id_empresa"];  ?>" >
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" >Guardar Cambios</button>
                    </div>
                  </form>

                </div>

              

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <form>

                    <div class="row mb-3">
                      <label for="contrasenaActual" class="col-md-4 col-lg-3 col-form-label">Contraseña Actual</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="contrasenaActual">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPass" class="col-md-4 col-lg-3 col-form-label">Nueva Contraseña</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPass">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="repetirContra" class="col-md-4 col-lg-3 col-form-label">Repetir Contraseña</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="repetirContra">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->