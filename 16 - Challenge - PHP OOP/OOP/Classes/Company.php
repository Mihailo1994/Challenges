<?php

require_once('Connection.php');


class Company {

    private $data;

    public function setData($data) {
        $this->data = $data;
    }


    public function insertIntoDatabase() {

        foreach ($this->data as $key => $value) {
            $_SESSION[$key] = $value;
        }

        foreach ($this->data as $input) {
            if (empty($input)) {
                header("Location:Page2.php?error=All inputs are required!");
                die();
            }
        }

        $connectionObj = new Connection();
        $connection = $connectionObj->getConnection();
        $query = "INSERT INTO company (cover_image_url, title, subtitle, about_you, telephone_number, company_location, business, image_one_url, description_one, image_two_url, description_two, image_three_url, description_three, company_description, linkedin, facebook, twitter, google) VALUES (:coverImageUrl, :title, :subtitle, :aboutYou, :telephoneNumber, :companyLocation, :business, :imageOneUrl, :descriptionOne, :imageTwoUrl, :descriptionTwo, :imageThreeUrl, :descriptionThree, :descriptionCompany, :linkedin, :facebook, :twitter, :google)";
        $sql = $connection->prepare($query);
        $sql->execute($this->data);
        
        $connectionObj->destroy();
        
    }


    public function selectId() {
        $connectionObj = new Connection();
        $connection = $connectionObj->getConnection();
        $query = "SELECT id FROM `company` ORDER BY id DESC limit 1";
        $sql = $connection->prepare($query);
        $sql->execute();
        $companyData = $sql->fetch(PDO::FETCH_ASSOC);
        $connectionObj->destroy();
        return $companyData['id'];  
    }

    public function getDataFromDatabase($id) {
        $connectionObj = new Connection();
        $connection = $connectionObj->getConnection();
        $query = "SELECT * FROM `company` WHERE id = $id";
        $sql = $connection->prepare($query);
        $sql->execute();
        $companyData = $sql->fetch(PDO::FETCH_ASSOC);   
        return $companyData;
    }


    
}








?>

