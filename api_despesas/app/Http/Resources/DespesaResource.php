<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DespesaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_despesa' => $this->id,
            'descricao' => $this->descricao,
            'data' => $this->data,
            'id_dono_despesa' => $this->id_usuario,
            'valor_a_pagar' => "R$".strVal($this->valor)
        ];
    }
}
