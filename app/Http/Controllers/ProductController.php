<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Show all products for a user
     *
     * @param integer $user_id
     * @return JsonResponse
     */
    public function index(int $user_id): JsonResponse
    {
        try {
            $return = Product::where('user_id', $user_id)
                ->orderByRaw("FIELD(type, 'snack', 'other', 'drink', 'sweet')")
                ->get();
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao listar todos os produtos!', 'error' => $e]];
            $code = 400;
        } finally {
            return response()->json($return, $code);
        }
    }

    /**
     * Show all visible products for a user
     *
     * @param integer $user_id
     * @return JsonResponse
     */
    public function indexVisible(int $user_id): JsonResponse
    {
        try {
            $return = Product::where([['user_id', $user_id], ['hidden', 0]])
                ->orderByRaw("old_price IS NULL, FIELD(type, 'snack', 'other', 'drink', 'sweet')")
                ->orderByRaw("FIELD(type, 'snack', 'other', 'drink', 'sweet')")
                ->get();
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao listar todos os produtos!', 'error' => $e]];
            $code = 400;
        } finally {
            return response()->json($return, $code);
        }
    }

    /**
     * Add a new product
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $productData = $request->all();

            Product::create($productData);

            $return = ['data' => ['msg' => 'Produto adicionado com sucesso!']];
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao adicionar um novo produto!', 'error' => $e]];
            $code = 400;
        } finally {
            return response()->json($return, $code);
        }
    }

    /**
     * Show a specific product
     *
     * @param integer $user_id
     * @param integer $id
     * @return JsonResponse
     */
    public function show(int $user_id, int $id): JsonResponse
    {
        try {
            $return = Product::where([['id', $id], ['user_id', $user_id]])->get();
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao mostrar o produto!', 'error' => $e]];
            $code = 400;
        } finally {
            return response()->json($return, $code);
        }
    }

    /**
     * Update a specific product
     *
     * @param Request $request
     * @param integer $user_id
     * @param integer $id
     * @return JsonResponse
     */
    public function update(Request $request, int $user_id, int $id): JsonResponse
    {
        try {
            $productData = $request->all();
            $product = Product::where([['user_id', $user_id], ['id', $id]]);

            $product->update($productData);

            $return = ['data' => ['msg' => 'Produto editado com sucesso!']];
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao editar o produto!', 'error' => $e]];
            $code = 400;
        } finally {
            return response()->json($return, $code);
        }
    }

    /**
     * Delete a specific product
     *
     * @param integer $user_id
     * @param integer $id
     * @return JsonResponse
     */
    public function destroy(int $user_id, int $id): JsonResponse
    {
        try {
            $product = Product::where([['user_id', $user_id], ['id', $id]]);
            OrderItem::where('product_id', $id)->delete();

            $product->delete();

            $return = ['data' => ['msg' => 'Produto excluído com sucesso!']];
            $code = 200;
        } catch (\Exception $e) {
            $return = ['data' => ['msg' => 'Houve um erro ao excluir o produto!', 'error' => $e]];
            $code = 400;
        } finally {
            return response()->json($return, $code);
        }
    }
}
