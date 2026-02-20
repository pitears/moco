<!doctype html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>@yield('title')</title>
  {{-- Slot title agar bisa diisi tiap halaman --}}

  <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
  {{-- Asset CSS hasil build --}}

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
  <div class="w-full">
    @include('includes.navbar')

    @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="{{ asset('assets/js/swiper.js') }}"></script>
  {{-- Asset JS Swiper --}}
</body>

</html>
