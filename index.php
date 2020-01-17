<?php
session_start();
require('config.php');
require('sys/functions.php');

if (isset($_FILES['datei']) && isset($_POST['submit_file'])) {

    $AllowedTypes = array("application/x-zip-compressed");

    if (!in_array($_FILES["datei"]["type"], $AllowedTypes)) {
        header("Location: /?invalid&type");
        exit();
    }
    if ($_FILES["datei"]["size"] > $Config['FileSize']) {
        header("Location: /?invalid&size");
        exit();
    }

    $Data = CheckZIP($_FILES['datei']['tmp_name']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>LuaCheck</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#UltimateNav">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">LuaCheck</a>
            </div>
            <div class="collapse navbar-collapse" id="UltimateNav">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="./">Home</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                </ul>

            </div>
        </div>
    </nav>


    <div class="container">
        <?php

        include("include/" . maininclude());

        ?>
        <div class="pull-right">
            <br>LuaCheck by <a href="https://github.com/JustPlayerDE" target="_blank">JustPlayerDE</a>
        </div>
    </div>

    <script type="text/javascript">
        function toggle_visibility(id) {
            var e = document.getElementById(id);
            if (e.style.display == 'block')
                e.style.display = 'none';
            else
                e.style.display = 'block';
        }
    </script>
</body>

</html>