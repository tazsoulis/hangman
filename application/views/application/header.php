<?php 
   
?>
 <!DOCTYPE html>
 <html>
 <head>
   <title>home</title>
   <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
     <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/sweetalert.css")?>">
     <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/custom.css")?>">
 </head>
 <body>
  <nav>
    <div class="nav-wrapper">
      <img class="logo" src="<?= base_url("assets/img/hangman.jpg")?>" style="height: 69px;" alt="FAB!">
      <ul id="nav-mobile" class="right hide-on-med-and-down" style="padding-top: 6px;">
        <li >
          <div class="chip">
            <img src="assets/img/<?php if (isset($_SESSION['sex'])){echo $_SESSION['sex'];}else{ echo 'girl';} ?>.png" alt="Contact Person">
         <?php 
     
          if (isset($username)&&($_SESSION['admin']==1)) {
             echo 'ADMIN, '.$username; 
          } else if(isset($username)){
              echo "Welcome:".$username;
          }else{
            echo "You are not login";
          }
          
          ?>

          </div>
        </li>
        <?php if(isset($username)){echo '<li><a href='.base_url("game").'>Play</a></li>';} ?>
        <?php if(isset($username)){echo '<li><a href='.base_url("players").'>Best Players</a></li>';} ?>
        <?php if(isset($username)&&($_SESSION['admin']==1) ){echo '<li><a href='.base_url("word").'>word</a></li>';} ?>
        <?php if(isset($username)){echo '<li><a href='.base_url("logout").'>logout</a></li>';} ?>
       
      </ul>
    </div>
  </nav>
  
