<?php

function checkRequest() {
    if($_SERVER['REQUEST_METHOD'] != "POST") {
        header("Location:page2.php");
    } 
}





?>