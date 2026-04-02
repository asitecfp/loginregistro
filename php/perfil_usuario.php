<?php
//IMAGEN
  $VARPHP="VARPHP78";
  @$ruta_img = $_GET["rt"];
  @$nombre_img = $_GET["nt"];
  @$exten_img = $_GET["extn"];
  if (empty($ruta_img)) {
    $ruta_img2 = "imagen/perfil.jpg";
  }else{
    $ruta_img2 = $ruta_img;}
    echo @$ruta_img2; 
//SESION
 
    $perfupdat='';
    $tipousua='';
    $perfupdat = @$_GET['perfupdat'];

    session_start();
    error_reporting(0);
    $tipousua= $_SESSION['tipousuario'];
  
    if(!isset($_SESSION['usuario'])){
        echo '
        <script>
            alert("Debe iniciar sesión para ver este contenido");
            window.location = "index.php";
        </script>
        ';
      
        session_destroy();
        die();
    }        
//DECLARAR VARIABLES

  $ideusu0=''; $nomusu0=''; $corusu0=''; $aliusu0=''; $conusu0=''; $apeusu0='';
  $cedusu0=''; $stausu0=''; $telusu0=''; $dirusu0=''; $ciuusu0=''; $edousu0='';
  $paisusu0=''; $ciudes0=''; $edodes0=''; $paisdes0=''; $nacusu0=''; $imgusu0='';
  $ingusu0=''; $tipcue0=''; $tipsus0=''; $stacue0=''; $pinful0 = 0; $pinfam0 = 0;
  $pininf0 = 0;
//FIN DECLARAR VARIABLES

  $login_usuario=$_SESSION['usuario'];

  $result = mysqli_query($conexion, "SELECT * FROM usuario WHERE corusu01='$login_usuario'");
  while($row = mysqli_fetch_array($result))
  {
    $ideusu0=$row["ideusu01"]; $nomusu0=$row["nomusu01"]; $corusu0=$row["corusu01"];
    $aliusu0=$row["aliusu01"]; $conusu0=$row["conusu01"]; $pinful0=$row["pinful01"];
    $pinfam0=$row["pinfam01"]; $pininf0=$row["pininf01"]; $apeusu0=$row["apeusu01"];
    $cedusu0=$row["cedusu01"]; $stausu0=$row["stausu01"]; $telusu0=$row["telusu01"];
    $dirusu0=$row["dirusu01"]; $ciuusu0=$row["ciuusu01"]; $edousu0=$row["edousu01"];
    $paisusu0=$row["paisusu01"]; $nacusu0=$row["nacusu01"]; $imgusu0=$row["imgusu01"];
    $ingusu0=$row["ingusu01"]; $tipcue0=$row["tipcue01"]; $tipsus0=$row["tipsus01"];
    $stacue0=$row["stacue01"];
  }
  if($paisusu0==''){$paisusu0=2;}
  if($edousu0==''){$edousu0=2;}
  if($ciuusu0==''){$ciuusu0=2;}
  mysqli_close($conexion)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización Perfil</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <title>Actualización Perfil</title>
<!--
<link href = "https://fonts.googleapis.com/css2? family = Roboto: ital, wght @ 0,100; 0,300; 0,400; 0,500; 0,700; 0,900; 1,100; 1,300; 1,400; 1,500; 1,700; 1,900 & display = intercambiar "rel =" hoja de estilo ">
-->
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="stylesheet" href="assets/css/estilos2.css">
    
  <?php
    include ('funciones.php');
  ?>

</head>

<body onLoad="onLoad()">
	<main>
    <div class="contenedor__todo">
		  <div class="caja__trasera">
			  <div class="caja__trasera-login" style="width:550px;">
            <!--Formulario de login y registro-->
          <div class="contenedor__login-registro">
            <!--Login-->
            <form action="update_usuario_bd.php" method="POST" class="formulario__login"
                  style="margin-top:1100px; margin-left:0px; margin-right:600px; width:600px; vertical-align:top;">
              <h2>Actualización Perfil</h2>
              <table width="550" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>
                    <label style="color:#333; font-weight:bold;">Datos personales</label>
                      <br>
                      <!---->
                      <input name="ideusu" id="ideusu" value="<?php echo $ideusu0; ?>" type="text" maxlength="50" placeholder="ID Usuario" XX_required="XX_required" />
                        <br>
                      <input name="cedusu" id="cedusu" value="<?php echo $cedusu0; ?>" type="text" maxlength="15" placeholder="Cédula" XX_required="XX_required" />
                        <br>
                      <input name="nomusu" id="nomusu" value="<?php echo $nomusu0; ?>" type="text" maxlength="50" placeholder="Nombres" XX_required="XX_required" />
                        <br>
                      <input name="apeusu" id="apeusu" value="<?php echo $apeusu0; ?>" type="text" maxlength="40" placeholder="Apellidos" XX_required="XX_required" />
                        <br>
                      <input name="corusu" id="corusu" value="<?php echo $corusu0; ?>" type="text" maxlength="50" placeholder="Correo Electrónico. Ej.: ejemplo@ejemplo.com" onKeyPress="return email(event)" onpaste="return false" XX_required="XX_required" />
                        <br>
                      <input name="telusu" id="telusu" value="<?php echo $telusu0; ?>" type="text" maxlength="10" placeholder="Teléfono" onKeyPress="return telefono(event)" onpaste="return false" XX_required="XX_required" />
                        <br><br>
                      <span class="Fecha_Reglamento2">
                        <select name="fdiaus" id="fdiaus" size="1" onchange="cbx_ddus()" XX_required="XX_required" >
                          <option value="00" selected="selected">Día</option>
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                        </select>
                      </span>
                      <span class="Fecha_Reglamento2">

                      <select name="fmesus" size="1"onchange="cbx_mmus()" XX_required="XX_required" id="fmesus">
                        <option value="00" selected="selected">Mes</option>
                        <option value="01">Enero</option>
                        <option value="02">Febrero</option>
                        <option value="03">Marzo</option>
                        <option value="04">Abril</option>
                        <option value="05">Mayo</option>
                        <option value="06">Junio</option>
                        <option value="07">Julio</option>
                        <option value="08">Agosto</option>
                        <option value="09">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                      </select>
                      </span>
                      <span class="Fecha_Reglamento2">

                      <select name="fanous" size="1" onchange="cbx_aaus()" XX_required="XX_required" id="fanous">
                        <option value="0000" selected="selected">Año</option>
                        <option value="2000">1977</option>
                        <option value="2001">1978</option>
                        <option value="2002">1979</option>
                        <option value="2003">1980</option>
                        <option value="2004">1981</option>
                        <option value="2005">1982</option>
                        <option value="2006">1983</option>
                        <option value="2007">1984</option>
                        <option value="2008">1985</option>
                        <option value="2009">1986</option>
                        <option value="2010">1987</option>
                        <option value="2011">1988</option>
                        <option value="2012">1989</option>
                        <option value="2013">1990</option>
                        <option value="2014">1991</option>
                        <option value="2015">1992</option>
                        <option value="2016">1993</option>
                        <option value="2017">1994</option>
                        <option value="2018">1995</option>
                        <option value="2019">1996</option>
                        <option value="2020">1997</option>
                        <option value="2021">1998</option>
                        <option value="2022">1999</option>
                        <option value="2023">2000</option>
                        <option value="2024">2001</option>
                        <option value="2025">2002</option>
                        <option value="2026">2003</option>
                        <option value="2027">2004</option>
                        <option value="2028">2005</option>
                        <option value="2029">2006</option>
                        <option value="2030">2007</option>
                      </select>
                      </span>
                      <br />
                      <input name="nacusu" id="nacusu" value="<?php echo $nacusu0; ?>" type="hidden" maxlength="10" placeholder="Fecha Nacimiento" />
                        <br><br>
                    <label style="color:#333; font-weight:bold;">Dirección</label>
                        <br>
                      <input name="dirusu" id="dirusu" value="<?php echo $dirusu0; ?>" type="text" maxlength="90" placeholder="Dirección" onKeyPress="return direccion(event)" onpaste="return false" XX_required="XX_required" />
                        <br><br>
                        <span class="Pais">
                          <select name="paisusu" id="paisusu" size="1" onchange="cbx_paisusu()" onClick="mostrar()" XX_required="XX_required">
                            <option value="2" selected="selected">Pais</option>
                            <option value="arg">Argentina</option>
                            <option value="chi">Chile</option>
                            <option value="col">Colombia</option>
                            <option value="ecu">Ecuador</option>
                            <option value="usa">Estados Unidos</option>
                            <option value="mex">Mexico</option>
                            <option value="per">Perú</option>
                            <option value="pur">Puerto Rico</option>
                            <option value="red">República Dominicana</option>
                            <option value="uru">Uruguay</option>
                            <option value="ven">Venezuela</option>
                          </select>
                        </span>
                        <span class="Estado">
                          <select name="edousu" id="edousu" size="1" onchange="cbx_edousu(this.value)" onClick="mostrar()" XX_required="XX_required">
                            <option value="2" selected="selected">Estado</option>
                            <!--Argentina-->
                            <option style='display:none;' id="arg" value="bar">Buenos Aires</option>
                            <option style='display:none;' id="arg" value="ba2">02Buenos Aires</option>
                            <!--Chile-->
                            <option style='display:none;' id="chi" value="san">Santiago</option>
                            <!--Colombia-->
                            <option style='display:none;' id="col" value="bog">Bogota</option>
                            <option style='display:none;' id="col" value="cuc">Cúcuta</option>
                            <!--Ecuador-->
                            <option style='display:none;' id="ecu" value="qui">Quito</option>
                            <!--USA-->
                            <option style='display:none;' id="usa" value="flo">Florida</option>
                            <option style='display:none;' id="usa" value="orl">Orlando</option>
                            <option style='display:none;' id="usa" value="tex">Texas</option>
                            <!--Venezuela-->
                            <option style='display:none;' id="ven" value="ara">Aragua</option>
                            <option style='display:none;' id="ven" value="bol">Bolivar</option>
                            <option style='display:none;' id="ven" value="cbb">Carabobo</option>
                            <option style='display:none;' id="ven" value="ccs">Dist. Capital</option>
                            <option style='display:none;' id="ven" value="fal">Falcon</option>
                            <option style='display:none;' id="ven" value="zul">Zulia</option>
                            <!--Mexico-->
                            <option  style='display:none;' id="mex" value="aca">Acapulco</option>
                            <option  style='display:none;' id="mex" value="dfe">Distrito Federal</option>
                            <option  style='display:none;' id="mex" value="pue">Puebla</option>
                            <option  style='display:none;' id="mex" value="tol">Tolucas</option>
                            <option  style='display:none;' id="mex" value="vcr">Vera Cruz</option>
                            <!--Peru-->
                            <option style='display:none;' id="per" value="lim">Lima</option>
                            <!--Puerto Rico-->
                            <option style='display:none;' id="pur" value="saj">San Juan</option>
                            <!--Republica Dominicana-->
                            <option style='display:none;' id="red" value="sad">Santo Domingo</option>
                            <!---->
                           
                          </select>
                        </span>
                      
                        <span class="Ciudad">
                          <select name="ciuusu" id="ciuusu" size="1" onchange="cbx_ciuusu()" onClick="mostrar()" XX_required="XX_required" >
                            <option value="2" selected="selected">Ciudad</option>
                            <!---->
                            <option style='display:none;' id="bar" value="ba1">Ciud1-Buenos Aires</option>
                            <option style='display:none;' id="bar" value="ba2">Ciud2-Buenos Aires</option>
                            <!---->
                            <option style='display:none;' id="bog" value="bg1">Ciud1-Bogota</option>
                            <option style='display:none;' id="bog" value="bg2">Ciud2-Bogota</option>
                            <option style='display:none;' id="cuc" value="cu1">Ciud1-Cúcuta</option>
                            <option style='display:none;' id="cuc" value="cu2">Ciud2-Cúcuta</option>
                            <!---->
                            <option  style='display:none;' id="aca" value="ac1">Ciud1-Acapulco</option>
                            <option  style='display:none;' id="aca" value="ac2">Ciud2-Acapulco</option>
                            <option  style='display:none;' id="dfe" value="df1">Ciud1-Distrito Federal</option>
                            <option  style='display:none;' id="dfe" value="df2">Ciud2-Distrito Federal</option>
                            <!---->
                            <option  style='display:none;' id="pue" value="pu1">Ciud1-Puebla</option>
                            <option  style='display:none;' id="pue" value="pu2">Ciud2-Puebla</option>
                            <option  style='display:none;' id="tol" value="tl1">Ciud1-Tolucas</option>
                            <option  style='display:none;' id="tol" value="tl2">Ciud2-Tolucas</option>
                            <option  style='display:none;' id="vcr" value="vc1">Ciud1-Vera Cruz</option>
                            <option  style='display:none;' id="vcr" value="vc2">Ciud2-Vera Cruz</option>
                            <!---->
                            <option  style='display:none;' id="flo" value="fl1">Ciud1-Florida</option>
                            <option  style='display:none;' id="flo" value="fl2">Ciud2-Florida</option>
                            <option  style='display:none;' id="tex" value="te1">Ciud1-Texa</option>
                            <option  style='display:none;' id="tex" value="te2">Ciud2-Texa</option>
                            <!---->
                            <option style='display:none;' id="ara" value="mag" >Magdaleno</option>
                            <option style='display:none;' id="ara" value="mcy" >Maracay</option>
                            <option style='display:none;' id="ara" value="lvc" >La Victoria</option>
                          <!---->
                            <option style='display:none;' id="bol" value="cbv" >Ciud. Bolivar</option>
                            <option style='display:none;' id="bol" value="gsb" >Gran Sabana</option>
                            <option style='display:none;' id="bol" value="sfx" >San Felix</option>
                            <!---->
                            <option style='display:none;' id="cbb" value="gua" >Guacara</option>
                            <option style='display:none;' id="cbb" value="nag" >Nagüanagüa</option>
                            <option style='display:none;' id="cbb" value="sbl" >San Blas</option>
                            <option style='display:none;' id="cbb" value="sdi" >San  Diego</option>
                            <option style='display:none;' id="cbb" value="val" 	>Valencia</option>
                            <!---->
                            <option style='display:none;' id="ccs" value="alt" >Altamira</option>
                            <option style='display:none;' id="ccs" value="lpz" >La Paz</option>
                            <option style='display:none;' id="ccs" value="lvg" >La Vega</option>
                              <!---->
                            <option style='display:none;' id="fal" value="cor" >Coro</option>
                            <option style='display:none;' id="fal" value="pfj" >Punto Fijo</option>
                            <option style='display:none;' id="fal" value="tcc" >Tucacas</option>
                            <!---->
                            <option style='display:none;' id="zul" value="cbm" >Cabimas</option>
                            <option style='display:none;' id="zul" value="mcb" >Maracaibo</option>
                            <option style='display:none;' id="zul" value="mnj" >Mojan</option>
                          </select>
                        </span>
                      <input name="paisusu2" id="paisusu2" value="<?php echo $paisusu0; ?>" type="hidden" maxlength="90" placeholder="Pais" XX_required="XX_required" />
                      <input name="edousu2" id="edousu2" value="<?php echo $edousu0; ?>" type="hidden" maxlength="90" placeholder="Estado" XX_required="XX_required" />
                      <input name="ciuusu2" id="ciuusu2" value="<?php echo $ciuusu0; ?>" type="hidden" maxlength="90" placeholder="Ciudad" XX_required="XX_required" />
                        <br><br><br>
                      <label style="color:#333; font-weight:bold;">Seguridad</label>
                      <input name="conusu" id="conusu" value="<?php echo $conusu0; ?>" type="password" maxlength="50" placeholder="Contraseña" XX_required="XX_required" />
                        <br><br>
                      <label style="color:#333; font-weight:bold;">Pin Perfil (4 digitos).</label>
                      <input name="pinful" id="pinful" value="<?php echo $pinful0; ?>" type="password" maxlength="4" placeholder="Pin Full Perfil. Solo Números." onKeyPress="return solonumeros(event)" onpaste="return false"   XX_required="XX_required"/>
                      <input name="pinfam" id="pinfam" value="<?php echo $pinfam0; ?>" type="password" maxlength="4" placeholder="Pin Familiar. Solo Números." onKeyPress="return solonumeros(event)" onpaste="return false" XX_required="XX_required"/>
                      <input name="pininf" id="pininf" value="<?php echo $pininf0; ?>" type="password" maxlength="4" placeholder="Pin Infantil. Solo Números." onKeyPress="return solonumeros(event)" onpaste="return false" XX_required="XX_required"/>
                        <br>
                      <input name="stausu" id="stausu" value="<?php echo $stausu0; ?>" type="hidden" maxlength="20" placeholder="Stausu" />
                        <br>
                      <input name="imgusu" id="imgusu" value="<?php echo $imgusu0; ?>" type="hidden" maxlength="30" placeholder="Imagen Perfil" />
                        <br>
                      <input name="imgusu" id="imgusu" value="<?php echo $ruta_img2; ?>" type="hidden" maxlength="30" placeholder="Imagen Perfil" />
                        <br><br>
                      <label style="color:#333; font-weight:bold;">Fecha Ingreso: <?php echo $ingusu0; ?></label>
                        <br><br>
                      <label style="color:#333; font-weight:bold;">Tipo de Cuenta: <?php echo $tipcue0; ?>
                        <br><br>
                      <label style="color:#333; font-weight:bold;">Tipo de Suscriptor: <?php echo $tipsus0; ?>
                        <br><br>
                      <label style="color:#333; font-weight:bold;">Estado Cuenta: <?php echo $stacue0; ?>
                        <br><br>
                  </td>
                </tr>
                <tr>
                  <td>
                    <button>Guardar</button>
                      <br><br>
                    <label style="color:#333; font-weight:bold;">Por favor llenar todos los campos.
                  </td>
                </tr>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
    <link rel="stylesheet" href="assets/css/estilos2.css">
</html>


