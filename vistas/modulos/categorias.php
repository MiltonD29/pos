<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Categorías
      <small>Panel de Control</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-home"></i> Inicio</a></li>
      <li class="active">Categorías</li>
    </ol>
  </section>

  <section class="content">

    <!-- Default box -->
    <div class="box">

      <div class="box-header with-border">
        
        <button 
          class="btn btn-primary" 
          data-toggle="modal" 
          data-target="#modalAgregarCategoria"
        >
          Agregar categoría
        </button>

      </div>

      <div class="box-body">
        
        <table class="table table-bordered table-striped dt-responsive tablas">
            
          <thead>
              
            <tr>
              
              <th style="width: 10px">#</th>
              <th>Categoría</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $categorias = ControladorCategorias::ctrMostrarCategorias( $item, $valor );

            foreach ($categorias as $key => $value) {
              
              echo '
                    <tr>
              
                      <td>'.($key+1).'</td>
                      <td class="text-uppercase">'.$value["categoria"].'</td>
                      <td>
                        <div class="btn-group">
                          
                          <button 
                            class="btn btn-warning btnEditarCategoria"
                            idCategoria="'.$value["id"].'"
                            data-toggle="modal"
                            data-target="#modalEditarCategoria"
                          >
                            <i class="fa fa-pencil"></i>
                          </button>

                          <button 
                            class="btn btn-danger btnEliminarCategoria"
                            idCategoria="'.$value["id"].'"
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
=            Modal Agregar Categoría            =
============================================-->

<div id="modalAgregarCategoria" class="modal fade" role="dialog">
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
          <h4 class="modal-title">Agregar categoría</h4>
        </div>
        
        <!--====  End of Modal Header  ====-->



        <!--================================
        =            Modal Body            =
        =================================-->
        
        <div class="modal-body">     
          <div class="box-body">
              
              <!-- Categoría -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-th"></i>
                  </span> 
                  <input 
                    class="form-control input-lg" 
                    type="text" 
                    name="nuevaCategoria" 
                    placeholder="Ingresar categoría" 
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

        <?php

        $crearCategoria = new ControladorCategorias();
        $crearCategoria -> ctrCrearCategoria();

        ?>

      </form>

    </div>

  </div>
</div>

<!--====  End of Modal Agregar Categoría  ====-->


<!--===========================================
=            Modal Editar Categoría            =
============================================-->

<div id="modalEditarCategoria" class="modal fade" role="dialog">
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
          <h4 class="modal-title">Editar categoría</h4>
        </div>
        
        <!--====  End of Modal Header  ====-->



        <!--================================
        =            Modal Body            =
        =================================-->
        
        <div class="modal-body">     
          <div class="box-body">
              
              <!-- Categoría -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-th"></i>
                  </span> 
                  <input 
                    class="form-control input-lg" 
                    type="text" 
                    name="editarCategoria"
                    id="editarCategoria"
                    required
                  >

                  <input
                    type="hidden" 
                    name="idCategoria"
                    id="idCategoria"
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

        <?php

        $editarCategoria = new ControladorCategorias();
        $editarCategoria -> ctrEditarCategoria();

        ?>

      </form>

    </div>

  </div>
</div>

<?php

  $borrarCategoria = new ControladorCategorias();
  $borrarCategoria -> ctrBorrarCategoria();

?>

<!--====  End of Modal Editar Categoría  ====-->