<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="{{asset('js/app.js')}}" defer></script>
        <style src="{{asset('js/app.css')}}" defer></style>
        <!-- Styles -->
        <style>


            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
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
                    <input id="tab1" type="radio" name="tabs">
                    <label for="tab1" title="Вкладка 1">1</label>

                    <input id="tab2" type="radio" name="tabs">
                    <label for="tab2" title="Вкладка 2">Ajax</label>

                    <input id="tab3" type="radio" name="tabs">
                    <label for="tab3" title="Вкладка 3">Билеты</label>

                    <input id="tab4" type="radio" name="tabs">
                    <label for="tab4" title="Вкладка 4">Линейная</label>

                    <input id="tab5" type="radio" name="tabs">
                    <label for="tab5" title="Вкладка 5">Круговая</label>

                    <input id="tab6" type="radio" name="tabs">
                    <label for="tab6" title="Вкладка 6">Изменяемая</label>

                    <input id="tab7" type="radio" name="tabs" checked>
                    <label for="tab7" title="Вкладка 7">AJAX LOAD</label>

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
                            <chartline-component></chartline-component>
                        </p>
                    </section>

                    <section id="content-tab5">
                        <p>
                            <chartpie-component></chartpie-component>
                        </p>
                    </section>
                    <section id="content-tab6">
                        <p>
                            <chartlineupdate-component></chartlineupdate-component>
                        </p>
                    </section>
                    <section id="content-tab7">
                        <p>
                            <ajaxload-component></ajaxload-component>
                        </p>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Базовый контейнер табов */
        .tabs {
            /*min-width: 320px;*/
            /*max-width: 800px;*/
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
        .tabs>label[for*="5"]:before {
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
        #tab1:checked~#content-tab1, #tab2:checked~#content-tab2, #tab3:checked~#content-tab3, #tab4:checked~#content-tab4
        ,#tab5:checked~#content-tab5,#tab6:checked~#content-tab6, #tab7:checked~#content-tab7 {
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
