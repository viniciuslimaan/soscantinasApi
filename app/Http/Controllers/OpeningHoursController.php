<?php

namespace App\Http\Controllers;

use App\Models\OpeningHours;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OpeningHoursController extends Controller
{
    /**
     * Show all payment methods for a specific payment method
     *
     * @param integer $user_id
     * @return JsonResponse
     */
    public function index(int $user_id): JsonResponse
    {
        try {
            $return = OpeningHours::where('user_id', $user_id)->get();
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao listar todos os horários de atendimento do usuário!', 'error' => $e]];
            $code = 400;
        } finally {
            return response()->json($return, $code);
        }
    }

    /**
     * Add a new payment method
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $paymentMethodData = $request->all();

            OpeningHours::create($paymentMethodData);

            $return = ['data' => ['msg' => 'Horário de atendimento adicionado com sucesso!']];
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao adicionar um novo horário de atendimento!', 'error' => $e]];
            $code = 400;
        } finally {
            return response()->json($return, $code);
        }
    }

    /**
     * Show a specific payment method
     *
     * @param integer $user_id
     * @param integer $id
     * @return JsonResponse
     */
    public function show(int $user_id, int $id): JsonResponse
    {
        try {
            $return = OpeningHours::where([['user_id', $user_id], ['id', $id]])->get();
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao mostrar o horário de atendimento!', 'error' => $e]];
            $code = 400;
        } finally {
            return response()->json($return, $code);
        }
    }

    /**
     * Update a specific payment method
     *
     * @param Request $request
     * @param integer $user_id
     * @param integer $id
     * @return JsonResponse
     */
    public function update(Request $request, int $user_id, int $id): JsonResponse
    {
        try {
            $paymentMethodData = $request->all();
            $paymentMethod = OpeningHours::where([['user_id', $user_id], ['id', $id]]);

            $paymentMethod->update($paymentMethodData);

            $return = ['data' => ['msg' => 'Horário de atendimento editado com sucesso!']];
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao editar o horário de atendimento!', 'error' => $e]];
            $code = 400;
        } finally {
            return response()->json($return, $code);
        }
    }

    /**
     * Delete a specific payment method
     *
     * @param integer $user_id
     * @param integer $id
     * @return JsonResponse
     */
    public function destroy(int $user_id, int $id): JsonResponse
    {
        try {
            $paymentMethod = OpeningHours::where([['user_id', $user_id], ['id', $id]]);

            $paymentMethod->delete();

            $return = ['data' => ['msg' => 'Horário de atendimento excluído com sucesso!']];
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao excluir o horário de atendimento!', 'error' => $e]];
            $code = 400;
        } finally {
            return response()->json($return, $code);
        }
    }
}
