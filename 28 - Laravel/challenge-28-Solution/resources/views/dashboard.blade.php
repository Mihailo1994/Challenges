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
                        <a type="button" data-bs-toggle="modal" data-bs-target="#userModal" class="font-weight-bold btn btn-primary">Create new user</a>
                    </div>
                    <div class="px-3 pb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Username</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                {{-- @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->email}}</td>
                                        @if ($user->is_active)
                                            <td class="text-success">Active</td>
                                        @else
                                            <td class="text-danger">Not Active</td>
                                        @endif
                                        <td><button class="btn-sm btn btn-danger mx-2" id="delete-btn">Delete</button>@if ($user->is_active)<button class="btn-sm btn btn-warning mx-2" id="deactivate-btn">Deactivate</button>@endif</td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="userModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create new user</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control mb-2">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control mb-2">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control mb-2">
                        <button class="btn btn-primary form-control" id="save-btn">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {

            renderData()

            function renderData(){
                    $.ajax({
                    url: "http://127.0.0.1:8000/api/users",
                    method: 'GET',
                    headers: {'Content-Type': 'application/json'},
                }).done(function(data){
                    let users = data;
                    let tableBody = $('#table-body');
                    tableBody.html('');
                    users.forEach(element => {
                        let status = 'Not Active';
                        let deactivateBtn = '';
                        if(element.is_active){
                            status = 'active';
                        }
                        if(status === 'active'){
                            deactivateBtn = '<button class="btn-sm btn btn-warning mx-2 deactivate-btn" value="'+element.id+'">Deactivate</button>';
                        }
                        let tr = $('<tr><td>'+element.username+'</td><td>'+element.email+'</td><td>'+status+'</td><td><button class="btn-sm btn btn-danger mx-2 delete-btn" value="'+element.id+'">Delete</button>'+deactivateBtn+'</td></tr>');
                        tableBody.append(tr);
                    })
                    let deleteBtns = $('.delete-btn');
                    deleteBtns.on('click', function(e){
                        let id = e.target.value;
                        $.ajax({
                            url: "http://127.0.0.1:8000/api/delete/user",
                            method: 'POST',
                            Headers: {'Content-Type': 'application/json'},
                            data: JSON.stringify({id}),
                        }).done(function(data){
                            console.log(data)
                            renderData()
                        }).fail(function(error){
                        console.log(error)
                        })
                    })
                    let deactivateBtns = $('.deactivate-btn');
                    deactivateBtns.on('click', function(e){
                        let id = e.target.value;
                        $.ajax({
                            url: "http://127.0.0.1:8000/api/deactivate/user",
                            method: 'POST',
                            Headers: {'content-Type': 'application/json'},
                            data: JSON.stringify({id}),
                        }).done(function(data){
                            renderData()
                        }).fail(function(error){
                            console.log(error)
                        })
                    })
                }).fail(function(error){
                    console.log(error);
                })
            }




            let btn = $('#save-btn').on('click', function(e){
                e.preventDefault();
                let username = $('#username').val();
                let email = $('#email').val();
                let password = $('#password').val();

                $.ajax({
                    url: "http://127.0.0.1:8000/api/create/user",
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    data: JSON.stringify({username, email, password}),
                    beforeSend: function(){
                        btn.hide();
                    }
                    }).done(function(data){
                        location.reload();
                    }).fail(function(error){
                        btn.show();
                        let arr = [];
                        let emailErr = error.responseJSON.errors.email;
                        let usernameErr = error.responseJSON.errors.username;
                        let passwordErr = error.responseJSON.errors.password;
                        if (emailErr !== undefined) {
                            arr.push(emailErr);
                        }
                        if (usernameErr !== undefined) {
                            arr.push(usernameErr);
                        }
                        if (passwordErr !== undefined) {
                            arr.push(passwordErr);
                        }
                        let err = $('<div class="alert alert-danger"></div>')
                        arr.forEach(element => {
                            let p = $('<p class="text-center mb-0">'+element+'</p>');
                            err.append(p);
                        });
                        $('#form').prepend(err);
                        let inputs = [$('#username'), $('#email'), $('#password')];
                        inputs.forEach(element =>{
                            element.on('focus', function(){
                                err.hide();
                            })
                        })
                    })
                })









        });
    </script>




@endsection

