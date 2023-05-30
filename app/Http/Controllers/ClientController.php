<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Show all clients
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $return = Client::all();
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao listar todos os clientes!', 'error' => $e]];
            $code = 400;
        } finally {
            return response()->json($return, $code);
        }
    }

    /**
     * Add a new client
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $clientData = $request->all();

            Client::create($clientData);

            $return = ['data' => ['msg' => 'Cliente cadastrado com sucesso!']];
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao criar um novo cliente!', 'error' => $e]];
            $code = 400;
        } finally {
            return response()->json($return, $code);
        }
    }

    /**
     * Show a specific client
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $return = Client::find($id);
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao mostrar o cliente!', 'error' => $e]];
            $code = 400;
        } finally {
            return response()->json($return, $code);
        }
    }

    /**
     * Update a specific client
     *
     * @param Request $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $clientData = $request->all();
            $client = Client::find($id);

            $client->update($clientData);

            $return = ['data' => ['msg' => 'Cliente editado com sucesso!']];
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao editar o cliente!', 'error' => $e]];
            $code = 400;
        } finally {
            return response()->json($return, $code);
        }
    }

    /**
     * Delete a specific client
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            Client::find($id)->delete();

            $return = ['data' => ['msg' => 'Cliente excluído com sucesso!']];
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao excluir o cliente!', 'error' => $e]];
            $code = 400;
        } finally {
            return response()->json($return, $code);
        }
    }
}
