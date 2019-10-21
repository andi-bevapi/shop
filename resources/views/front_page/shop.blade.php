
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <title>Shop Homepage - Start Bootstrap Template</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('dashboard/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('dashboard/css/cart.css') }}" rel="stylesheet">

</head>

<body>
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
  
  <!-- Page Content -->
  <div class="container">

    <div class="row">

    <div class="col-lg-10">

    <div class="card shopping-cart">
            <div class="card-header bg-dark text-light">
              
            </div>
            <div class="card-body">
                    <!-- PRODUCT -->
                    <div id="productContainer">
                    
                    </div>
                    <!-- END PRODUCT -->
                    <!-- PRODUCT -->
                   
                    <hr>
                    <!-- END PRODUCT -->
                
                <div class="pull-right" style="margin: 10px">
                    <a href="" id="checkout" onclick="submitData(event)" class="btn btn-success pull-right">Checkout</a>
                    <div class="pull-right" style="margin: 5px">
                        Total price: <b> <span id = "totalPrice">  </span> </b>
                    </div>
                </div>
            </div>
        </div>

    </div>


      <div class="col-lg-12">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="http://placehold.it/1200x350" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="http://placehold.it/1200x350" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="http://placehold.it/1200x350" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">
        @if($cars)
            @foreach($cars as $car)
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ asset( 'images/' . $car->image ) }}" alt="{{$car->make}}">
                  <div class="card-body">
                    <h2 class="card-title"> {{$car->make}} </h2>
                    
                    <p class="card-text">
                        <h4> {{$car->model}} </h4>
                        <h4> {{$car->engine_size}}</h4>
                        <h4> {{$car->price}} </h4>
                    </p>
                  </div>
                  @if(Auth::check())
                    <div class="card-footer">
                     <button class="btn btn-primary" 
                     id="addTocart" 
                     data-owner-id="{{ Auth::check() ? Auth::user()->id  : null }}" onclick="addToCart({{json_encode($car)}})">
                        Add to cart
                     </button>
                  </div>
                @endif
                </div>
              </div>
            @endforeach

        @endif
        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  
   <script  src = "{{ asset('dashboard/vendor/jquery/jquery.min.js')}}"></script>
   <script  src = "{{ asset('dashboard/js/bootstrap.bundle.min.js')}}"></script>
   <script  src = "{{ asset('dashboard/js/cart.js')}}"></script>
   <script>
  </script>
</body>

</html>
