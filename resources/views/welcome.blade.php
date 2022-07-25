<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Events</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
 
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="align-items-center d-none d-md-flex">

        
      </div>
      
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!--<a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>
       Uncomment below if you prefer to use an image logo -->
      <h1 class="logo me-auto"><a href="index.html">Events</a></h1> 

      <nav id="navbar" class="navbar order-last order-lg-0">
       
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="{{url('/login')}}" class="appointment-btn"><span class="d-none d-md-inline"><i class="bi bi-person-circle"></i>Login</span> </a>

    </div>
  </header><!-- End Header -->

  

  <main id="main">
    <div class="elementor-background-overlayy"></div>
    <section id="hero" class="d-flex align-items-center">
     
      <div class="elementor-background-overlay"></div>
      <div class="container"><div class="row">
        <div class="col-lg-6 pt-2 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Welcome to The Technical Assessment</h1>
        
                </div>
                   <div class="col-lg-6 order-1 order-lg-2 hero-img">
                      <img src="{{asset('assets/img/kt.png')}}" class="img-fluid" alt=""></div>
                    
                   
                    
                    </div></div></section>

                   


    <section id="fecol" class="testimonials fecol">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Upcoming Events</h2>
       
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
             
      @foreach($events as $event)
  <!-- Getting the finished date of event-->
        @php
        $date = $event['date'];
        $arr = explode(' ',trim($date));
        $finished_date=$arr[2];


        $startDate = strtotime(date('Y-m-d', strtotime($finished_date) ) );
        $currentDate = strtotime(date('Y-m-d'));
   
        if($startDate < $currentDate) {
            $status='Expired';
            $color='red';
        }

        else {
            $status='Not Expired';
            $color='green';
        }
        @endphp

          <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="gg">
                <img src="{{asset($event['image'])}}" class="img-fluid" alt="">
              </div>
              <h3><a href="#">{{$event['title']}} </a></h3>
                <p><i class='bx bxs-map' ></i>{{$event['address']}}</p>
                <article>
                <i class='bx bxs-calendar'></i><p>{{$event['date']}}</p>
                  <i class='bx bxs-time'></i> <p>{{$event['time']}}</p>
                  <br><br>
                  <p style="color: {{$color}}"><b> Status: {{$status}}</b></p><br>
                                           <p>{{$event['description']}}</article></p>
              </div>
           </div><!-- End testimonial item -->
          @endforeach

          </div>
          <div class="swiper-pagination"></div>
        </div>
        

      </div>
    </section>



   


  </main><!-- End #main -->


  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>