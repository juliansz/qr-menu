<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $landing->name }}</title>
        <link rel="stylesheet" href="http://127.0.0.1:8000/vendor/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/front.css') }}">
    </head>
    <body style="background:{{ config('qr.background-color') }};">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 col-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">{{ $landing->name }}</h3>
                            <p>{{ $landing->description }}</p>
                        </div>
                        @foreach($landing->contents as $content)
                            <a href="{{ $content->link }}" download class="text-center">
                                @if($content->thumbnail_path)<img class="img-fluid thumbnail" src="{{ $content->thumbnail_url }}" />@endif
                                <h4>{{ $content->name }}</h4>
                                <p>{{ $content->description }}</p>
                            </a>
                        @endforeach
                        @if(config('qr.enable-whatsapp-sharing'))
                        <div>
                            <a href="https://wa.me/?text={{ urlencode($landing->link) }}" class="share"><i class="fab fa-whatsapp"></i> Share</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @if(config('qr.google-analytics-ua-code'))
                <!-- Global site tag (gtag.js) - Google Analytics -->
                <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('qr.google-analytics-ua-code') }}"></script>
                <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', '{{ config('qr.google-analytics-ua-code') }}');
                </script>
            @endif
        </div>


        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    </body>
</html>