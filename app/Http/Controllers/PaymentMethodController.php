<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Authenticate route
     */
    public function __construct()
    {
        $this->middleware('auth.routes:admin,api', ['except' => ['index', 'show']]);
    }

    /**
     * Show all payment methods for a specific user
     *
     * @param integer $user_id
     * @return JsonResponse
     */
    public function index(int $user_id): JsonResponse
    {
        try {
            $return = PaymentMethod::where('user_id', $user_id)->get();
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao listar todos os métodos de pagamentos do usuário!', 'error' => $e]];
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

            PaymentMethod::create($paymentMethodData);

            $return = ['data' => ['msg' => 'Método de pagamento adicionado com sucesso!']];
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao adicionar um novo método de pagamento!', 'error' => $e]];
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
            $return = PaymentMethod::where([['id', $id], ['user_id', $user_id]])->get();
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao mostrar o método de pagamento!', 'error' => $e]];
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
            $paymentMethod = PaymentMethod::where([['user_id', $user_id], ['id', $id]]);

            $paymentMethod->update($paymentMethodData);

            $return = ['data' => ['msg' => 'Método de pagamento editado com sucesso!']];
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao editar o método de pagamento!', 'error' => $e]];
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
            $paymentMethod = PaymentMethod::where([['user_id', $user_id], ['id', $id]]);

            $paymentMethod->delete();

            $return = ['data' => ['msg' => 'Método de pagamento excluído com sucesso!']];
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao excluir o método de pagamento!', 'error' => $e]];
            $code = 400;
        } finally {
            return response()->json($return, $code);
        }
    }
}
