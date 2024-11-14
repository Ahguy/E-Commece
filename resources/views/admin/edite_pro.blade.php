@extends('admin.Masterpage')
@section('conten')
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Products</h4>
                    <p class="card-description"> Basic form elements </p>
                    <form  action="{{url('update_product',$Products->id)}}" method="post" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Product Name</label>
                      
                        <input type="text" class="form-control" name="prodname" placeholder="Product Name" value="{{$Products->name}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Price</label>
                        <input type="text" class="form-control" name="prodprice" placeholder="Price $"value="{{$Products->price}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Image</label>
                        <input type="hidden" class="form-control" name="prodimage" placeholder="Image">
                        <input type="file" id="form2Example1" class="form-control" name="fileprodimage" value=""/>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection