<?php

if($_SERVER['REQUEST_METHOD'] != "POST") {
    header("Location:admin-page.php");
    die();
}
require_once ('db.php');

$id = $_POST['id'];

$sqlDelete = $connection->prepare("DELETE FROM vehicles WHERE id = :id");
$sqlDelete->bindParam("id", $id);
$sqlDelete->execute();

header("Location: admin-page.php?Delete=Successfully deleted");



?>