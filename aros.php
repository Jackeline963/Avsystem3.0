<?php
require_once('header.php');
require_once('modals/nuevo_aro.php');
require_once('modals/nueva_marca.php');

?>

<div class="content-wrapper" >
    <!-- Content Header (Page header) -->
<div style="margin:5px;">
 <a class="btn btn-dark" style="color:white;border-radius:2px; background:black;margin:solid black 1px" data-toggle="modal" data-target="#newMarca" data-backdrop="static" data-keyboard="false"><i class="fas fa-plus-square"></i> Crear Marca</a>&nbsp;   
 <a class="btn btn-dark" style="color:white;border-radius:2px; background:black;margin:solid black 1px" data-toggle="modal" data-target="#new_aro" data-backdrop="static" data-keyboard="false"><i class="fas fa-plus-square"></i> Crear Aro</a>&nbsp;
 <a class="btn btn-dark" style="color:white;border-radius:2px; background:#001a33;margin:solid #000066 1px" data-toggle="modal" data-target="#new_aro" data-backdrop="static" data-keyboard="false"><i class="fas fa-file-import"></i> Ingresar aros a Inventario</a>
</div>

<div style="margin: 1px">
	<div class="callout callout-info">
        <h5 align="center"><i class="fas fa-glasses" style="color:green"></i> <strong>LISTADO AROS</strong></h5>              
    </div>
	<table class="table" id="data_lista_aros_creados" width="100%">
        <thead style="background:#034f84;color:white;max-height:10px">
          <tr>
            <th style="text-align:center">ID</th>
            <th style="text-align:center">Descripción</th>
            <th style="text-align:center">Diseño</th>
            <th style="text-align:center">Material</th>
            <th style="text-align:center">Categoría</th>
          </tr>
        </thead>
        <tbody style="text-align:center">                                        
        </tbody>
      </table>   <!-- /.content -->
</div>
    
</div><!-- /.wrapper -->

<script src='js/bootbox.min.js'></script>
<script src='js/productos.js'></script>
<script src="js/marca.js"></script>