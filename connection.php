<?php
  $uri = "mongodb://test_user:qwerty1234@ds127731.mlab.com:27731/studlogin";
  $conn = new MongoClient($uri);
  $db = $conn->selectDB('studlogin');
 ?>
