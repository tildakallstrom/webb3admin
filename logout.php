<?php
//start session to know which session will be destroyed
session_start();
//destroy session, logout
session_destroy();
//send user to index
header("Location: index.php");