<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Exception;

class CepService
{
    /**
     * Busca o endereço pelo CEP.
     *
     * @param string $cep
     * @return array
     * @throws Exception
     */
    public function buscarEnderecoPorCep(string $cep): array
    {
        $response = Http::get("https://brasilapi.com.br/api/cep/v1/{$cep}");

        if ($response->failed()) {
            $erro = $response->json('message') ?? 'Houve um erro ao buscar o endereço. Verifique o CEP informado.';
            throw new Exception($erro);
        }

        return $response->json();
    }
}