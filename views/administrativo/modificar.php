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
            <h1>Modificar Personal Administrativo</h1>
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
                  <h3 class="card-title">Formulario de modificación</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="<?=base_url?>administrativo/actualizar" method="POST">
                    
                    <?php if(isset($_SESSION['completed'])): ?>
                        <div id="mensaje_completado">
                            <div><?= $_SESSION['completed'] ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($_SESSION['failed'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['failed'] ?></div>
                        </div>
                    <?php endif; ?>



                  <div class="card-body">

                    <div class="form-group">
                      <label for="documento_identidad">N° Documento:</label>
                      <input type="text" class="form-control" name="documento_identidad" placeholder="Ingrese numero de documento" value="<?=$id_modificar?>" readonly>
                    <?php if(isset($_SESSION['error']['documento_identidad'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['documento_identidad'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>


                    <div class="form-group">
                          <label for="tipo_documento">Tipo de Documento:</label>
                          <select class="custom-select" name="tipo_documento" readonly>
                            <option value="DNI">DNI</option>
                            <option value="CARNET EXTRANJERIA">CARNET EXTRANJERIA</option>
                            <option value="OTRO">OTRO</option>
                          </select>
                    </div>

                    <div class="form-group">
                      <label for="tipo">Tipo:</label>
                      <input type="text" class="form-control" name="tipo" value="Administrativo" disabled="disabled">
                    </div>

                    <div class="form-group">
                      <label for="nombres">Nombres:</label>
                      <input type="text" class="form-control" name="nombres" placeholder="Ingresa sus nombres" value="<?=$admin->nombres?>">
                    <?php if(isset($_SESSION['error']['nombre'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['nombre'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>
                      
                    <div class="form-group">
                      <label for="ape_paterno">Apellidos Paterno:</label>
                      <input type="text" class="form-control" name="ape_paterno" placeholder="Ingrese su apellido paterno" value="<?=$admin->ape_paterno?>">
                    <?php if(isset($_SESSION['error']['ape_paterno'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['ape_paterno'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>
                      
                    <div class="form-group">
                      <label for="ape_materno">Apellidos Materno:</label>
                      <input type="text" class="form-control" name="ape_materno" placeholder="Ingrese su apellido materno" value="<?=$admin->ape_materno?>">
                    <?php if(isset($_SESSION['error']['ape_materno'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['ape_materno'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>
                    
                      
  <!--                  <div class="form-group">
                      <label for="direccion">Dirección:</label>
                      <input type="text" class="form-control" name="direccion" placeholder="Ingrese su dirección">
                    </div>
                    <div class="form-group">
                      <label for="distrito">Distrito:</label>
                      <input type="text" class="form-control" name="distrito" placeholder="Ingrese su distrito">
                    </div>-->
                    <div class="form-group">
                      <label for="celular">Celular:</label>
                      <input type="text" class="form-control" id="telefono" name="celular" placeholder="Ingrese su celular" value="<?=$admin->celular?>">
                    <?php if(isset($_SESSION['error']['celular'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['celular'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>
  
                    <div class="form-group">
                      <label for="correo">Correo:</label>
                      <input type="email" class="form-control" name="correo" placeholder="Ingrese su correo" value="<?=$admin->correo?>">
                    <?php if(isset($_SESSION['error']['correo'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['correo'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>


                    <div class="form-group">
                          <label for="tipo_documento">Estado:</label>
                          <select class="custom-select" name="estado">
                            <option value="1" <?= isset($admin) && is_object($admin) && 1 == $admin->estado? 'selected' : ''; ?>>ACTIVO</option>
                            <option value="0"<?= isset($admin) && is_object($admin) && 0 == $admin->estado? 'selected' : ''; ?>>DESHABILITADO</option>
                          </select>
                    </div>

  
                    <div class="form-group">
                      <label for="fecha_nac">Fecha de nacimiento:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control" name="fecha_nac" placeholder="Ingrese una fecha de nacimiento" value="<?=$admin->fecha_nac?>">
                      </div>
                    <?php if(isset($_SESSION['error']['fecha_nac_original'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['fecha_nac_original'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>
  
<!--                    <div class="form-group">
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
                    <button type="submit" class="btn btn-primary" id="boton_enviar1">Modificar</button>
                  </div>
                  <?php Helpers::borrarErrores(); ?>
                  <?php Helpers::borrarCompletado(); ?>
                  <?php Helpers::borrarFallido(); ?>
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