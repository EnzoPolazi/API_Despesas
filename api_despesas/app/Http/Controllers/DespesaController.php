<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use App\Models\User;
use App\Http\Resources\DespesaResource;
use App\Http\Requests\StoreDespesaRequest;
use App\Http\Requests\UpdateDespesaRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\NovaDespesa;
use Illuminate\Http\Request;

/**
 *  Esse controller é utilizado para declaração de todos os métodos responsáveis pelo funcionamento
 * das rotas do CRUD de despesas.
 * 
 *  O controle de acesso (ACL) utilizando Polices foi feito por método para um controle mais direcionado e específico.
 *  Cada função passa por uma transformação em um Resource para melhor manipulação e exibição dos dados.
 * 
 *  Obs: O envio de emails poderia ser abstraído para um service com responsabilidade única,
 * mas optei por manter no controller para manter a simplicidade da API.
 */

class DespesaController extends Controller
{
    /**
     * Cria uma nova despesa.
     */
    public function store(StoreDespesaRequest $request)
    {
        if(!auth()->user()->can('create', Despesa::class)){
            return response('Não autorizado', 403);
        }
        
        //Cria a despesa e prepara para envio do email
        $dadosDespesa = new DespesaResource(Despesa::create($request->validated()));

        //Busca dados do usuário no qual a despesa foi cadastrada, e envia um email para ele.
        $this->enviarEmail($dadosDespesa);

        return response('Despesa criada com sucesso', 201);
    }

    /**
     * Envia um email para o dono da despesa criada.
     */
    protected function enviarEmail(DespesaResource $dadosDespesa): bool
    {
        $userDestino = User::findOrFail($dadosDespesa['id_usuario']);
        Mail::to($userDestino['email'])->send(new NovaDespesa($dadosDespesa));
        return true;
    }

    /**
     * Busca uma despesa específica.
     */
    public function show(string $id)
    {
        if(!auth()->user()->can('show', $id)){
            return response('Não autorizado', 403);
        }
        return response(new DespesaResource(Despesa::findOrFail($id)), 201);
    }

    /**
     * Atualiza uma despesa específica
     */
    public function update(UpdateDespesaRequest $request, string $id)
    {
        if(!auth()->user()->can('update', UpdateDespesaRequest::class)){
            return response('Não autorizado', 403);
        }
        $despesa = Despesa::find($id);
        $despesa->update($request->validated());

        return response($despesa, 201);
    }

    /**
     * Remove uma despesa específica
     */
    public function destroy(string $id)
    {
        if(!auth()->user()->can('delete', $id)){
            return response('Não autorizado', 403);
        }

        return response(Despesa::destroy($id), 201);
    }
}
