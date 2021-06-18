<?php
if (isset($_GET["message"])) {
    $message = $_GET["message"];
} else{
    $message = 0;
}

switch ($message) {
    case 1:
        $bericht = "Please fill in your username and/or password.";
        $class = "error_message";
        break;
    case 2:
        $bericht = "You are not a member yet, please register first.";
        $class = "errormessage";
        break;
    case 3:
        $bericht = "You have logged in succesfully.";
        $class = "success_message";
        break;

    default:
        $bericht = "";
        $class   = "";
        break;
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Internship Japan</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/layout.css">
</head>

<?php include_once("includes/connect.php");?>

<body>
    <header>
        <nav>
            <a href="home.php">Home</a>
            <a href="pages/educational_partners.php">Educational partners</a>
            <a href="pages/profile.php">Profile</a>
            <a href="php/login/logout.php">Log out</a>
        </nav>
    </header>
    <main>
    <p>Welcome to Internship Japan, please select a company or search for them to continue.</p>

    <div id="Companies">
    <table class="tableSearch">
        <tr>
            <td class="searchBar"><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Zoek een bedrijfsnaam."></td>
        </tr>
    </table>

    <div id="Companies">
    <table id="companyTable">
        <tr class="header">
            <th style="width:40%;">Name</th>
            <th style="width:25%;">Email</th>
        </tr>

        <?php
            $stmt_company = $connection->prepare("SELECT * FROM companies ORDER BY company_name");
            $stmt_company->execute();
            if($stmt_company->rowCount() > 0) {
                while ($result_company = $stmt_company->fetch(PDO::FETCH_ASSOC)) {
                    echo '
                
                <tr>
                    <td><a class="page_link" href=pages/company_detail.php?id=' . $result_company["id"] . '>' . $result_company["company_name"] . '</a></td>
                    <td><a class="page_link" href=pages/company_detail.php?id=' . $result_company["id"] . '>' . $result_company["company_mail"] . '</a></td>
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
    </main>
</body>
</html>
