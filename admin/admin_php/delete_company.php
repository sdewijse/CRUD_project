<?php

include_once("../../includes/session.php");
include_once("../../includes/connect.php");


$delete_compID = $_REQUEST['idToDelete'];

$stmt_company = $connection->prepare("DELETE FROM companies WHERE id = '$delete_compID'");
$stmt_company->execute();

    echo "<span><a href=../admin_home.php>Company deleted</a></span>";
    header("Location: ../admin_home.php");
?>