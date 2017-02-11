<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="login-status" content="{{ Auth::check() }}">
        <meta id="token" name="token" content="{{ csrf_token() }}">

        @if(Auth::check())
        <meta name="login-user-id" content="{{ Auth::user()->id }}">
        <meta name="login-user-admin" id="admin" content="{{ Auth::user()->hasRole('admin') }}">
        @endif

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" type="text/css" href="{{ elixir('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.min.css">
        <script>window.Laravel = @php echo json_encode(['csrfToken' => csrf_token()]) @endphp</script>

    </head>
    <body>
    
        <main-template></main-template>

        <script src="{{ elixir('/js/app.js') }}"></script>
    </body>
</html>
