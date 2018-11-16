<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Usuarios
      <small>Panel de Control</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-home"></i> Inicio</a></li>
      <li class="active">Usuarios</li>
    </ol>
  </section>

  <section class="content">

    <!-- Default box -->
    <div class="box">

      <div class="box-header with-border">
        
        <button 
          class="btn btn-primary" 
          data-toggle="modal" 
          data-target="#modalAgregarUsuario"
        >
          Agregar usuario
        </button>

      </div>

      <div class="box-body">
        
        <table class="table table-bordered table-striped dt-responsive tablas">
            
          <thead>
              
            <tr>
              
              <th style="width: 10px;">#</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Foto</th>
              <th>Rol</th>
              <th>Estado</th>
              <th>Última sesión</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php 

            $item = null;
            $valor = null;

            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

            foreach ($usuarios as $key => $value) {
              
              echo '
                    <tr>
                      <td>'.($key+1).'</td>
                      <td>'.$value["nombre"].'</td>
                      <td>'.$value["usuario"].'</td>';

                      if ( $value["foto"] != "" ) {
                        echo '
                              <td>
                                <img 
                                  src="'.$value["foto"].'" 
                                  alt="User Image" 
                                  width="40px"
                                  class="img-thumbnail">
                              </td>
                             ';
                      } else {
                        echo '
                              <td>
                                <img 
                                  src="vistas/img/usuarios/default/user_default.png" 
                                  alt="User Image" 
                                  width="40px"
                                  class="img-thumbnail">
                              </td>
                             ';
                      }
                      
                      echo '
                      <td>'.$value["perfil"].'</td>
                      ';
                      
                      if ( $value["estado"] != 0 ) {
                          
                        echo '
                        <td>
                          <button 
                            class="btn btn-success btn-xs btnActivar" 
                            idUsuario="'.$value["id"].'"
                            estadoUsuario="0"
                          >
                            Activado
                          </button>
                        </td>
                        ';

                      } else {

                        echo '
                        <td>
                          <button 
                            class="btn btn-danger btn-xs btnActivar" 
                            idUsuario="'.$value["id"].'"
                            estadoUsuario="1"
                          >
                            Desactivado
                          </button>
                        </td>
                        ';

                      }
                       
                      echo '
                      <td>'.$value["ultimo_login"].'</td>
                      <td>
                        <div class="btn-group">
                          <button 
                            class="btn btn-warning btnEditarUsuario" 
                            idUsuario="'.$value["id"].'" 
                            data-toggle="modal" 
                            data-target="#modalEditarUsuario"
                          >
                            <i class="fa fa-pencil"></i>
                          </button>

                          <button 
                            class="btn btn-danger btnEliminarUsuario"
                            idUsuario="'.$value["id"].'" 
                            fotoUsuario="'.$value["foto"].'" 
                            usuario="'.$value["usuario"].'" 
                          >
                            <i class="fa fa-times"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                   ';
            }

            ?>

          </tbody>

        </table>

      </div>
      
    </div>

  </section>
  
</div>

<!--===========================================
=            Modal Agregar Usuario            =
============================================-->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--==================================
        =            Modal Header            =
        ===================================-->
        
        <div class="modal-header" style="background: #3c8dbc; color: #fff">
          <button 
            type="button" 
            class="close" 
            data-dismiss="modal"
            style="color: #fff" 
          >
            &times;
          </button>
          <h4 class="modal-title">Agregar usuario</h4>
        </div>
        
        <!--====  End of Modal Header  ====-->



        <!--================================
        =            Modal Body            =
        =================================-->
        
        <div class="modal-body">     
          <div class="box-body">
              
              <!-- Nombre -->
              <div class="form-group">
                <div class="input-group" style="width: 100%;">
                  <span class="input-group-addon" style="width: 50px;">
                    <i class="fa fa-user"></i>
                  </span> 
                  <input 
                    class="form-control input-lg" 
                    type="text" 
                    name="nuevoNombre" 
                    placeholder="Ingresar nombre" 
                    required
                  >
                </div>
              </div>

              <!-- Usuario -->
              <div class="form-group">
                <div class="input-group" style="width: 100%;">
                  <span class="input-group-addon" style="width: 50px;">
                    <i class="fa fa-key"></i>
                  </span>
                  <input 
                    class="form-control input-lg" 
                    type="text"
                    name="nuevoUsuario"
                    id="nuevoUsuario"
                    placeholder="Usuario"
                    required
                  >
                </div>
              </div>

              <!-- Contraseña -->
              <div class="form-group">
                <div class="input-group" style="width: 100%;">
                  <span class="input-group-addon" style="width: 50px;">
                    <i class="fa fa-lock"></i>
                  </span>
                  <input 
                    class="form-control input-lg" 
                    type="password"
                    name="nuevoPassword"
                    placeholder="Contraseña"
                    required
                  >
                </div>
              </div>

              <!-- Perfil o Rol -->
              <div class="form-group">
                <div class="input-group" style="width: 100%;">
                  <span class="input-group-addon" style="width: 50px;">
                    <i class="fa fa-users"></i>
                  </span>
                  <select 
                    class="form-control input-lg" 
                    name="nuevoPerfil"
                  >
                   <option value="">Seleccionar Rol</option>
                   <option value="Administrador">Administrador</option>
                   <option value="Especial">Especial</option>
                   <option value="Vendedor">Vendedor</option>
                  </select>
                </div>
              </div>

              <!-- Foto -->
               <div class="form-group">
                <div class="panel text">SUBIR FOTO</div>
                <input 
                  type="file"
                  class="nuevaFoto"
                  name="nuevaFoto"
                >
                <p class="help-block">Peso máximo de la foto: 2 MB</p>
                <img src="vistas/img/usuarios/default/user_default.png" class="img-thumbnail previsualizar" width="100px">
              </div>

          </div>
        </div>
        
        <!--====  End of Modal Body  ====-->     

        <!--==================================
        =            Modal Footer            =
        ===================================-->
        
        <div class="modal-footer">
          <button 
            type="button" 
            class="btn btn-danger" 
            data-dismiss="modal"
          >
            <i class="fa fa-times"></i>
              Cerrar
          </button>

          <button 
            type="submit" 
            class="btn btn-primary"
          >
            <i class="fa fa-save"></i>
             Guardar
          </button>
        </div>
        
        <!--====  End of Modal Footer  ====-->

        <?php

          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrCrearUsuario();

        ?>

      </form>

    </div>

  </div>
</div>

<!--====  End of Modal Agregar Usuario  ====-->


<!--===========================================
=            Modal Editar Usuario            =
============================================-->

<div id="modalEditarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--==================================
        =            Modal Header            =
        ===================================-->
        
        <div class="modal-header" style="background: #3c8dbc; color: #fff">
          <button 
            type="button" 
            class="close" 
            data-dismiss="modal"
            style="color: #fff" 
          >
            &times;
          </button>
          <h4 class="modal-title">Editar usuario</h4>
        </div>
        
        <!--====  End of Modal Header  ====-->



        <!--================================
        =            Modal Body            =
        =================================-->
        
        <div class="modal-body">     
          <div class="box-body">
              
              <!-- Nombre -->
              <div class="form-group">
                <div class="input-group" style="width: 100%;">
                  <span class="input-group-addon" style="width: 50px;">
                    <i class="fa fa-user"></i>
                  </span> 
                  <input 
                    class="form-control input-lg" 
                    type="text"
                    id="editarNombre"
                    name="editarNombre"
                    value="" 
                    required
                  >
                </div>
              </div>

              <!-- Usuario -->
              <div class="form-group">
                <div class="input-group" style="width: 100%;">
                  <span class="input-group-addon" style="width: 50px;">
                    <i class="fa fa-key"></i>
                  </span>
                  <input 
                    class="form-control input-lg" 
                    type="text"
                    id="editarUsuario"
                    name="editarUsuario"
                    value="" 
                    readonly 
                  >
                </div>
              </div>

              <!-- Contraseña -->
              <div class="form-group">
                <div class="input-group" style="width: 100%;">
                  <span class="input-group-addon" style="width: 50px;">
                    <i class="fa fa-lock"></i>
                  </span>
                  <input 
                    class="form-control input-lg" 
                    type="password"
                    name="editarPassword"
                    placeholder="Nueva contraseña"
                    
                  >
                  <input 
                    type="hidden"
                    id="passwordActual"
                    name="passwordActual" 
                  >
                </div>
              </div>

              <!-- Perfil o Rol -->
              <div class="form-group">
                <div class="input-group" style="width: 100%;">
                  <span class="input-group-addon" style="width: 50px;">
                    <i class="fa fa-users"></i>
                  </span>
                  <select 
                    class="form-control input-lg"
                    name="editarPerfil"
                  >
                   <option value="" id="editarPerfil"></option>
                   <option value="Administrador">Administrador</option>
                   <option value="Especial">Especial</option>
                   <option value="Vendedor">Vendedor</option>
                  </select>
                </div>
              </div>

              <!-- Foto -->
               <div class="form-group">
                <div class="panel text">SUBIR FOTO</div>
                <input 
                  type="file"
                  class="nuevaFoto"
                  name="editarFoto"
                >
                <p class="help-block">Peso máximo de la foto: 2 MB</p>
                <img src="vistas/img/usuarios/default/user_default.png" class="img-thumbnail previsualizar" width="100px">
                <input 
                  type="hidden"
                  id="fotoActual" 
                  name="fotoActual" 
                >
              </div>

          </div>
        </div>
        
        <!--====  End of Modal Body  ====-->     

        <!--==================================
        =            Modal Footer            =
        ===================================-->
        
        <div class="modal-footer">
          <button 
            type="button" 
            class="btn btn-danger" 
            data-dismiss="modal"
          >
            <i class="fa fa-times"></i>
              Cerrar
          </button>

          <button 
            type="submit" 
            class="btn btn-primary"
          >
            <i class="fa fa-save"></i>
             Guardar
          </button>
        </div>
        
        <!--====  End of Modal Footer  ====-->

        <?php

          $editarUsuario = new ControladorUsuarios();
          $editarUsuario -> ctrEditarUsuario();

        ?>

      </form>

    </div>

  </div>
</div>

<!--====  End of Modal Editar Usuario  ====-->

<?php
  
  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

?>