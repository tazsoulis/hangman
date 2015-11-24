<?php 
  session_start();
  $_SESSION['name'][] = $_POST['name'];  
?>

<!DOCTYPE html>
<html>
<head>
	<title>Guess word</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

	 <div class="row">
        <div class="col s12 m6 offset-m3">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">HangMan</span>
              <br>
                <?php 

                	$tmp="play";
                  $word=array();
                  $chars = str_split($tmp);

                  foreach($chars as $char){
                    array_push($word,$char);  
                  }

                  $result=count($word);
                  //take the first and the last element from an array.
                  $first_letter = reset($word);
                  $last_letter = end($word);

                 //display first ellement & last and check if exists same elements like first and last 
                  for($i=0; $i<$result; $i++){

                    if( $first_letter==$word[$i] || $last_letter==$word[$i]  ){
                      echo($word[$i]);
                    } 
                    else{ 
                      echo("&nbsp; _ &nbsp;");
                    }

                  }
       
                ?>
              <div class="card-action">
                <form method="POST" action="index.php">
                  <input type="text" name="name" >
                  <input type="submit">
                  <!--<a class="waves-effect waves-light btn" type="submit">Stuff</a>-->
                </form>
              </div>


            </div>
            <div class="card-action">
                <?php 
                  print_r($_SESSION['name']);
                ?>
            </div>
          </div>
        </div>
      </div>




<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
</body>
</html>
<?php
//session_destroy();
?>