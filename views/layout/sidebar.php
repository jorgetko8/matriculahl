<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?=base_url?>administrativo/index" class="brand-link">
    <img src="<?=base_url?>/assets/dist/img/logo-colegio.jpg"
    alt="AdminLTE Logo"
    class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light" style="font-size: 16px">Colegio Hans Lippershey</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?=base_url?>uploads/administrativo/imagenes/<?=$_SESSION['identity']->foto?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $_SESSION['identity']->nombres.' '.$_SESSION['identity']->ape_paterno;?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

           <!---- MENU ADMINISTRATIVOS --->
           <li class="nav-item has-treeview menu-open">
            <a href="#" <?php echo isset($_SESSION['adm'])? "class='nav-link active'" : "class='nav-link'" ?>>
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Administrativos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url?>administrativo/registro"  <?php echo isset($_SESSION['adm']['registro_adm'])? "class='nav-link active'" : "class='nav-link'" ?>>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrar nuevo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url?>administrativo/listado" <?php echo isset($_SESSION['adm']['listar_adm'])? "class='nav-link active'" : "class='nav-link'" ?>>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar administrativos</p>
                </a>
              </li>
              
            </ul>
          </li>
          <!-- FIN DE MENU ADMINISTRATIVOS -->

          <!---- MENU ESTUDIANTES --->
           <li class="nav-item has-treeview menu-open">
            <a href="#" class='nav-link'>
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Estudiantes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url?>estudiante/registro" class='nav-link'>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrar nuevo</p>
                </a>
              </li>
              
            </ul>
          </li>
          <!-- FIN DE MENU ESTUDIANTES -->
          
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <?php unset($_SESSION['adm']);?>