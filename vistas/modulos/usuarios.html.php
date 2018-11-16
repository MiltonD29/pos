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
              
              <th style="width: 10px">#</th>
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
              
            <tr>
              
              <td>1</td>
              <td>Usuario Administrador</td>
              <td>admin</td>
              <td>
                <img 
                  src="vistas/img/usuarios/default/user_default.png" 
                  alt="User Image" 
                  width="40px"
                  class="img-thumbnail">
              </td>
              <td>Administrador</td>
              <td>
                <button class="btn btn-success btn-xs">Activado</button>
              </td>
              <td>2018-09-22 19:58:32</td>
              <td>
                <div class="btn-group">
                  
                  <button class="btn btn-warning">
                    <i class="fa fa-pencil"></i>
                  </button>

                  <button class="btn btn-danger">
                    <i class="fa fa-times"></i>
                  </button>

                </div>
              </td>

            </tr>

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
                <div class="input-group">
                  <span class="input-group-addon">
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
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-key"></i>
                  </span>
                  <input 
                    class="form-control input-lg" 
                    type="text"
                    name="nuevoUsuario"
                    placeholder="Usuario"
                    required
                  >
                </div>
              </div>

              <!-- Contraseña -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
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
                <div class="input-group">
                  <span class="input-group-addon">
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
                  id="nuevaFoto"
                  name="nuevaFoto"
                >
                <p class="help-block">Peso máximo de la foto: 200 MB</p>
                <img src="vistas/img/usuarios/default/user_default.png" class="img-thumbnail" width="100px">
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

      </form>

    </div>

  </div>
</div>

<!--====  End of Modal Agregar Usuario  ====-->