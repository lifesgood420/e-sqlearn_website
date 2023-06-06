<?php
include("config.php");
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 

    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);

    if ($myusername == "" || $myusername == null || $mypassword == "" || $mypassword == null) {
        $error = "All fields must be filled";
    } else {
        $result = $db->query("SELECT * FROM admin WHERE felh = '$myusername' and jelsz = MD5('$mypassword')");
        $row = $result->fetch_array(MYSQLI_NUM);
        if ($row != null) {
            if ($row[0] != $myusername || $row[1] != md5($mypassword)) {
                $error = "Your Login Name or Password is invalid";
            } else {
                $count = mysqli_num_rows($result);
                // If result matched $myusername and $mypassword, table row must be 1 row

                if ($count == 1) {
                    $_SESSION['username'] = $myusername;
                    $db->query("UPDATE `admin` SET felh=felh, jelsz=jelsz, mail=mail, csatl=1 WHERE felh='$myusername'");
                    header("location: welcome.php");
                } else {
                    $error = "Too many accounts";
                }
            }
        }
    }
}
?>
<html>

<head>
    <title>Login Page</title>

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
    <script>
        window.onload = function() {
            history.replaceState("", "", "/login.php");
        }
    </script>

    <div align="center">
        <div style="width:300px; border: solid 1px #333333; " align="left">
            <div style="background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

            <div style="margin:30px">

                <form action="" method="post">
                    <label>Username :</label><input type="text" name="username" class="box" /><br /><br />
                    <label>Password :</label><input type="password" name="password" class="box" /><br /><br />
                    <input type="submit" value=" Submit " /><br />
                </form>

                <div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

            </div>

        </div>
        <br>
        <a href='reg.php'>Regisztrálás</button>

    </div>

</body>

</html>