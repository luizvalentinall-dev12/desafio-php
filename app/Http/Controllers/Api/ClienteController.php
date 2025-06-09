<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ClienteResource;
use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Cache;
use App\Rules\CpfValido;
use App\Services\CepService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cache::remember('clientes', 60, function () {
            return ClienteResource::collection(Cliente::all());
        });

        return $clientes;
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome_completo' => 'required|string|max:255',
            'cpf' => ['required', 'string', 'unique:clientes,cpf', new CpfValido],
            'email' => 'required|email|unique:clientes,email',
            'telefone' => 'required|string',
            'cep' => 'required|string|size:8',
        ]);

        try {
            $cepService = new CepService();
            $endereco = $cepService->buscarEnderecoPorCep($dados['cep']);

            $cliente = Cliente::create([
                'nome_completo' => $dados['nome_completo'],
                'cpf' => $dados['cpf'],
                'email' => $dados['email'],
                'telefone' => $dados['telefone'],
                'cep' => $dados['cep'],
                'logradouro' => $endereco['street'],
                'bairro' => $endereco['neighborhood'],
                'cidade' => $endereco['city'],
                'estado' => $endereco['state'],
            ]);

            Cache::forget('clientes');
            return response()->json([
                'message' => 'Cliente criado com sucesso.',
                'cliente' => new ClienteResource($cliente),
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 422);
        }
    }
    
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json(['message' => 'Cliente não encontrado.'], 404);
        }

        $dados = $request->validate([
            'nome_completo' => 'required|string|max:255',
            'cpf' => ['required', 'string', 'unique:clientes,cpf,' . $id, new CpfValido],
            'email' => 'required|email|unique:clientes,email,' . $id,
            'telefone' => 'required|string',
            'cep' => 'required|string|size:8',
        ]);

        try {
            $cepService = new CepService();
            $endereco = $cepService->buscarEnderecoPorCep($dados['cep']);

            $cliente->update([
                'nome_completo' => $dados['nome_completo'],
                'cpf' => $dados['cpf'],
                'email' => $dados['email'],
                'telefone' => $dados['telefone'],
                'cep' => $dados['cep'],
                'logradouro' => $endereco['street'],
                'bairro' => $endereco['neighborhood'],
                'cidade' => $endereco['city'],
                'estado' => $endereco['state'],
            ]);

            Cache::forget('clientes');

            return response()->json([
                'message' => 'Cliente editado com sucesso.',
                'cliente' => new ClienteResource($cliente),
            ]);
        
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 422);
        }
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json(['message' => 'Cliente não encontrado.'], 404);
        }

        try {
            $cliente->delete();
            Cache::forget('clientes');

            return response()->json(['message' => 'Cliente excluído com sucesso.'], 200);

        } catch (Exception $e) {
            return response()->json(['message' => 'Erro ao tentar excluir o cliente.'], 500);
        }
    }
}
