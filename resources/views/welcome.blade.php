<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" type="text/css" href="{{ elixir('css/app.css') }}">

        <script>var userIsLoggedIn = {{ Auth::check() }};</script>
    </head>
    <body>
    
        <main-template></main-template>

        <script src="{{ elixir('/js/app.js') }}"></script>
    </body>
</html>
