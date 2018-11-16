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
              <th>Correo electrónico</th>
              <th>Teléfono</th>
              <th>Dirección</th>
              <th>Fecha de nacimiento</th>
              <th>Total compras</th>
              <th>Última compra</th>
              <th>Ingreso al sistema</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>
              
            <tr>
              
              <td>1</td>
              <td>Milton Daniel</td>
              <td>012345</td>
              <td>milton@example.com</td>
              <td>8123456789</td>
              <td>Calle Uno #1000, Downtown</td>
              <td>1998-08-29</td>
              <td>35</td>
              <td>2018-11-04 17:25:32</td>
              <td>2017-10-03 17:25:32</td>
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
                    type="date" 
                    name="nuevaFechaNacimiento" 
                    placeholder="Fecha de nacimiento" 
                    data-inputmask="'alias': 'dd/mm/yyyy'" 
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

    </div>

  </div>
</div>

<!--====  End of Modal Agregar Cliente  ====-->