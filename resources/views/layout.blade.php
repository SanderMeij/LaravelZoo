<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel Zoo</title>

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
    <?php
        use App\Zoo;

        $zoo = Zoo::first();
        $money = $zoo->money;
        $guests = $zoo->guests;
        $moneyStatus = $money > 0 ? 'positive' : 'negative';
        $guestsStatus = $guests > 0 ? 'positive' : 'negative';
    ?>

    <div class="navbar">
        <ul>
            <li class="left"><p class={{ $guestsStatus }}> {{ $guests }} guests</p></li>
            <li><a href="/">Zoo</a></li>
            <li><a href="/shop">Shop</a></li>
            <li class="right"><p class={{ $moneyStatus }}>$ {{ $money }}</p></li>
        </ul>

    <div class="content">
        @yield('content')
    </div>

    <script src="{{ URL::asset('js/script.js') }}"></script>

    <div class="footer">
        Powered by <strong>Laravel</strong>
    </div>
</body>
</html>