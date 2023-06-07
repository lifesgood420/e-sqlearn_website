<?php
include_once("config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 

    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);

    if ($myusername == "" || $myusername == null || $mypassword == "" || $mypassword == null) {
        $errBox = "All fields must be filled";
    } else {
        $result = $db->query("SELECT * FROM admin WHERE felh = '$myusername' and jelsz = MD5('$mypassword')");
        $row = $result->fetch_array(MYSQLI_NUM);
        if ($row != null) {
            if ($row[0] != $myusername || $row[1] != md5($mypassword)) {
                $errBox = "Your Login Name or Password is invalid";
            } else {
                $count = mysqli_num_rows($result);
                // If result matched $myusername and $mypassword, table row must be 1 row

                if ($count == 1) {
                    $_SESSION['username'] = $myusername;
                    $db->query("UPDATE `admin` SET felh=felh, jelsz=jelsz, mail=mail, csatl=1 WHERE felh='$myusername'");
                    header("location: welcome.php");
                    $errBox = "";
                } else {
                    $errBox = "Too many accounts";
                }
            }
        } else {
            $errBox = "Your Login Name or Password is invalid";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/base-style.css">
    <link rel="stylesheet" href="./css/login-style.css">
    <link rel="shortcut icon" href="media/e-sqlearn.ico" type="image/x-icon">

    <title>E-SQLearn | Belépés</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/decors.js"></script>
    <script>
        window.onload = function() {
                history.replaceState("", "", "/login.php");
        }
    </script>

    <div class="navbar navbar-fixed-top bg-body-tertiary container-fluid">
        <a class="navbar-brand" href="index.php"><img src="media/e-sqlearn.ico" width="10%"> | E-SQLearn</a>
        <div id="navbar-rightside">
            <a id="currentAccount" style="margin-right: 5px;">
                <img src="media/account_icon.png" width="25px" style="filter: invert();" alt="">
            </a>

            <button class="navbar-toggler-custom" onclick="toggleButtons()">
                <img class="navbar-toggler-icon" style="filter: invert();" src="media/navbar-toggle.png">
            </button>
        </div>
    </div>

    <div class="dropdownWindow" id="dDownWind">
        <a class="link-to-button dDownButton" href="reg.php" id="regGomb">Regisztráció</a>
        <a class="link-to-button dDownButton" href="#" id="logGomb">Belépés</a>
        <a class="link-to-button dDownButton" href="#" id="setGomb">Fiók *WIP*</a>
        <a class="link-to-button dDownButton" href="#" id="tmeGomb">Téma: világos *WIP*</a>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <div id="loginForm">
                    <label>Login</label>
                    <form action="login.php" method="post">
                        <input type="text" name="username" class="box" placeholder="username" /><br /><br />
                        <input type="password" name="password" class="box" placeholder="password" /><br /><br />
                        <input type="submit" value=" Submit " /><br />
                    </form>
                </div>

                <div id="errorDiv"><?php echo $errBox; ?></div>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
</body>

</html>