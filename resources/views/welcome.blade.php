@extends('layouts.app')
@section('content')
<div id="parent" class="flex justify-center">

<div class="w-1/2">
        <div class="title m-b-md">
                 Car
        </div>
    <div class="alert alert-danger" role="alert" v-bind:class="{hidden: hasError}">
    All fields are required!
        </div>
    <div class="form-group">
    <label for="make">Make</label>
    <input type="text" class="form-control" id="make" required placeholder="Make" name="make" v-model="newCar.make">
    </div>
                                        
    <div class="form-group">
    <label for="model">Model</label>
    <input type="text" class="form-control" id="model" required placeholder="Model" name="model" v-model="newCar.model">
    </div>

    <button class="btn btn-primary" @click.prevent="createCar()">
    Add Car
    </button>
    </div>
    <div class="w-1/2">
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <input type="hidden" disabled class="form-control" id="e_id" name="id" required :value="this.e_id">
                        Make: <input type="text" class="form-control" id="e_make" name="make" required :value="this.e_make">
                        Model: <input type="text" class="form-control" id="e_model" name="model" required  :value="this.e_model">
                </div>    
                                        
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" @click="editCar()">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Make</th>
                        <th scope="col">Model</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for ="car in cars">
                            <th scope="row">@{{car.id}}</th>
                            <td>@{{car.make}}</td>
                            <td>@{{car.model}}</td>

                            <td @click="setVal(car.id, car.make, car.model)"  class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
                                Edit
                            </td>

                            <td  @click.prevent="deleteCar(car)" class="btn btn-danger"> 
                            Delete
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
@endsection

