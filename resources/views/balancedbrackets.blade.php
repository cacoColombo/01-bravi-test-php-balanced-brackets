<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        html, body {
            background-color: white;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: bold;
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
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        span.valid {
            color: green;
            font-weight: bold;
        }

        span.invalid {
            color: red;
            font-weight: bold;
        }

    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Balanced Brackets
        </div>
        <div class="row">
            {{ Form::open(['route' => 'check', 'method' => 'POST', 'id' => 'formCheck']) }}
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::text('bracketsString', $bracketsString, ['class' => 'form-control materialize-textarea validate', 'id' => 'bracketsString']) }}
                        <!-- <textarea name="brackets" id="brackets" class="form-control materialize-textarea validate" value="{{ $bracketsString }}"></textarea> -->
                        <label for="bracketsString">Input the string of brackets...</label>
                        @if($errors->has('bracketsString'))
                            <div id="bracketsString-error" class="error">{{ $errors->first('bracketsString') }}</div>
                        @endif
                    </div>
                    @if(isset($response))
                        {!! $response !!}
                    @endif
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            {{ Form::close() }}

        </div>
    </div>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<script src="{{ URL::asset('js/formCheckValidation.js') }}"></script>
<script>
$(document).ready(function() {
    M.updateTextFields();
});
</script>
</html>
