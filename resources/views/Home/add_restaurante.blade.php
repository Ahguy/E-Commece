@extends('Home.Masterpage')
@section('conten')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

<script>

</script>
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
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon mt-2">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                </div>
                </li>
                </li>
                </ul>
        </div>
    </div>
    </nav>
    <!-- End Navbar -->
</div>
</div>
</div>
<header class="header-2">
    <div class="page-header min-vh-100 relative width-100" style="background-image: url('img/bgheader.jpg')">
        <span class="mask bg-gradient opacity-4"></span>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 text-center mx-auto">
                    <section>
                        <div class="container py-4">
                            <div class="row">
                                <div class="col-lg-7 mx-auto d-flex justify-content-center flex-column">
                                    <h5 class="text-center">Interested? Fill in the form below to become our partner and
                                        increase your revenue!</h5>
                                    <form action="{{url('upload_rest')}}" method="post" enctype="multipart/form-data" id="">
                                        @csrf
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Restaurant/Shop Name*</label>
                                                    <input type="text" class="form-control" name="restname" required>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" class="form-control" name="fname" required>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" name="lname" required>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Phone Number</label>
                                                    <input type="text" class="form-control" name="phone" required>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Email Address</label>
                                                    <input type="email" class="form-control" name="email" required>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label for="">Image</label>
                                                <div class="input-group input-group-dynamic">

                                                    <input type="file" class="form-control" value="Image" name="restimage" required>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <div class="input-group input-group-dynamic">

                                                    <select class="form-select" aria-label="Default select example" name="province">
                                                    <option value="1">Restaurant Address</option>
                                                     @foreach ($pros as $pro )
                                                        <option value="{{$pro->id}}">{{$pro->proname}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="col-md-12">
                                                    <input type="submit" class="btn bg-gradient-dark w-100" value="Submit">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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