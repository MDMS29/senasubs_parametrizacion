<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed" href="autoreporte">
        <i class="bi bi-person-check-fill"></i><span>AUTOREPORTE</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="AsistenciaAprendiz">
        <i class="bi bi-clipboard-check"></i><span>ASISTENCIA</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="ReporteAprendiz">
        <i class="bi bi-journal-check"></i><span>REPORTES</span>
      </a>
    </li>
    <?php
    if ($consulta) {
      $bienestar = $consulta["bienestar"];
      $horario = $consulta["horario"];
      if ($bienestar == 1) {
        echo '
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#bienestar" data-bs-toggle="collapse" href="#">
        <i class="bx bxs-hand"></i><span>BIENETSAR</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="bienestar" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="fidelizacion">
            <i class="bi bi-circle"></i><span>FIDELIZACION</span>
          </a>
        </li>
        <li>
          <a href="ReporteDisciplinario">
            <i class="bi bi-circle"></i><span>REPORTE DISCIPLINARIO</span>
          </a>
        </li>
      </ul>
    </li>';
      }
      if ($horario == 1) {
        echo '
              <li class="nav-item">
                <a class="nav-link collapsed" href="horario">
                  <i class="bi bi-menu-button-wide"></i><span>HORARIO</span>
                </a>
              </li>
              ';
      }
    }
    ?>


  </ul>

</aside>