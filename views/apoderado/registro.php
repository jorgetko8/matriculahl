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
            <h1>Registro de Apoderado del estudiante</h1>
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
                  <h3 class="card-title">Formulario de registro del apoderado</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="<?=base_url?>apoderado/registrar" method="POST" enctype="multipart/form-data">
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
                      <label for="nombres">Nombres:</label>
                      <input type="text" class="form-control" name="nombres" placeholder="Ingrese sus nombres"  value="<?= isset($form)? $form['nombres'] : ''; ?>">
                    <?php if(isset($_SESSION['error']['nombre'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['nombre'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>
                      
                    <div class="form-group">
                      <label for="ape_paterno">Apellidos Paterno:</label>
                      <input type="text" class="form-control" name="ape_paterno" placeholder="Ingrese su apellido paterno"  value="<?= isset($form)? $form['ape_paterno'] : ''; ?>">
                    <?php if(isset($_SESSION['error']['ape_paterno'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['ape_paterno'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>
                      
                    <div class="form-group">
                      <label for="ape_materno">Apellidos Materno:</label>
                      <input type="text" class="form-control" name="ape_materno" placeholder="Ingrese su apellido materno"  value="<?= isset($form)? $form['ape_materno'] : ''; ?>">
                    <?php if(isset($_SESSION['error']['ape_materno'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['ape_materno'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>
                      
                    <div class="form-group">
                          <label for="tipo_documento">Tipo de Documento:</label>
                          <select class="custom-select" name="tipo_documento">
                            <option value="DNI"  <?= isset($form) && $form['tipo_documento'] == "DNI"? 'selected' : ''; ?>>DNI</option>
                            <option value="CARNET EXTRANJERIA" <?= isset($form) && $form['tipo_documento'] == "CARNET EXTRANJERIA"? 'selected' : ''; ?>>CARNET EXTRANJERIA</option>
                            <option value="OTRO"  <?= isset($form) && $form['tipo_documento'] == "OTRO"? 'selected' : ''; ?>>OTRO</option>
                          </select>
                    </div>
                      
                    <div class="form-group">
                      <label for="documento_identidad">N° Documento:</label>
                      <input type="text" class="form-control" name="documento_identidad" placeholder="Ingrese numero de documento" value="<?= isset($form)? $form['documento_identidad'] : ''; ?>">
                    <?php if(isset($_SESSION['error']['documento_identidad'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['documento_identidad'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>

                    <div class="form-group">
                          <label for="sexo">Sexo:</label>
                          <select class="custom-select" name="sexo">
                            <option value="masculino"  <?= isset($form) && $form['sexo'] == "masculino"? 'selected' : ''; ?>>MASCULINO</option>
                            <option value="femenino"  <?= isset($form) && $form['sexo'] == "femenino"? 'selected' : ''; ?>>FEMENINO/option>
                          </select>
                    </div>
                      
                    <div class="form-group">
                      <label for="tipo">Tipo:</label>
                      <input type="text" class="form-control" name="tipo" value="Estudiante" disabled="disabled">
                    </div>

                    <div class="form-group">
                      <label for="religion">Religion:</label>
                      <input type="text" class="form-control" name="religion" placeholder="Ingrese su religion"  value="<?= isset($form)? $form['religion'] : ''; ?>">
                    <?php if(isset($_SESSION['error']['religion'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['religion'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>

                    <div class="form-group">
                      <label for="paisnac">Pais de nacimiento:</label>
                      <input type="text" class="form-control" name="paisnac" placeholder="Ingrese su pais de nacimiento" value="<?= isset($form)? $form['paisnac'] : ''; ?>">
                    <?php if(isset($_SESSION['error']['paisnac'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['paisnac'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>

                    <div class="form-group">
                      <label for="departamentonac">Departamento de nacimiento:</label>
                      <input type="text" class="form-control" name="departamentonac" placeholder="Ingrese su departamento de nacimiento" value="<?= isset($form)? $form['departamentonac'] : ''; ?>">
                    <?php if(isset($_SESSION['error']['departamentonac'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['departamentonac'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>

                    <div class="form-group">
                      <label for="provincianac">Provincia de nacimiento:</label>
                      <input type="text" class="form-control" name="provincianac" placeholder="Ingrese su provincia de nacimiento" value="<?= isset($form)? $form['provincianac'] : ''; ?>">
                    <?php if(isset($_SESSION['error']['provincianac'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['provincianac'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>

                    <div class="form-group">
                      <label for="distritonac">Distrito de nacimiento:</label>
                      <input type="text" class="form-control" name="distritonac" placeholder="Ingrese su distrito de nacimiento" value="<?= isset($form)? $form['distritonac'] : ''; ?>">
                    <?php if(isset($_SESSION['error']['distritonac'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['distritonac'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>

                    <div class="form-group">
                          <label for="discapacidad">Discapacidad:</label>
                          <select class="custom-select" name="discapacidad">
                            <option value="no" <?= isset($form) && $form['discapacidad'] == "no"? 'selected' : ''; ?>>NO TIENE</option>
                            <option value="si" <?= isset($form) && $form['discapacidad'] == "si"? 'selected' : ''; ?>>SI TIENE</option>
                          </select>
                    </div>

                    <div class="form-group">
                      <label for="tipodiscapacidad">(*)Tipo de discapacidad:</label>
                      <input type="text" class="form-control" name="tipodiscapacidad" placeholder="Ingrese tipo de discapacidad" value="<?= isset($form)? $form['tipodiscapacidad'] : '-'; ?>">
                    <?php if(isset($_SESSION['error']['tipodiscapacidad'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['tipodiscapacidad'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>

                    <div class="form-group">
                      <label for="fecha_nac">Fecha de nacimiento:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control" name="fecha_nac" placeholder="Ingrese una fecha de nacimiento" value="<?= isset($form)? $form['fecha_nac'] : ''; ?>">
                      </div>
                    <?php if(isset($_SESSION['error']['fecha_nac_original'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['fecha_nac_original'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>

                    <div class="form-group">
                      <label for="direcciondom">Direccion de domicilio:</label>
                      <input type="text" class="form-control" name="direcciondom" placeholder="Ingrese su Direccion de domicilio" value="<?= isset($form)? $form['direcciondom'] : ''; ?>">
                    <?php if(isset($_SESSION['error']['direcciondom'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['direcciondom'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>

                    <div class="form-group">
                      <label for="lugardom">Lugar de domicilio:</label>
                      <input type="text" class="form-control" name="lugardom" placeholder="Ingrese su Lugar de domicilio" value="<?= isset($form)? $form['lugardom'] : ''; ?>">
                    <?php if(isset($_SESSION['error']['lugardom'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['lugardom'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>

                    <div class="form-group">
                      <label for="departamentodom">Departamento de domicilio:</label>
                      <input type="text" class="form-control" name="departamentodom" placeholder="Ingrese su Departamento de domicilio" value="<?= isset($form)? $form['departamentodom'] : ''; ?>">
                    <?php if(isset($_SESSION['error']['departamentodom'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['departamentodom'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>

                    <div class="form-group">
                      <label for="provinciadom">Provincia de domicilio:</label>
                      <input type="text" class="form-control" name="provinciadom" placeholder="Ingrese su Provincia de domicilio" value="<?= isset($form)? $form['provinciadom'] : ''; ?>">
                    <?php if(isset($_SESSION['error']['provinciadom'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['provinciadom'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>

                    <div class="form-group">
                      <label for="distritodom">Distrito de domicilio:</label>
                      <input type="text" class="form-control" name="distritodom" placeholder="Ingrese su Distrito de domicilio" value="<?= isset($form)? $form['distritodom'] : ''; ?>">
                    <?php if(isset($_SESSION['error']['distritodom'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['distritodom'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>

                    <div class="form-group">
                      <label for="telefonodom">Telefono de domicilio:</label>
                      <input type="text" class="form-control" name="telefonodom" placeholder="Ingrese su Telefono de domicilio" value="<?= isset($form)? $form['telefonodom'] : ''; ?>">
                    <?php if(isset($_SESSION['error']['telefonodom'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['telefonodom'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>

                    <div class="form-group">
                      <label for="correo">Correo:</label>
                      <input type="email" class="form-control" name="correo" placeholder="Ingrese su correo" value="<?= isset($form)? $form['correo'] : ''; ?>">
                    <?php if(isset($_SESSION['error']['correo'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['correo'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>
  
                    <div class="form-group">
                      <label for="foto">Foto:</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="foto">
                          <label class="custom-file-label" for="">Elegir foto...</label>
                        </div>
                      </div>
                    </div>

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer" id="boton_enviar">
                    <button type="submit" class="btn btn-primary" id="boton_enviar1">Registrar</button>
                  </div>
                  <?php Helpers::borrarForm(); ?>
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