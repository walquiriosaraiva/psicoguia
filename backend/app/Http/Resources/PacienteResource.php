<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PacienteResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'telefone_celular' => $this->telefone_celular,
            'telefone_fixo' => $this->telefone_fixo,
            'email' => $this->email,
            'id_forma_cobranca' => $this->id_forma_cobranca,
            'valor' => $this->valor,
            'id_pacote' => $this->id_pacote,
            'id_convenio' => $this->id_convenio,
            'numero_cartao' => $this->numero_cartao,
            'data_expiracao' => $this->data_expiracao ? $this->data_expiracao->format('d/m/Y') : '',
            'observacao' => $this->observacao,
            'created_at' => $this->created_at ? $this->created_at->format('d/m/Y') : '',
            'updated_at' => $this->updated_at ? $this->updated_at->format('d/m/Y') : '',
        ];
    }
}
