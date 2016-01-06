<?php
class ModelUsers extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    //******************//
   //      Add         //
  //     User         //
 //******************//

    function saveUser($username, $password,$sex){

      $this->db->insert('users', array('username' => $username ,'password' => $password,'sex' => $sex ));
      header('Location: http://localhost/hangman/index');
    } 

    //******************//
   //      Add         //
  //     word         //
 //******************//

    function save_word($word){

        $this->db->insert('words', array('word' => $word ));
    }

    //******************//
   //  Confirmation    //
  //     User         //
 //******************//  
   
    function confirm_user($username,$password){
      $this->load->library('session');

      $this -> db -> select('*');
      $this -> db -> from('users');
      $this -> db -> where('username',$username);
      $this -> db -> where('password', $password);
      $this -> db -> limit(1);
      $query = $this ->db ->get('');
      foreach ($query->result() as $row){
        if($query -> num_rows() == 1 ){
          $data =array(
                'username' => $row->username,
                'admin'=>$row->is_admin,
                'sex'=> $row->sex
              );
           if ($row->is_admin == 1) {
              $this->session->set_userdata($data);
              header('Location: http://localhost/hangman/game');
            }
            else{
              
            $this->session->set_userdata($data);
            header('Location: http://localhost/hangman/game');
            }
          }
            else{
            header('Location: http://localhost/hangman/login');
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("ERROS!"," There is no exist this record, Please try again!","error");';
            echo '}, 1000);</script>';
            //return false; 
           }
        }
    }

     //*******************//
    //    Display        //
   //     words         //
  //*******************//

  public function get_words(){
    $this->db->select("*");
    $this->db->from('words');
    $query = $this->db->get();
    return $query->result();
  }  

     //*******************//
    //    Display        //
   //     players       //
  //*******************//

  public function get_players(){
    $this->db->order_by("credits","desc");
    $this->db->from('users');
    $query = $this->db->get();
    return $query->result();
  }

   //******************//
  //     Delete       //
 //     word         //
//******************//

  public function delete_word ($id, $image) {
    $row = $this->db->where('id',$id)->get('words')->row();
    $deleted=$this->db->delete('words', array('id' => $id));
    if ($deleted) {
       echo "deleted";
    }else{
        echo "problem";
    }
  }


   //******************//
  //     Update       //
 //       word       //
//******************//

function update_record ($id,$word) {
  $data = array(          
     'word' => $word       
  );
  $this->db->where('id', $id);
  $this->db->update('words', $data);   
}
       
}
?>