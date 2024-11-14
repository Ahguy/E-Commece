@extends('admin.Masterpage')
@section('conten')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">All Order</h4>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Total Amount</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Order Date</th>
                            <th>Actioon</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=0;
                        @endphp
                        @foreach ($orders as $order )
                        @php
                        $i++;
                        @endphp
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->total}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal"
                                    data-target="#myModal{{$i}}">View Product</button>
                                <div id="myModal{{$i}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-xl">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">All Product</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-lg-12 grid-margin stretch-card">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            </p>
                                                            <div class="table-responsive">
                                                                <table class="table table-shopping">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="text-center"></th>
                                                                            <th>Product</th>
                                                                            <th class="th-description">Price</th>
                                                                            <th class="th-description">Quantity</th>
                                                                            <th class="text-right">Amount</th>
                                                                            <th></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($items as $product)
                                                                        @if ($order->id == $product->orderId)
                                                                        <tr>
                                                                            <td>
                                                                                <div class="img-container">
                                                                                    <img src="{{asset('img/prodimages/'.$product->Image)}}"
                                                                                        alt=""
                                                                                        style="width:80px; height:80px"
                                                                                        class="rounded-circle" />
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
                                                                            <td class="td-number">
                                                                                {{$product->price*$product->quantity }}$
                                                                            </td>
                                                                        </tr>
                                                                        @endif
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>

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