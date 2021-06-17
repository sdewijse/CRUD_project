<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Internship Japan</title>
    <link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/home.css">
</head>

<?php
    include_once("includes/session.php");
    include_once("includes/connect.php");

    $company_id = $_POST["id"];
?>


<body>
    <div>
        <div class="customer_info">
            <?php

            $stmt = $connection->prepare("SELECT * FROM companies WHERE id='$company_id'");
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <?php
                    echo
                        $result["company_name"] . nl2br("\n") .
                        $result["company_location"] . nl2br("\n") .
                        $result["company_mail"];
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
