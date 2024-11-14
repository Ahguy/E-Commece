@extends('admin.Masterpage')
@section('conten')
<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">{{$Provinces->proname}}</h4>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Name Shop</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Actioon</th>
                          </tr>
                        </thead>
                        <tbody>
                      @foreach ($Restaurantes as $rest )
                   
                          <tr>
                            <td>{{$rest->id}}</td>
                            <td>{{$rest->name}}</td>
                            <td>{{$rest->email}}</td>
                            <td><img src="{{asset('img/restImage/'. $rest->Image)}}" ></td>
                            <td> 
                            <div class="dropdown">
                            <button type="button" class="btn btn-warning dropdown-toggle" id="dropdownMenuIconButton5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="mdi mdi-logout"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton5">
                            <a class="dropdown-item" href="{{url('add_product',$rest->id)}}">Add Product</a>
                            <br>
                            <a class="dropdown-item" href="{{url('view_product',$rest->id)}}">View Product</a>
                            <br>
                              <a class="dropdown-item" href="{{url('edite_shop',$rest->id)}}">Update</a>
                              <br>
                              <a class="dropdown-item" href="{{url('delete_shop',$rest->id)}}">Delete</a>
                            </div>
                          </div>
                    
                        </td>
                          </tr>
                           
                      @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
@endsection