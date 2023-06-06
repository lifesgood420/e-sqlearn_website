<?php
   include("config.php");
   include("session.php");
   
   $db->query("UPDATE `admin` SET username=username, passcode=passcode, isOnline='inactive' WHERE username=$login_session");

   if(session_destroy()) {
      header("Location: index.html");
   }
?>