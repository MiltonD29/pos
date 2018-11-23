<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Proveedores
      <small>Panel de Control</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-home"></i> Inicio</a></li>
      <li class="active">Proveedores</li>
    </ol>
  </section>

  <section class="content">

    <!-- Default box -->
    <div class="box">

      <div class="box-header with-border">
        
        <button 
          class="btn btn-primary" 
          data-toggle="modal" 
          data-target="#modalAgregarProveedor"
        >
          Agregar proveedor
        </button>

      </div>

      <div class="box-body">
        
        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            
          <thead>
              
            <tr>
              
              <th style="width: 10px">#</th>
              <th>Nombre</th>
              <th>RFC</th>
              <th>Dirección</th>
              <th>Teléfono</th>
              <th>Cuenta Bancaria</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>
              
            <?php

              $item = null;
              $valor = null;

              $proveedores = ControladorProveedores::ctrMostrarProveedores( $item, $valor );

              foreach ($proveedores as $key => $value) {
                
                echo '
                      <tr>
            
                        <td>'.($key+1).'</td>
                        <td>'.$value["nombre"].'</td>
                        <td>'.$value["rfc"].'</td>
                        <td>'.$value["direccion"].'</td>
                        <td>'.$value["telefono"].'</td>
                        <td>'.$value["cuenta_bancaria"].'</td>
                        <td>
                          <div class="btn-group">
                            
                            <button 
                              class="btn btn-warning btnEditarProveedor btn-sm"
                              data-toggle="modal"
                              data-target="#modalEditarProveedor"
                              idProveedor="'.$value["id"].'"
                            >
                              <i class="fa fa-pencil"></i>
                            </button>

                            <button 
                              class="btn btn-danger btnEliminarProveedor btn-sm"
                              idProveedor="'.$value["id"].'"
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
=            Modal Agregar Proveedor          =
============================================-->

<div id="modalAgregarProveedor" class="modal fade" role="dialog">
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
          <h4 class="modal-title">Agregar proveedor</h4>
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
                    name="nuevoProveedor" 
                    placeholder="Nombre o Razón Social" 
                    required
                  >
                </div>
              </div>

              <!-- RFC -->
              <div class="form-group">
                <div class="input-group" style="width: 100%">
                  <span class="input-group-addon" style="width: 50px">
                    <i class="fa fa-id-card"></i>
                  </span> 
                  <input 
                    class="form-control input-lg" 
                    type="text"
                    name="nuevoRfc" 
                    placeholder="RFC" 
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
                    name="nuevaDireccionProveedor" 
                    placeholder="Dirección" 
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
                    name="nuevoTelefonoProveedor" 
                    placeholder="Teléfono" 
                    data-inputmask="'mask':'(999) 999-9999'" 
                    data-mask 
                    required
                  >
                </div>
              </div>
              

              <!-- Cuenta bancaria -->
              <div class="form-group">
                <div class="input-group" style="width: 100%">
                  <span class="input-group-addon" style="width: 50px">
                    <i class="fa fa-university"></i>
                  </span> 
                  <input 
                    class="form-control input-lg" 
                    type="text" 
                    name="nuevaCuentaBancaria" 
                    placeholder="Número de cuenta bancaria"
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

        $crearProveedor = new ControladorProveedores();
        $crearProveedor -> ctrCrearProveedor();

      ?>

    </div>

  </div>
</div>

<!--====  End of Modal Agregar Proveedor  ====-->



<!--===========================================
=            Modal Editar Proveedor            =
============================================-->

<div id="modalEditarProveedor" class="modal fade" role="dialog">
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
          <h4 class="modal-title">Editar proveedor</h4>
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
                    id="editarProveedor" 
                    name="editarProveedor"
                    required
                  >
                  <input 
                    type="hidden"
                    id="idProveedor" 
                    name="idProveedor" 
                  >
                </div>
              </div>

              <!-- RFC -->
              <div class="form-group">
                <div class="input-group" style="width: 100%">
                  <span class="input-group-addon" style="width: 50px">
                    <i class="fa fa-id-card"></i>
                  </span> 
                  <input 
                    class="form-control input-lg" 
                    type="text"
                    id="editarRfc"
                    name="editarRfc" 
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
                    id="editarTelefonoProveedor" 
                    name="editarTelefonoProveedor" 
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
                    id="editarDireccionProveedor" 
                    name="editarDireccionProveedor" 
                    required
                  >
                </div>
              </div>

              <!-- Cuenta bancaria -->
              <div class="form-group">
                <div class="input-group" style="width: 100%">
                  <span class="input-group-addon" style="width: 50px">
                    <i class="fa fa-university"></i>
                  </span> 
                  <input 
                    class="form-control input-lg" 
                    type="text" 
                    id="editarCuentaBancaria" 
                    name="editarCuentaBancaria"
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
             Actualizar
          </button>
        </div>
        
        <!--====  End of Modal Footer  ====-->

      </form>

      <?php

        $editarProveedor = new ControladorProveedores();
        $editarProveedor -> ctrEditarProveedor();

      ?>

    </div>

  </div>
</div>

<!--====  End of Modal Editar Proveedor  ====-->

<?php

  $eliminarProveedor = new ControladorProveedores();
  $eliminarProveedor -> ctrBorrarProveedor();

?>