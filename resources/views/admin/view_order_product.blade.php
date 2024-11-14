@extends('admin.Masterpage')
@section('conten')
<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">All Order</h4>
                    <div class="table-responsive">
                    <table class="table table-shopping">
      <thead>
          <tr>
              <th class="text-center"></th>
              <th>Product</th>
              <th class="th-description">Price</th>
              <th class="th-description">Quantity</th>
              <th class="text-right">Amount</th>
          </tr>
      </thead>
      <tbody>
      @foreach ($items as $product)
          <tr>
              <td>
                  <div class="img-container">
                     <img src="{{asset('img/prodimages/'.$product->Image)}}" alt=""
                            style="width:80px; height:80px" class="rounded-circle" />
                  </div>
              </td>
              <td class="td-name">
                  {{$product->name}}
              </td>
              <td>
              {{$product->price}}$
              </td>
              <td>
              {{$product->quantity}}
              </td>
              <td >
                 {{$product->price*$product->quantity }}$
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