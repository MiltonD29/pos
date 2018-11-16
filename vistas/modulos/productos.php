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
        
       <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%">
         
        <thead>
         
          <tr>
           
           <th style="width:10px">#</th>
           <th>Imagen</th>
           <th>Código</th>
           <th>Descripción</th>
           <th>Categoría</th>
           <th>Stock</th>
           <th>Precio de compra</th>
           <th>Precio de venta</th>
           <th>Agregado</th>
           <th>Acciones</th>
           
         </tr> 

        </thead>

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

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button 
            type="button" 
            class="close" 
            data-dismiss="modal"
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


            <!-- Categoría -->
            <div class="form-group">        
              <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 50px;">
                  <i class="fa fa-th"></i>
                </span> 
                <select 
                  class="form-control input-lg" 
                  id="nuevaCategoria" 
                  name="nuevaCategoria" 
                  required
                >
                  
                  <option value="">Selecionar categoría</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  foreach ($categorias as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                  }

                  ?>
  
                </select>

              </div>

            </div>

            <!-- Código -->
            <div class="form-group">
              <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 50px;">
                  <i class="fa fa-code"></i>
                </span> 
                <input 
                  type="text" 
                  class="form-control input-lg" 
                  id="nuevoCodigo" 
                  name="nuevoCodigo" 
                  placeholder="Ingresar código" 
                  readonly 
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
                  type="text" 
                  class="form-control input-lg" 
                  name="nuevaDescripcion" 
                  placeholder="Ingresar descripción" 
                  required
                  >
              </div>
            </div>

             <!-- Stock -->
             <div class="form-group">
              <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 50px;">
                  <i class="fa fa-check"></i>
                </span> 
                <input 
                  type="number" 
                  class="form-control input-lg" 
                  name="nuevoStock" 
                  min="0" 
                  placeholder="Stock" 
                  required
                >
              </div>
            </div>

             <!-- Precios -->
             <div class="form-group row">

                <!-- Precio de Compra -->
                <div class="col-xs-12 col-sm-6">
                  <div class="input-group" style="width: 100%;">
                    <span class="input-group-addon" style="width: 50px;">
                      <i class="fa fa-arrow-up"></i>
                    </span> 
                    <input 
                      type="number" 
                      class="form-control input-lg" 
                      id="nuevoPrecioCompra" 
                      name="nuevoPrecioCompra" 
                      min="0" 
                      step="any" 
                      placeholder="Precio de compra" 
                      required
                      >
                  </div>
                </div>

                <!-- Precio de Venta -->
                <div class="col-xs-12 col-sm-6">
                  <div class="input-group" style="width: 100%;">
                    <span class="input-group-addon" style="width: 50px;">
                      <i class="fa fa-arrow-down"></i>
                    </span> 
                    <input 
                      type="number" 
                      class="form-control input-lg" 
                      id="nuevoPrecioVenta" 
                      name="nuevoPrecioVenta" 
                      min="0" 
                      step="any" 
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
                          checked
                        >
                        Utilizar procentaje
                      </label>
                    </div>
                  </div>

                  <!-- Porcentaje -->
                  <div class="col-xs-6" style="padding:0">
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
              <div class="panel">SUBIR IMAGEN</div>
              <input 
                type="file"
                class="nuevaImagen" 
                name="nuevaImagen"
              >
              <p class="help-block">Peso máximo de la imagen 2MB</p>
              <img 
                src="vistas/img/productos/default/product_default.png" 
                class="img-thumbnail previsualizar" 
                width="100px"
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

      </form>

      <?php

        $crearProducto = new ControladorProductos();
        $crearProducto -> ctrCrearProducto();

      ?>  

    </div>

  </div>

</div>

<!--===========================================
=            Modal Editar Producto            =
============================================-->

<div id="modalEditarProducto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--==================================
        =            Modal Header            =
        ===================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button 
            type="button" 
            class="close" 
            data-dismiss="modal"
          >
            &times;
          </button>

          <h4 class="modal-title">Editar producto</h4>

        </div>

        <!--====  End of Modal Header  ====-->

        <!--================================
        =            Modal Body            =
        =================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- Categoría -->
            <div class="form-group">        
              <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 50px;">
                  <i class="fa fa-th"></i>
                </span> 
                <select 
                  class="form-control input-lg"  
                  name="editarCategoria"
                  readonly 
                  required
                >
                  
                  <option id="editarCategoria"></option>
  
                </select>

              </div>

            </div>

            <!-- Código -->
            <div class="form-group">
              <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 50px;">
                  <i class="fa fa-code"></i>
                </span> 
                <input 
                  type="text" 
                  class="form-control input-lg" 
                  id="editarCodigo" 
                  name="editarCodigo" 
                  readonly 
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
                  type="text" 
                  class="form-control input-lg" 
                  id="editarDescripcion"
                  name="editarDescripcion" 
                  required
                  >
              </div>
            </div>

             <!-- Stock -->
             <div class="form-group">
              <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 50px;">
                  <i class="fa fa-check"></i>
                </span> 
                <input 
                  type="number" 
                  class="form-control input-lg" 
                  id="editarStock" 
                  name="editarStock" 
                  min="0"
                  required
                >
              </div>
            </div>

             <!-- Precios -->
             <div class="form-group row">

                <!-- Precio de Compra -->
                <div class="col-xs-12 col-sm-6">
                  <div class="input-group" style="width: 100%;">
                    <span class="input-group-addon" style="width: 50px;">
                      <i class="fa fa-arrow-up"></i>
                    </span> 
                    <input 
                      type="number" 
                      class="form-control input-lg" 
                      id="editarPrecioCompra" 
                      name="editarPrecioCompra" 
                      min="0" 
                      step="any" 
                      required
                      >
                  </div>
                </div>

                <!-- Precio de Venta -->
                <div class="col-xs-12 col-sm-6">
                  <div class="input-group" style="width: 100%;">
                    <span class="input-group-addon" style="width: 50px;">
                      <i class="fa fa-arrow-down"></i>
                    </span> 
                    <input 
                      type="number" 
                      class="form-control input-lg" 
                      id="editarPrecioVenta" 
                      name="editarPrecioVenta" 
                      min="0" 
                      step="any"
                      readonly 
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
                          checked
                        >
                        Utilizar procentaje
                      </label>
                    </div>
                  </div>

                  <!-- Porcentaje -->
                  <div class="col-xs-6" style="padding:0">
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
              <div class="panel">SUBIR IMAGEN</div>
              <input 
                type="file"
                class="nuevaImagen" 
                name="editarImagen"
              >
              <p class="help-block">Peso máximo de la imagen 2MB</p>
              <img 
                src="vistas/img/productos/default/product_default.png" 
                class="img-thumbnail previsualizar" 
                width="100px"
              >
  
              <input 
                type="hidden" 
                id="imagenActual"
                name="imagenActual"
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

      </form>

      <?php

      $editarProducto = new ControladorProductos();
      $editarProducto -> ctrEditarProducto();

      ?>

    </div>

  </div>

</div>

<?php

  $eliminarProducto = new ControladorProductos();
  $eliminarProducto -> ctrEliminarProducto();

?>
