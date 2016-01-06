

 <!DOCTYPE html>
 <html>
 <head>
   <title>home</title>
   <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
     <link rel="stylesheet" type="text/css" href="assets/css/sweetalert.css">
     <link rel="stylesheet" type="text/css" href="assets/css/log.css">
 </head>
 <body >
<div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="https://i.ytimg.com/vi/mgX-wtO_ys8/maxresdefault.jpg">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Press here to Log in<i class="material-icons right">more_vert</i></span>
    </div>
    <div class="card-reveal">
    <div class="row">
      <div class="col s12 ">
      <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
      <form action="<?=site_url('Application/Confirm')?>"  onsubmit="return checkforblank()" method="POST" class="col s12 m4 offset-m4">
        <h4  class="spacer-200">Log in User</h4>
        <div class="row spacer-100">
          <div class="input-field ">
            <i class="material-icons prefix">account_circle</i>
            <input   id="username" type="text" name="username" class="validate">
            <label for="icon_prefix">Username</label>
          </div>
          <div class="input-field ">
            <i class="material-icons prefix">account_circle</i>
            <input  id="password" type="password" name="password" class="validate">
            <label for="icon_prefix">Password</label>
          </div>

        </div>
        <div class="row">
          <div class="col s6"><button type="submit" style="width:205px;" class="waves-effect waves-light btn">Log in</button></div>
          <div class="col s6"><a href="http://localhost/hangman/register" class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Register</a></div>
        </div>
        

      </form>
    
      </div>
    </div>
     
    </div>
  </div>
  

 
</body>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
  <script type="text/javascript" src="assets/js/sweetalert.min.js"></script>
  <script type="text/javascript" src="assets/js/custom.js"></script>
 </body>
 </html>