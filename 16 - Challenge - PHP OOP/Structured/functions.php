<?php

function checkRequest() {
    if($_SERVER['REQUEST_METHOD'] != "POST") {
        header("Location:page2.php");
    } 
}


function emptyFields($input) {
    if (empty($input)) {
        header("Location:Page2.php?error=All inputs are required!");
        die();
    }
}



?>