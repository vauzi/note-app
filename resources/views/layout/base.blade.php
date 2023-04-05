<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('js/main.js') }}"></script>
</head>
<body>
  <!-- component -->
  <div class="w-full h-full">
    <div class="flex flex-no-wrap">
      <x-sidebar></x-sidebar>
      <div class="w-full relative">
        {{$slot}}
      </div>
    </div>
</div>

</body>
</html>