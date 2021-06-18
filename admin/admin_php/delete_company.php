<?php

include_once("../../includes/session.php");
include_once("../../includes/connect.php");


$Form_companyName=$_POST['companyName'];
$Form_companyAddress=$_POST['companyAddress'];
$Form_companyMail=$_POST['companyMail'];
$delete_compID = $_REQUEST['id'];

$stmt_company = $connection->prepare("DELETE FROM companies ORDER BY company_name");
$stmt_company->execute();
if($stmt_company->rowCount() > 0) {
    while ($result_company = $stmt_company->fetch(PDO::FETCH_ASSOC)) {
        echo '
                
                <tr>
                    <td><a class="page_link" href=admin_companies.php?id=' . $result_company["id"] . '>' . $result_company["company_name"] . '</a></td>
                    <td><a class="page_link" href=admin_companies.php?id=' . $result_company["id"] . '>' . $result_company["company_mail"] . '</a></td>
                    <td><a class="page_link" href="admin_php/delete_company.php">Delete?</a></td>
                </tr>';
    }
}
?>