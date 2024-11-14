@extends('admin.Masterpage')
@section('conten')
<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Provinces</h4>
                    <a href="{{url('frm_province')}}"> <button type="button" class="btn btn-outline-primary btn-fw left-11">ADD Province</button></a>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Enlish</th>
                            <th>Khmer</th>
                            <th>Image</th>
                            <th>Actioon</th>
                          </tr>
                        </thead>
                        <tbody>
                      @foreach ($pros as $pro )
                   
                          <tr>
                            <td>{{$pro->id}}</td>
                            <td>{{$pro->proname}}</td>
                            <td>{{$pro->khmer}}</td>
                            <td><img src="{{asset('img/imgpro/'. $pro->Image)}}" ></td>
                            <td> 
                          <a href="{{url('view_shop',$pro->id)}}">  <button type="button" class="btn btn-outline-info btn-fw">View Shop</button></a>  
                    
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