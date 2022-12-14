<main class="main" id="main">
    <!--<h1>ESTADO</h1>-->
    <?php //include("app/controlador/LoginControlador.php"); ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&display=swap');
    
        body {
            background: #b696d7!important;
        }  
        .wrapper-carnet{
            position: relative;
            width:350px;
            padding: 20px 15px 1px;
            background: #d0bbe5;
            margin: auto;
            border-radius: 5px;
           
        } 
    
        .wrapper-carnet:before {
            content: "";
            position: absolute;
            top: 11px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 13px;
            background: #b696d7;
            border-radius: 50px;
        }
    
        .wrapper-carnet:after {
            content: "";
            position: absolute;
            top: -212px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 230px;
            background: #353535;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.125);
        }
    
        .card-carnet {
            width: 200px;
            height: 450px;
            background: #fff;
            padding: 20px 20px 0;
            position: relative;
            border-radius: 5px;
        }
    
        .rol {
            position: absolute;
            font-family: 'Josefin Sans', sans-serif;
            font-weight: 1200;
            font-size: 14px;
            text-transform: uppercase;
            transform: rotate(-90deg);
            letter-spacing: 4px;
            top: 90px;
            
            left: 210px;
            margin:auto;
        }
        .perfil{
            box-shadow: 0px 10px 15px -3px rgba(0,0,0,0.1);
        }
        #divisor{
            color: red;
            opacity: 1;
            margin-top: 30px;
            width: 99%;
            border-top: 2px solid red;
        }
        #divisor2{
            color: red;
            opacity: 1;
            margin-top:0px;
            width: 26%;
            margin-bottom: 2px;
            border-top: 2px solid red;
        }
        
        
        .body-card{
            font-family: 'Josefin Sans', sans-serif;
            font-weight: bold;
            font-size: 20px;
            padding-top: 0px;
            color: #ed672b;
        }
        
        .nombres .apellidos{
            padding: 0px!important;
            margin: 0px!important;   
        }
    
        .dni{
            margin:0px;
            padding-top: 15px;
            padding-bottom: 5px;
            color:#353535;
            font-family: 'Josefin Sans', sans-serif!important;
            font-size:15px;
        }
        
        .codigo{
            text-align: center;
        }
        
        #programa{
            font-family: 'Josefin Sans', sans-serif!important;
            font-size: 15px;
            color: #ed672b;
            font-weight: bold;
        }
        .regional{
            font-size: 18px;
          font-family: 'Josefin Sans', sans-serif!important;
        }
        
        #grupo-ficha{
            color:#353535;
            font-family: 'Josefin Sans', sans-serif!important;
            font-size: 14px;
        }
        
        .centro{
            font-size: 16px;
          font-family: 'Josefin Sans', sans-serif!important;
            color: #ed672b; 
        }
        
        p{
            margin: 0px !important;
            padding: 0px;
        }
        
        .pie{
            margin-top: 10px;
            margin-left: 0px !important;
        }
        
        .card{
            height:auto;
        }
    </style>
    <div class="content">
        <div class="container">
            <div class="wrapper-carnet">
                <div class="card card-carnet" style="width: 20rem;">
                    <div class="row">
                        <div class="col-4">
                            <img class="logo " src="public/assets/img/logo-sena.png" style="width:80px;" alt="...">
                        </div>
    
                        <div class="col-4">
                            <img class="perfil" src="public/assets/img/usuario.png" style="width:150px;" alt="...">
                        </div>
                        
                        <div class="col-4">
                            <?php
                                if($_SESSION['sesion_active']['tipo_usuario'] == 'ADMINISTRADOR'): 
                                    $Cargo = "ADMINISTRADOR";
                                elseif($_SESSION['sesion_active']['tipo_usuario'] == 'APRENDIZ'): 
                                    if($_SESSION['sesion_active']['codigo'] == '000003'):
                                        $Cargo="SERVICIOS";
                                    else:
                                        $Cargo="APRENDIZ";
                                    endif;
                                elseif($_SESSION['sesion_active']['tipo_usuario'] == 'BIENESTAR'):
                                    $Cargo = "BIENESTAR";
                                elseif($_SESSION['sesion_active']['tipo_usuario'] == 'INSTRUCTOR'):
                                    $Cargo = "INSTRUCTOR";
                                endif;
                            ?>
                            <p class="rol"><?php echo $Cargo;?></p>
                        </div>
                        
                       <hr/ id="divisor">
                        <div class="col-12 body-card">
                            <p id="nombres"><?php echo  strtoupper($datos['nombres']);?></p>
                            <p id="apellidos"><?php echo  strtoupper($datos['apellidos']);?></p>
                            <h6 class="dni"><?php echo  $datos['tipo_documento']; ?></h6>
                        </div>
                        
                        <div class="col-12">
                            <? 
                            if($_SESSION['sesion_active']['tipo_usuario'] == 'APRENDIZ'): ?>
                                <p id="programa"><?php echo  $datos['programa'];?></p>
                                <p id="grupo-ficha"><? echo "Ficha: ".$datos['ficha'];?></p>
                            <?
                            endif;
                            ?>
                        </div>
                        <div class="col-12 codigo">
                           <svg class="barcode"
                                jsbarcode-format="auto"
                                jsbarcode-value="<?php echo $datos['numero_documento'];?>"
                                jsbarcode-textmargin="0"
                                jsbarcode-fontoptions="bold">
                            </svg>
                        </div>
                        <div class="col-12 pie">
                            <hr id="divisor2">
                            <p class="regional">Atl??ntico</p>
                            <p class="centro">Centro Nacional Colombo Alem??n</p>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js"></script>
    <script type="text/javascript">
      JsBarcode(".barcode").init();
    </script>
</main>