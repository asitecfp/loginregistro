<?php
//$perfilmenu="";
$perfil=$_SESSION['perfil'];
$tipousua=$_SESSION['tipousuario'];
//include "fletch.php";
?>
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
   <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->

   <!--<script type="text/javascript" src="vistas/js/js/jquery-3.2.1.js">-->
   <script src="assets/js/main_menu.js"></script>
<link rel="stylesheet" type="text/css" href="css/menu.css">

	<div id="header">
		<ul class="nav">
            <li>
                    
                <?php
                        //if (@$perfilmenu=="dA-g3JTfUerV50F")
                        //{echo '<a href="../bienvenido.php">';}else
                        //{echo '<a href="bienvenido.php">';}
                ?>
                
                <a style="color:#ff6c00;" class="tv" href="Bienvenido.php">SP</a>
            
            </li>
            <li id="searchItem">
                <!--<a hidden class="pc" href="#">&#8981;</a>-->
                <a class="tv">&#8981;</a>
                <input type="text" id="searchInput" class="pc" placeholder = "&#8981;" onkeyup="fetchResults(this.value)">
                <ul id="results" class="sub-menu"></ul>
            </li>
			<li>

                <a class="pc" href="Bienvenido.php">Inicio</a>
                <a class="tv" href="Bienvenido.php">&#8962;</a>
            
            </li>
			<li>            
            
                <a class="pc" href="Bienvenido.php">Películas</a>
                <a class="tv" href="Bienvenido.php">&#9654;</a>
            </li>
			<li>
            
                <a class="pc" href="series.php" onclick="">Series</a>
                <a class="tv" href="series.php" onclick="">&#x2685;</a>
            </li>
			<li>
            
                <a class="pc" href="#">Mas recientes</a>   
                <a class="tv" href="#">&#9733;</a>
            </li>         
			<li>
                <?php
                    /*if (@$perfilmenu=="dA-g3JTfUerV50F")
                    {echo '<a href="perfil.php">';}else
                    {echo '<a href="php/perfil.php">';}*/
                ?>
                
                <a class="pc">Mi Perfil</a>
                <a class="tv"></a>
				<ul class="sub-menu">
					<?php
                    if (($perfil=="Familiar")||($perfil=="Infantil"))
					{// M/A
					}else
					{echo '<li><a href="php/perfil_usuario.php">Actualizar Perfil</a></li>';}
					?>
					<li><a href="#">Mi lista</a></li>
					<li>
                    <?php
                    if (($perfil=="Familiar")||($perfil=="Infantil")){
					// M/A
					}else{
                        if (($tipousua=='admin')||($tipousua=='contri')){
                            echo '<li><a href="STR-master/php/home.php">Administrar mi contenido</a></li>';
                        }else{
                     
                        }
					}
					?>
					<li>                    
					<?php
                    if (@$perfilmenu=="dA-g3JTfUerV50F")
                    {echo '<a href="notificacion.php">';}else
                    {echo '<a href="php/notificacion.php">';}
                    ?>
                    Notificaciones<?php echo "(".$noti.")";?></a></li>
					<li><a href="php/cerrar_session.php">Salir</a></li>
				</ul>
                </li>
                <table id="icono" width="50" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="center">
				        <?php
                            $perfact="b13nV3gV5-F50rY8dFVT";
                 
                            if (($imgusu0=="imagen/perfil.jpg")||($imgusu0==""))
                                {echo '<a href="index.php?perfact='.$perfact.'" title='.$UsuPerfil.'><img height="40" src="assets/imagen/icon/usu.png" class="usu" alt="Usuario" ></a>';}else
                                {echo '<img height="40" src="php/perfil/'.$imgusu0.'" alt="Usuario" >';}
                                //echo ''.$UsuarioSES;
				        ?>
                        
                    </td>
                </tr>            
            </table>
		</ul>
              
	</div>

<script>
    const pagePHP = getPagePHP();
    
    if (pagePHP == "series.php"){
       // alert("series");
        document.getElementById('searchItem').addEventListener('click', function() {
            document.getElementById('searchInput').style.display = 'block';
        });

        document.getElementById('searchInput').addEventListener('input', function() {
            var query = this.value;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "fetch_ser.php?q=" + query, true);
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var results = JSON.parse(this.responseText);
                    var resultsContainer = document.getElementById('results');
                    resultsContainer.innerHTML = '';
                    if (results.length > 0) {
                        resultsContainer.style.display = 'block';
                        for (var i = 0; i < results.length; i++) {
                            var li = document.createElement('li');
                            var apro = document.createElement('a');
                            var asin = document.createElement('a');
                            var amov = document.createElement('a');
                            var atra = document.createElement('a');
                            var atip = document.createElement('a');
                            var img = document.createElement('img');
                            li.textContent = results[i].nomcon04;
                            li.value = results[i].idecon04;
                            li.onclick = function() {
                                men(this.value);
                            };
                            apro.id = "pro"+results[i].idecon04;
                            asin.id = "sin"+results[i].idecon04;
                            amov.id = "mov"+results[i].idecon04;
                            atra.id = "tra"+results[i].idecon04;
                            atip.id = "tip"+results[i].idecon04;

                            apro.classList.add("ocul");
                            asin.classList.add("ocul");
                            amov.classList.add("ocul");
                            atra.classList.add("ocul");
                            atip.classList.add("ocul");

                            apro.textContent = results[i].procon04;
                            asin.textContent = results[i].sincon04;
                            amov.textContent = results[i].idecon04
                            atra.textContent = results[i].dirtra04;
                            atip.textContent = results[i].tipcon04;

                            img.src = "/logos/"+results[i].idecon04;
                            resultsContainer.appendChild(li);
                            resultsContainer.appendChild(apro);
                            resultsContainer.appendChild(asin);
                            resultsContainer.appendChild(amov);
                            resultsContainer.appendChild(atra);
                            resultsContainer.appendChild(atip);
                            resultsContainer.appendChild(img);
                        }
                        
                        //} else {
                        //  resultsContainer.style.display = 'none';
                    }
                }
            }
            xhr.send();
        });
    
        const input = document.getElementById("searchInput");
        const resultsContainer = document.getElementById("results");
        
        if (window.innerWidth < 1100) {
            //alert("1100 <");
            input.style.display = "none";
            
            resultsContainer.addEventListener("click", function() {
                $(input).show();
                
            });
            
            resultsContainer.addEventListener("mouseleave", function() {        
            $(input).hide();
            $(resultsContainer).hide();
            $(input).innerHTML = "";
            input.style.display = "none";
            });
        }
        
        if (window.innerWidth > 1100) {
            const resultsContainer = document.getElementById("results");
            input.addEventListener("click", function(){
                resultsContainer.style.display = 'block';
            });
            //resultsContainer.style.display = 'block';
            resultsContainer.addEventListener("mouseleave", function() {
                $(resultsContainer).hide();
                $(input).value = "";
            });
        }
    }
    if (pagePHP == "bienvenido.php"){
       // alert("series");
        document.getElementById('searchItem').addEventListener('click', function() {
            document.getElementById('searchInput').style.display = 'block';
        });

        document.getElementById('searchInput').addEventListener('input', function() {
            var query = this.value;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "fetch_mov.php?q=" + query, true);
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var results = JSON.parse(this.responseText);
                    var resultsContainer = document.getElementById('results');
                    resultsContainer.innerHTML = '';
                    if (results.length > 0) {
                        resultsContainer.style.display = 'block';
                        for (var i = 0; i < results.length; i++) {
                            var li = document.createElement('li');
                            var apro = document.createElement('a');
                            var asin = document.createElement('a');
                            var amov = document.createElement('a');
                            var atra = document.createElement('a');
                            var atip = document.createElement('a');
                            var img = document.createElement('img');
                            li.textContent = results[i].nomcon04;
                            li.value = results[i].idecon04;
                            li.onclick = function() {
                                men(this.value);
                            };
                            apro.id = "pro"+results[i].idecon04;
                            asin.id = "sin"+results[i].idecon04;
                            amov.id = "mov"+results[i].idecon04;
                            atra.id = "tra"+results[i].idecon04;
                            atip.id = "tip"+results[i].idecon04;

                            apro.classList.add("ocul");
                            asin.classList.add("ocul");
                            amov.classList.add("ocul");
                            atra.classList.add("ocul");
                            atip.classList.add("ocul");

                            apro.textContent = results[i].procon04;
                            asin.textContent = results[i].sincon04;
                            amov.textContent = results[i].idecon04
                            atra.textContent = results[i].dirtra04;
                            atip.textContent = results[i].tipcon04;

                            img.src = "/logos/"+results[i].idecon04;
                            resultsContainer.appendChild(li);
                            resultsContainer.appendChild(apro);
                            resultsContainer.appendChild(asin);
                            resultsContainer.appendChild(amov);
                            resultsContainer.appendChild(atra);
                            resultsContainer.appendChild(atip);
                            resultsContainer.appendChild(img);
                        }
                        
                        //} else {
                        //  resultsContainer.style.display = 'none';
                    }
                }
            }
            xhr.send();
        });
    
        const input = document.getElementById("searchInput");
        const resultsContainer = document.getElementById("results");
        
        if (window.innerWidth < 1100) {
            //alert("1100 <");
            input.style.display = "none";
            
            resultsContainer.addEventListener("click", function() {
                $(input).show();
                
            });
            
            resultsContainer.addEventListener("mouseleave", function() {        
            $(input).hide();
            $(resultsContainer).hide();
            $(input).innerHTML = "";
            input.style.display = "none";
            });
        }
        
        if (window.innerWidth > 1100) {
            
            input.addEventListener("click", function(){
                resultsContainer.style.display = 'block';
            });
            //resultsContainer.style.display = 'block';
            resultsContainer.addEventListener("mouseleave", function() {
                $(resultsContainer).hide();
                $(input).value = "";
            });
        }
    }
        function men(val){
             
             const getpro = document.getElementById('pro'+val);
             const getsin = document.getElementById('sin'+val);
             const getmov = document.getElementById('mov'+val);
             const gettra = document.getElementById('tra'+val);
             const gettip = document.getElementById('tip'+val);

             const setpro = document.getElementById('prod');
             setpro.src = "/logos/"+getpro.innerHTML+".png"

             const setlog = document.getElementById('logo');
             const dirlog = "/logos/" //internet
             setlog.src = dirlog+getmov.innerHTML+".png"

             const setsin = document.getElementById('sinopsis');
             setsin.innerHTML = getsin.innerHTML;

             const settra = document.getElementById('videoPrin');
             const dirvid = gettra.innerHTML; 
             settra.src = dirvid+"/fhd/"+getmov.innerHTML+".mp4";

             const setimg = document.getElementById('imgprin');
             const dirimg = "/prin/" //internet
             settra.poster = dirimg+getmov.innerHTML+".webp";

             const setmov = document.getElementById('con');
             const resultsContainer = document.getElementById("results");

             if (pagePHP == "series.php"){
               
                const url = "seriesdet.php?cont="+getmov.innerHTML;
                setmov.href = url;
                resultsContainer.style.display = 'none';
             }
             if (pagePHP == "bienvenido.php"){
               
                const url = "vercontenido.php?mae="+getmov.innerHTML;
                setmov.href = url;
             }
            //  if (pagePHP != "bienvenido.php" && pagePHP !="series.php"){
            //     $(input).hide();
            // }
             
        }
        function getPagePHP() {
            // Obtenemos la URL actual
            const url = window.location.href;

            // Obtenemos el nombre del archivo PHP de la URL
            const fileName = url.split("/").pop();

            // Devolvemos el nombre del archivo PHP
            return fileName;
        }
</script>
    
    