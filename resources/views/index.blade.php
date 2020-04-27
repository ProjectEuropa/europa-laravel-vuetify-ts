<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="api-token" content="{{ session()->get('api_token') ?? '' }}">
        <title>Laravel</title>
    </head>
    <body>
      <div id="app" >
        <app :auth="{{ Auth::user() ?? 'null' }}" flash="{{ session('message') ?? null }}" />      </div>
      <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
