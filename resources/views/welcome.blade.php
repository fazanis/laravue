<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="{{asset('js/app.js')}}" defer></script>
        <style src="{{asset('js/app.css')}}" defer></style>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    <div id="app">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel + vue
                </div>
                <div class="tabs">
                    <input id="tab1" type="radio" name="tabs" checked>
                    <label for="tab1" title="Вкладка 1">1</label>

                    <input id="tab2" type="radio" name="tabs">
                    <label for="tab2" title="Вкладка 2">Ajax</label>

                    <input id="tab3" type="radio" name="tabs">
                    <label for="tab3" title="Вкладка 3">Вкладка 3</label>

                    <input id="tab4" type="radio" name="tabs">
                    <label for="tab4" title="Вкладка 4">Вкладка 4</label>

                    <section id="content-tab1">
                        <p>
                            <one-component :urldata="{{json_encode($url_data)}}"></one-component>
                        </p>
                    </section>
                    <section id="content-tab2">
                        <p>
                            <ajax-component></ajax-component>
                        </p>
                    </section>
                    <section id="content-tab3">
                        <p>
                            <ajax-bilets></ajax-bilets>
                        </p>
                    </section>
                    <section id="content-tab4">
                        <p>
                            Здесь размещаете любое содержание....
                        </p>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Базовый контейнер табов */
        .tabs {
            min-width: 320px;
            max-width: 800px;
            padding: 0px;
            margin: 0 auto;
        }
        /* Стили секций с содержанием */
        .tabs>section {
            display: none;
            padding: 15px;
            background: #fff;
            border: 1px solid #ddd;
        }
        .tabs>section>p {
            margin: 0 0 5px;
            line-height: 1.5;
            color: #383838;
            /* прикрутим анимацию */
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
            -webkit-animation-name: fadeIn;
            animation-name: fadeIn;
        }
        /* Описываем анимацию свойства opacity */

        @-webkit-keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        /* Прячем чекбоксы */
        .tabs>input {
            display: none;
            position: absolute;
        }
        /* Стили переключателей вкладок (табов) */
        .tabs>label {
            display: inline-block;
            margin: 0 0 -1px;
            padding: 15px 25px;
            font-weight: 600;
            text-align: center;
            color: #aaa;
            border: 0px solid #ddd;
            border-width: 1px 1px 1px 1px;
            background: #f1f1f1;
            border-radius: 3px 3px 0 0;
        }
        /* Шрифт-иконки от Font Awesome в формате Unicode */
        .tabs>label:before {
            font-family: fontawesome;
            font-weight: normal;
            margin-right: 10px;
        }
        .tabs>label[for*="1"]:before {
            content: "\f19a";
        }
        .tabs>label[for*="2"]:before {
            content: "\f17a";
        }
        .tabs>label[for*="3"]:before {
            content: "\f13b";
        }
        .tabs>label[for*="4"]:before {
            content: "\f13c";
        }
        /* Изменения стиля переключателей вкладок при наведении */

        .tabs>label:hover {
            color: #888;
            cursor: pointer;
        }
        /* Стили для активной вкладки */
        .tabs>input:checked+label {
            color: #555;
            border-top: 1px solid #009933;
            border-bottom: 1px solid #fff;
            background: #fff;
        }
        /* Активация секций с помощью псевдокласса :checked */
        #tab1:checked~#content-tab1, #tab2:checked~#content-tab2, #tab3:checked~#content-tab3, #tab4:checked~#content-tab4 {
            display: block;
        }
        /* Убираем текст с переключателей
        * и оставляем иконки на малых экранах
        */

        @media screen and (max-width: 680px) {
            .tabs>label {
                font-size: 0;
            }
            .tabs>label:before {
                margin: 0;
                font-size: 18px;
            }
        }
        /* Изменяем внутренние отступы
        *  переключателей для малых экранов
        */
        @media screen and (max-width: 400px) {
            .tabs>label {
                padding: 15px;
            }
        }

    </style>
    </body>
</html>
