<?php
  /**
  *@backupGlobals disabled
  *backupStaticAttributes disabled
  */

  require_once 'src/Client.php';
  require_once 'src/Stylist.php';

  $server = 'mysql:host=localhost; db-name=salon_test_db';
  $username = 'root';
  $password = 'root';
  $DB = new PDO($server, $username, $password);


?>
