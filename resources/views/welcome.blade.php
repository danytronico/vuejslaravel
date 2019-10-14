<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Congregacion cristiana</title>
        <link rel="icon" href="http://127.0.0.1:8000/images/logo_iglesia-01.png"/>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/vuetify/1.5.16/vuetify.min.css" rel="stylesheet">
        <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
        <script src="https://unpkg.com/jspdf-autotable@3.0.13/dist/jspdf.plugin.autotable.js"></script>
        <meta name="csrf-token" value="{{ csrf_token() }}" />

        <!-- Styles -->

    </head>
    <body>
    <div id="app">

    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
