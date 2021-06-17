<?php
if (isset($_POST["submit"])) {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        include_once("../../includes/connect_test.php");

        $username = $_POST["username"];
        $password = $_POST["password"];

        $stmt = $connection->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            if($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                session_start();
                $_SESSION["id"]  = $result["username"];
                $_SESSION["role"] = "3";

                header("Location: ../../home.php?message=3");
                exit();
            }
        } else {
            $stmt = $connection->prepare("SELECT * FROM admin WHERE username = :username AND password = :password");
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                if($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                    session_start();
                    $_SESSION["id"]  = $result["admin"];
                    $_SESSION["rol"] = "admin";

                    header("Location: ../../admin/admin_home.php");
                    exit();
                }
            }
            header("Location: ../../index.php?message=2");
            exit();
        }

    } else{
        header("Location: ../../index.php?message=1");
        exit();
    }
} else{
    header("Location: ../../index.php");
    exit();
}