<?php

include_once("includes/connect.php");
include_once("includes/session.php");

$Form_companyName=$_POST['companyName'];
$Form_companyAddress=$_POST['companyAddress'];
$Form_companyMail=$_POST['companyMail'];





$stmt_cpAdd = $connection->prepare("INSERT INTO companies (user_id, companyName, companyAddress, companyMail)
VALUES ('', '$Form_companyName','$Form_companyAddress','$Form_companyMail')");
$stmt_cpAdd->execute();

if($stmt_cpAdd->rowCount() > 0) {
    echo "<span><a href=../admin_home.php>Company added</a></span>";
    header("Location: ../admin_home?company_insert.php");


}