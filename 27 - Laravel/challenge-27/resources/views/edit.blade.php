@extends('layout.layout')

@section('title', 'Edit')

@section('content')

    <div class="container-fluid py-5 min-height bg-grey">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-10">
                <div class="border rounded overflow-hidden">
                    <div class="p-3 border-bottom bg-light-subtle">
                        <p class="mb-0">Create</p>
                    </div>
                    <div class="p-3" id="form">
                        <form id="edit-form">
                            <div class="row justify-content-center mb-3">
                                <div class="col-12 col-md-4 d-flex justify-content-md-end mb-md-0 mb-2">
                                    <label for="brand" class="mt-2">Brand</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" id="brand" name="brand" class="form-control">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-4 d-flex justify-content-md-end mb-md-0 mb-2">
                                    <label for="model" class="mt-2">Model</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" id="model" name="model" class="form-control mb-3">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-4 d-flex justify-content-md-end mb-md-0 mb-2">
                                    <label for="plateNumber" class="mt-2">Plate Number</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" id="plateNumber" name="plateNumber" class="form-control mb-3">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-4 d-flex justify-content-md-end mb-md-0 mb-2">
                                    <label for="insuranceDate" class="mt-2">Insurance date</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="date" id="insuranceDate" name="insuranceDate" class="form-control mb-3">
                                    <button class="btn btn-primary">Edit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            let id = {{$id}};
            $.ajax({url: "http://127.0.0.1:8000/api/vehicles/edit/"+id,
                    headers: {'Content-Type': 'application/json'}})
                    .done(function(data){
                        console.log(data)
                        $('#brand').val(data['brand']);
                        $('#model').val(data['model']);
                        $('#plateNumber').val(data['plate_number']);
                        $('#insuranceDate').val(data['insurance_date']);
                    })
                    .fail(function(error){
                        console.log(error)
                    });


            let editForm = $('#edit-form').on('submit', function(e){
                e.preventDefault();
                let model = $('#model').val();
                let brand = $('#brand').val();
                let plateNumber = $('#plateNumber').val();
                let insuranceDate = $('#insuranceDate').val();

                if(model == '' || brand == '' || plateNumber == '' || insuranceDate == '' ){
                    let err = $('<div class="alert alert-danger"><p class="text-center mb-0">All inputs must be filled</p></div>')
                    $('#form').prepend(err);
                    let arr = [$('#model'), $('#brand'), $('#plateNumber'), $('#insuranceDate')];
                    arr.forEach(element =>{
                        element.on('focus', function(){
                            err.hide();
                        })
                    })
                } else {
                    $.ajax({url: "http://127.0.0.1:8000/api/vehicles/update",
                            method: 'POST',
                            headers: {'Content-Type': 'application/json'},
                            data: JSON.stringify({id, model, brand, plateNumber, insuranceDate})
                    }).done(function(data){
                        let route = "{{route('index')}}" ;
                        window.location.replace(route)
                    })
                    .fail(function(error){
                        if(error.status === 515){
                            let errMsg = error.responseJSON;
                            let err = $('<div class="alert alert-danger"><p class="text-center mb-0">'+errMsg+'</p></div>')
                            $('#form').prepend(err);
                            let arr = [$('#model'), $('#brand'), $('#plateNumber'), $('#insuranceDate')];
                            arr.forEach(element =>{
                                element.on('focus', function(){
                                err.hide();
                                })
                            })
                            }
                    })

                    }
                })
        })
    </script>

@endsection
