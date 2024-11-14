@extends('admin.Masterpage')
@section('conten')
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic form elements</h4>
                    <p class="card-description"> Basic form elements </p>
                    <form  action="{{url('add_Province')}}" method="post" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Name English</label>
                        <input type="text" class="form-control" name="englishpro" placeholder="Name English">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Name Khmer</label>
                        <input type="text" class="form-control" name="khmerpro" placeholder="Name Khmer">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Image</label>
                        <input type="file" class="form-control" name="imgpro" placeholder="Image">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection