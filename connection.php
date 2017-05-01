<?php
  $uri = 'mongodb://test_user:hellothere@ds127731.mlab.com:27731/studlogin';
  $conn = new MongoClient($uri);
  $db = $conn->selectDB('studlogin');
  //mongodb://<dbuser>:<dbpassword>@ds127731.mlab.com:27731/studlogin
 ?>
