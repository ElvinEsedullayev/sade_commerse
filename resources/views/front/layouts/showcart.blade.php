<!DOCTYPE html>
<html lang="en">
@include('front\layouts\partials\head')
  <body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Sixteen <em>Clothing</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="products.html">Our Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li>
              <li class="nav-item">
              @if (Route::has('login'))
                    @auth  
                <li class="nav-item">
                <a class="nav-link" href="{{route('show.cart')}}"><i class="fas fa-cart-plus"></i> Cart[{{$count}}]</a>
              </li>
                  <x-app-layout>
                   
                      </x-app-layout>
                    
                    @else
                    <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-cart-plus"></i> Cart[]</a>
              </li>
                       <li> <a href="{{ route('login') }}" class="nav-link">Log in</a></li>

                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                        @endif
                    @endauth
   
            @endif
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <br><br><br><br>
    
    <div class="container">
       @if(Session::has('success'))
                    <div class="alert alert-success">
                      {{Session::get('success')}}
                      <button class="close" data-dismiss="alert" type="button">x</button>
                    </div>
                    @endif
      
        
        
          
          <h1>Cart Item</h1>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product title</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <form action="{{route('order.confirm')}}" method="POST">
      @csrf
    @foreach($carts as $cart)
    <tr>
      <th scope="row">{{$cart->id}}</th>
      <td>
        <input type="hidden" name="productname[]" value="{{$cart->product_title}}">
        {{$cart->product_title}}</td>
      <td>
        <input type="hidden" name="productprice[]" value="{{$cart->price}}">
        {{$cart->price}}</td>
      <td>
        <input type="hidden" name="productquantity[]" value="{{$cart->quantity}}">
        {{$cart->quantity}}</td>
      <td><a href="{{route('cart.delete',$cart->id)}}" class="btn btn-danger">Delete</a></td>
    </tr>
  @endforeach
  </tbody>
</table>
  <button type="submit" class="btn btn-success" style="margin-left: 400px;">Confirm Order</button>
  </form>
    
</div>

    

    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd.
            
            - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
            </div>
          </div>
        </div>
      </div>
    @include('front.layouts.partials.footer')
     </body>

</html>