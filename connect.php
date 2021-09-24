<?php

    ini_set('display_errors',1);
    error_reporting(E_ALL);
    $db= mysqli_connect('localhost','root','','login_registriation');
   if ($db==false) {
    die("Error connecting" . mysqli_connect_error($db));
   }

    
    