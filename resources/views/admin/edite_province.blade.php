@extends('admin.Masterpage')
@section('conten')
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic form elements</h4>
                    <p class="card-description"> Basic form elements </p>
                    <form  action="{{url('update_provinc',$pros->id)}}" method="post" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Name English</label>
                        <input type="text" class="form-control" name="englishpro" placeholder="Name English" value="{{$pros->proname}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Name Khmer</label>
                        <input type="text" class="form-control" name="khmerpro" placeholder="Name Khmer" value="{{$pros->khmer}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Image</label>
                        <input type="hidden" id="form2Example1" class="form-control" name="imgpro" value=""/>
                        <input type="file" class="form-control" name="fileProductImage" placeholder="fileProductImage">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection