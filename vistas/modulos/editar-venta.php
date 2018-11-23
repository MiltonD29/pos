<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Editar Venta
      <small>Panel de Control</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-home"></i> Inicio</a></li>
      <li class="active">Editar Venta</li>
    </ol>
  </section>

  <section class="content">

    <div class="row">
      
      <!--================================
      =            FORMULARIO            =
      =================================-->
      <div class="col-lg-5 col-xs-12">       
        <div class="box box-success">
          <div class="box-header with-border"></div>        
          <form role="form" method="post" class="formularioVenta">
            <div class="box-body">
              
              <div class="box">

                <?php

                $item = "id";
                $valor = $_GET["idVenta"];

                $venta = ControladorVentas::ctrMostrarVentas($item, $valor);

                $itemUsuario = "id";
                $valorUsuario = $venta["id_vendedor"];

                $vendedor = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                $itemCliente = "id";
                $valorCliente = $venta["id_cliente"];

                $cliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                $porcentajeImpuesto = $venta["impuesto"] * 100 / $venta["neto"];

                ?>
                
                <!-- Vendedor -->
                <div class="form-group">
                  <div class="input-group" style="width: 100%">
                    <span class="input-group-addon" style="width: 50px">
                      <i class="fa fa-user"></i>
                    </span>
                    <input 
                      type="text"
                      class="form-control" 
                      id="nuevoVendedor" 
                      value="<?php echo $vendedor["nombre"]; ?>" 
                      readonly 
                    >
                    <input 
                      type="hidden"
                      name="idVendedor" 
                      value="<?php echo $vendedor["id"]; ?>"
                    >
                  </div>
                </div>

                <!-- Código de venta -->
                <div class="form-group">
                  <div class="input-group" style="width: 100%">
                    <span class="input-group-addon" style="width: 50px">
                      <i class="fa fa-key"></i>
                    </span>               
                      
                    <input 
                      type="text"
                      class="form-control" 
                      id="nuevaVenta" 
                      name="editarVenta" 
                      value="<?php echo $venta["codigo"]; ?>"
                      readonly 
                    >

                  </div>
                </div>

                <!-- Cliente -->
                <div class="form-group " style="display: flex; flex-direction: row;"> 
                  <div class="input-group col-md-8" style="width: 100%">
                    <span class="input-group-addon" style="width: 50px">
                      <i class="fa fa-users"></i>
                    </span>
                    
                    <select 
                      class="form-control" 
                      id="seleccionarCliente" 
                      name="seleccionarCliente" 
                      required
                    >
                    
                    <option value="<?php echo $cliente["id"]; ?>"><?php echo $cliente["nombre"]; ?></option>

                    <?php

                      $item = null;
                      $valor = null;

                      $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

                       foreach ($clientes as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                       }

                    ?>

                    </select>                    
                  
                  </div>

                  <div class="col-md-4">
                    <button 
                        type="button" 
                        class="btn btn-primary" 
                        data-toggle="modal" 
                        data-target="#modalAgregarCliente" 
                        data-dismiss="modal"
                      >
                        Agregar cliente
                    </button>
                  </div>
                  
                
                </div>

                <!-- Producto -->
                <div class="form-group nuevoProducto">
                  
                <?php

                $listaProductos = json_decode($venta["productos"], true);

                foreach ($listaProductos as $key => $value) {

                  $item = "id";
                  $valor = $value["id"];

                  $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

                  $stockAntiguo = $respuesta["stock"] + $value["cantidad"];
                  
                  echo
                  '<div style="display: flex; flex-direction: row">
                    <!-- Descripción -->
                    <div class="form-group">
                      <div class="input-group" style="width: 100%">
                        <span class="input-group-addon" style="padding: 4px 8px; width: 50px">
                          <button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'.$value["id"].'">
                            <i class="fa fa-times"></i>
                          </button>
                        </span>
                        <input type="text" class="form-control nuevaDescripcionProducto" idProducto="'.$value["id"].'" name="agregarProducto" value="'.$value["descripcion"].'"  readonly required >
                      </div>
                    </div>

                    
                    <div style="padding: 0px 5px 0px 5px">
                      <input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="'.$value["cantidad"].'" stock="'.$stockAntiguo.'" nuevoStock="'.$value["stock"].'" required >
                    </div>

                    
                    <div class="form-group ingresoPrecio">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="ion ion-social-usd"></i>
                        </span>
                        <input type="text" class="form-control nuevoPrecioProducto" precioReal="'.$respuesta["precio_venta"].'" name="nuevoPrecioProducto" value="'.$value["total"].'" required readonly >
                      </div>
                    </div>
                  </div>';

                }

                ?>

                </div>

                <input type="hidden" id="listaProductos" name="listaProductos">

                <button
                  type="button"
                  class="btn btn-default hidden-lg btnAgregarProducto"
                >
                  Agregar producto
                </button>

                <hr>

                <div class="row">
                  <div class="col-xs-12 pull-right">
                    <table class="table">
                      
                      <thead>
                        <tr>
                          <td>Impuesto</td>
                          <td>Total</td>
                        </tr>
                      </thead>

                      <tbody>
                        <tr>
                          <td style="width: 50%">
                            <!-- Impuesto -->
                            <div class="input-group">
                              <input 
                                type="number"
                                class="form-control input-lg" 
                                min="0" 
                                id="nuevoImpuestoVenta" 
                                name="nuevoImpuestoVenta" 
                                value="<?php echo $porcentajeImpuesto; ?>" 
                                required 
                              >
                              <input 
                                type="hidden" 
                                name="nuevoPrecioImpuesto" 
                                id="nuevoPrecioImpuesto" 
                                value="<?php echo $venta["impuesto"]; ?>" 
                                required
                              >

                              <input 
                                type="hidden" 
                                name="nuevoPrecioNeto" 
                                id="nuevoPrecioNeto" 
                                value="<?php echo $venta["neto"]; ?>" 
                                required
                              >

                              <span class="input-group-addon">
                                <i class="fa fa-percent"></i>
                              </span>
                            </div>
                          </td>

                          <td style="width: 50%">
                            <!-- Total -->
                            <div class="input-group">
                              <span class="input-group-addon">
                                <i class="ion ion-social-usd"></i>
                              </span>
                              <input 
                                type="text"
                                class="form-control input-lg" 
                                id="nuevoTotalVenta" 
                                name="nuevoTotalVenta" 
                                total=""
                                value="<?php echo $venta["total"]; ?>" 
                                placeholder="0" 
                                required 
                              >
                              <input 
                                type="hidden" 
                                name="totalVenta" 
                                id="totalVenta"
                                value="<?php echo $venta["total"]; ?>" 
                              >
                            </div>
                          </td>
                        </tr>
                      </tbody>

                    </table>
                  </div>
                </div>

                <hr>

                <!-- Método de pago -->
                <div class="form-group row">
                  <div class="col-xs-6" style="padding-right: 0px;">
                    <div class="input-group">
                      <select 
                        class="form-control" 
                        name="nuevoMetodoPago" 
                        id="nuevoMetodoPago"
                        required 
                      >
                        <option value="">Selecciona método de pago</option>
                        <option value="Efectivo">Efectivo</option>
                        <option value="TC">Tarjeta de Crédito</option>
                        <option value="TD">Tarjeta de Débito</option>
                      </select>
                    </div>
                  </div>

                  <div class="cajasMetodoPago"></div>

                  <input type="hidden" id="listaMetodoPago" name="listaMetodoPago">

                  <br>

                </div>

              </div>
            
            </div>

            <div class="box-footer">
              <button 
                type="submit"
                class="btn btn-primary pull-right"
              >
                <span class="input group-addon">
                  <i class="fa fa-save"></i>
                </span>
                 Actualizar venta
              </button>
            </div>
          </form>

          <?php

          $editarVenta = new ControladorVentas();
          $editarVenta -> ctrEditarVenta();

          ?>

        </div>
      </div>


      <!--========================================
      =            TABLA DE PRODUCTOS            =
      =========================================-->
      <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
        
        <div class="box box-warning">
          
          <div class="box-header with-border"></div>

          <div class="box-body">
            
            <table class="table table-bordered table-striped dt-responsive tablaVentas">
              
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Imagen</th>
                  <th>Código</th>
                  <th>Descripción</th>
                  <th>Stock</th>
                  <th>Acciones</th>
                </tr>
              </thead>

            </table>

          </div>

        </div>

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