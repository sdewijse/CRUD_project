<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Internship Japan</title>
    <link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>


<div class="loginContent">
    <form class="inloggen" action="php/login/login_connect.php" method="post">
        <div class="loginInhoud">
            <p class="inlogTitel">Log in</p><br>
            <label>Username</label><br>
            <input required type="text" name="username" id="username" placeholder="username"/><br>
            <label>Password</label><br>
            <input required type="password" name="password" id="password" placeholder="password"/><br>
        </div>
        <div class="button">
            <input type="submit" name="submit" value="Sign in" id="sign in">
        </div>
    </form>
</div>