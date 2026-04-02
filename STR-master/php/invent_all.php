<?php
    $perfupdat='';
	$tipousua='';
    $perfupdat = @$_GET['perfupdat'];
	
    session_start();
	
	$tipousua= $_SESSION['tipousuario'];
	
	if (($tipousua=='admin')||($tipousua=='contri')){
		echo '
        <script>
           // alert("Administrador de contenido");
           // window.location = "index.php";
        </script>
        ';
	}else{
		echo '
        <script>
            alert("No autorizado");
            window.location = "../../index.php";
        </script>
        ';
	}

    if(!isset($_SESSION['usuario'])){
        echo '
        <script>
            alert("Debe iniciar sesión para ver este contenido");
            window.location = "../../index.php";
        </script>
        ';
      
        session_destroy();
        die();
    }        
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inventory</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/sweetalert2.css">
	<link rel="stylesheet" href="../css/material.min.css">
	<link rel="stylesheet" href="../css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">
	
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/main_ORIGINAL.css" disabled>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="../js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="../js/material.min.js" ></script>
	<script src="../js/sweetalert2.min.js" ></script>
	<script src="../js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="../js/main.js" ></script>
</head>
<body>
	
	<?php 
		include 'menu.php';
		include 'cargar_datosf_in.php';
		include 'func_test.php';
		//$perfil=$_SESSION['perfil'];
		error_reporting(1);
	?>
	<!-- pageContent -->
	<section class="full-width pageContent">
	
	<!-- BOTONES PARA CAMBIO DE ESTILOS CLARO Y OSCURO 
	<button id="botonEstilo1">Estilo 1</button>
	<button id="botonEstilo2">Estilo 2</button>-->
	
	<input class="campo-busqueda" type="search" placeholder="Buscar..." onkeyup="filtrar()">
		<div class="full-width divider-menu-h"></div>
		<div class="mdl-grid" >
		<div id="tlist_all" style="height: 100%; max-height:1200 px; width:100%; padding: 5px">
		<div id="tlist_all" style="overflow: auto; height: 100%; max-height:720px; width:100%; max-width:1280px; padding: 5px">
			<!--<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">-->
			<!--<input class="campo-busqueda" type="search" placeholder="Buscar..." onkeyup="filtrar()">-->
				<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
					<thead>
						<tr>
							<th class="mdl-data-table__cell--non-numeric">Id</th>
							<th>Nombre</th>
							<th>Categoria</th>
							<th>Duracion</th>
							<th>Fecha Prod.</th>
                            <th>Fecha Lanz.</th>
                            <th>Productora</th>
							<th>Tipo</th>
                            <th>Calidad</th>
                            <th>Formato</th>
                          <!---  <th>Sinopsis</th> -->
                            <th>Estatus</th>
                            <th hidden>Triler</th>
                            <th hidden>Contenido</th>
						</tr>
					</thead>
					<tbody>
                        <?php
                            $mysqli = new mysqli("localhost", "antonio", "*Lm2638220$", "bnucleds");
                            if ($mysqli->connect_errno) {
                                echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                            }
                        
                            $resultado = $mysqli->query("SELECT idecon04, nomcon04, catcon04, durcon04, fecpro04, feclan04, procon04, tipcon04, calcon04, forcon04,
                                                                sincon04, status04, dirtra04, dircon04  FROM maecon04");
                            $resultado->data_seek(0);
                            $bot = "";
							$count = 0;
							$count_sd = "";
							$count_hd = "";
							$count_fhd = "";
                            while ($fila = $resultado->fetch_assoc()) {
                             //   $bot = $bot + 1;
								$id = $fila['idecon04'];

								$resultado3 = $mysqli->QUERY("SELECT sdruta19, hdruta19, fhdrut19, 4kruta19 FROM maerut19 WHERE idcont19=$id");
														$valores3 = $resultado3->fetch_assoc();

														$calidad_sd = $valores3['sdruta19'];
														$calidad_hd = $valores3['hdruta19'];
														$calidad_fhd = $valores3['fhdrut19'];
														$calidad_qhd = $valores3['4kruta19'];
														
                                echo ' 
                                    <tr>
                                        <td class="mdl-data-table__cell--non-numeric">'.$fila['idecon04'].'</td>
                                        <td>'.$fila['nomcon04'].'</td>
                                        <td>'.$fila['catcon04'].'</td>
                                        <td>'.$fila['durcon04'].'</td>
                                        <td>'.$fila['fecpro04'].'</td>
                                        <td>'.$fila['feclan04'].'</td>
                                        <td>'.$fila['procon04'].'</td>
										<td>'.$fila['tipcon04'].'</td>
                                        <td>'.$fila['calcon04'].'</td>
                                        <td>'.$fila['forcon04'].'</td>
                                        <td>'.$fila['status04'].'</td>
                                        <td hidden>'.$fila['dirtra04'].'</td>
                                        <td hidden>'.$fila['dircon04'].'</td>
                                    </tr>';
						
											}
											
                        ?>
					</tbody>
				</table>
				</table>
				
			</div>
			<?php
			echo'<table>
				<tr>
					<td>'.$count_fhd.'</td>
					<td>En FHD</td>
				</tr>

				<tr>
					<td>'.$count_hd.'</td>
					<td>En HD</td></tr>
				<tr>
					<td>'.$count_sd.'</td>
					<td>En SD</td>
				</tr>

				<tr>
					<td>'.$count.'</td>
					<td>En MOV</td>
				</tr>
				</table>';
														?>
		</div>
	</section>
	<script>
		function filtrar() {
  		const valorBusqueda = document.querySelector('.campo-busqueda').value;
  		const filas = document.querySelectorAll('tbody tr');

		filas.forEach(fila => {
    	const celdas = fila.querySelectorAll('td');
    	let encontrado = false;

    	for (const celda of celdas) {
      		if (celda.textContent.toLowerCase().includes(valorBusqueda.toLowerCase())) {
        		encontrado = true;
        	break;
      	}
    	}

    	if (!encontrado) {
      		fila.style.display = 'none';
    	} else {
      		fila.style.display = '';
    	}
  		});
		}
	</script>
	
	<script>
	//CAMBIA LOS ESTILOS OSCURO Y CLARO EN EL PROYECTO
		const botonEstilo1 = document.getElementById('botonEstilo1');
		const botonEstilo2 = document.getElementById('botonEstilo2');

		botonEstilo1.addEventListener('click', function() {
		document.querySelector('link[href="../css/main_ORIGINAL.css"]').disabled = false;
		document.querySelector('link[href="../css/main_ORIGINAL.css"]').rel = 'stylesheet';
		document.querySelector('link[href="../css/main.css"]').disabled = true;
		document.querySelector('link[href="../css/main.css"]').rel = 'alternate stylesheet';
		});

		botonEstilo2.addEventListener('click', function() {
		document.querySelector('link[href="../css/main.css"]').disabled = false;
		document.querySelector('link[href="../css/main.css"]').rel = 'stylesheet';
		document.querySelector('link[href="../css/main_ORIGINAL.css"]').disabled = true;
		document.querySelector('link[href="../css/main_ORIGINAL.css"]').rel = 'alternate stylesheet';
		});
		</script>
</body>
</html>