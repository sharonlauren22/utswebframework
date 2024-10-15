<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- @vite('resources/css/app.css') -->
     <script src="https://cdn.tailwindcss.com"></script>

     <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  </script>
</head>

<body>
    @include('header')
    @yield('content')
    @include('footer')
</body>

</html>
