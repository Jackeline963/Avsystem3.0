<?php 
//require_once()
require_once('header.php');
$n_compra =$_GET["numero_compra"];
require_once('modals/modal_ingreso_bodega.php');
require_once('modals/modal_categoria.php');
require_once('modelos/Externos.php');
$categorias = new Externos();
$cats=$categorias->get_categorias();
?>
<input type="hidden" name="" id="numero_compra_bod" value="<?php echo $n_compra; ?>">
<div class="content-wrapper">
<div style="margin: 5px">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_categoria">
 Crear categoría
</button>

    <h5 align="center"><strong>DISTRIBUIR COMPRAS A BODEGA</strong></h5>
    <div class="callout callout-dark">
	<div class="row" style="margin: 0px;padding: 0px">
		<div class="callout callout-danger col-sm-3">
            <span><strong>No. Compra:</strong></span><span id="numero_compra_i"><?php echo $n_compra; ?></span>
        </div>
        <div class="col-sm-1"></div>
        <div class="callout callout-success col-sm-3">
            <span><strong>Fecha:</strong> </span><span id=""><?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s"); echo $hoy;?></span>
        </div>
        <div class="col-sm-1"></div>        
        <div class="callout callout-info col-sm-3">
            <span><strong>Sucursal: </strong> </span><span id="sucursal_i">Metrocentro</span>
        </div>
	</div>
	</div>
	 <div style="margin:2px;" class="row">
      <div class="col-sm-4">
       <a class="btn btn-dark" style="color:white;border-radius:3px; background:black" data-backdrop="static" data-keyboard="false" onClick="ingresar_compras_bodega();"><i class="fas fa-cubes"></i> Seleccionar Producto</a></div>
       <div class="col-sm-5">
       <select class='form-control' id="categoria_ubicacion">
        <option value="">Seleccione Categoría/Ubicación</option>
        <?php
        for ($i=0; $i < sizeof($cats); $i++) { ?>
          <option value="<?php echo $cats[$i]["id_categoria"]?>"><?php echo $cats[$i]["nombre"]?></option>
         <?php  } ?>

       </select>
       </div>
     </div>
        <div class="card" style="margin-top:10px">
              <!-- /.card-header -->
              <div class="card-body p-0 table-responsive">
                <table class="table table-striped">
                  <thead style="background:black;color:white">
                    <tr>
                      <th style="text-align:center" width="10%">Item</th>
                      <th style="text-align:center" width="20%">Orden</th>
                      <th style="text-align:center" width="55%">Descripción</th>
                      <th style="text-align:center" width="15%">Cantidad</th>
                    </tr>
                  </thead>
                  <tbody id="listar_productos_de_ingreso" style="width: 100%"></tbody>                    
                     
                </table>
                <?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s");?>
                <input type="hidden" id="usuario" value="oscar">
                <input type="hidden" id="fecha_ingreso" value="<?php echo $hoy;?>">
                <button class="btn btn-primary btn-block" style="border-radius:2px" onClick='registrarIngresoBodega();' onmouseover="get_numero_recibo();"><i class="fas fa-download"></i> INGRESAR A INVENTARIO</button>
              </div>
              <!-- /.card-body -->
            </div>

</div>
</div>
<script src='js/compras.js'></script>
<script src='js/bodegas.js'></script>
<script src='js/categorias.js'></script>


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Modal body..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>