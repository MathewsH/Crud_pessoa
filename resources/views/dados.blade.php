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
                        <h1>Dados Pessoais</h1>
                        <h2>Id:{{isset($idD) && $idD != '' ? $idD : ''}}</h2>
                        <h2>Nome:{{isset($nomeD) && $nomeD != '' ? $nomeD : 'Insira o seu nome'}}</h2>
                        <h2>Email:{{isset($emailD) && $emailD != '' ? $emailD : ''}}</h2>
                        <h2>Idade:{{isset($idadeD) && $idadeD != '' ? $idadeD : 'Insira a sua idade'}}</h2>
                        <br>
                        <h1>Inserir/Alterar Dados Pessoais</h1>
                        <form method="post" action="{{route('alterar', ['id'=> $idD])}}">
                        @csrf
                        @method('PUT')
                            <div class= "form-group">
                                <label for="exampleInputEmail">Nome:</label>
                                <input type="nome" name="nome" placeholder="Insira o mesmo valor caso não for alterar" class="form-control" id="exampleInputnome" >
                            </div>
                            <div class= "form-group">
                                <label for="exampleInputEmail">Email:</label>
                                <input type="email" name="email" placeholder="Insira o mesmo valor caso não for alterar" class="form-control" id="exampleInputemail" >
                            </div>
                            <div class= "form-group">
                                <label for="exampleInputEmail">Idade:</label>
                                <input type="idade" name="idade" placeholder="Insira o mesmo valor caso não for alterar" class="form-control" id="exampleInputidade" >
                            </div>
                            <div class= "form-group">
                                <label for="exampleInputSenha">Senha:</label>
                                <input type="password" name="senha"  placeholder="Insira o mesmo valor caso não for alterar" class="form-control" id="exampleInputSenha" >
                                <input  type="hidden" name="tb_usuarios_id"  value="{{$idD}}" class="form-control" id="exampleInputSenha" >
                                
                            </div>
                            <button type = "submit" class="btn btn-pimary">Alterar dados</button>
                        </form>
                        <br>

                    </div>
            </div>
        <section>
    </body>
</html>
