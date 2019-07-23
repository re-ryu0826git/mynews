<!DOCTYPE html>
<!--{{}}で囲まれたコードは、PHPで書かれた内容を表示するという意味-->
<html lang="{{ app()->getLocale()}}">
    <head>
        <meta charset="utf-8">
        <!--windowsの基本ブラウザであるedgeに対応するという記載-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--スマートフォンで見たときなどに文字や画像の大きさを調整してくれるタグ-->
        <meta name="viewport" content="width=device-witdh, initial-scale=1">
        
        <!-- CSRF Token -->
         <!--{{-- 後の章で説明します --}}-->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!--{{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}-->
        <title>@yield('title')</title>
        
        <!-- Scripts -->
        <!--{{-- Laravel標準で用意されているJavascriptを読み込むます --}}-->
        <!--asset(‘ファイルパス’)は、publicディレクトリのパスを返す関数のこと-->
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        
        <!-- Fonts -->
        <link rel ="dns-prefetch" href="https://fonts.gstatic.com">
        <Link href="https//fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
            
        <!-- Styles -->
        <!--{{-- Laravel標準で用意されているCSSを読み込みます}}-->
        <link href="{{ secure_asset('css/app.css')}}" rel="stylesheet">
        <!--{{-- この章の後半で作成するCSSを読み込みます}}-->
        <link href="{{ secure_asset('css/admin.css')}}" rel="stylesheet">
    </head>
    
    <body>
        <div id="app">
            <!--{{-- 画面上部に表示するナビゲーションバーです。 --}}-->
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                <div class="container">
                    <!--url(“パス”)は、URLを返すメソッド-->
                    <a class="navbar-brand" href="{{ url('/')}}">
                        <!--configフォルダのapp.phpの中にあるnameにアクセスをします。基本的にはアプリケーションの名前「Laravel」が格納されています。-->
                        {{ config('app.name', 'Laravel')}}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" area-label="Toggle navigation"></button>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            
                        </ul>
                        
                        <!-- Right Side OF Navbar -->
                        <ul class="navbar-nav ml-auto">
                            
                        </ul>
                    </div>
                </div>
            </nav>
            <!--{{-- ここまでナビゲーションバー --}}-->
            
            <main class="py-4">
                <!--{{-- コンテンツをここに入れるため、@yieldで空けておきます。--}}-->
                @yield('content')
            </main>
            
        </div>
    </body>
</html>
    




