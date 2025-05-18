<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- Video.js Core -->
  <link href="https://vjs.zencdn.net/8.5.2/video-js.css" rel="stylesheet" />
  <script src="https://vjs.zencdn.net/8.5.2/video.min.js"></script>

  <!-- Quality Selector Plugin (optional but useful) -->
  <script src="https://cdn.jsdelivr.net/npm/videojs-http-source-selector@1.1.5/dist/videojs-http-source-selector.min.js"></script>


  <title>Practice</title>
  <!-- Intro settings -->
  <style>
    .hero-section {
      height: 80vh;
    }

    .location {
      width: 50%;
      border-radius: 9px;
    }

    .salery {
      width: 50%;
      border-radius: 9px;
    }

    .description {
      font-size: 14px;
    }

    .dummy {
      height: 200px;
      overflow: hidden;
    }

    .logo {
      height: 30px;
    }

    #intro {
      /* Margin to fix overlapping fixed navbar */
      margin-top: 58px;
    }

    @media (max-width: 991px) {
      #intro {
        /* Margin to fix overlapping fixed navbar */
        margin-top: 45px;
      }
    }
  </style>
  @include('site.header.header')
  @vite('resources/css/app.css')
</head>

<body>
  <!-- @ include('nav.nav') -->

  @include('site.nav.nav')
  <!-- Hero Section -->
  <div id="intro" class="position-relative text-center overflow-hidden hero-section">
    <!-- Background Image -->
    <img src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://images.ctfassets.net/wp1lcwdav1p1/2uQRrnlUBwOoqlNbcQSpYr/a4fbb0dbc1a6b5ba696410ff091039a8/GettyImages-2170485830.jpg" alt="Hero Background" class="w-100 h-100 position-absolute top-0 start-0 object-fit-cover" style="z-index: 0;">

    <!-- Overlay (optional for contrast) -->
    <div class="position-absolute text-center top-0 start-0 w-100 h-100 bg-dark opacity-50" style="z-index: 1;"></div>

    <!-- Content -->
    <div class="position-relative d-flex flex-column justify-content-center align-items-center h-100 p-5" style="z-index: 2;">
      <h1 class="mb-3 h2 text-white">JobNest</h1>
      <p class="mb-3 text-white">Where talent finds its home!</p>
      <div class="hero-buttons d-flex">
        <a class="btn btn-primary m-2" href="{{ route('employee.login') }}" role="button" rel="nofollow">Employee area</a>
        <a class="btn btn-primary m-2" href="{{ route('employer.login') }}" data-mdb-ripple-init role="button">Employer area</a>
      </div>
    </div>
  </div>



  <!-- Jumbotron -->
  <!-- <div id="intro" class="p-5 text-center bg-light">
      <h1 class="mb-3 h2">Hospital Management System</h1>
      <p class="mb-3">Care with Flair, Management Beyond Compare!</p>
      <a class="btn btn-primary m-2" href="login" role="button" rel="nofollow">Patient area</a>
      <a class="btn btn-primary m-2" href="doctor."
        data-mdb-ripple-init role="button">Doctor area</a>
    </div> -->
  <!-- Jumbotron -->
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="my-5">
    <div class="container">
      <!--Section: Content-->
      <section class="text-center">
        <h4 class="mb-5"><strong>Latest jobs </strong></h4>

        <div class="row">
          @foreach($jobs as $job)
          <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <a href="#" class="text-decoration-none">
              <div class=" card h-100">
                <!-- <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div> -->
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title text-start">{{ $job->title }}</h5>
                  <p class="card-text text-start">
                    {{ \Illuminate\Support\Str::words($job->description, 10, '...') }}
                  </p>
                  <div class="mt-auto">
                    <div class="location bg-secondary bg-opacity-10 py-1">
                      <p class="text-center text-black/50 mb-1">{{ $job->location }}</p>
                    </div>
                    <div class="salary">
                      <p class="text-center text-black/50 mb-0">$ {{ $job->salary }}/month</p>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          @endforeach
        </div>


        <h4 class="m-5"><strong>Portfolio </strong></h4>
        <div class="row">
          <div class="col-lg-4 col-md-12 mb-4">
            <div class="card h-100">
              <div class=" dummy bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                <img src="https://img.freepik.com/premium-photo/hacking-information-concept_670147-5645.jpg" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Post title</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the
                  card's content.
                </p>
                <a href="#!" class="btn btn-primary" data-mdb-ripple-init>Read</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <div class="dummy bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                <img src="https://sydneyinstitute.edu.au/wp-content/uploads/2024/05/AdobeStock_483545014-scaled.jpeg" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">Post title</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the
                  card's content.
                </p>
                <a href="#!" class="btn btn-primary" data-mdb-ripple-init>Read</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <div class="dummy">
                <video width="320" height="240" controls preload="auto">
                  <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4" />
                  Your browser does not support the video tag.
                </video>
              </div>
              <div class="card-body">
                <h5 class="card-title">Post title</h5>
                <p class="card-text">Some quick example text for the video card.</p>
                <a href="#!" class="btn btn-primary" data-mdb-ripple-init>Read</a>
              </div>
            </div>
          </div>


        </div>
      </section>
      <!--Section: Content-->

      <!-- Pagination -->
      <!-- <nav class="my-4" aria-label="...">
        <ul class="pagination pagination-circle justify-content-center">
          <li class="page-item">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav> -->
    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="bg-light text-lg-start">
    <!-- <div class="py-4 text-center">
      <a role="button" class="btn btn-primary btn-lg m-2" data-mdb-ripple-init
        href="https://www.youtube.com/channel/UC5CF7mLQZhvx8O5GODZAhdA" rel="nofollow" target="_blank">
        Learn Bootstrap 5
      </a>
      <a role="button" class="btn btn-primary btn-lg m-2" data-mdb-ripple-init href="https://mdbootstrap.com/docs/standard/" target="_blank">
        Download MDB UI KIT
      </a>
    </div> -->

    <hr class="m-0" />

    <div class="text-center py-4 align-items-center">
      <p>Social Network</p>
      <a href="#" class="btn btn-primary m-1" role="button" data-mdb-ripple-init
        rel="nofollow" target="_blank">
        <i class="fab fa-youtube"></i>
      </a>
      <a href="#" class="btn btn-primary m-1" role="button" rel="nofollow" data-mdb-ripple-init
        target="_blank">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#" class="btn btn-primary m-1" role="button" rel="nofollow" data-mdb-ripple-init
        target="_blank">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#" class="btn btn-primary m-1" role="button" rel="nofollow" data-mdb-ripple-init
        target="_blank">
        <i class="fab fa-github"></i>
      </a>
    </div>

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2025 Copyright:
      <a class="text-dark" href="#"><img src="{{ asset('logo.png') }}" alt="logo" class="logo">JobNest</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!--Footer-->

</body>

</html>