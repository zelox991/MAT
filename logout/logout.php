<?php
session_start();
session_unset();
session_destroy();


// Redirect to main page
$path_redirect =
  ($_SERVER["HTTP_HOST"] == "localhost") ?
  "location:https://localhost/mat/index.php" : "location:http://vis.cs.ucdavis.edu/~yus/mat/index.php";
header($path_redirect);
?>
