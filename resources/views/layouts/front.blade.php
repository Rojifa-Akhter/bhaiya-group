
<!DOCTYPE html>
<html lang="en">

<head >
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BHAIYA -    @yield('title') </title>
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="googlebot" content="index, follow">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="icon" href="/favicon.ico">



    <!-- Pixel Setup -->
      <!-- Facebook Pixel Code -->
      <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '787404720766346');
        fbq('track', 'PageView');
      </script>
      <noscript>
        <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=787404720766346&ev=PageView&noscript=1"/>
      </noscript>
      <!-- End Facebook Pixel Code -->

  @yield('meta')

      <!-- Preconnect for Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <!-- Google Font (Ubuntu) -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet" />

  <!-- Font Awesome async preload -->
  <link rel="preload" href="{{ asset('fontawesome/css/all.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript>
      <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
  </noscript>

<!-- Slick Slider CSS async preload -->
<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
      as="style" onload="this.onload=null;this.rel='stylesheet'">
<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
      as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
</noscript>

<!-- AOS CSS async preload -->
<link rel="preload" href="https://unpkg.com/aos@2.3.1/dist/aos.css"
      as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript>
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
</noscript>

<!-- Tailwind + Custom CSS -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
<noscript>
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
</noscript>

<!-- AOS JS defer -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>

</head>

<body class="font-manrope" data-page="index">

    <!--Start Header-->
    @include('frontend.partials.header')

    <main class="min-h-screen ">
        @yield('content')
    </main>
    <!--Start Footer-->
    @include('frontend.partials.footer')

    <!-- jQuery (required for Slick) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Slick Slider JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script src="https://unpkg.com/lenis@1.1.20/dist/lenis.min.js"></script>

    <!-- Custom JavaScript -->
  <script src="{{ asset('frontend/js/script.js') }}"></script>
 <script>
      const menuToggle = document.getElementById("menu-toggle");
      const closeDrawer = document.getElementById("close-drawer"); // ID matching
      const mobileDrawer = document.getElementById("mobile-drawer"); // ID matching
      const drawerOverlay = document.getElementById("drawer-overlay");

      function toggleMenu() {
        mobileDrawer.classList.toggle("translate-x-full");
      }

      menuToggle.addEventListener("click", toggleMenu);
      closeDrawer.addEventListener("click", toggleMenu);
      drawerOverlay.addEventListener("click", toggleMenu);
    </script>

</body>

</html>
