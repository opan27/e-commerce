<!DOCTYPE html>
<html lang="en">

<head>
  @include('partials.head')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('partials.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('partials.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

   @yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('partials.footer')
  <!-- End Footer -->

  @include('partials.linkjs')

</body>

</html>
