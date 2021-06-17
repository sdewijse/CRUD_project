<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Internship Japan</title>
    <link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="../css/popup_form.css">
</head>

<?php
include_once("../includes/session.php");
include_once("../includes/connect.php");?>

<body>

<header>
    <nav>
        <a href="admin_home.php">Home</a>
        <a href="admin_edu_partners.php">Educational partners</a>
        <a href="admin_profile.php">Users</a>
    </nav>
</header>

<p>Welcome to Internship Japan, please select one of the available search options to continue.</p>
<div class="add_company" onclick="openForm()">
    Add company<br>
</div>
<div class="form-popup" id="myForm">
    <form action="admin_php/add_company.php" class="form-container" method="post">
        <h1>Add company</h1><br>

        <label for="companyName"><b>Company name</b></label>
        <input type="text" placeholder="Fill in the company name." name="companyName" required>

        <label for="companyAddress"><b>Company address</b></label>
        <input type="text" placeholder="Fill in the company address." name="companyAddress" required>

        <label for="companyMail"><b>Company mail</b></label>
        <input type="text" placeholder="Fill in the company mail." name="companyMail" required>

        <button type="submit" class="btn">Add</button>
        <button type="submit" class="btn cancel" onclick="closeForm()">Cancel</button>
    </form>
</div>

<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>

<div id="Companies" class="tabcontent">
    <table class="companyTable">
        <tr>
            <td class="searchBar"><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Look a company up."></td>
        </tr>
    </table>

    <div id="Companies" class="tabcontent">
        <table id="myTable">
            <tr class="header">
                <th style="width:40%;">Name</th>
                <th style="width:25%;">E-mail</th>
            </tr>

            <?php
            $stmt_company = $connection->prepare("SELECT * FROM companies ORDER BY company_name");
            $stmt_company->execute();
            if($stmt_company->rowCount() > 0) {
                while ($result_company = $stmt_company->fetch(PDO::FETCH_ASSOC)) {
                    echo '
                
                <tr>
                    <td><a href=pages/company.php?id=' . $result_company["id"] . '>' . $result_company["company_name"] . '</a></td>
                    <td><a href=pages/company.php?id=' . $result_company["id"] . '>' . $result_company["company_mail"] . '</a></td>
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
                table = document.getElementById("companyTable");
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
    </div>

</div>
</body>
</html>