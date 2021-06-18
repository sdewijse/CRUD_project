<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Internship Japan</title>
    <link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/layout.css">
</head>

<?php include_once("../includes/session.php");?>
<?php include_once("../includes/connect.php");?>

<body>
<header>
    <nav>
        <a href="admin_home.php">Home</a>
        <a href="admin_edu_partners.php">Educational partners</a>
        <a href="admin_profile.php">Profile</a>
    </nav>
</header>
<div id="Companies">
    <table class="tableSearch">
        <tr>
            <td class="searchBar"><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Type in the name of one of our partners."></td>
        </tr>
    </table>

    <div id="Companies" class="tabcontent">
        <table id="myTable">
            <tr class="header">
                <th style="width:40%;">Name</th>
                <th style="width:25%;">address</th>
            </tr>

            <?php
            $stmt_edu = $connection->prepare("SELECT * FROM educational_partners ORDER BY name");
            $stmt_edu->execute();
            if($stmt_edu->rowCount() > 0) {
                while ($result_edu = $stmt_edu->fetch(PDO::FETCH_ASSOC)) {
                    echo '
                
                <tr>
                    <td><a class="page_link" href=admin_partner_detail.php?id=' . $result_edu["id"] . '>' . $result_edu["name"] . '</a></td>
                    <td><a class="page_link" href=admin_partner_detail.php?id=' . $result_edu["id"] . '>' . $result_edu["branch"] . '</a></td>
                </tr>';
                }
            }
            ?>
        </table>
        <script>
            function myFunction() {
                // Declare variables
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");

                // Loop through all table rows, and hide those who don't match the search query
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>
</body>
<?php
