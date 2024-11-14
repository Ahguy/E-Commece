@extends('Home.Masterpage')
@section('conten')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

<script>

</script>

</div>
</div>
<header class="header-2">
    <div class="page-header min-vh-100 relative width-100" style="background-image: url('img/bgheader.jpg')">
        <span class="mask bg-gradient opacity-4"></span>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 text-center mx-auto">
                    <section>
                    <div class="card">
  <div class="card-body mx-4">
    <div class="container">
      <p class="my-5 mx-5" style="font-size: 30px;">Thank for your purchase</p>
      <div class="row">
        <ul class="list-unstyled">
        @foreach ($orders as $order )
          <li class="text-black">{{$order->name}}</li>
          <li class="text-muted mt-1"><span class="text-black">Invoice</span> #12345</li>
          <li class="text-black mt-1">{{$order->created_at}}</li>
          @endforeach
        </ul>
        <hr>
        

      </div>
      <div class="row">
      <?php 
                                          
                                          $value=0;
                                          ?>
      @foreach ($items as $product)
      @if ($order->id == $product->orderId)
      <div class="col-xl-3">
      <img src="{{asset('img/prodimages/'.$product->Image)}}" alt=""
      style="width:80px; height:80px" class="rounded-circle" />
        </div>
        
        <div class="col-xl-3">
          <p> {{$product->name}}</p>
        </div>              
      <div class="col-xl-2">
          <p> ${{$product->price}}</p>
        </div>
        <div class="col-xl-2">
          <p>{{$product->quantity}}</p>
        </div>
        
        <div class="col-xl-2">
          <p class="float-end">$  {{$product->price*$product->quantity }}
          </p>
        </div>
        <hr>
        <?php 
                                         
                                         $value = $value+$product->price*$product->quantity;
                                         ?>
                                         @endif
        @endforeach
        <hr>
      </div>
      <div class="row text-black">

        <div class="col-xl-12">
          <p class="float-end fw-bold">Total: ${{$value}}
          </p>
        </div>
        <a href="/dashboard"><button type="submit" class="btn btn-primary mr-2">Confirm</button></a>
        <hr style="border: 2px solid black;">
      </div>
    </div>
  </div>
</div>
                    </section>


                </div>
            </div>

        </div>
    </div>

</header>
@endsection