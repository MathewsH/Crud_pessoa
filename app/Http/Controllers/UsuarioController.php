<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use App\Models\Pessoas;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    
    public function autenticacao(Request $request)
    {
        //regra de validação
        $regra =[
            'email' => 'email',
            'senha' => 'required'
        ];

        $feedback =[
            'email.email' => 'O campo deve ser obrigatorio',
            'senha.required' => 'O campo deve ser obrigatorio'
        ];
        //recuperação de paramentro
        $email = $request->get('email');
        $senha = $request->get('senha');

 
        $request->validate($regra, $feedback);
        

        $usuario = new Usuarios();
        $pessoas = new Pessoas();
        $existe = $usuario->where('email', $email)
        ->where('senha', $senha)
        ->get()->first();
        
        
        
        if(isset($existe->email)){
            $id = $existe->id;
            
            $pessoas = Pessoas::where('tb_usuarios_id', $id)->get()->first();
            
            if(isset($pessoas->nome)){
                $pessoasi = $pessoas->idade;
                $pessoasiD = $pessoas->id;
                $pessoasn = $pessoas->nome;
                $usuarioE = $existe->email;
                return redirect()->route('dados',['pessoasiD'=> $pessoasiD ,'idadeD'=> $pessoasi,'nomeD'=>$pessoasn, 'idD'=> $existe->id,'emailD'=> $usuarioE]); 
            }
            else{
                
                $usuarioE = $existe->email;
                
                return redirect()->route('dados',['emailD'=> $usuarioE, 'idD'=> $existe->id]);
        
            }
            
            }
        else{
            return redirect()->route('welcome');
        }

    }

    public function register(Request $request){
        $regra =[
            'email' => 'email',
            'senha' => 'required'
        ]; 
        

        $feedback =[
            'email.email' => 'O campo deve ser um email valido',
            'senha.required' => 'O campo deve ser obrigatorio'
        ];   
        $request->validate($regra, $feedback);
        
        
        
        $usuario = new Usuarios();
        $usuario->create($request->all());
        return redirect()->route('welcome');
    }

    public function home(Request $request){

        return redirect()->route('welcome');
    }

    public function alterar(Request $request, $id){
        $regra =[
            'email' => 'email',
            'senha' => 'required',
            'nome' => 'required',
            'idade' => 'required',
            'tb_usuarios_id' => 'required',
        ];

        if(Pessoas::find($id)){
            $pessoas = new Pessoas();
            $pessoas = Pessoas::where('id',$id);
            $pessoas->update($request->all('nome', 'idade'));
            $usuario = new Usuarios();
            $usuario = Usuarios::find($id);
            $usuario->update($request->all('email', 'senha'));

        return redirect()->route('welcome');        
        }
        else{
            
            $pessoas = new Pessoas();
            $pessoas->create($request->all('nome','idade','tb_usuarios_id'));
            return redirect()->route('welcome');
        }



    }


}

