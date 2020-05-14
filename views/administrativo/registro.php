<?php require_once 'config/parameters.php'; ?>
<?php require_once 'views/layout/header.php'; ?>
<?php require_once 'views/layout/navbar.php'; ?>
<?php require_once 'views/layout/sidebar.php'; ?>
<!-- CONTENIDO PRINCIPAL -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registro de usuario</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Formulario de registro</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?=base_url?>administrativo/registrar" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombres">Nombres:</label>
                    <input type="text" class="form-control" name="nombres" placeholder="Ingresa sus nombres">
                  </div>
                  <div class="form-group">
                    <label for="apepaterno">Apellidos Paterno:</label>
                    <input type="text" class="form-control" name="apepaterno" placeholder="Ingrese su apellido paterno">
                  </div>
                  <div class="form-group">
                    <label for="apematerno">Apellidos Materno:</label>
                    <input type="text" class="form-control" name="apematerno" placeholder="Ingrese su apellido materno">
                  </div>
                  <div class="form-group">
                    <label for="dni">DNI:</label>
                    <input type="text" class="form-control" name="dni" placeholder="Ingrese su dni">
                  </div>
                  <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <input type="text" class="form-control" name="tipo" value="Administrativo" disabled="disabled">
                  </div>
                  <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" class="form-control" name="direccion" placeholder="Ingrese su dirección">
                  </div>
                  <div class="form-group">
                    <label for="distrito">Distrito:</label>
                    <input type="text" class="form-control" name="distrito" placeholder="Ingrese su distrito">
                  </div>
                  <div class="form-group">
                    <label for="celular">Celular:</label>
                    <input type="text" class="form-control" id="telefono" name="celular" placeholder="Ingrese su celular">
                  </div>
                  <div class="form-group">
                    <label for="correo">Correo:</label>
                    <input type="text" class="form-control" name="correo" placeholder="Ingrese su correo">
                  </div>
                  <div class="form-group">
                    <label for="fechanac">Fecha de nacimiento:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="date" class="form-control" name="fechanac" placeholder="Enter email">
                    </div>
                  </div>
<!--                  <div class="form-group">
                    <label for="foto">Foto:</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>-->
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer" id="boton_enviar">
                  <button type="submit" class="btn btn-primary" id="boton_enviar1">Registrar</button>
                </div>
              </form>
            </div>
            
          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php require_once 'views/layout/footer.php'; ?>