<?php
require_once('functions.php');

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

foreach ($data as $key => $value) {
    $_SESSION[$key] = $value;
}

foreach($data as $value) {
    emptyFields($value);
}


$host = 'localhost';
$dbName = 'company';
$user = 'root';
$password = '';

$connection = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);

$query = "INSERT INTO company (cover_image_url, title, subtitle, about_you, telephone_number, company_location, business, image_one_url, description_one, image_two_url, description_two, image_three_url, description_three, company_description, linkedin, facebook, twitter, google) VALUES (:coverImageUrl, :title, :subtitle, :aboutYou, :telephoneNumber, :companyLocation, :business, :imageOneUrl, :descriptionOne, :imageTwoUrl, :descriptionTwo, :imageThreeUrl, :descriptionThree, :descriptionCompany, :linkedin, :facebook, :twitter, :google)";

$sql = $connection->prepare($query);
$sql->execute($data);

$queryId = "SELECT id FROM company WHERE title = '{$data['title']}' AND subtitle = '{$data['subtitle']}' AND company_location = '{$data['companyLocation']}'";

$sqlId = $connection->prepare($queryId);
$sqlId->execute();

$id = $sqlId->fetchAll(PDO::FETCH_ASSOC);
$companyId = $id[0]['id'];



header("Location:page3.php?id=$companyId");







?>