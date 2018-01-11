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
                    <strong>{{ config('slack.community') }}</strong><br>
                    <p>
                        @if ($response->ok === false)
                            @if ($response->error === 'invalid_email')
                                The E-Mail you provided was invalid. Please <a href="/">try again</a>.
                            @elseif ($response->error === 'already_invited' || $response->error === 'already_in_team')
                                Success! You were already invited.<br>
                                Visit <a href="https://{{ config('slack.url') }}">{{ config('slack.community') }}</a>.
                            @endif
                        @else
                            Success! Check &ldquo;{{ $email }}&rdquo; for an invite from Slack.
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
