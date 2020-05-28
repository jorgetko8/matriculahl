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
             
            <!--   <?php
                   // var_dump($estud);
                   // var_dump($form);
                  ?>  -->

                  <!-- Este campo solo se mostrara cuando se envie id de la tabla -->
                    <?php if(isset($estud)): ?>
                      <div class="alert alert-info" role="alert">
                        <h3>Estudiante:  <?= isset($estud)? $estud->nombres." ".$estud->ape_paterno." ".$estud->ape_materno : ''; ?> </h3>
                        <h3>N° Doc.:  <?= isset($estud)? $estud->documento_identidad : ''; ?> </h3>  
                      </div>
                      <?php $nombre_completo = $estud->nombres." ".$estud->ape_paterno." ".$estud->ape_materno; ?>
                      <input type="hidden" name="nombre_completo" value="<?= isset($estud)? $nombre_completo : ''; ?>">
                      <input type="hidden" name="estudiante_doc" value="<?= isset($estud)? $estud->documento_identidad : ''; ?>">

                  <!-- Este campo solo se mostrara cuando falle el registro, para conservar los datos anteriores --> 
                    <?php elseif (isset($form)): ?>
                      <div class="alert alert-info" role="alert">
                        <h3>Estudiante:  <?= isset($form)? $form['nombre_completo'] : ''; ?> </h3>
                        <h3>N° Doc.:  <?= isset($form)? $form['estudiante_doc'] : ''; ?> </h3>  
                      </div>
                      <input type="hidden" name="nombre_completo" value="<?= isset($form['nombre_completo'])? $form['nombre_completo'] : ''; ?>">
                      <input type="hidden" name="estudiante_doc" value="<?= isset($form['estudiante_doc'])? $form['estudiante_doc'] : ''; ?>">
                    <?php endif; ?>
                  <!-- FIN DEL if -->
                  
                    <div class="form-group">
                      <label for="nombres">Nombres del apoderado:</label>
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
                      <label for="grado_instruccion">Grado de instrucción:</label>
                      <input type="text" class="form-control" name="grado_instruccion" placeholder="Ingrese su grado de instrucción"  value="<?= isset($form)? $form['grado_instruccion'] : ''; ?>">
                    <?php if(isset($_SESSION['error']['grado_instruccion'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['grado_instruccion'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>

                    <div class="form-group">
                      <label for="ocupacion">Ocupación:</label>
                      <input type="text" class="form-control" name="ocupacion" placeholder="Ingrese su Ocupación"  value="<?= isset($form)? $form['ocupacion'] : ''; ?>">
                    <?php if(isset($_SESSION['error']['ocupacion'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['ocupacion'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>

                    <div class="form-group">
                          <label for="vive_con_estudiante">Vive con estudiante:</label>
                          <select class="custom-select" name="vive_con_estudiante">
                            <option value="SI"  <?= isset($form) && $form['vive_con_estudiante'] == "SI"? 'selected' : ''; ?>>SI</option>
                            <option value="NO" <?= isset($form) && $form['vive_con_estudiante'] == "NO"? 'selected' : ''; ?>>NO</option>
                          </select>
                    </div>

                    <div class="form-group">
                      <label for="religion">Religión:</label>
                      <input type="text" class="form-control" name="religion" placeholder="Ingrese su Religión"  value="<?= isset($form)? $form['religion'] : ''; ?>">
                    <?php if(isset($_SESSION['error']['religion'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['religion'] ?></div>
                        </div>
                    <?php endif; ?>
                    </div>

                    <div class="form-group">
                      <label for="celular">Celular:</label>
                      <input type="text" class="form-control" id="telefono" name="celular" placeholder="Ingrese su celular" value="<?= isset($form)? $form['celular'] : ''; ?>">
                    <?php if(isset($_SESSION['error']['celular'])): ?>
                        <div id="mensaje_error">
                            <div><?= $_SESSION['error']['celular'] ?></div>
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