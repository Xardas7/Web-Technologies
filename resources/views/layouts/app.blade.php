<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('includes.head')

<body>

    <div id="app">


        @include('includes.header')

        <main class="py-4">

            @yield('content')

            @include('includes.mostSearch')

        </main>

    </div>
    @include('includes.footer')
    <!-- Scripts -->
    @yield('js');
    @include('sweetalert::alert')
      <!-- Swal js -->
  <script src="{{ asset('js/sweetalert2.min.js')}}"></script>
  <!-- Toastr js -->
  <script src="{{ asset('js/toastr.min.js')}}"></script>

</body>

</html>