<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Crear Venta
      <small>Panel de Control</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-home"></i> Inicio</a></li>
      <li class="active">Crear Venta</li>
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
          <form role="form" method="post">
            <div class="box-body">
              
              <div class="box">
                
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
                      name="nuevoVendedor" 
                      value="Usuario Administrador" 
                      readonly 
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
                      name="nuevaVenta" 
                      value="012345" 
                      readonly 
                    >
                  </div>
                </div>

                <!-- Cliente -->
                <div class="form-group">
                  <div class="input-group" style="width: 100%">
                    <span class="input-group-addon" style="width: 50px">
                      <i class="fa fa-users"></i>
                    </span>
                    <select 
                      class="form-control" 
                      name="seleccionarCliente" 
                      id="seleccionarCliente"
                      required 
                    >
                      <option value="">Seleccionar cliente</option>
                    </select>
                    <span class="input-group-addon">
                      <button 
                        type="button" 
                        class="btn btn-default btn-xs"
                        data-toggle="modal"
                        data-target="#modalAgregarCliente"
                        data-dismiss="modal"
                      >
                        Agregar cliente
                      </button>
                    </span>
                  </div>
                </div>

                <!-- Producto -->
                <div class=" row nuevoProducto">
                  
                  <!-- Descripción -->
                  <div class="col-xs-6" style="padding-right: 0px">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <button 
                          type="button" 
                          class="btn btn-danger btn-xs"
                        >
                          <i class="fa fa-times"></i>
                        </button>
                      </span>
                      <input 
                        type="text"
                        class="form-control" 
                        id="agregarProducto" 
                        name="agregarProducto" 
                        placeholder="Descripción del producto" 
                        required 
                      >
                    </div>
                  </div>

                  <!-- Cantidad -->
                  <div class="col-xs-3">
                    
                      <input 
                        type="number"
                        class="form-control" 
                        id="nuevaCantidadProducto" 
                        name="nuevaCantidadProducto" 
                        min="1" 
                        placeholder="1" 
                        required 
                      >
                    
                  </div>

                  <!-- Precio -->
                  <div class="col-xs-3" style="padding-left: 0px">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="ion ion-social-usd"></i>
                      </span>
                      <input 
                        type="number"
                        min="1" 
                        class="form-control" 
                        id="nuevoPrecioProducto" 
                        name="nuevoPrecioProducto" 
                        placeholder="$ 100" 
                        required
                        readonly 
                      >
                    </div>
                  </div>

                </div>

                <button
                  type="button"
                  class="btn btn-default hidden-lg"
                >
                  Agregar producto
                </button>

                <hr>

                <div class="row">
                  <div class="col-xs-8 pull-right">
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
                                class="form-control" 
                                min="0" 
                                id="nuevoImpuestoVenta" 
                                name="nuevoImpuestoVenta" 
                                placeholder="0" 
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
                                type="number"
                                class="form-control" 
                                min="0" 
                                id="nuevoTotalVenta" 
                                name="nuevoTotalVenta" 
                                placeholder="0" 
                                required 
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
                  <div class="col-xs-6" style="padding-right: 0px">
                    <div class="input-group">
                      <select 
                        class="form-control" 
                        name="nuevoMetodoPago" 
                        id="nuevoMetodoPago"
                        required 
                      >
                        <option value="">Selecciona método de pago</option>
                        <option value="efectivo">Efectivo</option>
                        <option value="tarjetaCredito">Tarjeta de Crédito</option>
                        <option value="tarjetaDebito">Tarjeta de Débito</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-xs-6">
                    <div class="input-group">
                      <input 
                      type="text"
                      class="form-control" 
                      id="nuevoCodigoTransaccion" 
                      name="nuevoCodigoTransaccion" 
                      placeholder="Código transacción" 
                      >
                      <span class="input-group-addon">
                        <i class="fa fa-lock"></i>
                      </span>
                    </div>
                  </div>

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
                 Guardar venta
              </button>
            </div>
          </form>
        </div>
      </div>


      <!--========================================
      =            TABLA DE PRODUCTOS            =
      =========================================-->
      <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
        
        <div class="box box-warning">
          
          <div class="box-header with-border"></div>

          <div class="box-body">
            
            <table class="table table-bordered table-striped dt-responsive tablas">
              
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

              <tbody>
                <tr>
                  <td>1</td>
                  <td>
                    <img 
                    src="vistas/img/productos/default/product_default.png"
                    class="img-thumbnail" 
                    width="40px" 
                    >
                  </td>
                  <td>01234</td>
                  <td>Lorem ipsum dolor sit amet</td>
                  <td>20</td>
                  <td>
                    <div class="btn-group">
                      <button 
                      type="button" 
                        class="btn btn-primary"
                      >
                        Agregar
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>

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