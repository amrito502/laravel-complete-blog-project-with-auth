<!DOCTYPE html>

<html lang="en-us">

<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
	<meta name="description" content="@yield('meta_description')">
	<meta name="keywords" content="@yield('mete_keyword')">
	<meta name="author" content="Amrito Bosu">
	<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
	<link rel="icon" href="images/favicon.png" type="image/x-icon">

  <!-- theme meta -->
  <meta name="theme-name" content="reporter" />

	<!-- # Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Neuton:wght@700&family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

	<!-- # CSS Plugins -->
	<link rel="stylesheet" href="{{ asset('frontend/plugins/bootstrap/bootstrap.min.css') }}">

	<!-- # Main Style Sheet -->
	<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
</head>

<body>

<header class="navigation">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light px-0">
      <a class="navbar-brand order-1 py-0" href="{{ route('frontend.home') }}">
        <img loading="prelaod" decoding="async" class="img-fluid" src="{{ asset('frontend/images/logo.png') }}" alt="Reporter Hugo">
      </a>
      <div class="navbar-actions order-3 ml-0 ml-md-4">
        <button aria-label="navbar toggler" class="navbar-toggler border-0" type="button" data-toggle="collapse"
          data-target="#navigation"> <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <form action="#!" class="search order-lg-3 order-md-2 order-3 ml-auto">
        <input id="search-query" name="s" type="search" placeholder="Search..." autocomplete="off">
      </form>
      <div class="collapse navbar-collapse text-center order-lg-2 order-4" id="navigation">
        <ul class="navbar-nav mx-auto mt-3 mt-lg-0">
          <li class="nav-item"> <a class="nav-link" href="{{ route('frontend.home') }}">Home</a>
          </li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('frontend.home') }}">About Me</a>
          </li>
          <li class="nav-item"> <a class="nav-link" href="">My Blogs</a>
          </li>
          <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              All Category
            </a>
            <div class="dropdown-menu">
                @php
                    $categories = App\Models\Category::where('navbar_status','0')->where('status','0')->get();
                @endphp
                @foreach ($categories as $cateitem)
                    <a href="{{ url('category/'.$cateitem->slug) }}" class="nav-link">{{ $cateitem->name }}</a>
                @endforeach
            </div>
          </li>


          <li class="nav-item"> <a class="nav-link" href="">Contact</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</header>

@yield('frontend_content')



<footer class="bg-dark mt-5">
  <div class="container section">
    <div class="row">
      <div class="col-lg-10 mx-auto text-center">
        <a class="d-inline-block mb-4 pb-2" href="index.html">
          <img loading="prelaod" decoding="async" class="img-fluid" src="{{ asset('frontend/images/logo-white.png')}}" alt="Reporter Hugo">
        </a>
        <ul class="p-0 d-flex navbar-footer mb-0 list-unstyled">
          <li class="nav-item my-0"> <a class="nav-link" href="about.html">About</a></li>
          <li class="nav-item my-0"> <a class="nav-link" href="article.html">Elements</a></li>
          <li class="nav-item my-0"> <a class="nav-link" href="privacy-policy.html">Privacy Policy</a></li>
          <li class="nav-item my-0"> <a class="nav-link" href="terms-conditions.html">Terms Conditions</a></li>
          <li class="nav-item my-0"> <a class="nav-link" href="404.html">404 Page</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="copyright bg-dark content">Designed &amp; Developed By <a href="https://themefisher.com/">Themefisher</a></div>
</footer>


<!-- # JS Plugins -->
<script src="{{ asset('frontend/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/bootstrap/bootstrap.min.js') }}"></script>

<!-- Main Script -->
<script src="{{ asset('frontend/js/script.js') }}"></script>

</body>
</html>
