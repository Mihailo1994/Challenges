<?php

require_once('Connection.php');

class Vehicle {

    private $model;
    private $type;
    private $chassisNumber;
    private $productionYear;
    private $registrationNumber;
    private $fuelType;
    private $registrationDate;

    public function setModel ($model) {
        $this->model = $model;
    }

    public function getModel () {
        return $this->model;
    }

    public function setType ($type) {
        $this->type = $type;
    }

    public function getType () {
        return $this->type;
    }
    
    public function setChassisNumber ($chassisNumber) {
        $this->chassisNumber = $chassisNumber;
    }

    public function getChassisNumber () {
        return $this->chassisNumber;
    }

    public function setProductionYear ($productionYear) {
        $this->productionYear = $productionYear;
    }

    public function getProductionYear () {
        return $this->productionYear;
    }

    public function setRegistrationNumber ($registrationNumber) {
        $this->registrationNumber = $registrationNumber;
    }

    public function getRegistrationNumber () {
        return $this->registrationNumber;
    }

    public function setFuelType ($fuelType) {
        $this->fuelType = $fuelType;
    }

    public function getFuelType () {
        return $this->fuelType;
    }

    public function setRegistrationDate ($registrationDate) {
        $this->registrationDate = $registrationDate;
    }

    public function getRegistrationDate () {
        return $this->registrationDate;
    }

    public function searchRegistrationNumber ($registrationNumber) {

        $connectionObj = new Connection();
        $connection = $connectionObj->getConnection();

        $sqlSelect = $connection->prepare("SELECT vehicle_models.vehicle_model, vehicle_types.vehicle_type, vehicle_chassis_number,vehicle_production_year, registration_number, fuel_type.fuel_type, registration_to FROM vehicles join vehicle_types on vehicle_types.id = vehicles.vehicle_type join vehicle_models on vehicle_models.id = vehicles.vehicle_model join fuel_type on fuel_type.id = vehicles.fuel_type where registration_number = :registrationNumber");

        $sqlSelect->bindParam("registrationNumber", $registrationNumber);

        $sqlSelect->execute();
        if ($sqlSelect->rowCount() == 0) {
            $result = 'The licese plate does not exist';
            $connectionObj->destroy();
            return $result;
        } else {
            $result = $sqlSelect->fetch();
            $connectionObj->destroy();
            return $result;
        }

        

    }

    public function insertVehicle() {
        
        $connectionObj = new Connection();
        $connection = $connectionObj->getConnection();

        $data = [
            'vehicle_model' => $this->model,
            'vehicle_type' => $this->type,
            'vehicle_chassis_number' => $this->chassisNumber,
            'vehicle_production_year' => $this->productionYear,
            'registration_number' => $this->registrationNumber,
            'fuel_type' => $this->fuelType,
            'registration_to' => $this->registrationDate,
        ];
        
        $sqlSelect = $connection->prepare("SELECT * FROM vehicles where vehicle_chassis_number = '{$this->chassisNumber}'");
        $sqlSelect->execute();
        if ($sqlSelect->rowCount() == 0) {
            $sqlInsert = $connection->prepare("INSERT INTO vehicles (vehicle_model, vehicle_type, vehicle_chassis_number, vehicle_production_year, registration_number, fuel_type, registration_to) VALUES (:vehicle_model, :vehicle_type, :vehicle_chassis_number, :vehicle_production_year, :registration_number, :fuel_type, :registration_to)");
            $sqlInsert->execute($data);
            $connectionObj->destroy();
            header("Location:admin-page.php?Success=Vehicle successfully entered!");
        } else {
            header("Location:admin-page.php?Err=Vehicle with this chassis number already exists!");
            $connectionObj->destroy();
        }
    }

    public function extendRegistration($id) {

        $connectionObj = new Connection();
        $connection = $connectionObj->getConnection();

        $sqlSelectVehicle = $connection->prepare("SELECT registration_to FROM vehicles WHERE id = $id");
        $sqlSelectVehicle->execute();
        $vehicle = $sqlSelectVehicle->fetch();

        if (strtotime($vehicle['registration_to']) > strtotime('now') && strtotime($vehicle['registration_to']) < strtotime('+30 days')) {
            $newRegistrationDate = date('Y-m-d', strtotime($vehicle['registration_to'] . " + 1 year"));
        } elseif ((strtotime($vehicle['registration_to']) <= strtotime('now'))) {
            $newRegistrationDate = date('Y-m-d', strtotime("now" . " + 1 year"));
        }


        $sqlExtend = $connection->prepare("UPDATE vehicles SET registration_to = '{$newRegistrationDate}' WHERE vehicles.id = {$_POST['id']}");
        $sqlExtend->execute();

        $connectionObj->destroy();

        header("Location: admin-page.php");

    }

    public function deleteVehicle($id) {

        $connectionObj = new Connection();
        $connection = $connectionObj->getConnection();

        $sqlDelete = $connection->prepare("DELETE FROM vehicles WHERE id = $id");
        $sqlDelete->execute();

        $connectionObj->destroy();

        header("Location: admin-page.php?Delete=Successfully deleted");
    }

    public function editVehicle($id) {

        $connectionObj = new Connection();
        $connection = $connectionObj->getConnection();

        $data = [
            'vehicle_model' => $this->model,
            'vehicle_type' => $this->type,
            'vehicle_chassis_number' => $this->chassisNumber,
            'vehicle_production_year' => $this->productionYear,
            'registration_number' => $this->registrationNumber,
            'fuel_type' => $this->fuelType,
            'registration_to' => $this->registrationDate,
        ];
        
        $sqlSelect = $connection->prepare("SELECT * FROM vehicles where vehicle_chassis_number = '{$this->chassisNumber}' AND id != $id");
        $sqlSelect->execute();
        if ($sqlSelect->rowCount() == 0) {
            $sqlEdit = $connection->prepare("UPDATE vehicles SET vehicle_model = :vehicle_model, vehicle_type = :vehicle_type, vehicle_chassis_number = :vehicle_chassis_number, vehicle_production_year = :vehicle_production_year, registration_number = :registration_number, fuel_type = :fuel_type, registration_to = :registration_to WHERE vehicles.id = $id");
            $sqlEdit->execute($data);
            $connectionObj->destroy();
        } else {
            $connectionObj->destroy();
            header("Location:admin-page.php?Err=Vehicle with this chassis number already exists!");
            die();
        }        
        header("Location:admin-page.php?Edit=Successfully edited");
    }

    public function searchVehicle($input) {

        $connectionObj = new Connection();
        $connection = $connectionObj->getConnection();
    
        $sqlSelectSearch = $connection->prepare("SELECT vehicles.id, vehicles.vehicle_model, vehicle_models.vehicle_model, vehicle_types.vehicle_type, vehicle_chassis_number, vehicle_production_year, registration_number, fuel_type.fuel_type, registration_to FROM vehicles JOIN vehicle_types ON vehicle_types.id = vehicles.vehicle_type JOIN vehicle_models ON vehicle_models.id = vehicles.vehicle_model JOIN fuel_type ON fuel_type.id = vehicles.fuel_type WHERE vehicle_models.vehicle_model LIKE :search OR vehicles.registration_number LIKE :search OR vehicles.vehicle_chassis_number LIKE :search");
        $search = "%{$input}%";
        $sqlSelectSearch->bindParam("search", $search);
        $sqlSelectSearch->execute();
        $vehicles = $sqlSelectSearch->fetchAll();
        
        $connectionObj->destroy();

        return $vehicles;

    }

    public function selectAllVehicles() {

        $connectionObj = new Connection();
        $connection = $connectionObj->getConnection();

        $sqlSelectVehicles = $connection->prepare("SELECT vehicles.id, vehicle_models.vehicle_model, vehicle_types.vehicle_type, vehicle_chassis_number, vehicle_production_year, registration_number, fuel_type.fuel_type, registration_to  FROM vehicles 
        JOIN vehicle_types ON vehicle_types.id = vehicles.vehicle_type 
        JOIN vehicle_models ON vehicle_models.id = vehicles.vehicle_model 
        JOIN fuel_type ON fuel_type.id = vehicles.fuel_type ORDER BY vehicles.id");
        $sqlSelectVehicles->execute();
        $vehicles = $sqlSelectVehicles->fetchAll();

        $connectionObj->destroy();

        return $vehicles;

    }

    public function searchVehicleForEdit() {

        $connectionObj = new Connection();
        $connection = $connectionObj->getConnection();

        $sqlEditSearch = $connection->prepare("SELECT * FROM vehicles JOIN vehicle_types ON vehicle_types.id = vehicles.vehicle_type JOIN vehicle_models ON vehicle_models.id = vehicles.vehicle_model JOIN fuel_type ON fuel_type.id = vehicles.fuel_type WHERE vehicles.id = {$_POST['id']}");
        $sqlEditSearch->execute();
        $vehicle = $sqlEditSearch->fetch();

        $connectionObj->destroy();

        return $vehicles;

    }

    public function selectVehicleModels() {

        $connectionObj = new Connection();
        $connection = $connectionObj->getConnection();

        $sqlSelectVehicleModels = $connection->prepare("SELECT * FROM vehicle_models");
        $sqlSelectVehicleModels->execute();
        $vehicleModels = $sqlSelectVehicleModels->fetchAll();

        $connectionObj->destroy();

        return $vehicleModels;
    }

    public function selectVehicleTypes() {

        $connectionObj = new Connection();
        $connection = $connectionObj->getConnection();

        $sqlSelectVehicleTypes = $connection->prepare("SELECT * FROM vehicle_types");
        $sqlSelectVehicleTypes->execute();
        $vehicleTypes = $sqlSelectVehicleTypes->fetchAll();

        $connectionObj->destroy();

        return $vehicleTypes;
    }

    public function selectFuelTypes() {

        $connectionObj = new Connection();
        $connection = $connectionObj->getConnection();

        $sqlSelectFuelType = $connection->prepare("SELECT * FROM fuel_type");
        $sqlSelectFuelType->execute();
        $fuelType = $sqlSelectFuelType->fetchAll();

        $connectionObj->destroy();

        return $fuelType;
    }
    
    

}

?>