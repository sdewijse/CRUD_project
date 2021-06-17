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
        <a href="admin_home.php">Home</a>
        <a href="admin_edu_partners.php">Educational partners</a>
        <a href="admin_profile.php">Profile</a>
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
</body>
</html>