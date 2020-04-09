<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyApp | Abnation</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/dropzone.css') }}" />

</head>
<body>



      @yield('content')
        <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="{{ asset('public/assets/js/dropify.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/dropzone.js') }}"></script>
    @yield('javascript')
</body>
</html>