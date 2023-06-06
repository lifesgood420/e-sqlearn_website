<?php
include("config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 

    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);

    if ($myusername == "" || $myusername == null || $mypassword == "" || $mypassword == null) {
        $error = "All fields must be filled";
    } else {
        $result = $db->query("SELECT username FROM admin WHERE username = '$myusername'");

        $row = $result->fetch_array(MYSQLI_NUM);
        if ($row[0] == null or $row[0] == "") {
            if ($db->query("INSERT INTO admin (username, passcode, isOnline) VALUES ($myusername, MD5($mypassword), 'active')")) {
                $_SESSION['username'] = $myusername;
                header("location: welcome.php");
            }
            if ($db->errno) {
                $error = $db->errno;
            }
        }
        else{
            $error = "Username already taken";
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
                    <label>Username :</label><input type="text" name="username" class="box" /><br /><br />
                    <label>Password :</label><input type="password" name="password" class="box" /><br /><br />
                    <input type="submit" value=" Submit " /><br />
                </form>

                <div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo @$error; ?></div>

            </div>

        </div>
        <br>
        <a href='login.php'>Belépés</button>

    </div>

</body>

</html>