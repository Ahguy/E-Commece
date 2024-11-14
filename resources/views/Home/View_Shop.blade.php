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
                        href="https://demos.creative-tim.com/material-kit/index" rel="tooltip"
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
                        <a href="{{url('Mini_card')}}"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                fill="currentColor" class="bi bi-basket2" viewBox="0 0 16 16">
                                <path
                                    d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0z" />
                                <path
                                    d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6z" />
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
            <div class="row ">
                <div class="col-lg-7  ">

                    <h1 class="bds-c-hero__header"> IT Delivery Food Delivery in {{$Provinces->proname}} | IT Delivery
                        Cambodia</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6">
    <h6> <a href="/dashboard">Home Page</a>>{{$Provinces->proname}}</h6>
    <section class="my-5 py-5 col-lg-12">
        <div class="row">
            <h2>Top Areas in {{$Provinces->proname}}</h2>
        </div>
            <div class="mb-4">
                <center>
                <div class="input-group
                 input-group-dynamic w-60">
                   
                    <input type="text" class="form-control w-60" name="search"  id="search" placeholder="Search">
                </div>
                </center>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $("#search").keyup(function() {
        var input = $(this).val ();
        //  alert(input);
         console.log(input)
        // if (input != "") {
        //     $.ajax({
        //         url: "Search.php",
        //         method: "POST",
        //         data: {
        //             input: input
        //         },
        //         success: function(data) {
        //             $("#searchresoult").html(data);
        //         }
        //     });
        // } else {
        //     $("#searchresoult").css("display", "none");
        // }
    });
});
</script>
        <div class="row justify-content-center">
            <h2>All Shop</h2>

            @foreach ($Restaurantes as $rest)
            <div class="col-12 col-lg-4">
                <a href="{{url('Order_prod',$rest->id)}}">
                    <div class="card-body">
                        <div class="card box-shadow mx-auto my-5" style="">
                            <img src="{{asset('img/restImage/'. $rest->Image)}}" class="card-img-top " alt="...">
                            <h5 align="center">{{$rest->name}}</h5>
                        </div>
                    </div>
                </a>
            </div>

            @endforeach

        </div>
    </section>

    <section class="my-5">
        <div class="container">

        </div>
    </section>


    <!-- -------   START PRE-FOOTER 2 - simple social line w/ title & 3 buttons    -------- -->

    <!-- -------   END PRE-FOOTER 2 - simple social line w/ title & 3 buttons    -------- -->

</div>




<footer class="footer pt-5 mt-5">
    Team 1
</footer>
@endsection