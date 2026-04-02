if ($ejecutar = mysqli_query($conexion, "INSERT INTO `maecon04` (`idecon04`, `nomcon04`, `nomco204`, `tipcon04`, `clacon04`, `durcon04`,`fecpro04`,
  `feclan04`, `catcon04`, `procon04`, `vistas04`, `aprcon04`, `descon04`, `arccon04`,
   `sercon04`, `dircon04`, `dirtra04`, `forcon04`, `calcon04`, `covcon04`, `precon04`,
	`sincon04`, `status04`, `conpri04`) VALUES ('$idecont', '$nombrecont', '$nombrecont2', '$tipocont',
	 '$clasecont', '$duracont', '$fechapro', '$fechalan', '$categoriacont', '$productoracont', '0', '0', '0', '', '', '',
	  '', '$formatocont', '$calidadcont', '', '', '$sinopsiscont', '$estadocont', '0')")){

		$query = "INSERT INTO `maecon04` (`idecon04`, `nomcon04`, `nomco204`, `tipcon04`, `clacon04`, `durcon04`,`fecpro04`,
                                  `feclan04`, `catcon04`, `procon04`, `vistas04`, `aprcon04`, `descon04`, `arccon04`,
                                   `sercon04`, `dircon04`, `dirtra04`, `forcon04`, `calcon04`, `covcon04`, `precon04`,
                                    `sincon04`, `status04`, `conpri04`) VALUES ('$idecont', '$nombrecont', '$nombrecont2', '$tipocont',
                                     '$clasecont', '$duracont', '$fechapro', '$fechalan', '$categoriacont', '$productoracont', '0', '0', '0', '', '', '',
                                      '', '$formatocont', '$calidadcont', '', '', '$sinopsiscont', '$estadocont', '0')";


                                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<?php
														$mysqli = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
         												$query = $mysqli -> query ("SELECT COUNT(*) idecon04 FROM maecon04");
          												$valores = $query->fetch_assoc();
														
            											echo '
																
														<input name = "idcont" class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="BarCode" value="'.$valores['idecon04'] += '2'.'">'.$valores['idecon04'] += '2'.'
														<label class="mdl-textfield__label" for="BarCode">Codigo Contenido</label>
														<span class="mdl-textfield__error">Invalid barcode</span>
														';
        											?>
											</div>

											<label class="mdl-textfield__label" for="fecha-pro">Fecha Produccion</label>
												<input type="file" class="mdl-textfield__input">
												<input type="file" class="mdl-textfield__input">
												<input type="file" class="mdl-textfield__input">

												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<select name="estado[]" class="mdl-textfield__input">
													<option value="" disabled="" selected="">Seleccione status</option>
														<?php
															$mysqli = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
         													$query = $mysqli -> query ("SELECT * FROM forcon14");
          													while ($valores = mysqli_fetch_array($query)) {
            												echo '<option value="'.$valores[nomcla14].'">'.$valores[nomcla14].'</option>';
          													}
        												?>
												</select>
											</div>

											extFile=="jpg" || extFile=="jpeg"
											

											echo ' 
                                    <tr>
                                        <td value="'.$fila['idecon04'].'" class="mdl-data-table__cell--non-numeric">'.$fila['idecon04'].'</td>
                                        <td>'.$fila['nomcon04'].'</td>
                                        <td>'.$fila['catcon04'].'</td>
                                        
                                        <td>'.$fila['calcon04'].'</td>
                                        <td>'.$fila['forcon04'].'</td>
                                        <td mame="status">'.$fila['status04'].'</td>
                                        <td>
                                            <form class="upload-form" action="upload_cont.php" method="post" enctype="multipart/form-data">
                                                <label name="idecon" value="'.$fila['idecon04'].'" for="files"><i class="fa-solid fa-folder-open fa-2x"></i>Select files ...</label>
                                                <input id="files" type="file" name="trail'.$fila['idecon04'].'" multiple>
                                                <div class="progress"></div>
                                                <p class="text-center">
                                                <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addProduct">
                                                <i class="zmdi zmdi-plus"></i>
                                                </button>
                                                <div class="mdl-tooltip" for="btn-addProduct">Add Content</div>
                                             </p>
                                                <div class="result"></div>
                                            </form>
                                        </td>
                                        <td>
                                            <form class="upload-form" action="upload.php" method="post" enctype="multipart/form-data">
                                                <label for="files"><i class="fa-solid fa-folder-open fa-2x"></i>Select files ...</label>
                                                <input id="files" type="file" name="mov'.$fila['idecon04'].'" multiple>
                                                <div class="progress"></div>
                                                    <p class="text-center">
                                                        <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addProduct">
                                                        <i class="zmdi zmdi-plus"></i>
                                                        </button>
                                                            <div class="mdl-tooltip" for="btn-addProduct">Add Content</div>
                                                     </p>
                                                <div class="result"></div>
                                            </form>
                                        </td>
                                    </tr>';

									
									<a href="categoria.php?cont='.$fila['nomcat07'].'" id="categ">'.$fila['nomcat07'].'</a></h3>
									$categ=$_GET['cont'];

                                    <script>
        // Declare global variables for easy access 
        const uploadForm = document.querySelector('.upload-form');
        const filesInput = uploadForm.querySelector('#files' + $bot);
        // Attach onchange event handler to the files input element
		
        filesInput.onchange = () => {
        // Append all the file names to the label
        uploadForm.querySelector('label' + $bot).innerHTML = '';
       // for (let i = 0; i < filesInput.files.length; i++) {
            uploadForm.querySelector('label' + $bot).innerHTML += '<span><i class="fa-solid fa-file"></i>' + filesInput.files.name + '</span>';
			//uploadForm.querySelector('.label'.$bot.'').innerHTML += '<span><i class="fa-solid fa-file"></i>' + filesInput.files[i].name + '</span>';
       // }
        };
        // Attach submit event handler to form
	uploadForm.onsubmit = event => {
    event.preventDefault();
    // Make sure files are selected
    if (!filesInput.files.length) {
        uploadForm.querySelector(".result'.$bot.'").innerHTML = 'Please select a file!';
    } else {
        // Create the form object
        let uploadFormDate = new FormData(uploadForm);
        // Initiate the AJAX request
        let request = new XMLHttpRequest();
        // Ensure the request method is POST
        request.open('POST', uploadForm.action);
        // Attach the progress event handler to the AJAX request
        request.upload.addEventListener('progress'.$bot, event => {
            // Add the current progress to the button
            uploadForm.querySelector("button".$bot).innerHTML = 'Uploading... ' + '(' + ((event.loaded/event.total)*100).toFixed(2) + '%)';
            // Update the progress bar
            uploadForm.querySelector(".progress".$bot).style.background = 'linear-gradient(to right, #25b350, #25b350 ' + Math.round((event.loaded/event.total)*100) + '%, #e6e8ec ' + Math.round((event.loaded/event.total)*100) + '%)';
            // Disable the submit button
            uploadForm.querySelector("button".$bot).disabled = true;
        });
        // The following code will execute when the request is complete
        request.onreadystatechange = () => {
            if (request.readyState == 4 && request.status == 200) {
                // Output the response message
                uploadForm.querySelector(".result".$bot).innerHTML = request.responseText;
            }
        };
        // Execute request
        request.send(uploadFormDate);
    }
};
        </script>

<td>
                                            <form class="upload-form" action="upload.php" method="post" enctype="multipart/form-data">
                                                <label for="files"><i class="fa-solid fa-folder-open fa-2x"></i>Select files ...</label>
                                                <input id="files" type="file" name="mov'.$fila['idecon04'].'" multiple>
                                                <div class="progress"></div>
                                                    <p class="text-center">
                                                        <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addProduct">
                                                        <i class="zmdi zmdi-plus"></i>
                                                        </button>
                                                            <div class="mdl-tooltip" for="btn-addProduct">Add Content</div>
                                                     </p>
                                                <div class="result'.$bot.'"></div>
                                            </form>
                                        </td>


                                        <script>
	
        // Declare global variables for easy access 
        const idelement = document.querySelector('#id');
        const elemento = idelement.innerHTML;
        const uploadForm = document.querySelector('.upload-form');
        const filesInput = uploadForm.querySelector('#files'<?php echo''.$bot.'';?>);
		
        // Attach onchange event handler to the files input element
		uploadForm.querySelector('#files'<?php echo''.$bot.'';?>)
        filesInput.onchange = () => {
        // Append all the file names to the label
		
        uploadForm.querySelector('label'<?php echo''.$bot.'';?>).innerHTML = '';
        for (let i = 0; i < filesInput.files.length; i++) {
            uploadForm.querySelector('label'<?php echo''.$bot.'';?>).innerHTML += '<span><i class="fa-solid fa-file"></i>' + filesInput.files.name + '</span>';
			//uploadForm.querySelector('.label'.$bot.'').innerHTML += '<span><i class="fa-solid fa-file"></i>' + filesInput.files[i].name + '</span>';
        }
        };
        // Attach submit event handler to form
	uploadForm.onsubmit = event => {
    event.preventDefault();
    // Make sure files are selected
    if (!filesInput.files.length) {
        uploadForm.querySelector('.result'<?php echo''.$bot.'';?>).innerHTML = 'Please select a file!';
    } else {
        // Create the form object
        let uploadFormDate = new FormData(uploadForm);
        // Initiate the AJAX request
        let request = new XMLHttpRequest();
        // Ensure the request method is POST
        request.open('POST', uploadForm.action);
        // Attach the progress event handler to the AJAX request
        request.upload.addEventListener('progress'<?php echo''.$bot.'';?>, event => {
            // Add the current progress to the button
            uploadForm.querySelector('button'<?php echo''.$bot.'';?>).innerHTML = 'Uploading... ' + '(' + ((event.loaded/event.total)*100).toFixed(2) + '%)';
            // Update the progress bar
            uploadForm.querySelector('.progress'<?php echo''.$bot.'';?>).style.background = 'linear-gradient(to right, #25b350, #25b350 ' + Math.round((event.loaded/event.total)*100) + '%, #e6e8ec ' + Math.round((event.loaded/event.total)*100) + '%)';
            // Disable the submit button
            uploadForm.querySelector('button'<?php echo''.$bot.'';?>).disabled = true;
        });
        // The following code will execute when the request is complete
        request.onreadystatechange = () => {
            if (request.readyState == 4 && request.status == 200) {
                // Output the response message
                uploadForm.querySelector('.result'<?php echo''.$bot.'';?>).innerHTML = request.responseText;
            }
        };
        // Execute request
        request.send(uploadFormDate);
    }
};
        </script>
        <input name="ide'.$bot.'" type="number" value='.$fila['idecon04'].' readonly hidden>


        <tbody>
                        <?php
                            $mysqli = new mysqli("localhost", "antonio", "*Lm2638220$", "bnucleds");
                            if ($mysqli->connect_errno) {
                                echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                            }
                        
                            $resultado = $mysqli->query("SELECT idecon04, nomcon04, catcon04, durcon04, fecpro04, feclan04, procon04, calcon04, forcon04,
                                                                sincon04, status04, dirtra04, dircon04  FROM maecon04 WHERE status04='INC'");
                            $resultado->data_seek(0);
                            $bot = "";
                            while ($fila = $resultado->fetch_assoc()) {
                                $bot = $bot + 1;
								$id = $fila['idecon04'];
								if ($bot <= 1) {
                                echo ' 
                                    <tr>
									<td name='.$bot.'>'.$bot.'</td>
									<td>'.$fila['idecon04'].'</td>
								
                                        <td>'.$fila['nomcon04'].'</td>
                                        <td>'.$fila['catcon04'].'</td>
                                        
                                        <td>'.$fila['calcon04'].'</td>
                                        <td>'.$fila['forcon04'].'</td>
                                        <td mame="status'.$bot.'">'.$fila['status04'].'</td>
                                        <td>
                                            <form id="#form'.$bot.'" class="upload-form" action="upload_cont.php?ideg=trail'.$bot.'" method="post" enctype="multipart/form-data">
											<label id="id" readonly hidden>'.$bot.'</label>
                                                <label class="label'.$bot.'" for="files'.$bot.'"><i class="fa-solid fa-folder-open fa-2x"></i>Select files ...</label>
                                                <input id="files'.$bot.'" type="file" name="files'.$bot.'">
                                                <div class="progress'.$bot.'"></div>
												<button class="button'.$bot.'" type="submit">Upload</button>
                                                <div class="result'.$bot.'"></div>
                                            </form>
                                        </td>
										<td>
										
										<form name="form'.$bot.'" class="upload-form" action="upload_cont.php?ideg=mov'.$bot.'" method="post" enctype="multipart/form-data">
										<input name="ide'.$bot.'" type="number" value='.$fila['idecon04'].' readonly hidden>
											<label class="label'.$bot.'" for="files'.$bot.'"><i class="fa-solid fa-folder-open fa-2x"></i>Select files ...</label>
											<input id="files'.$bot.'" type="file" name="trail">
											<div class="progress'.$bot.'"></div>
											<button class="button'.$bot.'" type="submit">Upload</button>
											<div class="result'.$bot.'"></div>
										</form>
									</td>
                                    </tr>';	
								}
								if ($bot <> 1) {
									
									$id = $fila['idecon04'];
									echo ' 
										<tr>
										<td name='.$bot.'>'.$bot.'</td>
										<td>'.$fila['idecon04'].'</td>
									
											<td>'.$fila['nomcon04'].'</td>
											<td>'.$fila['catcon04'].'</td>
											
											<td>'.$fila['calcon04'].'</td>
											<td>'.$fila['forcon04'].'</td>
											<td mame="status'.$bot.'">'.$fila['status04'].'</td>
											<td>
												
											</td>
											<td>
											
											
										</td>
										</tr>';	
								}
							}
                            
							
                        ?>
						<script>
        
								// Declare global variables for easy access 
							const idelement = document.querySelector('#id');
							const elemento = idelement.innerHTML;
							const uploadForm = document.querySelector('.upload-form');
						
							
							const filesInput = uploadForm.querySelector('#files' + elemento);
						
									// Attach onchange event handler to the files input element
							uploadForm.querySelector('#files' + elemento)
							filesInput.onchange = () => {
									// Append all the file names to the label
								const labelelem = document.getElementById(elemento);
								labelelem.innerHTML = filesInput.files[0].name; 
								alert(elemento);									
							};
						
								// Attach submit event handler to form
							uploadForm.onsubmit = event => {
							event.preventDefault();
								// Make sure files are selected
							if (!filesInput.files.length) {
								uploadForm.querySelector('.result').innerHTML = 'Please select a file!';
							} else {
									// Create the form object
								let uploadFormDate = new FormData(uploadForm);
									// Initiate the AJAX request
								let request = new XMLHttpRequest();
									// Ensure the request method is POST
								request.open('POST', uploadForm.action);
									// Attach the progress event handler to the AJAX request
								request.upload.addEventListener('progress', event => {
									// Add the current progress to the button
									uploadForm.querySelector('button').innerHTML = 'Uploading... ' + '(' + ((event.loaded/event.total)*100).toFixed(2) + '%)';
										// Update the progress bar
									uploadForm.querySelector('.progress').style.background = 'linear-gradient(to right, #25b350, #25b350 ' + Math.round((event.loaded/event.total)*100) + '%, #e6e8ec ' + Math.round((event.loaded/event.total)*100) + '%)';
										// Disable the submit button
									uploadForm.querySelector('button').disabled = true;
								});
									// The following code will execute when the request is complete
								request.onreadystatechange = () => {
									if (request.readyState == 4 && request.status == 200) {
											// Output the response message
										uploadForm.querySelector('.result').innerHTML = request.responseText;
									}
								};
									// Execute request
								request.send(uploadFormDate);
							}
					};
					
							</script>
					</tbody>



                    if (!uploadForm.querySelector('.result').innerHTML = "Upload Complete!";){
									
								}
							};