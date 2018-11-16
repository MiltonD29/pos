<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Productos
      <small>Panel de Control</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-home"></i> Inicio</a></li>
      <li class="active">Productos</li>
    </ol>
  </section>

  <section class="content">

    <!-- Default box -->
    <div class="box">

      <div class="box-header with-border">
        
        <button 
          class="btn btn-primary" 
          data-toggle="modal" 
          data-target="#modalAgregarProducto"
        >
          Agregar producto
        </button>

      </div>

      <div class="box-body">
        
        <table class="table table-bordered table-striped dt-responsive tablas">
            
          <thead>
              
            <tr>
              
              <th style="width: 10px">#</th>
              <th>Imagen</th>
              <th>Código</th>
              <th>Descripción</th>
              <th>Categoría</th>
              <th>Stock</th>
              <th>Precio de compra</th>
              <th>Precio de venta</th>
              <th>Fecha</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>
              
            <tr>
              
              <td>1</td>
              <td>
                <img 
                  src="vistas/img/productos/default/product_default.png" 
                  alt="Product Image" 
                  width="40px"
                  class="img-thumbnail">
              </td>
              <td>0001</td>
              <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
              <td>Lorem ipsum</td>
              <td>20</td>
              <td>$5.00</td>
              <td>$10.00</td>
              <td>2018-10-24 11:32:25</td>
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
=            Modal Agregar Producto            =
============================================-->

<div id="modalAgregarProducto" class="modal fade" role="dialog">
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
          <h4 class="modal-title">Agregar producto</h4>
        </div>
        
        <!--====  End of Modal Header  ====-->



        <!--================================
        =            Modal Body            =
        =================================-->
        
        <div class="modal-body">     
          <div class="box-body">
              
              <!-- Código -->
              <div class="form-group">
                <div class="input-group" style="width: 100%;">
                  <span class="input-group-addon" style="width: 50px;">
                    <i class="fa fa-code"></i>
                  </span> 
                  <input 
                    class="form-control input-lg" 
                    type="text" 
                    name="nuevoCodigo" 
                    placeholder="Ingresar código" 
                    required
                  >
                </div>
              </div>

              <!-- Descripción -->
              <div class="form-group">
                <div class="input-group" style="width: 100%;">
                  <span class="input-group-addon" style="width: 50px;">
                    <i class="fa fa-product-hunt"></i>
                  </span>
                  <input 
                    class="form-control input-lg" 
                    type="text"
                    name="nuevaDescripcion"
                    placeholder="Ingresar descripción"
                    required
                  >
                </div>
              </div>

              <!-- Categoría -->
              <div class="form-group">
                <div class="input-group" style="width: 100%;">
                  <span class="input-group-addon" style="width: 50px;">
                    <i class="fa fa-th"></i>
                  </span>
                  <select 
                    class="form-control input-lg" 
                    name="nuevaCategoria"
                  >
                   <option value="">Seleccionar Categoría</option>
                   <option value="Serigrafia">Serigrafía</option>
                  </select>
                </div>
              </div>

              <!-- Stock -->
              <div class="form-group">
                <div class="input-group" style="width: 100%;">
                  <span class="input-group-addon" style="width: 50px;">
                    <i class="fa fa-check"></i>
                  </span>
                  <input 
                    class="form-control input-lg" 
                    type="number"
                    min="0"
                    name="nuevoStock"
                    placeholder="Cantidad en stock"
                    required
                  >
                </div>
              </div>

              <!-- Precios -->
              <div class="form-group row">

                <!-- Precio de Compra -->
                <div class="col-xs-6">
                  <div class="input-group" style="width: 100%;">
                    <span class="input-group-addon" style="width: 50px;">
                      <i class="fa fa-arrow-up"></i>
                    </span>
                    <input 
                      class="form-control input-lg" 
                      type="number"
                      min="0"
                      name="nuevoPrecioCompra"
                      placeholder="Precio de compra"
                      required
                    >
                  </div>
                </div>

                <!-- Precio de Venta -->
                <div class="col-xs-6">
                  <div class="input-group" style="width: 100%;">
                    <span class="input-group-addon" style="width: 50px;">
                      <i class="fa fa-arrow-down"></i>
                    </span>
                    <input 
                      class="form-control input-lg" 
                      type="number"
                      min="0"
                      name="nuevoPrecioVenta"
                      placeholder="Precio de venta"
                      required
                    >
                  </div>

                  <br>
                  
                  <!-- Checkbox para porcentaje -->
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>
                        <input 
                          type="checkbox"
                          class="minimal porcentaje" 
                        >
                        Utilizar porcentaje
                      </label>
                    </div>
                  </div>
                  
                  <!-- Porcentaje -->
                  <div class="col-xs-6" style="padding: 0;">
                    <div class="input-group">
                      <input 
                        type="number"
                        class="form-control input-lg nuevoPorcentaje" 
                        min="0"
                        value="40"
                        required
                      >
                      <span class="input-group-addon">
                        <i class="fa fa-percent"></i>
                      </span>
                    </div>
                  </div>

                </div>

              </div>

              <!-- Imagen -->
               <div class="form-group">
                <div class="panel text">SUBIR IMAGEN</div>
                <input 
                  type="file"
                  id="nuevaImagen"
                  name="nuevaImagen"
                >
                <p class="help-block">Peso máximo de la imagen: 2 MB</p>
                <img src="vistas/img/productos/default/product_default.png" class="img-thumbnail" width="100px">
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

<!--====  End of Modal Agregar Producto  ====-->