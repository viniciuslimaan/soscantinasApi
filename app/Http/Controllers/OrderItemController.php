<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Authenticate route
     */
    public function __construct()
    {
        $this->middleware('auth.routes:admin,api,client', ['except' => ['index']]);
    }

    /**
     * Show all items for a order
     *
     * @param integer $order_id
     * @return JsonResponse
     */
    public function index(int $order_id): JsonResponse
    {
        try {
            $return = OrderItem::with('product')
                ->where('order_id', $order_id)
                ->get()
                ->makeHidden(['order_id', 'product_id']);
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao listar todas os itens da encomenda!', 'error' => $e]];
            $code = 400;
        } finally {
            return response()->json($return, $code);
        }
    }

    /**
     * Add a new order item
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $orderData = $request->all();

            OrderItem::create($orderData);

            $return = ['data' => ['msg' => 'Item adicionado a encomenda com sucesso!']];
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao adicionar um novo item a encomenda!', 'error' => $e]];
            $code = 400;
        } finally {
            return response()->json($return, $code);
        }
    }

    /**
     * Update a specific order item
     *
     * @param Request $request
     * @param integer $order_id
     * @param integer $id
     * @return JsonResponse
     */
    public function update(Request $request, int $order_id, int $id): JsonResponse
    {
        try {
            $orderData = $request->all();
            $order = OrderItem::where([['order_id', $order_id], ['id', $id]]);

            $order->update($orderData);

            $return = ['data' => ['msg' => 'Item editado com sucesso!']];
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao editar o item!', 'error' => $e]];
            $code = 400;
        } finally {
            return response()->json($return, $code);
        }
    }

    /**
     * Delete a specific order item
     *
     * @param integer $order_id
     * @param integer $id
     * @return JsonResponse
     */
    public function destroy(int $order_id, int $id): JsonResponse
    {
        try {
            $order = OrderItem::where([['order_id', $order_id], ['id', $id]]);

            $order->delete();

            $return = ['data' => ['msg' => 'Item excluído com sucesso!']];
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao excluir o item!', 'error' => $e]];
            $code = 400;
        } finally {
            return response()->json($return, $code);
        }
    }
}
