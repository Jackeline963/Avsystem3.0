  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">      
    <link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
    </script> 
    <script>
      $(document).ready(function() {
        $('select').material_select();
      });
    </script>
  </head>

  <body>
 <form method="post" class="login" autocomplete="off">    
  <div class="form-reg">
    <div class="login-div">
      <div class="row img-logo">
        <div class="logo center"></div>
      </div>
      <div class="row center-align"><h5><i class = "material-icons medium">person</i></h5></div>
      <div class="row">
        <div class="input-field col s12">
          <input id="usuario" type="text" class="validate" name="usuario">
          <label for="usuario" style="font-size:14px">Usuario</label>
        </div>
      </div>
     <div class = "row">
          <div class="input-field col s12">            
               <select id='sucursal'>
                  <option value = "" disabled selected>Seleccione sucursal</option>
                  <option value = "Metrocentro">Metrocentro</option>
                  <option value = "Santa Ana">Santa Ana</option>
               </select>
               <label for='sucursal' style="font-size:14px">Sucursal</label>              
            </div>
      <div>

      <div class="row">
        <div class="input-field col s12">
          <input id="pass" type="password" class="validate" name="password">
          <label for="pass" style="font-size:14px">Contraseña</label>          
        </div>
      </div>

 
 

      <div class="row">
        <input type="hidden" name="enviar" class="form-control" value="si">
      </div>
      <div class="row"></div>
      <div class="row">
       
      <div class="col s12 right-align center"> <button class="btn waves-effect waves-light" type="submit" name="action" style="background: black; color: white">Entrar
    
  </button></div>
      </div>
    </div>
</div>
</form>
</html>

