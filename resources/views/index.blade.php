<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('slack.community') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:700italic,400,600,300,700,800" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Open Sans', sans-serif;
                font-weight: 300;
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

            .content {
                text-align: center;
            }

            .sign-in {
                font-size: 13px;
            }

            .form-item {
                font-size: 1rem;
                vertical-align: middle;
                display: block;
                text-align: center;
                box-sizing: border-box;
                width: 100%;
                padding: 5px;
            }

            button {
                color: #fff;
                font-weight: 600;
                margin-top: 1rem;
                border-width: 0;
                background: #3b7bd2;
                cursor: pointer;
                appearence: none;
                -webkit-appearence: none;
                outline: 0;
            }

            .error {
                color: #d23b3b;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="m-b-md">
                    <img src="{{ $logo }}" alt="{{ config('slack.community') }}" /><br/>
                    Join <strong>{{ config('slack.community') }}</strong> on Slack.<br>
                    <p class="status"><b class="active">{{ $members['online'] }}</b> users online now of <b class="total">{{ $members['total'] }}</b> registered.</p>
                </div>


                <form class="m-b-md" method="post">
                    <input class="form-item" required name="email" value="{{ old('email') }}" type="email" placeholder="you@yourdomain.com" />

                    @if ($errors->has('email'))
                        <span class="error">{{$errors->first('email')}}</span>
                    @endif

                    <button class="form-item" type="submit">Join</button>
                    {!! csrf_field() !!}
                </form>

                <span class="sign-in">or <a href="http://{{ config('slack.url') }}">sign in</a></span>
            </div>
        </div>
    </body>
</html>
