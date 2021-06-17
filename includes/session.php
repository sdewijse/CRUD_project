<?php
session_start();

if (isset($_SESSION["id"]) && isset($_SESSION["rol"])) {
    $sessionID  = $_SESSION["id"];
    $sessionRol = $_SESSION["role"];
} else {
    $sessionID  = "unkown";
    $sessionRol = "unkown";
}