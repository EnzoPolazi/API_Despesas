<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\CadastrarUserRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

/**
 *  Esse controller é utilizado para declaração de todos os métodos responsáveis pela autenticação do usuário
 */

class AuthController extends Controller
{
    /**
     * Cadastra um novo usuário
     */
    public function cadastrar(CadastrarUserRequest $request){
        //Cria um array com os dados já validados
        $fields = $request->validated();

        //Cria o novo usuário
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        //Gera um token para o novo usuário
        $token = $user->createToken('token_autenticacao')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        //Retorna o user e seu token, e não uma mensagem de sucesso, apenas para fins de teste.
        return response($response, 201);
    }

    /**
     * Realiza login do usuário
     */
    public function login(Request $request){
        //Cria um array com os dados já validados
        $fields = $request->validated();

        //Busca usuario com o email informado
        $user = User::where('email', $fields['email'])->first();

        //Verifica login
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response('Email ou senha incorretos', 401);
        }

        //Gera um token para o novo usuário
        $token = $user->createToken('token_autenticacao')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        //Retorna o user e seu token, e não uma mensagem de sucesso, apenas para fins de teste.
        return response($response, 201);
    }

    /**
     * Realiza logout do usuário
     */
    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return response('Saiu com sucesso!', 201);;
    }
}
