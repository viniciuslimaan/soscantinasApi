<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Authenticate route
     */
    public function __construct()
    {
        $this->middleware('auth.routes:admin,api,client', ['except' => ['index', 'show']]);
    }

    /**
     * Show all orders for a client
     *
     * @param integer $client_id
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $query = Order::query();

            if ($request->has('user_id')) {
                $query->where('user_id', $request->input('user_id'));
            }

            if ($request->has('client_id')) {
                $query->where('client_id', $request->input('client_id'));
            }

            if ($request->has('status')) {
                $query->where('status', $request->input('status'));
            }

            if ($request->has('sort')) {
                if ($request->input('sort') === 'status') {
                    $query->orderByRaw("FIELD(status, 'waiting', 'canceled', 'withdrawn')");
                }
            }

            $query->orderBy('created_at');

            $return = $query->with('client', 'user', 'orderItems.product')->get();
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao listar todas as encomendas!', 'error' => $e]];
            $code = 400;
        } finally {
            return response()->json($return, $code);
        }
    }

    /**
     * Add a new order
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $orderData = $request->all();

            Order::create($orderData);

            $return = ['data' => ['msg' => 'Encomenda feita com sucesso!']];
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao adicionar uma nova encomenda!', 'error' => $e]];
            $code = 400;
        } finally {
            return response()->json($return, $code);
        }
    }

    /**
     * Show a specific order
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $return = Order::with('client', 'user', 'orderItems.product')
                ->find($id)
                ->makeHidden(['client_id', 'user_id']);
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao mostrar a encomenda!', 'error' => $e]];
            $code = 400;
        } finally {
            return response()->json($return, $code);
        }
    }

    /**
     * Update a specific order
     *
     * @param Request $request
     * @param integer $client_id
     * @param integer $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $order = Order::findOrFail($id);

            if ($request->has('withdrawn_time')) {
                $order->withdrawn_time = $request->input('withdrawn_time');
            }

            if ($request->has('status')) {
                $order->status = $request->input('status');
            }

            if ($request->has('canceled_by')) {
                $order->canceled_by = $request->input('canceled_by');
            }

            $order->save();

            $return = ['data' => ['msg' => 'Encomenda editada com sucesso!']];
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao editar a encomenda!', 'error' => $e]];
            $code = 400;
        } finally {
            return response()->json($return, $code);
        }
    }

    /**
     * Delete a specific order
     *
     * @param integer $client_id
     * @param integer $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $order = Order::where('id', $id);
            OrderItem::where('order_id', $id)->delete();

            $order->delete();

            $return = ['data' => ['msg' => 'Encomenda excluída com sucesso!']];
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao excluir a encomenda!', 'error' => $e]];
            $code = 400;
        } finally {
            return response()->json($return, $code);
        }
    }
}
