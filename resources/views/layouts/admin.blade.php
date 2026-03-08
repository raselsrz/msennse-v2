<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   @include('admin.includes.head')
   @stack('css')
   <style>
      .pagination .page-item.active .page-link {
      background-color: #00d4ff; /* Set your desired active background color */
      border-color: #00d4ff;     /* Match the border color */
      color: #fff;               /* Set text color for better readability */
  }
  
  .pagination .page-item .page-link {
      color: #00d4ff;            /* Default color for links */
  }
  
  .pagination .page-item .page-link:hover {
      background-color: #00d4ff; /* Hover background color */
      color: #fff;               /* Hover text color */
  }
  
   </style>

</head>
<body>
     @include('admin.includes.header')
     @yield('content')
     @include('admin.includes.footer')
     @stack('js')
</body>
</html>