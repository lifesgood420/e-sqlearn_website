<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/base-style.css">
    <link rel="shortcut icon" href="media/e-sqlearn.ico" type="image/x-icon">

    <title>E-SQLearn | Főoldal</title>
</head>

<?php
include_once ("session.php");
    if ($login_session == null){
        $login_session = "";
    }
?>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="js/decors.js"></script>
    
    <nav class="navbar navbar-fixed-top bg-body-tertiary container-fluid">
        <a class="navbar-brand" href="#"><img src="media/e-sqlearn.ico" width="10%"> | E-SQLearn</a>
        <div id="navbar-rightside">
            <a id="currentAccount" style="margin-right: 5px;">
                <img src="media/account_icon.png" width="25px" style="filter: invert();" alt="">
                <?php echo $login_session ?>
            </a>

            <button class="navbar-toggler-custom" onclick="toggleButtons()">
                <img class="navbar-toggler-icon" style="filter: invert();" src="media/navbar-toggle.png">
            </button>
        </div>
    </nav>

    <div class="dropdownWindow" id="dDownWind">
        <a class="link-to-button dDownButton" href='reg.php' id='regGomb'>Regisztráció</a>
        <a class="link-to-button dDownButton" href='login.php' id="logGomb">Belépés</a>
        <a class="link-to-button dDownButton" href='#' id="setGomb">Fiók *WIP*</a>
        <a class="link-to-button dDownButton" href='#' id="tmeGomb">Téma: világos *WIP*</a>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                asd
            </div>
            <div class="col-md-6">
                asd
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                asd
            </div>
            <div class="col-md-6">
                asd
            </div>
        </div>
    </div>
</body>

</html>