<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Internship Japan</title>
    <link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/layout.css">
</head>

<?php
include_once("../includes/session.php");
include_once("../includes/connect.php");

$partner_id = $_REQUEST["id"];
?>


<body>
<header>
    <nav>
        <a href="../home.php">Home</a>
        <a href="educational_partners.php">Educational partners</a>
        <a href="profile.php">Profile</a>
        <a href="../php/login/logout.php">Log out</a>
    </nav>
</header>
<div>
    <div class="partner_info">
        <?php

        $stmt = $connection->prepare("SELECT * FROM educational_partners WHERE id='$partner_id'");
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <?php
                echo
                    $result["branch"] . nl2br("\n") .
                    $result["name"] . nl2br("\n") .
                    $result["description"];
            }
        }
        ?>
    </div>
</div>
<div class="dummyDiv">
    In this area of the page one could load detailed maps, contact information of individuals or detailed info of which students
    belong in to this institute.
</div>
</body>
</html>