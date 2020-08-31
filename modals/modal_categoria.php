  <style>
    #modal_categoria{
      width: 65% !important;
      margin: auto;
    }

     #header{
        background-color: black;
        color: white;
        text-align: center;
    }
    .modal-dialog{
      margin: auto;
    }

    .form-control{
      border: solid 1px black;
      border-radius: 0px;
    }

    .form-control{
      border: solid 1px black;
    }

    .modal-dialog {
      height: 75vh;
      display: flex;
      align-items: center;
}
</style>
  <!-- The Modal -->
  <div class="modal fade bd-example-modal-lg"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal_categoria" style="border-radius:0px !important;">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" id="header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

          <div class="form-row">

            <div class="form-group col-md-6">
              <label>Nombre</label>
              <input type="text" class="form-control" name="" placeholder=" Ingrese categoría" id="cat_nombre">         
            </div>
            <div class="form-group col-md-6">

              <label>Seleccionar Sucursal</label>
              <select name="Sucursal" class="form-control" id="cat_sucursal">
                <option>Santa Ana</option>
                <option>Metrocentro</option>
                <option>San Miguel</option>
                
              </select>         
            </div>
            <div class="form-group col-md-12">
              <label>Descripción</label>
              <input type="text" class="form-control" name="" placeholder="Descripción de categoría" id="cat_descripcion">         
            </div>
            
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" onClick="guardarCategoria();">Guardar categoría</button>
        </div>
        
      </div>
    </div>
  </div>