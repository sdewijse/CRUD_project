<?php
if (isset($_GET["message"])) {
    $message = $_GET["message"];
} else{
    $message = 0;
}

switch ($message) {
    case 1:
        $bericht = "Please fill in your username and/or password.";
        $class = "error_message";
        break;
    case 2:
        $bericht = "You are not a member yet, please register first.";
        $class = "errormessage";
        break;
    case 3:
        $bericht = "You have logged in succesfully.";
        $class = "success_message";
        break;

    default:
        $bericht = "";
        $class   = "";
        break;
}


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Internship Japan</title>
    <link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>


<div class="loginContent">
    <form class="inloggen" action="php/login/login_connect.php" method="post">
        <div class="loginInhoud">
            <p class="inlogTitel">Inloggen</p><br>
            <label>Username</label>
            <input required type="text" name="username" id="username" placeholder="username"/>
            <label>Password</label>
            <input required type="password" name="password" id="password" placeholder="password"/>
        </div>
        <div class="button">
            <input type="submit" name="submit" value="Sign in" id="sign in">
        </div>
    </form>
</div>