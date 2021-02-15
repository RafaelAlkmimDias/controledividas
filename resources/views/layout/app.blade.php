<?php date_default_timezone_set('America/Sao_Paulo'); ?>
<!DOCTYPE html>

<html dir="ltr" lang="pt">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Aplicação de exibição de controle de credito.">
        <meta name="author" content="Rafael de Alkmim Dias">
        <link rel="stylesheet" href="{{ asset('css/layout/app.css') }}">
        <title>Controle de contas</title>
        @yield('css')
    </head>

    <body>
        <div class="top-bar">
            <a class="btn top-bar-title" href="{{ route('divida.index') }}">
                Controle de Credito
            </a>
        </div>
        @if( Session::has("errors"))
        <div class="error-message-div">
            <div class="message-text">
                <ul>
                    @foreach(Session::get("errors") as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
        @if( Session::has("success") )
        <div class="sucess-message-div">
            <div class="message-text">
                <ul>
                    <il>    {{ Session::get('success') }}   </il>
                </ul>
            </div>
        </div>
        @endif

        <div class="content">
            @yield('content')
        </div>
        
        
        @yield('js')
    </body>



</html>