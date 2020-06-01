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
    <script src="{{ asset('js/app.js') }}"></script>
    @include('sweetalert::alert')

</body>

</html>