<?php
//Tilda Källström 2021 Webbutveckling 3 Mittuniversitetet
include_once("includes/config.php");
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    header('location: admin.php');

}
//kontrollera inloggning
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $users = new Users();
    //logga in användare
    if($id = $users->loginUser($username, $password)) {
       //spara session
       $_SESSION['username'] = $username;
      // $_SESSION['email'] = $email;
       $_SESSION['id'] = $id;
       header("Location: admin.php");
    } else {
        $message = "Fel användarnamn/lösenord!";
    }
}
include('includes/header.php');
?>
<div class='welcome'>
    <h1 class='h1top'>Logga in</h1>
</div>
<div class='mainblog'>
<div class="loginform">
<?php
if(isset($_GET['message'])) {
    if($_GET['message'] == "1") { $message = "Du loggade ut"; }
    if($_GET['message'] == "2") { $message = "Du måste logga in"; }
}
if(isset($message)) { echo $message; }
?>
<div class="profile">
<form method="post" action="#" class="regform">
<label for="username">Användarnamn:</label>
<br>
<input type="text" name="username" id="username" class="email">
<br>
<label for="password">Lösenord:</label>
<br>
<input type="password" name="password" class="email" id="password">
<br>
<br>
<input type="submit" value="Logga in" class="btnreg">
</form>

</div>

</div>
</div>
<?php
include('includes/footer.php');
?>