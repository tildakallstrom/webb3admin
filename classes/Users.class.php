<?php
class Users
{
    private $db;

    function __construct()
    {
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if ($this->db->connect_errno > 0) {
            die("Fel vid anslutning: " . $this->db->connect_error);
        }
    }

    public function registerUser($username, $email, $password)
    {
        $password = $this->db->real_escape_string($password);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(username, email, password)VALUES('$username', '$email', '$password')";
        $result = $this->db->query($sql);
        return $result;
    }

    public function loginUser($username, $password)
    {
        $username = $this->db->real_escape_string($username);
        $password = $this->db->real_escape_string($password);
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $storedpassword = $row['password'];
            if ($storedpassword == crypt($password, $storedpassword)) {
                return $row['id'];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function isUsernameTaken($username)
    {
        $username = $this->db->real_escape_string($username);
        $sql = "SELECT username FROM users WHERE username='$username'";
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function isEmailTaken($email)
    {
        $email = $this->db->real_escape_string($email);
        $sql = "SELECT email FROM users WHERE email='$email'";
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserFromId($id)
    {
        $id = intval($id);
        $sql = "SELECT * FROM users WHERE id=$id;";
        $result = $this->db->query($sql);
        $row = mysqli_fetch_array($result);
        return $row;
    }


    public function setEmail($email)
    {
        $email = $_POST['email'];
        if (filter_var($email)) {
            $email = strip_tags(html_entity_decode($email), '');
            $this->email = $this->db->real_escape_string($email);
            return true;
        } else {
            return false;
        }
    }

    public function deleteUser($username)
    {
        $username = $_SESSION['username'];
        $sql = "DELETE FROM users WHERE username='$username';";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getUserFromUsername($username)
    {
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM users WHERE username = '$username';";
        $result = $this->db->query($sql);
        $row = mysqli_fetch_array($result);
        return $row;
    }
}
