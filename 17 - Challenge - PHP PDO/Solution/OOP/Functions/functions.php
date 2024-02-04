<?php

function serverRequest($url) {
    if($_SERVER['REQUEST_METHOD'] != "POST") {
        header("Location:$url");
        die();
    }
}

?>