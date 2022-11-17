<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ArtCells</title>
  <link rel="icon" href="{{ asset('Img/Logo/artcellslogo.png') }}" type="image/png">
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
  <link href="http://fonts.cdnfonts.com/css/expressway" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/aos/aos.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('Css/variables.css') }}">

  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('Css/home.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('Css/carousel.css') }}">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>

<body style="padding-top:85px">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top" data-scrollto-offset="0" style="background-color: #FCFCFC">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
        <img src="{{ asset('Img/Logo/artcellslogo.png') }}" alt="logo" style="width: 55px">

      </a>

      <!-- Navbar -->
      <nav id="navbar" class="navbar bg-white">
        <ul>
          <li><a class="link" href="" style="text-decoration: none">Artists</a></li>
          <li><a class="link" href="/exhibitions" style="text-decoration: none">Exhibitions</a></li>
          <li><a class="link" href="{{route('store.index')}}" style="text-decoration: none">Store</a></li>
          <li><a class="link" href="" style="text-decoration: none">Auction</a></li>
          <li><a class="link" href="/forum" style="text-decoration: none">Forum</a></li>
          <li><a class="link" href="/about" style="text-decoration: none">About</a></li>
          @if (\Session::has('username'))
          <li><a class="link" href="/cart" style="text-decoration: none">Cart</a></li>
          @endif
        </ul>
      </nav><!-- .navbar -->

      @if (\Session::has('username'))
      <div class="dropdown-center">
        <button class="btn dropdown-toggle btn-getstarted scrollto" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ Session::get('username') }}
        </button>
        <ul class="dropdown-menu" style="width:200px;">
          <li><a class="dropdown-item" href="#">Manage Account</a></li>
          <li><a class="dropdown-item" href="#">My Orders</a></li>
          <li><a class="dropdown-item" href="{{ route('wishlist.show') }}">My Wishlist</a></li>
          <li><a class="dropdown-item" href="{{ route('logout.logout') }}">Logout</a></li>
        </ul>
        @else
        <a class="btn-getstarted scrollto" href="/login" style="text-decoration: none;">Login</a>
      </div>
      @endif

    </div>
  </header><!-- End Header -->

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content" style="background-color: #f4f4f4">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3 style="color:black">ArtCells</h3>
              <p>
                Level 32 Block B Mercu 3, Jalan Bangsar, KL Eco City,<br />
                59200 Kuala Lumpur, Federal Territory of Kuala Lumpur <br /><br />

                <strong>Phone:</strong> 03-2553187<br />
                <strong>Email:</strong> artcells@gmail.com<br />
              </p>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
          </div>

          <div class="col-lg-2 col-md-6 footer-links" style="color:black">
            <h4>Operating Hour</h4>
            <p>
              Mon–Sat, 10am–7pm, </br>
              Sunday, 12pm-6pm </br></br>
              No booking required.</p>

          </div>

        </div>
      </div>
    </div>

    <div class="footer-legal text-center">
      <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

        <div class="d-flex flex-column align-items-center align-items-lg-start">
          <div class="copyright">
            &copy; Copyright <strong><span>ArtCells</span></strong>. All Rights Reserved
          </div>
        </div>

        <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
          <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>

      </div>
    </div>

  </footer> <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript & JavaScript Bundle with Popper -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/js/home.js') }}"></script>
  <script src="{{ asset('Js/carouselmin.js') }}"></script>
  <script src="{{ asset('Js/custom.js') }}"></script>

  <!-- JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

  @yield('scripts')
</body>

</html>