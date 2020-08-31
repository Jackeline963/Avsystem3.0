<?php require_once('header.php');?>
<?php require_once('modals/modal_proveedores.php');?>
<?php require_once('modals/modal_aros.php');?>

<div class="content-wrapper" >
    <section class="content">
        <div class="container-fluid">
            
            <div class="row" style="margin-top: 5px">
              <div class="col-12">
                <div class="callout callout-info" style="border-bottom: solid 1px #008080">
                  <h3 style='text-align:center;max-height: 20px'>COMPRAS</h3>
                </div>
              </div>
            </div>

            <div class="invoice p-3 mb-3">

            	<div class="row invoice-info callout callout-info" style="border-bottom: solid 1px black;border-right: solid 1px black;border-top: solid 1px black">
                    <div class="col-sm-2 invoice-col">
                    <label># Compra</label>
                      <input type="text" class="form-control input-dark" id="n_compra" style="margin:2px;background:white;border-radius: 6px;text-align: center;">
                    </div>

                    <div class="col-sm-6 invoice-col">
                    <label>Proveedor</label>
                      <input type="text" class="form-control input-dark" id="proveedor_compra" style="margin:2px;background:white;border-radius: 6px;text-align: center;" readonly>
                    </div>

                    <div class="col-sm-2 invoice-col">
                    <label>Cod. Prov.</label>
                      <input type="text" class="form-control input-dark" id="codigo_proveedor" style="margin:2px;background:white;border-radius: 6px;text-align: center;" readonly>
                    </div>

                    <div class="col-sm-2 invoice-col">
                    <label>Buscar</label>
                      <button class="btn btn-primary btn-block" style="border-radius:2px" data-toggle="modal" data-target="#modalProveedores">Proveedor</button>
                    </div>
                </div><!--/.row invoice-info datos Proveedor-->

                <div class="row row2" style="background:#E0E0E0">
                    <div class="form-group col-sm-2">
                      <label for="">Tipo Compra</label>
                      <select class="form-control input-dark" id="tipo_compra" required="">
                        <option value=''>Seleccionar tipo Venta</option>
                        <option value='Contado'>Contado</option>
                        <option value='Credito'>Credito</option>
                      </select>
                    </div>  

                  <div class="form-group col-sm-2">
                    <label for="">Tipo Pago</label>
                      <select class="form-control input-dark" id="tipo_pago" required="">
                        <option value=''>Seleccionar tipo Pago</option>
                        <option value='Contado'>Efectivo</option>
                        <option value='Credito'>Cheque</option>
                        <option value='Credito'>Tarjeta de Crédito</option>
                      </select>
                  </div>

                  <div class="form-group col-sm-2">
                    <label for="">Plazo</label>
                      <select class="form-control input-dark" id="plazo" required="">
                        <option value=''> Seleccione Plazo Credito</option>
                        <option value='1'>1 meses</option>
                        <option value='2'>2 meses</option>
                        <option value='3'>3 meses</option>
                        <option value='4'>4 meses</option>
                        <option value='5'>5 meses</option>
                        <option value='6'>6 meses</option>
                        <option value='7'>7 meses</option>
                        <option value='8'>8 meses</option>
                        <option value='9'>9 meses</option>
                        <option value='10'>10 meses</option>
                        <option value='11'>11 meses</option>
                        <option value='12'>12 meses</option>
                      </select>
                  </div>

                  <div class="form-group col-sm-2">
                    <label for="">Tipo Documento</label>
                      <select class="form-control input-dark" id="tipo_documento" required="">
                        <option value=''>Seleccionar tipo Documento</option>
                        <option value='Factura'>Factura</option>
                        <option value='Credito Fiscal'>Credito Fiscal</option>
                      </select>
                  </div>

                  <div class="form-group col-sm-2">
                    <label for="inputPassword4"># CCF/Factura</label>
                    <input type="text" class="form-control input-dark" id="documento" required>
                  </div>


                  <div class="form-group col-sm-2">
                    <label for="">Sucursal</label>
                      <select class="form-control input-dark" id="sucursal" required="">
                        <option value=''>Seleccionar sucursal</option>
                        <option value='Metrocentro'>Metrocentro</option>
                        <option value='Santa Ana'>Santa Ana</option>
                        <option value='Credito'>Tarjeta de Crédito</option>
                      </select>
                  </div>       

                </div><!--/.row2-->

                <div style="margin:20px;">
                  <a class="btn btn-dark" style="color:white;border-radius:3px; background:black" data-toggle="modal" data-target="#modalAros" data-backdrop="static" data-keyboard="false"><i class="fas fa-glasses"></i> Agregar Aro</a>
                </div>

           <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" align="center"><strong>Detalle de Compras</strong></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0 table-responsive">
                <table class="table table-striped">
                  <thead style="background:black;color:white">
                    <tr>
                      <th style="text-align:center">#</th>
                      <th style="text-align:center">Descripción&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                      <th style="text-align:center">Precio Compra/U</th>
                      <th style="text-align:center">Cantidad</th>
                      <th style="text-align:center">Precio Venta/U</th>
                      <th style="text-align:center">Subtotal</th>
                      <th style="text-align:center">Eliminar</th>
                    </tr>
                  </thead>
                  <tbody id="listar_det_compras" style="width: 100%"></tbody>                    

                    <tfoot style='background:#E0E0E0' onmouseover="get_numero_recibo();">
                      <tr>
                      <td style="text-align:center;text-align:center" colspan="6"><strong>Monto total de la Compra</strong></td>
                      <td style="text-align:center;text-align:center" colspan="1"><strong><span>$</span><span id="total_compra"></span></strong></td>                      
                    </tr>
                    <tfoot>                      
                </table>
                <?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s");?>
                <input type="hidden" id="usuario" value="oscar">
                <input type="hidden" id="fecha" value="<?php echo $hoy;?>">
                <button class="btn btn-dark btn-block" style="border-radius:2px" onClick='registrarCompra();' onmouseover="get_numero_recibo();"><i class="fas fa-save"></i> REGISTRAR COMPRA</button>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div> <!--Fin trable-->    
            </div>
        </div>
    </section>

</div><!-- /.content wrapper-->
<script src='js/compras.js'></script>
<script src='js/proveedores.js'></script>
<script src='js/productos.js'></script>