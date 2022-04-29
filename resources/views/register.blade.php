<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            .row{
                margin-top: 25%;
            }
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body >
        <section>
            <div class = "container">
                <div class = "row">
                    <div class= "col-md-6 offset-md-3">
                    <h1>Cadastro</h1>
                        <form method="post" action="{{route('register.user')}}">
                        @csrf
                            <div class= "form-group">
                                <label for="exampleInputEmail">Email:</label>
                                <input type="email" name="email" value="{{ old('email')}}" class="form-control" id="exampleInputEmail" >
                                {{$errors->has('email') ? $errors->first('email') : ''}}
                            </div>
                            <div class= "form-group">
                                <label for="exampleInputSenha">Senha:</label>
                                <input type="password" name="senha"  class="form-control" id="exampleInputSenha" >
                                
                            </div>

                            <button type = "submit" class="btn btn-pimary">Cadastrar</button>
                            
                            
                        </form>
                       <br>

                    </div>
            </div>
        <section>
    </body>
</html>
