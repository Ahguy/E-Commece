@extends('Home.Masterpage')
@section('conten')

    <!-- Navbar -->
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <nav
                    class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid px-0">
                        <a class="navbar-brand font-weight-bolder ms-sm-3"
                            href="/dashboard" rel="tooltip"
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
                        <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
                            
                           <ul class="navbar-nav navbar-nav-hover ms-auto">
                                <li class="nav-item my-auto ms-3 ms-lg-0">
                                    <a  href="{{ url('/dashboard') }}" class="btn btn-sm  bg-gradient-info mb-0 me-1 mt-2 mt-md-0">Log in</a>
                                </li>
                                <li class="nav-item my-auto ms-3 ms-lg-0">
                                    <a  href="{{ route('register') }}" class="btn btn-sm  bg-gradient-primary  mb-0 me-1 mt-2 mt-md-0">Sign
                                        up</a>
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
                    <div class="col-lg-7 text mx-auto">
                        <h1  class="bds-c-hero__header mt-zero mb-zero">IT Delivery</h1>
                     
                        <h1 class="bds-c-hero__header mt-zero mb-zero">It's the food and groceries you love, delivered</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6">

        <section class="my-5 py-5">
            <div class="container">
                <div class="row align-items-center">
                    <h2>You prepare the food, we handle the rest</h2>
                    <div class="col-lg-12 ms-auto">
                        <!-- -------- START HEADER 1 w/ text and image on right ------- -->
                        <header>
                            <div class="page-header min-vh-50" style="background-image: url('img/foot.jpg')">
                                <span class="mask bg-gradient-dark opacity-5"></span>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-7 d-flex justify-content-center flex-column">
                                            <h2 class="text-white mb-4">List your restaurant or shop on IT Delivery</h2>
                                            <p class="text-white opacity-8 lead pe-5 me-5">Would you like millions of
                                                new customers to enjoy your amazing food and groceries? So would we!
                                            </p>
                                            <p class="text-white opacity-8 lead pe-5 me-5">
                                                It's simple: we list your menu and product lists online, help you
                                                process orders, pick them up, and deliver them to hungry pandas – in a
                                                heartbeat! </p>
                                            <p class="text-white opacity-8 lead pe-5 me-5">
                                                Interested? Let's start our partnership today! </p>
                                            <div class="buttons">
                                                <a href="{{url('add_restaurant')}}"> <button type="button" class="btn btn-white mt-4">Get
                                                        Started</button></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <!-- -------- END HEADER 1 w/ text and image on right ------- -->


                    </div>
                </div>
            </div>
        </section>


        <section class="my-5 py-5 col-lg-12">
            <div class="container">
                <div class="row">
                    <h2>Find us in these cities and many more!</h2>
                </div>
            </div>
            <div class="row justify-content-center">
  @foreach ($pros as $pro)
  
    <div class="col-12 col-lg-4">
    <a href="{{url('shop_province',$pro->id)}}">
    <div class="card-body">
      <div class="card box-shadow mx-auto my-5" style="">
        <img src="{{asset('img/imgpro/'. $pro->Image)}}" class="card-img-top" alt="...">
        <h5 align="center">{{$pro->proname}}</h5>
        </div>
      </div>
      </a>
    </div>
    
    @endforeach

    </div>
    </section>


    <!-- -------- START Content Presentation Docs ------- -->

    <section class="">
            <div class="container">
                <div class="row align-items-center">

   <div style="text-align:left" class="col-lg-12 col-lg-offset-1 footersection">
	
	<div style="margin-bottom:20px" class="row">
		<div class="col-lg-9 col-md-9 col-sm-8">
			<p align="justify">
				&nbsp;</p>
			<h2 style="line-height:1.3">
				<strong>IT Delivery: food and shops delivery from local favourites in Cambodia</strong></h2>
			<p>
				IT Delivery Cambodia provides a great selection of curated restaurants and shops in various cities in Cambodia such as Phnom Penh, Siem Reap, Battambang and many more.</p>
			<p>
				Discover our service through the website or mobile application on Apple App Store and Google Play Store. At IT Delivery, we deliver happiness through restaurant food, groceries and everyday essentials. How? By making ordering easy, fast and fun.</p>
			<h3 style="line-height:1.3">
				<strong>Why order food on IT Delivery?</strong></h3>
			<span class="link">✓ </span>Selection of premium restaurants, featuring diverse cuisines.<br>
			<span class="link">✓ </span>High-quality delivery service.<br>
			<span class="link">✓ </span>Live chat feature to give you instant help when you need it.<br>
			<h3 style="line-height:1.3">
				<strong>How can I order from IT Delivery?</strong></h3>
			<p align="justify">
				To order IT Delivery, you simply need to find the restaurants or shops that deliver to your location. Add your address, browse through the available restaurants or shops, choose your order and proceed to checkout for payment. Your order will be delivered in no time!</p>
			<h3 style="line-height:1.3">
				<strong>Choose from dozens of cuisines and order online for home delivery</strong></h3>
			<p align="justify">
				At IT Delivery Cambodia, we make sure you have the best food delivery experience. Offering food ranging from steaks, sushi, fried chicken, Laab, fried noodles, or even donuts, IT Delivery has got you covered. Get your coffee fix with Amazon Cafe, ChaTraMue, and Queen Bee. Enjoy amazing cuisine at Eleven One Kitchen or La Chronique anytime.</p>
			<p align="justify">
				To order IT Delivery, you simply need to find the restaurants or shops that deliver to your location. Add your address, browse through the available restaurants or shops, choose your order and proceed to checkout for payment. Your order will be delivered in no time!</p>
			<p align="justify">
				<b>Find a restaurant.</b> Enter your address on the home page. Browse our extensive list of restaurants that deliver to your area. Pick a restaurant and look through its menu.<br>
				<br>
				<b>Choose your dishes.</b> Browse the menu and select dishes you would like to order. Your items will appear on your cart on the right.<br>
				<br>
				<b>Checkout &amp; Payment.</b> Once you are happy with your order, click on the "ORDER NOW" button and enter your delivery address. Simply follow the checkout instructions from there.<br>
				<br>
				<b>Delivery.</b> We will send you an email and SMS confirming your order and delivery time. Sit back, relax and wait for piping hot food to be conveniently delivered to you!</p>
			<h3 style="line-height:1.3">
				<strong>Does IT Delivery deliver 24 hours? </strong></h3>
			<p align="justify">
				No, IT Delivery in Cambodia delivers 18 hours. From 6am to 12am midnight. However, many restaurants and shops may be unavailable for late night delivery. Please enter your address to check which places are open in your area. We also deliver groceries, discoverable on the IT Delivery app and website.</p>
			<p align="justify">
				Our delivery fee in Cambodia depends on many operational factors including location and the restaurant or shop you are ordering from. You can always check the delivery fee before placing your order. You can also filter only for restaurants that offer free delivery by clicking the "Filters" icon at the top of your restaurant listings page.</p>
			<h3 style="line-height:1.3">
				<strong>What restaurants and shops let you order online? </strong></h3>
			<p align="justify">
				There are hundreds of businesses on IT Delivery Cambodia that let you order online. Top restaurants for delivery include KFC, Texas Chicken, The Pizza Company, Fuji, Auntie Anne's, Dairy Queen, Bonchon Chicken and many many more. Favourite shops for home delivery include chip mong shopping mall , kiwi mart , Circle K និង Guardian. In order to check all our partners who deliver to you, just type in your address.</p>
			<h3 style="line-height:1.3">
				<strong>What is the difference between delivery and Pick-Up? </strong></h3>
			<p>
				If you choose delivery, a IT Delivery rider will collect your order from the restaurant and take it to your chosen delivery address. If you choose Pick-Up, you can self-collect your food directly from the restaurant for extra savings – and to jump to the front of the queue. Pick-Up orders are available for restaurants only.</p>
			<h3>
				<strong>Is there a minimum amount I need to spend to order IT Delivery?</strong></h3>
			<p>
				Yes. If you want to order less than the minimum order value, you can pay the difference.</p>
			</div></div></div>
            </div></div>
            </section>



    <!-- -------   START PRE-FOOTER 2 - simple social line w/ title & 3 buttons    -------- -->

    <!-- -------   END PRE-FOOTER 2 - simple social line w/ title & 3 buttons    -------- -->

    </div>




    <footer class="footer pt-5 mt-5">
        <div class="container">
          
        </div>
    </footer>
    @endsection