<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Clientes
      <small>Panel de Control</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-home"></i> Inicio</a></li>
      <li class="active">Clientes</li>
    </ol>
  </section>

  <section class="content">

    <!-- Default box -->
    <div class="box">

      <div class="box-header with-border">
        
        <button 
          class="btn btn-primary" 
          data-toggle="modal" 
          data-target="#modalAgregarCliente"
        >
          Agregar cliente
        </button>

      </div>

      <div class="box-body">
        
        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            
          <thead>
              
            <tr>
              
              <th style="width: 10px">#</th>
              <th>Nombre</th>
              <th>Documento ID</th>
              <th>Correo</th>
              <th>Teléfono</th>
              <th>Dirección</th>
              <th>Fecha de nacimiento</th>
              <th>Compras</th>
              <th>Última compra</th>
              <th>Registro</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>
              
            <?php

              $item = null;
              $valor = null;

              $clientes = ControladorClientes::ctrMostrarClientes( $item, $valor );

              foreach ($clientes as $key => $value) {
                
                echo '
                      <tr>
            
                        <td>'.($key+1).'</td>
                        <td>'.$value["nombre"].'</td>
                        <td>'.$value["documento"].'</td>
                        <td>'.$value["email"].'</td>
                        <td>'.$value["telefono"].'</td>
                        <td>'.$value["direccion"].'</td>
                        <td>'.$value["fecha_nacimiento"].'</td>
                        <td>'.$value["compras"].'</td>
                        <td>'.$value["ultima_compra"].'</td>
                        <td>'.$value["fecha"].'</td>
                        <td>
                          <div class="btn-group">
                            
                            <button 
                              class="btn btn-warning btnEditarCliente btn-sm"
                              data-toggle="modal"
                              data-target="#modalEditarCliente"
                              idCliente="'.$value["id"].'"
                            >
                              <i class="fa fa-pencil"></i>
                            </button>

                            <button 
                              class="btn btn-danger btnEliminarCliente btn-sm"
                              idCliente="'.$value["id"].'"
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
=            Modal Agregar Cliente            =
============================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

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
          <h4 class="modal-title">Agregar cliente</h4>
        </div>
        
        <!--====  End of Modal Header  ====-->



        <!--================================
        =            Modal Body            =
        =================================-->
        
        <div class="modal-body">     
          <div class="box-body">
              
              <!-- Nombre -->
              <div class="form-group">
                <div class="input-group" style="width: 100%">
                  <span class="input-group-addon" style="width: 50px">
                    <i class="fa fa-user"></i>
                  </span> 
                  <input 
                    class="form-control input-lg" 
                    type="text" 
                    name="nuevoCliente" 
                    placeholder="Nombre" 
                    required
                  >
                </div>
              </div>

              <!-- Documento ID -->
              <div class="form-group">
                <div class="input-group" style="width: 100%">
                  <span class="input-group-addon" style="width: 50px">
                    <i class="fa fa-id-card"></i>
                  </span> 
                  <input 
                    class="form-control input-lg" 
                    type="number" 
                    min="0" 
                    name="nuevoDocumentoId" 
                    placeholder="Documento ID" 
                    required
                  >
                </div>
              </div>

              <!-- Correo electrónico -->
              <div class="form-group">
                <div class="input-group" style="width: 100%">
                  <span class="input-group-addon" style="width: 50px">
                    <i class="fa fa-envelope"></i>
                  </span> 
                  <input 
                    class="form-control input-lg" 
                    type="email"
                    name="nuevoEmail" 
                    placeholder="Correo electrónico" 
                    required
                  >
                </div>
              </div>

              <!-- Teléfono -->
              <div class="form-group">
                <div class="input-group" style="width: 100%">
                  <span class="input-group-addon" style="width: 50px">
                    <i class="fa fa-phone"></i>
                  </span> 
                  <input 
                    class="form-control input-lg" 
                    type="text" 
                    name="nuevoTelefono" 
                    placeholder="Teléfono" 
                    data-inputmask="'mask':'(999) 999-9999'" 
                    data-mask 
                    required
                  >
                </div>
              </div>

              <!-- Dirección -->
              <div class="form-group">
                <div class="input-group" style="width: 100%">
                  <span class="input-group-addon" style="width: 50px">
                    <i class="fa fa-map-marker"></i>
                  </span> 
                  <input 
                    class="form-control input-lg" 
                    type="text" 
                    name="nuevaDireccion" 
                    placeholder="Dirección" 
                    required
                  >
                </div>
              </div>

              <!-- Fecha de nacimiento -->
              <div class="form-group">
                <div class="input-group" style="width: 100%">
                  <span class="input-group-addon" style="width: 50px">
                    <i class="fa fa-calendar"></i>
                  </span> 
                  <input 
                    class="form-control input-lg" 
                    type="text" 
                    name="nuevaFechaNacimiento" 
                    placeholder="Fecha de nacimiento" 
                    data-inputmask="'alias': 'yyyy/mm/dd'" 
                    data-mask 
                    required
                  >
                </div>
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

      <?php

        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearCliente();

      ?>

    </div>

  </div>
</div>

<!--====  End of Modal Agregar Cliente  ====-->



<!--===========================================
=            Modal Editar Cliente            =
============================================-->

<div id="modalEditarCliente" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

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
          <h4 class="modal-title">Editar cliente</h4>
        </div>
        
        <!--====  End of Modal Header  ====-->



        <!--================================
        =            Modal Body            =
        =================================-->
        
        <div class="modal-body">     
          <div class="box-body">
              
              <!-- Nombre -->
              <div class="form-group">
                <div class="input-group" style="width: 100%">
                  <span class="input-group-addon" style="width: 50px">
                    <i class="fa fa-user"></i>
                  </span> 
                  <input 
                    class="form-control input-lg" 
                    type="text" 
                    id="editarCliente" 
                    name="editarCliente"
                    required
                  >
                  <input 
                    type="hidden"
                    id="idCliente" 
                    name="idCliente" 
                  >
                </div>
              </div>

              <!-- Documento ID -->
              <div class="form-group">
                <div class="input-group" style="width: 100%">
                  <span class="input-group-addon" style="width: 50px">
                    <i class="fa fa-id-card"></i>
                  </span> 
                  <input 
                    class="form-control input-lg" 
                    type="number" 
                    min="0" 
                    id="editarDocumentoId"
                    name="editarDocumentoId" 
                    required
                  >
                </div>
              </div>

              <!-- Correo electrónico -->
              <div class="form-group">
                <div class="input-group" style="width: 100%">
                  <span class="input-group-addon" style="width: 50px">
                    <i class="fa fa-envelope"></i>
                  </span> 
                  <input 
                    class="form-control input-lg" 
                    type="email"
                    id="editarEmail" 
                    name="editarEmail" 
                    required
                  >
                </div>
              </div>

              <!-- Teléfono -->
              <div class="form-group">
                <div class="input-group" style="width: 100%">
                  <span class="input-group-addon" style="width: 50px">
                    <i class="fa fa-phone"></i>
                  </span> 
                  <input 
                    class="form-control input-lg" 
                    type="text" 
                    id="editarTelefono" 
                    name="editarTelefono" 
                    data-inputmask="'mask':'(999) 999-9999'" 
                    data-mask 
                    required
                  >
                </div>
              </div>

              <!-- Dirección -->
              <div class="form-group">
                <div class="input-group" style="width: 100%">
                  <span class="input-group-addon" style="width: 50px">
                    <i class="fa fa-map-marker"></i>
                  </span> 
                  <input 
                    class="form-control input-lg" 
                    type="text" 
                    id="editarDireccion" 
                    name="editarDireccion" 
                    required
                  >
                </div>
              </div>

              <!-- Fecha de nacimiento -->
              <div class="form-group">
                <div class="input-group" style="width: 100%">
                  <span class="input-group-addon" style="width: 50px">
                    <i class="fa fa-calendar"></i>
                  </span> 
                  <input 
                    class="form-control input-lg" 
                    type="text" 
                    id="editarFechaNacimiento" 
                    name="editarFechaNacimiento" 
                    data-inputmask="'alias': 'yyyy/mm/dd'" 
                    data-mask 
                    required
                  >
                </div>
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

      <?php

        $editarCliente = new ControladorClientes();
        $editarCliente -> ctrEditarCliente();

      ?>

    </div>

  </div>
</div>

<!--====  End of Modal Editar Cliente  ====-->

<?php

  $eliminarCliente = new ControladorClientes();
  $eliminarCliente -> ctrEliminarCliente();

?>