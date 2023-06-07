<?php
include_once("config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);
    $mymail = "'" .mysqli_real_escape_string($db, $_POST['email']). "'";

    if ($myusername == "" || $myusername == null || $mypassword == "" || $mypassword == null || $mymail == "" || $mymail == null) {
        $errBox = "All fields must be filled";
    } else {
        $result = $db->query("SELECT felh FROM admin WHERE felh = '$myusername'");
        $row = $result->fetch_array(MYSQLI_NUM);
        if ($row == null or $row[0] == "") {
            if ($db->query("INSERT INTO admin (`felh`, `jelsz`, `mail`, `csatl`) VALUES ('$myusername', MD5('$mypassword'), $mymail, '1')")) {
                $_SESSION['username'] = $myusername;
                header("location: welcome.php");
            }
            if ($db->errno) {
                $errBox = $db->errno;
            }
        }
        else{
            $errBox = "Username already taken";
        }
    }
}
?>
<html>

<head>
    <title>Reg Page</title>

    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
        }

        label {
            font-weight: bold;
            width: 100px;
            font-size: 14px;
        }

        .box {
            border: #666666 solid 1px;
        }
    </style>

</head>

<body bgcolor="#FFFFFF">

    <div align="center">
        <div style="width:300px; border: solid 1px #333333; " align="left">
            <div style="background-color:#333333; color:#FFFFFF; padding:3px;"><b>Sign up</b></div>

            <div style="margin:30px">

                <form action="" method="post">
                    <label>Username :</label><input type="text" name="username" class="box" style="width: 100%"/><br /><br />
                    <label>Email :</label><input type="email" name="email" class="box" style="width: 100%"/><br /><br />
                    <label>Password :</label><input type="password" name="password" class="box" style="width: 100%" /><br /><br />
                    <input type="submit" value=" Submit " /><br />
                </form>

                <div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo @$errBox; ?><br><?php echo $result?></div>

            </div>

        </div>
        <br>
        <a href='login.php'>Belépés</button>

    </div>

</body>

</html>