<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PPAgent') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="/pay.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'PPAgent') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                                <a class="nav-link" href="/suggestions">
                                    Users
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/suggestions">
                                    Suggestions
                                </a>
                            </li>
                        
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            </ul>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container py-4">
            @yield('content')
        </main>
    </div>


    <script>
        function paystackPay() {
    var amount = document.getElementById("amount").value * 100;
    var email = document.getElementById("email").value;
    var name = document.getElementById("name").value;
    // var phone = document.getElementById("phone").value;
    var room_id = document.getElementById("room_id").value;

    let handler = PaystackPop.setup({
        key: 'pk_test_aeb239c1402332dc262d56d7b1fab1d3b3450249',
        amount: amount,
        email: email,
        ref: '' + Math.floor((Math.random() * 1000000000) +
            1),
        onClose: function() {
            alert('Window closed.');
        },
        callback: function(response) {
            let reference = response.reference;

            // verify payment
            $.ajax({
                type: "GET",
                url: "{{ URL::to('payment-verification') }}",
                data: {
                    name: name,
                    email:email,
                    // phone:phone,
                    room_id: room_id,
                    reference:reference
                },
                success: function(response) {
                    console.log(response['status']);
                    if (response['status'] == true) {
                        Swal.fire({
                            title: 'Payment Successfully done',
                            text: response['message'],
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    } else {
                        Swal.fire({
                            title: 'Payment Failed',
                            text: 'Failed to verify payment',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                }
            })
        }
    });
    handler.openIframe();
}
</script>
</body>
</html>
