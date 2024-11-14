@extends('Home.Masterpage')
@section('conten')
@if (!session()->exists('email'))
<script>
$('#myModal').on('shown.bs.modal', function() {
    $('#myInput').trigger('focus')
})
</script>

@endif
<!-- Navbar -->
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <nav
                class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid px-0">
                <a class="navbar-brand font-weight-bolder ms-sm-3"
                        href="{{url('/dashboard')}}" rel=""
                        title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
                        IT Delivery
                    </a>
         <div class="btn-group">

           
                        <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{Auth::user()->name}}
                            </button>
                            <ul class="dropdown-menu text-center">
                            <li><a class="dropdown-item" href="{{url('History_order')}}">History Order</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <input type="submit" name="" id="" value="Logout"
                                        class="btn btn-primary w-auto me-1 mb-0">
                                </form>
                            </ul>
                        </div>
                        <ul class="navbar-nav navbar-nav-hover ms-auto">
                            <li class="nav-item ms-lg-auto">
                            <li class="nav-item dropdown dropdown-hover mx-2">



                                <div class="dropdown-menu dropdown-menu-animation " aria-labelledby="dropdownMenuPages">
                                    <div class="d-none d-lg-block">

                                    </div>
                                </div>
                            </li>
                            </li>
                        </ul>
                          <span class="cart-count" style="color:red">{{$count}}</span>
                        <a href="{{url('Mini_card')}}"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-basket2" viewBox="0 0 16 16">
  <path d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0z"/>
  <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6z"/>
</svg></a>
                    </div>
                    
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>


<header class="header-2">
    <div class="page-header min-vh-50 relative width-100 " style="background-image: url({{asset('img/shopbaner.jpg')}}">
        <span class="mask bg-gradient opacity-4"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7  ">
                    <h1 class="bds-c-hero__header"> </h1>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6">
   
    <section class="my-5 py-5 col-lg-12">
        <div class="row ">
           <a href="/dashboard"><h2>Home</h2></a> 
        </div>
        <div class="row">

        <div class="col-12">
                <div class="col-md-12 ">
                    <div class="card ">
                        <div class="card-body ">
                            <div class="table">
                                <div class="overflow-auto" style="h-100% d-inline-block;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                          
                                            $value=0;
                                            ?>
                                        @foreach ($card as $cd )
                                            <tr>
                                                <td>
                                                    <img src="{{asset('img/prodimages/'.$cd->products->Image)}}" alt="" style="width:50px; height: 50px"
                                                        class="rounded-circle" />
                                                        {{$cd->products->name}}
                                                <td>
                                                <div class="btn btn-outline-success btn-icon-text">
                                                    {{$cd->products->price}}$
                                                    </div>
                                                </td>
                                                <td> <a href="{{url('Sub_prod',$cd->products->id)}}"> <button type="button"
                                                            class="btn btn-outline-danger btn-icon-text">
                                                            - </button>
                                                    </a>
                                                    <div class="btn btn-outline-info btn-icon-text"> {{$cd->qty}}</div>

                                                    <a href="{{url('Sum_prod',$cd->products->id)}}"> <button type="button"
                                                            class="btn btn-outline-primary btn-icon-text">
                                                            + </button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="btn btn-outline-success btn-icon-text">
                                                    {{$cd->products->price *$cd->qty}}$
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php 
                                         
                                            $value = $value+$cd->products->price *$cd->qty;
                                            ?>
                                            @endforeach 
                                        </tbody>
                                        <td>
                                        </td>
                                    </table>
                                </div>
                                <div class="total">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            <tr>
                                                <th> <span style="font-size:20px; ">Total Amount :</span></th>
                                                <th></th>
                                                <th> <span class="total"
                                                        style="font-size:25px; float: right; border: 1px solid red;   padding: 10px;border-radius:10px; ">
                                                        {{$value}}$</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="total">
                                   <div class="col-12">
                                   <button type="submit" class="btn btn-outline-success btn-icon-text w-100"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Pay
                                            </button>
                                   </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
        
        </div>
    </section>

    <section class="my-5">
        <div class="container">

        </div>
    </section>


    <!-- -------   START PRE-FOOTER 2 - simple social line w/ title & 3 buttons    -------- -->

    <!-- -------   END PRE-FOOTER 2 - simple social line w/ title & 3 buttons    -------- -->

</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{url('Check_out')}}" method="post" enctype="multipart/form-data" id="">
                    @csrf
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="input-group input-group-dynamic">
                                <input type="text" class="form-control" name="Rname" required
                                    value="{{Auth::user()->name}}">
                                <input type="hidden" class="form-control" name="total" required value="{{$value}}">
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="input-group input-group-dynamic">
                                <label class="form-label">Reciever Address</label>

                                <input type="text" class="form-control" name="Raddress" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="input-group input-group-dynamic">

                                <input type="text" class="form-control" name="Rphone" required
                                    value="{{Auth::user()->phone}}">
                            </div>
                        </div>
                        <select class="form-select" aria-label="Default select example" name="pay">
                            <option selected>Pay By</option>
                            <option value="1">Delivery</option>
                            <option value="2">Case</option>
                        </select>

                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn bg-gradient-dark mb-0" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-dark mb-0">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>



<footer class="footer pt-5 mt-5">
    <div class="container">
     <h1>Team 1</h1>
    </div>
</footer>
@endsection