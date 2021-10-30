<?php
//Tilda Källström 2021 Webbutveckling 3 Mittuniversitetet
//Ladda in klasser
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.class.php';
});

/*
$host = "tildakallstrom.se.mysql";
$user = "tildakallstrom_seadmin";
$pass = "adminadmin";
$dbb = "tildakallstrom_seadmin";
$conn = mysqli_connect($host, $user, $pass, $dbb); */

// Db settings remote
/*define("DBHOST", "tildakallstrom.se.mysql");
define("DBUSER", "tildakallstrom_seadmin");
define("DBPASS", "adminadmin");
define("DBDATABASE", "tildakallstrom_seadmin");
*/
/*
define("DBHOST", "localhost");
define("DBUSER", "admin");
define("DBPASS", "adminadmin");
define("DBDATABASE", "admin");
*/
define("DBHOST", "studentmysql.miun.se");
define("DBUSER", "tika1900");
define("DBPASS", "y8rwy9QKTW");
define("DBDATABASE", "tika1900");

// Start session
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}