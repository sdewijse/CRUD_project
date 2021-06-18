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
include_once("../includes/connect.php");

$company_id = $_REQUEST["id"];
$GLOBALS['companyID'] = $company_id;
?>


<body>
<header>
    <nav>
        <a href="admin_home.php">Home</a>
        <a href="admin_edu_partners.php">Educational partners</a>
        <a href="admin_profile.php">Users</a>
        <a href="../php/login/logout.php">Log out</a>
    </nav>
</header>
<div>
    <div class="company_info">
        <?php

        $stmt = $connection->prepare("SELECT * FROM companies WHERE id='$company_id'");
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <?php
                echo


                    "<div class='updateCompany' onclick='openUpdateForm()'>Update the information</div><br>" .
                    $result["company_name"] . nl2br("\n") . nl2br("\n") .
                    $result["company_location"] . nl2br("\n") . nl2br("\n") .
                    $result["company_mail"] . nl2br("\n") . nl2br("\n") . nl2br("\n") .
                    "<div class='deleteCompany' onclick='openDeleteForm()'>Delete...?</div>";

                $updatedName = $result["company_name"];
                $updatedLocation = $result["company_location"];
                $updatedMail = $result["company_mail"];
            }
        }
        ?>
    </div>
    <div class="dummyDiv">
        In this area of the page one could load detailed maps, contact information of individuals or detailed info of which students
        belong in to this institute.
    </div>
    <div class="form-popup" id="compUpdate">
        <form action="admin_php/update_company.php?id=<?php echo $company_id; ?>"
              class="form-container" method="post">
            <h1>Update klant</h1>

            <label for="updateCustName"><b>Name</b></label>
            <input type="text" placeholder="Fill in the new name." name="updateCompName"
                   value="<?php echo $updatedName; ?>" required>

            <label for="updateCustAddress"><b>Address</b></label>
            <input type="text" placeholder="Fill in the new location." name="updateCompLocation"
                   value="<?php echo $updatedLocation; ?>" required>

            <label for="updateCustNumber"><b>E-mail</b></label>
            <input type="text" placeholder="Fill in the new mail address." name="updateCompMail"
                   value="<?php echo $updatedMail; ?>" required>
            <button type="submit" class="btn">Update</button>
            <button type="submit" class="btn cancel" onclick="closeUpdateForm()">Cancel</button>
        </form>
</div>

    <script>
        function openUpdateForm() {
            document.getElementById("compUpdate").style.display = "block";
        }

        function closeUpdateForm() {
            document.getElementById("compUpdate").style.display = "none";
        }
    </script>

    <div class="form-popup" id="deleteForm">
        <form action="admin_php/delete_company.php" class="form-container" method="post">
            <h1>Deleting a company</h1><br>

            <label for="idVerification"><b>Veryfi the company id</b></label>
            <input type="text" placeholder="Fill in the id of this company." name="idToDelete" required>

            <button type="submit" class="btn">Delete. (Warning: this can't be undone.)</button>
            <button type="submit" class="btn cancel" onclick="closeDeleteForm()">Cancel</button>
        </form>
    </div>

    <script>
        function openDeleteForm() {
        document.getElementById("deleteForm").style.display = "block";
        }

        function closeDeleteForm() {
        document.getElementById("deleteForm").style.display = "none";
        }
    </script>
</body>
</html>