<?php

 @session_start();
 //print_r($_SESSION);
 
 require_once("../conexiones/class_acceso.php");

 
 ?>


<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>empresas</title>
		<meta name="description" content="Responsive Retina-Friendly Menu with different, size-dependent layouts" />
		<meta name="keywords" content="responsive menu, retina-ready, icon font, media queries, css3, transition, mobile" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">	
			<!-- Codrops top bar -->
			<header>
				<h1>SELECCIONE UNA EMPRESA<span>Es necesario seleccionar uno :</span></h1>	
			</header>
			<div align="center" class="main clearfix">
            
            <nav id="menu" class="nav">					
		<div align="center">
        			<ul style="padding-left:27%;">
            
   <?php 
   
    $tra=new acceso();
$reg=$tra->accesos_permisos($_SESSION["cod_usu_login"]);
$cont=0;

for ($i=0;$i<count($reg);$i++)

{
    $cod=$reg[$i]["int_cod_emp"];
    $empresa=$reg[$i]["var_nom_emp"];	
	 $cont += 1;
	
	if ($cont == 1)
	{
		$clase="class='icon-blog'";
	}
	else if ($cont == 2)
	{
		$clase="class='icon-services'";

	}
	else
	{
		$clase="class='icon-team'"	;
	}
 
	 $clase;
   
   ?>  
      
	<li style="width:200px;" >
							<a href="../principal.php?id_empresa=<?php echo $cod ?>">
								<span class="icon">
                                <i aria-hidden="true" class="icon-home"></i>
						
								</span>
								<span><?php echo strtoupper($empresa) ?></span>
							</a>
						</li>
		
             
                        
   <?php
   

}
   
    ?>                     
					</ul>
				</nav>
			</div>
            </div>
		</div><!-- /container -->
		<script>
			//  The function to change the class
			var changeClass = function (r,className1,className2) {
				var regex = new RegExp("(?:^|\\s+)" + className1 + "(?:\\s+|$)");
				if( regex.test(r.className) ) {
					r.className = r.className.replace(regex,' '+className2+' ');
			    }
			    else{
					r.className = r.className.replace(new RegExp("(?:^|\\s+)" + className2 + "(?:\\s+|$)"),' '+className1+' ');
			    }
			    return r.className;
			};	

			//  Creating our button in JS for smaller screens
			var menuElements = document.getElementById('menu');
			menuElements.insertAdjacentHTML('afterBegin','<button type="button" id="menutoggle" class="navtoogle" aria-hidden="true"><i aria-hidden="true" class="icon-menu"> </i> Menu</button>');

			//  Toggle the class on click to show / hide the menu
			document.getElementById('menutoggle').onclick = function() {
				changeClass(this, 'navtoogle active', 'navtoogle');
			}

			// http://tympanus.net/codrops/2013/05/08/responsive-retina-ready-menu/comment-page-2/#comment-438918
			document.onclick = function(e) {
				var mobileButton = document.getElementById('menutoggle'),
					buttonStyle =  mobileButton.currentStyle ? mobileButton.currentStyle.display : getComputedStyle(mobileButton, null).display;

				if(buttonStyle === 'block' && e.target !== mobileButton && new RegExp(' ' + 'active' + ' ').test(' ' + mobileButton.className + ' ')) {
					changeClass(mobileButton, 'navtoogle active', 'navtoogle');
				}
			}
		</script>
	</body>
</html>
