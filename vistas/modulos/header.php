<header class="main-header">
	
	<!--=====================================
	=            Logotipo            =
	======================================-->
	
	<a href="inicio" class="logo">
		
		<!-- logo mini -->
		<span class="logo-mini">
			<img 
				src="vistas/img/plantilla/logo_omark_icono.png" 
				class="img-responsive" 
				style="padding:10px"
			>
		</span>

		<!-- logo normal -->

		<span 
			class="logo-lg"
			style="display: flex; flex-direction: column; align-items: center;">
			<img 
				src="vistas/img/plantilla/logo_omark_lineal.png" 
				class="img-responsive" 
				style="padding:10px 0px; height: 50px"
			>
		</span>

	</a>
	
	<!--====  End of Logotipo  ====-->

	<!--=======================================
	=            Barra de navegación            =
	========================================-->
	
	<nav class="navbar navbar-static-top" role="navigation">
		
		<!-- Botón de navegación -->
		<a 
			href="#" 
			class="sidebar-toggle"
			data-toggle="push-menu"
			role="button"
		>
			<span class="sr-only">Toggle navigation</span>
		</a>

		<!-- Perfil de usuario -->
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
	
					<?php

					if ( $_SESSION["foto"] != "" ) {
						
						echo '<img src="'.$_SESSION["foto"].'" class="user-image">';
						
					} else {

						echo '<img src="vistas/img/usuarios/default/user_default.png" class="user-image">';

					}

					?>

						
						<span class="hidden-xs">
							<?php  
								echo $_SESSION["nombre"]; 
							?>
							</span>
					</a>

					<!-- Dropdown Toggle -->
					<ul class="dropdown-menu">

						<li class="user-header">
							<?php
								if ( $_SESSION["foto"] != "" ) {
									echo '<img src="'.$_SESSION["foto"].'" class="img-circle">';
								} else {
									echo '<img src="vistas/img/usuarios/default/user_default.png" class="img-circle">';
								}
							?>
			        <p>
			          <?php

			          	echo $_SESSION["nombre"].' - '.$_SESSION["perfil"];

			          ?>
			          <!-- <small>Member since Nov. 2012</small> -->
			        </p>
						</li>

						 <li class="user-footer">
                <div class="text-center">
                  <a href="salir" class="btn btn-danger">
										<i class="fa fa-sign-out"></i>
                  	 Salir
                	</a>
                </div>
              </li>

					</ul>

				</li>
			</ul>
		</div>	

	</nav>
	
	<!--====  End of Barra de navegación  ====-->
	
	

</header>