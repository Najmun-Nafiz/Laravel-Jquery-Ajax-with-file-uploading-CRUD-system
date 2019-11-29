@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" style="background-color: orange;color: black;font-weight: bold;font-size: 25px;">View All Data
                    <button type="" class="btn btn-info float-right">Add</button>
                </div>

                <div class="card-body">
                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">Id</th>
                          <th id="names" scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                          <td><button type="" class="btn btn-primary">View</button>
                          <button type="" class="btn btn-info">Edit</button>
                          <button type="" class="btn btn-danger">Delete</button></td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                          <td><button type="" class="btn btn-primary">View</button>
                          <button type="" class="btn btn-info">Edit</button>
                          <button type="" class="btn btn-danger">Delete</button></td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Larry</td>
                          <td>the Bird</td>
                          <td>@twitter</td>
                          <td><button type="" class="btn btn-primary">View</button>
                          <button type="" class="btn btn-info">Edit</button>
                          <button type="" class="btn btn-danger">Delete</button></td>
                        </tr>
                      </tbody>
                    </table>

                </div>


                <!-- Button trigger modal -->

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                  <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-content">

                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <div class="modal-body">
                        <form method="POST" action="{{ url('data/add') }}" id="DataAddForm">
                            @csrf
                           <div class="form-group">

                            <label for="name">Enter Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter email">
                            
                          </div>

                          <div class="form-group">

                            <label for="email">Enter Email</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                            
                          </div>

                          <div class="form-group">

                            <label for="phone">Enter Phone</label>
                            <input type="text" class="form-control" id="phone" placeholder="Enter Phone">

                          </div>


                          <button type="submit" id="submit" class="btn btn-primary">Save</button>
                        </form>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>

                    </div>

                  </div>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section("script")
<script src="{{ asset('script.js') }}" defer></script>
<script src="{{ asset('sweetalert.min.js') }}" defer></script>
@endsection


@section("style")
<link href="{{ asset('front/style.css') }}" rel="stylesheet">
<link href="{{ asset('front/animate.css') }}" rel="stylesheet">
@endsection
