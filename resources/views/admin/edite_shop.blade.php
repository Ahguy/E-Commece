@extends('admin.Masterpage')
@section('conten')
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">{{$Restaurantes->name}}</h4>
                 
                    <form  action="{{url('update_shop',$Restaurantes->id)}}" method="post" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Shop Name</label>
                        <input type="hidden" class="form-control" name="shopid" placeholder="Name English" value="{{$Restaurantes->id}}">
                        <input type="text" class="form-control" name="shopname" placeholder="Name English" value="{{$Restaurantes->name}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">First Name</label>
                        <input type="text" class="form-control" name="fname" placeholder="Name Khmer" value="{{$Restaurantes->fistname}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Last Name</label>
                        <input type="text" class="form-control" name="lname" placeholder="Name Khmer" value="{{$Restaurantes->lastname}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Name Khmer" value="{{$Restaurantes->phone}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Name Khmer" value="{{$Restaurantes->email}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Image</label>
                        <input type="hidden" id="form2Example1" class="form-control" name="restimage" value=""/>
                        <input type="file" class="form-control" name="fileshopImage" placeholder="fileshopimg">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection