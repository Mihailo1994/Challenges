@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')

    <div class="container-fluid py-5 min-height bg-grey">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-10">
                <div class="border rounded overflow-hidden">
                    <div class="p-3 border-bottom bg-light-subtle">
                        <p class="mb-0">Dashboard</p>
                    </div>
                    <div class="p-3 d-flex justify-content-end">
                        <a href="{{url('/create')}}"><button class="btn btn-primary btn-sm">Insert new vehicle</button></a>
                    </div>
                    <div class="p-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">Plate number</th>
                                    <th scope="col">Insurance date</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id="table-body"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        renderData();

        function deleteVehicle(id){
            $.ajax({url: "http://127.0.0.1:8000/api/vehicles/delete",
                        method: "POST",
                        headers: {"Content-Type": "application/json",
                                  "Authorization": "Bearer 1|Y58QsupG56O5kWev0Qz5l6jcqp0ZzpHTCjVQhXVA9430ec23"},
                        data: JSON.stringify({id})
                }).done(function(data){
                    renderData();
                })
                .fail(function(error){
                    console.log(error);
                })
        }

        function renderData(){
            $.ajax({url: "http://127.0.0.1:8000/api/vehicles",
                method: "GET",
                headers: {"Authorization": "Bearer 1|Y58QsupG56O5kWev0Qz5l6jcqp0ZzpHTCjVQhXVA9430ec23"},
            }).done(function(data){
                let vehicles = data.data;
                let tableBody = $('#table-body');
                tableBody.html('');
                vehicles.forEach(element => {
                let id = element['id'];
                let routeEdit = "{{route('edit.vehicle', ":id")}}";
                routeEdit = routeEdit.replace(':id', id);

                let tr =$('<tr><td>'+element['brand']+'</td><td>'+element['model']+'</td><td>'+element['plate_number']+'</td><td>'+element['insurance_date']+'</td><td><a href="'+routeEdit+'" class="mx-3"><button class="btn-warning btn btn-small">Edit</button></a><button onclick="deleteVehicle('+id+')" class="btn-danger btn btn-small">Delete</button></td><tr>');
                tableBody.append(tr);
                });
            }).fail(function(error){
            console.log(error);
        })
        }




    </script>

@endsection
