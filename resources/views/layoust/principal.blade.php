<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    {!!Html::style('foundation/css/foundation.css')!!}
    {!!Html::style('foundation/css/estilo.css')!!}

  </head>
  <body>
    @yield('content')
    
    {!!Html::script('foundation/js/vendor/jquery.js')!!}
    {!!Html::script('foundation/js/vendor/what-input.js')!!}
    {!!Html::script('foundation/js/vendor/foundation.js')!!}
    {!!Html::script('foundation/js/script.js')!!}
  </body>
</html>
