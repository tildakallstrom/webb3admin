<?php
//Tilda Källström 2021 Webbutveckling 3 Mittuniversitetet
class Users {
    //properties
    private $db;

    //konstruktor
    function __construct()
    {
       //connect to db
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if ($this->db->connect_errno > 0) {
            die("Fel vid anslutning: " . $this->db->connect_error);
        }
    }
    //register user
    public function registerUser($username, $email, $password) {
        // $username = $this->db->real_escape_string($username);
         $password = $this->db->real_escape_string($password);
        // $hash = password_hash($password, PASSWORD_DEFAULT);
    
         //hash password
        // $salt = '$2hy7Stk9dL09JNHGFT657sjhfrhUkUhhft$';
        //den hash som tillslut verkar fungera på miun
         $password = password_hash($password, PASSWORD_DEFAULT);
         //$hash = password_hash($password, PASSWORD_DEFAULT);
         //sql question
         $sql = "INSERT INTO users(username, email, password)VALUES('$username', '$email', '$password')";
         $result = $this->db->query($sql);
         
         return $result;
     }

    // login user
    public function loginUser($username, $password) {
        $username = $this->db->real_escape_string($username);
        $password = $this->db->real_escape_string($password);
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $this->db->query($sql);
 //om resultatet är störra än 0, gå vidare
        if($result->num_rows > 0) {
           $row = $result->fetch_assoc();
           $storedpassword = $row['password'];
             
           //check if hashed password is correct
           if($storedpassword == crypt($password, $storedpassword)) {
              return $row['id'];
           } else {
              return false;
           }
        } else {
          return false;
        }
    }

     //check if username exists
     public function isUsernameTaken($username) {
        $username = $this->db->real_escape_string($username);
         //sql to select username
        $sql = "SELECT username FROM users WHERE username='$username'";
        $result = $this->db->query($sql);
//om resultate är större än 0....
        if($result->num_rows > 0) {
           return true;
        } else {
            return false;
        }
    } 
    //check if username exists
    public function isEmailTaken($email) {
        $email = $this->db->real_escape_string($email);
         //sql to select username
        $sql = "SELECT email FROM users WHERE email='$email'";
        $result = $this->db->query($sql);
//om resultate är större än 0....
        if($result->num_rows > 0) {
           return true;
        } else {
            return false;
        }
    } 
    

//hämta användare från id
    public function getUserFromId($id)
    {
        $id = intval($id);
        $sql = "SELECT * FROM users WHERE id=$id;";
        $result = $this->db->query($sql);
        $row = mysqli_fetch_array($result);
        return $row;
    } 


 public function setEmail($email)
 {   $email = $_POST['email'];
  //kollar så att namn är korrekt ifyllt och att inte tex Tommis scripttaggar funkar
     if (filter_var($email)) {
         $email = strip_tags(html_entity_decode($email), '');
         $this->email = $this->db->real_escape_string($email);

         return true;
     } else {
         return false;
     }
 }
 
      //radera användare
 public function deleteUser($username) {
  $username = $_SESSION['username'];
 $sql = "DELETE FROM users WHERE username='$username';";

 $result = $this->db->query($sql);
 return $result;

}

  //hämta blogpost via postid
  public function getUserFromUsername($username)
  {
    $username = $_SESSION['username'];
      $sql = "SELECT * FROM users WHERE username = '$username';";
      $result = $this->db->query($sql);
      $row = mysqli_fetch_array($result);
      return $row;
  }
}