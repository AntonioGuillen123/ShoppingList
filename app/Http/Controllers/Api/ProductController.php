<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->getAllProducts();

        return $this->responseWithSuccess($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validateData($request, 'store');

        $exists = $this->checkIfProductExists($validated['name']);

        if ($exists) {
            return $this->responseWithError('The product you have entered already exists', 406);
        }

        $product = $this->createProduct($validated);

        return $this->responseWithSuccess($product, 201);
    }

    /**
     * Display the specified resource.
     */
    /* public function show(Product $product)
    {
        //
    } */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $product = $this->getProductById($id);

        if(!$product){
            return $this->responseWithError('The product id does not exist', 404);
        }

        $validated = $this->validateData($request, 'update');

        $productUpdated = $this->updateProduct($product, $validated);

        return $this->responseWithSuccess($productUpdated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $product = $this->getProductById($id);

        if(!$product){
            return $this->responseWithError('The product id does not exist', 404);
        }

        $this->deleteProduct($product);

        return $this->responseWithSuccess([], 204);
    }

    private function getAllProducts()
    {
        return Product::all();
    }

    private function checkIfProductExists($name)
    {
        return Product::where('name', $name)->first();
    }

    private function createProduct($data)
    {
        return Product::create($data)->refresh();
    }

    private function getProductById(int $id)
    {
        return Product::find($id);
    }

    private function updateProduct($product, $data){
        $product->update($data);

        return $product->refresh();
    }

    private function deleteProduct(Product $product){
        $product->delete();
    }

    private function validateData(Request $request, string $option)
    {
        $rules = $option === 'store'
            ? [
                'name' => 'required|string|max:255',
                'description' => 'string|max:255'
            ]
            : [
                'name' => 'string|max:255',
                'description' => 'string|max:255'
            ];

        return $request->validate($rules);
    }


    private function responseWithSuccess(mixed $data, int $status = 200)
    {
        return response()->json($data, $status);
    }

    private function responseWithError(string $message, int $status)
    {
        return response()->json([
            'message' => $message . ' :('
        ], $status);
    }
}
