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
              
            <tr>
              
              <td>1</td>
              <td>Equipos Electromecánicos</td>
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

      </form>

    </div>

  </div>
</div>

<!--====  End of Modal Agregar Categoría  ====-->