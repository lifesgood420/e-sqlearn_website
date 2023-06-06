<?php
   include("session.php");
   
   $db->query("UPDATE `admin` SET `felh`=`felh`, `jelsz`=`jelsz`, `mail`=`mail`, `csatl`=0 WHERE `felh`='$login_session'");

   if(session_destroy()) {
      header("Location: index.html");
   }
?>