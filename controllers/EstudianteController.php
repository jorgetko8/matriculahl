<?php

require_once 'models/estudiante.php';

class EstudianteController{
	
	public function registro(){

		if(isset($_SESSION['form'])){
			$form = $_SESSION['form'];
		}
		
		helpers::noSession();
		$_SESSION['estud']['registro_estud'] = true; // Enciende el menu de estudiante - registrar
		require_once 'views/estudiante/registro.php';

	}

	public function listado(){

		helpers::noSession();

		$estudiante = new Estudiante();
		$estudiantes = $estudiante->obtenerLista();
		$_SESSION['estud']['listar_estud'] = true; // Enciende el menu de estudiante - listar

		require_once 'views/estudiante/lista.php';
	}

	public function modificacion(){

		helpers::noSession();

		if(isset($_GET['id'])){

			helpers::noSession();
			$estud = new Estudiante();
			$id_modificar = $_GET['id'];
			$estud->setDocumento_identidad($id_modificar);
			$estud = $estud->estudianteById();
			$estud = $estud->fetch_object();
			$_SESSION['estud'] = true;

			require_once 'views/estudiante/modificar.php';
		}else{
			header("Location:".base_url."estudiante/listado");
		}
	}

	public function actualizar(){

		if(isset($_POST)){

			helpers::noSession();
			$db = Database::conexion();
			$nombres = isset($_POST['nombres']) ? mysqli_real_escape_string($db, trim($_POST['nombres'])) : false;
			$ape_paterno = isset($_POST['ape_paterno']) ? mysqli_real_escape_string($db, trim($_POST['ape_paterno'])) : false;
			$ape_materno = isset($_POST['ape_materno']) ? mysqli_real_escape_string($db, trim($_POST['ape_materno'])) : false;
			$tipo_documento = isset($_POST['tipo_documento']) ? mysqli_real_escape_string($db, trim($_POST['tipo_documento'])) : false;
			$documento_identidad = isset($_POST['documento_identidad']) ? trim($_POST['documento_identidad']) : false;
			$religion = isset($_POST['religion']) ? mysqli_real_escape_string($db, trim($_POST['religion'])) : false;	
			$correo = isset($_POST['correo']) ? mysqli_real_escape_string($db, trim($_POST['correo'])) : false;
			$fecha_nac_original = isset($_POST['fecha_nac']) ? mysqli_real_escape_string($db, trim($_POST['fecha_nac'])) : false;
			$paisnac = isset($_POST['paisnac']) ? mysqli_real_escape_string($db, trim($_POST['paisnac'])) : false;
			$departamentonac = isset($_POST['departamentonac']) ? mysqli_real_escape_string($db, trim($_POST['departamentonac'])) : false;
			$provincianac = isset($_POST['provincianac']) ? mysqli_real_escape_string($db, trim($_POST['provincianac'])) : false;
			$distritonac = isset($_POST['distritonac']) ? mysqli_real_escape_string($db, trim($_POST['distritonac'])) : false;
			$discapacidad = isset($_POST['discapacidad']) ? mysqli_real_escape_string($db, trim($_POST['discapacidad'])) : false;
			$tipodiscapacidad = isset($_POST['tipodiscapacidad']) ? mysqli_real_escape_string($db, trim($_POST['tipodiscapacidad'])) : false;
			$direcciondom = isset($_POST['direcciondom']) ? mysqli_real_escape_string($db, trim($_POST['direcciondom'])) : false;
			$lugardom = isset($_POST['lugardom']) ? mysqli_real_escape_string($db, trim($_POST['lugardom'])) : false;
			$departamentodom = isset($_POST['departamentodom']) ? mysqli_real_escape_string($db, trim($_POST['departamentodom'])) : false;
			$provinciadom = isset($_POST['provinciadom']) ? mysqli_real_escape_string($db, trim($_POST['provinciadom'])) : false;
			$distritodom = isset($_POST['distritodom']) ? mysqli_real_escape_string($db, trim($_POST['distritodom'])) : false;
			$telefonodom = isset($_POST['telefonodom']) ? mysqli_real_escape_string($db, trim($_POST['telefonodom'])) : false;
			

			if (is_numeric($nombres) || preg_match("/[0-9]/", $nombres) || strlen($nombres) > 50) {
				$_SESSION['error']['nombre'] = "Ingrese valores validos en el campo nombres(max. 30 caracteres)";
			} elseif (!$nombres) {
				$_SESSION['error']['nombre'] = "Rellene el campo Nombres";
			}

			if (is_numeric($ape_paterno) || preg_match("/[0-9]/", $ape_paterno) || strlen($ape_paterno) > 20) {
				$_SESSION['error']['ape_paterno'] = "Ingrese valores validos en el campo Apellido Paterno(max. 20 caracteres)";
			} elseif (!$ape_paterno) {
				$_SESSION['error']['ape_paterno'] = "Rellene el campo Apellido Paterno";
			}

			if (is_numeric($ape_materno) || preg_match("/[0-9]/", $ape_materno) || strlen($ape_materno) > 20) {
				$_SESSION['error']['ape_materno'] = "Ingrese valores validos en el campo Apellido Materno(max. 20 caracteres)";
			} elseif (!$ape_materno) {
				$_SESSION['error']['ape_materno'] = "Rellene el campo Apellido Materno";
			}

			if (!is_numeric($documento_identidad) || preg_match("/[a-zA-Z]/", $documento_identidad) || strlen($documento_identidad) > 13) {
				$_SESSION['error']['documento_identidad'] = "Ingrese un numero de documento valido";
			} elseif (!$documento_identidad) {
				$_SESSION['error']['documento_identidad'] = "Rellene el campo Documento de identidad";
			}

			if (preg_match("/[a-zA-Z]/", $fecha_nac_original) || strlen($fecha_nac_original) > 10) {
				$_SESSION['error']['fecha_nac_original'] = "Ingrese una fecha de nacimiento valida";
			} elseif (!$fecha_nac_original) {
				$_SESSION['error']['fecha_nac_original'] = "Elija una fecha de nacimiento en el calendario";
			}

			if (!is_string($correo) || !filter_var($correo, FILTER_VALIDATE_EMAIL) || strlen($correo) > 25) {
				$_SESSION['error']['correo'] = "Ingrese un correo valido(max. 25 caracteres)";
			} elseif (!$correo) {
				$_SESSION['error']['correo'] = "Rellene el campo Correo";
			}

			if (is_numeric($religion) || preg_match("/[0-9]/", $religion) || strlen($religion) > 20) {
				$_SESSION['error']['religion'] = "Ingrese valores validos en el campo Religion(max. 20 caracteres)";
			} elseif (!$religion) {
				$_SESSION['error']['religion'] = "Rellene el campo Religion";
			}

			if (is_numeric($paisnac) || preg_match("/[0-9]/", $paisnac) || strlen($paisnac) > 20) {
				$_SESSION['error']['paisnac'] = "Ingrese valores validos en el campo Pais de nacimiento(max. 20 caracteres)";
			} elseif (!$paisnac) {
				$_SESSION['error']['paisnac'] = "Rellene el campo Pais de nacimiento";
			}

			if (is_numeric($departamentonac) || preg_match("/[0-9]/", $departamentonac) || strlen($departamentonac) > 20) {
				$_SESSION['error']['departamentonac'] = "Ingrese valores validos en el campo Departamento de nacimiento(max. 20 caracteres)";
			} elseif (!$departamentonac) {
				$_SESSION['error']['departamentonac'] = "Rellene el campo Departamento de nacimiento";
			}

			if (is_numeric($provincianac) || preg_match("/[0-9]/", $provincianac) || strlen($provincianac) > 20) {
				$_SESSION['error']['provincianac'] = "Ingrese valores validos en el campo Provincia de nacimiento(max. 20 caracteres)";
			} elseif (!$provincianac) {
				$_SESSION['error']['provincianac'] = "Rellene el campo Provincia de nacimiento";
			}

			if (is_numeric($distritonac) || preg_match("/[0-9]/", $distritonac) || strlen($distritonac) > 20) {
				$_SESSION['error']['distritonac'] = "Ingrese valores validos en el campo Distrito de nacimiento(max. 20 caracteres)";
			} elseif (!$distritonac) {
				$_SESSION['error']['distritonac'] = "Rellene el campo Distrito de nacimiento";
			}

			if (is_numeric($tipodiscapacidad) || preg_match("/[0-9]/", $tipodiscapacidad) || strlen($tipodiscapacidad) > 20) {
				$_SESSION['error']['tipodiscapacidad'] = "Ingrese valores validos en el campo Tipo de discapacidad(max. 20 caracteres)";
			}

			if (strlen($direcciondom) > 100) {
				$_SESSION['error']['direcciondom'] = "Ingrese valores validos en el campo Direccion de domicilio(max. 100 caracteres)";
			} elseif (!$direcciondom) {
				$_SESSION['error']['direcciondom'] = "Rellene el campo Direccion de domicilio";
			}

			if (strlen($lugardom) > 50) {
				$_SESSION['error']['lugardom'] = "Ingrese valores validos en el campo Lugar de domicilio(max. 50 caracteres)";
			} elseif (!$lugardom) {
				$_SESSION['error']['lugardom'] = "Rellene el campo Lugar de domicilio";
			}

			if (strlen($departamentodom) > 50) {
				$_SESSION['error']['departamentodom'] = "Ingrese valores validos en el campo Departamento de domicilio(max. 50 caracteres)";
			} elseif (!$departamentodom) {
				$_SESSION['error']['departamentodom'] = "Rellene el campo Departamento de domicilio";
			}

			if (strlen($provinciadom) > 50) {
				$_SESSION['error']['provinciadom'] = "Ingrese valores validos en el campo Provincia de domicilio(max. 50 caracteres)";
			} elseif (!$provinciadom) {
				$_SESSION['error']['provinciadom'] = "Rellene el campo Provincia de domicilio";
			}

			if (strlen($distritodom) > 50) {
				$_SESSION['error']['distritodom'] = "Ingrese valores validos en el campo Distrito de domicilio(max. 50 caracteres)";
			} elseif (!$distritodom) {
				$_SESSION['error']['distritodom'] = "Rellene el campo Distrito de domicilio";
			}

			if (preg_match("/[a-zA-Z]/", $telefonodom) || strlen($telefonodom) > 11) {
				$_SESSION['error']['telefonodom'] = "Ingrese un numero de Telefono de domicilio valido";
			} elseif (!$telefonodom) {
				$_SESSION['error']['telefonodom'] = "Rellene el campo Telefono de domicilio";
			}


        // Validar si hay algun error antes de guardar

			if (!isset($_SESSION['error']) || count($_SESSION['error']) == 0) {
            // Fecha de nac. (administrativo)
				$fecha_nac = date("Y-m-d", strtotime($fecha_nac_original));

            // Datos propios de usuario
				$usuario_nick = $documento_identidad;

				$yearnac = date("Y", strtotime($fecha_nac_original));
				$password_sin_enc = $yearnac . "" . $yearnac;
				$password = password_hash($password_sin_enc, PASSWORD_BCRYPT, ['cost' => 4]);
				$privilegio = 3;
				$estado = 1;


            // Registro de administrativo
				$estudiante = new Estudiante();
				$estudiante->setDocumento_identidad($documento_identidad);
				$estudiante->setTipo_documento($tipo_documento);
				$estudiante->setNombres($nombres);
				$estudiante->setApe_paterno($ape_paterno);
				$estudiante->setApe_materno($ape_materno);
				$estudiante->setCorreo($correo);
				$estudiante->setReligion($religion);
				$estudiante->setFecha_nac($fecha_nac);
				$estudiante->setPais($paisnac);
				$estudiante->setDepartamento($departamentonac);
				$estudiante->setProvincia($provincianac);
				$estudiante->setDistrito($distritonac);
				$estudiante->setDiscapacidad($discapacidad);
				$estudiante->setTipo_discapacidad($tipodiscapacidad);
				$estudiante->setUsuario($usuario_nick);
				$estudiante->setPassword($password);
				$estudiante->setPrivilegio($privilegio);
				$estudiante->setEstado($estado);
				$estudiante->setDirecciondom($direcciondom);
				$estudiante->setLugardom($lugardom);
				$estudiante->setDepartamentodom($departamentodom);
				$estudiante->setProvinciadom($provinciadom);
				$estudiante->setDistritodom($distritodom);
				$estudiante->setTelefonodom($telefonodom);

            // Guardar la imagen
				// if(isset($_FILES['foto']) && $_FILES['foto']['name'] != ''){

				// 	$file = $_FILES['foto'];
				// 	$filename = $file['name'];
				// 	$mimetype = $file['type'];

				// 	$nombreUnico = $documento_identidad.'_'.$filename;

				// 	if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif"){

				// 		if(!is_dir('uploads/estudiante/imagenes')){
				// 			mkdir('uploads/estudiante/imagenes', 0777, true);
				// 		}

				// 		move_uploaded_file($file['tmp_name'], 'uploads/estudiante/imagenes/'.$nombreUnico);
				// 		$estudiante->setFoto($nombreUnico);


				// 	}else{
				// 		$_SESSION['error']['foto'] = "El formato de la imagen no es valido";
				// 	}
				// }


				$actualizarEstudiante = $estudiante->actualizarEstudiante();

				if ($actualizarEstudiante) {

					$_SESSION['completed'] = "Se actualizaron los datos correctamente";

				}

			} else {
				$_SESSION['failed'] = "Hubo un error al actualizar los datos del estudiante";
			}

			header("Location:" . base_url . 'estudiante/modificacion&id='.$documento_identidad);

		}

		header("Location:" . base_url . 'estudiante/modificacion&id='.$documento_identidad);

	}

public function registrar(){

	if(isset($_POST)){

		$form = $_POST;

		helpers::noSession();
		$db = Database::conexion();
		$nombres = isset($_POST['nombres']) ? mysqli_real_escape_string($db, trim($_POST['nombres'])) : false;
		$ape_paterno = isset($_POST['ape_paterno']) ? mysqli_real_escape_string($db, trim($_POST['ape_paterno'])) : false;
		$ape_materno = isset($_POST['ape_materno']) ? mysqli_real_escape_string($db, trim($_POST['ape_materno'])) : false;
		$tipo_documento = isset($_POST['tipo_documento']) ? mysqli_real_escape_string($db, trim($_POST['tipo_documento'])) : false;
		$documento_identidad = isset($_POST['documento_identidad']) ? trim($_POST['documento_identidad']) : false;
		$religion = isset($_POST['religion']) ? mysqli_real_escape_string($db, trim($_POST['religion'])) : false;	
		$correo = isset($_POST['correo']) ? mysqli_real_escape_string($db, trim($_POST['correo'])) : false;
		$fecha_nac_original = isset($_POST['fecha_nac']) ? mysqli_real_escape_string($db, trim($_POST['fecha_nac'])) : false;
		$paisnac = isset($_POST['paisnac']) ? mysqli_real_escape_string($db, trim($_POST['paisnac'])) : false;
		$departamentonac = isset($_POST['departamentonac']) ? mysqli_real_escape_string($db, trim($_POST['departamentonac'])) : false;
		$provincianac = isset($_POST['provincianac']) ? mysqli_real_escape_string($db, trim($_POST['provincianac'])) : false;
		$distritonac = isset($_POST['distritonac']) ? mysqli_real_escape_string($db, trim($_POST['distritonac'])) : false;
		$discapacidad = isset($_POST['discapacidad']) ? mysqli_real_escape_string($db, trim($_POST['discapacidad'])) : false;
		$tipodiscapacidad = isset($_POST['tipodiscapacidad']) ? mysqli_real_escape_string($db, trim($_POST['tipodiscapacidad'])) : false;
		$direcciondom = isset($_POST['direcciondom']) ? mysqli_real_escape_string($db, trim($_POST['direcciondom'])) : false;
		$lugardom = isset($_POST['lugardom']) ? mysqli_real_escape_string($db, trim($_POST['lugardom'])) : false;
		$departamentodom = isset($_POST['departamentodom']) ? mysqli_real_escape_string($db, trim($_POST['departamentodom'])) : false;
		$provinciadom = isset($_POST['provinciadom']) ? mysqli_real_escape_string($db, trim($_POST['provinciadom'])) : false;
		$distritodom = isset($_POST['distritodom']) ? mysqli_real_escape_string($db, trim($_POST['distritodom'])) : false;
		$telefonodom = isset($_POST['telefonodom']) ? mysqli_real_escape_string($db, trim($_POST['telefonodom'])) : false;


		if (is_numeric($nombres) || preg_match("/[0-9]/", $nombres) || strlen($nombres) > 50) {
			$_SESSION['error']['nombre'] = "Ingrese valores validos en el campo nombres(max. 30 caracteres)";
		} elseif (!$nombres) {
			$_SESSION['error']['nombre'] = "Rellene el campo Nombres";
		}

		if (is_numeric($ape_paterno) || preg_match("/[0-9]/", $ape_paterno) || strlen($ape_paterno) > 20) {
			$_SESSION['error']['ape_paterno'] = "Ingrese valores validos en el campo Apellido Paterno(max. 20 caracteres)";
		} elseif (!$ape_paterno) {
			$_SESSION['error']['ape_paterno'] = "Rellene el campo Apellido Paterno";
		}

		if (is_numeric($ape_materno) || preg_match("/[0-9]/", $ape_materno) || strlen($ape_materno) > 20) {
			$_SESSION['error']['ape_materno'] = "Ingrese valores validos en el campo Apellido Materno(max. 20 caracteres)";
		} elseif (!$ape_materno) {
			$_SESSION['error']['ape_materno'] = "Rellene el campo Apellido Materno";
		}

		if (!is_numeric($documento_identidad) || preg_match("/[a-zA-Z]/", $documento_identidad) || strlen($documento_identidad) > 13) {
			$_SESSION['error']['documento_identidad'] = "Ingrese un numero de documento valido";
		} elseif (!$documento_identidad) {
			$_SESSION['error']['documento_identidad'] = "Rellene el campo Documento de identidad";
		}

		if (preg_match("/[a-zA-Z]/", $fecha_nac_original) || strlen($fecha_nac_original) > 10) {
			$_SESSION['error']['fecha_nac_original'] = "Ingrese una fecha de nacimiento valida";
		} elseif (!$fecha_nac_original) {
			$_SESSION['error']['fecha_nac_original'] = "Elija una fecha de nacimiento en el calendario";
		}

		if (!is_string($correo) || !filter_var($correo, FILTER_VALIDATE_EMAIL) || strlen($correo) > 25) {
			$_SESSION['error']['correo'] = "Ingrese un correo valido(max. 25 caracteres)";
		} elseif (!$correo) {
			$_SESSION['error']['correo'] = "Rellene el campo Correo";
		}

		if (is_numeric($religion) || preg_match("/[0-9]/", $religion) || strlen($religion) > 20) {
			$_SESSION['error']['religion'] = "Ingrese valores validos en el campo Religion(max. 20 caracteres)";
		} elseif (!$religion) {
			$_SESSION['error']['religion'] = "Rellene el campo Religion";
		}

		if (is_numeric($paisnac) || preg_match("/[0-9]/", $paisnac) || strlen($paisnac) > 20) {
			$_SESSION['error']['paisnac'] = "Ingrese valores validos en el campo Pais de nacimiento(max. 20 caracteres)";
		} elseif (!$paisnac) {
			$_SESSION['error']['paisnac'] = "Rellene el campo Pais de nacimiento";
		}

		if (is_numeric($departamentonac) || preg_match("/[0-9]/", $departamentonac) || strlen($departamentonac) > 20) {
			$_SESSION['error']['departamentonac'] = "Ingrese valores validos en el campo Departamento de nacimiento(max. 20 caracteres)";
		} elseif (!$departamentonac) {
			$_SESSION['error']['departamentonac'] = "Rellene el campo Departamento de nacimiento";
		}

		if (is_numeric($provincianac) || preg_match("/[0-9]/", $provincianac) || strlen($provincianac) > 20) {
			$_SESSION['error']['provincianac'] = "Ingrese valores validos en el campo Provincia de nacimiento(max. 20 caracteres)";
		} elseif (!$provincianac) {
			$_SESSION['error']['provincianac'] = "Rellene el campo Provincia de nacimiento";
		}

		if (is_numeric($distritonac) || preg_match("/[0-9]/", $distritonac) || strlen($distritonac) > 20) {
			$_SESSION['error']['distritonac'] = "Ingrese valores validos en el campo Distrito de nacimiento(max. 20 caracteres)";
		} elseif (!$distritonac) {
			$_SESSION['error']['distritonac'] = "Rellene el campo Distrito de nacimiento";
		}

		if (is_numeric($tipodiscapacidad) || preg_match("/[0-9]/", $tipodiscapacidad) || strlen($tipodiscapacidad) > 20) {
			$_SESSION['error']['tipodiscapacidad'] = "Ingrese valores validos en el campo Tipo de discapacidad(max. 20 caracteres)";
		}

		if (strlen($direcciondom) > 100) {
			$_SESSION['error']['direcciondom'] = "Ingrese valores validos en el campo Direccion de domicilio(max. 100 caracteres)";
		} elseif (!$direcciondom) {
			$_SESSION['error']['direcciondom'] = "Rellene el campo Direccion de domicilio";
		}

		if (strlen($lugardom) > 50) {
			$_SESSION['error']['lugardom'] = "Ingrese valores validos en el campo Lugar de domicilio(max. 50 caracteres)";
		} elseif (!$lugardom) {
			$_SESSION['error']['lugardom'] = "Rellene el campo Lugar de domicilio";
		}

		if (strlen($departamentodom) > 50) {
			$_SESSION['error']['departamentodom'] = "Ingrese valores validos en el campo Departamento de domicilio(max. 50 caracteres)";
		} elseif (!$departamentodom) {
			$_SESSION['error']['departamentodom'] = "Rellene el campo Departamento de domicilio";
		}

		if (strlen($provinciadom) > 50) {
			$_SESSION['error']['provinciadom'] = "Ingrese valores validos en el campo Provincia de domicilio(max. 50 caracteres)";
		} elseif (!$provinciadom) {
			$_SESSION['error']['provinciadom'] = "Rellene el campo Provincia de domicilio";
		}

		if (strlen($distritodom) > 50) {
			$_SESSION['error']['distritodom'] = "Ingrese valores validos en el campo Distrito de domicilio(max. 50 caracteres)";
		} elseif (!$distritodom) {
			$_SESSION['error']['distritodom'] = "Rellene el campo Distrito de domicilio";
		}

		if (preg_match("/[a-zA-Z]/", $telefonodom) || strlen($telefonodom) > 11) {
			$_SESSION['error']['telefonodom'] = "Ingrese un numero de Telefono de domicilio valido";
		} elseif (!$telefonodom) {
			$_SESSION['error']['telefonodom'] = "Rellene el campo Telefono de domicilio";
		}


        // Validar si hay algun error antes de guardar

		if (!isset($_SESSION['error']) || count($_SESSION['error']) == 0) {
            // Fecha de nac. (administrativo)
			$fecha_nac = date("Y-m-d", strtotime($fecha_nac_original));

            // Datos propios de usuario
			$usuario_nick = $documento_identidad;

			$yearnac = date("Y", strtotime($fecha_nac_original));
			$password_sin_enc = $yearnac . "" . $yearnac;
			$password = password_hash($password_sin_enc, PASSWORD_BCRYPT, ['cost' => 4]);
			$privilegio = 3;
			$estado = 1;


            // Registro de administrativo
			$estudiante = new Estudiante();
			$estudiante->setDocumento_identidad($documento_identidad);
			$estudiante->setTipo_documento($tipo_documento);
			$estudiante->setNombres($nombres);
			$estudiante->setApe_paterno($ape_paterno);
			$estudiante->setApe_materno($ape_materno);
			$estudiante->setCorreo($correo);
			$estudiante->setReligion($religion);
			$estudiante->setFecha_nac($fecha_nac);
			$estudiante->setPais($paisnac);
			$estudiante->setDepartamento($departamentonac);
			$estudiante->setProvincia($provincianac);
			$estudiante->setDistrito($distritonac);
			$estudiante->setDiscapacidad($discapacidad);
			$estudiante->setTipo_discapacidad($tipodiscapacidad);
			$estudiante->setUsuario($usuario_nick);
			$estudiante->setPassword($password);
			$estudiante->setPrivilegio($privilegio);
			$estudiante->setEstado($estado);
			$estudiante->setDirecciondom($direcciondom);
			$estudiante->setLugardom($lugardom);
			$estudiante->setDepartamentodom($departamentodom);
			$estudiante->setProvinciadom($provinciadom);
			$estudiante->setDistritodom($distritodom);
			$estudiante->setTelefonodom($telefonodom);

            // Guardar la imagen
			if(isset($_FILES['foto'])){

				$file = $_FILES['foto'];
				$filename = $file['name'];
				$mimetype = $file['type'];

				$nombreUnico = time().'_'.$filename;

				if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif"){

					if(!is_dir('uploads/estudiante/imagenes')){
						mkdir('uploads/estudiante/imagenes', 0777, true);
					}

					move_uploaded_file($file['tmp_name'], 'uploads/estudiante/imagenes/'.$nombreUnico);
					$estudiante->setFoto($nombreUnico);


				}else{
					$_SESSION['error']['foto'] = "El formato de la imagen no es valido";
				}
			}


			$registrarEstudiante = $estudiante->registrarEstudiante();
			if ($registrarEstudiante) {

				$_SESSION['completed'] = "Registro completado correctamente";

			} else {
				$_SESSION['failed'] = "Hubo un error al guardar los datos del estudiante";
				$_SESSION['form'] = $form;
			}

			header("Location:" . base_url . 'estudiante/registro');

		}else{
			$_SESSION['form'] = $form;
			header("Location:" . base_url . 'estudiante/registro');
		}

		header("Location:" . base_url . 'estudiante/registro');

	}else{
		header("Location:" . base_url . 'estudiante/registro');
	}

}


}