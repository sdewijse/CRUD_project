<?php

$update_name = $_REQUEST['updateCompName'];
$update_location = $_REQUEST['updateCompLocation'];
$update_email = $_REQUEST['updateCompMail'];
$update_compID = $_REQUEST['id'];

include_once "../../includes/connect.php";


$stmt_cpUpdate = $connection->prepare("UPDATE companies SET company_name = '$update_name', company_location = '$update_location', company_mail = '$update_email'");
$stmt_cpUpdate->execute();

if($stmt_cpUpdate->rowCount() > 0) {
    echo "<span ><a href=../admin_companies.php?id=". $update_compID . ">Company info updated</a></span>";
    header("Location: ../admin_companies.php?id=". $update_compID . "");
    exit();
}else{
    echo 'Er ging iets mis.';
}
?>