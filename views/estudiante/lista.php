<?php require_once 'config/parameters.php'; ?>
<?php require_once 'views/layout/header.php'; ?>
<?php require_once 'views/layout/navbar.php'; ?>
<?php require_once 'views/layout/sidebar.php'; ?>
<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Lista de estudiantes registrados</h1>
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
	<?php if(isset($estudiantes)): ?>

		<section class="content">
			<div class="row">
				<div class="col-12">

					<!-- Contenedor de la tabla -->
					<div class="card card-primary">
						<!-- Cabecera del contenedor de la tabla -->
						<div class="card-header">
							<h3 class="card-title">Lista de resultados</h3>
						</div>
						<!-- Fin de la cabecera del contenedor tabla -->

						<!-- Inicio de la tabla -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">

								<thead>
									<tr>
										<th>N° de Documento</th>
										<th>Tipo de documento</th>
										<th>Apellido Paterno</th>
										<th>Apellido Materno</th>
										<th>Nombres</th>
										<th>Correo</th>
										<th>Telefono</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php while($estud = $estudiantes->fetch_object()): ?>
										<tr>
											<td><?=$estud->documento_identidad?></td>
											<td><?=$estud->tipo_documento?></td>
											<td><?=$estud->ape_paterno?></td>
											<td><?=$estud->ape_materno?></td>
											<td><?=$estud->nombres?></td>
											<td><?=$estud->correo?></td>
											<td><?=$estud->telefonodom?></td>
											<td class="project-actions text-right">
												<a class="btn btn-warning btn-sm" href="<?=base_url?>estudiante/modificacion&id=<?=$estud->documento_identidad?>">
													<i class="fas fa-pencil-alt">
													</i>
													Modificar
												</a>
												<a class="btn btn-info btn-sm" href="<?=base_url?>apoderado/registro&id=<?=$estud->documento_identidad?>">
													<i class="fas fa-user-plus">
													</i>
													Apoderado
												</a>
											</td>
										</tr>
									<?php endwhile; ?>
								</tbody>
								<tfoot>
									<tr>
										<th>N° de Documento</th>
										<th>Tipo de documento</th>
										<th>Apellido Paterno</th>
										<th>Apellido Materno</th>
										<th>Nombres</th>
										<th>Correo</th>
										<th>Telefono</th>
										<th>Acciones</th>
									</tr>
								</tfoot>

							</table>
						</div>
						<!-- Fin de la tabla -->
					</div>
					<!-- Fin del contenedor de la tabla -->

				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</section>

	<?php endif; ?>
	<?php Helpers::borrarErrores(); ?>
	<?php Helpers::borrarCompletado(); ?>
	<?php Helpers::borrarFallido(); ?>

</div>
<?php require_once 'views/layout/footer.php'; ?>