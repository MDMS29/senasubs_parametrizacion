<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
    <?php
    if ($id_sede == 1) {
    ?>
      <li class="nav-item">
        <a class="nav-link collapsed"
            <a href="autoreporte">
              <i class="bi bi-circle"></i><span>AUTOREPORTE</span>
            </a>
      </li>

      <li class="nav-item">
      <a class="nav-link collapsed" href="Bienestar">
        <i class="bx bxs-hand"></i><span>BIENESTAR</span>
      </a>
    </li>
    <?php
    }
    ?>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#configuracion" data-bs-toggle="collapse" href="#">
        <i class="bi bi-wrench"></i><span>CONFIGURACION</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="configuracion" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <?php
        if ($id_sede == 1) {
        ?>
          <li>
            <a href="DatosRegional">
              <i class="bi bi-circle"></i><span>REGIONAL</span>
            </a>
          </li>
          <li>
            <a href="DatosCentro">
              <i class="bi bi-circle"></i><span>CENTRO</span>
            </a>
          </li>
          <li>
            <a href="DatosSede">
              <i class="bi bi-circle"></i><span>SEDE</span>
            </a>
          </li>
        <?php
        }
        ?>
        <li>
          <a href="DatosProgramas">
            <i class="bi bi-circle"></i><span>PROGRAMAS</span>
          </a>
        </li>
        <li>
          <a href="DatosFicha">
            <i class="bi bi-circle"></i><span>FICHAS</span>
          </a>
        </li>
        <li>
          <a href="DatosInstructorVSFicha">
            <i class="bi bi-circle"></i><span>INSTRUCTOR VS FICHA</span>
          </a>
        </li>

      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="DatosPersonal">
        <i class="bi bi-file-person-fill"></i><span>PERSONAL</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="Reportes">
        <i class="ri-line-chart-fill"></i><span>REPORTES DE ASISTENCIA</span>
      </a>
    </li>
    <?php
    if ($id_sede == 1) {
    ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="ReportesBienestar">
          <i class=" bi bi-bar-chart-line"></i><span>REPORTES DE BIENESTAR</span>
        </a>
      </li>
    
      <li class="nav-item">
      <a class="nav-link collapsed" href="Solicitudes">
        <i class="bi bi-envelope-fill"></i><span>SOLICITUDES</span>
      </a>
    </li>
    <?php
    }
    ?>
  </ul>

</aside>