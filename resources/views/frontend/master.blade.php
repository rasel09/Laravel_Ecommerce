<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online | Shop</title>

   @include('frontend.include.style')
</head>

<body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}

   @include('frontend.include.header')
   
     @include('frontend.include.sidebar')
                
     @yield('content')

     @include('frontend.include.footer')
     @include('frontend.include.script')

</body>

</html>
