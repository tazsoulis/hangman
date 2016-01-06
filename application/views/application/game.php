<?php 

  $give_letter=array();
  $attemps=0;

  if(isset($_SESSION['name'])){
    $give_letter = $_SESSION['name'];
    $attemps=count($give_letter);
  }

  //session for errors

  $false =0;

  if(isset($_SESSION['false'])){
    $false=$_SESSION['false'];
  }else{
    $false=0;
  }

  //session for score

  $score=0;

  if(isset($_SESSION['score'])){
    $score=$_SESSION['score'];
  }else{
    $score=0;
  }

  //sesion for true
  
  $true = 0;


  $words=array();
  $query = $this->db->query('SELECT word FROM words');

  foreach ($query->result() as $row){
        
    $word=$row->word;
    array_push($words, $word);
      
  }
  
  $word=array_rand($words);

  $word=($words[$word]);
  $chars = str_split($word);

  //session for word

  if (isset($_SESSION['chars'])){
    $chars = $_SESSION['chars'];
  }

  $r=count($chars);
  $u_s = array();
 
  foreach ($chars as $char) {
    array_push($u_s, "&nbsp; _ &nbsp;");
  }

  $first_letter = reset($chars);
  $last_letter = end($chars);
  if(!isset($_SESSION['name'])){
    array_push($give_letter,$first_letter); 
    array_push($give_letter,$last_letter); 
  }

  //CHECK IF THERE IS ALREADY EXIST LETTER

  if(isset($_GET['name'])){ 

    echo "</br>";
    $charachetrs = str_split($_GET['name']);
    foreach($charachetrs as $char){
      if(in_array($char, $give_letter)){
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Be careful!","This letter has already exist!","error");';
        echo '}, 1000);</script>';
        break;
      }
      else{
        array_push($give_letter,$char); 
      }

      //CHECK IF THE LETTER WHO GIVEs IS EXIST
      if (in_array($char, $chars)) {
        $score+=10;
      }else{
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Wake up MAN!","  Guess right this time!","error");';
        echo '}, 1000);</script>';
        $false++;
        $score-=10;
      } 
    }
    echo "The letters you entered are" , "<br />";
    for($i=0; $i<count($give_letter); $i++){
      echo " $give_letter[$i]" ;
    }
    $attemps=count($give_letter);
  }

?>
<div class="row">
  <div class="col s12 m4 offset-m4">
    <?php echo "Attemps: $attemps","</br>"; ?>
    <div class="row collection center-align ">
       <?php 
          echo('</br>');
          echo('</br>');
          for($i=0; $i<count($chars); $i++){
            if ($first_letter == $chars[$i] || $last_letter == $chars[$i]) { 
              echo "<font size='11px' face='Arial'>";
              echo  $chars[$i];
              echo "</font>";
              $true++;

            }
            else {
              for ($j=0; $j <count($give_letter); $j++) { 
                if ($chars[$i] == $give_letter[$j]) {
                  $u_s[$i] = $chars[$i];
                  $true++;
                } 
              } 
              echo "<font size='12' face='Arial'>";
              echo $u_s[$i];
              echo "</font>";
            }  
          }
        ?>
        <div class="spacer-80"></div>

      <form method="GET" action="<?php base_url("game.php") ?>">
        <input type="text" maxlength="1" name="name" placeholder="Give a Letter" >
        <input class="waves-effect waves-light btn" type="submit">
      </form>
    </div>
    <ul class="collection">
      <li class="collection-item avatar">
        <i class="material-icons circle">sort_by_alpha</i>
        <p class="title center-align "><br>The word is included from <?php echo  $r ?> letters  </p>
      </li>
      <li class="collection-item avatar">
        <i class="material-icons circle green">done</i>
         <p class="title center-align "><br>You find  <?php echo $true ?> letters! </p>
      </li>
      <li class="collection-item avatar">
        <i class="material-icons circle green">insert_chart</i>
         <p class="title center-align "><br>Your score is <?php echo $score ?> points!</p>
      </li>
      <li class="collection-item avatar">
        <i class="material-icons circle red">shuffle</i>
         <p class="title center-align "><br>Be carful! You have <?php echo $false ?> errors!</p>
      </li>
    </ul> 
  </div>
</div>

<?php
$_SESSION['name']=$give_letter;
$_SESSION['score']=$score;
$_SESSION['false']=$false;
$_SESSION['chars']=$chars;

if($true == count($chars) ){

  $this->db->where('username', $username);
  $q = $this->db->get('users');
  $data = $q->result_array();

  $old_score=$data[0]['credits'];

  $this->db->select('credits');
  $this->db->get('users');
  $this->db->where('username',$username);   
 

  $data = array(
     'credits' =>$score+$old_score 
  );

  $this->db->where('username',$username);
  $this->db->update('users', $data);

  //session_destroy(); 

  unset($_SESSION['name']);
  unset($_SESSION['score']);
  unset($_SESSION['false']);
  unset($_SESSION['chars']);
    echo'<meta http-equiv="refresh" content="5;url= http://localhost/hangman/game" />';
 
  echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal(
    "Mission accomplished!",
    "The new game will start in 5 seconds!",
    "success"
    );';
  echo '}, 1000);</script>';
}

?>
