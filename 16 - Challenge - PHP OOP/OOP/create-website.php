<?php
require_once('functions.php');
require_once __DIR__ . "/Classes/Company.php";
require_once __DIR__ . "/Classes/Connection.php";

checkRequest();
session_start();

$data = [
    'coverImageUrl' => $_POST['coverImageUrl'],
    'title' => $_POST['title'],
    'subtitle' => $_POST['subtitle'],
    'aboutYou' => $_POST['aboutYou'],
    'telephoneNumber' => $_POST['telephoneNumber'],
    'companyLocation' => $_POST['companyLocation'],
    'business' => $_POST['business'],
    'imageOneUrl' => $_POST['imageOneUrl'],
    'descriptionOne' => $_POST['descriptionOne'],
    'imageTwoUrl' => $_POST['imageTwoUrl'],
    'descriptionTwo' => $_POST['descriptionTwo'],
    'imageThreeUrl' => $_POST['imageThreeUrl'],
    'descriptionThree' => $_POST['descriptionThree'],
    'descriptionCompany' => $_POST['descriptionCompany'],
    'linkedin' => $_POST['linkedin'],
    'facebook' => $_POST['facebook'],
    'twitter' => $_POST['twitter'],
    'google' => $_POST['google']
];

$company = new Company;
$company->setData($data);
$companyId = $company->insertIntoDatabase();
// $companyId = $company->selectId();


header("Location:page3.php?id=$companyId");







?>