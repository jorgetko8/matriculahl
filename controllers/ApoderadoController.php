<?php

require_once 'models/estudiante.php';
require_once 'models/apoderado.php';
require_once 'models/linea_apoderado.php';

class ApoderadoController{
	
	public function registro(){

		if(isset($_SESSION['form'])){
			$form = $_SESSION['form'];
			unset($_SESSION['form']);
		}

		if(isset($_GET['id'])){
			$id_estudiante = $_GET['id'];

			$estudiante = new Estudiante();
			$estudiante->setDocumento_identidad($id_estudiante);
			$estudiante = $estudiante->estudianteById();

			$estud = $estudiante->fetch_object();
		}
		
		Helpers::noSession();
		require_once 'views/apoderado/registro.php';

	}

	public function registrar(){

		if(isset($_POST)){

			$form = $_POST;

			helpers::noSession();
			$db = Database::conexion();

			$estudiante_doc = isset($_POST['estudiante_doc']) ? trim($_POST['estudiante_doc']) : false;
			$nombres = isset($_POST['nombres']) ? mysqli_real_escape_string($db, trim($_POST['nombres'])) : false;
			$ape_paterno = isset($_POST['ape_paterno']) ? mysqli_real_escape_string($db, trim($_POST['ape_paterno'])) : false;
			$ape_materno = isset($_POST['ape_materno']) ? mysqli_real_escape_string($db, trim($_POST['ape_materno'])) : false;
			$nombre_completo = $nombre.' '.$ape_paterno.' '.$ape_paterno;
			$tipo_documento = isset($_POST['tipo_documento']) ? mysqli_real_escape_string($db, trim($_POST['tipo_documento'])) : false;
			$documento_identidad = isset($_POST['documento_identidad']) ? trim($_POST['documento_identidad']) : false;
			$religion = isset($_POST['religion']) ? mysqli_real_escape_string($db, trim($_POST['religion'])) : false;	
			$fecha_nac_original = isset($_POST['fecha_nac']) ? mysqli_real_escape_string($db, trim($_POST['fecha_nac'])) : false;
			$grado_instruccion = isset($_POST['grado_instruccion']) ? mysqli_real_escape_string($db, trim($_POST['grado_instruccion'])) : false;
			$ocupacion = isset($_POST['ocupacion']) ? mysqli_real_escape_string($db, trim($_POST['ocupacion'])) : false;
			$vive_con_estudiante = isset($_POST['vive_con_estudiante']) ? mysqli_real_escape_string($db, trim($_POST['vive_con_estudiante'])) : false;
			$correo = isset($_POST['correo']) ? mysqli_real_escape_string($db, trim($_POST['correo'])) : false;
			$celular = isset($_POST['celular']) ? $_POST['celular'] : false;

			


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

			if (is_numeric($grado_instruccion) || preg_match("/[0-9]/", $grado_instruccion) || strlen($grado_instruccion) > 20) {
				$_SESSION['error']['grado_instruccion'] = "Ingrese valores validos en el campo Grado de instruccion(max. 30 caracteres)";
			} elseif (!$grado_instruccion) {
				$_SESSION['error']['grado_instruccion'] = "Rellene el campo Grado de instruccion";
			}

			if (is_numeric($ocupacion) || preg_match("/[0-9]/", $ocupacion) || strlen($ocupacion) > 20) {
				$_SESSION['error']['ocupacion'] = "Ingrese valores validos en el campo Ocupacion(max. 30 caracteres)";
			} elseif (!$ocupacion) {
				$_SESSION['error']['ocupacion'] = "Rellene el campo Ocupacion";
			}

			if (is_numeric($vive_con_estudiante) || preg_match("/[0-9]/", $vive_con_estudiante) || strlen($vive_con_estudiante) > 2) {
				$_SESSION['error']['vive_con_estudiante'] = "Ingrese valores validos en el campo Vive con estudiante";
			} elseif (!$vive_con_estudiante) {
				$_SESSION['error']['vive_con_estudiante'] = "Elija una opcion en el campo Vive con estudiante";
			}

			if (preg_match("/[a-zA-Z]/", $celular) || strlen($celular) > 11) {
				$_SESSION['error']['celular'] = "Ingrese un numero de celular valido";
			} elseif (!$celular) {
				$_SESSION['error']['celular'] = "Rellene el campo celular";
			}



        // Validar si hay algun error antes de guardar

			if (!isset($_SESSION['error']) || count($_SESSION['error']) == 0) {
            // Fecha de nac. (apoderado)
				$fecha_nac = date("Y-m-d", strtotime($fecha_nac_original));

            // Registro de apoderado
				$apoderado = new Apoderado();
				$apoderado->setDocumento_identidad($documento_identidad);
				$apoderado->setTipo_documento($tipo_documento);
				$apoderado->setNombres($nombres);
				$apoderado->setApe_paterno($ape_paterno);
				$apoderado->setApe_materno($ape_materno);
				$apoderado->setGrado_instruccion($grado_instruccion);
				$apoderado->setOcupacion($ocupacion);
				$apoderado->setVive_con_estudiante($vive_con_estudiante);
				$apoderado->setCorreo($correo);
				$apoderado->setReligion($religion);
				$apoderado->setFecha_nac($fecha_nac);
				$apoderado->setCelular($celular);


				$registrarApoderado = $apoderado->registrarApoderado();
				if ($registrarApoderado) {

					$_SESSION['completed'] = "Registro al Apoderado correctamente";

					// Registrar relacion estudiante-apoderado en lineas_apoderados
					$linea = new Linea_apoderado();
					$linea->setApoderado_doc($documento_identidad);
					$linea->setEstudiante_doc($estudiante_doc);
					$registrarLinea = $linea->registrarLinea();

					if($registrarLinea){
						$_SESSION['completed'] = "Registro la linea correctamente";
					}else {
						$_SESSION['failed'] = "Hubo un error al guardar los datos del Apoderado1";
						$_SESSION['form'] = $form;
					}


				} else {
					$_SESSION['failed'] = "Hubo un error al guardar los datos del Apoderado2";
					$_SESSION['form'] = $form;
				}

				header("Location:" . base_url . 'apoderado/registro');

			}else{
				$_SESSION['form'] = $form;
				header("Location:" . base_url . 'apoderado/registro');
			}

			header("Location:" . base_url . 'apoderado/registro');

		}else{
			header("Location:" . base_url . 'apoderado/registro');
		}

	}

}