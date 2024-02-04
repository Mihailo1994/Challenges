<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Validated;
use Database\Factories\VehicleFactory;
use App\Http\Resources\VehicleResource;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    public function show(){
        return VehicleResource::collection(Vehicle::all());
    }

    public function create(Request $request){
        $model = $request->input('model');
        $brand = $request->input('brand');
        $plateNumber = $request->input('plateNumber');
        $insuranceDate= $request->input('insuranceDate');

        $validate = Validator::make($request->all(), ['plateNumber' => 'unique:vehicles,plate_number']);

        if($validate->fails()){
            return response()->json('Vehicle number exist in db', 515);
        }

        $vehicle = new Vehicle;
        $vehicle->brand = $brand;
        $vehicle->model = $model;
        $vehicle->plate_number = $plateNumber;
        $vehicle->insurance_date = $insuranceDate;

        if($vehicle->save()){
            return response()->json('Vehicle saved', 200);
        } else {
            return response()->json('Vehicle could not be saved', 515);
        }
    }

    public function edit($id){
        $vehicle = Vehicle::find($id);
        return response()->json($vehicle);
    }

    public function update(Request $request){
        $id = $request->input('id');
        $model = $request->input('model');
        $brand = $request->input('brand');
        $plateNumber = $request->input('plateNumber');
        $insuranceDate= $request->input('insuranceDate');

        $vehicle = Vehicle::find($id);

        $validate = Validator::make($request->all(), ['plateNumber' => [Rule::unique('vehicles', 'plate_number')->ignore($vehicle->id)]]);

        if($validate->fails()){
            return response()->json('Vehicle number exist in db', 515);
        }

        $vehicle->brand = $brand;
        $vehicle->model = $model;
        $vehicle->plate_number = $plateNumber;
        $vehicle->insurance_date = $insuranceDate;

        if($vehicle->save()){
            return response()->json('Vehicle saved', 200);
        } else {
            return response()->json('Vehicle could not be saved', 515);
        }
    }

    public function delete(Request $request){
        $vehicle = Vehicle::find($request->input('id'));
        $vehicle->delete();
    }

}
