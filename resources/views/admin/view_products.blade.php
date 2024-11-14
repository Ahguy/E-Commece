@extends('admin.Masterpage')
@section('conten')
<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">{{$Restaurantes->proname}}</h4>
            
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Actioon</th>
                          </tr>
                        </thead>
                        <tbody>
                      @foreach ($Products as $Prod )
                   
                          <tr>
                            <td>{{$Prod->id}}</td>
                            <td>{{$Prod->name}}</td>
                            <td>{{$Prod->price}}</td>
                            <td><img src="{{asset('img/prodimages/'. $Prod->Image)}}" ></td>
                            <td> 
                            <div class="dropdown">
                            <button type="button" class="btn btn-warning dropdown-toggle" id="dropdownMenuIconButton5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="mdi mdi-logout"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton5">
                            <br>
                              <a class="dropdown-item" href="{{url('edite_prod',$Prod->id)}}">Update</a>
                              <br>
                              <a class="dropdown-item" href="{{url('delete_prod',$Prod->id)}}">Delete</a>
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