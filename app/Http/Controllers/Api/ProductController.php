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
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
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
